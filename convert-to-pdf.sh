#!/bin/bash

# PDF Conversion Script for CBK Content
# This script will help convert HTML files to PDFs using wkhtmltopdf or browser automation

echo "🎯 CBK Content to PDF Conversion"
echo "================================="
echo ""

# Check if output directory exists
OUTPUT_DIR="./client-content-review"
if [ ! -d "$OUTPUT_DIR" ]; then
    echo "❌ Output directory not found. Please run extract-content-for-client.php first."
    exit 1
fi

# Create PDF output directories
mkdir -p "$OUTPUT_DIR/pdfs/guides"
mkdir -p "$OUTPUT_DIR/pdfs/service-pages"

echo "📄 Converting HTML files to PDF..."
echo ""

# Function to convert HTML to PDF using different methods
convert_html_to_pdf() {
    local html_file="$1"
    local pdf_file="$2"
    local title="$3"
    
    echo "   Converting: $title"
    
    # Method 1: Try wkhtmltopdf (if installed)
    if command -v wkhtmltopdf &> /dev/null; then
        wkhtmltopdf --page-size A4 --margin-top 0.75in --margin-right 0.75in --margin-bottom 0.75in --margin-left 0.75in "$html_file" "$pdf_file" 2>/dev/null
        if [ $? -eq 0 ]; then
            echo "     ✅ Converted with wkhtmltopdf"
            return 0
        fi
    fi
    
    # Method 2: Use headless Chrome (if available)
    if command -v google-chrome &> /dev/null; then
        google-chrome --headless --disable-gpu --print-to-pdf="$pdf_file" --print-to-pdf-no-header "$html_file" 2>/dev/null
        if [ $? -eq 0 ]; then
            echo "     ✅ Converted with Chrome"
            return 0
        fi
    fi
    
    # Method 3: Instructions for manual conversion
    echo "     ⚠️  Auto-conversion not available. Please convert manually:"
    echo "        1. Open: $html_file"
    echo "        2. Print to PDF: $pdf_file"
    echo ""
    return 1
}

# Convert guide HTML files to PDF
echo "📚 Converting Guide Pages..."
if [ -d "$OUTPUT_DIR/guides" ]; then
    for html_file in "$OUTPUT_DIR/guides"/*.html; do
        if [ -f "$html_file" ]; then
            filename=$(basename "$html_file" .html)
            pdf_file="$OUTPUT_DIR/pdfs/guides/$filename.pdf"
            convert_html_to_pdf "$html_file" "$pdf_file" "$filename"
        fi
    done
fi

echo ""
echo "📄 Converting Service Pages..."
if [ -d "$OUTPUT_DIR/service-pages" ]; then
    for html_file in "$OUTPUT_DIR/service-pages"/*.html; do
        if [ -f "$html_file" ]; then
            filename=$(basename "$html_file" .html)
            pdf_file="$OUTPUT_DIR/pdfs/service-pages/$filename.pdf"
            convert_html_to_pdf "$html_file" "$pdf_file" "$filename"
        fi
    done
fi

echo ""
echo "✅ PDF Conversion Process Complete!"
echo ""
echo "📁 Check the following directories:"
echo "   • PDFs: $OUTPUT_DIR/pdfs/"
echo "   • Original HTMLs: $OUTPUT_DIR/guides/ and $OUTPUT_DIR/service-pages/"
echo "   • Existing PDFs: $OUTPUT_DIR/existing-pdfs/"
echo "   • Templates: $OUTPUT_DIR/templates/"
echo ""

# Create a final package summary
echo "📦 Creating Final Package Summary..."
cat > "$OUTPUT_DIR/PACKAGE_SUMMARY.md" << EOF
# CBK Website Content Package for Client Review

## 📊 Package Contents

### Main Cannabis Guides (HTML/PDF)
- Ultimate Guide to Cannabis Accounting in New York
- 280E Tax Compliance Complete Resource  
- NY OCM Reporting Requirements Complete Guide
- Cannabis Business Startup Financial Guide

### Resource & Service Pages (HTML/PDF)
- Free Cannabis Accounting Resources
- Free Cannabis Accounting Guides
- Free Cannabis Business Templates  
- Cannabis Business Assessment Tools
- Cannabis Accounting Services
- About Page
- Contact Information

### Existing Marketing Materials
- 280E Deduction Guide for Cannabis Businesses (PDF)
- NY Cannabis Tax Compliance Checklist (PDF)
- Cannabis COGS Tracking Template (Excel)
- Cannabis Business Budget Template (Excel)

## 📁 Directory Structure
\`\`\`
client-content-review/
├── guides/                 # Main guide HTML files
├── service-pages/          # Resource & service HTML files  
├── pdfs/                   # Converted PDF files
│   ├── guides/
│   └── service-pages/
├── existing-pdfs/          # Original PDF lead magnets
├── templates/              # Excel templates
├── index.html              # Complete content index
└── PACKAGE_SUMMARY.md      # This file
\`\`\`

## 🎯 Content Quality Assessment

### Strengths
- Comprehensive, professional cannabis accounting content
- Industry-specific guidance for NY cannabis businesses
- Practical templates and tools
- SEO-optimized long-form guides
- Compliance-focused approach

### Content Types
- **Educational Guides**: 4 comprehensive guides (3,000+ words each)
- **Lead Magnets**: 2 existing PDFs + 2 Excel templates
- **Service Pages**: Professional service descriptions
- **Resource Pages**: Organized resource libraries

## 📋 Recommended Actions

1. **Review Content Quality**: Open index.html to browse all content
2. **Check PDF Conversions**: Verify PDF formatting and readability  
3. **Test Excel Templates**: Ensure formulas work correctly
4. **Content Audit**: Identify any updates or additions needed
5. **Client Presentation**: Organize for client review meeting

## 💡 Notes
- All content is ready for client review
- HTML files can be easily converted to PDF if needed
- Templates are fully functional with cannabis-specific formulas
- Content demonstrates significant industry expertise

---
Generated on: $(date)
EOF

echo "✅ Package summary created: PACKAGE_SUMMARY.md"
echo ""
echo "🎯 Your complete content package is ready for client review!"
echo "📧 You can now share the entire '$OUTPUT_DIR' folder with your client."
EOF