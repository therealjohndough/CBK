<?php get_header(); ?>
<main class="container">
  <section class="hero">
    <h1>Cannabis Business Audit Readiness Assessment</h1>
    <p>Take our comprehensive quiz to evaluate your audit preparedness and get personalized recommendations</p>
  </section>

  <!-- Quiz Container -->
  <div id="quizContainer" class="quiz-container" style="max-width: 800px; margin: 2rem auto; background: white; border-radius: 1rem; box-shadow: 0 4px 6px rgba(0,0,0,0.1); overflow: hidden;">
    
    <!-- Progress Bar -->
    <div class="quiz-progress" style="background: var(--cbkny-light-gray); height: 8px; position: relative;">
      <div id="progressBar" style="background: var(--cbkny-pink); height: 100%; width: 0%; transition: width 0.3s ease;"></div>
    </div>

    <!-- Quiz Content -->
    <div class="quiz-content" style="padding: 2rem;">
      
      <!-- Welcome Screen -->
      <div id="welcomeScreen" class="quiz-screen">
        <div style="text-align: center; margin-bottom: 2rem;">
          <div style="display: flex; align-items: center; justify-content: center; margin: 0 auto 2rem; color: var(--cbkny-pink); font-size: 4rem;">
            <i class="fas fa-search-plus"></i>
          </div>
          <h2 style="color: var(--cbkny-black); margin-bottom: 1rem;">Audit Readiness Assessment</h2>
          <p style="color: var(--cbkny-gray); margin-bottom: 2rem;">This 10-question assessment will help evaluate how prepared your cannabis business is for potential audits.</p>
        </div>

        <div style="background: var(--cbkny-light-gray); padding: 2rem; border-radius: 0.5rem; margin-bottom: 2rem;">
          <h3 style="color: var(--cbkny-black); margin-bottom: 1rem;">What You'll Get:</h3>
          <ul style="list-style: none; padding: 0; margin: 0;">
            <li style="margin-bottom: 0.5rem; display: flex; align-items: center; gap: 0.5rem;">
              <i class="fas fa-check-circle" style="color: var(--cbkny-pink);"></i>
              <span>Comprehensive audit readiness score</span>
            </li>
            <li style="margin-bottom: 0.5rem; display: flex; align-items: center; gap: 0.5rem;">
              <i class="fas fa-check-circle" style="color: var(--cbkny-pink);"></i>
              <span>Priority action items for improvement</span>
            </li>
            <li style="margin-bottom: 0.5rem; display: flex; align-items: center; gap: 0.5rem;">
              <i class="fas fa-check-circle" style="color: var(--cbkny-pink);"></i>
              <span>Personalized recommendations</span>
            </li>
            <li style="margin-bottom: 0.5rem; display: flex; align-items: center; gap: 0.5rem;">
              <i class="fas fa-check-circle" style="color: var(--cbkny-pink);"></i>
              <span>Compliance checklist</span>
            </li>
          </ul>
        </div>

        <div style="text-align: center;">
          <button id="startQuiz" class="btn btn-primary" style="font-size: 1.2rem; padding: 1rem 2rem;">Start Assessment</button>
        </div>
      </div>

      <!-- Question Screens -->
      <div id="questionScreens" class="quiz-screen" style="display: none;">
        <!-- Questions will be dynamically inserted here -->
      </div>

      <!-- Results Screen -->
      <div id="resultsScreen" class="quiz-screen" style="display: none;">
        <div style="text-align: center; margin-bottom: 2rem;">
          <div id="scoreCircle" style="width: 120px; height: 120px; border-radius: 50%; margin: 0 auto 2rem; display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem; font-weight: bold;">
            <!-- Score will be inserted here -->
          </div>
          <h2 id="scoreTitle" style="color: var(--cbkny-black); margin-bottom: 1rem;"></h2>
          <p id="scoreDescription" style="color: var(--cbkny-gray);"></p>
        </div>

        <div id="recommendations" style="margin-bottom: 2rem;">
          <!-- Recommendations will be inserted here -->
        </div>

        <div style="background: var(--cbkny-light-gray); padding: 2rem; border-radius: 0.5rem; margin-bottom: 2rem;">
          <h3 style="color: var(--cbkny-black); margin-bottom: 1rem;">Next Steps</h3>
          <p style="margin-bottom: 1.5rem;">Based on your assessment, we recommend scheduling a free consultation to discuss your specific needs.</p>
          <div style="display: flex; gap: 1rem; flex-wrap: wrap; justify-content: center;">
            <a href="/contact" class="btn btn-primary" style="flex: 1; min-width: 200px; text-align: center;">Schedule Free Consultation</a>
            <a href="/resources" class="btn" style="background: var(--cbkny-gray); color: white; flex: 1; min-width: 200px; text-align: center;">View More Resources</a>
          </div>
        </div>

        <div style="text-align: center;">
          <button id="retakeQuiz" class="btn" style="background: var(--cbkny-light-gray); color: var(--cbkny-black);">Retake Assessment</button>
        </div>
      </div>
    </div>
  </div>
