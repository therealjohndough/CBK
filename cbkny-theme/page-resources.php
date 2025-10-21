<?php get_header(); ?>
<main class="container">
  <section class="hero">
    <h1>Free Cannabis Accounting Resources</h1>
    <p>Download our expert guides and tools to help your cannabis business stay compliant</p>
  </section>

  <section class="grid" style="grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 2rem; margin: 4rem 0;">
    
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
      <button class="btn btn-primary" onclick="openResourceModal('compliance-checklist')" style="width: 100%; max-width: 100%; display: block; text-align: center; box-sizing: border-box;">View & Download Guide</button>
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
      <button class="btn btn-primary" onclick="openResourceModal('280e-guide')" style="width: 100%; max-width: 100%; display: block; text-align: center; box-sizing: border-box;">View & Download Guide</button>
    </div>

    <div class="card" style="padding: 2rem; text-align: center;">
      <div style="display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; color: var(--cbkny-pink); font-size: 3rem;"><i class="fas fa-search-plus"></i></div>
      <h3 style="color: var(--cbkny-pink); margin-bottom: 1rem;">Cannabis Business Audit Readiness Assessment</h3>
      <p style="margin-bottom: 1.5rem;">Take our interactive quiz to see how audit-ready your cannabis business is and get personalized recommendations.</p>
      <ul style="text-align: left; margin-bottom: 2rem; font-size: 0.9rem; list-style: none; padding-left: 0;">
        <li style="margin-bottom: 0.5rem;">✓ 10-question assessment</li>
        <li style="margin-bottom: 0.5rem;">✓ Instant results & recommendations</li>
        <li style="margin-bottom: 0.5rem;">✓ Priority action items</li>
        <li style="margin-bottom: 0.5rem;">✓ Compliance score</li>
      </ul>
      <a href="/audit-readiness-quiz" class="btn btn-primary" style="width: 100%; max-width: 100%; display: block; text-align: center; text-decoration: none; box-sizing: border-box;">Take Assessment</a>
    </div>

    <div class="card" style="padding: 2rem; text-align: center;">
      <div style="display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; color: var(--cbkny-pink); font-size: 3rem;"><i class="fas fa-file-excel"></i></div>
      <h3 style="color: var(--cbkny-pink); margin-bottom: 1rem;">Cannabis COGS Tracking Template</h3>
      <p style="margin-bottom: 1.5rem;">Download our Excel template for tracking Cost of Goods Sold, inventory, and 280E-compliant expense categorization.</p>
      <ul style="text-align: left; margin-bottom: 2rem; font-size: 0.9rem; list-style: none; padding-left: 0;">
        <li style="margin-bottom: 0.5rem;">✓ Pre-built Excel formulas</li>
        <li style="margin-bottom: 0.5rem;">✓ 280E-compliant categories</li>
        <li style="margin-bottom: 0.5rem;">✓ Monthly tracking sheets</li>
        <li style="margin-bottom: 0.5rem;">✓ Year-end summary reports</li>
      </ul>
      <button class="btn btn-primary" onclick="openResourceModal('cogs-template')" style="width: 100%; max-width: 100%; display: block; text-align: center; box-sizing: border-box;">View & Download Template</button>
    </div>

    <div class="card" style="padding: 2rem; text-align: center;">
      <div style="display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; color: var(--cbkny-pink); font-size: 3rem;"><i class="fas fa-calculator"></i></div>
      <h3 style="color: var(--cbkny-pink); margin-bottom: 1rem;">280E Tax Impact Calculator</h3>
      <p style="margin-bottom: 1.5rem;">Calculate exactly how 280E affects your tax burden and see potential savings from optimization strategies.</p>
      <ul style="text-align: left; margin-bottom: 2rem; font-size: 0.9rem; list-style: none; padding-left: 0;">
        <li style="margin-bottom: 0.5rem;">✓ Real-time tax calculations</li>
        <li style="margin-bottom: 0.5rem;">✓ 280E impact analysis</li>
        <li style="margin-bottom: 0.5rem;">✓ Multi-entity savings calculator</li>
        <li style="margin-bottom: 0.5rem;">✓ Visual tax breakdown charts</li>
      </ul>
      <button class="btn btn-primary" onclick="openResourceModal('tax-calculator')" style="width: 100%; max-width: 100%; display: block; text-align: center; box-sizing: border-box;">Use Calculator</button>
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

<!-- Resource Modal -->
<div id="resourceModal" class="resource-modal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.8); z-index: 10000; overflow-y: auto;">
  <div class="modal-content" style="background: white; margin: 2rem auto; max-width: 800px; border-radius: 1rem; padding: 2rem; position: relative;">
    <button class="close-modal" onclick="closeResourceModal()" style="position: absolute; top: 1rem; right: 1rem; background: none; border: none; font-size: 2rem; cursor: pointer; color: var(--cbkny-gray);">&times;</button>
    
    <div id="modalContent">
      <!-- Content will be loaded here -->
    </div>
  </div>
