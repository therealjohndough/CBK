<?php
/**
 * Google Tag Manager and Analytics Tracking
 * Handles GTM, Google Ads, GA4, and conversion tracking
 */

if (!defined('ABSPATH')) exit;

// Add Google Tag Manager code to head
function cbkny_gtm_head() {
    $gtm_id = cbkny_get_option('cbkny_gtm_id', '');
    
    if (empty($gtm_id)) return;
    
    ?>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','<?php echo esc_js($gtm_id); ?>');</script>
    <!-- End Google Tag Manager -->
    <?php
}
add_action('wp_head', 'cbkny_gtm_head', 1);

// Add Google Tag Manager noscript to body
function cbkny_gtm_body() {
    $gtm_id = cbkny_get_option('cbkny_gtm_id', '');
    
    if (empty($gtm_id)) return;
    
    ?>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo esc_attr($gtm_id); ?>"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <?php
}
add_action('wp_body_open', 'cbkny_gtm_body');

// Add Google Ads conversion tracking
function cbkny_google_ads_tracking() {
    $google_ads_id = cbkny_get_option('cbkny_google_ads_id', '');
    
    if (empty($google_ads_id)) return;
    
    ?>
    <!-- Google Ads Global Site Tag -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_attr($google_ads_id); ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '<?php echo esc_js($google_ads_id); ?>');
    </script>
    <!-- End Google Ads Global Site Tag -->
    <?php
}
add_action('wp_head', 'cbkny_google_ads_tracking', 2);

// Add GA4 tracking (if separate from GTM)
function cbkny_ga4_tracking() {
    $ga4_id = cbkny_get_option('cbkny_ga4_id', '');
    
    // Skip if using GTM (recommended) or no GA4 ID
    if (empty($ga4_id) || !empty(cbkny_get_option('cbkny_gtm_id', ''))) return;
    
    ?>
    <!-- Google Analytics 4 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_attr($ga4_id); ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '<?php echo esc_js($ga4_id); ?>', {
            'anonymize_ip': true,
            'allow_google_signals': false,
            'cookie_flags': 'max-age=7200;secure;samesite=strict'
        });
    </script>
    <!-- End Google Analytics 4 -->
    <?php
}
add_action('wp_head', 'cbkny_ga4_tracking', 3);

// Enhanced ecommerce tracking for downloads
function cbkny_track_download_event($download_type, $download_name, $page_url = '') {
    $gtm_id = cbkny_get_option('cbkny_gtm_id', '');
    
    if (empty($gtm_id)) return;
    
    if (empty($page_url)) {
        $page_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : home_url();
    }
    
    ?>
    <script>
    gtag('event', 'download', {
        'event_category': 'Downloads',
        'event_label': '<?php echo esc_js($download_name); ?>',
        'download_type': '<?php echo esc_js($download_type); ?>',
        'page_location': '<?php echo esc_js($page_url); ?>',
        'value': 1
    });
    
    // Send to Google Ads as conversion
    gtag('event', 'conversion', {
        'send_to': '<?php echo esc_js(cbkny_get_option('cbkny_google_ads_id', '')); ?>/<?php echo esc_js(cbkny_get_option('cbkny_conversion_label', '')); ?>',
        'event_category': 'Lead Generation',
        'event_label': '<?php echo esc_js($download_name); ?>',
        'value': 10.0,
        'currency': 'USD'
    });
    </script>
    <?php
}