</main>

<script>
// Quiz Data
const quizData = {
  questions: [
    {
      id: 1,
      question: "How often do you reconcile your bank accounts?",
      options: [
        { text: "Daily", value: 4, category: "recordkeeping" },
        { text: "Weekly", value: 3, category: "recordkeeping" },
        { text: "Monthly", value: 2, category: "recordkeeping" },
        { text: "Quarterly or less", value: 1, category: "recordkeeping" },
        { text: "I don't reconcile regularly", value: 0, category: "recordkeeping" }
      ]
    },
    {
      id: 2,
      question: "How do you track your inventory?",
      options: [
        { text: "Automated system with real-time tracking", value: 4, category: "inventory" },
        { text: "Manual tracking with regular counts", value: 3, category: "inventory" },
        { text: "Basic spreadsheet tracking", value: 2, category: "inventory" },
        { text: "Manual tracking, irregular counts", value: 1, category: "inventory" },
        { text: "No formal inventory tracking", value: 0, category: "inventory" }
      ]
    },
    {
      id: 3,
      question: "How do you categorize expenses for 280E compliance?",
      options: [
        { text: "Automated system with 280E-specific categories", value: 4, category: "tax_compliance" },
        { text: "Manual categorization with clear guidelines", value: 3, category: "tax_compliance" },
        { text: "Basic expense categorization", value: 2, category: "tax_compliance" },
        { text: "Inconsistent categorization", value: 1, category: "tax_compliance" },
        { text: "No specific 280E categorization", value: 0, category: "tax_compliance" }
      ]
    },
    {
      id: 4,
      question: "How do you handle sales tax compliance?",
      options: [
        { text: "Automated system with real-time calculations", value: 4, category: "tax_compliance" },
        { text: "Manual calculations with regular reviews", value: 3, category: "tax_compliance" },
        { text: "Basic calculations, periodic reviews", value: 2, category: "tax_compliance" },
        { text: "Inconsistent calculations", value: 1, category: "tax_compliance" },
        { text: "No formal sales tax tracking", value: 0, category: "tax_compliance" }
      ]
    },
    {
      id: 5,
      question: "How do you maintain supporting documentation?",
      options: [
        { text: "Digital system with automatic backup", value: 4, category: "documentation" },
        { text: "Digital files with manual organization", value: 3, category: "documentation" },
        { text: "Mix of digital and physical files", value: 2, category: "documentation" },
        { text: "Mostly physical files", value: 1, category: "documentation" },
        { text: "Minimal documentation", value: 0, category: "documentation" }
      ]
    },
    {
      id: 6,
      question: "How often do you review your financial statements?",
      options: [
        { text: "Monthly with detailed analysis", value: 4, category: "financial_review" },
        { text: "Monthly with basic review", value: 3, category: "financial_review" },
        { text: "Quarterly review", value: 2, category: "financial_review" },
        { text: "Annual review", value: 1, category: "financial_review" },
        { text: "Rarely or never", value: 0, category: "financial_review" }
      ]
    },
    {
      id: 7,
      question: "How do you handle OCM reporting requirements?",
      options: [
        { text: "Automated system with compliance monitoring", value: 4, category: "ocm_compliance" },
        { text: "Manual tracking with regular submissions", value: 3, category: "ocm_compliance" },
        { text: "Basic tracking, occasional submissions", value: 2, category: "ocm_compliance" },
        { text: "Inconsistent tracking", value: 1, category: "ocm_compliance" },
        { text: "No formal OCM tracking", value: 0, category: "ocm_compliance" }
      ]
    },
    {
      id: 8,
      question: "How do you separate business and personal expenses?",
      options: [
        { text: "Completely separate accounts and tracking", value: 4, category: "expense_separation" },
        { text: "Separate accounts with occasional mixing", value: 3, category: "expense_separation" },
        { text: "Mostly separate with some mixing", value: 2, category: "expense_separation" },
        { text: "Some separation but frequent mixing", value: 1, category: "expense_separation" },
        { text: "No separation between business and personal", value: 0, category: "expense_separation" }
      ]
    },
    {
      id: 9,
      question: "How do you handle cash transactions?",
      options: [
        { text: "Full documentation with receipts and tracking", value: 4, category: "cash_handling" },
        { text: "Good documentation with most transactions", value: 3, category: "cash_handling" },
        { text: "Basic documentation", value: 2, category: "cash_handling" },
        { text: "Limited documentation", value: 1, category: "cash_handling" },
        { text: "Minimal cash documentation", value: 0, category: "cash_handling" }
      ]
    },
    {
      id: 10,
      question: "How prepared are you for an audit?",
      options: [
        { text: "Very prepared with all documentation ready", value: 4, category: "audit_preparation" },
        { text: "Mostly prepared with minor gaps", value: 3, category: "audit_preparation" },
        { text: "Somewhat prepared with some gaps", value: 2, category: "audit_preparation" },
        { text: "Not very prepared", value: 1, category: "audit_preparation" },
        { text: "Not prepared at all", value: 0, category: "audit_preparation" }
      ]
    }
  ]
};