</div>

<script>
// Modal functionality
function openResourceModal(resourceType) {
  const modal = document.getElementById('resourceModal');
  const modalContent = document.getElementById('modalContent');
  
  // Load content based on resource type
  let content = '';
  
  switch(resourceType) {
    case 'compliance-checklist':
      content = `
        <h2 style="color: var(--cbkny-pink); margin-bottom: 1rem;">NY Cannabis Tax Compliance Checklist</h2>
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
        <h2 style="color: var(--cbkny-pink); margin-bottom: 1rem;">280E Deduction Guide for Cannabis Businesses</h2>
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
      
    case 'audit-quiz':
      content = `
        <h2 style="color: var(--cbkny-pink); margin-bottom: 1rem;">Cannabis Business Audit Readiness Assessment</h2>
        <p style="margin-bottom: 2rem;">Take our interactive quiz to see how audit-ready your cannabis business is and get personalized recommendations.</p>
        
        <div style="background: var(--cbkny-light-gray); padding: 1.5rem; border-radius: 0.5rem; margin-bottom: 2rem;">
          <h4 style="color: var(--cbkny-black); margin-bottom: 1rem;">Assessment Includes:</h4>
          <ul style="margin: 0; padding-left: 1.5rem;">
            <li>✓ 10-question assessment</li>
            <li>✓ Instant results & recommendations</li>
            <li>✓ Priority action items</li>
            <li>✓ Compliance score</li>
            <li>✓ Personalized improvement plan</li>
          </ul>
        </div>
        
        <div style="text-align: center;">
          <a href="/audit-readiness-quiz" class="btn btn-primary" style="width: 100%; margin-bottom: 1rem; display: inline-block; text-align: center; text-decoration: none;">Start Assessment</a>
          <p style="font-size: 0.9rem; color: var(--cbkny-gray);">Take our comprehensive 10-question audit readiness quiz.</p>
        </div>
      `;
      break;
      
    case 'cogs-template':
      content = `
        <h2 style="color: var(--cbkny-pink); margin-bottom: 1rem;">Cannabis COGS Tracking Template</h2>
        <p style="margin-bottom: 2rem;">Download our Excel template for tracking Cost of Goods Sold, inventory, and 280E-compliant expense categorization.</p>
        
        <div style="background: var(--cbkny-light-gray); padding: 1.5rem; border-radius: 0.5rem; margin-bottom: 2rem;">
          <h4 style="color: var(--cbkny-black); margin-bottom: 1rem;">Template Features:</h4>
          <ul style="margin: 0; padding-left: 1.5rem;">
            <li>✓ Pre-built Excel formulas</li>
            <li>✓ 280E-compliant categories</li>
            <li>✓ Monthly tracking sheets</li>
            <li>✓ Year-end summary reports</li>
            <li>✓ Inventory tracking integration</li>
            <li>✓ COGS calculation automation</li>
          </ul>
        </div>
        
        <form id="download-form-template" class="cbkny-download-form" data-file-id="cogs-tracker" style="display: flex; flex-direction: column; gap: 1rem;">
          <input type="email" placeholder="Enter your email" required style="padding: 0.75rem; border: 2px solid #ddd; border-radius: 0.5rem;">
          <input type="text" placeholder="Business name" style="padding: 0.75rem; border: 2px solid #ddd; border-radius: 0.5rem;">
          <label style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.9rem;">
            <input type="checkbox" required> I agree to receive cannabis accounting tips and updates
          </label>
          <button type="submit" class="btn btn-primary" style="width: 100%;">Download Template</button>
        </form>
      `;
      break;
      
    case 'tax-calculator':
      content = `
        <h2 style="color: var(--cbkny-pink); margin-bottom: 1rem;">280E Tax Impact Calculator</h2>
        <p style="margin-bottom: 2rem;">Calculate exactly how 280E affects your tax burden and see potential savings from optimization strategies.</p>
        
        <div style="background: var(--cbkny-light-gray); padding: 1.5rem; border-radius: 0.5rem; margin-bottom: 2rem;">
          <h4 style="color: var(--cbkny-black); margin-bottom: 1rem;">Calculator Features:</h4>
          <ul style="margin: 0; padding-left: 1.5rem;">
            <li>✓ Real-time tax calculations</li>
            <li>✓ 280E impact analysis</li>
            <li>✓ Multi-entity savings calculator</li>
            <li>✓ Visual tax breakdown charts</li>
            <li>✓ Scenario comparisons</li>
          </ul>
        </div>
        
        <div style="text-align: center;">
          <button class="btn btn-primary" onclick="startCalculator()" style="width: 100%; margin-bottom: 1rem;">Use Calculator</button>
          <p style="font-size: 0.9rem; color: var(--cbkny-gray);">Calculator coming soon! Contact us for a free consultation.</p>
        </div>
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
