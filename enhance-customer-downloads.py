#!/usr/bin/env python3
"""
CBK Customer Downloads Audit & Enhancement Script
This script will create properly formatted, branded PDFs for customer downloads
"""

import os
from pathlib import Path
import subprocess

def create_cbk_logo_svg():
    """Create a simple CBK logo SVG for the PDFs"""
    logo_svg = '''<svg xmlns="http://www.w3.org/2000/svg" width="200" height="60" viewBox="0 0 200 60">
  <defs>
    <linearGradient id="cbkGradient" x1="0%" y1="0%" x2="100%" y2="0%">
      <stop offset="0%" style="stop-color:#FF4D4D;stop-opacity:1" />
      <stop offset="100%" style="stop-color:#E74C3C;stop-opacity:1" />
    </linearGradient>
  </defs>
  
  <!-- CBK Text -->
  <text x="20" y="30" font-family="Arial, sans-serif" font-size="24" font-weight="bold" fill="url(#cbkGradient)">CBK</text>
  <text x="80" y="30" font-family="Arial, sans-serif" font-size="16" font-weight="normal" fill="#2C3E50">NY</text>
  
  <!-- Tagline -->
  <text x="20" y="48" font-family="Arial, sans-serif" font-size="10" fill="#7F8C8D">Cannabis Bookkeeper New York</text>
  
  <!-- Cannabis leaf accent -->
  <path d="M 160 15 Q 165 10 170 15 Q 175 10 180 15 Q 175 20 170 25 Q 165 20 160 25 Z" 
        fill="#27AE60" opacity="0.7"/>
</svg>'''
    return logo_svg

