<?php
/**
 * Cookie Consent Banner
 * GDPR/CCPA compliant cookie consent management
 */

// Enqueue cookie consent scripts
function cbkny_enqueue_cookie_consent() {
    wp_enqueue_script('cbkny-cookie-consent', get_template_directory_uri() . '/assets/js/cookie-consent.js', array(), '1.0.0', true);
    wp_enqueue_style('cbkny-cookie-consent', get_template_directory_uri() . '/assets/css/cookie-consent.css', array(), '1.0.0');
}
add_action('wp_enqueue_scripts', 'cbkny_enqueue_cookie_consent');

// Add cookie consent banner to footer
function cbkny_add_cookie_consent_banner() {
    ?>
    <div id="cookie-consent-banner" class="cookie-consent-banner" style="display: none;">
        <div class="cookie-consent-content">
            <div class="cookie-consent-text">
                <h4>🍪 We Use Cookies</h4>
                <p>We use cookies to improve your experience on our site, show personalized content, and analyze our traffic. By clicking "Accept All", you consent to our use of cookies. <a href="/cookie-policy">Learn more about our cookie policy</a>.</p>
            </div>
            <div class="cookie-consent-buttons">
                <button id="cookie-accept-all" class="btn btn-primary">Accept All</button>
                <button id="cookie-accept-essential" class="btn btn-secondary">Essential Only</button>
                <button id="cookie-customize" class="btn btn-outline">Customize</button>
            </div>
        </div>
    </div>

    <!-- Cookie Preferences Modal -->
    <div id="cookie-preferences-modal" class="cookie-preferences-modal" style="display: none;">
        <div class="cookie-preferences-content">
            <div class="cookie-preferences-header">
                <h3>Cookie Preferences</h3>
                <button id="cookie-modal-close" class="cookie-modal-close">&times;</button>
            </div>
            <div class="cookie-preferences-body">
                <div class="cookie-category">
                    <div class="cookie-category-header">
                        <h4>Essential Cookies</h4>
                        <label class="cookie-toggle">
                            <input type="checkbox" id="essential-cookies" checked disabled>
                            <span class="cookie-slider"></span>
                        </label>
                    </div>
                    <p>These cookies are necessary for the website to function and cannot be switched off. They are usually only set in response to actions made by you which amount to a request for services.</p>
                </div>
                
                <div class="cookie-category">
                    <div class="cookie-category-header">
                        <h4>Analytics Cookies</h4>
                        <label class="cookie-toggle">
                            <input type="checkbox" id="analytics-cookies">
                            <span class="cookie-slider"></span>
                        </label>
                    </div>
                    <p>These cookies allow us to count visits and traffic sources so we can measure and improve the performance of our site. They help us know which pages are the most and least popular.</p>
                </div>
                
                <div class="cookie-category">
                    <div class="cookie-category-header">
                        <h4>Marketing Cookies</h4>
                        <label class="cookie-toggle">
                            <input type="checkbox" id="marketing-cookies">
                            <span class="cookie-slider"></span>
                        </label>
                    </div>
                    <p>These cookies may be set through our site by our advertising partners to build a profile of your interests and show you relevant adverts on other sites.</p>
                </div>
                
                <div class="cookie-category">
                    <div class="cookie-category-header">
                        <h4>Functionality Cookies</h4>
                        <label class="cookie-toggle">
                            <input type="checkbox" id="functionality-cookies">
                            <span class="cookie-slider"></span>
                        </label>
                    </div>
                    <p>These cookies enable the website to provide enhanced functionality and personalization. They may be set by us or by third party providers.</p>
                </div>
            </div>
            <div class="cookie-preferences-footer">
                <button id="cookie-save-preferences" class="btn btn-primary">Save Preferences</button>
                <button id="cookie-accept-all-modal" class="btn btn-secondary">Accept All</button>
            </div>
        </div>
    </div>
    <?php
}
add_action('wp_footer', 'cbkny_add_cookie_consent_banner');

