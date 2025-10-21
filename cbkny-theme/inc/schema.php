<?php
if (!defined('ABSPATH')) exit;

function cbkny_output_schema() {
  $data = [
    "@context" => "https://schema.org",
    "@type" => "ProfessionalService",
    "name" => "Canna Bookkeeper™ NY",
    "alternateName" => "Canna Bookkeeper LLC",
    "url" => home_url('/'),
    "description" => "Professional cannabis accounting services in New York. 280E compliance, OCM reporting, and audit-ready bookkeeping for dispensaries, cultivators, and processors.",
    "serviceType" => "Cannabis Accounting Services",
    "areaServed" => [
      "@type" => "State",
      "name" => "New York"
    ],
    "hasOfferCatalog" => [
      "@type" => "OfferCatalog",
      "name" => "Cannabis Accounting Services",
      "itemListElement" => [
        [
          "@type" => "Offer",
          "itemOffered" => [
            "@type" => "Service",
            "name" => "Monthly Bookkeeping",
            "description" => "Full cannabis accounting & reconciliations built for OCM and IRS 280E compliance"
          ]
        ],
        [
          "@type" => "Offer", 
          "itemOffered" => [
            "@type" => "Service",
            "name" => "Tax Preparation & 280E Strategy",
            "description" => "Stay audit-ready with accurate expense categorization and strategic tax planning"
          ]
        ],
        [
          "@type" => "Offer",
          "itemOffered" => [
            "@type" => "Service", 
            "name" => "Cleanup & Catch-Up Services",
            "description" => "Historical bookkeeping services to reconstruct records and get you compliant"
          ]
        ],
        [
          "@type" => "Offer",
          "itemOffered" => [
            "@type" => "Service",
            "name" => "CFO Advisory Services", 
            "description" => "Strategic financial guidance to improve cash flow, cost tracking, and license scalability"
          ]
        ]
      ]
    ],
    "provider" => [
      "@type" => "Person",
      "name" => "Rosanna St. John",
      "jobTitle" => "Certified Bookkeeper",
      "description" => "NACPB Certified Bookkeeper specializing in cannabis accounting and 280E compliance",
      "alumniOf" => "Niagara University",
      "hasCredential" => [
        "@type" => "EducationalOccupationalCredential",
        "name" => "NACPB Certified Bookkeeper",
        "credentialCategory" => "certification"
      ]
    ],
    "address" => [
      "@type" => "PostalAddress",
      "addressLocality" => "Buffalo",
      "addressRegion" => "NY",
      "addressCountry" => "US"
    ],
    "telephone" => "+1716-XXX-XXXX",
    "email" => "info@cbkny.com",
    "openingHours" => "Mo-Fr 09:00-17:00",
    "priceRange" => "$500-$3000",
    "aggregateRating" => [
      "@type" => "AggregateRating",
      "ratingValue" => "5.0",
      "reviewCount" => "1"
    ]
  ];
  
  // Pull additional fields from ACF Options if available
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
  
  echo '<script type="application/ld+json">'. wp_json_encode($data, JSON_PRETTY_PRINT) .'</script>';
}
add_action('wp_head', 'cbkny_output_schema', 20);
