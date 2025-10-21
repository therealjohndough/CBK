</main>
<footer class="footer">
  <div class="container">
    <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem; margin-bottom: 2rem;">
      
      <div>
        <h3 style="color: var(--cbkny-pink); margin-bottom: 1rem;"><?php echo esc_html(cbkny_get_option('cbkny_business_name', 'Canna Bookkeeper™ NY')); ?></h3>
        <p style="margin-bottom: 1rem;">Professional cannabis accounting services for New York operators. 280E compliance, OCM reporting, and audit-ready bookkeeping.</p>
        <p style="font-size: 0.9rem; color: var(--cbkny-gray);">
          <strong>Phone:</strong> <?php echo esc_html(cbkny_get_option('cbkny_phone', '(716) XXX-XXXX')); ?><br>
          <strong>Email:</strong> <?php echo esc_html(cbkny_get_option('cbkny_email', 'info@cbkny.com')); ?><br>
          <strong>Location:</strong> <?php echo esc_html(cbkny_get_option('cbkny_address', 'Buffalo, NY')); ?>
        </p>
      </div>

      <div>
        <h4 style="color: var(--cbkny-black); margin-bottom: 1rem;">Services</h4>
        <ul style="list-style: none; padding: 0; margin: 0;">
          <li style="margin-bottom: 0.5rem;"><a href="/services" style="color: var(--cbkny-gray); text-decoration: none;">Monthly Bookkeeping</a></li>
          <li style="margin-bottom: 0.5rem;"><a href="/services" style="color: var(--cbkny-gray); text-decoration: none;">Tax Preparation</a></li>
          <li style="margin-bottom: 0.5rem;"><a href="/services" style="color: var(--cbkny-gray); text-decoration: none;">Cleanup Services</a></li>
          <li style="margin-bottom: 0.5rem;"><a href="/services" style="color: var(--cbkny-gray); text-decoration: none;">CFO Advisory</a></li>
        </ul>
      </div>

      <div>
        <h4 style="color: var(--cbkny-black); margin-bottom: 1rem;">Resources</h4>
        <ul style="list-style: none; padding: 0; margin: 0;">
          <li style="margin-bottom: 0.5rem;"><a href="/resources/free-guides" style="color: var(--cbkny-gray); text-decoration: none;">Free Guides</a></li>
          <li style="margin-bottom: 0.5rem;"><a href="/resources/templates" style="color: var(--cbkny-gray); text-decoration: none;">Templates</a></li>
          <li style="margin-bottom: 0.5rem;"><a href="/resources/assessment-tools" style="color: var(--cbkny-gray); text-decoration: none;">Assessment Tools</a></li>
          <li style="margin-bottom: 0.5rem;"><a href="/contact" style="color: var(--cbkny-gray); text-decoration: none;">Free Consultation</a></li>
        </ul>
      </div>

      <div>
        <h4 style="color: var(--cbkny-black); margin-bottom: 1rem;">Connect With Us</h4>
        <div style="display: flex; gap: 1rem; margin-bottom: 1rem;">
          <?php if (cbkny_get_option('cbkny_linkedin_url')): ?>
          <a href="<?php echo esc_url(cbkny_get_option('cbkny_linkedin_url')); ?>" target="_blank" rel="noopener" style="color: var(--cbkny-pink); font-size: 1.5rem; text-decoration: none;" aria-label="LinkedIn">
            <i class="fab fa-linkedin"></i>
          </a>
          <?php endif; ?>
          
          <?php if (cbkny_get_option('cbkny_instagram_url')): ?>
          <a href="<?php echo esc_url(cbkny_get_option('cbkny_instagram_url')); ?>" target="_blank" rel="noopener" style="color: var(--cbkny-pink); font-size: 1.5rem; text-decoration: none;" aria-label="Instagram">
            <i class="fab fa-instagram"></i>
          </a>
          <?php endif; ?>
          
          <?php if (cbkny_get_option('cbkny_twitter_url')): ?>
          <a href="<?php echo esc_url(cbkny_get_option('cbkny_twitter_url')); ?>" target="_blank" rel="noopener" style="color: var(--cbkny-pink); font-size: 1.5rem; text-decoration: none;" aria-label="Twitter">
            <i class="fab fa-twitter"></i>
          </a>
          <?php endif; ?>
          
          <?php if (cbkny_get_option('cbkny_facebook_url')): ?>
          <a href="<?php echo esc_url(cbkny_get_option('cbkny_facebook_url')); ?>" target="_blank" rel="noopener" style="color: var(--cbkny-pink); font-size: 1.5rem; text-decoration: none;" aria-label="Facebook">
            <i class="fab fa-facebook"></i>
          </a>
          <?php endif; ?>
        </div>
        
        <h4 style="color: var(--cbkny-black); margin-bottom: 1rem;">Legal & Policies</h4>
        <ul style="list-style: none; padding: 0; margin: 0;">
          <li style="margin-bottom: 0.5rem;"><a href="/privacy-policy" style="color: var(--cbkny-gray); text-decoration: none;">Privacy Policy</a></li>
          <li style="margin-bottom: 0.5rem;"><a href="/terms-of-service" style="color: var(--cbkny-gray); text-decoration: none;">Terms of Service</a></li>
          <li style="margin-bottom: 0.5rem;"><a href="/cookie-policy" style="color: var(--cbkny-gray); text-decoration: none;">Cookie Policy</a></li>
          <li style="margin-bottom: 0.5rem;"><a href="/disclaimer" style="color: var(--cbkny-gray); text-decoration: none;">Disclaimer</a></li>
        </ul>
      </div>
    </div>

    <div style="border-top: 1px solid #ddd; padding-top: 1rem; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
      <div style="color: var(--cbkny-gray); font-size: 0.9rem;">
        &copy; <?php echo date('Y'); ?> Canna Bookkeeper™ LLC. All rights reserved.
      </div>
      <div style="color: var(--cbkny-gray); font-size: 0.8rem; text-align: right;">
        <p style="margin: 0;">Canna Bookkeeper provides accounting services. We are not attorneys and do not provide legal advice.</p>
      </div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
