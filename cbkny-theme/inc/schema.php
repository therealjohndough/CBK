<?php
if (!defined('ABSPATH')) exit;

function cbkny_output_schema() {
  $data = [
    "@context" => "https://schema.org",
    "@type" => "ProfessionalService",
    "name" => get_bloginfo('name'),
    "url" => home_url('/'),
  ];
  // Pull optional fields from ACF Options if available
  if (function_exists('get_field')) {
    $phone = get_field('phone', 'option');
    $address = get_field('address', 'option');
    $sameAs = get_field('same_as', 'option'); // repeater of links
    if ($phone) $data['telephone'] = $phone;
    if ($address) $data['address'] = $address;
    if ($sameAs && is_array($sameAs)) {
      $data['sameAs'] = array_map(function($row){ return $row['url'] ?? ''; }, $sameAs);
    }
  }
  echo '<script type="application/ld+json">'. wp_json_encode($data) .'</script>';
}
add_action('wp_head', 'cbkny_output_schema', 20);