// Add cookie consent CSS
function cbkny_cookie_consent_styles() {
    ?>
    <style>
    .cookie-consent-banner {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        background: var(--cbkny-white);
        border-top: 2px solid var(--cbkny-pink);
        box-shadow: 0 -2px 10px rgba(0,0,0,0.1);
        z-index: 9999;
        padding: 1rem;
        max-height: 50vh;
        overflow-y: auto;
    }
    
    .cookie-consent-content {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        gap: 2rem;
        flex-wrap: wrap;
    }
    
    .cookie-consent-text {
        flex: 1;
        min-width: 300px;
    }
    
    .cookie-consent-text h4 {
        margin: 0 0 0.5rem 0;
        color: var(--cbkny-pink);
        font-size: 1.1rem;
    }
    
    .cookie-consent-text p {
        margin: 0;
        font-size: 0.9rem;
        line-height: 1.4;
    }
    
    .cookie-consent-text a {
        color: var(--cbkny-pink);
        text-decoration: underline;
    }
    
    .cookie-consent-buttons {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
    }
    
    .cookie-consent-buttons .btn {
        padding: 0.5rem 1rem;
        font-size: 0.9rem;
        white-space: nowrap;
    }
    
    .cookie-preferences-modal {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0,0,0,0.5);
        z-index: 10000;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem;
    }
    
    .cookie-preferences-content {
        background: var(--cbkny-white);
        border-radius: 8px;
        max-width: 600px;
        width: 100%;
        max-height: 80vh;
        overflow-y: auto;
        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    }
    
    .cookie-preferences-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1.5rem;
        border-bottom: 1px solid var(--cbkny-light-gray);
    }
    
    .cookie-preferences-header h3 {
        margin: 0;
        color: var(--cbkny-black);
    }
    
    .cookie-modal-close {
        background: none;
        border: none;
        font-size: 1.5rem;
        cursor: pointer;
        color: var(--cbkny-gray);
        padding: 0;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .cookie-preferences-body {
        padding: 1.5rem;
    }
    
    .cookie-category {
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid var(--cbkny-light-gray);
    }
    
    .cookie-category:last-child {
        margin-bottom: 0;
        border-bottom: none;
    }
    
    .cookie-category-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 0.5rem;
    }
    
    .cookie-category-header h4 {
        margin: 0;
        color: var(--cbkny-black);
    }
    
    .cookie-toggle {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 24px;
    }
    
    .cookie-toggle input {
        opacity: 0;
        width: 0;
        height: 0;
    }
    
    .cookie-slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: .4s;
        border-radius: 24px;
    }
    
    .cookie-slider:before {
        position: absolute;
        content: "";
        height: 18px;
        width: 18px;
        left: 3px;
        bottom: 3px;
        background-color: white;
        transition: .4s;
        border-radius: 50%;
    }
    
    .cookie-toggle input:checked + .cookie-slider {
        background-color: var(--cbkny-pink);
    }
    
    .cookie-toggle input:checked + .cookie-slider:before {
        transform: translateX(26px);
    }
    
    .cookie-toggle input:disabled + .cookie-slider {
        opacity: 0.6;
        cursor: not-allowed;
    }
    
    .cookie-category p {
        margin: 0;
        font-size: 0.9rem;
        color: var(--cbkny-gray);
        line-height: 1.4;
    }
    
    .cookie-preferences-footer {
        padding: 1.5rem;
        border-top: 1px solid var(--cbkny-light-gray);
        display: flex;
        gap: 1rem;
        justify-content: flex-end;
    }
    
    @media (max-width: 768px) {
        .cookie-consent-content {
            flex-direction: column;
            text-align: center;
        }
        
        .cookie-consent-buttons {
            justify-content: center;
        }
        
        .cookie-preferences-content {
            margin: 1rem;
            max-height: 90vh;
        }
        
        .cookie-preferences-footer {
            flex-direction: column;
        }
    }
    </style>
    <?php
}
add_action('wp_head', 'cbkny_cookie_consent_styles');
?>
