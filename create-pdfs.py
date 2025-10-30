#!/usr/bin/env python3
"""
Simple PDF Creator for CBK Content
This script opens HTML files in your browser so you can easily convert them to PDF
"""

import os
import subprocess
import sys
from pathlib import Path

def open_file_for_pdf_conversion(html_file, pdf_destination):
    """Open HTML file in browser for manual PDF conversion"""
    print(f"📄 Opening: {html_file.name}")
    print(f"   Save PDF as: {pdf_destination}")
    print("   → In browser: Cmd+P → Save as PDF")
    print("")
    
    # Open in default browser
    subprocess.run(['open', str(html_file)])
    
    # Wait for user confirmation
    input("   Press Enter after saving the PDF to continue...")

def main():
    print("🎯 CBK Content - Batch PDF Creator")
    print("==================================")
    print("")
    print("This script will open each HTML file in your browser.")
    print("For each file:")
    print("1. Press Cmd+P (Print)")
    print("2. Select 'Save as PDF'")
    print("3. Save to the suggested location")
    print("4. Press Enter to continue to next file")
    print("")
    
    base_dir = Path("client-content-review")
    
    if not base_dir.exists():
        print("❌ client-content-review directory not found!")
        return
    
    # Create PDF directories
    pdf_guides_dir = base_dir / "pdfs" / "guides"
    pdf_services_dir = base_dir / "pdfs" / "service-pages"
    pdf_guides_dir.mkdir(parents=True, exist_ok=True)
    pdf_services_dir.mkdir(parents=True, exist_ok=True)
    
    proceed = input("Ready to start? (y/n): ").lower().strip()
    if proceed != 'y':
        print("Cancelled.")
        return
    
    print("\n📚 Converting Guide Pages...")
    guides_dir = base_dir / "guides"
    if guides_dir.exists():
        for html_file in guides_dir.glob("*.html"):
            pdf_name = html_file.stem + ".pdf"
            pdf_destination = pdf_guides_dir / pdf_name
            open_file_for_pdf_conversion(html_file, pdf_destination)
    
    print("\n📄 Converting Service Pages...")
    services_dir = base_dir / "service-pages"
    if services_dir.exists():
        for html_file in services_dir.glob("*.html"):
            pdf_name = html_file.stem + ".pdf"
            pdf_destination = pdf_services_dir / pdf_name
            open_file_for_pdf_conversion(html_file, pdf_destination)
    
    print("✅ All files processed!")
    print(f"📁 Check your PDFs in:")
    print(f"   • {pdf_guides_dir}")
    print(f"   • {pdf_services_dir}")

if __name__ == "__main__":
    main()