// Track form submissions
function cbkny_track_form_submission($form_type, $form_name, $page_url = '') {
    $gtm_id = cbkny_get_option('cbkny_gtm_id', '');
    
    if (empty($gtm_id)) return;
    
    if (empty($page_url)) {
        $page_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : home_url();
    }
    
    ?>
    <script>
    gtag('event', 'form_submit', {
        'event_category': 'Form Submissions',
        'event_label': '<?php echo esc_js($form_name); ?>',
        'form_type': '<?php echo esc_js($form_type); ?>',
        'page_location': '<?php echo esc_js($page_url); ?>',
        'value': 1
    });
    
    // Send to Google Ads as conversion
    gtag('event', 'conversion', {
        'send_to': '<?php echo esc_js(cbkny_get_option('cbkny_google_ads_id', '')); ?>/<?php echo esc_js(cbkny_get_option('cbkny_form_conversion_label', '')); ?>',
        'event_category': 'Lead Generation',
        'event_label': '<?php echo esc_js($form_name); ?>',
        'value': 25.0,
        'currency': 'USD'
    });
    </script>
    <?php
}

// Track page views for key landing pages
function cbkny_track_key_page_views() {
    if (!is_page()) return;
    
    $gtm_id = cbkny_get_option('cbkny_gtm_id', '');
    if (empty($gtm_id)) return;
    
    global $post;
    $key_pages = array(
        'services' => 'Services Page View',
        'contact' => 'Contact Page View',
        'about' => 'About Page View',
        'resources' => 'Resources Page View',
        'free-guides' => 'Free Guides Page View',
        'templates' => 'Templates Page View',
        'assessment-tools' => 'Assessment Tools Page View',
        '280e-deduction-guide' => '280E Guide Page View',
        'ny-cannabis-compliance-checklist' => 'Compliance Checklist Page View',
        'audit-readiness-quiz' => 'Audit Quiz Page View',
        '280e-tax-calculator' => 'Tax Calculator Page View'
    );
    
    $page_slug = $post->post_name;
    
    if (array_key_exists($page_slug, $key_pages)) {
        ?>
        <script>
        gtag('event', 'page_view', {
            'event_category': 'Key Pages',
            'event_label': '<?php echo esc_js($key_pages[$page_slug]); ?>',
            'page_title': '<?php echo esc_js(get_the_title()); ?>',
            'page_location': '<?php echo esc_js(get_permalink()); ?>',
            'content_group1': 'Cannabis Accounting',
            'content_group2': '<?php echo esc_js(ucfirst(str_replace('-', ' ', $page_slug))); ?>'
        });
        </script>
        <?php
    }
}
add_action('wp_footer', 'cbkny_track_key_page_views');

// Track outbound links
function cbkny_track_outbound_links() {
    $gtm_id = cbkny_get_option('cbkny_gtm_id', '');
    if (empty($gtm_id)) return;
    
    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Track outbound links
        var links = document.querySelectorAll('a[href^="http"]:not([href*="cbkny.com"])');
        
        links.forEach(function(link) {
            link.addEventListener('click', function(e) {
                var url = this.href;
                var domain = (new URL(url)).hostname;
                
                gtag('event', 'click', {
                    'event_category': 'Outbound Links',
                    'event_label': domain,
                    'transport_type': 'beacon',
                    'page_location': window.location.href
                });
            });
        });
        
        // Track phone number clicks
        var phoneLinks = document.querySelectorAll('a[href^="tel:"]');
        phoneLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                gtag('event', 'phone_call', {
                    'event_category': 'Contact',
                    'event_label': 'Phone Click',
                    'phone_number': this.href.replace('tel:', ''),
                    'page_location': window.location.href
                });
            });
        });
        
        // Track email clicks
        var emailLinks = document.querySelectorAll('a[href^="mailto:"]');
        emailLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                gtag('event', 'email_click', {
                    'event_category': 'Contact',
                    'event_label': 'Email Click',
                    'email_address': this.href.replace('mailto:', ''),
                    'page_location': window.location.href
                });
            });
        });
        
        // Track scroll depth
        var scrollTracked = false;
        window.addEventListener('scroll', function() {
            var scrollPercent = Math.round((window.scrollY / (document.body.scrollHeight - window.innerHeight)) * 100);
            
            if (scrollPercent >= 75 && !scrollTracked) {
                scrollTracked = true;
                gtag('event', 'scroll', {
                    'event_category': 'Engagement',
                    'event_label': '75% Scroll Depth',
                    'value': scrollPercent,
                    'page_location': window.location.href
                });
            }
        });
    });
    </script>
    <?php
}
add_action('wp_footer', 'cbkny_track_outbound_links');

