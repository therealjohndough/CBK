<?php
/**
 * CBKNY Theme functions
 */

if (!defined('ABSPATH')) exit;

define('CBKNY_VER', '0.1.0');

add_action('after_setup_theme', function() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('html5', ['search-form','gallery','caption','style','script']);
  register_nav_menus([
    'primary' => __('Primary Menu', 'cbkny'),
    'footer'  => __('Footer Menu', 'cbkny')
  ]);
});

add_action('wp_enqueue_scripts', function() {
  wp_enqueue_style('cbkny', get_stylesheet_uri(), [], CBKNY_VER);
  wp_enqueue_script('cbkny-app', get_template_directory_uri() . '/assets/js/app.js', [], CBKNY_VER, true);
  wp_localize_script('cbkny-app', 'cbkny', [
    'siteUrl' => home_url('/'),
  ]);
});

// Performance optimizations
function cbkny_performance_optimizations() {
    // Remove unnecessary WordPress features
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
    
    // Disable emoji scripts
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('admin_print_styles', 'print_emoji_styles');
    
    // Disable XML-RPC
    add_filter('xmlrpc_enabled', '__return_false');
    
    // Remove query strings from static resources
    add_filter('script_loader_src', 'cbkny_remove_query_strings', 15, 1);
    add_filter('style_loader_src', 'cbkny_remove_query_strings', 15, 1);
}
add_action('init', 'cbkny_performance_optimizations');

function cbkny_remove_query_strings($src) {
    if (strpos($src, '?ver=')) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}

// Add preload for critical resources
function cbkny_add_preload_links() {
    echo '<link rel="preload" href="' . get_template_directory_uri() . '/style.css" as="style">';
    echo '<link rel="preload" href="' . get_template_directory_uri() . '/assets/js/app.js" as="script">';
}
add_action('wp_head', 'cbkny_add_preload_links', 1);

// ACF JSON for portable field groups (optional)
add_filter('acf/settings/save_json', function($path) {
  return get_template_directory() . '/acf-json';
});
add_filter('acf/settings/load_json', function($paths) {
  $paths[] = get_template_directory() . '/acf-json';
  return $paths;
});

// ACF Options page (if ACF Pro active)
add_action('init', function() {
  if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
      'page_title' => 'CBKNY Settings',
      'menu_title' => 'CBKNY Settings',
      'menu_slug'  => 'cbkny-settings',
      'capability' => 'manage_options',
      'redirect'   => false
    ]);
  }
});

// Custom Post Types (Services, Resources, Highlights, FAQ, Testimonials)
require_once get_template_directory() . '/inc/cpt.php';

// Schema helpers
require_once get_template_directory() . '/inc/schema.php';

// Shortcodes
require_once get_template_directory() . '/inc/shortcodes.php';

// Customizer options
require_once get_template_directory() . '/inc/customizer.php';

// Page templates
require_once get_template_directory() . '/inc/page-templates.php';

// Widget areas
require_once get_template_directory() . '/inc/widgets.php';

// Cookie consent
require_once get_template_directory() . '/inc/cookie-consent.php';

// File management system
require_once get_template_directory() . '/inc/file-manager.php';

// SEO helper functions
require_once get_template_directory() . '/inc/seo-helpers.php';

// Blog functionality
require_once get_template_directory() . '/inc/blog-functions.php';

