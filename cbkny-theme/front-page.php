<?php get_header(); ?>
<main class="container">
  <section class="hero">
    <h1>New York Cannabis Bookkeeping, Built for 280E.</h1>
    <p>Accurate books, clean reconciliations, audit-ready financials.</p>
    <p>
      <a class="btn" href="/contact">Book a Consult</a>
      <a class="btn" href="/resources">Get the NY Tax Guide</a>
    </p>
    <div class="proof-strip" aria-label="As seen in">
      <?php // Replace with uploaded logos via ACF repeater on Options page ?>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/proof-placeholder.svg" alt="Proof logo placeholder" />
    </div>
  </section>

  <section class="grid" style="grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));">
    <div class="card"><h3>Dispensaries</h3><p>POS reconciliation, cash controls, and 13% retail tax clarity.</p></div>
    <div class="card"><h3>Cultivators</h3><p>COGS methodology aligned to 280E constraints and OCM guidance.</p></div>
    <div class="card"><h3>Manufacturers</h3><p>Cost accounting, inventory tracking, and audit-ready reporting.</p></div>
  </section>

  <section class="card" style="margin-top:2rem;">
    <h2>NY Wholesale Excise Estimator</h2>
    <?php echo do_shortcode('[ny_excise_estimator]'); ?>
  </section>
</main>
<?php get_footer(); ?>