// Add conversion tracking for specific actions
function cbkny_conversion_tracking_script() {
    $google_ads_id = cbkny_get_option('cbkny_google_ads_id', '');
    if (empty($google_ads_id)) return;
    
    ?>
    <script>
    // Function to send conversion events
    function sendConversion(conversionLabel, value = 1, currency = 'USD') {
        gtag('event', 'conversion', {
            'send_to': '<?php echo esc_js($google_ads_id); ?>/' + conversionLabel,
            'value': value,
            'currency': currency,
            'event_category': 'Conversions',
            'page_location': window.location.href
        });
    }
    
    // Track download button clicks
    document.addEventListener('DOMContentLoaded', function() {
        var downloadButtons = document.querySelectorAll('a[href*=".pdf"], a[href*="download"], .download-btn, .btn-download');
        
        downloadButtons.forEach(function(button) {
            button.addEventListener('click', function(e) {
                var downloadName = this.textContent.trim() || this.getAttribute('aria-label') || 'Unknown Download';
                var conversionLabel = '<?php echo esc_js(cbkny_get_option('cbkny_download_conversion_label', '')); ?>';
                
                if (conversionLabel) {
                    sendConversion(conversionLabel, 10);
                }
                
                gtag('event', 'download_start', {
                    'event_category': 'Downloads',
                    'event_label': downloadName,
                    'page_location': window.location.href
                });
            });
        });
        
        // Track form submissions
        var forms = document.querySelectorAll('form');
        forms.forEach(function(form) {
            form.addEventListener('submit', function(e) {
                var formName = this.getAttribute('id') || this.getAttribute('class') || 'Contact Form';
                var conversionLabel = '<?php echo esc_js(cbkny_get_option('cbkny_form_conversion_label', '')); ?>';
                
                if (conversionLabel) {
                    sendConversion(conversionLabel, 25);
                }
                
                gtag('event', 'form_submit', {
                    'event_category': 'Form Submissions',
                    'event_label': formName,
                    'page_location': window.location.href
                });
            });
        });
    });
    </script>
    <?php
}
add_action('wp_footer', 'cbkny_conversion_tracking_script');

