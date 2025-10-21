<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<a href="#main" class="visually-hidden">Skip to content</a>
<header class="header">
  <div class="container" style="display:flex; align-items:center; justify-content:space-between; padding: .75rem 0;">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="site-title" style="font-weight:700;"><?php bloginfo('name'); ?></a>
    <nav aria-label="<?php esc_attr_e('Primary', 'cbkny'); ?>">
      <?php wp_nav_menu([ 'theme_location'=>'primary', 'container'=>false, 'menu_class'=>'menu', 'fallback_cb'=>false ]); ?>
    </nav>
  </div>
</header>
<main id="main">
