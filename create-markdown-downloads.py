#!/usr/bin/env python3
"""
Create Markdown Customer Downloads for CBK
Markdown files print beautifully and are easy to maintain
"""

import os
from pathlib import Path

def create_cbk_header():
    """Create CBK branded header for all documents"""
    return """# 🌿 CANNA BOOKKEEPER NY
**Expert Cannabis Accounting Services**

📧 contact@cbkny.com | 🌐 www.cbkny.com | 📞 Schedule Free Consultation

---

"""

def create_cbk_footer():
    """Create CBK branded footer for all documents"""
    return """

---

## 🎯 Need Professional Help?

**Let Canna Bookkeeper NY handle your cannabis accounting needs with expertise in:**
- 280E compliance and tax optimization
- OCM reporting and regulatory compliance  
- Audit preparation and defense
- Cannabis-specific bookkeeping and CFO services

### Get Started Today
- 📧 **Email:** contact@cbkny.com
- 🌐 **Website:** www.cbkny.com/services
- 📞 **Free Consultation:** Schedule online at cbkny.com/contact

---

*© 2025 Canna Bookkeeper NY | This guide is for informational purposes only. Consult with qualified professionals for specific advice.*"""

def create_280e_guide_markdown():
    """Create the 280E Deduction Guide in Markdown"""
    header = create_cbk_header()
    footer = create_cbk_footer()
    
    content = f"""{header}# 280E Deduction Guide for Cannabis Businesses

**Master 280E compliance with our comprehensive guide covering deductions, record-keeping, and audit preparation**

*📖 Reading time: 12 minutes | ✍️ By: Cannabis Tax Experts | 📅 Updated: October 2025*

---

## Table of Contents

1. [Understanding Section 280E](#understanding-section-280e)
2. [What You CAN Deduct](#what-you-can-deduct)
3. [What You CANNOT Deduct](#what-you-cannot-deduct)
4. [Compliance Strategies](#compliance-strategies)
5. [Common 280E Mistakes](#common-280e-mistakes)
6. [Audit Preparation](#audit-preparation)
7. [Getting Professional Help](#getting-professional-help)

---

## Understanding Section 280E

Section 280E of the Internal Revenue Code prohibits businesses engaged in trafficking controlled substances from deducting most business expenses. This federal law significantly impacts cannabis businesses, even in states where cannabis is legal.

### 🎯 Key Impact of 280E

- ✅ Cannabis businesses can only deduct **Cost of Goods Sold (COGS)**
- ❌ Most traditional business deductions are **prohibited**
- 📊 Effective tax rates can reach **70% or higher**
- 🛡️ Proper planning and compliance are **essential**

### Why 280E Exists

Originally enacted in 1982 to prevent drug dealers from claiming business deductions, 280E now applies to all businesses trafficking in controlled substances - including state-legal cannabis operations.

---

## What You CAN Deduct

### 💰 Cost of Goods Sold (COGS)

#### Direct Materials
- Seeds, clones, and starting materials
- Nutrients, fertilizers, and growing media
- Packaging materials and containers
- Testing and lab fees for products

#### Direct Labor
- Cultivation and growing labor
- Trimming and processing labor
- Packaging and labeling labor
- Quality control and testing labor

#### Direct Overhead
- Facility costs (rent, utilities for production areas)
- Equipment depreciation (directly used in production)
- Insurance on production facilities
- Security costs for production areas

#### Transportation
- Costs to move inventory between licensed facilities
- Delivery costs for finished products
- Transportation to testing labs

### 📋 Limited Administrative Expenses

> **Note:** These deductions are very limited and require careful documentation

- Accounting and bookkeeping services (compliance-related)
- Legal services (compliance and regulatory only)
- Tax preparation and planning
- Certain professional services (directly related to business operations)

### 💡 Pro Tip: Maximize COGS
*The key to 280E compliance is maximizing your COGS deductions by properly categorizing all direct costs of production. This includes facilities costs, utilities, and labor directly related to cultivation and processing.*

---

## What You CANNOT Deduct

### ⚠️ Non-Deductible Expenses Under 280E

❌ **Marketing and Advertising**
- Website development and maintenance
- Social media marketing
- Print and digital advertising
- Trade show participation
- Brand development costs

❌ **General Administrative Expenses**
- Office rent and utilities (non-production)
- Office supplies and equipment
- Administrative salaries (non-production)
- General business insurance
- Professional development and training

❌ **Travel and Entertainment**
- Business travel expenses
- Meals and entertainment
- Conference and seminar fees
- Vehicle expenses (non-delivery)

❌ **Professional Services**
- Consulting fees (non-compliance)
- Business development services
- Marketing consultants
- General legal fees (non-compliance)

❌ **Other Common Expenses**
- Interest on business loans
- Bank fees and financial charges
- General business licenses and permits
- Most professional memberships

---

## Compliance Strategies

### 1. 🏢 Separate Business Entities

Consider operating separate entities for different business activities:

**Plant-Touching Entity** (Subject to 280E)
- Handles cultivation, processing, manufacturing
- Can only deduct COGS
- Bears the 280E tax burden

**Management Company** (Not Subject to 280E)
- Handles administration, marketing, consulting
- Can deduct normal business expenses
- Charges management fees to plant-touching entity

**Real Estate Entity**
- Owns facilities and equipment
- Charges rent to operating entities
- Not subject to 280E restrictions

### 2. 📊 Maximize COGS

#### ✅ COGS Optimization Checklist

- [ ] Include all direct materials in COGS calculation
- [ ] Track direct labor hours and costs accurately
- [ ] Allocate facility costs to production activities
- [ ] Include equipment depreciation in COGS
- [ ] Document all COGS calculations thoroughly
- [ ] Use proper inventory accounting methods
- [ ] Include transportation and testing costs
- [ ] Allocate utilities to production areas

#### COGS Calculation Methods

**Specific Identification**
- Track individual product costs
- Best for small batches or unique products

**FIFO (First In, First Out)**
- Assume oldest inventory is sold first
- Good for products with expiration dates

**LIFO (Last In, First Out)**
- Assume newest inventory is sold first
- Can provide tax advantages in inflationary periods

**Weighted Average**
- Calculate average cost per unit
- Simplest method for similar products

### 3. 📝 Maintain Detailed Records

280E compliance requires meticulous documentation:

#### Essential Documentation
- Detailed expense receipts and invoices
- Time tracking for all employees (production vs. admin)
- Inventory movement and tracking records
- COGS calculation worksheets and methods
- Bank statements and cash transaction logs
- Vendor contracts and service agreements
- Facility usage logs (production vs. administrative space)

---

## Common 280E Mistakes

### 🚫 Mistake #1: Mixed Expense Categories
**Problem:** Mixing deductible and non-deductible expenses in accounting records
**Solution:** Use separate chart of accounts categories for COGS vs. non-deductible expenses

### 🚫 Mistake #2: Inadequate COGS Documentation
**Problem:** Insufficient documentation for COGS calculations and allocations
**Solution:** Maintain detailed records of all direct costs and allocation methods

### 🚫 Mistake #3: Missing COGS Opportunities
**Problem:** Failing to maximize legitimate COGS deductions
**Solution:** Work with cannabis accounting experts to identify all allowable COGS items

### 🚫 Mistake #4: Improper Entity Structure
**Problem:** Operating everything under one entity subject to 280E
**Solution:** Consider multiple entities to separate taxable and non-taxable activities

### 🚫 Mistake #5: Poor Record Keeping
**Problem:** Inadequate documentation for audit defense
**Solution:** Implement systematic record-keeping processes and regular reviews

---

## Audit Preparation

Cannabis businesses face **higher audit risk** due to 280E compliance issues and cash transactions. Proper preparation is essential.

### 🎯 Audit-Ready Documentation Checklist

#### Financial Records
- [ ] Complete books and records for all tax years
- [ ] Monthly financial statements and reconciliations
- [ ] General ledger detail for all accounts
- [ ] Trial balances and year-end adjustments

#### Supporting Documentation
- [ ] All business bank statements and cash logs
- [ ] Expense receipts, invoices, and contracts
- [ ] Employee records, time sheets, and payroll details
- [ ] Inventory tracking records and counts
- [ ] Vendor agreements and service contracts

#### 280E Specific Documentation
- [ ] COGS calculation worksheets and methods
- [ ] Direct vs. indirect expense allocations
- [ ] Facility usage logs and space allocations
- [ ] Production vs. administrative activity records
- [ ] Entity structure documents and agreements

### Audit Defense Strategy

1. **Organize Records Chronologically**
   - Create clear filing systems
   - Maintain digital backups
   - Ensure easy retrieval

2. **Prepare Written Policies**
   - Document COGS calculation methods
   - Create expense categorization guidelines
   - Establish inventory tracking procedures

3. **Professional Representation**
   - Retain experienced cannabis tax attorneys
   - Work with specialized cannabis CPAs
   - Never face an audit alone

---

## Tax Planning Strategies

### Quarterly Planning
- Calculate and pay estimated taxes
- Review COGS calculations and adjustments
- Update tax planning strategies
- Monitor cash flow for tax payments

### Annual Planning
- Conduct year-end inventory optimization
- Review entity structure effectiveness
- Plan for following year's compliance
- Consider equipment purchases for depreciation

### Multi-Year Planning
- Evaluate entity structure changes
- Plan for business expansion or exit
- Consider succession planning implications
- Optimize overall tax strategy

---

## State-Specific Considerations

### New York Cannabis Taxes
- State excise tax on cannabis products
- Local municipal taxes may apply
- Sales tax on retail transactions
- Payroll taxes on all employees

### OCM Reporting Requirements
- Monthly sales and inventory reports
- Annual compliance certifications
- Financial statement requirements
- Integration with 280E compliance

---

## Resources and Tools

### Recommended Software
- Cannabis-specific accounting software (COVA, Treez, etc.)
- Inventory tracking systems (Metrc integration)
- Time tracking tools for labor allocation
- Document management systems

### Professional Associations
- Cannabis Trade Federation
- National Cannabis Industry Association
- State cannabis business associations
- Cannabis accounting professional groups

### Continuing Education
- 280E compliance seminars
- Cannabis tax law updates
- Industry best practices training
- Professional certification programs

{footer}"""
    
    return content

