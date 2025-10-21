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
