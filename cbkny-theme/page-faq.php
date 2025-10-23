<?php
/*
Template Name: FAQ Page
*/

get_header(); ?>

<div class="container" style="max-width: 1200px; margin: 0 auto; padding: 2rem;">
  <article style="margin: 2rem 0;">
    <header style="text-align: center; margin-bottom: 3rem;">
      <h1 style="color: var(--cbkny-black); font-size: 2.5rem; margin-bottom: 1rem;">Frequently Asked Questions</h1>
      <p style="font-size: 1.25rem; color: var(--cbkny-gray); margin-bottom: 1rem;">Get answers to the most common questions about cannabis accounting, 280E compliance, and New York State regulations.</p>
    </header>

    <!-- FAQ Schema for SEO -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "What is IRS 280E and how does it affect cannabis businesses?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "IRS 280E is a federal tax law that prohibits cannabis businesses from deducting most business expenses. It was originally created to prevent drug dealers from deducting business expenses, but now applies to all cannabis businesses, even those operating legally under state law. This significantly increases the tax burden for cannabis businesses compared to other industries."
          }
        },
        {
          "@type": "Question",
          "name": "What can a cannabis business deduct under IRS 280E?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Cannabis businesses can primarily deduct Cost of Goods Sold (COGS), which includes direct materials, direct labor, and direct overhead costs. They can also deduct some directly related expenses and very limited administrative costs. Most traditional business expenses like marketing, general admin, and professional services are prohibited."
          }
        },
        {
          "@type": "Question",
          "name": "How do I calculate Cost of Goods Sold (COGS) for cannabis?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "COGS for cannabis includes direct materials (seeds, nutrients, soil, packaging), direct labor (cultivation, processing, packaging staff wages), direct overhead (facility costs, utilities, equipment depreciation), transportation costs, and storage costs. You can use specific identification, FIFO, or weighted average methods to calculate COGS."
          }
        },
        {
          "@type": "Question",
          "name": "What are New York OCM reporting requirements?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "New York's Office of Cannabis Management requires comprehensive seed-to-sale tracking, monthly inventory reports, financial reporting, and compliance with all state regulations. Cannabis businesses must maintain detailed records and submit regular reports to stay compliant with OCM requirements."
          }
        },
        {
          "@type": "Question",
          "name": "Do I need a cannabis-specialized accountant?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes, cannabis accounting requires specialized knowledge of 280E compliance, state regulations, and industry-specific challenges. A cannabis-specialized accountant understands the unique tax implications, reporting requirements, and audit risks that cannabis businesses face."
          }
        }
      ]
    }
    </script>

    <div class="faq-sections" style="max-width: 800px; margin: 0 auto;">
      
      <!-- 280E & Tax Compliance Section -->
      <section style="margin-bottom: 3rem;">
        <h2 style="color: var(--cbkny-pink); font-size: 1.8rem; margin-bottom: 1.5rem; border-bottom: 2px solid var(--cbkny-pink); padding-bottom: 0.5rem;">280E & Tax Compliance</h2>
        
        <div class="faq-item" style="margin-bottom: 1rem; border: 1px solid #e0e0e0; border-radius: 8px; overflow: hidden;">
          <button class="faq-question" style="width: 100%; padding: 1rem; background: #f8f9fa; border: none; text-align: left; cursor: pointer; font-weight: 600; color: var(--cbkny-black);" onclick="toggleFAQ(this)">
            <span>What is IRS 280E and how does it affect cannabis businesses?</span>
            <span style="float: right;">+</span>
          </button>
          <div class="faq-answer" style="display: none; padding: 1rem; background: white; border-top: 1px solid #e0e0e0;">
            <p>IRS 280E is a federal tax law that prohibits cannabis businesses from deducting most business expenses. It was originally created to prevent drug dealers from deducting business expenses, but now applies to all cannabis businesses, even those operating legally under state law. This significantly increases the tax burden for cannabis businesses compared to other industries.</p>
          </div>
        </div>

        <div class="faq-item" style="margin-bottom: 1rem; border: 1px solid #e0e0e0; border-radius: 8px; overflow: hidden;">
          <button class="faq-question" style="width: 100%; padding: 1rem; background: #f8f9fa; border: none; text-align: left; cursor: pointer; font-weight: 600; color: var(--cbkny-black);" onclick="toggleFAQ(this)">
            <span>What can a cannabis business deduct under IRS 280E?</span>
            <span style="float: right;">+</span>
          </button>
          <div class="faq-answer" style="display: none; padding: 1rem; background: white; border-top: 1px solid #e0e0e0;">
            <p>Cannabis businesses can primarily deduct Cost of Goods Sold (COGS), which includes direct materials, direct labor, and direct overhead costs. They can also deduct some directly related expenses and very limited administrative costs. Most traditional business expenses like marketing, general admin, and professional services are prohibited.</p>
          </div>
        </div>

        <div class="faq-item" style="margin-bottom: 1rem; border: 1px solid #e0e0e0; border-radius: 8px; overflow: hidden;">
          <button class="faq-question" style="width: 100%; padding: 1rem; background: #f8f9fa; border: none; text-align: left; cursor: pointer; font-weight: 600; color: var(--cbkny-black);" onclick="toggleFAQ(this)">
            <span>How do I calculate Cost of Goods Sold (COGS) for cannabis?</span>
            <span style="float: right;">+</span>
          </button>
          <div class="faq-answer" style="display: none; padding: 1rem; background: white; border-top: 1px solid #e0e0e0;">
            <p>COGS for cannabis includes direct materials (seeds, nutrients, soil, packaging), direct labor (cultivation, processing, packaging staff wages), direct overhead (facility costs, utilities, equipment depreciation), transportation costs, and storage costs. You can use specific identification, FIFO, or weighted average methods to calculate COGS.</p>
          </div>
        </div>

        <div class="faq-item" style="margin-bottom: 1rem; border: 1px solid #e0e0e0; border-radius: 8px; overflow: hidden;">
          <button class="faq-question" style="width: 100%; padding: 1rem; background: #f8f9fa; border: none; text-align: left; cursor: pointer; font-weight: 600; color: var(--cbkny-black);" onclick="toggleFAQ(this)">
            <span>Can I deduct marketing and advertising expenses?</span>
            <span style="float: right;">+</span>
          </button>
          <div class="faq-answer" style="display: none; padding: 1rem; background: white; border-top: 1px solid #e0e0e0;">
            <p>No, marketing and advertising expenses are generally not deductible under 280E. This includes social media advertising, print ads, billboards, sponsorships, and other promotional activities. These expenses are considered general business expenses that are prohibited under 280E.</p>
          </div>
        </div>

        <div class="faq-item" style="margin-bottom: 1rem; border: 1px solid #e0e0e0; border-radius: 8px; overflow: hidden;">
          <button class="faq-question" style="width: 100%; padding: 1rem; background: #f8f9fa; border: none; text-align: left; cursor: pointer; font-weight: 600; color: var(--cbkny-black);" onclick="toggleFAQ(this)">
            <span>What is the difference between direct and indirect costs?</span>
            <span style="float: right;">+</span>
          </button>
          <div class="faq-answer" style="display: none; padding: 1rem; background: white; border-top: 1px solid #e0e0e0;">
            <p>Direct costs are expenses directly related to producing cannabis products (materials, labor, equipment). These can be included in COGS and are deductible. Indirect costs are general business expenses (office rent, admin salaries, marketing) that are not directly tied to production and are generally not deductible under 280E.</p>
          </div>
        </div>
      </section>

      <!-- New York State Compliance Section -->
      <section style="margin-bottom: 3rem;">
        <h2 style="color: var(--cbkny-pink); font-size: 1.8rem; margin-bottom: 1.5rem; border-bottom: 2px solid var(--cbkny-pink); padding-bottom: 0.5rem;">New York State Compliance</h2>
        
        <div class="faq-item" style="margin-bottom: 1rem; border: 1px solid #e0e0e0; border-radius: 8px; overflow: hidden;">
          <button class="faq-question" style="width: 100%; padding: 1rem; background: #f8f9fa; border: none; text-align: left; cursor: pointer; font-weight: 600; color: var(--cbkny-black);" onclick="toggleFAQ(this)">
            <span>What are New York OCM reporting requirements?</span>
            <span style="float: right;">+</span>
          </button>
          <div class="faq-answer" style="display: none; padding: 1rem; background: white; border-top: 1px solid #e0e0e0;">
            <p>New York's Office of Cannabis Management requires comprehensive seed-to-sale tracking, monthly inventory reports, financial reporting, and compliance with all state regulations. Cannabis businesses must maintain detailed records and submit regular reports to stay compliant with OCM requirements.</p>
          </div>
        </div>

        <div class="faq-item" style="margin-bottom: 1rem; border: 1px solid #e0e0e0; border-radius: 8px; overflow: hidden;">
          <button class="faq-question" style="width: 100%; padding: 1rem; background: #f8f9fa; border: none; text-align: left; cursor: pointer; font-weight: 600; color: var(--cbkny-black);" onclick="toggleFAQ(this)">
            <span>How do I stay compliant with NYS cannabis regulations?</span>
            <span style="float: right;">+</span>
          </button>
          <div class="faq-answer" style="display: none; padding: 1rem; background: white; border-top: 1px solid #e0e0e0;">
            <p>Stay compliant by maintaining accurate records, following seed-to-sale tracking requirements, submitting required reports on time, keeping up with regulation changes, and working with cannabis-specialized professionals who understand NYS requirements.</p>
          </div>
        </div>

        <div class="faq-item" style="margin-bottom: 1rem; border: 1px solid #e0e0e0; border-radius: 8px; overflow: hidden;">
          <button class="faq-question" style="width: 100%; padding: 1rem; background: #f8f9fa; border: none; text-align: left; cursor: pointer; font-weight: 600; color: var(--cbkny-black);" onclick="toggleFAQ(this)">
            <span>What licenses do I need for cannabis business in NY?</span>
            <span style="float: right;">+</span>
          </button>
          <div class="faq-answer" style="display: none; padding: 1rem; background: white; border-top: 1px solid #e0e0e0;">
            <p>Required licenses depend on your business type: cultivation, processing, distribution, or retail. Each requires specific OCM licenses and compliance with state regulations. Consult with cannabis business attorneys and compliance experts to determine your specific licensing needs.</p>
          </div>
        </div>

        <div class="faq-item" style="margin-bottom: 1rem; border: 1px solid #e0e0e0; border-radius: 8px; overflow: hidden;">
          <button class="faq-question" style="width: 100%; padding: 1rem; background: #f8f9fa; border: none; text-align: left; cursor: pointer; font-weight: 600; color: var(--cbkny-black);" onclick="toggleFAQ(this)">
            <span>When are NY cannabis tax deadlines?</span>
            <span style="float: right;">+</span>
          </button>
          <div class="faq-answer" style="display: none; padding: 1rem; background: white; border-top: 1px solid #e0e0e0;">
            <p>NY cannabis tax deadlines vary by tax type. Sales tax is typically due monthly, while income tax follows standard federal deadlines. Potency tax has specific quarterly deadlines. Consult with a cannabis accountant to ensure you meet all applicable deadlines for your business.</p>
          </div>
        </div>
      </section>

      <!-- Bookkeeping & Financials Section -->
      <section style="margin-bottom: 3rem;">
        <h2 style="color: var(--cbkny-pink); font-size: 1.8rem; margin-bottom: 1.5rem; border-bottom: 2px solid var(--cbkny-pink); padding-bottom: 0.5rem;">Bookkeeping & Financials</h2>
        
        <div class="faq-item" style="margin-bottom: 1rem; border: 1px solid #e0e0e0; border-radius: 8px; overflow: hidden;">
          <button class="faq-question" style="width: 100%; padding: 1rem; background: #f8f9fa; border: none; text-align: left; cursor: pointer; font-weight: 600; color: var(--cbkny-black);" onclick="toggleFAQ(this)">
            <span>What is cost of goods sold (COGS)?</span>
            <span style="float: right;">+</span>
          </button>
          <div class="faq-answer" style="display: none; padding: 1rem; background: white; border-top: 1px solid #e0e0e0;">
            <p>Cost of Goods Sold (COGS) is the total cost of producing goods sold during a specific period. For cannabis, this includes direct materials, direct labor, and direct overhead costs. COGS is the primary deduction available to cannabis businesses under 280E.</p>
          </div>
        </div>

        <div class="faq-item" style="margin-bottom: 1rem; border: 1px solid #e0e0e0; border-radius: 8px; overflow: hidden;">
          <button class="faq-question" style="width: 100%; padding: 1rem; background: #f8f9fa; border: none; text-align: left; cursor: pointer; font-weight: 600; color: var(--cbkny-black);" onclick="toggleFAQ(this)">
            <span>Are taxes the same as financials?</span>
            <span style="float: right;">+</span>
          </button>
          <div class="faq-answer" style="display: none; padding: 1rem; background: white; border-top: 1px solid #e0e0e0;">
            <p>No, taxes and financials are related but different. Taxes refer to money paid to government authorities (income tax, sales tax, property tax). Financials are reports showing your company's financial health (balance sheets, income statements, cash flow). You need accurate financials to complete your taxes properly.</p>
          </div>
        </div>

        <div class="faq-item" style="margin-bottom: 1rem; border: 1px solid #e0e0e0; border-radius: 8px; overflow: hidden;">
          <button class="faq-question" style="width: 100%; padding: 1rem; background: #f8f9fa; border: none; text-align: left; cursor: pointer; font-weight: 600; color: var(--cbkny-black);" onclick="toggleFAQ(this)">
            <span>How often should I reconcile my cannabis business accounts?</span>
            <span style="float: right;">+</span>
          </button>
          <div class="faq-answer" style="display: none; padding: 1rem; background: white; border-top: 1px solid #e0e0e0;">
            <p>Monthly reconciliation is recommended for cannabis businesses due to high audit risk and complex compliance requirements. This ensures accurate records, proper COGS tracking, and compliance with both federal and state regulations. More frequent reconciliation may be needed for high-volume operations.</p>
          </div>
        </div>

        <div class="faq-item" style="margin-bottom: 1rem; border: 1px solid #e0e0e0; border-radius: 8px; overflow: hidden;">
          <button class="faq-question" style="width: 100%; padding: 1rem; background: #f8f9fa; border: none; text-align: left; cursor: pointer; font-weight: 600; color: var(--cbkny-black);" onclick="toggleFAQ(this)">
            <span>What records do I need to keep for IRS audits?</span>
            <span style="float: right;">+</span>
          </button>
          <div class="faq-answer" style="display: none; padding: 1rem; background: white; border-top: 1px solid #e0e0e0;">
            <p>Keep detailed records for at least 7 years: receipts, invoices, bank statements, inventory records, COGS calculations, payroll records, and all business transactions. Cannabis businesses face higher audit risk, so comprehensive documentation is essential for audit protection.</p>
          </div>
        </div>
      </section>

      <!-- Getting Started Section -->
      <section style="margin-bottom: 3rem;">
        <h2 style="color: var(--cbkny-pink); font-size: 1.8rem; margin-bottom: 1.5rem; border-bottom: 2px solid var(--cbkny-pink); padding-bottom: 0.5rem;">Getting Started</h2>
        
        <div class="faq-item" style="margin-bottom: 1rem; border: 1px solid #e0e0e0; border-radius: 8px; overflow: hidden;">
          <button class="faq-question" style="width: 100%; padding: 1rem; background: #f8f9fa; border: none; text-align: left; cursor: pointer; font-weight: 600; color: var(--cbkny-black);" onclick="toggleFAQ(this)">
            <span>Do I need a cannabis-specialized accountant?</span>
            <span style="float: right;">+</span>
          </button>
          <div class="faq-answer" style="display: none; padding: 1rem; background: white; border-top: 1px solid #e0e0e0;">
            <p>Yes, cannabis accounting requires specialized knowledge of 280E compliance, state regulations, and industry-specific challenges. A cannabis-specialized accountant understands the unique tax implications, reporting requirements, and audit risks that cannabis businesses face.</p>
          </div>
        </div>

        <div class="faq-item" style="margin-bottom: 1rem; border: 1px solid #e0e0e0; border-radius: 8px; overflow: hidden;">
          <button class="faq-question" style="width: 100%; padding: 1rem; background: #f8f9fa; border: none; text-align: left; cursor: pointer; font-weight: 600; color: var(--cbkny-black);" onclick="toggleFAQ(this)">
            <span>How do I prepare for an IRS audit?</span>
            <span style="float: right;">+</span>
          </button>
          <div class="faq-answer" style="display: none; padding: 1rem; background: white; border-top: 1px solid #e0e0e0;">
            <p>Prepare by maintaining detailed records, ensuring COGS calculations are accurate, keeping receipts and invoices, documenting all business expenses, and working with a cannabis accountant who can provide audit representation and support.</p>
          </div>
        </div>

        <div class="faq-item" style="margin-bottom: 1rem; border: 1px solid #e0e0e0; border-radius: 8px; overflow: hidden;">
          <button class="faq-question" style="width: 100%; padding: 1rem; background: #f8f9fa; border: none; text-align: left; cursor: pointer; font-weight: 600; color: var(--cbkny-black);" onclick="toggleFAQ(this)">
            <span>What financial statements does my cannabis business need?</span>
            <span style="float: right;">+</span>
          </button>
          <div class="faq-answer" style="display: none; padding: 1rem; background: white; border-top: 1px solid #e0e0e0;">
            <p>Cannabis businesses need standard financial statements: balance sheet, income statement, and cash flow statement. These should be prepared monthly and include detailed COGS breakdowns, inventory tracking, and compliance with both federal and state reporting requirements.</p>
          </div>
        </div>
      </section>

      <!-- Newsletter Signup -->
      <section style="text-align: center; background: #f8f9fa; padding: 2rem; border-radius: 8px; margin-top: 3rem;">
        <h3 style="color: var(--cbkny-pink); margin-bottom: 1rem;">21+ New York State Cannabis Newsletter</h3>
        <p style="margin-bottom: 1.5rem; color: var(--cbkny-gray);">Stay updated with the latest cannabis accounting news and compliance updates.</p>
        <form style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
          <input type="email" placeholder="Enter your email" style="padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; min-width: 250px;">
          <button type="submit" style="background: var(--cbkny-pink); color: white; padding: 0.75rem 1.5rem; border: none; border-radius: 4px; cursor: pointer; font-weight: 600;">Sign Up</button>
        </form>
      </section>
    </div>
  </article>
</div>

<script>
function toggleFAQ(button) {
  const answer = button.nextElementSibling;
  const icon = button.querySelector('span:last-child');
  
  if (answer.style.display === 'none' || answer.style.display === '') {
    answer.style.display = 'block';
    icon.textContent = '−';
  } else {
    answer.style.display = 'none';
    icon.textContent = '+';
  }
}
</script>

<?php get_footer(); ?>
