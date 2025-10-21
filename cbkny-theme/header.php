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
      <img src="http://johnd501.sg-host.com/wp-content/uploads/2025/10/cbk-logo.webp" alt="<?php echo esc_attr(cbkny_get_option('cbkny_business_name', 'Canna Bookkeeper™ NY')); ?>" style="height: 60px; max-height: 60px; width: auto; margin-right: 0.5rem;">
      <span class="site-title" style="font-weight:700; color: var(--cbkny-black);"><?php echo esc_html(cbkny_get_option('cbkny_business_name', 'Canna Bookkeeper™ NY')); ?></span>
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
