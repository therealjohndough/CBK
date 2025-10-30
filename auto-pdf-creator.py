#!/usr/bin/env python3
"""
Automated PDF Creator using system print functionality
"""

import os
import subprocess
import time
from pathlib import Path

def create_pdf_with_chrome(html_file, pdf_file):
    """Use Chrome headless to create PDF"""
    try:
        # Try using Chrome in headless mode
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
        return result.returncode == 0
    except:
        return False

def create_pdf_with_safari(html_file, pdf_file):
    """Use Safari via AppleScript to create PDF"""
    try:
        applescript = f'''
        tell application "Safari"
            open location "file://{html_file.absolute()}"
            delay 2
            tell application "System Events"
                keystroke "p" using command down
                delay 1
                keystroke "s" using {{command down, shift down}}
                delay 1
                keystroke "{pdf_file.name}"
                delay 1
                keystroke return
            end tell
            delay 2
            close front window
        end tell
        '''
        
        result = subprocess.run(['osascript', '-e', applescript], capture_output=True)
        return result.returncode == 0
    except:
        return False

def main():
    print("🎯 Automated PDF Creator for CBK Content")
    print("========================================")
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
    
    success_count = 0
    total_files = 0
    
    print("📚 Converting Guide Pages...")
    guides_dir = base_dir / "guides"
    if guides_dir.exists():
        for html_file in guides_dir.glob("*.html"):
            total_files += 1
            pdf_file = pdf_guides_dir / (html_file.stem + ".pdf")
            
            print(f"   Converting: {html_file.name}")
            
            # Try Chrome first
            if create_pdf_with_chrome(html_file, pdf_file):
                print(f"     ✅ Created: {pdf_file.name}")
                success_count += 1
            else:
                print(f"     ⚠️  Chrome conversion failed for {html_file.name}")
    
    print("\n📄 Converting Service Pages...")
    services_dir = base_dir / "service-pages"
    if services_dir.exists():
        for html_file in services_dir.glob("*.html"):
            total_files += 1
            pdf_file = pdf_services_dir / (html_file.stem + ".pdf")
            
            print(f"   Converting: {html_file.name}")
            
            # Try Chrome first
            if create_pdf_with_chrome(html_file, pdf_file):
                print(f"     ✅ Created: {pdf_file.name}")
                success_count += 1
            else:
                print(f"     ⚠️  Chrome conversion failed for {html_file.name}")
    
    print(f"\n✅ Conversion Complete!")
    print(f"📊 Successfully converted: {success_count}/{total_files} files")
    print(f"📁 PDFs saved to:")
    print(f"   • {pdf_guides_dir}")
    print(f"   • {pdf_services_dir}")
    
    if success_count < total_files:
        print(f"\n💡 For failed conversions, use manual method:")
        print(f"   1. Open HTML file in browser")
        print(f"   2. Press Cmd+P → Save as PDF")

if __name__ == "__main__":
    main()