def create_enhanced_pdf_template(title, content, filename, guide_type="guide"):
    """Create an enhanced PDF template with proper CBK branding"""
    
    logo_svg = create_cbk_logo_svg()
    
    html_template = f'''<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{title}</title>
    <style>
        @page {{
            size: 8.5in 11in;
            margin: 0.75in 0.5in 0.75in 0.5in;
        }}
        
        @media print {{
            body {{ 
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }}
        }}
        
        body {{
            font-family: 'Arial', 'Helvetica', sans-serif;
            line-height: 1.6;
            color: #2C3E50;
            background: white;
            margin: 0;
            padding: 0;
            font-size: 12pt;
        }}
        
        .page {{
            background: white;
            min-height: 9.5in;
            padding: 0.5in;
            position: relative;
            page-break-after: always;
        }}
        
        .page:last-child {{
            page-break-after: avoid;
        }}
        
        .header {{
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 3px solid #E74C3C;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }}
        
        .logo-section {{
            flex: 1;
        }}
        
        .logo-svg {{
            width: 180px;
            height: 50px;
        }}
        
        .contact-info {{
            text-align: right;
            font-size: 9pt;
            color: #7F8C8D;
            line-height: 1.4;
        }}
        
        .title {{
            font-size: 24pt;
            font-weight: bold;
            color: #2C3E50;
            margin: 20px 0;
            text-align: center;
        }}
        
        .subtitle {{
            font-size: 14pt;
            color: #7F8C8D;
            text-align: center;
            margin-bottom: 30px;
        }}
        
        h1 {{
            font-size: 20pt;
            color: #E74C3C;
            border-bottom: 2px solid #E74C3C;
            padding-bottom: 5px;
            margin-top: 30px;
            margin-bottom: 15px;
        }}
        
        h2 {{
            font-size: 16pt;
            color: #2C3E50;
            margin-top: 25px;
            margin-bottom: 12px;
        }}
        
        h3 {{
            font-size: 14pt;
            color: #34495E;
            margin-top: 20px;
            margin-bottom: 10px;
        }}
        
        p {{
            margin-bottom: 12px;
            text-align: justify;
        }}
        
        ul, ol {{
            margin: 12px 0;
            padding-left: 25px;
        }}
        
        li {{
            margin-bottom: 6px;
        }}
        
        .highlight-box {{
            background: #F8F9FA;
            border-left: 4px solid #E74C3C;
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
        }}
        
        .warning-box {{
            background: #FFF3CD;
            border: 1px solid #FFEAA7;
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
        }}
        
        .tip-box {{
            background: #E8F6F3;
            border-left: 4px solid #27AE60;
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
        }}
        
        .checklist {{
            background: #F8F9FA;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
        }}
        
        .checklist h4 {{
            color: #E74C3C;
            margin-bottom: 15px;
            font-size: 14pt;
        }}
        
        .checklist-item {{
            display: flex;
            align-items: flex-start;
            margin-bottom: 10px;
            padding: 8px;
            background: white;
            border-radius: 4px;
        }}
        
        .checkbox {{
            width: 16px;
            height: 16px;
            border: 2px solid #E74C3C;
            margin-right: 12px;
            margin-top: 2px;
            flex-shrink: 0;
        }}
        
        .footer {{
            position: fixed;
            bottom: 0.5in;
            left: 0.5in;
            right: 0.5in;
            text-align: center;
            font-size: 9pt;
            color: #7F8C8D;
            border-top: 1px solid #E0E0E0;
            padding-top: 10px;
        }}
        
        .page-number {{
            position: fixed;
            bottom: 0.3in;
            right: 0.5in;
            font-size: 9pt;
            color: #7F8C8D;
        }}
        
        .cta-section {{
            background: linear-gradient(135deg, #E74C3C, #C0392B);
            color: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            margin: 30px 0;
        }}
        
        .cta-section h3 {{
            color: white;
            margin-bottom: 10px;
        }}
        
        .cta-section p {{
            margin-bottom: 15px;
            text-align: center;
        }}
        
        .contact-cta {{
            background: white;
            color: #E74C3C;
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
            margin: 5px;
        }}
        
        table {{
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }}
        
        th, td {{
            border: 1px solid #DDD;
            padding: 10px;
            text-align: left;
        }}
        
        th {{
            background: #F8F9FA;
            font-weight: bold;
            color: #2C3E50;
        }}
        
        .important {{
            background: #FFF3CD;
            border: 1px solid #FFEAA7;
            padding: 15px;
            border-radius: 4px;
            margin: 20px 0;
        }}
        
        .important strong {{
            color: #856404;
        }}
    </style>
</head>
<body>
    <div class="page">
        <div class="header">
            <div class="logo-section">
                {logo_svg}
            </div>
            <div class="contact-info">
                <strong>Canna Bookkeeper NY</strong><br>
                Expert Cannabis Accounting<br>
                📧 contact@cbkny.com<br>
                🌐 www.cbkny.com<br>
                📞 Schedule Free Consultation
            </div>
        </div>
        
        <div class="title">{title}</div>
        <div class="subtitle">Professional Cannabis Accounting Resources</div>
        
        {content}
        
        <div class="cta-section">
            <h3>Need Professional Help?</h3>
            <p>Let Canna Bookkeeper NY handle your cannabis accounting needs with expertise in 280E compliance, OCM reporting, and audit preparation.</p>
            <a href="mailto:contact@cbkny.com" class="contact-cta">Get Free Consultation</a>
            <a href="https://cbkny.com/services" class="contact-cta">View Our Services</a>
        </div>
    </div>
    
    <div class="footer">
        © 2025 Canna Bookkeeper NY | Expert Cannabis Accounting Services | This guide is for informational purposes only. Consult with qualified professionals for specific advice.
    </div>
    
    <div class="page-number">Page 1</div>
</body>
</html>'''
    
    return html_template

