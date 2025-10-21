<?php get_header(); ?>
<main class="container">
  <section class="hero">
    <h1><?php the_title(); ?></h1>
    <p>Get instant access to this valuable resource</p>
  </section>

  <section style="max-width: 800px; margin: 4rem auto;">
    <div class="card" style="padding: 2rem;">
      
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        
        <div class="download-content">
          <?php the_content(); ?>
        </div>

        <div class="download-form" style="background: var(--cbkny-light-gray); padding: 2rem; border-radius: 8px; margin: 2rem 0;">
          <h3>Get Your Free Download</h3>
          <p>Enter your email below to get instant access to this resource:</p>
          
          <form id="download-form" style="display: flex; flex-direction: column; gap: 1rem;">
            <div>
              <label for="download-email" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">Email Address *</label>
              <input type="email" id="download-email" name="email" required 
                     style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem;">
            </div>
            
            <div>
              <label for="download-business" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">Business Name (Optional)</label>
              <input type="text" id="download-business" name="business" 
                     style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem;">
            </div>
            
            <div>
              <label style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.9rem;">
                <input type="checkbox" id="download-consent" name="consent" required>
                <span>I agree to receive emails from Canna Bookkeeper™ NY and understand I can unsubscribe at any time. <a href="/privacy-policy" target="_blank">Privacy Policy</a></span>
              </label>
            </div>
            
            <button type="submit" class="btn btn-primary" style="padding: 1rem; font-size: 1.1rem;">
              Download Now - It's Free!
            </button>
          </form>
          
          <div id="download-success" style="display: none; background: #d4edda; border: 1px solid #c3e6cb; color: #155724; padding: 1rem; border-radius: 4px; margin-top: 1rem;">
            <h4>✅ Download Ready!</h4>
            <p>Check your email for the download link. If you don't see it, check your spam folder.</p>
            <p><strong>Next Steps:</strong></p>
            <ul>
              <li>Download and save the resource</li>
              <li>Review the content thoroughly</li>
              <li>Implement the recommendations</li>
              <li>Schedule a free consultation if you need help</li>
            </ul>
          </div>
          
          <div id="download-error" style="display: none; background: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; padding: 1rem; border-radius: 4px; margin-top: 1rem;">
            <h4>❌ Error</h4>
            <p>There was an error processing your request. Please try again or contact us directly.</p>
          </div>
        </div>

        <div class="download-benefits" style="background: #fff3cd; border: 1px solid #ffeaa7; padding: 1.5rem; border-radius: 8px; margin: 2rem 0;">
          <h4 style="color: #856404; margin-top: 0;">🎯 What You'll Get:</h4>
          <ul style="color: #856404;">
            <li>Comprehensive compliance checklists</li>
            <li>Step-by-step implementation guides</li>
            <li>Best practices from industry experts</li>
            <li>Ready-to-use templates and tools</li>
            <li>Expert insights and recommendations</li>
          </ul>
        </div>

        <div class="download-testimonial" style="background: var(--cbkny-white); border-left: 4px solid var(--cbkny-pink); padding: 1.5rem; margin: 2rem 0;">
          <blockquote style="margin: 0; font-style: italic; color: var(--cbkny-gray);">
            "This resource saved us hours of research and helped us get our compliance in order. Highly recommended for any cannabis operator in NY."
          </blockquote>
          <cite style="display: block; margin-top: 1rem; font-weight: bold; color: var(--cbkny-black);">
            - Cannabis Business Owner, Buffalo, NY
          </cite>
        </div>

        <div class="download-cta" style="text-align: center; margin: 3rem 0;">
          <h3>Need Help Implementing This?</h3>
          <p>Our team of cannabis accounting experts can help you implement these strategies and ensure full compliance.</p>
          <a href="/contact" class="btn btn-primary" style="display: inline-block; margin-top: 1rem;">
            Schedule Free Consultation
          </a>
        </div>

      <?php endwhile; endif; ?>
      
    </div>
  </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById('download-form');
  const successDiv = document.getElementById('download-success');
  const errorDiv = document.getElementById('download-error');
  
  form.addEventListener('submit', function(e) {
    e.preventDefault();
    
    const email = document.getElementById('download-email').value;
    const business = document.getElementById('download-business').value;
    const consent = document.getElementById('download-consent').checked;
    
    if (!email || !consent) {
      alert('Please fill in your email and agree to receive communications.');
      return;
    }
    
    // Hide error messages
    errorDiv.style.display = 'none';
    
    // Show loading state
    const submitBtn = form.querySelector('button[type="submit"]');
    const originalText = submitBtn.textContent;
    submitBtn.textContent = 'Processing...';
    submitBtn.disabled = true;
    
    // Simulate form submission (replace with actual API call)
    setTimeout(() => {
      // Show success message
      form.style.display = 'none';
      successDiv.style.display = 'block';
      
      // Track download in analytics
      if (typeof gtag !== 'undefined') {
        gtag('event', 'download', {
          'event_category': 'lead_magnet',
          'event_label': '<?php the_title(); ?>',
          'value': 1
        });
      }
      
      // Track in Meta Pixel
      if (typeof fbq !== 'undefined') {
        fbq('track', 'Lead', {
          content_name: '<?php the_title(); ?>',
          content_category: 'download'
        });
      }
      
    }, 2000);
  });
});
</script>

<?php get_footer(); ?>
