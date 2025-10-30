#!/bin/bash

# Simple PDF Creation Instructions for CBK Content
echo "🎯 CBK Content - PDF Creation Instructions"
echo "=========================================="
echo ""
echo "Your content has been successfully extracted! Here's how to create PDFs:"
echo ""

# Function to open files in browser for PDF conversion
open_for_pdf_conversion() {
    local dir="$1"
    local description="$2"
    
    echo "📚 $description"
    echo "----------------------------------------"
    
    if [ -d "./client-content-review/$dir" ]; then
        for html_file in "./client-content-review/$dir"/*.html; do
            if [ -f "$html_file" ]; then
                filename=$(basename "$html_file" .html)
                echo "   📄 $filename"
                echo "      File: $html_file"
                echo "      → Open in browser and 'Print to PDF'"
                echo ""
            fi
        done
    fi
}

# Show file locations for PDF conversion
open_for_pdf_conversion "guides" "Main Cannabis Accounting Guides"
open_for_pdf_conversion "service-pages" "Resource & Service Pages"

echo "📋 Quick PDF Conversion Steps:"
echo "1. Open any HTML file in your web browser"
echo "2. Press Cmd+P (Print)"
echo "3. Select 'Save as PDF' as destination"
echo "4. Save to the appropriate pdfs/ subfolder"
echo ""

echo "📁 Your organized content package:"
echo "   • 4 comprehensive cannabis accounting guides"
echo "   • 7 resource and service pages"  
echo "   • 2 existing PDF lead magnets"
echo "   • 2 Excel templates"
echo "   • Complete index file for easy browsing"
echo ""

echo "🌐 Start here: open ./client-content-review/index.html"
echo ""

# Open the index file automatically
if command -v open &> /dev/null; then
    echo "🚀 Opening index file..."
    open "./client-content-review/index.html"
elif command -v xdg-open &> /dev/null; then
    echo "🚀 Opening index file..."
    xdg-open "./client-content-review/index.html"
else
    echo "💡 Manually open: ./client-content-review/index.html in your browser"
fi

echo ""
echo "✅ Ready for client review!"