// Add to customizer for easy management
function cbkny_tracking_customizer($wp_customize) {
    // Add Tracking Section
    $wp_customize->add_section('cbkny_tracking', array(
        'title' => 'Google Tracking',
        'description' => 'Configure Google Tag Manager, Google Ads, and Analytics tracking.',
        'priority' => 160,
    ));
    
    // Google Tag Manager ID
    $wp_customize->add_setting('cbkny_gtm_id', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('cbkny_gtm_id', array(
        'label' => 'Google Tag Manager ID',
        'description' => 'Enter your GTM ID (e.g., GTM-XXXXXXX). This is the recommended way to manage all tracking.',
        'section' => 'cbkny_tracking',
        'type' => 'text',
    ));
    
    // Google Ads ID
    $wp_customize->add_setting('cbkny_google_ads_id', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('cbkny_google_ads_id', array(
        'label' => 'Google Ads ID',
        'description' => 'Enter your Google Ads ID (e.g., AW-XXXXXXXXX) for conversion tracking.',
        'section' => 'cbkny_tracking',
        'type' => 'text',
    ));
    
    // Download Conversion Label
    $wp_customize->add_setting('cbkny_download_conversion_label', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('cbkny_download_conversion_label', array(
        'label' => 'Download Conversion Label',
        'description' => 'Google Ads conversion label for downloads (e.g., AbC123dEfG)',
        'section' => 'cbkny_tracking',
        'type' => 'text',
    ));
    
    // Form Conversion Label
    $wp_customize->add_setting('cbkny_form_conversion_label', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('cbkny_form_conversion_label', array(
        'label' => 'Form Conversion Label',
        'description' => 'Google Ads conversion label for form submissions (e.g., AbC123dEfG)',
        'section' => 'cbkny_tracking',
        'type' => 'text',
    ));
    
    // GA4 ID (optional if using GTM)
    $wp_customize->add_setting('cbkny_ga4_id', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('cbkny_ga4_id', array(
        'label' => 'Google Analytics 4 ID (Optional)',
        'description' => 'Only use if NOT using GTM. Enter GA4 ID (e.g., G-XXXXXXXXXX)',
        'section' => 'cbkny_tracking',
        'type' => 'text',
    ));
    
    // Privacy Settings
    $wp_customize->add_setting('cbkny_tracking_privacy', array(
        'default' => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    
    $wp_customize->add_control('cbkny_tracking_privacy', array(
        'label' => 'Enable Privacy-Friendly Tracking',
        'description' => 'Anonymize IPs, respect Do Not Track, and use secure cookies.',
        'section' => 'cbkny_tracking',
        'type' => 'checkbox',
    ));
}
add_action('customize_register', 'cbkny_tracking_customizer');

// Add structured data for better tracking
function cbkny_add_business_structured_data() {
    if (!is_front_page()) return;
    
    $business_name = cbkny_get_option('cbkny_business_name', 'Canna Bookkeeper™ NY');
    $phone = cbkny_get_option('cbkny_phone', '');
    $email = cbkny_get_option('cbkny_email', '');
    $address = cbkny_get_option('cbkny_address', '');
    
    ?>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "AccountingService",
        "name": "<?php echo esc_js($business_name); ?>",
        "description": "Specialized cannabis accounting and bookkeeping services for New York dispensaries, cultivators, and processors. Expert 280E compliance and OCM reporting.",
        "url": "<?php echo esc_js(home_url()); ?>",
        "telephone": "<?php echo esc_js($phone); ?>",
        "email": "<?php echo esc_js($email); ?>",
        "address": {
            "@type": "PostalAddress",
            "addressLocality": "New York",
            "addressRegion": "NY",
            "addressCountry": "US"
        },
        "serviceArea": {
            "@type": "State",
            "name": "New York"
        },
        "hasOfferCatalog": {
            "@type": "OfferCatalog",
            "name": "Cannabis Accounting Services",
            "itemListElement": [
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "Monthly Bookkeeping",
                        "description": "Comprehensive monthly bookkeeping for cannabis businesses"
                    }
                },
                {
                    "@type": "Offer", 
                    "itemOffered": {
                        "@type": "Service",
                        "name": "280E Compliance",
                        "description": "Expert 280E tax compliance and planning"
                    }
                },
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service", 
                        "name": "OCM Reporting",
                        "description": "New York Office of Cannabis Management reporting"
                    }
                }
            ]
        }
    }
    </script>
    <?php
}
add_action('wp_head', 'cbkny_add_business_structured_data');

// Helper function to get tracking option
function cbkny_get_tracking_option($option, $default = '') {
    return get_theme_mod($option, $default);
}

// Add admin notice for tracking setup
function cbkny_tracking_admin_notice() {
    $gtm_id = cbkny_get_option('cbkny_gtm_id', '');
    $google_ads_id = cbkny_get_option('cbkny_google_ads_id', '');
    
    if (empty($gtm_id) && empty($google_ads_id)) {
        ?>
        <div class="notice notice-warning is-dismissible">
            <p><strong>CBK Tracking Setup:</strong> Configure your Google Tag Manager and Google Ads tracking in <a href="<?php echo admin_url('customize.php?autofocus[section]=cbkny_tracking'); ?>">Appearance > Customize > Google Tracking</a> to start measuring conversions and performance.</p>
        </div>
        <?php
    }
}
add_action('admin_notices', 'cbkny_tracking_admin_notice');