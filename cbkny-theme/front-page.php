<?php get_header(); ?>
<main class="container">
  <section class="hero" data-animate="fade-in">
    <h1 data-animate="fade-in-up" data-delay="200"><?php echo esc_html(cbkny_get_option('cbkny_hero_title', 'Cannabis Bookkeeping for New York Operators')); ?></h1>
    <p data-animate="fade-in-up" data-delay="400"><?php echo esc_html(cbkny_get_option('cbkny_hero_subtitle', 'OCM & 280E compliant accounting that keeps you audit-ready')); ?></p>
    <p data-animate="fade-in-up" data-delay="600">
      <a class="btn btn-primary animate-pulse" href="<?php echo esc_url(cbkny_get_option('cbkny_hero_primary_button_link', '/contact')); ?>">
        <?php echo esc_html(cbkny_get_option('cbkny_hero_primary_button_text', 'Book Free Consultation')); ?>
      </a>
      <a class="btn btn-secondary" href="<?php echo esc_url(cbkny_get_option('cbkny_hero_secondary_button_link', '/resources')); ?>">
        <?php echo esc_html(cbkny_get_option('cbkny_hero_secondary_button_text', 'Get Free Resources')); ?>
      </a>
    </p>
    <div class="proof-strip" aria-label="Trusted by" data-animate="fade-in-up" data-delay="800">
      <span style="color: var(--cbkny-gray); font-weight: 600;">
        <?php echo esc_html(cbkny_get_option('cbkny_trust_badge_text', 'Trusted by NY cannabis operators statewide')); ?>
      </span>
    </div>
  </section>

  <section class="grid animate-stagger" style="grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); margin: 4rem 0;">
    <div class="card">
      <h3><?php echo esc_html(cbkny_get_option('cbkny_service_1_title', 'Monthly Bookkeeping')); ?></h3>
      <p><?php echo esc_html(cbkny_get_option('cbkny_service_1_description', 'Full cannabis accounting & reconciliations built for OCM and IRS 280E compliance. Stay audit-ready with accurate expense categorization.')); ?></p>
    </div>
    <div class="card">
      <h3><?php echo esc_html(cbkny_get_option('cbkny_service_2_title', 'Tax & Compliance Prep')); ?></h3>
      <p><?php echo esc_html(cbkny_get_option('cbkny_service_2_description', '280E tax strategy, OCM reporting, and audit preparation. We handle the complex tax requirements so you can focus on growing your business.')); ?></p>
    </div>
    <div class="card">
      <h3><?php echo esc_html(cbkny_get_option('cbkny_service_3_title', 'Business Advisory')); ?></h3>
      <p><?php echo esc_html(cbkny_get_option('cbkny_service_3_description', 'Strategic financial guidance to improve cash flow, cost tracking, and prepare for license scalability across multiple entities.')); ?></p>
    </div>
  </section>

  <section style="background: var(--cbkny-light-gray); padding: 3rem; border-radius: 1rem; margin: 4rem 0;">
    <h2 style="text-align: center; color: var(--cbkny-black); margin-bottom: 2rem;">Why Cannabis Needs Specialists</h2>
    <div class="grid" style="grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem;">
      <div>
        <h4 style="color: var(--cbkny-pink);">280E Tax Complications</h4>
        <p>Most deductions are disallowed under 280E. We help you maximize what you can deduct while staying compliant.</p>
      </div>
      <div>
        <h4 style="color: var(--cbkny-pink);">OCM Reporting Requirements</h4>
        <p>Complex seed-to-sale tracking and reporting. We ensure your books meet all regulatory requirements.</p>
      </div>
      <div>
        <h4 style="color: var(--cbkny-pink);">Multi-Entity Structures</h4>
        <p>Many operators use multiple entities. We help you structure finances properly across all entities.</p>
      </div>
      <div>
        <h4 style="color: var(--cbkny-pink);">Audit Preparedness</h4>
        <p>IRS audits are common in cannabis. We keep your books audit-ready year-round.</p>
      </div>
    </div>
  </section>

  <section style="text-align: center; margin: 4rem 0;">
    <h2 style="color: var(--cbkny-black); margin-bottom: 1rem;">Ready to Get Compliant?</h2>
    <p style="font-size: 1.25rem; color: var(--cbkny-gray); margin-bottom: 2rem;">Let's make your books compliant, transparent, and ready for growth.</p>
    <a class="btn btn-primary" href="/contact" style="font-size: 1.1rem; padding: 1rem 2rem;">Book Your Free Consultation</a>
  </section>
</main>
<?php get_footer(); ?>
