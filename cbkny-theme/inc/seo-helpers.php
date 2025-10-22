<?php
if (!defined('ABSPATH')) exit;

/**
 * SEO Helper Functions
 */

// Get meta description for current page
function cbkny_get_meta_description() {
    if (is_home() || is_front_page()) {
        return cbkny_get_option('cbkny_meta_description', 'Professional cannabis accounting services in New York. 280E compliance, OCM reporting, and audit-ready bookkeeping for dispensaries, cultivators, and processors.');
    } elseif (is_page()) {
        $meta_desc = get_post_meta(get_the_ID(), '_cbkny_meta_description', true);
        if ($meta_desc) return $meta_desc;
        
        // Generate from content if no custom meta description
        $content = get_post_field('post_content', get_the_ID());
        $excerpt = wp_trim_words(strip_tags($content), 25);
        return $excerpt ? $excerpt : cbkny_get_option('cbkny_meta_description', 'Professional cannabis accounting services in New York.');
    } elseif (is_single()) {
        $meta_desc = get_post_meta(get_the_ID(), '_cbkny_meta_description', true);
        if ($meta_desc) return $meta_desc;
        
        $excerpt = get_the_excerpt();
        return $excerpt ? $excerpt : cbkny_get_option('cbkny_meta_description', 'Professional cannabis accounting services in New York.');
    }
    
    return cbkny_get_option('cbkny_meta_description', 'Professional cannabis accounting services in New York.');
}

// Get meta keywords for current page
function cbkny_get_meta_keywords() {
    if (is_home() || is_front_page()) {
        return 'cannabis bookkeeping new york, cannabis accountant ny, 280e compliance, ocm reporting, marijuana bookkeeper buffalo, cannabis tax accountant';
    } elseif (is_page()) {
        $meta_keywords = get_post_meta(get_the_ID(), '_cbkny_meta_keywords', true);
        if ($meta_keywords) return $meta_keywords;
        
        // Generate keywords based on page content
        $page_slug = get_post_field('post_name', get_the_ID());
        $keywords = array();
        
        // Add base keywords
        $keywords[] = 'cannabis bookkeeping new york';
        $keywords[] = 'cannabis accountant ny';
        
        // Add page-specific keywords
        switch ($page_slug) {
            case 'services':
                $keywords[] = 'cannabis accounting services';
                $keywords[] = '280e compliance services';
                break;
            case 'about':
                $keywords[] = 'cannabis bookkeeper buffalo';
                $keywords[] = 'rosanna st john';
                break;
            case 'resources':
                $keywords[] = 'cannabis business resources';
                $keywords[] = 'cannabis compliance guides';
                break;
            case 'contact':
                $keywords[] = 'cannabis accountant contact';
                $keywords[] = 'cannabis bookkeeping consultation';
                break;
        }
        
        return implode(', ', array_unique($keywords));
    }
    
    return 'cannabis bookkeeping new york, cannabis accountant ny, 280e compliance';
}

// Get canonical URL
function cbkny_get_canonical_url() {
    if (is_singular()) {
        return get_permalink();
    } elseif (is_home() || is_front_page()) {
        return home_url('/');
    } elseif (is_category() || is_tag() || is_tax()) {
        return get_term_link(get_queried_object());
    } elseif (is_archive()) {
        return get_post_type_archive_link(get_post_type());
    }
    
    return home_url($_SERVER['REQUEST_URI']);
}

// Get Open Graph title
function cbkny_get_og_title() {
    if (is_home() || is_front_page()) {
        return cbkny_get_option('cbkny_business_name', 'Canna Bookkeeper™ NY') . ' - Cannabis Accounting Services in New York';
    } elseif (is_page() || is_single()) {
        return get_the_title() . ' - ' . cbkny_get_option('cbkny_business_name', 'Canna Bookkeeper™ NY');
    }
    
    return get_bloginfo('name');
}

// Get Open Graph image
function cbkny_get_og_image() {
    if (is_singular() && has_post_thumbnail()) {
        $image_id = get_post_thumbnail_id();
        $image_url = wp_get_attachment_image_url($image_id, 'large');
        if ($image_url) return $image_url;
    }
    
    // Default OG image
    return cbkny_get_option('cbkny_og_image', home_url('/wp-content/uploads/2025/10/cbk-logo.webp'));
}

