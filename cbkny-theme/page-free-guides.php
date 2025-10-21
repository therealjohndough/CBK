<?php get_header(); ?>
<main class="container">
  <!-- Breadcrumb Navigation -->
  <nav style="margin: 1rem 0; font-size: 0.9rem;">
    <a href="/" style="color: var(--cbkny-gray); text-decoration: none;">Home</a> > 
    <a href="/resources" style="color: var(--cbkny-gray); text-decoration: none;">Resources</a> > 
    <span style="color: var(--cbkny-pink);">Free Guides</span>
  </nav>

  <section class="hero">
    <h1>Free Cannabis Accounting Guides</h1>
    <p>Expert-written guides to help your cannabis business stay compliant and maximize deductions</p>
  </section>

  <section class="grid" style="grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 2rem; margin: 4rem 0;">
    
    <div class="card" style="padding: 2rem; text-align: center;">
      <div style="display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; color: var(--cbkny-pink); font-size: 3rem;"><i class="fas fa-clipboard-check"></i></div>
      <h3 style="color: var(--cbkny-pink); margin-bottom: 1rem;"><?php echo esc_html(cbkny_get_option('cbkny_lead_magnet_1_title', 'NY Cannabis Tax Compliance Checklist')); ?></h3>
      <p style="margin-bottom: 1.5rem;"><?php echo esc_html(cbkny_get_option('cbkny_lead_magnet_1_description', 'A comprehensive checklist covering all NY cannabis tax requirements, 280E compliance, and OCM reporting deadlines.')); ?></p>
      <ul style="text-align: left; margin-bottom: 2rem; font-size: 0.9rem; list-style: none; padding-left: 0;">
        <li style="margin-bottom: 0.5rem;">✓ 280E deduction guidelines</li>
        <li style="margin-bottom: 0.5rem;">✓ OCM reporting requirements</li>
        <li style="margin-bottom: 0.5rem;">✓ Quarterly tax deadlines</li>
        <li style="margin-bottom: 0.5rem;">✓ Audit preparation checklist</li>
      </ul>
      <button class="btn btn-primary" onclick="openResourceModal('compliance-checklist')" style="width: 100%; max-width: 100%; display: block; text-align: center; box-sizing: border-box;">Download Free Guide</button>
    </div>

    <div class="card" style="padding: 2rem; text-align: center;">
      <div style="display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; color: var(--cbkny-pink); font-size: 3rem;"><i class="fas fa-chart-line"></i></div>
      <h3 style="color: var(--cbkny-pink); margin-bottom: 1rem;"><?php echo esc_html(cbkny_get_option('cbkny_lead_magnet_2_title', '280E Deduction Guide for Cannabis Businesses')); ?></h3>
      <p style="margin-bottom: 1.5rem;"><?php echo esc_html(cbkny_get_option('cbkny_lead_magnet_2_description', 'Learn how to maximize your deductions under 280E while staying fully compliant with IRS regulations.')); ?></p>
      <ul style="text-align: left; margin-bottom: 2rem; font-size: 0.9rem; list-style: none; padding-left: 0;">
        <li style="margin-bottom: 0.5rem;">✓ Deductible vs non-deductible expenses</li>
        <li style="margin-bottom: 0.5rem;">✓ COGS calculation methods</li>
        <li style="margin-bottom: 0.5rem;">✓ Multi-entity strategies</li>
        <li style="margin-bottom: 0.5rem;">✓ Audit defense tactics</li>
      </ul>
      <button class="btn btn-primary" onclick="openResourceModal('280e-guide')" style="width: 100%; max-width: 100%; display: block; text-align: center; box-sizing: border-box;">Download Free Guide</button>
    </div>
  </section>

  <section style="background: var(--cbkny-light-gray); padding: 3rem; border-radius: 1rem; margin: 4rem 0; text-align: center;">
    <h2 style="color: var(--cbkny-black); margin-bottom: 2rem;">Why Download Our Guides?</h2>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem; max-width: 800px; margin: 0 auto;">
      
      <div style="background: var(--cbkny-white); padding: 1.5rem; border-radius: 0.5rem;">
        <div style="color: var(--cbkny-pink); font-size: 2rem; margin-bottom: 1rem;"><i class="fas fa-expert"></i></div>
        <h4 style="color: var(--cbkny-black); margin-bottom: 1rem;">Expert Knowledge</h4>
        <p>Written by certified cannabis accounting professionals with deep NY regulatory knowledge.</p>
      </div>

      <div style="background: var(--cbkny-white); padding: 1.5rem; border-radius: 0.5rem;">
        <div style="color: var(--cbkny-pink); font-size: 2rem; margin-bottom: 1rem;"><i class="fas fa-shield-alt"></i></div>
        <h4 style="color: var(--cbkny-black); margin-bottom: 1rem;">Stay Compliant</h4>
        <p>Keep up with changing NY cannabis regulations and IRS requirements for 280E compliance.</p>
      </div>

      <div style="background: var(--cbkny-white); padding: 1.5rem; border-radius: 0.5rem;">
        <div style="color: var(--cbkny-pink); font-size: 2rem; margin-bottom: 1rem;"><i class="fas fa-dollar-sign"></i></div>
        <h4 style="color: var(--cbkny-black); margin-bottom: 1rem;">Save Money</h4>
        <p>Learn legitimate tax strategies to maximize your deductions and reduce your tax burden.</p>
      </div>
    </div>
  </section>

  <section style="text-align: center; margin: 4rem 0;">
    <h2 style="color: var(--cbkny-black); margin-bottom: 1rem;">Need Personalized Help?</h2>
    <p style="font-size: 1.25rem; color: var(--cbkny-gray); margin-bottom: 2rem;">These guides are just the beginning. Get personalized cannabis accounting advice for your specific business.</p>
    <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
      <a href="/contact" class="btn btn-primary" style="font-size: 1.1rem; padding: 1rem 2rem;">Schedule Free Consultation</a>
      <a href="/services" class="btn" style="background: var(--cbkny-gray); color: white; font-size: 1.1rem; padding: 1rem 2rem;">View Our Services</a>
    </div>
  </section>
