<?php
if (!defined('ABSPATH')) exit;

function cbkny_register_cpt($type, $singular, $plural, $icon = 'dashicons-portfolio') {
  $labels = [
    'name' => $plural,
    'singular_name' => $singular,
    'add_new_item' => 'Add New ' . $singular,
    'edit_item' => 'Edit ' . $singular,
    'new_item' => 'New ' . $singular,
    'view_item' => 'View ' . $singular,
    'view_items' => 'View ' . $plural,
    'search_items' => 'Search ' . $plural
  ];
  $args = [
    'labels' => $labels,
    'public' => true,
    'has_archive' => true,
    'show_in_rest' => true,
    'menu_icon' => $icon,
    'supports' => ['title','editor','thumbnail','revisions','excerpt'],
    'rewrite' => ['slug' => $type]
  ];
  register_post_type($type, $args);
}

add_action('init', function() {
  cbkny_register_cpt('service', 'Service', 'Services', 'dashicons-clipboard');
  cbkny_register_cpt('resource', 'Resource', 'Resources', 'dashicons-media-document');
  cbkny_register_cpt('highlight', 'Highlight', 'Highlights', 'dashicons-megaphone');
  cbkny_register_cpt('faq', 'FAQ', 'FAQs', 'dashicons-editor-help');
  cbkny_register_cpt('testimonial', 'Testimonial', 'Testimonials', 'dashicons-format-quote');
});
