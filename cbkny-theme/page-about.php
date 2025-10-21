<?php get_header(); ?>
<main class="container">
  <section class="hero" data-animate="fade-in">
    <h1 data-animate="fade-in-up" data-delay="200">About Rosanna St. John</h1>
    <p data-animate="fade-in-up" data-delay="400">Your trusted cannabis accounting specialist in New York</p>
  </section>

  <section class="about-grid" style="display: grid; grid-template-columns: 1fr 2fr; gap: 3rem; margin: 4rem 0; align-items: start;" data-animate="fade-in-up">
    <div>
      <div style="width: 100%; height: 300px; background: var(--cbkny-light-gray); border-radius: 1rem; display: flex; align-items: center; justify-content: center; color: var(--cbkny-gray); overflow: hidden;">
        <img src="<?php echo esc_url(cbkny_get_option('cbkny_about_photo_url', 'http://johnd501.sg-host.com/wp-content/uploads/2025/10/Rosanna-St-John-Canna-Bookkeeper-New-York-Cannabis-Industry.webp')); ?>" 
             alt="Rosanna St. John, Certified Cannabis Bookkeeper in New York" 
             style="width: 100%; height: 100%; object-fit: cover; display: block;"
             loading="lazy">
      </div>
    </div>
    <div>
      <h2 style="color: var(--cbkny-black); margin-bottom: 1.5rem;">Rosanna's Story</h2>
      <p style="font-size: 1.1rem; line-height: 1.6; margin-bottom: 1.5rem;">
        I'm Rosanna St. John, a Certified Bookkeeper accredited by the National Association of Certified Public Bookkeepers. My expertise lies in serving high-compliance industries, with a specialized focus on cannabis accounting.
      </p>
      <p style="font-size: 1.1rem; line-height: 1.6; margin-bottom: 1.5rem;">
        I hold a Bachelor of Science degree in Integrative Management from Niagara University, which provided me with a strong foundation in business operations and financial management.
      </p>
      <p style="font-size: 1.1rem; line-height: 1.6; margin-bottom: 2rem;">
        In response to the 2021 announcement of the Marijuana Regulations and Taxation Act in New York State, I established Canna Bookkeeper™ to help operators navigate the complex world of cannabis accounting, 280E compliance, and OCM reporting requirements.
      </p>
    </div>
  </section>

  <section style="background: var(--cbkny-light-gray); padding: 3rem; border-radius: 1rem; margin: 4rem 0;">
    <h2 style="text-align: center; color: var(--cbkny-black); margin-bottom: 3rem;">Credentials & Certifications</h2>
    <div class="grid" style="grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
      <div class="card">
        <h3 style="color: var(--cbkny-pink);">NACPB Certified Bookkeeper</h3>
        <p>Accredited by the National Association of Certified Public Bookkeepers, ensuring the highest standards of bookkeeping expertise.</p>
      </div>
      <div class="card">
        <h3 style="color: var(--cbkny-pink);">Niagara University Graduate</h3>
        <p>Bachelor of Science in Integrative Management, providing comprehensive business and financial management education.</p>
      </div>
      <div class="card">
        <h3 style="color: var(--cbkny-pink);">Cannabis Industry Specialist</h3>
        <p>Specialized knowledge in 280E tax law, OCM compliance, and cannabis-specific accounting challenges.</p>
      </div>
    </div>
  </section>

  <section style="margin: 4rem 0;">
    <h2 style="text-align: center; color: var(--cbkny-black); margin-bottom: 3rem;">Professional Associations & Leadership</h2>
    <div class="grid" style="grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem;">
      <div style="text-align: center; padding: 2rem; border: 2px solid var(--cbkny-pink); border-radius: 1rem;">
        <h4 style="color: var(--cbkny-pink); margin-bottom: 1rem;">Buffalo Cannabis Network</h4>
        <p><strong>Finance Chair</strong> - Leading financial oversight and strategic planning for Buffalo's premier cannabis industry network.</p>
      </div>
      <div style="text-align: center; padding: 2rem; border: 2px solid var(--cbkny-pink); border-radius: 1rem;">
        <h4 style="color: var(--cbkny-pink); margin-bottom: 1rem;">AAF (Advertising Awards Organization)</h4>
        <p><strong>Finance Chair</strong> - Managing financial operations and strategic initiatives for the advertising awards organization.</p>
      </div>
      <div style="text-align: center; padding: 2rem; border: 2px solid var(--cbkny-pink); border-radius: 1rem;">
        <h4 style="color: var(--cbkny-pink); margin-bottom: 1rem;">NY Cannabis Growers & Processors Association</h4>
        <p>Active member supporting the growth and development of New York's cannabis industry.</p>
      </div>
      <div style="text-align: center; padding: 2rem; border: 2px solid var(--cbkny-pink); border-radius: 1rem;">
        <h4 style="color: var(--cbkny-pink); margin-bottom: 1rem;">National Association of Certified Public Bookkeepers</h4>
        <p>Professional membership ensuring ongoing education and certification maintenance.</p>
      </div>
    </div>
  </section>

  <section style="background: var(--cbkny-light-gray); padding: 3rem; border-radius: 1rem; margin: 4rem 0;">
    <h2 style="text-align: center; color: var(--cbkny-black); margin-bottom: 2rem;">Why I Chose Cannabis Accounting</h2>
    <div style="max-width: 800px; margin: 0 auto;">
      <p style="font-size: 1.1rem; line-height: 1.6; margin-bottom: 1.5rem;">
        When New York legalized cannabis in 2021, I saw an opportunity to help operators navigate the most complex accounting environment in business. Cannabis accounting isn't just about numbers—it's about compliance, risk management, and strategic growth.
      </p>
      <p style="font-size: 1.1rem; line-height: 1.6; margin-bottom: 1.5rem;">
        The combination of 280E tax restrictions, OCM reporting requirements, and multi-entity structures creates unique challenges that require specialized expertise. I'm passionate about helping cannabis operators succeed while staying fully compliant.
      </p>
      <p style="font-size: 1.1rem; line-height: 1.6;">
        My mission is to provide cannabis operators with the financial clarity and compliance confidence they need to grow their businesses successfully in New York's evolving market.
      </p>
    </div>
  </section>

  <section style="text-align: center; margin: 4rem 0;">
    <h2 style="color: var(--cbkny-black); margin-bottom: 1rem;">Work With Us</h2>
    <p style="font-size: 1.25rem; color: var(--cbkny-gray); margin-bottom: 2rem;">Ready to get your cannabis business compliant and audit-ready?</p>
    <a class="btn btn-primary" href="/contact" style="font-size: 1.1rem; padding: 1rem 2rem;">Book Your Free Consultation</a>
  </section>
</main>
<?php get_footer(); ?>