</main>

<!-- Resource Modal (same as resources page) -->
<div id="resourceModal" class="resource-modal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.8); z-index: 10000; overflow-y: auto;">
  <div class="modal-content" style="background: white; margin: 2rem auto; max-width: 800px; border-radius: 1rem; padding: 2rem; position: relative;">
    <button class="close-modal" onclick="closeResourceModal()" style="position: absolute; top: 1rem; right: 1rem; background: none; border: none; font-size: 2rem; cursor: pointer; color: var(--cbkny-gray);">&times;</button>
    
    <div id="modalContent">
      <!-- Content will be loaded here -->
    </div>
  </div>
</div>

<script>
// Modal functionality (same as resources page)
function openResourceModal(resourceType) {
  const modal = document.getElementById('resourceModal');
  const modalContent = document.getElementById('modalContent');
  
  // Load content based on resource type
  let content = '';
  
  switch(resourceType) {
    case 'compliance-checklist':
      content = `
        <h2 style="color: var(--cbkny-black); margin-bottom: 1rem;">NY Cannabis Tax Compliance Checklist</h2>
        <p style="margin-bottom: 2rem;">Download our comprehensive 8-page checklist covering all NY cannabis tax requirements, 280E compliance, and OCM reporting deadlines.</p>
        
        <div style="background: var(--cbkny-light-gray); padding: 1.5rem; border-radius: 0.5rem; margin-bottom: 2rem;">
          <h4 style="color: var(--cbkny-black); margin-bottom: 1rem;">What's Included:</h4>
          <ul style="margin: 0; padding-left: 1.5rem;">
            <li>✓ 280E deduction guidelines</li>
            <li>✓ OCM reporting requirements</li>
            <li>✓ Quarterly tax deadlines</li>
            <li>✓ Audit preparation checklist</li>
            <li>✓ Monthly compliance tasks</li>
            <li>✓ Record-keeping requirements</li>
          </ul>
        </div>
        
        <form id="download-form-checklist" class="cbkny-download-form" data-file-id="compliance-checklist" style="display: flex; flex-direction: column; gap: 1rem;">
          <input type="email" placeholder="Enter your email" required style="padding: 0.75rem; border: 2px solid #ddd; border-radius: 0.5rem;">
          <input type="text" placeholder="Business name" style="padding: 0.75rem; border: 2px solid #ddd; border-radius: 0.5rem;">
          <label style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.9rem;">
            <input type="checkbox" required> I agree to receive cannabis accounting tips and updates
          </label>
          <button type="submit" class="btn btn-primary" style="width: 100%;">Download Free Guide</button>
        </form>
      `;
      break;
      
    case '280e-guide':
      content = `
        <h2 style="color: var(--cbkny-black); margin-bottom: 1rem;">280E Deduction Guide for Cannabis Businesses</h2>
        <p style="margin-bottom: 2rem;">Learn how to maximize your deductions under 280E while staying fully compliant with IRS regulations.</p>
        
        <div style="background: var(--cbkny-light-gray); padding: 1.5rem; border-radius: 0.5rem; margin-bottom: 2rem;">
          <h4 style="color: var(--cbkny-black); margin-bottom: 1rem;">What's Included:</h4>
          <ul style="margin: 0; padding-left: 1.5rem;">
            <li>✓ Deductible vs non-deductible expenses</li>
            <li>✓ COGS calculation methods</li>
            <li>✓ Multi-entity strategies</li>
            <li>✓ Audit defense tactics</li>
            <li>✓ Real-world case studies</li>
            <li>✓ Implementation checklist</li>
          </ul>
        </div>
        
        <form id="download-form-guide" class="cbkny-download-form" data-file-id="280e-guide" style="display: flex; flex-direction: column; gap: 1rem;">
          <input type="email" placeholder="Enter your email" required style="padding: 0.75rem; border: 2px solid #ddd; border-radius: 0.5rem;">
          <input type="text" placeholder="Business name" style="padding: 0.75rem; border: 2px solid #ddd; border-radius: 0.5rem;">
          <label style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.9rem;">
            <input type="checkbox" required> I agree to receive cannabis accounting tips and updates
          </label>
          <button type="submit" class="btn btn-primary" style="width: 100%;">Download Free Guide</button>
        </form>
      `;
      break;
  }
  
  modalContent.innerHTML = content;
  modal.style.display = 'block';
  document.body.style.overflow = 'hidden';
}

function closeResourceModal() {
  const modal = document.getElementById('resourceModal');
  modal.style.display = 'none';
  document.body.style.overflow = 'auto';
}

// Close modal when clicking outside
document.addEventListener('click', function(event) {
  const modal = document.getElementById('resourceModal');
  if (event.target === modal) {
    closeResourceModal();
  }
});
</script>

<?php get_footer(); ?>
