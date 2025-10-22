<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?php echo esc_attr(cbkny_get_meta_description()); ?>">
<meta name="keywords" content="<?php echo esc_attr(cbkny_get_meta_keywords()); ?>">
<meta name="author" content="Canna Bookkeeper™ NY">
<meta name="robots" content="index, follow">
<link rel="canonical" href="<?php echo esc_url(cbkny_get_canonical_url()); ?>">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="<?php echo esc_url(cbkny_get_canonical_url()); ?>">
<meta property="og:title" content="<?php echo esc_attr(cbkny_get_og_title()); ?>">
<meta property="og:description" content="<?php echo esc_attr(cbkny_get_meta_description()); ?>">
<meta property="og:image" content="<?php echo esc_url(cbkny_get_og_image()); ?>">
<meta property="og:site_name" content="Canna Bookkeeper™ NY">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="<?php echo esc_url(cbkny_get_canonical_url()); ?>">
<meta property="twitter:title" content="<?php echo esc_attr(cbkny_get_og_title()); ?>">
<meta property="twitter:description" content="<?php echo esc_attr(cbkny_get_meta_description()); ?>">
<meta property="twitter:image" content="<?php echo esc_url(cbkny_get_og_image()); ?>">

<!-- Preconnect to external domains -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://cdnjs.cloudflare.com">
<link rel="dns-prefetch" href="//www.google-analytics.com">

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<a href="#main" class="visually-hidden">Skip to content</a>
<header class="header">
  <div class="container" style="display:flex; align-items:center; justify-content:space-between; padding: 1rem 0;">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="site-branding" style="display: flex; align-items: center; text-decoration: none;">
      <img src="<?php echo esc_url(cbkny_get_option('cbkny_logo_url', 'http://johnd501.sg-host.com/wp-content/uploads/2025/10/cbk-logo.webp')); ?>" alt="<?php echo esc_attr(cbkny_get_option('cbkny_business_name', 'Canna Bookkeeper™ NY')); ?>" style="height: <?php echo esc_attr(cbkny_get_option('cbkny_logo_height', '60')); ?>px; max-height: <?php echo esc_attr(cbkny_get_option('cbkny_logo_height', '60')); ?>px; width: auto;">
    </a>
    <nav aria-label="<?php esc_attr_e('Primary', 'cbkny'); ?>">
      <?php 
      wp_nav_menu([
        'theme_location' => 'primary',
        'container' => false,
        'menu_class' => 'menu',
        'fallback_cb' => function() {
          echo '<ul class="menu">';
          echo '<li><a href="' . home_url('/') . '">Home</a></li>';
          echo '<li><a href="' . home_url('/services') . '">Services</a></li>';
          echo '<li><a href="' . home_url('/about') . '">About</a></li>';
          echo '<li><a href="' . home_url('/resources') . '">Resources</a></li>';
          echo '<li><a href="' . home_url('/contact') . '">Contact</a></li>';
          echo '</ul>';
        }
      ]); 
      ?>
    </nav>
  </div>
</header>
<main id="main">