def create_280e_guide_content():
    """Create enhanced content for the 280E Deduction Guide"""
    return '''
        <h1>Understanding Section 280E</h1>
        <p>Section 280E of the Internal Revenue Code prohibits businesses engaged in trafficking controlled substances from deducting most business expenses. This federal law significantly impacts cannabis businesses, even in states where cannabis is legal.</p>
        
        <div class="highlight-box">
            <h4>Key Impact of 280E</h4>
            <ul>
                <li>Cannabis businesses can only deduct Cost of Goods Sold (COGS)</li>
                <li>Most traditional business deductions are prohibited</li>
                <li>Effective tax rates can reach 70% or higher</li>
                <li>Proper planning and compliance are essential</li>
            </ul>
        </div>
        
        <h1>What You CAN Deduct</h1>
        
        <h2>Cost of Goods Sold (COGS)</h2>
        <ul>
            <li><strong>Direct Materials:</strong> Seeds, nutrients, soil, packaging materials</li>
            <li><strong>Direct Labor:</strong> Cultivation, trimming, processing, packaging labor</li>
            <li><strong>Direct Overhead:</strong> Facility costs, utilities, equipment depreciation</li>
            <li><strong>Transportation:</strong> Costs to move inventory between facilities</li>
        </ul>
        
        <h2>Limited Administrative Expenses</h2>
        <ul>
            <li>Accounting and bookkeeping services</li>
            <li>Legal services (compliance-related only)</li>
            <li>Tax preparation and planning</li>
            <li>Certain professional services</li>
        </ul>
        
        <div class="tip-box">
            <h4>💡 Pro Tip</h4>
            <p>Maximize your COGS deductions by properly categorizing all direct costs of production. This includes facilities costs, utilities, and labor directly related to cultivation and processing.</p>
        </div>
        
        <h1>What You CANNOT Deduct</h1>
        
        <div class="warning-box">
            <h4>⚠️ Non-Deductible Expenses Under 280E</h4>
            <ul>
                <li>Marketing and advertising expenses</li>
                <li>General administrative expenses</li>
                <li>Rent and utilities (unless directly related to production)</li>
                <li>Insurance (except product liability)</li>
                <li>Professional development and training</li>
                <li>Travel and entertainment</li>
                <li>Office supplies and equipment</li>
                <li>Most consulting and professional services</li>
            </ul>
        </div>
        
        <h1>Compliance Strategies</h1>
        
        <h2>1. Separate Business Entities</h2>
        <p>Consider operating separate entities for different business activities:</p>
        <ul>
            <li><strong>Plant-touching entity:</strong> Subject to 280E, handles cultivation/processing</li>
            <li><strong>Management company:</strong> Not subject to 280E, handles administration</li>
            <li><strong>Real estate entity:</strong> Owns facilities, charges rent</li>
        </ul>
        
        <h2>2. Maximize COGS</h2>
        <div class="checklist">
            <h4>COGS Optimization Checklist</h4>
            <div class="checklist-item">
                <div class="checkbox"></div>
                <div>Include all direct materials in COGS calculation</div>
            </div>
            <div class="checklist-item">
                <div class="checkbox"></div>
                <div>Track direct labor hours and costs accurately</div>
            </div>
            <div class="checklist-item">
                <div class="checkbox"></div>
                <div>Allocate facility costs to production activities</div>
            </div>
            <div class="checklist-item">
                <div class="checkbox"></div>
                <div>Include equipment depreciation in COGS</div>
            </div>
            <div class="checklist-item">
                <div class="checkbox"></div>
                <div>Document all COGS calculations thoroughly</div>
            </div>
        </div>
        
        <h2>3. Maintain Detailed Records</h2>
        <p>280E compliance requires meticulous documentation:</p>
        <ul>
            <li>Detailed expense receipts and invoices</li>
            <li>Time tracking for all employees</li>
            <li>Inventory movement records</li>
            <li>COGS calculation worksheets</li>
            <li>Bank statements and cash transaction logs</li>
        </ul>
        
        <h1>Common 280E Mistakes</h1>
        
        <div class="important">
            <strong>Mistake #1:</strong> Mixing deductible and non-deductible expenses in accounting records<br>
            <strong>Solution:</strong> Use separate chart of accounts categories for COGS vs. non-deductible expenses
        </div>
        
        <div class="important">
            <strong>Mistake #2:</strong> Inadequate COGS documentation<br>
            <strong>Solution:</strong> Maintain detailed records of all direct costs and allocation methods
        </div>
        
        <div class="important">
            <strong>Mistake #3:</strong> Failing to maximize legitimate COGS deductions<br>
            <strong>Solution:</strong> Work with cannabis accounting experts to identify all allowable COGS items
        </div>
        
        <h1>Getting Professional Help</h1>
        <p>280E compliance is complex and requires specialized expertise. Cannabis accounting professionals can help you:</p>
        <ul>
            <li>Structure your business for optimal tax efficiency</li>
            <li>Maximize legitimate deductions under 280E</li>
            <li>Maintain proper documentation and records</li>
            <li>Prepare for potential IRS audits</li>
            <li>Develop tax planning strategies</li>
        </ul>
    '''

