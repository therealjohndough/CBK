(function(){
  // Lead magnet download functionality
  window.downloadResource = function(resourceType) {
    const email = prompt('Enter your email to download this resource:');
    if (email && email.includes('@')) {
      // Here you would typically:
      // 1. Add contact to CRM
      // 2. Send email with download link
      // 3. Track the lead source
      
      // For now, show success message
      alert('Thank you! Check your email for the download link.');
      
      // Track the download (you can integrate with Google Analytics here)
      if (typeof gtag !== 'undefined') {
        gtag('event', 'download', {
          'event_category': 'lead_magnet',
          'event_label': resourceType,
          'value': 1
        });
      }
    } else if (email) {
      alert('Please enter a valid email address.');
    }
  };

  // Assessment quiz functionality
  window.startAssessment = function() {
    // This would redirect to the assessment quiz
    alert('Assessment quiz coming soon! For now, please contact us for a free consultation.');
  };

  // Contact form handling
  document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contact-form');
    if (contactForm) {
      contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form data
        const formData = new FormData(contactForm);
        const data = Object.fromEntries(formData);
        
        // Basic validation
        if (!data.first_name || !data.last_name || !data.email || !data.phone || !data.business_name || !data.message) {
          alert('Please fill in all required fields.');
          return;
        }
        
        // Here you would typically:
        // 1. Send data to your CRM/backend
        // 2. Show success message
        // 3. Track the form submission
        
        alert('Thank you for your message! We\'ll get back to you within 24 hours.');
        contactForm.reset();
        
        // Track form submission (you can integrate with Google Analytics here)
        if (typeof gtag !== 'undefined') {
          gtag('event', 'form_submit', {
            'event_category': 'contact',
            'event_label': 'contact_form',
            'value': 1
          });
        }
      });
    }
  });

  // Smooth scrolling for anchor links
  document.addEventListener('click', function(e) {
    if (e.target.tagName === 'A' && e.target.getAttribute('href').startsWith('#')) {
      e.preventDefault();
      const target = document.querySelector(e.target.getAttribute('href'));
      if (target) {
        target.scrollIntoView({ behavior: 'smooth' });
      }
    }
  });
})();
