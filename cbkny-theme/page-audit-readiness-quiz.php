<?php get_header(); ?>
<main class="container">
  <section class="hero">
    <h1>Cannabis Business Audit Readiness Quiz</h1>
    <p>Find out how prepared you are for an IRS or OCM audit</p>
  </section>

  <section style="max-width: 800px; margin: 4rem auto;">
    <div class="card" style="padding: 2rem;">
      
      <div class="quiz-intro">
        <h2>🎯 What This Quiz Will Tell You</h2>
        <p>This comprehensive 10-question quiz evaluates your business's audit readiness across key compliance areas. Get personalized recommendations based on your answers.</p>
        
        <div style="background: var(--cbkny-light-gray); padding: 1.5rem; border-radius: 8px; margin: 2rem 0;">
          <h3>📊 Quiz Covers:</h3>
          <ul>
            <li><strong>Bookkeeping System</strong> - Software and processes</li>
            <li><strong>COGS Tracking</strong> - Cost categorization and documentation</li>
            <li><strong>Bank Reconciliation</strong> - Monthly reconciliation processes</li>
            <li><strong>Documentation</strong> - Receipt and invoice retention</li>
            <li><strong>Tax Filings</strong> - Current status and compliance</li>
            <li><strong>280E Compliance</strong> - Understanding and implementation</li>
            <li><strong>OCM Reporting</strong> - Regulatory compliance</li>
            <li><strong>Inventory System</strong> - Seed-to-sale tracking</li>
            <li><strong>Multi-Entity Structure</strong> - Business organization</li>
            <li><strong>Professional Support</strong> - Accounting expertise</li>
          </ul>
        </div>
      </div>

      <div class="quiz-container">
        <form id="audit-quiz-form">
          
          <!-- Question 1 -->
          <div class="quiz-question" data-question="1">
            <h3>1. Bookkeeping System</h3>
            <p>Do you use professional accounting software (QuickBooks, Xero, etc.)?</p>
            <div class="quiz-options">
              <label><input type="radio" name="q1" value="10"> Yes, fully integrated</label>
              <label><input type="radio" name="q1" value="5"> Planning to implement</label>
              <label><input type="radio" name="q1" value="0"> No, using spreadsheets or manual records</label>
            </div>
          </div>

          <!-- Question 2 -->
          <div class="quiz-question" data-question="2">
            <h3>2. COGS Tracking</h3>
            <p>Do you track Cost of Goods Sold separately from operating expenses?</p>
            <div class="quiz-options">
              <label><input type="radio" name="q2" value="10"> Yes, detailed tracking with proper categorization</label>
              <label><input type="radio" name="q2" value="5"> Somewhat, basic tracking</label>
              <label><input type="radio" name="q2" value="0"> No, all expenses mixed together</label>
            </div>
          </div>

          <!-- Question 3 -->
          <div class="quiz-question" data-question="3">
            <h3>3. Bank Reconciliation</h3>
            <p>How often do you reconcile your bank accounts?</p>
            <div class="quiz-options">
              <label><input type="radio" name="q3" value="10"> Monthly</label>
              <label><input type="radio" name="q3" value="7"> Quarterly</label>
              <label><input type="radio" name="q3" value="3"> Rarely</label>
              <label><input type="radio" name="q3" value="0"> Never</label>
            </div>
          </div>

          <!-- Question 4 -->
          <div class="quiz-question" data-question="4">
            <h3>4. Documentation</h3>
            <p>Do you retain all receipts and invoices for business expenses?</p>
            <div class="quiz-options">
              <label><input type="radio" name="q4" value="10"> All receipts and invoices</label>
              <label><input type="radio" name="q4" value="7"> Most receipts and invoices</label>
              <label><input type="radio" name="q4" value="3"> Some receipts and invoices</label>
              <label><input type="radio" name="q4" value="0"> Few receipts and invoices</label>
            </div>
          </div>

          <!-- Question 5 -->
          <div class="quiz-question" data-question="5">
            <h3>5. Tax Filings</h3>
            <p>Are all your tax returns filed and up to date?</p>
            <div class="quiz-options">
              <label><input type="radio" name="q5" value="10"> Yes, all current</label>
              <label><input type="radio" name="q5" value="7"> Mostly current</label>
              <label><input type="radio" name="q5" value="3"> Behind</label>
              <label><input type="radio" name="q5" value="0"> Very behind</label>
            </div>
          </div>

          <!-- Question 6 -->
          <div class="quiz-question" data-question="6">
            <h3>6. 280E Compliance</h3>
            <p>Do you understand how 280E affects your tax deductions?</p>
            <div class="quiz-options">
              <label><input type="radio" name="q6" value="10"> Very well</label>
              <label><input type="radio" name="q6" value="7"> Somewhat</label>
              <label><input type="radio" name="q6" value="3"> Not really</label>
              <label><input type="radio" name="q6" value="0"> No idea</label>
            </div>
          </div>

          <!-- Question 7 -->
          <div class="quiz-question" data-question="7">
            <h3>7. OCM Reporting</h3>
            <p>Are your OCM reports filed on time and accurately?</p>
            <div class="quiz-options">
              <label><input type="radio" name="q7" value="10"> Always</label>
              <label><input type="radio" name="q7" value="7"> Usually</label>
              <label><input type="radio" name="q7" value="3"> Sometimes</label>
              <label><input type="radio" name="q7" value="0"> Rarely</label>
            </div>
          </div>

          <!-- Question 8 -->
          <div class="quiz-question" data-question="8">
            <h3>8. Inventory System</h3>
            <p>Do you have a seed-to-sale tracking system in place?</p>
            <div class="quiz-options">
              <label><input type="radio" name="q8" value="10"> Yes, integrated with accounting</label>
              <label><input type="radio" name="q8" value="7"> Yes, manual tracking</label>
              <label><input type="radio" name="q8" value="3"> Partial tracking</label>
              <label><input type="radio" name="q8" value="0"> No tracking system</label>
            </div>
          </div>

          <!-- Question 9 -->
          <div class="quiz-question" data-question="9">
            <h3>9. Multi-Entity Structure</h3>
            <p>If you use multiple entities, are the finances properly separated?</p>
            <div class="quiz-options">
              <label><input type="radio" name="q9" value="10"> Yes, fully separated</label>
              <label><input type="radio" name="q9" value="7"> Mostly separated</label>
              <label><input type="radio" name="q9" value="3"> Somewhat separated</label>
              <label><input type="radio" name="q9" value="5"> N/A - Single entity</label>
            </div>
          </div>

          <!-- Question 10 -->
          <div class="quiz-question" data-question="10">
            <h3>10. Professional Support</h3>
            <p>Do you work with a cannabis-specialized accountant?</p>
            <div class="quiz-options">
              <label><input type="radio" name="q10" value="10"> Yes</label>
              <label><input type="radio" name="q10" value="5"> Looking for one</label>
              <label><input type="radio" name="q10" value="2"> Not yet</label>
              <label><input type="radio" name="q10" value="0"> No</label>
            </div>
          </div>

          <div class="quiz-submit" style="text-align: center; margin: 3rem 0;">
            <button type="submit" class="btn btn-primary" style="padding: 1rem 2rem; font-size: 1.1rem;">
              🎯 Get My Audit Readiness Score
            </button>
          </div>

        </form>

        <div id="quiz-results" style="display: none;">
          <div class="results-header" style="text-align: center; margin: 2rem 0;">
            <h2>🎯 Your Audit Readiness Score</h2>
            <div id="score-display" style="font-size: 3rem; font-weight: bold; color: var(--cbkny-pink); margin: 1rem 0;"></div>
            <div id="score-category" style="font-size: 1.5rem; font-weight: bold; margin: 1rem 0;"></div>
          </div>

          <div id="score-interpretation" style="background: var(--cbkny-light-gray); padding: 2rem; border-radius: 8px; margin: 2rem 0;"></div>

          <div id="recommendations" style="background: var(--cbkny-white); border-left: 4px solid var(--cbkny-pink); padding: 2rem; margin: 2rem 0;"></div>

          <div class="results-cta" style="text-align: center; margin: 3rem 0;">
            <h3>🚀 Ready to Improve Your Audit Readiness?</h3>
            <p>Our team of cannabis accounting experts can help you implement these recommendations and ensure full compliance.</p>
            <a href="/contact" class="btn btn-primary" style="display: inline-block; margin-top: 1rem;">
              💬 Schedule Free Consultation
            </a>
          </div>
        </div>
      </div>
      
    </div>
  </section>