def create_compliance_checklist_markdown():
    """Create the NY Cannabis Compliance Checklist in Markdown"""
    header = create_cbk_header()
    footer = create_cbk_footer()
    
    content = f"""{header}# NY Cannabis Tax Compliance Checklist

**Your complete guide to staying compliant with New York cannabis tax requirements, 280E regulations, and OCM reporting deadlines**

*📖 Reading time: 15 minutes | ✍️ By: NY Cannabis Compliance Experts | 📅 Updated: October 2025*

---

## Table of Contents

1. [Monthly Requirements](#monthly-requirements)
2. [Quarterly Deadlines](#quarterly-deadlines)
3. [Annual Requirements](#annual-requirements)
4. [280E Federal Compliance](#280e-federal-compliance)
5. [OCM Reporting Requirements](#ocm-reporting-requirements)
6. [Audit Preparation](#audit-preparation)
7. [Penalty Avoidance](#penalty-avoidance)
8. [Best Practices](#best-practices)

---

## Monthly Requirements

### 📅 OCM Monthly Reporting (Due 15th of Each Month)

#### ✅ Sales Data Checklist
- [ ] **Total Revenue** - All sales revenue for the month
- [ ] **Units Sold** - Quantity of each product type sold
- [ ] **Average Pricing** - Price per unit by product category
- [ ] **Customer Count** - Number of unique customers served
- [ ] **Return/Exchange Data** - Any product returns or exchanges

#### ✅ Inventory Tracking Checklist
- [ ] **Beginning Inventory** - Starting inventory value and quantities
- [ ] **Purchases/Receipts** - All inventory received during month
- [ ] **Production** - Any products manufactured or processed
- [ ] **Sales/Dispositions** - All inventory sold or disposed
- [ ] **Ending Inventory** - Final inventory count and valuation
- [ ] **Waste/Loss** - Any inventory waste or loss documentation

#### ✅ Employee Data Checklist
- [ ] **Total Hours Worked** - All employee hours for the month
- [ ] **Payroll Summary** - Total wages and benefits paid
- [ ] **Employee Count** - Number of active employees
- [ ] **Training Records** - Any compliance training completed
- [ ] **Background Check Updates** - New hire verifications

#### ✅ Security & Compliance Metrics
- [ ] **Security Incidents** - Any security breaches or issues
- [ ] **Compliance Violations** - Any regulatory violations or corrections
- [ ] **Surveillance System Status** - Camera and monitoring system reports
- [ ] **Access Control Logs** - Employee and visitor access records
- [ ] **Transportation Logs** - All product transportation records

#### ✅ Financial Summary
- [ ] **Gross Revenue** - Total sales before taxes
- [ ] **Net Revenue** - Revenue after returns and discounts
- [ ] **Operating Expenses** - Monthly operating costs
- [ ] **Tax Payments** - All taxes paid during the month
- [ ] **Bank Reconciliations** - All account reconciliations complete

### 📋 Monthly Bookkeeping Tasks

#### Week 1 Tasks
- [ ] Close previous month's books
- [ ] Reconcile all bank accounts
- [ ] Review and categorize all expenses
- [ ] Update inventory valuations
- [ ] Process payroll and related taxes

#### Week 2 Tasks
- [ ] Complete OCM monthly report
- [ ] Review financial statements
- [ ] Analyze key performance indicators
- [ ] Update cash flow projections
- [ ] Review compliance checklist

#### Week 3 Tasks
- [ ] Prepare estimated tax calculations
- [ ] Review and update budgets
- [ ] Analyze variance reports
- [ ] Plan for upcoming quarter
- [ ] Update financial forecasts

#### Week 4 Tasks
- [ ] Finalize month-end adjustments
- [ ] Prepare for next month's reporting
- [ ] Review and update procedures
- [ ] Plan staff training needs
- [ ] Conduct compliance review

---

## Quarterly Deadlines

### Q1 Deadlines (January - March)

#### 📅 April 15 - Federal & State Estimated Taxes
- [ ] **Federal Estimated Tax Payment** (Form 1120ES)
- [ ] **NY State Estimated Tax Payment** (CT-400)
- [ ] **Quarterly Payroll Reports** (Form 941)
- [ ] **SUTA Quarterly Report** (NY State unemployment)

#### 📅 April 30 - OCM Quarterly Report
- [ ] **Comprehensive Financial Summary**
- [ ] **Compliance Certification**
- [ ] **Security and Safety Report**
- [ ] **Employee Training Documentation**

### Q2 Deadlines (April - June)

#### 📅 June 15 - Federal & State Estimated Taxes
- [ ] **Federal Estimated Tax Payment**
- [ ] **NY State Estimated Tax Payment**
- [ ] **Quarterly Payroll Reports**
- [ ] **Sales Tax Returns** (if quarterly filer)

#### 📅 July 31 - OCM Quarterly Report
- [ ] **Q2 Financial Statements**
- [ ] **Inventory Reconciliation Report**
- [ ] **Compliance Updates**
- [ ] **Market Analysis Report**

### Q3 Deadlines (July - September)

#### 📅 September 15 - Federal & State Estimated Taxes
- [ ] **Federal Estimated Tax Payment**
- [ ] **NY State Estimated Tax Payment**
- [ ] **Quarterly Payroll Reports**
- [ ] **Mid-Year Financial Review**

#### 📅 October 31 - OCM Quarterly Report
- [ ] **Q3 Financial Statements**
- [ ] **Year-to-Date Performance Review**
- [ ] **Compliance Assessment**
- [ ] **Planning for Year-End**

### Q4 Deadlines (October - December)

#### 📅 January 15 - Federal & State Estimated Taxes
- [ ] **Federal Estimated Tax Payment**
- [ ] **NY State Estimated Tax Payment**
- [ ] **Year-End Payroll Reports**
- [ ] **Annual Payroll Tax Forms**

#### 📅 January 31 - OCM Quarterly Report
- [ ] **Q4 and Annual Financial Summary**
- [ ] **Year-End Compliance Report**
- [ ] **Annual Business Review**
- [ ] **Next Year Planning Document**

---

## Annual Requirements

### 📊 Year-End Tax Filings

#### Federal Tax Returns
- [ ] **Form 1120** (C-Corporation) - Due March 15
- [ ] **Form 1120S** (S-Corporation) - Due March 15
- [ ] **Schedule M-3** (if applicable) - Book/tax differences
- [ ] **Form 8916-A** (Supplemental attachment for 280E)

#### New York State Tax Returns
- [ ] **Form CT-3** (C-Corporation) - Due March 15
- [ ] **Form CT-3-S** (S-Corporation) - Due March 15
- [ ] **Form CT-3-A** (Alternative minimum tax)
- [ ] **Form DTF-17** (Combined reporting)

#### Payroll Tax Returns
- [ ] **Form W-2** - Employee wage statements (Due January 31)
- [ ] **Form W-3** - Transmittal of wage statements
- [ ] **Form 1099-NEC** - Independent contractor payments
- [ ] **Form 940** - Federal unemployment tax
- [ ] **NYS-45** - Annual reconciliation of income tax withheld

#### Sales Tax Returns
- [ ] **Form ST-101** - Annual sales tax return
- [ ] **Monthly/Quarterly Returns** - All periods filed
- [ ] **Use Tax Returns** - Any use tax obligations
- [ ] **Exemption Certificate Updates** - Annual review

### 🏛️ OCM Annual Reporting

#### Financial Documentation
- [ ] **Audited Financial Statements** (if required by license type)
- [ ] **Annual Revenue Report** - Complete breakdown
- [ ] **Tax Compliance Certification** - All taxes current
- [ ] **Banking Relationship Documentation** - Account status

#### Compliance Certification
- [ ] **Annual Compliance Attestation** - Signed by responsible party
- [ ] **Security System Certification** - Annual security audit
- [ ] **Employee Training Completion** - All required training documented
- [ ] **Standard Operating Procedures** - Updated SOPs

#### License Renewal
- [ ] **License Renewal Application** - Submit before expiration
- [ ] **Background Check Updates** - Key personnel verification
- [ ] **Financial Capacity Documentation** - Proof of financial stability
- [ ] **Insurance Coverage Verification** - Current policy documentation

#### Business Plan Updates
- [ ] **Strategic Business Plan** - Updated 3-year plan
- [ ] **Financial Projections** - Revenue and expense forecasts
- [ ] **Market Analysis** - Current market position
- [ ] **Expansion Plans** - Any growth or change plans

---

## 280E Federal Compliance

### 📋 Monthly 280E Tasks

#### Expense Categorization
- [ ] **COGS Expenses** - Properly categorize all direct costs
- [ ] **Non-Deductible Expenses** - Separate general business expenses
- [ ] **Mixed-Use Expenses** - Allocate shared costs appropriately
- [ ] **Documentation** - Maintain supporting documentation

#### Record Keeping
- [ ] **Time Tracking** - Production vs. administrative time
- [ ] **Space Allocation** - Production vs. office space usage
- [ ] **Inventory Records** - Detailed inventory tracking
- [ ] **Vendor Documentation** - All vendor agreements and invoices

### 🎯 COGS Optimization Strategies

#### Direct Materials
- [ ] **Raw Materials** - Seeds, nutrients, growing supplies
- [ ] **Packaging Materials** - All product packaging costs
- [ ] **Testing Costs** - Lab testing and compliance testing
- [ ] **Processing Materials** - Extraction and processing supplies

#### Direct Labor
- [ ] **Cultivation Labor** - Growing and maintenance time
- [ ] **Processing Labor** - Extraction and manufacturing time
- [ ] **Packaging Labor** - Final packaging and labeling time
- [ ] **Quality Control** - Testing and quality assurance time

#### Manufacturing Overhead
- [ ] **Facility Costs** - Production area rent and utilities
- [ ] **Equipment Depreciation** - Production equipment only
- [ ] **Production Insurance** - Insurance on production facilities
- [ ] **Production Security** - Security costs for production areas

### 📊 Documentation Requirements

#### COGS Calculations
- [ ] **Method Documentation** - Clearly documented calculation method
- [ ] **Allocation Basis** - Reasonable basis for cost allocations  
- [ ] **Supporting Records** - All supporting documentation organized
- [ ] **Regular Updates** - Monthly review and updates

#### Expense Support
- [ ] **Original Receipts** - All expense receipts and invoices
- [ ] **Canceled Checks** - Payment documentation
- [ ] **Contracts** - All vendor and service agreements
- [ ] **Time Records** - Employee time tracking records

---

## OCM Reporting Requirements

### 📈 Monthly OCM Reports

#### Sales Reporting
- [ ] **Gross Sales** - Total sales before taxes and discounts
- [ ] **Net Sales** - Sales after returns and discounts
- [ ] **Tax Collections** - All taxes collected from customers
- [ ] **Product Mix** - Sales breakdown by product category

#### Inventory Reporting
- [ ] **Beginning Inventory** - Starting inventory by product type
- [ ] **Purchases** - All inventory purchased during month
- [ ] **Production** - Any products manufactured
- [ ] **Sales** - All inventory sold during month
- [ ] **Ending Inventory** - Final inventory by product type
- [ ] **Adjustments** - Any inventory adjustments or write-offs

#### Operational Reporting
- [ ] **Employee Hours** - Total hours worked by all employees
- [ ] **Customer Count** - Number of customers served
- [ ] **Transaction Count** - Total number of transactions  
- [ ] **Average Transaction** - Average transaction value

### 🏛️ Quarterly OCM Reports

#### Financial Performance
- [ ] **Revenue Analysis** - Quarterly revenue trends
- [ ] **Expense Analysis** - Operating expense breakdown
- [ ] **Profitability** - Gross and net margin analysis
- [ ] **Cash Flow** - Quarterly cash flow statement

#### Compliance Metrics
- [ ] **Regulatory Compliance** - Any violations or corrective actions
- [ ] **Security Incidents** - Security breaches or issues
- [ ] **Training Completion** - Employee training records
- [ ] **Quality Control** - Product quality metrics

---

## Audit Preparation

### 🎯 Essential Audit Documentation

#### Financial Records (7 Years)
- [ ] **General Ledger** - Complete accounting records
- [ ] **Bank Statements** - All business bank accounts
- [ ] **Financial Statements** - Monthly and annual statements
- [ ] **Tax Returns** - All filed returns and supporting schedules

#### Supporting Documentation (7 Years)
- [ ] **Receipts and Invoices** - All expense documentation
- [ ] **Contracts** - Vendor, employee, and service agreements
- [ ] **Payroll Records** - Employee wages and tax withholdings
- [ ] **Inventory Records** - Detailed inventory tracking

#### 280E Specific Documentation
- [ ] **COGS Calculations** - Detailed worksheets and methods
- [ ] **Expense Allocations** - Direct vs. indirect cost allocations
- [ ] **Time Records** - Production vs. administrative time tracking
- [ ] **Space Utilization** - Production vs. office space allocation

#### OCM Compliance Documentation
- [ ] **Monthly Reports** - All submitted OCM reports
- [ ] **Inventory Tracking** - Complete inventory chain of custody
- [ ] **Security Records** - Surveillance and access control logs
- [ ] **Employee Records** - Training, background checks, certifications

### 🛡️ Audit Defense Strategy

#### Preparation Steps
1. **Organize Records** - Create logical filing system
2. **Digital Backups** - Maintain secure digital copies
3. **Documentation Index** - Create comprehensive document index
4. **Professional Help** - Retain experienced cannabis tax professionals

#### Response Protocol
1. **Professional Representation** - Never face audit alone
2. **Document Production** - Provide only requested documents
3. **Consistent Positions** - Maintain consistent tax positions
4. **Settlement Strategy** - Develop realistic settlement approach

---

## Penalty Avoidance

### ⚠️ Common Penalty Triggers

#### OCM Penalties
- **Late Monthly Reports** - $500 per day penalty
- **Incomplete Reports** - Additional penalties and violations
- **Missing Documentation** - Compliance violations and fines
- **License Violations** - Fines, suspension, or revocation

#### Federal Tax Penalties
- **Underpayment Penalties** - Interest on unpaid taxes
- **Late Filing Penalties** - 5% per month on unpaid tax
- **Accuracy Penalties** - 20% penalty for substantial understatement
- **280E Violations** - Disallowed deductions plus interest

#### State Tax Penalties
- **Late Payment** - Interest and penalties on unpaid state taxes
- **Filing Delays** - Penalties for late state return filing
- **Sales Tax Issues** - Penalties for unpaid or late sales tax
- **Payroll Tax Problems** - Severe penalties for payroll tax issues

### 🛡️ Penalty Prevention Strategies

#### Compliance Calendar
- [ ] **Set Up Reminders** - Calendar reminders for all deadlines
- [ ] **Early Preparation** - Start reports and returns early
- [ ] **Professional Help** - Use qualified cannabis professionals
- [ ] **Regular Reviews** - Monthly compliance reviews

#### Payment Management
- [ ] **Estimated Payments** - Make quarterly estimated payments
- [ ] **Cash Flow Planning** - Plan for tax payment cash needs
- [ ] **Extension Strategy** - File extensions when needed
- [ ] **Payment Plans** - Set up payment plans for large liabilities

---

## Best Practices

### 🎯 Monthly Routine

#### First Week of Month
1. **Close Books** - Complete previous month closing
2. **Reconcile Accounts** - All bank and credit card accounts
3. **Review Transactions** - Categorize all income and expenses
4. **Update Inventory** - Complete inventory counts and valuations
5. **Process Payroll** - Complete payroll and tax filings

#### Second Week of Month
1. **Prepare OCM Report** - Complete monthly OCM reporting
2. **Financial Review** - Analyze financial statements and KPIs
3. **Cash Flow Update** - Update cash flow projections
4. **Compliance Check** - Review compliance checklist
5. **Tax Planning** - Update tax estimates and planning

#### Third Week of Month
1. **Budget Review** - Compare actual to budget
2. **Variance Analysis** - Investigate significant variances
3. **Forecast Update** - Update financial forecasts
4. **Strategic Planning** - Review strategic initiatives
5. **Staff Training** - Conduct any required training

#### Fourth Week of Month
1. **Month-End Prep** - Prepare for month-end closing
2. **Process Reviews** - Review and improve processes
3. **Documentation** - Update documentation and procedures
4. **Next Month Planning** - Plan for upcoming month
5. **Compliance Review** - Final compliance review

### 🎯 Quarterly Routine

#### Tax Compliance
1. **Estimated Payments** - Calculate and pay estimated taxes
2. **Payroll Returns** - File quarterly payroll tax returns
3. **Sales Tax** - File quarterly sales tax returns (if applicable)
4. **Financial Review** - Comprehensive quarterly financial review

#### Business Analysis
1. **Performance Review** - Analyze quarterly performance
2. **Budget Updates** - Update budgets based on performance
3. **Strategic Planning** - Review and update strategic plans
4. **Compliance Assessment** - Comprehensive compliance review

### 🎯 Annual Routine

#### Year-End Closing
1. **Inventory Count** - Physical inventory count
2. **Adjusting Entries** - Year-end adjusting entries
3. **Financial Statements** - Prepare annual financial statements
4. **Tax Preparation** - Prepare all annual tax returns

#### Planning and Strategy
1. **Annual Planning** - Develop next year's business plan
2. **Budget Preparation** - Prepare annual budget
3. **Tax Strategy** - Develop tax planning strategies
4. **Compliance Review** - Annual compliance assessment

{footer}"""
    
    return content

