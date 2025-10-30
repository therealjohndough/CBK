#!/bin/bash

# Quick PDF Creator - Opens all HTML files at once
echo "🎯 CBK Content - Quick PDF Creator"
echo "=================================="
echo ""

if [ ! -d "client-content-review" ]; then
    echo "❌ client-content-review directory not found!"
    exit 1
fi

echo "This will open ALL HTML files in your browser."
echo "For each browser tab:"
echo "1. Press Cmd+P (Print)"
echo "2. Select 'Save as PDF'"
echo "3. Save to client-content-review/pdfs/guides/ or /service-pages/"
echo ""

read -p "Ready to open all files? (y/n): " -n 1 -r
echo ""

if [[ ! $REPLY =~ ^[Yy]$ ]]; then
    echo "Cancelled."
    exit 1
fi

echo ""
echo "🚀 Opening all HTML files..."

# Open all guide files
echo "📚 Opening guide files..."
for file in client-content-review/guides/*.html; do
    if [ -f "$file" ]; then
        echo "   Opening: $(basename "$file")"
        open "$file"
        sleep 1  # Small delay between opens
    fi
done

# Open all service page files
echo "📄 Opening service page files..."
for file in client-content-review/service-pages/*.html; do
    if [ -f "$file" ]; then
        echo "   Opening: $(basename "$file")"
        open "$file"
        sleep 1  # Small delay between opens
    fi
done

echo ""
echo "✅ All files opened in browser!"
echo ""
echo "📋 To create PDFs:"
echo "1. In each browser tab: Cmd+P"
echo "2. Destination: Save as PDF"
echo "3. Save guides to: client-content-review/pdfs/guides/"
echo "4. Save service pages to: client-content-review/pdfs/service-pages/"
echo ""
echo "💡 Tip: You can save all at once by going through each tab quickly!"