<?php get_header(); ?>
<main class="container">
  <section class="hero">
    <h1>Free Cannabis Accounting Resources</h1>
    <p>Download our expert guides and tools to help your cannabis business stay compliant</p>
  </section>

  <section class="grid" style="grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 2rem; margin: 4rem 0;">
    
    <div class="card" style="padding: 2rem; text-align: center;">
      <div style="width: 80px; height: 80px; background: var(--cbkny-pink); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; color: var(--cbkny-white); font-size: 2rem;">📋</div>
      <h3 style="color: var(--cbkny-pink); margin-bottom: 1rem;"><?php echo esc_html(cbkny_get_option('cbkny_lead_magnet_1_title', 'NY Cannabis Tax Compliance Checklist')); ?></h3>
      <p style="margin-bottom: 1.5rem;"><?php echo esc_html(cbkny_get_option('cbkny_lead_magnet_1_description', 'A comprehensive checklist covering all NY cannabis tax requirements, 280E compliance, and OCM reporting deadlines.')); ?></p>
      <ul style="text-align: left; margin-bottom: 2rem; font-size: 0.9rem;">
        <li>✓ 280E deduction guidelines</li>
        <li>✓ OCM reporting requirements</li>
        <li>✓ Quarterly tax deadlines</li>
        <li>✓ Audit preparation checklist</li>
      </ul>
      <form id="download-form-checklist" class="cbkny-download-form" data-file-id="compliance-checklist" style="display: flex; flex-direction: column; gap: 1rem;">
        <input type="email" placeholder="Enter your email" required style="padding: 0.75rem; border: 2px solid #ddd; border-radius: 0.5rem;">
        <input type="text" placeholder="Business name" style="padding: 0.75rem; border: 2px solid #ddd; border-radius: 0.5rem;">
        <label style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.9rem;">
          <input type="checkbox" required> I agree to receive cannabis accounting tips and updates
        </label>
        <button type="submit" class="btn btn-primary" style="width: 100%;">Download Free Guide</button>
      </form>
    </div>

    <div class="card" style="padding: 2rem; text-align: center;">
      <div style="width: 80px; height: 80px; background: var(--cbkny-pink); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; color: var(--cbkny-white); font-size: 2rem;">📊</div>
      <h3 style="color: var(--cbkny-pink); margin-bottom: 1rem;"><?php echo esc_html(cbkny_get_option('cbkny_lead_magnet_2_title', '280E Deduction Guide for Cannabis Businesses')); ?></h3>
      <p style="margin-bottom: 1.5rem;"><?php echo esc_html(cbkny_get_option('cbkny_lead_magnet_2_description', 'Learn how to maximize your deductions under 280E while staying fully compliant with IRS regulations.')); ?></p>
      <ul style="text-align: left; margin-bottom: 2rem; font-size: 0.9rem;">
        <li>✓ Deductible vs non-deductible expenses</li>
        <li>✓ COGS calculation methods</li>
        <li>✓ Multi-entity strategies</li>
        <li>✓ Audit defense tactics</li>
      </ul>
      <form id="download-form-guide" class="cbkny-download-form" data-file-id="280e-guide" style="display: flex; flex-direction: column; gap: 1rem;">
        <input type="email" placeholder="Enter your email" required style="padding: 0.75rem; border: 2px solid #ddd; border-radius: 0.5rem;">
        <input type="text" placeholder="Business name" style="padding: 0.75rem; border: 2px solid #ddd; border-radius: 0.5rem;">
        <label style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.9rem;">
          <input type="checkbox" required> I agree to receive cannabis accounting tips and updates
        </label>
        <button type="submit" class="btn btn-primary" style="width: 100%;">Download Free Guide</button>
      </form>
    </div>

    <div class="card" style="padding: 2rem; text-align: center;">
      <div style="width: 80px; height: 80px; background: var(--cbkny-pink); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; color: var(--cbkny-white); font-size: 2rem;">🔍</div>
      <h3 style="color: var(--cbkny-pink); margin-bottom: 1rem;">Cannabis Business Audit Readiness Assessment</h3>
      <p style="margin-bottom: 1.5rem;">Take our interactive quiz to see how audit-ready your cannabis business is and get personalized recommendations.</p>
      <ul style="text-align: left; margin-bottom: 2rem; font-size: 0.9rem;">
        <li>✓ 10-question assessment</li>
        <li>✓ Instant results & recommendations</li>
        <li>✓ Priority action items</li>
        <li>✓ Compliance score</li>
      </ul>
      <button class="btn btn-primary" onclick="startAssessment()" style="width: 100%;">Take Assessment</button>
    </div>

    <div class="card" style="padding: 2rem; text-align: center;">
      <div style="width: 80px; height: 80px; background: var(--cbkny-pink); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; color: var(--cbkny-white); font-size: 2rem;">📈</div>
      <h3 style="color: var(--cbkny-pink); margin-bottom: 1rem;">Cannabis COGS Tracking Template</h3>
      <p style="margin-bottom: 1.5rem;">Download our Excel template for tracking Cost of Goods Sold, inventory, and 280E-compliant expense categorization.</p>
      <ul style="text-align: left; margin-bottom: 2rem; font-size: 0.9rem;">
        <li>✓ Pre-built Excel formulas</li>
        <li>✓ 280E-compliant categories</li>
        <li>✓ Monthly tracking sheets</li>
        <li>✓ Year-end summary reports</li>
      </ul>
      <button class="btn btn-primary" onclick="downloadResource('cogs-template')" style="width: 100%;">Download Template</button>
    </div>

    <div class="card" style="padding: 2rem; text-align: center;">
      <div style="width: 80px; height: 80px; background: var(--cbkny-pink); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; color: var(--cbkny-white); font-size: 2rem;">🧮</div>
      <h3 style="color: var(--cbkny-pink); margin-bottom: 1rem;">280E Tax Impact Calculator</h3>
      <p style="margin-bottom: 1.5rem;">Calculate exactly how 280E affects your tax burden and see potential savings from optimization strategies.</p>
      <ul style="text-align: left; margin-bottom: 2rem; font-size: 0.9rem;">
        <li>✓ Real-time tax calculations</li>
        <li>✓ 280E impact analysis</li>
        <li>✓ Multi-entity savings calculator</li>
        <li>✓ Visual tax breakdown charts</li>
      </ul>
      <button class="btn btn-primary" onclick="startCalculator()" style="width: 100%;">Use Calculator</button>
    </div>
  </section>

  <section style="background: var(--cbkny-light-gray); padding: 3rem; border-radius: 1rem; margin: 4rem 0;">
    <h2 style="text-align: center; color: var(--cbkny-black); margin-bottom: 2rem;">Educational Articles</h2>
    <div class="grid" style="grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
      
      <div class="card">
        <h3 style="color: var(--cbkny-pink); margin-bottom: 1rem;">Understanding 280E: A Complete Guide</h3>
        <p style="margin-bottom: 1rem;">Everything you need to know about 280E tax law and how it affects your cannabis business deductions.</p>
        <a href="#" style="color: var(--cbkny-pink); text-decoration: none; font-weight: 600;">Read More →</a>
      </div>

      <div class="card">
        <h3 style="color: var(--cbkny-pink); margin-bottom: 1rem;">OCM Reporting Requirements Explained</h3>
        <p style="margin-bottom: 1rem;">Navigate New York's Office of Cannabis Management reporting requirements with confidence.</p>
        <a href="#" style="color: var(--cbkny-pink); text-decoration: none; font-weight: 600;">Read More →</a>
      </div>

      <div class="card">
        <h3 style="color: var(--cbkny-pink); margin-bottom: 1rem;">Multi-Entity Cannabis Business Structures</h3>
        <p style="margin-bottom: 1rem;">Learn how to structure multiple entities for maximum tax efficiency and compliance.</p>
        <a href="#" style="color: var(--cbkny-pink); text-decoration: none; font-weight: 600;">Read More →</a>
      </div>

      <div class="card">
        <h3 style="color: var(--cbkny-pink); margin-bottom: 1rem;">Preparing for Cannabis Business Audits</h3>
        <p style="margin-bottom: 1rem;">Essential steps to prepare your cannabis business for potential IRS audits.</p>
        <a href="#" style="color: var(--cbkny-pink); text-decoration: none; font-weight: 600;">Read More →</a>
      </div>

      <div class="card">
        <h3 style="color: var(--cbkny-pink); margin-bottom: 1rem;">Cannabis Inventory Tracking Best Practices</h3>
        <p style="margin-bottom: 1rem;">How to track inventory for 280E compliance and accurate COGS calculations.</p>
        <a href="#" style="color: var(--cbkny-pink); text-decoration: none; font-weight: 600;">Read More →</a>
      </div>

      <div class="card">
        <h3 style="color: var(--cbkny-pink); margin-bottom: 1rem;">NY Cannabis Tax Deadlines & Penalties</h3>
        <p style="margin-bottom: 1rem;">Important tax deadlines and penalties every NY cannabis operator should know.</p>
        <a href="#" style="color: var(--cbkny-pink); text-decoration: none; font-weight: 600;">Read More →</a>
      </div>
    </div>
  </section>

  <section style="text-align: center; margin: 4rem 0;">
    <h2 style="color: var(--cbkny-black); margin-bottom: 1rem;">Need Personalized Help?</h2>
    <p style="font-size: 1.25rem; color: var(--cbkny-gray); margin-bottom: 2rem;">These resources are just the beginning. Get personalized guidance for your specific cannabis business needs.</p>
    <a class="btn btn-primary" href="/contact" style="font-size: 1.1rem; padding: 1rem 2rem;">Book Your Free Consultation</a>
  </section>
</main>

<script>
function downloadResource(resourceType) {
  // This would integrate with your lead capture system
  // For now, we'll show a simple prompt
  const email = prompt('Enter your email to download this resource:');
  if (email) {
    alert('Thank you! Check your email for the download link.');
    // Here you would typically:
    // 1. Add contact to CRM
    // 2. Send email with download link
    // 3. Track the lead source
  }
}

function startAssessment() {
  // This would redirect to the assessment quiz
  alert('Assessment quiz coming soon! For now, please contact us for a free consultation.');
}

function startCalculator() {
  // This would redirect to the calculator
  alert('280E Tax Calculator coming soon! For now, please contact us for a free consultation.');
}
</script>

<?php get_footer(); ?>