def main():
    print("🎯 Creating CBK Customer Downloads as Markdown Files")
    print("==================================================")
    print("")
    
    # Create markdown downloads directory
    markdown_dir = Path("cbkny-theme/assets/downloads/markdown")
    markdown_dir.mkdir(exist_ok=True)
    
    print("📝 Creating Markdown customer downloads...")
    print("")
    
    # Create 280E Guide Markdown
    print("1. Creating 280E Deduction Guide (Markdown)...")
    guide_280e_md = create_280e_guide_markdown()
    
    with open(markdown_dir / "280E-Deduction-Guide-for-Cannabis-Businesses.md", "w") as f:
        f.write(guide_280e_md)
    
    # Create Compliance Checklist Markdown
    print("2. Creating NY Cannabis Compliance Checklist (Markdown)...")
    checklist_md = create_compliance_checklist_markdown()
    
    with open(markdown_dir / "NY-Cannabis-Tax-Compliance-Checklist.md", "w") as f:
        f.write(checklist_md)
    
    print("")
    print("✅ Markdown files created successfully!")
    print(f"📁 Location: {markdown_dir}")
    print("")
    print("📋 Created files:")
    for md_file in markdown_dir.glob("*.md"):
        print(f"   • {md_file.name}")
    
    print("")
    print("🎯 Benefits of Markdown format:")
    print("   • ✅ Prints beautifully from any text editor or browser")
    print("   • ✅ Easy to edit and maintain")
    print("   • ✅ Version control friendly")
    print("   • ✅ Converts to PDF, HTML, or Word easily")
    print("   • ✅ Professional formatting with emoji icons")
    print("   • ✅ Mobile-friendly reading experience")
    print("")
    print("📖 To view/print:")
    print("   1. Open any .md file in VS Code, Typora, or similar")
    print("   2. Use preview mode for formatted view")
    print("   3. Print directly from preview (looks great!)")
    print("   4. Or convert to PDF using markdown-pdf tools")

if __name__ == "__main__":
    main()