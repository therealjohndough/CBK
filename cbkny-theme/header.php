<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Professional cannabis accounting services in New York. 280E compliance, OCM reporting, and audit-ready bookkeeping for dispensaries, cultivators, and processors.">
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