// Get page title for SEO
function cbkny_get_seo_title() {
    if (is_home() || is_front_page()) {
        return cbkny_get_option('cbkny_business_name', 'Canna Bookkeeper™ NY') . ' - Cannabis Accounting Services in New York';
    } elseif (is_page()) {
        $custom_title = get_post_meta(get_the_ID(), '_cbkny_seo_title', true);
        if ($custom_title) return $custom_title;
        
        return get_the_title() . ' - ' . cbkny_get_option('cbkny_business_name', 'Canna Bookkeeper™ NY');
    } elseif (is_single()) {
        return get_the_title() . ' - ' . cbkny_get_option('cbkny_business_name', 'Canna Bookkeeper™ NY');
    }
    
    return get_bloginfo('name');
}

// Add breadcrumb schema
function cbkny_output_breadcrumb_schema() {
    if (is_front_page()) return;
    
    $breadcrumbs = array();
    $breadcrumbs[] = array(
        '@type' => 'ListItem',
        'position' => 1,
        'name' => 'Home',
        'item' => home_url('/')
    );
    
    $position = 2;
    
    if (is_page()) {
        $ancestors = get_post_ancestors(get_the_ID());
        $ancestors = array_reverse($ancestors);
        
        foreach ($ancestors as $ancestor_id) {
            $breadcrumbs[] = array(
                '@type' => 'ListItem',
                'position' => $position,
                'name' => get_the_title($ancestor_id),
                'item' => get_permalink($ancestor_id)
            );
            $position++;
        }
        
        $breadcrumbs[] = array(
            '@type' => 'ListItem',
            'position' => $position,
            'name' => get_the_title(),
            'item' => get_permalink()
        );
    }
    
    if (count($breadcrumbs) > 1) {
        $schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $breadcrumbs
        );
        
        echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_PRETTY_PRINT) . '</script>';
    }
}
add_action('wp_head', 'cbkny_output_breadcrumb_schema', 15);

// Add FAQ schema for resource pages
function cbkny_output_faq_schema() {
    if (!is_page()) return;
    
    $faqs = get_post_meta(get_the_ID(), '_cbkny_faqs', true);
    if (!$faqs || !is_array($faqs)) return;
    
    $faq_items = array();
    foreach ($faqs as $faq) {
        if (!empty($faq['question']) && !empty($faq['answer'])) {
            $faq_items[] = array(
                '@type' => 'Question',
                'name' => $faq['question'],
                'acceptedAnswer' => array(
                    '@type' => 'Answer',
                    'text' => $faq['answer']
                )
            );
        }
    }
    
    if (!empty($faq_items)) {
        $schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => $faq_items
        );
        
        echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_PRETTY_PRINT) . '</script>';
    }
}
add_action('wp_head', 'cbkny_output_faq_schema', 25);

// Add LocalBusiness schema
function cbkny_output_local_business_schema() {
    if (!is_front_page()) return;
    
    $data = array(
        '@context' => 'https://schema.org',
        '@type' => 'LocalBusiness',
        'name' => cbkny_get_option('cbkny_business_name', 'Canna Bookkeeper™ NY'),
        'description' => 'Professional cannabis accounting services in New York. 280E compliance, OCM reporting, and audit-ready bookkeeping.',
        'url' => home_url('/'),
        'telephone' => cbkny_get_option('cbkny_phone', '+1-716-XXX-XXXX'),
        'email' => cbkny_get_option('cbkny_email', 'info@cbkny.com'),
        'address' => array(
            '@type' => 'PostalAddress',
            'addressLocality' => 'Buffalo',
            'addressRegion' => 'NY',
            'addressCountry' => 'US'
        ),
        'geo' => array(
            '@type' => 'GeoCoordinates',
            'latitude' => '42.8864',
            'longitude' => '-78.8784'
        ),
        'openingHours' => 'Mo-Fr 09:00-17:00',
        'priceRange' => '$500-$3000',
        'areaServed' => array(
            '@type' => 'State',
            'name' => 'New York'
        ),
        'sameAs' => array(
            cbkny_get_option('cbkny_linkedin_url', ''),
            cbkny_get_option('cbkny_instagram_url', '')
        )
    );
    
    echo '<script type="application/ld+json">' . wp_json_encode($data, JSON_PRETTY_PRINT) . '</script>';
}
add_action('wp_head', 'cbkny_output_local_business_schema', 30);