def create_compliance_checklist_content():
    """Create enhanced content for the NY Cannabis Compliance Checklist"""
    return '''
        <h1>Monthly Compliance Requirements</h1>
        
        <div class="checklist">
            <h4>OCM Monthly Reporting (Due 15th of each month)</h4>
            <div class="checklist-item">
                <div class="checkbox"></div>
                <div><strong>Sales Data:</strong> Revenue, units sold, pricing information</div>
            </div>
            <div class="checklist-item">
                <div class="checkbox"></div>
                <div><strong>Inventory Tracking:</strong> Beginning inventory, purchases, sales, ending inventory</div>
            </div>
            <div class="checklist-item">
                <div class="checkbox"></div>
                <div><strong>Employee Data:</strong> Hours worked, payroll information</div>
            </div>
            <div class="checklist-item">
                <div class="checkbox"></div>
                <div><strong>Security Metrics:</strong> Incidents, compliance violations</div>
            </div>
            <div class="checklist-item">
                <div class="checkbox"></div>
                <div><strong>Financial Summary:</strong> Revenue, expenses, taxes paid</div>
            </div>
        </div>
        
        <div class="checklist">
            <h4>Federal Tax Compliance (280E)</h4>
            <div class="checklist-item">
                <div class="checkbox"></div>
                <div><strong>COGS Tracking:</strong> Maintain detailed Cost of Goods Sold records</div>
            </div>
            <div class="checklist-item">
                <div class="checkbox"></div>
                <div><strong>Expense Categorization:</strong> Separate deductible vs. non-deductible expenses</div>
            </div>
            <div class="checklist-item">
                <div class="checkbox"></div>
                <div><strong>Documentation:</strong> Keep detailed receipts and invoices</div>
            </div>
            <div class="checklist-item">
                <div class="checkbox"></div>
                <div><strong>Quarterly Estimates:</strong> Make estimated tax payments</div>
            </div>
        </div>
        
        <h1>Quarterly Requirements</h1>
        
        <div class="highlight-box">
            <h4>Q1 Deadlines (January - March)</h4>
            <ul>
                <li><strong>April 15:</strong> Federal estimated tax payment</li>
                <li><strong>April 15:</strong> NY State estimated tax payment</li>
                <li><strong>April 30:</strong> OCM quarterly compliance report</li>
            </ul>
        </div>
        
        <div class="highlight-box">
            <h4>Q2 Deadlines (April - June)</h4>
            <ul>
                <li><strong>June 15:</strong> Federal estimated tax payment</li>
                <li><strong>June 15:</strong> NY State estimated tax payment</li>
                <li><strong>July 31:</strong> OCM quarterly compliance report</li>
            </ul>
        </div>
        
        <div class="highlight-box">
            <h4>Q3 Deadlines (July - September)</h4>
            <ul>
                <li><strong>September 15:</strong> Federal estimated tax payment</li>
                <li><strong>September 15:</strong> NY State estimated tax payment</li>
                <li><strong>October 31:</strong> OCM quarterly compliance report</li>
            </ul>
        </div>
        
        <div class="highlight-box">
            <h4>Q4 Deadlines (October - December)</h4>
            <ul>
                <li><strong>January 15:</strong> Federal estimated tax payment</li>
                <li><strong>January 15:</strong> NY State estimated tax payment</li>
                <li><strong>January 31:</strong> OCM quarterly compliance report</li>
            </ul>
        </div>
        
        <h1>Annual Requirements</h1>
        
        <div class="checklist">
            <h4>Year-End Tax Filings</h4>
            <div class="checklist-item">
                <div class="checkbox"></div>
                <div><strong>Federal Tax Return:</strong> Form 1120 or 1120S (Due March 15 or April 15)</div>
            </div>
            <div class="checklist-item">
                <div class="checkbox"></div>
                <div><strong>NY State Tax Return:</strong> CT-3 or CT-3-S (Due March 15 or April 15)</div>
            </div>
            <div class="checklist-item">
                <div class="checkbox"></div>
                <div><strong>Sales Tax Returns:</strong> Monthly or quarterly NY sales tax filings</div>
            </div>
            <div class="checklist-item">
                <div class="checkbox"></div>
                <div><strong>Payroll Tax Returns:</strong> Form 941, W-2s, 1099s</div>
            </div>
        </div>
        
        <div class="checklist">
            <h4>OCM Annual Reporting</h4>
            <div class="checklist-item">
                <div class="checkbox"></div>
                <div><strong>Financial Statements:</strong> Audited financial statements (if required)</div>
            </div>
            <div class="checklist-item">
                <div class="checkbox"></div>
                <div><strong>Compliance Certification:</strong> Annual compliance attestation</div>
            </div>
            <div class="checklist-item">
                <div class="checkbox"></div>
                <div><strong>License Renewal:</strong> Submit renewal application and fees</div>
            </div>
            <div class="checklist-item">
                <div class="checkbox"></div>
                <div><strong>Business Plan Update:</strong> Updated business plan (if required)</div>
            </div>
        </div>
        
        <h1>Audit Preparation</h1>
        
        <div class="tip-box">
            <h4>🎯 Audit-Ready Documentation</h4>
            <p>Cannabis businesses face higher audit risk. Keep these documents organized and easily accessible:</p>
        </div>
        
        <div class="checklist">
            <h4>Essential Audit Documentation</h4>
            <div class="checklist-item">
                <div class="checkbox"></div>
                <div><strong>Financial Records:</strong> Complete books and records for all tax years</div>
            </div>
            <div class="checklist-item">
                <div class="checkbox"></div>
                <div><strong>Bank Statements:</strong> All business bank accounts and cash logs</div>
            </div>
            <div class="checklist-item">
                <div class="checkbox"></div>
                <div><strong>Expense Documentation:</strong> Receipts, invoices, contracts</div>
            </div>
            <div class="checklist-item">
                <div class="checkbox"></div>
                <div><strong>Inventory Records:</strong> Detailed tracking and movement logs</div>
            </div>
            <div class="checklist-item">
                <div class="checkbox"></div>
                <div><strong>Employee Records:</strong> Payroll, time sheets, employment agreements</div>
            </div>
            <div class="checklist-item">
                <div class="checkbox"></div>
                <div><strong>COGS Calculations:</strong> Detailed worksheets and supporting documentation</div>
            </div>
        </div>
        
        <h1>Penalties to Avoid</h1>
        
        <div class="warning-box">
            <h4>⚠️ Common Penalty Triggers</h4>
            <ul>
                <li><strong>Late OCM Reporting:</strong> $500 per day penalty</li>
                <li><strong>Missed Tax Payments:</strong> Interest and penalties on unpaid taxes</li>
                <li><strong>Inadequate Records:</strong> Additional assessments and penalties</li>
                <li><strong>280E Non-Compliance:</strong> Disallowed deductions and interest charges</li>
                <li><strong>License Violations:</strong> Fines, suspension, or license revocation</li>
            </ul>
        </div>
        
        <h1>Best Practices</h1>
        
        <h2>Monthly Routine</h2>
        <ol>
            <li>Reconcile all bank accounts and cash transactions</li>
            <li>Update inventory tracking systems</li>
            <li>Categorize expenses (COGS vs. non-deductible)</li>
            <li>Prepare OCM monthly report by the 10th</li>
            <li>Review financial statements and KPIs</li>
        </ol>
        
        <h2>Quarterly Routine</h2>
        <ol>
            <li>Calculate and pay estimated taxes</li>
            <li>Review COGS calculations and adjustments</li>
            <li>Prepare quarterly financial statements</li>
            <li>Submit OCM quarterly compliance report</li>
            <li>Review and update tax planning strategies</li>
        </ol>
        
        <h2>Annual Routine</h2>
        <ol>
            <li>Conduct year-end inventory count</li>
            <li>Prepare year-end adjusting entries</li>
            <li>File all required tax returns</li>
            <li>Submit OCM annual compliance report</li>
            <li>Plan for the following year</li>
        </ol>
    '''