// Quiz State
let currentQuestion = 0;
let answers = {};
let categoryScores = {};

// Initialize Quiz
document.addEventListener('DOMContentLoaded', function() {
  const startBtn = document.getElementById('startQuiz');
  const retakeBtn = document.getElementById('retakeQuiz');
  
  startBtn.addEventListener('click', startQuiz);
  retakeBtn.addEventListener('click', retakeQuiz);
});

function startQuiz() {
  document.getElementById('welcomeScreen').style.display = 'none';
  document.getElementById('questionScreens').style.display = 'block';
  showQuestion(0);
}

function showQuestion(index) {
  const question = quizData.questions[index];
  const questionScreens = document.getElementById('questionScreens');
  
  questionScreens.innerHTML = `
    <div class="question-container">
      <div style="margin-bottom: 2rem;">
        <div style="display: flex; justify-content: between; align-items: center; margin-bottom: 1rem;">
          <span style="color: var(--cbkny-pink); font-weight: bold;">Question ${index + 1} of ${quizData.questions.length}</span>
        </div>
        <h3 style="color: var(--cbkny-black); margin-bottom: 2rem; line-height: 1.4;">${question.question}</h3>
      </div>
      
      <div class="options-container" style="display: flex; flex-direction: column; gap: 1rem;">
        ${question.options.map((option, i) => `
          <button class="option-btn" data-value="${option.value}" data-category="${option.category}" 
                  style="padding: 1rem; border: 2px solid var(--cbkny-light-gray); border-radius: 0.5rem; 
                         background: white; text-align: left; cursor: pointer; transition: all 0.3s ease;"
                  onmouseover="this.style.borderColor='var(--cbkny-pink)'" 
                  onmouseout="this.style.borderColor='var(--cbkny-light-gray)'">
            ${option.text}
          </button>
        `).join('')}
      </div>
      
      <div style="margin-top: 2rem; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
        <button id="prevBtn" ${index === 0 ? 'disabled' : ''} 
                style="padding: 0.75rem 1.5rem; border: 2px solid var(--cbkny-gray); background: white; color: var(--cbkny-gray); border-radius: 0.5rem; cursor: pointer; flex-shrink: 0;"
                ${index === 0 ? 'disabled' : ''}>
          Previous
        </button>
        <span style="color: var(--cbkny-gray); font-size: 0.9rem; flex-grow: 1; text-align: center;">
          ${index + 1} of ${quizData.questions.length}
        </span>
      </div>
    </div>
  `;
  
  // Add event listeners
  const optionBtns = questionScreens.querySelectorAll('.option-btn');
  const prevBtn = document.getElementById('prevBtn');
  
  optionBtns.forEach(btn => {
    btn.addEventListener('click', function() {
      selectOption(this.dataset.value, this.dataset.category, index);
    });
  });
  
  if (prevBtn && index > 0) {
    prevBtn.addEventListener('click', () => showQuestion(index - 1));
  }
  
  // Update progress bar
  updateProgressBar((index + 1) / quizData.questions.length * 100);
}

function selectOption(value, category, questionIndex) {
  answers[questionIndex] = { value: parseInt(value), category };
  
  // Highlight selected option
  const optionBtns = document.querySelectorAll('.option-btn');
  optionBtns.forEach(btn => {
    btn.style.borderColor = 'var(--cbkny-light-gray)';
    btn.style.backgroundColor = 'white';
  });
  event.target.style.borderColor = 'var(--cbkny-pink)';
  event.target.style.backgroundColor = 'var(--cbkny-light-gray)';
  
  // Move to next question after a short delay
  setTimeout(() => {
    if (questionIndex < quizData.questions.length - 1) {
      showQuestion(questionIndex + 1);
    } else {
      showResults();
    }
  }, 500);
}

function updateProgressBar(percentage) {
  document.getElementById('progressBar').style.width = percentage + '%';
}

