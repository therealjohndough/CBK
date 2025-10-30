<?php
/**
 * Tracking Management Admin Page
 */

// Add tracking management admin menu
function cbkny_add_tracking_management_menu() {
    add_management_page(
        'Google Tracking Setup',
        'Google Tracking',
        'manage_options',
        'cbkny-tracking-setup',
        'cbkny_tracking_setup_admin_page'
    );
}
add_action('admin_menu', 'cbkny_add_tracking_management_menu');

// Admin page for tracking setup
function cbkny_tracking_setup_admin_page() {
    if (isset($_POST['save_tracking'])) {
        // Save tracking settings
        set_theme_mod('cbkny_gtm_id', sanitize_text_field($_POST['gtm_id']));
        set_theme_mod('cbkny_google_ads_id', sanitize_text_field($_POST['google_ads_id']));
        set_theme_mod('cbkny_download_conversion_label', sanitize_text_field($_POST['download_conversion_label']));
        set_theme_mod('cbkny_form_conversion_label', sanitize_text_field($_POST['form_conversion_label']));
        set_theme_mod('cbkny_ga4_id', sanitize_text_field($_POST['ga4_id']));
        set_theme_mod('cbkny_tracking_privacy', isset($_POST['tracking_privacy']));
        
        echo '<div class="notice notice-success"><p>Tracking settings saved successfully!</p></div>';
    }
    
    $gtm_id = get_theme_mod('cbkny_gtm_id', '');
    $google_ads_id = get_theme_mod('cbkny_google_ads_id', '');
    $download_conversion_label = get_theme_mod('cbkny_download_conversion_label', '');
    $form_conversion_label = get_theme_mod('cbkny_form_conversion_label', '');
    $ga4_id = get_theme_mod('cbkny_ga4_id', '');
    $tracking_privacy = get_theme_mod('cbkny_tracking_privacy', true);
    
    ?>
    <div class="wrap">
        <h1>Google Tracking Setup</h1>
        <p>Configure your Google Tag Manager, Google Ads, and Analytics tracking for the CBK website.</p>
        
        <form method="post" style="max-width: 800px;">
            <div class="card" style="padding: 20px; margin: 20px 0;">
                <h2>🎯 Google Tag Manager (Recommended)</h2>
                <p><strong>This is the recommended approach for managing all your tracking codes.</strong></p>
                
                <table class="form-table">
                    <tr>
                        <th scope="row"><label for="gtm_id">GTM Container ID</label></th>
                        <td>
                            <input type="text" id="gtm_id" name="gtm_id" value="<?php echo esc_attr($gtm_id); ?>" placeholder="GTM-XXXXXXX" class="regular-text" />
                            <p class="description">Enter your Google Tag Manager container ID (e.g., GTM-XXXXXXX)</p>
                        </td>
                    </tr>
                </table>
                
                <h3>How to set up GTM:</h3>
                <ol>
                    <li>Go to <a href="https://tagmanager.google.com" target="_blank">Google Tag Manager</a></li>
                    <li>Create a new container for cbkny.com</li>
                    <li>Copy the GTM ID (GTM-XXXXXXX) and paste it above</li>
                    <li>In GTM, add tags for Google Analytics 4, Google Ads, and Facebook Pixel</li>
                </ol>
            </div>
            
            <div class="card" style="padding: 20px; margin: 20px 0;">
                <h2>🛍️ Google Ads Conversion Tracking</h2>
                
                <table class="form-table">
                    <tr>
                        <th scope="row"><label for="google_ads_id">Google Ads ID</label></th>
                        <td>
                            <input type="text" id="google_ads_id" name="google_ads_id" value="<?php echo esc_attr($google_ads_id); ?>" placeholder="AW-XXXXXXXXX" class="regular-text" />
                            <p class="description">Enter your Google Ads account ID (e.g., AW-XXXXXXXXX)</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="download_conversion_label">Download Conversion Label</label></th>
                        <td>
                            <input type="text" id="download_conversion_label" name="download_conversion_label" value="<?php echo esc_attr($download_conversion_label); ?>" placeholder="AbC123dEfG" class="regular-text" />
                            <p class="description">Conversion label for PDF downloads and lead magnets</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="form_conversion_label">Form Conversion Label</label></th>
                        <td>
                            <input type="text" id="form_conversion_label" name="form_conversion_label" value="<?php echo esc_attr($form_conversion_label); ?>" placeholder="XyZ456hIjK" class="regular-text" />
                            <p class="description">Conversion label for contact form submissions</p>
                        </td>
                    </tr>
                </table>
                
                <h3>How to set up Google Ads conversions:</h3>
                <ol>
                    <li>Go to <a href="https://ads.google.com" target="_blank">Google Ads</a></li>
                    <li>Navigate to Tools & Settings > Conversions</li>
                    <li>Create a "Website" conversion for downloads (name: "Download Lead Magnet")</li>
                    <li>Create another conversion for forms (name: "Contact Form Submit")</li>
                    <li>Copy the conversion labels and paste them above</li>
                </ol>
            </div>
            
            <div class="card" style="padding: 20px; margin: 20px 0;">
                <h2>📊 Google Analytics 4 (Optional)</h2>
                <p><strong>Only use this if you're NOT using Google Tag Manager</strong></p>
                
                <table class="form-table">
                    <tr>
                        <th scope="row"><label for="ga4_id">GA4 Measurement ID</label></th>
                        <td>
                            <input type="text" id="ga4_id" name="ga4_id" value="<?php echo esc_attr($ga4_id); ?>" placeholder="G-XXXXXXXXXX" class="regular-text" />
                            <p class="description">Only fill this if NOT using GTM (e.g., G-XXXXXXXXXX)</p>
                        </td>
                    </tr>
                </table>
            </div>
            
            <div class="card" style="padding: 20px; margin: 20px 0;">
                <h2>🔒 Privacy Settings</h2>
                
                <table class="form-table">
                    <tr>
                        <th scope="row">Privacy-Friendly Tracking</th>
                        <td>
                            <label>
                                <input type="checkbox" name="tracking_privacy" value="1" <?php checked($tracking_privacy); ?> />
                                Enable privacy-friendly tracking (IP anonymization, secure cookies)
                            </label>
                            <p class="description">Recommended for compliance with privacy regulations</p>
                        </td>
                    </tr>
                </table>
            </div>
            
            <p class="submit">
                <input type="submit" name="save_tracking" class="button-primary" value="Save Tracking Settings" />
            </p>
        </form>
        
        <div class="card" style="padding: 20px; margin: 20px 0; max-width: 800px;">
            <h2>📈 What We Track</h2>
            <ul>
                <li><strong>Page Views:</strong> All pages with special focus on key landing pages</li>
                <li><strong>Downloads:</strong> PDF downloads, guides, templates, and calculators</li>
                <li><strong>Form Submissions:</strong> Contact forms, lead magnets, assessment tools</li>
                <li><strong>Phone Clicks:</strong> Click-to-call tracking</li>
                <li><strong>Email Clicks:</strong> Mailto link tracking</li>
                <li><strong>Scroll Depth:</strong> User engagement tracking</li>
                <li><strong>Outbound Links:</strong> Links to external websites</li>
            </ul>
            
            <h3>Conversion Values:</h3>
            <ul>
                <li><strong>Downloads:</strong> $10 value (lead magnet)</li>
                <li><strong>Form Submissions:</strong> $25 value (qualified lead)</li>
            </ul>
        </div>
        
        <div class="card" style="padding: 20px; margin: 20px 0; max-width: 800px;">
            <h2>✅ Setup Checklist</h2>
            <ul>
                <li><?php echo $gtm_id ? '✅' : '❌'; ?> Google Tag Manager ID configured</li>
                <li><?php echo $google_ads_id ? '✅' : '❌'; ?> Google Ads ID configured</li>
                <li><?php echo $download_conversion_label ? '✅' : '❌'; ?> Download conversion tracking set up</li>
                <li><?php echo $form_conversion_label ? '✅' : '❌'; ?> Form conversion tracking set up</li>
            </ul>
            
            <?php if ($gtm_id && $google_ads_id && $download_conversion_label && $form_conversion_label): ?>
                <p style="color: green; font-weight: bold;">🎉 Your tracking is fully configured!</p>
            <?php else: ?>
                <p style="color: orange; font-weight: bold;">⚠️ Complete the missing items above for full tracking</p>
            <?php endif; ?>
        </div>
    </div>
    <?php
}