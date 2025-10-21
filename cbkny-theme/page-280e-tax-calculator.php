<?php get_header(); ?>
<main class="container">
  <section class="hero">
    <h1>280E Tax Impact Calculator</h1>
    <p>See how 280E affects your cannabis business taxes</p>
  </section>

  <section style="max-width: 800px; margin: 4rem auto;">
    <div class="card" style="padding: 2rem;">
      
      <div class="calculator-intro">
        <h2>🎯 What This Calculator Shows</h2>
        <p>This interactive calculator demonstrates the real tax impact of IRC 280E on your cannabis business. See exactly how much you're paying in additional taxes due to 280E restrictions.</p>
        
        <div style="background: var(--cbkny-light-gray); padding: 1.5rem; border-radius: 8px; margin: 2rem 0;">
          <h3>📊 Calculator Includes:</h3>
          <ul>
            <li><strong>Tax Impact Analysis</strong> - Compare taxes with and without 280E</li>
            <li><strong>COGS Optimization</strong> - See how maximizing COGS reduces tax burden</li>
            <li><strong>Multi-Entity Benefits</strong> - Calculate potential savings from proper structure</li>
            <li><strong>Visual Charts</strong> - Easy-to-understand tax breakdown</li>
            <li><strong>Actionable Recommendations</strong> - Specific steps to reduce your tax burden</li>
          </ul>
        </div>
      </div>

      <div class="calculator-container">
        <form id="tax-calculator-form">
          
          <div class="calculator-section">
            <h3>💰 Business Financials</h3>
            <div class="input-group">
              <label for="annual-revenue">Annual Revenue ($)</label>
              <input type="number" id="annual-revenue" name="revenue" placeholder="1000000" required>
            </div>
            
            <div class="input-group">
              <label for="cogs-amount">Cost of Goods Sold (COGS) ($)</label>
              <input type="number" id="cogs-amount" name="cogs" placeholder="400000" required>
            </div>
            
            <div class="input-group">
              <label for="operating-expenses">Operating Expenses ($)</label>
              <input type="number" id="operating-expenses" name="expenses" placeholder="300000" required>
            </div>
          </div>

          <div class="calculator-section">
            <h3>📊 Tax Information</h3>
            <div class="input-group">
              <label for="tax-bracket">Tax Bracket (%)</label>
              <select id="tax-bracket" name="tax_bracket" required>
                <option value="21">21% (Corporate)</option>
                <option value="25">25% (Individual)</option>
                <option value="28">28% (Individual)</option>
                <option value="32">32% (Individual)</option>
                <option value="35">35% (Individual)</option>
                <option value="37">37% (Individual)</option>
              </select>
            </div>
          </div>

          <div class="calculator-section">
            <h3>🏢 Business Structure</h3>
            <div class="input-group">
              <label for="entity-type">Entity Type</label>
              <select id="entity-type" name="entity_type" required>
                <option value="single">Single Entity</option>
                <option value="multi">Multi-Entity Structure</option>
              </select>
            </div>
            
            <div class="input-group" id="management-company" style="display: none;">
              <label for="management-expenses">Management Company Expenses ($)</label>
              <input type="number" id="management-expenses" name="management_expenses" placeholder="50000">
            </div>
          </div>

          <div class="calculator-submit" style="text-align: center; margin: 3rem 0;">
            <button type="submit" class="btn btn-primary" style="padding: 1rem 2rem; font-size: 1.1rem;">
              🧮 Calculate Tax Impact
            </button>
          </div>

        </form>

        <div id="calculator-results" style="display: none;">
          <div class="results-header" style="text-align: center; margin: 2rem 0;">
            <h2>📊 Your Tax Impact Analysis</h2>
          </div>

          <div class="results-summary" style="background: var(--cbkny-light-gray); padding: 2rem; border-radius: 8px; margin: 2rem 0;">
            <div class="summary-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 2rem;">
              <div class="summary-item">
                <h4>Without 280E</h4>
                <div id="tax-without-280e" class="tax-amount"></div>
              </div>
              <div class="summary-item">
                <h4>With 280E</h4>
                <div id="tax-with-280e" class="tax-amount"></div>
              </div>
              <div class="summary-item">
                <h4>280E Impact</h4>
                <div id="tax-impact" class="tax-amount impact"></div>
              </div>
            </div>
          </div>

          <div class="results-chart" style="background: var(--cbkny-white); padding: 2rem; border-radius: 8px; margin: 2rem 0;">
            <h3>📈 Tax Breakdown</h3>
            <div id="tax-chart" style="height: 300px; display: flex; align-items: end; gap: 2rem; padding: 2rem 0;">
              <!-- Chart will be generated here -->
            </div>
          </div>

          <div class="results-recommendations" style="background: var(--cbkny-white); border-left: 4px solid var(--cbkny-pink); padding: 2rem; margin: 2rem 0;">
            <h3>🎯 Recommendations to Reduce Tax Burden</h3>
            <div id="recommendations-list"></div>
          </div>

          <div class="results-cta" style="text-align: center; margin: 3rem 0;">
            <h3>💡 Ready to Optimize Your Tax Strategy?</h3>
            <p>Our team of cannabis accounting experts can help you implement these strategies and maximize your deductions.</p>
            <a href="/contact" class="btn btn-primary" style="display: inline-block; margin-top: 1rem;">
              💬 Schedule Free Tax Consultation
            </a>
          </div>
        </div>
      </div>
      
    </div>
  </section>
