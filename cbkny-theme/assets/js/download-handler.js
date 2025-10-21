/**
 * Download Handler for CBKNY Resources
 * Handles form submissions and file downloads with tracking
 */

(function($) {
    'use strict';

    // Initialize download handlers when DOM is ready
    $(document).ready(function() {
        // Handle all download forms
        $('.cbkny-download-form').on('submit', function(e) {
            e.preventDefault();
            handleDownloadForm($(this));
        });

        // Handle specific download buttons
        $('.cbkny-download-btn').on('click', function(e) {
            e.preventDefault();
            const fileId = $(this).data('file-id');
            const email = prompt('Enter your email to download this resource:');
            if (email && email.trim() !== '') {
                handleDirectDownload(fileId, email);
            }
        });
    });

    function handleDownloadForm($form) {
        const $submitBtn = $form.find('button[type="submit"]');
        const $successDiv = $form.siblings('.download-success');
        const $errorDiv = $form.siblings('.download-error');
        const originalText = $submitBtn.text();

        // Get form data
        const fileId = $form.data('file-id');
        const email = $form.find('input[name="email"]').val();
        const business = $form.find('input[name="business"]').val();
        const consent = $form.find('input[name="consent"]').is(':checked');

        // Validation
        if (!email || !email.trim()) {
            alert('Please enter your email address.');
            return;
        }

        if (!consent) {
            alert('Please agree to receive communications from us.');
            return;
        }

        // Show loading state
        $submitBtn.text('Processing...').prop('disabled', true);
        $errorDiv.hide();

        // Prepare form data
        const formData = {
            action: 'cbkny_download',
            nonce: cbkny_ajax.nonce,
            file_id: fileId,
            email: email,
            business: business,
            consent: consent
        };

        // Add UTM parameters if present
        const urlParams = new URLSearchParams(window.location.search);
        ['utm_source', 'utm_medium', 'utm_campaign'].forEach(param => {
            if (urlParams.get(param)) {
                formData[param] = urlParams.get(param);
            }
        });

        // Submit request
        $.ajax({
            url: cbkny_ajax.ajax_url,
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response.success) {
                    // Show success message
                    $form.hide();
                    $successDiv.show();

                    // Trigger download
                    if (response.data.download_url) {
                        window.open(response.data.download_url, '_blank');
                    }

                    // Track in analytics
                    trackDownload(fileId, email);

                    // Scroll to success message
                    $('html, body').animate({
                        scrollTop: $successDiv.offset().top - 100
                    }, 500);

                } else {
                    throw new Error(response.data || 'Download failed');
                }
            },
            error: function(xhr, status, error) {
                console.error('Download error:', error);
                $errorDiv.show();
                $submitBtn.text(originalText).prop('disabled', false);
            }
        });
    }

    function handleDirectDownload(fileId, email) {
        const formData = {
            action: 'cbkny_download',
            nonce: cbkny_ajax.nonce,
            file_id: fileId,
            email: email,
            consent: true
        };

        // Add UTM parameters if present
        const urlParams = new URLSearchParams(window.location.search);
        ['utm_source', 'utm_medium', 'utm_campaign'].forEach(param => {
            if (urlParams.get(param)) {
                formData[param] = urlParams.get(param);
            }
        });

        $.ajax({
            url: cbkny_ajax.ajax_url,
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response.success && response.data.download_url) {
                    window.open(response.data.download_url, '_blank');
                    trackDownload(fileId, email);
                } else {
                    alert('Download failed. Please try again.');
                }
            },
            error: function() {
                alert('Download failed. Please try again.');
            }
        });
    }

    function trackDownload(fileId, email) {
        // Track in Google Analytics if available
        if (typeof gtag !== 'undefined') {
            gtag('event', 'download', {
                'event_category': 'lead_magnet',
                'event_label': fileId,
                'value': 1
            });
        }

        // Track in Meta Pixel if available
        if (typeof fbq !== 'undefined') {
            fbq('track', 'Lead', {
                content_name: fileId,
                content_category: 'download'
            });
        }

        // Track in LinkedIn Insight Tag if available
        if (typeof lintrk !== 'undefined') {
            lintrk('track', { conversion_id: 'download_' + fileId });
        }
    }

    // Utility function to generate download URL with tracking
    function generateDownloadUrl(fileId, params = {}) {
        let url = cbkny_ajax.ajax_url + '?cbkny_download=1&file=' + fileId;
        
        Object.keys(params).forEach(key => {
            if (params[key]) {
                url += '&' + key + '=' + encodeURIComponent(params[key]);
            }
        });

        return url;
    }

    // Expose utility functions globally
    window.CBKNYDownload = {
        handleForm: handleDownloadForm,
        handleDirect: handleDirectDownload,
        generateUrl: generateDownloadUrl,
        track: trackDownload
    };

})(jQuery);
