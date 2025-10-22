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

  // Animation utilities
  function isElementInViewport(el) {
    const rect = el.getBoundingClientRect();
    return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
  }

  function isElementPartiallyInViewport(el) {
    const rect = el.getBoundingClientRect();
    const windowHeight = window.innerHeight || document.documentElement.clientHeight;
    return rect.top < windowHeight && rect.bottom > 0;
  }

  // Scroll-triggered animations
  function initScrollAnimations() {
    const animatedElements = document.querySelectorAll('[data-animate]');
    
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const element = entry.target;
          const animationType = element.getAttribute('data-animate');
          const delay = element.getAttribute('data-delay') || 0;
          
          setTimeout(() => {
            element.classList.add(`animate-${animationType}`);
            element.classList.add('animated');
          }, delay);
          
          observer.unobserve(element);
        }
      });
    }, {
      threshold: 0.1,
      rootMargin: '0px 0px -50px 0px'
    });
    
    animatedElements.forEach(el => {
      observer.observe(el);
    });
  }

  // Staggered card animations
  function initStaggeredAnimations() {
    const cardGroups = document.querySelectorAll('.animate-stagger');
    
    cardGroups.forEach(group => {
      const cards = group.querySelectorAll('.card, .grid > div');
      cards.forEach((card, index) => {
        card.setAttribute('data-animate', 'fade-in-up');
        card.setAttribute('data-delay', index * 100);
      });
    });
  }

  // Enhanced button interactions
  function initButtonAnimations() {
    const buttons = document.querySelectorAll('.btn');
    
    buttons.forEach(button => {
      button.addEventListener('click', function(e) {
        // Create ripple effect
        const ripple = document.createElement('span');
        const rect = this.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        const x = e.clientX - rect.left - size / 2;
        const y = e.clientY - rect.top - size / 2;
        
        ripple.style.cssText = `
          position: absolute;
          width: ${size}px;
          height: ${size}px;
          left: ${x}px;
          top: ${y}px;
          background: rgba(255, 255, 255, 0.3);
          border-radius: 50%;
          transform: scale(0);
          animation: ripple 0.6s linear;
          pointer-events: none;
        `;
        
        this.appendChild(ripple);
        
        setTimeout(() => {
          ripple.remove();
        }, 600);
      });
    });
  }

  // Loading states for forms and downloads
  window.showLoadingState = function(element, text = 'Loading...') {
    const originalText = element.textContent;
    element.disabled = true;
    element.innerHTML = `<span class="loading-spinner"></span> ${text}`;
    
    return () => {
      element.disabled = false;
      element.textContent = originalText;
    };
  };

  // Enhanced download function with animations
  window.downloadResource = function(resourceType) {
    const downloadBtn = event.target;
    const hideLoading = window.showLoadingState(downloadBtn, 'Preparing download...');
    
    const email = prompt('Enter your email to download this resource:');
    if (email && email.includes('@')) {
      // Simulate download preparation with animation
      setTimeout(() => {
        hideLoading();
        downloadBtn.innerHTML = '✓ Downloaded!';
        downloadBtn.classList.add('btn-success');
        
        // Track the download
        if (typeof gtag !== 'undefined') {
          gtag('event', 'download', {
            'event_category': 'lead_magnet',
            'event_label': resourceType,
            'value': 1
          });
        }
        
        // Reset after 2 seconds
        setTimeout(() => {
          downloadBtn.innerHTML = 'Download Again';
          downloadBtn.classList.remove('btn-success');
        }, 2000);
      }, 1500);
    } else if (email) {
      hideLoading();
      alert('Please enter a valid email address.');
    } else {
      hideLoading();
    }
  };

  // Mobile menu functionality
  function initMobileMenu() {
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const mobileMenu = document.querySelector('.mobile-menu');
    const mobileMenuClose = document.querySelector('.mobile-menu-close');
    const body = document.body;
    
    if (mobileMenuToggle && mobileMenu) {
      // Open mobile menu
      mobileMenuToggle.addEventListener('click', function(e) {
        e.preventDefault();
        mobileMenu.classList.add('active');
        body.style.overflow = 'hidden'; // Prevent background scrolling
        mobileMenuToggle.setAttribute('aria-expanded', 'true');
      });
      
      // Close mobile menu
      function closeMobileMenu() {
        mobileMenu.classList.remove('active');
        body.style.overflow = ''; // Restore scrolling
        mobileMenuToggle.setAttribute('aria-expanded', 'false');
      }
      
      // Close button
      if (mobileMenuClose) {
        mobileMenuClose.addEventListener('click', closeMobileMenu);
      }
      
      // Close on escape key
      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && mobileMenu.classList.contains('active')) {
          closeMobileMenu();
        }
      });
      
      // Close on outside click
      mobileMenu.addEventListener('click', function(e) {
        if (e.target === mobileMenu) {
          closeMobileMenu();
        }
      });
      
      // Close on menu link click
      const mobileMenuLinks = mobileMenu.querySelectorAll('a');
      mobileMenuLinks.forEach(link => {
        link.addEventListener('click', function() {
          setTimeout(closeMobileMenu, 100); // Small delay for smooth transition
        });
      });
    }
  }

  // Initialize animations when DOM is loaded
  document.addEventListener('DOMContentLoaded', function() {
    initScrollAnimations();
    initStaggeredAnimations();
    initButtonAnimations();
    initMobileMenu();
  });
})();
