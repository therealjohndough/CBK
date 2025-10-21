<?php
if (!defined('ABSPATH')) exit;

// Add customizer options
add_action('customize_register', 'cbkny_customize_register');

function cbkny_customize_register($wp_customize) {
  
  // Add CBKNY Panel
  $wp_customize->add_panel('cbkny_options', [
    'title' => 'CBKNY Theme Options',
    'description' => 'Customize your Canna Bookkeeper website',
    'priority' => 30,
  ]);

  // === HOMEPAGE SECTION ===
  $wp_customize->add_section('cbkny_homepage', [
    'title' => 'Homepage Content',
    'panel' => 'cbkny_options',
    'priority' => 10,
  ]);

  // Hero Section
  $wp_customize->add_setting('cbkny_hero_title', [
    'default' => 'Cannabis Bookkeeping for New York Operators',
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  $wp_customize->add_control('cbkny_hero_title', [
    'label' => 'Hero Title',
    'section' => 'cbkny_homepage',
    'type' => 'text',
  ]);

  $wp_customize->add_setting('cbkny_hero_subtitle', [
    'default' => 'OCM & 280E compliant accounting that keeps you audit-ready',
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  $wp_customize->add_control('cbkny_hero_subtitle', [
    'label' => 'Hero Subtitle',
    'section' => 'cbkny_homepage',
    'type' => 'text',
  ]);

  $wp_customize->add_setting('cbkny_hero_primary_button_text', [
    'default' => 'Book Free Consultation',
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  $wp_customize->add_control('cbkny_hero_primary_button_text', [
    'label' => 'Primary Button Text',
    'section' => 'cbkny_homepage',
    'type' => 'text',
  ]);

  $wp_customize->add_setting('cbkny_hero_primary_button_link', [
    'default' => '/contact',
    'sanitize_callback' => 'esc_url_raw',
  ]);
  $wp_customize->add_control('cbkny_hero_primary_button_link', [
    'label' => 'Primary Button Link',
    'section' => 'cbkny_homepage',
    'type' => 'url',
  ]);

  $wp_customize->add_setting('cbkny_hero_secondary_button_text', [
    'default' => 'Get Free Resources',
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  $wp_customize->add_control('cbkny_hero_secondary_button_text', [
    'label' => 'Secondary Button Text',
    'section' => 'cbkny_homepage',
    'type' => 'text',
  ]);

  $wp_customize->add_setting('cbkny_hero_secondary_button_link', [
    'default' => '/resources',
    'sanitize_callback' => 'esc_url_raw',
  ]);
  $wp_customize->add_control('cbkny_hero_secondary_button_link', [
    'label' => 'Secondary Button Link',
    'section' => 'cbkny_homepage',
    'type' => 'url',
  ]);

  // Trust Badge
  $wp_customize->add_setting('cbkny_trust_badge_text', [
    'default' => 'Trusted by NY cannabis operators statewide',
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  $wp_customize->add_control('cbkny_trust_badge_text', [
    'label' => 'Trust Badge Text',
    'section' => 'cbkny_homepage',
    'type' => 'text',
  ]);

  // === BUSINESS INFO SECTION ===
  $wp_customize->add_section('cbkny_business_info', [
    'title' => 'Business Information',
    'panel' => 'cbkny_options',
    'priority' => 20,
  ]);

  $wp_customize->add_setting('cbkny_business_name', [
    'default' => 'Canna Bookkeeper™ NY',
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  $wp_customize->add_control('cbkny_business_name', [
    'label' => 'Business Name',
    'section' => 'cbkny_business_info',
    'type' => 'text',
  ]);

  // Logo Settings
  $wp_customize->add_setting('cbkny_logo_url', [
    'default' => 'http://johnd501.sg-host.com/wp-content/uploads/2025/10/cbk-logo.webp',
    'sanitize_callback' => 'esc_url_raw',
  ]);
  $wp_customize->add_control('cbkny_logo_url', [
    'label' => 'Logo URL',
    'section' => 'cbkny_business_info',
    'type' => 'url',
    'description' => 'Upload your logo and paste the URL here',
  ]);

  $wp_customize->add_setting('cbkny_logo_height', [
    'default' => '60',
    'sanitize_callback' => 'absint',
  ]);
  $wp_customize->add_control('cbkny_logo_height', [
    'label' => 'Logo Height (px)',
    'section' => 'cbkny_business_info',
    'type' => 'number',
    'input_attrs' => [
      'min' => 30,
      'max' => 120,
      'step' => 5,
    ],
  ]);

  $wp_customize->add_setting('cbkny_phone', [
    'default' => '(716) XXX-XXXX',
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  $wp_customize->add_control('cbkny_phone', [
    'label' => 'Phone Number',
    'section' => 'cbkny_business_info',
    'type' => 'text',
  ]);

  $wp_customize->add_setting('cbkny_email', [
    'default' => 'info@cbkny.com',
    'sanitize_callback' => 'sanitize_email',
  ]);
  $wp_customize->add_control('cbkny_email', [
    'label' => 'Email Address',
    'section' => 'cbkny_business_info',
    'type' => 'email',
  ]);

  $wp_customize->add_setting('cbkny_address', [
    'default' => 'Buffalo, NY',
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  $wp_customize->add_control('cbkny_address', [
    'label' => 'Business Address',
    'section' => 'cbkny_business_info',
    'type' => 'text',
  ]);

  // Phone number update control
  $wp_customize->add_setting('cbkny_phone_update', [
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  $wp_customize->add_control('cbkny_phone_update', [
    'label' => 'Update Phone Number',
    'section' => 'cbkny_business_info',
    'type' => 'text',
    'description' => 'Enter new phone number to update across the site',
    'input_attrs' => [
      'placeholder' => 'e.g., (716) 555-1234',
    ],
  ]);

  // Add JavaScript to sync phone number updates
  $wp_customize->add_setting('cbkny_phone_update_js', [
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  
  // Add JavaScript for real-time phone number updates
  add_action('customize_preview_init', function() {
    wp_add_inline_script('customize-preview', '
      wp.customize("cbkny_phone_update", function(value) {
        value.bind(function(newval) {
          if (newval) {
            // Update the main phone setting
            wp.customize("cbkny_phone").set(newval);
          }
        });
      });
    ');
  });

  // === SERVICES SECTION ===
  $wp_customize->add_section('cbkny_services', [
    'title' => 'Services',
    'panel' => 'cbkny_options',
    'priority' => 30,
  ]);

  // Service 1
  $wp_customize->add_setting('cbkny_service_1_title', [
    'default' => 'Monthly Bookkeeping',
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  $wp_customize->add_control('cbkny_service_1_title', [
    'label' => 'Service 1 Title',
    'section' => 'cbkny_services',
    'type' => 'text',
  ]);

  $wp_customize->add_setting('cbkny_service_1_description', [
    'default' => 'Full cannabis accounting & reconciliations built for OCM and IRS 280E compliance. Stay audit-ready with accurate expense categorization.',
    'sanitize_callback' => 'sanitize_textarea_field',
  ]);
  $wp_customize->add_control('cbkny_service_1_description', [
    'label' => 'Service 1 Description',
    'section' => 'cbkny_services',
    'type' => 'textarea',
  ]);

  // Service 2
  $wp_customize->add_setting('cbkny_service_2_title', [
    'default' => 'Tax & Compliance Prep',
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  $wp_customize->add_control('cbkny_service_2_title', [
    'label' => 'Service 2 Title',
    'section' => 'cbkny_services',
    'type' => 'text',
  ]);

  $wp_customize->add_setting('cbkny_service_2_description', [
    'default' => '280E tax strategy, OCM reporting, and audit preparation. We handle the complex tax requirements so you can focus on growing your business.',
    'sanitize_callback' => 'sanitize_textarea_field',
  ]);
  $wp_customize->add_control('cbkny_service_2_description', [
    'label' => 'Service 2 Description',
    'section' => 'cbkny_services',
    'type' => 'textarea',
  ]);

  // Service 3
  $wp_customize->add_setting('cbkny_service_3_title', [
    'default' => 'Business Advisory',
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  $wp_customize->add_control('cbkny_service_3_title', [
    'label' => 'Service 3 Title',
    'section' => 'cbkny_services',
    'type' => 'text',
  ]);

  $wp_customize->add_setting('cbkny_service_3_description', [
    'default' => 'Strategic financial guidance to improve cash flow, cost tracking, and prepare for license scalability across multiple entities.',
    'sanitize_callback' => 'sanitize_textarea_field',
  ]);
  $wp_customize->add_control('cbkny_service_3_description', [
    'label' => 'Service 3 Description',
    'section' => 'cbkny_services',
    'type' => 'textarea',
  ]);

  // === ABOUT SECTION ===
  $wp_customize->add_section('cbkny_about', [
    'title' => 'About Page',
    'panel' => 'cbkny_options',
    'priority' => 40,
  ]);

  $wp_customize->add_setting('cbkny_about_title', [
    'default' => 'About Rosanna St. John',
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  $wp_customize->add_control('cbkny_about_title', [
    'label' => 'About Page Title',
    'section' => 'cbkny_about',
    'type' => 'text',
  ]);

  $wp_customize->add_setting('cbkny_about_subtitle', [
    'default' => 'Your trusted cannabis accounting specialist in New York',
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  $wp_customize->add_control('cbkny_about_subtitle', [
    'label' => 'About Page Subtitle',
    'section' => 'cbkny_about',
    'type' => 'text',
  ]);

  $wp_customize->add_setting('cbkny_about_bio', [
    'default' => "I'm Rosanna St. John, a Certified Bookkeeper accredited by the National Association of Certified Public Bookkeepers. My expertise lies in serving high-compliance industries, with a specialized focus on cannabis accounting.",
    'sanitize_callback' => 'sanitize_textarea_field',
  ]);
  $wp_customize->add_control('cbkny_about_bio', [
    'label' => 'Bio Text',
    'section' => 'cbkny_about',
    'type' => 'textarea',
  ]);

  // === LEAD MAGNETS SECTION ===
  $wp_customize->add_section('cbkny_lead_magnets', [
    'title' => 'Lead Magnets',
    'panel' => 'cbkny_options',
    'priority' => 50,
  ]);

  // Lead Magnet 1
  $wp_customize->add_setting('cbkny_lead_magnet_1_title', [
    'default' => 'NY Cannabis Tax Compliance Checklist',
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  $wp_customize->add_control('cbkny_lead_magnet_1_title', [
    'label' => 'Lead Magnet 1 Title',
    'section' => 'cbkny_lead_magnets',
    'type' => 'text',
  ]);

  $wp_customize->add_setting('cbkny_lead_magnet_1_description', [
    'default' => 'A comprehensive checklist covering all NY cannabis tax requirements, 280E compliance, and OCM reporting deadlines.',
    'sanitize_callback' => 'sanitize_textarea_field',
  ]);
  $wp_customize->add_control('cbkny_lead_magnet_1_description', [
    'label' => 'Lead Magnet 1 Description',
    'section' => 'cbkny_lead_magnets',
    'type' => 'textarea',
  ]);

  // Lead Magnet 2
  $wp_customize->add_setting('cbkny_lead_magnet_2_title', [
    'default' => '280E Deduction Guide for Cannabis Businesses',
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  $wp_customize->add_control('cbkny_lead_magnet_2_title', [
    'label' => 'Lead Magnet 2 Title',
    'section' => 'cbkny_lead_magnets',
    'type' => 'text',
  ]);

  $wp_customize->add_setting('cbkny_lead_magnet_2_description', [
    'default' => 'Learn how to maximize your deductions under 280E while staying fully compliant with IRS regulations.',
    'sanitize_callback' => 'sanitize_textarea_field',
  ]);
  $wp_customize->add_control('cbkny_lead_magnet_2_description', [
    'label' => 'Lead Magnet 2 Description',
    'section' => 'cbkny_lead_magnets',
    'type' => 'textarea',
  ]);

  // === SOCIAL MEDIA SECTION ===
  $wp_customize->add_section('cbkny_social', [
    'title' => 'Social Media',
    'panel' => 'cbkny_options',
    'priority' => 60,
  ]);

  $wp_customize->add_setting('cbkny_linkedin_url', [
    'default' => 'https://www.linkedin.com/in/rosanna-st-john-76839a36/',
    'sanitize_callback' => 'esc_url_raw',
  ]);
  $wp_customize->add_control('cbkny_linkedin_url', [
    'label' => 'LinkedIn URL',
    'section' => 'cbkny_social',
    'type' => 'url',
  ]);

  $wp_customize->add_setting('cbkny_instagram_url', [
    'default' => 'https://www.instagram.com/cannabookkeeper',
    'sanitize_callback' => 'esc_url_raw',
  ]);
  $wp_customize->add_control('cbkny_instagram_url', [
    'label' => 'Instagram URL',
    'section' => 'cbkny_social',
    'type' => 'url',
  ]);

  $wp_customize->add_setting('cbkny_twitter_url', [
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ]);
  $wp_customize->add_control('cbkny_twitter_url', [
    'label' => 'Twitter URL',
    'section' => 'cbkny_social',
    'type' => 'url',
  ]);

  $wp_customize->add_setting('cbkny_facebook_url', [
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ]);
  $wp_customize->add_control('cbkny_facebook_url', [
    'label' => 'Facebook URL',
    'section' => 'cbkny_social',
    'type' => 'url',
  ]);

  // === BRANDING & COLORS SECTION ===
  $wp_customize->add_section('cbkny_branding', [
    'title' => 'Branding & Colors',
    'panel' => 'cbkny_options',
    'priority' => 70,
  ]);

  $wp_customize->add_setting('cbkny_primary_color', [
    'default' => '#F8BBD9',
    'sanitize_callback' => 'sanitize_hex_color',
  ]);
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cbkny_primary_color', [
    'label' => 'Primary Color (Pink)',
    'section' => 'cbkny_branding',
  ]));

  $wp_customize->add_setting('cbkny_secondary_color', [
    'default' => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color',
  ]);
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cbkny_secondary_color', [
    'label' => 'Secondary Color (White)',
    'section' => 'cbkny_branding',
  ]));

  $wp_customize->add_setting('cbkny_text_color', [
    'default' => '#000000',
    'sanitize_callback' => 'sanitize_hex_color',
  ]);
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cbkny_text_color', [
    'label' => 'Text Color (Black)',
    'section' => 'cbkny_branding',
  ]));

  // === CONTACT SECTION ===
  $wp_customize->add_section('cbkny_contact', [
    'title' => 'Contact Information',
    'panel' => 'cbkny_options',
    'priority' => 80,
  ]);

  $wp_customize->add_setting('cbkny_contact_form_title', [
    'default' => 'Get Your Free Consultation',
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  $wp_customize->add_control('cbkny_contact_form_title', [
    'label' => 'Contact Form Title',
    'section' => 'cbkny_contact',
    'type' => 'text',
  ]);

  $wp_customize->add_setting('cbkny_contact_form_subtitle', [
    'default' => 'Ready to get your cannabis business audit-ready? Let\'s talk.',
    'sanitize_callback' => 'sanitize_textarea_field',
  ]);
  $wp_customize->add_control('cbkny_contact_form_subtitle', [
    'label' => 'Contact Form Subtitle',
    'section' => 'cbkny_contact',
    'type' => 'textarea',
  ]);

  $wp_customize->add_setting('cbkny_contact_button_text', [
    'default' => 'Send Message',
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  $wp_customize->add_control('cbkny_contact_button_text', [
    'label' => 'Contact Button Text',
    'section' => 'cbkny_contact',
    'type' => 'text',
  ]);

  // === FOOTER SECTION ===
  $wp_customize->add_section('cbkny_footer', [
    'title' => 'Footer Settings',
    'panel' => 'cbkny_options',
    'priority' => 90,
  ]);

  $wp_customize->add_setting('cbkny_footer_text', [
    'default' => '© 2024 Canna Bookkeeper™ NY. All rights reserved. | Professional cannabis accounting services in New York.',
    'sanitize_callback' => 'sanitize_textarea_field',
  ]);
  $wp_customize->add_control('cbkny_footer_text', [
    'label' => 'Footer Copyright Text',
    'section' => 'cbkny_footer',
    'type' => 'textarea',
  ]);

  $wp_customize->add_setting('cbkny_footer_disclaimer', [
    'default' => 'This website and its content are for informational purposes only and do not constitute professional advice.',
    'sanitize_callback' => 'sanitize_textarea_field',
  ]);
  $wp_customize->add_control('cbkny_footer_disclaimer', [
    'label' => 'Footer Disclaimer',
    'section' => 'cbkny_footer',
    'type' => 'textarea',
  ]);

  // === CALL-TO-ACTION SECTION ===
  $wp_customize->add_section('cbkny_cta', [
    'title' => 'Call-to-Action Sections',
    'panel' => 'cbkny_options',
    'priority' => 100,
  ]);

  $wp_customize->add_setting('cbkny_cta_title', [
    'default' => 'Ready to Get Started?',
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  $wp_customize->add_control('cbkny_cta_title', [
    'label' => 'CTA Title',
    'section' => 'cbkny_cta',
    'type' => 'text',
  ]);

  $wp_customize->add_setting('cbkny_cta_subtitle', [
    'default' => 'Book your free consultation today and take the first step toward audit-ready bookkeeping.',
    'sanitize_callback' => 'sanitize_textarea_field',
  ]);
  $wp_customize->add_control('cbkny_cta_subtitle', [
    'label' => 'CTA Subtitle',
    'section' => 'cbkny_cta',
    'type' => 'textarea',
  ]);

  $wp_customize->add_setting('cbkny_cta_button_text', [
    'default' => 'Schedule Free Consultation',
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  $wp_customize->add_control('cbkny_cta_button_text', [
    'label' => 'CTA Button Text',
    'section' => 'cbkny_cta',
    'type' => 'text',
  ]);

  $wp_customize->add_setting('cbkny_cta_button_link', [
    'default' => '/contact',
    'sanitize_callback' => 'esc_url_raw',
  ]);
  $wp_customize->add_control('cbkny_cta_button_link', [
    'label' => 'CTA Button Link',
    'section' => 'cbkny_cta',
    'type' => 'url',
  ]);
}

// Helper function to get customizer values
function cbkny_get_option($option_name, $default = '') {
  return get_theme_mod($option_name, $default);
}