// Enhanced XML sitemap generator
function cbkny_generate_sitemap() {
    if (!isset($_GET['sitemap']) || $_GET['sitemap'] !== 'xml') return;
    
    header('Content-Type: application/xml; charset=UTF-8');
    
    // Get all published pages
    $pages = get_posts(array(
        'post_type' => 'page',
        'post_status' => 'publish',
        'numberposts' => -1
    ));
    
    // Get all published posts
    $posts = get_posts(array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'numberposts' => -1
    ));
    
    echo '<?xml version="1.0" encoding="UTF-8"?>';
    echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">';
    
    // Homepage (highest priority)
    echo '<url>';
    echo '<loc>' . home_url('/') . '</loc>';
    echo '<lastmod>' . date('c') . '</lastmod>';
    echo '<changefreq>weekly</changefreq>';
    echo '<priority>1.0</priority>';
    echo '</url>';
    
    // Important service pages (high priority)
    $high_priority_pages = array('services', 'about', 'contact', 'resources');
    foreach ($high_priority_pages as $slug) {
        $page = get_page_by_path($slug);
        if ($page) {
            echo '<url>';
            echo '<loc>' . get_permalink($page->ID) . '</loc>';
            echo '<lastmod>' . date('c', strtotime($page->post_modified)) . '</lastmod>';
            echo '<changefreq>monthly</changefreq>';
            echo '<priority>0.9</priority>';
            echo '</url>';
        }
    }
    
    // Pillar content pages (high priority)
    $pillar_pages = array(
        'ultimate-guide-cannabis-accounting-new-york',
        '280e-tax-compliance-complete-resource',
        'ny-ocm-reporting-requirements-complete-guide',
        'cannabis-business-startup-financial-guide'
    );
    foreach ($pillar_pages as $slug) {
        $page = get_page_by_path($slug);
        if ($page) {
            echo '<url>';
            echo '<loc>' . get_permalink($page->ID) . '</loc>';
            echo '<lastmod>' . date('c', strtotime($page->post_modified)) . '</lastmod>';
            echo '<changefreq>monthly</changefreq>';
            echo '<priority>0.9</priority>';
            echo '</url>';
        }
    }
    
    // All other pages
    foreach ($pages as $post) {
        if (!in_array($post->post_name, $high_priority_pages) && !in_array($post->post_name, $pillar_pages)) {
            echo '<url>';
            echo '<loc>' . get_permalink($post->ID) . '</loc>';
            echo '<lastmod>' . date('c', strtotime($post->post_modified)) . '</lastmod>';
            echo '<changefreq>monthly</changefreq>';
            echo '<priority>0.8</priority>';
            echo '</url>';
        }
    }
    
    // Blog posts
    foreach ($posts as $post) {
        echo '<url>';
        echo '<loc>' . get_permalink($post->ID) . '</loc>';
        echo '<lastmod>' . date('c', strtotime($post->post_modified)) . '</lastmod>';
        echo '<changefreq>weekly</changefreq>';
        echo '<priority>0.7</priority>';
        echo '</url>';
    }
    
    echo '</urlset>';
    exit;
}
add_action('init', 'cbkny_generate_sitemap');

// Add sitemap to robots.txt
function cbkny_add_sitemap_to_robots() {
    echo "\nSitemap: " . home_url('/?sitemap=xml') . "\n";
}
add_action('do_robots', 'cbkny_add_sitemap_to_robots');

// Automatic sitemap submission to search engines
function cbkny_submit_sitemap_to_search_engines() {
    $sitemap_url = home_url('/?sitemap=xml');
    
    // Submit to Google
    $google_url = 'https://www.google.com/ping?sitemap=' . urlencode($sitemap_url);
    wp_remote_get($google_url, array('timeout' => 5));
    
    // Submit to Bing
    $bing_url = 'https://www.bing.com/ping?sitemap=' . urlencode($sitemap_url);
    wp_remote_get($bing_url, array('timeout' => 5));
}
add_action('publish_post', 'cbkny_submit_sitemap_to_search_engines');
add_action('publish_page', 'cbkny_submit_sitemap_to_search_engines');