def main():
    print("🎯 CBK Customer Downloads Audit & Enhancement")
    print("============================================")
    print("")
    
    # Create enhanced PDFs directory
    enhanced_dir = Path("cbkny-theme/assets/downloads/enhanced")
    enhanced_dir.mkdir(exist_ok=True)
    
    print("📋 Creating Enhanced Customer Download PDFs...")
    print("")
    
    # Create enhanced 280E Guide
    print("1. Creating Enhanced 280E Deduction Guide...")
    guide_280e = create_enhanced_pdf_template(
        "280E Deduction Guide for Cannabis Businesses",
        create_280e_guide_content(),
        "280E-Deduction-Guide-Enhanced.html"
    )
    
    with open(enhanced_dir / "280E-Deduction-Guide-Enhanced.html", "w") as f:
        f.write(guide_280e)
    
    # Create enhanced Compliance Checklist
    print("2. Creating Enhanced NY Cannabis Compliance Checklist...")
    checklist = create_enhanced_pdf_template(
        "NY Cannabis Tax Compliance Checklist",
        create_compliance_checklist_content(),
        "NY-Cannabis-Compliance-Checklist-Enhanced.html"
    )
    
    with open(enhanced_dir / "NY-Cannabis-Compliance-Checklist-Enhanced.html", "w") as f:
        f.write(checklist)
    
    print("")
    print("✅ Enhanced HTML templates created!")
    print(f"📁 Location: {enhanced_dir}")
    print("")
    print("🔄 Converting to PDF...")
    
    # Convert to PDF using Chrome headless
    success_count = 0
    for html_file in enhanced_dir.glob("*.html"):
        pdf_file = html_file.with_suffix(".pdf")
        
        try:
            cmd = [
                '/Applications/Google Chrome.app/Contents/MacOS/Google Chrome',
                '--headless',
                '--disable-gpu',
                '--print-to-pdf=' + str(pdf_file),
                '--print-to-pdf-no-header',
                '--no-margins',
                'file://' + str(html_file.absolute())
            ]
            
            result = subprocess.run(cmd, capture_output=True, text=True)
            if result.returncode == 0:
                print(f"   ✅ Created: {pdf_file.name}")
                success_count += 1
            else:
                print(f"   ⚠️  Failed to convert: {html_file.name}")
        except Exception as e:
            print(f"   ❌ Error converting {html_file.name}: {e}")
    
    print("")
    print("📊 Enhancement Summary:")
    print(f"   • Enhanced PDFs: {success_count}/2")
    print(f"   • Professional CBK branding added")
    print(f"   • 8.5\" x 11\" page format")
    print(f"   • Comprehensive content with checklists")
    print(f"   • Contact information and CTAs included")
    print("")
    print("🎯 Next Steps:")
    print("   1. Review the enhanced PDFs")
    print("   2. Replace existing customer download PDFs")
    print("   3. Update Excel templates with CBK branding")
    print("   4. Test download functionality on live site")

if __name__ == "__main__":
    main()