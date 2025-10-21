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
                echo "Created page: {$page['title']}\n";
            }
        }
    }
}
add_action('after_switch_theme', 'cbkny_create_download_pages');

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
        cbkny_create_download_pages();
        echo '<div class="notice notice-success"><p>Download pages created successfully!</p></div>';
    }
    
    echo '<div class="wrap">';
    echo '<h1>Create Download Pages</h1>';
    echo '<p>Click the button below to create the download pages for your lead magnets.</p>';
    echo '<form method="post">';
    echo '<input type="submit" name="create_pages" class="button button-primary" value="Create Download Pages">';
    echo '</form>';
    echo '</div>';
}