function calculateScores() {
  categoryScores = {};
  
  Object.values(answers).forEach(answer => {
    const category = answer.category;
    if (!categoryScores[category]) {
      categoryScores[category] = { total: 0, count: 0 };
    }
    categoryScores[category].total += answer.value;
    categoryScores[category].count += 1;
  });
  
  // Calculate average scores
  Object.keys(categoryScores).forEach(category => {
    categoryScores[category].average = categoryScores[category].total / categoryScores[category].count;
  });
  
  // Calculate overall score
  const totalScore = Object.values(answers).reduce((sum, answer) => sum + answer.value, 0);
  const maxScore = quizData.questions.length * 4;
  const overallScore = Math.round((totalScore / maxScore) * 100);
  
  return { overallScore, categoryScores };
}

function showResults() {
  const { overallScore, categoryScores } = calculateScores();
  
  document.getElementById('questionScreens').style.display = 'none';
  document.getElementById('resultsScreen').style.display = 'block';
  
  // Update score display
  const scoreCircle = document.getElementById('scoreCircle');
  const scoreTitle = document.getElementById('scoreTitle');
  const scoreDescription = document.getElementById('scoreDescription');
  
  scoreCircle.innerHTML = overallScore + '%';
  scoreCircle.style.background = getScoreColor(overallScore);
  
  if (overallScore >= 80) {
    scoreTitle.textContent = 'Excellent!';
    scoreDescription.textContent = 'Your cannabis business is well-prepared for audits. You have strong systems in place.';
  } else if (overallScore >= 60) {
    scoreTitle.textContent = 'Good Progress';
    scoreDescription.textContent = 'Your business has a solid foundation but there are areas for improvement.';
  } else if (overallScore >= 40) {
    scoreTitle.textContent = 'Needs Improvement';
    scoreDescription.textContent = 'There are significant gaps in your audit preparedness that should be addressed.';
  } else {
    scoreTitle.textContent = 'High Risk';
    scoreDescription.textContent = 'Your business is at high risk during an audit. Immediate action is recommended.';
  }
  
  // Generate recommendations
  generateRecommendations(categoryScores);
  
  // Update progress bar
  updateProgressBar(100);
}

function getScoreColor(score) {
  if (score >= 80) return '#28a745';
  if (score >= 60) return '#ffc107';
  if (score >= 40) return '#fd7e14';
  return '#dc3545';
}

function generateRecommendations(categoryScores) {
  const recommendations = document.getElementById('recommendations');
  const categoryNames = {
    recordkeeping: 'Record Keeping',
    inventory: 'Inventory Management',
    tax_compliance: 'Tax Compliance',
    documentation: 'Documentation',
    financial_review: 'Financial Review',
    ocm_compliance: 'OCM Compliance',
    expense_separation: 'Expense Separation',
    cash_handling: 'Cash Handling',
    audit_preparation: 'Audit Preparation'
  };
  
  let recommendationsHTML = '<h3 style="color: var(--cbkny-black); margin-bottom: 1rem;">Priority Recommendations</h3>';
  
  // Sort categories by score (lowest first)
  const sortedCategories = Object.entries(categoryScores)
    .sort(([,a], [,b]) => a.average - b.average)
    .slice(0, 3); // Top 3 priorities
  
  sortedCategories.forEach(([category, score]) => {
    if (score.average < 3) {
      recommendationsHTML += `
        <div style="background: var(--cbkny-light-gray); padding: 1.5rem; border-radius: 0.5rem; margin-bottom: 1rem; border-left: 4px solid var(--cbkny-pink);">
          <h4 style="color: var(--cbkny-black); margin-bottom: 0.5rem;">${categoryNames[category]}</h4>
          <p style="color: var(--cbkny-gray); margin: 0;">${getCategoryRecommendation(category, score.average)}</p>
        </div>
      `;
    }
  });
  
  recommendations.innerHTML = recommendationsHTML;
}

function getCategoryRecommendation(category, score) {
  const recommendations = {
    recordkeeping: 'Implement daily bank reconciliation and automated record keeping systems.',
    inventory: 'Set up automated inventory tracking with regular physical counts and COGS calculations.',
    tax_compliance: 'Establish clear 280E expense categorization and automated sales tax calculations.',
    documentation: 'Implement digital document management with automatic backup and organization.',
    financial_review: 'Schedule monthly financial statement reviews with detailed variance analysis.',
    ocm_compliance: 'Set up automated OCM reporting systems with compliance monitoring.',
    expense_separation: 'Completely separate business and personal accounts with clear expense policies.',
    cash_handling: 'Implement comprehensive cash transaction documentation and tracking systems.',
    audit_preparation: 'Develop audit preparation procedures and maintain current documentation.'
  };
  
  return recommendations[category] || 'Focus on improving this area of your business operations.';
}

function retakeQuiz() {
  currentQuestion = 0;
  answers = {};
  categoryScores = {};
  
  document.getElementById('resultsScreen').style.display = 'none';
  document.getElementById('welcomeScreen').style.display = 'block';
  updateProgressBar(0);
}
</script>

<?php get_footer(); ?>