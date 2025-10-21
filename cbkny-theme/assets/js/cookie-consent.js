/**
 * Cookie Consent Management
 * GDPR/CCPA compliant cookie consent functionality
 */

(function() {
    'use strict';

    // Cookie consent configuration
    const COOKIE_CONFIG = {
        consentCookie: 'cbkny_cookie_consent',
        analyticsCookie: 'cbkny_analytics_consent',
        marketingCookie: 'cbkny_marketing_consent',
        functionalityCookie: 'cbkny_functionality_consent',
        expiryDays: 365
    };

    // Cookie utility functions
    const CookieUtils = {
        set: function(name, value, days) {
            const expires = new Date();
            expires.setTime(expires.getTime() + (days * 24 * 60 * 60 * 1000));
            document.cookie = `${name}=${value};expires=${expires.toUTCString()};path=/;SameSite=Lax`;
        },

        get: function(name) {
            const nameEQ = name + "=";
            const ca = document.cookie.split(';');
            for (let i = 0; i < ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) === ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
            }
            return null;
        },

        delete: function(name) {
            document.cookie = `${name}=;expires=Thu, 01 Jan 1970 00:00:00 UTC;path=/;`;
        }
    };

    // Consent management
    const ConsentManager = {
        init: function() {
            this.checkExistingConsent();
            this.bindEvents();
        },

        checkExistingConsent: function() {
            const consent = CookieUtils.get(COOKIE_CONFIG.consentCookie);
            if (!consent) {
                this.showBanner();
            } else {
                this.loadConsentSettings();
            }
        },

        showBanner: function() {
            const banner = document.getElementById('cookie-consent-banner');
            if (banner) {
                banner.style.display = 'block';
                // Smooth slide up animation
                setTimeout(() => {
                    banner.style.transform = 'translateY(0)';
                    banner.style.opacity = '1';
                }, 100);
            }
        },

        hideBanner: function() {
            const banner = document.getElementById('cookie-consent-banner');
            if (banner) {
                banner.style.transform = 'translateY(100%)';
                banner.style.opacity = '0';
                setTimeout(() => {
                    banner.style.display = 'none';
                }, 300);
            }
        },

        showModal: function() {
            const modal = document.getElementById('cookie-preferences-modal');
            if (modal) {
                modal.style.display = 'flex';
                // Load current settings
                this.loadConsentSettings();
            }
        },

        hideModal: function() {
            const modal = document.getElementById('cookie-preferences-modal');
            if (modal) {
                modal.style.display = 'none';
            }
        },

        loadConsentSettings: function() {
            const analytics = CookieUtils.get(COOKIE_CONFIG.analyticsCookie) === 'true';
            const marketing = CookieUtils.get(COOKIE_CONFIG.marketingCookie) === 'true';
            const functionality = CookieUtils.get(COOKIE_CONFIG.functionalityCookie) === 'true';

            // Update toggle switches
            const analyticsToggle = document.getElementById('analytics-cookies');
            const marketingToggle = document.getElementById('marketing-cookies');
            const functionalityToggle = document.getElementById('functionality-cookies');

            if (analyticsToggle) analyticsToggle.checked = analytics;
            if (marketingToggle) marketingToggle.checked = marketing;
            if (functionalityToggle) functionalityToggle.checked = functionality;

            // Load tracking scripts based on consent
            this.loadTrackingScripts();
        },

        acceptAll: function() {
            this.setConsent(true, true, true);
            this.hideBanner();
            this.hideModal();
            this.loadTrackingScripts();
        },

        acceptEssential: function() {
            this.setConsent(false, false, false);
            this.hideBanner();
            this.hideModal();
            this.loadTrackingScripts();
        },

        setConsent: function(analytics, marketing, functionality) {
            const now = new Date().toISOString();
            CookieUtils.set(COOKIE_CONFIG.consentCookie, now, COOKIE_CONFIG.expiryDays);
            CookieUtils.set(COOKIE_CONFIG.analyticsCookie, analytics.toString(), COOKIE_CONFIG.expiryDays);
            CookieUtils.set(COOKIE_CONFIG.marketingCookie, marketing.toString(), COOKIE_CONFIG.expiryDays);
            CookieUtils.set(COOKIE_CONFIG.functionalityCookie, functionality.toString(), COOKIE_CONFIG.expiryDays);
        },

        savePreferences: function() {
            const analytics = document.getElementById('analytics-cookies').checked;
            const marketing = document.getElementById('marketing-cookies').checked;
            const functionality = document.getElementById('functionality-cookies').checked;

            this.setConsent(analytics, marketing, functionality);
            this.hideBanner();
            this.hideModal();
            this.loadTrackingScripts();
        },

        loadTrackingScripts: function() {
            const analytics = CookieUtils.get(COOKIE_CONFIG.analyticsCookie) === 'true';
            const marketing = CookieUtils.get(COOKIE_CONFIG.marketingCookie) === 'true';
            const functionality = CookieUtils.get(COOKIE_CONFIG.functionalityCookie) === 'true';

            // Google Analytics
            if (analytics && typeof gtag === 'undefined') {
                this.loadGoogleAnalytics();
            }

            // Meta Pixel
            if (marketing && typeof fbq === 'undefined') {
                this.loadMetaPixel();
            }

            // LinkedIn Insight Tag
            if (marketing && typeof lintrk === 'undefined') {
                this.loadLinkedInTag();
            }

            // Disable tracking if consent withdrawn
            if (!analytics) {
                this.disableGoogleAnalytics();
            }
            if (!marketing) {
                this.disableMetaPixel();
                this.disableLinkedInTag();
            }
        },

        loadGoogleAnalytics: function() {
            // Load Google Analytics script
            const script = document.createElement('script');
            script.async = true;
            script.src = 'https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID';
            document.head.appendChild(script);

            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            window.gtag = gtag;
            gtag('js', new Date());
            gtag('config', 'GA_MEASUREMENT_ID', {
                anonymize_ip: true,
                cookie_flags: 'SameSite=Lax;Secure'
            });
        },

        loadMetaPixel: function() {
            // Load Meta Pixel script
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', 'YOUR_PIXEL_ID');
            fbq('track', 'PageView');
        },

        loadLinkedInTag: function() {
            // Load LinkedIn Insight Tag
            (function(l) {
                if (!l){window.lintrk = function(a,b){window.lintrk.q.push([a,b])};
                window.lintrk.q=[]}
                var s = document.getElementsByTagName("script")[0];
                var b = document.createElement("script");
                b.type = "text/javascript";b.async = true;
                b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
                s.parentNode.insertBefore(b, s);})(window.lintrk);
            
            lintrk('track', { conversion_id: YOUR_CONVERSION_ID });
        },

        disableGoogleAnalytics: function() {
            // Disable Google Analytics
            window['ga-disable-GA_MEASUREMENT_ID'] = true;
            if (window.gtag) {
                gtag('consent', 'update', {
                    'analytics_storage': 'denied'
                });
            }
        },

        disableMetaPixel: function() {
            // Disable Meta Pixel
            if (window.fbq) {
                fbq('consent', 'revoke');
            }
        },

        disableLinkedInTag: function() {
            // Disable LinkedIn tracking
            if (window.lintrk) {
                lintrk('track', { conversion_id: 0 });
            }
        },

        bindEvents: function() {
            // Banner buttons
            const acceptAllBtn = document.getElementById('cookie-accept-all');
            const acceptEssentialBtn = document.getElementById('cookie-accept-essential');
            const customizeBtn = document.getElementById('cookie-customize');

            if (acceptAllBtn) {
                acceptAllBtn.addEventListener('click', () => this.acceptAll());
            }
            if (acceptEssentialBtn) {
                acceptEssentialBtn.addEventListener('click', () => this.acceptEssential());
            }
            if (customizeBtn) {
                customizeBtn.addEventListener('click', () => this.showModal());
            }

            // Modal buttons
            const modalCloseBtn = document.getElementById('cookie-modal-close');
            const savePreferencesBtn = document.getElementById('cookie-save-preferences');
            const acceptAllModalBtn = document.getElementById('cookie-accept-all-modal');

            if (modalCloseBtn) {
                modalCloseBtn.addEventListener('click', () => this.hideModal());
            }
            if (savePreferencesBtn) {
                savePreferencesBtn.addEventListener('click', () => this.savePreferences());
            }
            if (acceptAllModalBtn) {
                acceptAllModalBtn.addEventListener('click', () => this.acceptAll());
            }

            // Close modal when clicking outside
            const modal = document.getElementById('cookie-preferences-modal');
            if (modal) {
                modal.addEventListener('click', (e) => {
                    if (e.target === modal) {
                        this.hideModal();
                    }
                });
            }

            // Close modal with Escape key
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') {
                    this.hideModal();
                }
            });
        }
    };

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => ConsentManager.init());
    } else {
        ConsentManager.init();
    }

    // Expose ConsentManager globally for external use
    window.ConsentManager = ConsentManager;

})();