// Enqueue Lottie loader
function cbkny_enqueue_lottie_loader() {
    wp_enqueue_script('cbkny-lottie-loader', get_template_directory_uri() . '/assets/js/lottie-loader.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'cbkny_enqueue_lottie_loader');

// Enqueue Font Awesome
function cbkny_enqueue_fontawesome() {
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');
}
add_action('wp_enqueue_scripts', 'cbkny_enqueue_fontawesome');

// Add dynamic CSS from customizer
function cbkny_customizer_css() {
    $primary_color = get_theme_mod('cbkny_primary_color', '#F8BBD9');
    $secondary_color = get_theme_mod('cbkny_secondary_color', '#FFFFFF');
    $text_color = get_theme_mod('cbkny_text_color', '#000000');
    
    $css = "
    :root {
        --cbkny-pink: {$primary_color};
        --cbkny-white: {$secondary_color};
        --cbkny-black: {$text_color};
    }
    ";
    
    wp_add_inline_style('cbkny-style', $css);
}
add_action('wp_enqueue_scripts', 'cbkny_customizer_css');

// Create download pages on theme activation
function cbkny_create_download_pages() {
    $pages = array(
        array(
            'title' => 'NY Cannabis Tax Compliance Checklist',
            'slug' => 'ny-cannabis-compliance-checklist',
            'template' => 'page-ny-cannabis-compliance-checklist.php'
        ),
        array(
            'title' => '280E Deduction Guide',
            'slug' => '280e-deduction-guide',
            'template' => 'page-280e-deduction-guide.php'
        ),
        array(
            'title' => 'Audit Readiness Quiz',
            'slug' => 'audit-readiness-quiz',
            'template' => 'page-audit-readiness-quiz.php'
        ),
        array(
            'title' => '280E Tax Calculator',
            'slug' => '280e-tax-calculator',
            'template' => 'page-280e-tax-calculator.php'
        )
    );
    
    foreach ($pages as $page) {
        // Check if page already exists
        $existing_page = get_page_by_path($page['slug']);
        
        if (!$existing_page) {
            $page_id = wp_insert_post(array(
                'post_title' => $page['title'],
                'post_name' => $page['slug'],
                'post_content' => '<!-- Content handled by page template -->',
                'post_status' => 'publish',
                'post_type' => 'page',
                'post_author' => 1,
                'meta_input' => array(
                    '_wp_page_template' => $page['template']
                )
            ));
            
                if ($page_id) {
                    // Page created successfully - don't echo during page load
                }
        }
    }
}
add_action('after_switch_theme', 'cbkny_create_download_pages');

// DISABLED - Force create pages on theme load (one-time only)
// function cbkny_force_create_pages() {
//     // Check if pages already exist
//     $checklist_page = get_page_by_path('ny-cannabis-compliance-checklist');
//     $guide_page = get_page_by_path('280e-deduction-guide');
//     $quiz_page = get_page_by_path('audit-readiness-quiz');
//     $calculator_page = get_page_by_path('280e-tax-calculator');
//     
//     // Only create if they don't exist and we're in admin or doing a one-time setup
//     if ((!$checklist_page || !$guide_page || !$quiz_page || !$calculator_page) && (is_admin() || defined('DOING_CRON'))) {
//         cbkny_create_download_pages();
//     }
// }
// add_action('init', 'cbkny_force_create_pages');

// Fix resources page slug and title typo - FORCE UPDATE
function cbkny_fix_resources_slug() {
    // Force update any page with wrong title or slug
    global $wpdb;
    
    // Update any page with wrong title
    $wpdb->query("UPDATE {$wpdb->posts} SET post_title = 'Resources' WHERE post_title = 'Resouces' AND post_type = 'page'");
    
    // Update any page with wrong slug
    $wpdb->query("UPDATE {$wpdb->posts} SET post_name = 'resources' WHERE post_name = 'resouces' AND post_type = 'page'");
    
    // Clear any caches
    if (function_exists('wp_cache_flush')) {
        wp_cache_flush();
    }
}
add_action('init', 'cbkny_fix_resources_slug', 1);

// Add admin menu for page creation
function cbkny_add_admin_menu() {
    add_management_page(
        'Create Download Pages',
        'Create Download Pages',
        'manage_options',
        'cbkny-create-pages',
        'cbkny_create_pages_admin_page'
    );
    
    // Add article publishing menu
    add_management_page(
        'Publish Articles',
        'Publish Articles',
        'manage_options',
        'cbkny-publish-articles',
        'cbkny_publish_articles_admin_page'
    );
}
add_action('admin_menu', 'cbkny_add_admin_menu');

// Admin page for creating download pages
function cbkny_create_pages_admin_page() {
    if (isset($_POST['create_pages'])) {
        $result = cbkny_create_download_pages();
        if ($result) {
            echo '<div class="notice notice-success"><p>Download pages created successfully!</p></div>';
        } else {
            echo '<div class="notice notice-error"><p>Some pages may already exist or there was an error.</p></div>';
        }
    }
    
    echo '<div class="wrap">';
    echo '<h1>Create Download Pages</h1>';
    echo '<p>Click the button below to create the download pages for your lead magnets.</p>';
    echo '<p><strong>Pages to be created:</strong></p>';
    echo '<ul>';
    echo '<li><a href="/ny-cannabis-compliance-checklist" target="_blank">NY Cannabis Tax Compliance Checklist</a></li>';
    echo '<li><a href="/280e-deduction-guide" target="_blank">280E Deduction Guide</a></li>';
    echo '<li><a href="/audit-readiness-quiz" target="_blank">Audit Readiness Quiz</a></li>';
    echo '<li><a href="/280e-tax-calculator" target="_blank">280E Tax Calculator</a></li>';
    echo '</ul>';
    echo '<form method="post">';
    echo '<input type="submit" name="create_pages" class="button button-primary" value="Create Download Pages">';
    echo '</form>';
    echo '</div>';
}

// Auto-update phone number when customizer phone_update field changes
function cbkny_update_phone_number() {
    $phone_update = get_theme_mod('cbkny_phone_update', '');
    
    if (!empty($phone_update)) {
        // Update the main phone setting
        set_theme_mod('cbkny_phone', $phone_update);
        
        // Clear the update field
        set_theme_mod('cbkny_phone_update', '');
        
        // Optional: Add admin notice
        add_action('admin_notices', function() {
            echo '<div class="notice notice-success is-dismissible"><p>Phone number updated successfully!</p></div>';
        });
    }
}
add_action('customize_save_after', 'cbkny_update_phone_number');

// Create resource category pages on theme activation
function cbkny_create_resource_category_pages() {
    // Get the resources page ID
    $resources_page = get_page_by_path('resources');
    if (!$resources_page) {
        return; // Resources page doesn't exist yet
    }

    $pages = array(
        array(
            'title' => 'Free Guides',
            'slug' => 'free-guides',
            'parent' => $resources_page->ID,
            'template' => 'page-free-guides.php'
        ),
        array(
            'title' => 'Templates',
            'slug' => 'templates',
            'parent' => $resources_page->ID,
            'template' => 'page-templates.php'
        ),
        array(
            'title' => 'Assessment Tools',
            'slug' => 'assessment-tools',
            'parent' => $resources_page->ID,
            'template' => 'page-assessment-tools.php'
        )
    );

    foreach ($pages as $page) {
        // Check if page already exists as a child of resources page
        $existing_page = get_page_by_path($page['slug'] . '/' . $resources_page->post_name);
        
        // Also check if there's a standalone page with this slug
        $standalone_page = get_page_by_path($page['slug']);
        
        // If there's a standalone page that's not a child of resources, delete it
        if ($standalone_page && $standalone_page->post_parent != $resources_page->ID) {
            wp_delete_post($standalone_page->ID, true);
        }

        if (!$existing_page) {
            $page_id = wp_insert_post(array(
                'post_title' => $page['title'],
                'post_name' => $page['slug'],
                'post_content' => '<!-- Content handled by page template -->',
                'post_status' => 'publish',
                'post_type' => 'page',
                'post_author' => 1,
                'post_parent' => $page['parent'],
                'meta_input' => array(
                    '_wp_page_template' => $page['template']
                )
            ));
            
            if ($page_id) {
                // Page created successfully - don't echo during page load
            }
        }
    }
}

// DISABLED - Force create resource category pages on theme load (one-time only)
// function cbkny_force_create_resource_category_pages() {
//     // Check if category pages already exist
//     $free_guides_page = get_page_by_path('free-guides');
//     $templates_page = get_page_by_path('templates');
//     $assessment_tools_page = get_page_by_path('assessment-tools');
//     
//     // Only create if they don't exist and we're in admin or doing a one-time setup
//     if ((!$free_guides_page || !$templates_page || !$assessment_tools_page) && (is_admin() || defined('DOING_CRON'))) {
//         cbkny_create_resource_category_pages();
//     }
// }
// add_action('init', 'cbkny_force_create_resource_category_pages');

// Create legal pages on theme activation
function cbkny_create_legal_pages() {
    $pages = array(
        array(
            'title' => 'Terms of Service',
            'slug' => 'terms-of-service',
            'template' => 'page-terms-of-service.php'
        ),
        array(
            'title' => 'Cookie Policy',
            'slug' => 'cookie-policy',
            'template' => 'page-cookie-policy.php'
        ),
        array(
            'title' => 'Disclaimer',
            'slug' => 'disclaimer',
            'template' => 'page-disclaimer.php'
        )
    );

    foreach ($pages as $page) {
        // Check if page already exists
        $existing_page = get_page_by_path($page['slug']);

        if (!$existing_page) {
            $page_id = wp_insert_post(array(
                'post_title' => $page['title'],
                'post_name' => $page['slug'],
                'post_content' => '<!-- Content handled by page template -->',
                'post_status' => 'publish',
                'post_type' => 'page',
                'post_author' => 1,
                'meta_input' => array(
                    '_wp_page_template' => $page['template']
                )
            ));

            if ($page_id) {
                // Page created successfully - don't echo during page load
            }
        }
    }
}
add_action('after_switch_theme', 'cbkny_create_legal_pages');

// DISABLED - Force create legal pages on theme load (one-time only)
// function cbkny_force_create_legal_pages() {
//     // Check if legal pages already exist
//     $terms_page = get_page_by_path('terms-of-service');
//     $cookie_page = get_page_by_path('cookie-policy');
//     $disclaimer_page = get_page_by_path('disclaimer');
//     
//     // Only create if they don't exist and we're in admin or doing a one-time setup
//     if ((!$terms_page || !$cookie_page || !$disclaimer_page) && (is_admin() || defined('DOING_CRON'))) {
//         cbkny_create_legal_pages();
//     }
// }
// add_action('init', 'cbkny_force_create_legal_pages');

// DISABLED - Clean up phantom pages (run once)
// function cbkny_cleanup_phantom_pages() {
//     $resources_page = get_page_by_path('resources');
//     if (!$resources_page) return;
//     
//     // List of pages that should only exist as children of resources
//     $phantom_slugs = array('free-guides', 'templates', 'assessment-tools');
//     
//     foreach ($phantom_slugs as $slug) {
//         $standalone_page = get_page_by_path($slug);
//         
//         // If there's a standalone page that's not a child of resources, delete it
//         if ($standalone_page && $standalone_page->post_parent != $resources_page->ID) {
//             wp_delete_post($standalone_page->ID, true);
//         }
//     }
// }
// add_action('init', 'cbkny_cleanup_phantom_pages');

// Manual function to create missing service pages (run once)
function cbkny_create_missing_service_pages() {
    $pages = array(
        array(
            'title' => 'Monthly Bookkeeping',
            'slug' => 'monthly-bookkeeping',
            'template' => 'page-monthly-bookkeeping.php'
        ),
        array(
            'title' => 'Clean Up / Catch Up',
            'slug' => 'cleanup-catchup',
            'template' => 'page-cleanup-catchup.php'
        ),
        array(
            'title' => 'Chief Compliance Officer',
            'slug' => 'chief-compliance-officer',
            'template' => 'page-chief-compliance-officer.php'
        )
    );

    foreach ($pages as $page) {
        // Check if page already exists
        $existing_page = get_page_by_path($page['slug']);
        
        if (!$existing_page) {
            $page_id = wp_insert_post(array(
                'post_title' => $page['title'],
                'post_name' => $page['slug'],
                'post_content' => '<!-- Content handled by page template -->',
                'post_status' => 'publish',
                'post_type' => 'page',
                'post_author' => 1,
                'meta_input' => array(
                    '_wp_page_template' => $page['template']
                )
            ));
            
            if ($page_id) {
                // Page created successfully
            }
        }
    }
}

// Add admin notice to trigger page creation
add_action('admin_notices', function() {
    if (isset($_GET['create_missing_pages']) && $_GET['create_missing_pages'] == '1') {
        cbkny_create_missing_service_pages();
        echo '<div class="notice notice-success is-dismissible"><p>Missing service pages created successfully!</p></div>';
    }
});

// DISABLED - One-time page creation on theme load (temporary)
// function cbkny_create_missing_pages_once() {
//     // Check if we've already created them
//     $monthly_page = get_page_by_path('monthly-bookkeeping');
//     $cleanup_page = get_page_by_path('cleanup-catchup');
//     $cco_page = get_page_by_path('chief-compliance-officer');
//     
//     if (!$monthly_page || !$cleanup_page || !$cco_page) {
//         cbkny_create_missing_service_pages();
//     }
// }
// add_action('init', 'cbkny_create_missing_pages_once');

// Function to list all pages for cleanup (admin only)
function cbkny_list_all_pages() {
    if (!is_admin()) return;
    
    if (isset($_GET['list_pages']) && $_GET['list_pages'] == '1') {
        $pages = get_posts(array(
            'post_type' => 'page',
            'numberposts' => -1,
            'post_status' => 'publish'
        ));
        
        echo '<div class="notice notice-info"><p><strong>All Pages on Site:</strong></p><ul>';
        foreach ($pages as $page) {
            $parent_info = $page->post_parent ? " (Child of: " . get_the_title($page->post_parent) . ")" : " (Top Level)";
            echo '<li><a href="' . get_edit_post_link($page->ID) . '">' . $page->post_title . '</a> - /' . $page->post_name . '/' . $parent_info . '</li>';
        }
        echo '</ul></div>';
    }
}
add_action('admin_notices', 'cbkny_list_all_pages');

// Function to delete specific pages by slug (admin only)
function cbkny_delete_pages_by_slug() {
    if (!is_admin()) return;
    
    if (isset($_GET['delete_pages']) && $_GET['delete_pages'] == '1') {
        // List of page slugs to delete (add the ones you want to remove)
        $pages_to_delete = array(
            // Add page slugs here that you want to delete
            // 'example-page-slug',
        );
        
        $deleted_count = 0;
        foreach ($pages_to_delete as $slug) {
            $page = get_page_by_path($slug);
            if ($page) {
                wp_delete_post($page->ID, true);
                $deleted_count++;
            }
        }
        
        if ($deleted_count > 0) {
            echo '<div class="notice notice-success"><p>Deleted ' . $deleted_count . ' pages.</p></div>';
        } else {
            echo '<div class="notice notice-warning"><p>No pages found to delete. Add page slugs to the $pages_to_delete array in functions.php</p></div>';
        }
    }
}
add_action('admin_notices', 'cbkny_delete_pages_by_slug');

// Create pillar content pages for SEO
function cbkny_create_pillar_content_pages() {
    $pages = array(
        array(
            'title' => 'Ultimate Guide to Cannabis Accounting in New York',
            'slug' => 'ultimate-guide-cannabis-accounting-new-york',
            'template' => 'page-ultimate-guide-cannabis-accounting.php',
            'meta_description' => 'Complete guide to cannabis accounting in New York. Learn about 280E compliance, OCM reporting, and audit preparation for dispensaries, cultivators, and processors.',
            'meta_keywords' => 'cannabis accounting new york, cannabis bookkeeping guide, 280e compliance, ocm reporting'
        ),
        array(
            'title' => '280E Tax Compliance: Complete Resource for Cannabis Businesses',
            'slug' => '280e-tax-compliance-complete-resource',
            'template' => 'page-280e-compliance-guide.php',
            'meta_description' => 'Master 280E compliance with our comprehensive guide covering deductions, record-keeping, and audit preparation for cannabis businesses.',
            'meta_keywords' => '280e compliance, cannabis tax compliance, 280e deductions, cannabis tax planning'
        ),
        array(
            'title' => 'NY OCM Reporting Requirements: Complete Guide',
            'slug' => 'ny-ocm-reporting-requirements-complete-guide',
            'template' => 'page-ocm-reporting-guide.php',
            'meta_description' => 'Stay compliant with New York Office of Cannabis Management reporting requirements, deadlines, and best practices for cannabis businesses.',
            'meta_keywords' => 'ocm reporting ny, ny cannabis reporting, ocm compliance, cannabis regulatory compliance'
        ),
        array(
            'title' => 'Cannabis Business Startup Financial Guide',
            'slug' => 'cannabis-business-startup-financial-guide',
            'template' => 'page-cannabis-startup-financial-guide.php',
            'meta_description' => 'Plan your cannabis business finances from day one with our comprehensive startup financial guide covering costs, funding, and planning.',
            'meta_keywords' => 'cannabis business startup, cannabis business planning, cannabis funding, cannabis financial planning'
        )
    );
    
    foreach ($pages as $page_data) {
        // Check if page already exists
        $existing_page = get_page_by_path($page_data['slug']);
        
        if (!$existing_page) {
            $page_id = wp_insert_post(array(
                'post_title' => $page_data['title'],
                'post_name' => $page_data['slug'],
                'post_content' => '<!-- Content handled by page template -->',
                'post_status' => 'publish',
                'post_type' => 'page',
                'post_author' => 1,
                'meta_input' => array(
                    '_wp_page_template' => $page_data['template'],
                    '_cbkny_meta_description' => $page_data['meta_description'],
                    '_cbkny_meta_keywords' => $page_data['meta_keywords']
                )
            ));
            
            if ($page_id) {
                // Page created successfully
            }
        }
    }
}
add_action('after_switch_theme', 'cbkny_create_pillar_content_pages');

// Manual trigger to create pillar content pages
function cbkny_manual_create_pillar_pages() {
    if (isset($_GET['create_pillar_pages']) && $_GET['create_pillar_pages'] == '1') {
        cbkny_create_pillar_content_pages();
        echo '<div class="notice notice-success"><p>Pillar content pages created successfully!</p></div>';
    }
}
add_action('admin_notices', 'cbkny_manual_create_pillar_pages');

// Add admin menu for pillar content creation
function cbkny_add_pillar_content_menu() {
    add_management_page(
        'Create Pillar Content Pages',
        'Create Pillar Content',
        'manage_options',
        'cbkny-create-pillar-content',
        'cbkny_create_pillar_content_admin_page'
    );
}
add_action('admin_menu', 'cbkny_add_pillar_content_menu');

// Admin page for creating pillar content pages
function cbkny_create_pillar_content_admin_page() {
    if (isset($_POST['create_pillar_pages'])) {
        cbkny_create_pillar_content_pages();
        echo '<div class="notice notice-success"><p>Pillar content pages created successfully!</p></div>';
    }
    
    echo '<div class="wrap">';
    echo '<h1>Create Pillar Content Pages</h1>';
    echo '<p>Click the button below to create the SEO pillar content pages for your cannabis accounting business.</p>';
    echo '<p><strong>Pages to be created:</strong></p>';
    echo '<ul>';
    echo '<li><a href="/ultimate-guide-cannabis-accounting-new-york" target="_blank">Ultimate Guide to Cannabis Accounting in New York</a></li>';
    echo '<li><a href="/280e-tax-compliance-complete-resource" target="_blank">280E Tax Compliance: Complete Resource</a></li>';
    echo '<li><a href="/ny-ocm-reporting-requirements-complete-guide" target="_blank">NY OCM Reporting Requirements: Complete Guide</a></li>';
    echo '<li><a href="/cannabis-business-startup-financial-guide" target="_blank">Cannabis Business Startup Financial Guide</a></li>';
    echo '</ul>';
    echo '<form method="post">';
    echo '<input type="submit" name="create_pillar_pages" class="button button-primary" value="Create Pillar Content Pages">';
    echo '</form>';
    echo '</div>';
}

// Function to fix pillar content page templates
function cbkny_fix_pillar_content_templates() {
    $pages_to_fix = array(
        'ultimate-guide-cannabis-accounting-new-york' => 'page-ultimate-guide-cannabis-accounting.php',
        '280e-tax-compliance-complete-resource' => 'page-280e-compliance-guide.php',
        'ny-ocm-reporting-requirements-complete-guide' => 'page-ocm-reporting-guide.php',
        'cannabis-business-startup-financial-guide' => 'page-cannabis-startup-financial-guide.php'
    );
    
    $fixed_count = 0;
    
    foreach ($pages_to_fix as $slug => $template) {
        // Get the page
        $page = get_page_by_path($slug);
        
        if ($page) {
            // Update the page template
            $updated = update_post_meta($page->ID, '_wp_page_template', $template);
            
            if ($updated) {
                $fixed_count++;
            }
        }
    }
    
    return $fixed_count;
}

// Add admin menu for fixing templates
function cbkny_add_fix_templates_menu() {
    add_management_page(
        'Fix Pillar Content Templates',
        'Fix Templates',
        'manage_options',
        'cbkny-fix-templates',
        'cbkny_fix_templates_admin_page'
    );
}
add_action('admin_menu', 'cbkny_add_fix_templates_menu');


// Function to fix page templates for pillar content
function cbkny_fix_pillar_templates() {
    $pages_to_fix = array(
        350 => 'page-ultimate-guide-cannabis-accounting.php', // Ultimate Guide
        351 => 'page-280e-compliance-guide.php', // 280E Compliance
        352 => 'page-ocm-reporting-guide.php', // OCM Reporting
        362 => 'page-cannabis-startup-financial-guide.php' // Startup Guide
    );
    
    $fixed_count = 0;
    
    foreach ($pages_to_fix as $page_id => $template) {
        $updated = update_post_meta($page_id, '_wp_page_template', $template);
        
        if ($updated) {
            $fixed_count++;
        }
    }
    
    return $fixed_count;
}

// Admin page for fixing templates
function cbkny_fix_templates_admin_page() {
    if (isset($_POST['fix_templates'])) {
        $fixed_count = cbkny_fix_pillar_templates();
        echo '<div class="notice notice-success"><p>Fixed ' . $fixed_count . ' page templates successfully!</p></div>';
    }
    
    echo '<div class="wrap">';
    echo '<h1>Fix Page Templates</h1>';
    echo '<p>This will assign the correct page templates to your pillar content pages.</p>';
    echo '<p><strong>Pages to be fixed:</strong></p>';
    echo '<ul>';
    echo '<li>Ultimate Guide to Cannabis Accounting in New York → Ultimate Guide Cannabis Accounting</li>';
    echo '<li>280E Tax Compliance: Complete Resource → 280E Compliance Guide</li>';
    echo '<li>NY OCM Reporting Requirements: Complete Guide → OCM Reporting Guide</li>';
    echo '<li>Cannabis Business Startup Financial Guide → Cannabis Startup Financial Guide</li>';
    echo '</ul>';
    echo '<form method="post">';
    echo '<input type="submit" name="fix_templates" class="button button-primary" value="Fix Page Templates">';
    echo '</form>';
    echo '</div>';
}

// Add sitemap management admin menu
function cbkny_add_sitemap_management_menu() {
    add_management_page(
        'Sitemap Management',
        'Sitemap Management',
        'manage_options',
        'cbkny-sitemap-management',
        'cbkny_sitemap_management_admin_page'
    );
}
add_action('admin_menu', 'cbkny_add_sitemap_management_menu');

// Admin page for sitemap management
function cbkny_sitemap_management_admin_page() {
    if (isset($_POST['submit_sitemap'])) {
        cbkny_submit_sitemap_to_search_engines();
        echo '<div class="notice notice-success"><p>Sitemap submitted to Google and Bing successfully!</p></div>';
    }
    
    echo '<div class="wrap">';
    echo '<h1>Sitemap Management</h1>';
    echo '<p>Manage your XML sitemaps and search engine submissions.</p>';
    
    echo '<div class="card" style="max-width: 800px; padding: 20px; margin: 20px 0;">';
    echo '<h2>Current Sitemaps</h2>';
    echo '<ul>';
    echo '<li><strong>Main Sitemap:</strong> <a href="' . home_url('/?sitemap=xml') . '" target="_blank">' . home_url('/?sitemap=xml') . '</a></li>';
    echo '<li><strong>WordPress Sitemap:</strong> <a href="' . home_url('/wp-sitemap.xml') . '" target="_blank">' . home_url('/wp-sitemap.xml') . '</a></li>';
    echo '<li><strong>Sitemap Index:</strong> <a href="' . home_url('/?sitemap=index') . '" target="_blank">' . home_url('/?sitemap=index') . '</a></li>';
    echo '</ul>';
    echo '</div>';
    
    echo '<div class="card" style="max-width: 800px; padding: 20px; margin: 20px 0;">';
    echo '<h2>Search Engine Submission</h2>';
    echo '<p>Submit your sitemap to Google and Bing for faster indexing.</p>';
    echo '<form method="post">';
    echo '<input type="submit" name="submit_sitemap" class="button button-primary" value="Submit Sitemap to Search Engines">';
    echo '</form>';
    echo '</div>';
    
    echo '<div class="card" style="max-width: 800px; padding: 20px; margin: 20px 0;">';
    echo '<h2>Manual Submission Links</h2>';
    echo '<p>You can also submit your sitemap manually to search engines:</p>';
    echo '<ul>';
    echo '<li><strong>Google Search Console:</strong> <a href="https://search.google.com/search-console" target="_blank">https://search.google.com/search-console</a></li>';
    echo '<li><strong>Bing Webmaster Tools:</strong> <a href="https://www.bing.com/webmasters" target="_blank">https://www.bing.com/webmasters</a></li>';
    echo '</ul>';
    echo '</div>';
    
    echo '<div class="card" style="max-width: 800px; padding: 20px; margin: 20px 0;">';
    echo '<h2>Sitemap Features</h2>';
    echo '<ul>';
    echo '<li>✅ Automatic sitemap generation</li>';
    echo '<li>✅ Priority-based URL organization</li>';
    echo '<li>✅ Automatic search engine pinging</li>';
    echo '<li>✅ Enhanced robots.txt</li>';
    echo '<li>✅ Sitemap index for large sites</li>';
    echo '<li>✅ Real-time updates on content changes</li>';
    echo '</ul>';
    echo '</div>';
    
    echo '</div>';
}

// Admin page for publishing articles
function cbkny_publish_articles_admin_page() {
    if (isset($_POST['publish_articles'])) {
        $result = cbkny_publish_all_articles();
        if ($result) {
            echo '<div class="notice notice-success"><p>All articles published successfully!</p></div>';
        } else {
            echo '<div class="notice notice-error"><p>Some articles may not have been published. Check the pages list.</p></div>';
        }
    }
    
    echo '<div class="wrap">';
    echo '<h1>Publish Articles</h1>';
    echo '<p>Click the button below to publish all pillar content and educational articles.</p>';
    
    echo '<h2>Articles to be published:</h2>';
    echo '<h3>Pillar Content (4 articles):</h3>';
    echo '<ul>';
    echo '<li><a href="/ultimate-guide-cannabis-accounting-new-york" target="_blank">Ultimate Guide to Cannabis Accounting in New York</a></li>';
    echo '<li><a href="/280e-tax-compliance-complete-resource" target="_blank">280E Tax Compliance: Complete Resource</a></li>';
    echo '<li><a href="/ny-ocm-reporting-requirements-complete-guide" target="_blank">NY OCM Reporting Requirements: Complete Guide</a></li>';
    echo '<li><a href="/cannabis-business-startup-financial-guide" target="_blank">Cannabis Business Startup Financial Guide</a></li>';
    echo '</ul>';
    
    echo '<h3>Educational Articles (6 articles):</h3>';
    echo '<ul>';
    echo '<li><a href="/understanding-280e-complete-guide" target="_blank">Understanding 280E: A Complete Guide</a></li>';
    echo '<li><a href="/ocm-reporting-requirements-explained" target="_blank">OCM Reporting Requirements Explained</a></li>';
    echo '<li><a href="/multi-entity-cannabis-business-structures" target="_blank">Multi-Entity Cannabis Business Structures</a></li>';
    echo '<li><a href="/preparing-cannabis-business-audits" target="_blank">Preparing for Cannabis Business Audits</a></li>';
    echo '<li><a href="/cannabis-inventory-tracking-best-practices" target="_blank">Cannabis Inventory Tracking Best Practices</a></li>';
    echo '<li><a href="/ny-cannabis-tax-deadlines-penalties" target="_blank">NY Cannabis Tax Deadlines & Penalties</a></li>';
    echo '</ul>';
    
    echo '<form method="post">';
    echo '<input type="submit" name="publish_articles" class="button button-primary" value="Publish All Articles">';
    echo '</form>';
    echo '</div>';
}

// Function to publish all articles
function cbkny_publish_all_articles() {
    $articles = array(
        // Pillar Content
        'ultimate-guide-cannabis-accounting-new-york' => 'Ultimate Guide to Cannabis Accounting in New York',
        '280e-tax-compliance-complete-resource' => '280E Tax Compliance: Complete Resource',
        'ny-ocm-reporting-requirements-complete-guide' => 'NY OCM Reporting Requirements: Complete Guide',
        'cannabis-business-startup-financial-guide' => 'Cannabis Business Startup Financial Guide',
        
        // Educational Articles
        'understanding-280e-complete-guide' => 'Understanding 280E: A Complete Guide',
        'ocm-reporting-requirements-explained' => 'OCM Reporting Requirements Explained',
        'multi-entity-cannabis-business-structures' => 'Multi-Entity Cannabis Business Structures',
        'preparing-cannabis-business-audits' => 'Preparing for Cannabis Business Audits',
        'cannabis-inventory-tracking-best-practices' => 'Cannabis Inventory Tracking Best Practices',
        'ny-cannabis-tax-deadlines-penalties' => 'NY Cannabis Tax Deadlines & Penalties'
    );
    
    $published = 0;
    
    foreach ($articles as $slug => $title) {
        $page = get_page_by_path($slug);
        if ($page) {
            wp_update_post(array(
                'ID' => $page->ID,
                'post_status' => 'publish'
            ));
            $published++;
        }
    }
    
    return $published > 0;
}

// Blog redirects for migration from old cbkny.com
function cbkny_blog_redirects() {
    // Only run on frontend
    if (is_admin()) return;
    
    $current_url = $_SERVER['REQUEST_URI'];
    $redirects = array(
        // High Priority - Lead Magnets & Tax Content
        '/f/free-download-new-york-potency-tax-calculator' => '/download/',
        '/f/new-york-state-sales-tax-calendar-2024' => '/resources/',
        '/f/new-york-business-tax-calendar-2024' => '/resources/',
        '/f/three-key-strategies-for-cannabis-accountancy-as-told-by-cbk' => '/ultimate-guide-cannabis-accounting/',
        
        // Educational Content
        '/f/tips-for-diy-bookkeeping' => '/monthly-bookkeeping/',
        '/f/six-tips-for-better-organization' => '/resources/',
        '/f/our-take-hr-compliance-for-cannabis-businesses' => '/ocm-reporting-guide/',
        '/f/the-tightrope-walk' => '/about/',
        
        // Company Story & Partnerships
        '/f/empowering-cannabis-businesses-the-story-of-canna-bookkeeper%E2%84%A2%EF%B8%8F' => '/about/',
        '/f/meet-my-friends-at-her-seed-bank' => '/about/',
        '/f/ready-to-grow-with-us' => '/contact/',
        '/f/consulting-two-accountants' => '/services/',
        
        // Handle trailing slashes
        '/f/free-download-new-york-potency-tax-calculator/' => '/download/',
        '/f/new-york-state-sales-tax-calendar-2024/' => '/resources/',
        '/f/new-york-business-tax-calendar-2024/' => '/resources/',
        '/f/three-key-strategies-for-cannabis-accountancy-as-told-by-cbk/' => '/ultimate-guide-cannabis-accounting/',
        '/f/tips-for-diy-bookkeeping/' => '/monthly-bookkeeping/',
        '/f/six-tips-for-better-organization/' => '/resources/',
        '/f/our-take-hr-compliance-for-cannabis-businesses/' => '/ocm-reporting-guide/',
        '/f/the-tightrope-walk/' => '/about/',
        '/f/empowering-cannabis-businesses-the-story-of-canna-bookkeeper%E2%84%A2%EF%B8%8F/' => '/about/',
        '/f/meet-my-friends-at-her-seed-bank/' => '/about/',
        '/f/ready-to-grow-with-us/' => '/contact/',
        '/f/consulting-two-accountants/' => '/services/'
    );
    
    // Check for exact matches
    foreach ($redirects as $old_path => $new_path) {
        if ($current_url === $old_path) {
            wp_redirect(home_url($new_path), 301);
            exit;
        }
    }
}
add_action('template_redirect', 'cbkny_blog_redirects');

// Home page redirect (handle /home to /)
function cbkny_home_redirect() {
    if (is_admin()) return;
    
    $current_url = $_SERVER['REQUEST_URI'];
    
    // Redirect /home to homepage
    if ($current_url === '/home' || $current_url === '/home/') {
        wp_redirect(home_url('/'), 301);
        exit;
    }
}
add_action('template_redirect', 'cbkny_home_redirect');

// Breadcrumbs function
function cbkny_breadcrumbs() {
    if (is_front_page()) return;
    
    echo '<nav class="breadcrumbs" style="margin-bottom: 1rem; font-size: 0.9rem;">';
    echo '<a href="' . home_url('/') . '" style="color: var(--cbkny-pink); text-decoration: none;">Home</a>';
    
    if (is_page()) {
        echo ' <span style="margin: 0 0.5rem; color: var(--cbkny-gray);">›</span> ';
        echo '<span style="color: var(--cbkny-gray);">' . get_the_title() . '</span>';
    }
    
    echo '</nav>';
}
