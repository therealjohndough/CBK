<?php
if (!defined('ABSPATH')) exit;

/**
 * Lead magnet download shortcode
 * [lead_magnet type="compliance-checklist"]
 */
add_shortcode('lead_magnet', function($atts){
  $atts = shortcode_atts([
    'type' => 'compliance-checklist',
    'title' => 'Download Free Guide',
    'description' => 'Get our free cannabis accounting guide'
  ], $atts);
  
  ob_start(); ?>
  <div class="card" style="text-align: center; padding: 2rem;">
    <h3 style="color: var(--cbkny-pink); margin-bottom: 1rem;"><?php echo esc_html($atts['title']); ?></h3>
    <p style="margin-bottom: 1.5rem;"><?php echo esc_html($atts['description']); ?></p>
    <button class="btn btn-primary" onclick="downloadResource('<?php echo esc_attr($atts['type']); ?>')" style="width: 100%;">
      Download Free Guide
    </button>
  </div>
  <?php
  return ob_get_clean();
});

/**
 * Contact form shortcode
 * [contact_form]
 */
add_shortcode('contact_form', function($atts){
  ob_start(); ?>
  <form id="contact-form" style="display: grid; gap: 1rem;">
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
      <div>
        <label for="first-name" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">First Name *</label>
        <input type="text" id="first-name" name="first_name" required style="width: 100%;">
      </div>
      <div>
        <label for="last-name" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Last Name *</label>
        <input type="text" id="last-name" name="last_name" required style="width: 100%;">
      </div>
    </div>
    
    <div>
      <label for="email" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Email *</label>
      <input type="email" id="email" name="email" required style="width: 100%;">
    </div>
    
    <div>
      <label for="phone" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Phone *</label>
      <input type="tel" id="phone" name="phone" required style="width: 100%;">
    </div>
    
    <div>
      <label for="business-name" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Business Name *</label>
      <input type="text" id="business-name" name="business_name" required style="width: 100%;">
    </div>
    
    <div>
      <label for="message" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">How can we help? *</label>
      <textarea id="message" name="message" rows="4" required style="width: 100%; resize: vertical;"></textarea>
    </div>
    
    <button type="submit" class="btn btn-primary" style="width: 100%; font-size: 1.1rem; padding: 1rem;">Send Message</button>
  </form>
  <?php
  return ob_get_clean();
});