</main>

<style>
.calculator-section {
  background: var(--cbkny-white);
  border: 1px solid #ddd;
  border-radius: 8px;
  padding: 2rem;
  margin: 2rem 0;
}

.calculator-section h3 {
  color: var(--cbkny-pink);
  margin-top: 0;
}

.input-group {
  margin-bottom: 1.5rem;
}

.input-group label {
  display: block;
  margin-bottom: 0.5rem;
  font-weight: bold;
  color: var(--cbkny-black);
}

.input-group input,
.input-group select {
  width: 100%;
  padding: 0.75rem;
  border: 1px solid #ddd;
  border-radius: 4px;
  font-size: 1rem;
}

.calculator-submit {
  background: var(--cbkny-light-gray);
  padding: 2rem;
  border-radius: 8px;
  margin: 2rem 0;
}

.tax-amount {
  font-size: 2rem;
  font-weight: bold;
  color: var(--cbkny-black);
}

.tax-amount.impact {
  color: var(--cbkny-pink);
}

.summary-item {
  text-align: center;
}

.summary-item h4 {
  margin-bottom: 1rem;
  color: var(--cbkny-gray);
}

.chart-bar {
  background: var(--cbkny-pink);
  border-radius: 4px 4px 0 0;
  display: flex;
  align-items: end;
  justify-content: center;
  color: white;
  font-weight: bold;
  min-height: 50px;
  transition: height 0.3s ease;
}

.chart-bar.without-280e {
  background: #28a745;
}

.chart-bar.with-280e {
  background: var(--cbkny-pink);
}