// Create sitemap index for large sites
function cbkny_create_sitemap_index() {
    if (!isset($_GET['sitemap']) || $_GET['sitemap'] !== 'index') return;
    
    header('Content-Type: application/xml; charset=UTF-8');
    
    echo '<?xml version="1.0" encoding="UTF-8"?>';
    echo '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
    
    // Main sitemap
    echo '<sitemap>';
    echo '<loc>' . home_url('/?sitemap=xml') . '</loc>';
    echo '<lastmod>' . date('c') . '</lastmod>';
    echo '</sitemap>';
    
    // WordPress sitemap
    echo '<sitemap>';
    echo '<loc>' . home_url('/wp-sitemap.xml') . '</loc>';
    echo '<lastmod>' . date('c') . '</lastmod>';
    echo '</sitemap>';
    
    echo '</sitemapindex>';
    exit;
}
add_action('init', 'cbkny_create_sitemap_index');

// Enhanced robots.txt with better directives
function cbkny_enhanced_robots_txt() {
    echo "User-agent: *\n";
    echo "Allow: /\n\n";
    
    // Disallow admin areas
    echo "Disallow: /wp-admin/\n";
    echo "Disallow: /wp-includes/\n";
    echo "Disallow: /wp-content/plugins/\n";
    echo "Disallow: /wp-content/themes/\n";
    echo "Disallow: /wp-content/uploads/backup/\n";
    echo "Disallow: /wp-content/cache/\n";
    echo "Disallow: /wp-content/upgrade/\n";
    echo "Disallow: /wp-content/uploads/wpforms/\n";
    echo "Disallow: /wp-json/\n";
    echo "Disallow: /xmlrpc.php\n";
    echo "Disallow: /readme.html\n";
    echo "Disallow: /license.txt\n\n";
    
    // Allow important directories
    echo "Allow: /wp-content/uploads/\n";
    echo "Allow: /wp-content/themes/cbkny-theme/assets/\n\n";
    
    // Sitemaps
    echo "Sitemap: " . home_url('/?sitemap=xml') . "\n";
    echo "Sitemap: " . home_url('/wp-sitemap.xml') . "\n";
    echo "Sitemap: " . home_url('/?sitemap=index') . "\n\n";
    
    // Crawl delay
    echo "Crawl-delay: 1\n";
}
add_filter('robots_txt', 'cbkny_enhanced_robots_txt');

// Add sitemap ping on content updates
function cbkny_ping_sitemap_on_update($post_id) {
    // Only ping for published content
    if (get_post_status($post_id) === 'publish') {
        cbkny_submit_sitemap_to_search_engines();
    }
}
add_action('save_post', 'cbkny_ping_sitemap_on_update');

// Breadcrumb navigation
function cbkny_breadcrumbs() {
    if (is_front_page()) return;
    
    echo '<nav class="breadcrumbs" aria-label="Breadcrumb">';
    echo '<ol class="breadcrumb-list">';
    
    // Home link
    echo '<li class="breadcrumb-item">';
    echo '<a href="' . home_url('/') . '" class="breadcrumb-link">Home</a>';
    echo '</li>';
    
    if (is_page()) {
        $ancestors = get_post_ancestors(get_the_ID());
        $ancestors = array_reverse($ancestors);
        
        foreach ($ancestors as $ancestor_id) {
            echo '<li class="breadcrumb-item">';
            echo '<a href="' . get_permalink($ancestor_id) . '" class="breadcrumb-link">' . get_the_title($ancestor_id) . '</a>';
            echo '</li>';
        }
        
        echo '<li class="breadcrumb-item breadcrumb-current" aria-current="page">';
        echo get_the_title();
        echo '</li>';
    } elseif (is_single()) {
        echo '<li class="breadcrumb-item breadcrumb-current" aria-current="page">';
        echo get_the_title();
        echo '</li>';
    }
    
    echo '</ol>';
    echo '</nav>';
}
