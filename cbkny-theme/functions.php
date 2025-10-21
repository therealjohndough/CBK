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

// Force create pages on theme load (one-time only)
function cbkny_force_create_pages() {
    // Check if pages already exist
    $checklist_page = get_page_by_path('ny-cannabis-compliance-checklist');
    $guide_page = get_page_by_path('280e-deduction-guide');
    $quiz_page = get_page_by_path('audit-readiness-quiz');
    $calculator_page = get_page_by_path('280e-tax-calculator');
    
    // Only create if they don't exist and we're in admin or doing a one-time setup
    if ((!$checklist_page || !$guide_page || !$quiz_page || !$calculator_page) && (is_admin() || defined('DOING_CRON'))) {
        cbkny_create_download_pages();
    }
}
add_action('init', 'cbkny_force_create_pages');

// Fix resources page slug typo
function cbkny_fix_resources_slug() {
    // Check if there's a page with the wrong slug
    $wrong_page = get_page_by_path('resouces');
    $correct_page = get_page_by_path('resources');
    
    if ($wrong_page && !$correct_page) {
        // Update the slug
        wp_update_post(array(
            'ID' => $wrong_page->ID,
            'post_name' => 'resources'
        ));
    }
}
add_action('init', 'cbkny_fix_resources_slug');

// Add admin menu for page creation
function cbkny_add_admin_menu() {
    add_management_page(
        'Create Download Pages',
        'Create Download Pages',
        'manage_options',
        'cbkny-create-pages',
        'cbkny_create_pages_admin_page'
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

// Force create resource category pages on theme load (one-time only)
function cbkny_force_create_resource_category_pages() {
    // Check if category pages already exist
    $free_guides_page = get_page_by_path('free-guides');
    $templates_page = get_page_by_path('templates');
    $assessment_tools_page = get_page_by_path('assessment-tools');
    
    // Only create if they don't exist and we're in admin or doing a one-time setup
    if ((!$free_guides_page || !$templates_page || !$assessment_tools_page) && (is_admin() || defined('DOING_CRON'))) {
        cbkny_create_resource_category_pages();
    }
}
add_action('init', 'cbkny_force_create_resource_category_pages');

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

// Force create legal pages on theme load (one-time only)
function cbkny_force_create_legal_pages() {
    // Check if legal pages already exist
    $terms_page = get_page_by_path('terms-of-service');
    $cookie_page = get_page_by_path('cookie-policy');
    $disclaimer_page = get_page_by_path('disclaimer');
    
    // Only create if they don't exist and we're in admin or doing a one-time setup
    if ((!$terms_page || !$cookie_page || !$disclaimer_page) && (is_admin() || defined('DOING_CRON'))) {
        cbkny_create_legal_pages();
    }
}
add_action('init', 'cbkny_force_create_legal_pages');

// Clean up phantom pages (run once)
function cbkny_cleanup_phantom_pages() {
    $resources_page = get_page_by_path('resources');
    if (!$resources_page) return;
    
    // List of pages that should only exist as children of resources
    $phantom_slugs = array('free-guides', 'templates', 'assessment-tools');
    
    foreach ($phantom_slugs as $slug) {
        $standalone_page = get_page_by_path($slug);
        
        // If there's a standalone page that's not a child of resources, delete it
        if ($standalone_page && $standalone_page->post_parent != $resources_page->ID) {
            wp_delete_post($standalone_page->ID, true);
        }
    }
}
add_action('init', 'cbkny_cleanup_phantom_pages');