.chart-label {
  text-align: center;
  margin-top: 1rem;
  font-weight: bold;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById('tax-calculator-form');
  const resultsDiv = document.getElementById('calculator-results');
  const entityTypeSelect = document.getElementById('entity-type');
  const managementCompanyDiv = document.getElementById('management-company');
  
  // Show/hide management company expenses based on entity type
  entityTypeSelect.addEventListener('change', function() {
    if (this.value === 'multi') {
      managementCompanyDiv.style.display = 'block';
    } else {
      managementCompanyDiv.style.display = 'none';
    }
  });
  
  form.addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Get form data
    const revenue = parseFloat(document.getElementById('annual-revenue').value);
    const cogs = parseFloat(document.getElementById('cogs-amount').value);
    const expenses = parseFloat(document.getElementById('operating-expenses').value);
    const taxBracket = parseFloat(document.getElementById('tax-bracket').value) / 100;
    const entityType = document.getElementById('entity-type').value;
    const managementExpenses = parseFloat(document.getElementById('management-expenses').value) || 0;
    
    // Calculate taxes
    const results = calculateTaxImpact(revenue, cogs, expenses, taxBracket, entityType, managementExpenses);
    
    // Display results
    displayResults(results);
    
    // Track calculator usage
    if (typeof gtag !== 'undefined') {
      gtag('event', 'calculator_usage', {
        'event_category': 'engagement',
        'event_label': '280E Tax Calculator',
        'value': Math.round(results.impact)
      });
    }
    
    if (typeof fbq !== 'undefined') {
      fbq('track', 'Lead', {
        content_name: '280E Tax Calculator',
        content_category: 'calculator'
      });
    }
  });
  
  function calculateTaxImpact(revenue, cogs, expenses, taxBracket, entityType, managementExpenses) {
    // Without 280E: Taxable income = Revenue - COGS - Operating Expenses
    const taxableIncomeWithout280E = revenue - cogs - expenses;
    const taxWithout280E = taxableIncomeWithout280E * taxBracket;
    
    // With 280E: Taxable income = Revenue - COGS only
    const taxableIncomeWith280E = revenue - cogs;
    const taxWith280E = taxableIncomeWith280E * taxBracket;
    
    // Calculate impact
    const impact = taxWith280E - taxWithout280E;
    
    // Multi-entity benefits
    let multiEntitySavings = 0;
    if (entityType === 'multi' && managementExpenses > 0) {
      multiEntitySavings = managementExpenses * taxBracket;
    }
    
    return {
      revenue,
      cogs,
      expenses,
      taxBracket,
      taxableIncomeWithout280E,
      taxableIncomeWith280E,
      taxWithout280E,
      taxWith280E,
      impact,
      multiEntitySavings
    };
  }
  
  function displayResults(results) {
    // Update summary
    document.getElementById('tax-without-280e').textContent = formatCurrency(results.taxWithout280E);
    document.getElementById('tax-with-280e').textContent = formatCurrency(results.taxWith280E);
    document.getElementById('tax-impact').textContent = formatCurrency(results.impact);
    
    // Generate chart
    generateChart(results);
    
    // Generate recommendations
    generateRecommendations(results);
    
    // Show results
    resultsDiv.style.display = 'block';
    resultsDiv.scrollIntoView({ behavior: 'smooth' });
  }
  
  function generateChart(results) {
    const chartDiv = document.getElementById('tax-chart');
    const maxTax = Math.max(results.taxWithout280E, results.taxWith280E);
    
    const without280EHeight = (results.taxWithout280E / maxTax) * 200;
    const with280EHeight = (results.taxWith280E / maxTax) * 200;
    
    chartDiv.innerHTML = `
      <div style="flex: 1; display: flex; flex-direction: column; align-items: center;">
        <div class="chart-bar without-280e" style="height: ${without280EHeight}px; width: 100%;">
          ${formatCurrency(results.taxWithout280E)}
        </div>
        <div class="chart-label">Without 280E</div>
      </div>
      <div style="flex: 1; display: flex; flex-direction: column; align-items: center;">
        <div class="chart-bar with-280e" style="height: ${with280EHeight}px; width: 100%;">
          ${formatCurrency(results.taxWith280E)}
        </div>
        <div class="chart-label">With 280E</div>
      </div>
    `;
  }
  
  function generateRecommendations(results) {
    const recommendations = [];
    
    // COGS optimization
    const cogsPercentage = (results.cogs / results.revenue) * 100;
    if (cogsPercentage < 40) {
      recommendations.push({
        title: 'Maximize COGS Tracking',
        description: `Your COGS is only ${cogsPercentage.toFixed(1)}% of revenue. Consider reviewing your cost categorization to ensure all direct production costs are properly included.`
      });
    }
    
    // Multi-entity structure
    if (results.multiEntitySavings > 0) {
      recommendations.push({
        title: 'Multi-Entity Structure Benefits',
        description: `Your multi-entity structure could save you ${formatCurrency(results.multiEntitySavings)} annually in taxes.`
      });
    } else {
      recommendations.push({
        title: 'Consider Multi-Entity Structure',
        description: `A multi-entity structure could help you deduct management and administrative expenses, potentially saving thousands in taxes.`
      });
    }
    
    // High impact
    if (results.impact > 50000) {
      recommendations.push({
        title: 'High 280E Impact',
        description: `Your 280E impact is significant at ${formatCurrency(results.impact)}. Consider consulting with a cannabis tax specialist to explore all available strategies.`
      });
    }
    
    // Tax bracket optimization
    if (results.taxBracket > 0.3) {
      recommendations.push({
        title: 'Tax Bracket Optimization',
        description: `At a ${(results.taxBracket * 100).toFixed(0)}% tax bracket, every dollar saved in taxes is valuable. Consider income smoothing strategies.`
      });
    }
    
    // Generate HTML
    const recommendationsHTML = recommendations.map(rec => `
      <div style="margin-bottom: 1.5rem; padding: 1rem; background: var(--cbkny-light-gray); border-radius: 4px;">
        <h4 style="color: var(--cbkny-pink); margin-top: 0;">${rec.title}</h4>
        <p style="margin-bottom: 0;">${rec.description}</p>
      </div>
    `).join('');
    
    document.getElementById('recommendations-list').innerHTML = recommendationsHTML;
  }
  
  function formatCurrency(amount) {
    return new Intl.NumberFormat('en-US', {
      style: 'currency',
      currency: 'USD',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0
    }).format(amount);
  }
});
</script>

<?php get_footer(); ?>