</main>

<style>
.quiz-question {
  background: var(--cbkny-white);
  border: 1px solid #ddd;
  border-radius: 8px;
  padding: 2rem;
  margin: 2rem 0;
}

.quiz-question h3 {
  color: var(--cbkny-pink);
  margin-top: 0;
}

.quiz-options {
  display: flex;
  flex-direction: column;
  gap: 1rem;
  margin-top: 1rem;
}

.quiz-options label {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.5rem;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.2s;
}

.quiz-options label:hover {
  background: var(--cbkny-light-gray);
}

.quiz-options input[type="radio"] {
  margin: 0;
}

.quiz-submit {
  background: var(--cbkny-light-gray);
  padding: 2rem;
  border-radius: 8px;
  margin: 2rem 0;
}

.results-header {
  background: var(--cbkny-light-gray);
  padding: 2rem;
  border-radius: 8px;
}

.score-champion { color: #28a745 !important; }
.score-well-prepared { color: #17a2b8 !important; }
.score-needs-improvement { color: #ffc107 !important; }
.score-high-risk { color: #fd7e14 !important; }
.score-urgent { color: #dc3545 !important; }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById('audit-quiz-form');
  const resultsDiv = document.getElementById('quiz-results');
  
  form.addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Calculate score
    let totalScore = 0;
    const questions = form.querySelectorAll('.quiz-question');
    
    questions.forEach(question => {
      const selectedOption = question.querySelector('input[type="radio"]:checked');
      if (selectedOption) {
        totalScore += parseInt(selectedOption.value);
      }
    });
    
    // Display results
    displayResults(totalScore);
    
    // Track quiz completion
    if (typeof gtag !== 'undefined') {
      gtag('event', 'quiz_completion', {
        'event_category': 'engagement',
        'event_label': 'Audit Readiness Quiz',
        'value': totalScore
      });
    }
    
    if (typeof fbq !== 'undefined') {
      fbq('track', 'CompleteRegistration', {
        content_name: 'Audit Readiness Quiz',
        content_category: 'quiz'
      });
    }
  });
  
  function displayResults(score) {
    const scoreDisplay = document.getElementById('score-display');
    const scoreCategory = document.getElementById('score-category');
    const scoreInterpretation = document.getElementById('score-interpretation');
    const recommendations = document.getElementById('recommendations');
    
    // Display score
    scoreDisplay.textContent = score + '/100';
    
    // Determine category and styling
    let category, categoryClass, interpretation, recommendationList;
    
    if (score >= 90) {
      category = '🏆 Audit-Ready Champion';
      categoryClass = 'score-champion';
      interpretation = 'Excellent! Your business is well-prepared for audits. You have strong systems in place and understand compliance requirements.';
      recommendationList = [
        'Maintain your current systems and processes',
        'Continue regular reviews and updates',
        'Consider sharing your best practices with other operators',
        'Stay updated on regulatory changes'
      ];
    } else if (score >= 70) {
      category = '✅ Well-Prepared';
      categoryClass = 'score-well-prepared';
      interpretation = 'Good job! You have solid compliance systems in place. There are a few areas where you can improve to become audit-ready.';
      recommendationList = [
        'Review and strengthen your COGS tracking system',
        'Implement monthly bank reconciliation if not already doing so',
        'Ensure all documentation is properly organized',
        'Consider upgrading your accounting software'
      ];
    } else if (score >= 50) {
      category = '⚠️ Needs Improvement';
      categoryClass = 'score-needs-improvement';
      interpretation = 'Your business has some compliance systems in place, but there are significant gaps that need attention before an audit.';
      recommendationList = [
        'Implement professional accounting software',
        'Establish proper COGS tracking and categorization',
        'Set up monthly bank reconciliation processes',
        'Organize and tax returns and documentation',
        'Consider working with a cannabis-specialized accountant'
      ];
    } else if (score >= 30) {
      category = '🚨 High Risk';
      categoryClass = 'score-high-risk';
      interpretation = 'Your business is at high risk during an audit. Immediate action is needed to establish basic compliance systems.';
      recommendationList = [
        'Urgently implement professional accounting software',
        'Establish proper COGS tracking immediately',
        'Organize all receipts and invoices',
        'File any overdue tax returns',
        'Work with a cannabis-specialized accountant immediately',
        'Consider a cleanup service to reconstruct records'
      ];
    } else {
      category = '🔥 Urgent Action Required';
      categoryClass = 'score-urgent';
      interpretation = 'Your business is extremely vulnerable to audit penalties. Immediate professional help is essential.';
      recommendationList = [
        'Contact a cannabis-specialized accountant immediately',
        'Implement professional accounting software as soon as possible',
        'Begin organizing all business records and receipts',
        'File any overdue tax returns immediately',
        'Consider a comprehensive cleanup service',
        'Establish basic compliance systems before continuing operations'
      ];
    }
    
    // Update display
    scoreCategory.textContent = category;
    scoreCategory.className = categoryClass;
    scoreInterpretation.innerHTML = `<h4>What This Means:</h4><p>${interpretation}</p>`;
    
    // Generate recommendations
    const recommendationHTML = '<h4>🎯 Recommended Actions:</h4><ul>' + 
      recommendationList.map(rec => `<li>${rec}</li>`).join('') + 
      '</ul>';
    recommendations.innerHTML = recommendationHTML;
    
    // Show results
    resultsDiv.style.display = 'block';
    resultsDiv.scrollIntoView({ behavior: 'smooth' });
  }
});
</script>

<?php get_footer(); ?>
