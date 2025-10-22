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
    
    <!-- Mobile Menu Toggle -->
    <button class="mobile-menu-toggle" aria-label="Toggle mobile menu">
      <i class="fas fa-bars"></i>
    </button>
    
    <!-- Desktop Menu -->
    <nav aria-label="<?php esc_attr_e('Primary', 'cbkny'); ?>" class="desktop-menu">
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
  
  <!-- Mobile Menu Overlay -->
  <div class="mobile-menu" id="mobile-menu">
    <div class="mobile-menu-header">
      <img src="<?php echo esc_url(cbkny_get_option('cbkny_logo_url', 'http://johnd501.sg-host.com/wp-content/uploads/2025/10/cbk-logo.webp')); ?>" alt="<?php echo esc_attr(cbkny_get_option('cbkny_business_name', 'Canna Bookkeeper™ NY')); ?>" style="height: 40px; width: auto;">
      <button class="mobile-menu-close" aria-label="Close mobile menu">
        <i class="fas fa-times"></i>
      </button>
    </div>
    
    <nav aria-label="<?php esc_attr_e('Mobile Navigation', 'cbkny'); ?>">
      <?php 
      wp_nav_menu([
        'theme_location' => 'primary',
        'container' => false,
        'menu_class' => 'mobile-menu-list',
        'fallback_cb' => function() {
          echo '<ul class="mobile-menu-list">';
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
    
    <div style="margin-top: 2rem; padding-top: 2rem; border-top: 1px solid var(--cbkny-border);">
      <p style="color: var(--cbkny-gray); font-size: 0.9rem; margin-bottom: 1rem;">
        <strong>Phone:</strong> <?php echo esc_html(cbkny_get_option('cbkny_phone', '(716) XXX-XXXX')); ?><br>
        <strong>Email:</strong> <?php echo esc_html(cbkny_get_option('cbkny_email', 'info@cbkny.com')); ?>
      </p>
      
      <div style="display: flex; gap: 1rem; justify-content: center;">
        <?php if (cbkny_get_option('cbkny_linkedin_url')): ?>
        <a href="<?php echo esc_url(cbkny_get_option('cbkny_linkedin_url')); ?>" target="_blank" rel="noopener" style="color: var(--cbkny-pink); font-size: 1.5rem; text-decoration: none;" aria-label="LinkedIn">
          <i class="fab fa-linkedin"></i>
        </a>
        <?php endif; ?>
        
        <?php 
        $instagram_url = cbkny_get_option('cbkny_instagram_url', 'https://www.instagram.com/cannabookkeeper');
        if ($instagram_url): ?>
        <a href="<?php echo esc_url($instagram_url); ?>" target="_blank" rel="noopener" style="color: var(--cbkny-pink); font-size: 1.5rem; text-decoration: none;" aria-label="Instagram">
          <i class="fab fa-instagram"></i>
        </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</header>
<main id="main">
