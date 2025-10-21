<?php
if (!defined('ABSPATH')) exit;

// Add page template support
add_action('init', 'cbkny_add_page_templates');

function cbkny_add_page_templates() {
  // This will be handled by the page template files
}

// Template for Services page
function cbkny_services_template($template) {
  if (is_page('services') || is_page_template('page-services.php')) {
    return get_template_directory() . '/page-services.php';
  }
  return $template;
}
add_filter('page_template', 'cbkny_services_template');

// Template for About page
function cbkny_about_template($template) {
  if (is_page('about') || is_page_template('page-about.php')) {
    return get_template_directory() . '/page-about.php';
  }
  return $template;
}
add_filter('page_template', 'cbkny_about_template');

// Template for Contact page
function cbkny_contact_template($template) {
  if (is_page('contact') || is_page_template('page-contact.php')) {
    return get_template_directory() . '/page-contact.php';
  }
  return $template;
}
add_filter('page_template', 'cbkny_contact_template');

// Template for Resources page
function cbkny_resources_template($template) {
  if (is_page('resources') || is_page_template('page-resources.php')) {
    return get_template_directory() . '/page-resources.php';
  }
  return $template;
}
add_filter('page_template', 'cbkny_resources_template');

// Add custom page templates to the dropdown
add_filter('theme_page_templates', 'cbkny_add_page_templates_to_dropdown');

function cbkny_add_page_templates_to_dropdown($templates) {
  $templates['page-services.php'] = 'Services Page Template';
  $templates['page-about.php'] = 'About Page Template';
  $templates['page-contact.php'] = 'Contact Page Template';
  $templates['page-resources.php'] = 'Resources Page Template';
  $templates['page-landing.php'] = 'Landing Page Template';
  return $templates;
}

// Template for Landing pages
function cbkny_landing_template($template) {
  if (is_page_template('page-landing.php')) {
    return get_template_directory() . '/page-landing.php';
  }
  return $template;
}
add_filter('page_template', 'cbkny_landing_template');
