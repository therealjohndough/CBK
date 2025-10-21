#!/bin/bash

# CBKNY Theme File Upload Helper
# This script creates a zip file of your theme for easy upload via SiteGround File Manager

echo "📦 Creating theme package for SiteGround upload..."

# Create a temporary directory
TEMP_DIR="/tmp/cbkny-theme-$(date +%s)"
mkdir -p "$TEMP_DIR"

# Copy theme files to temp directory
echo "📁 Copying theme files..."
cp -r /Users/dough/Documents/GitHub/CBK/cbkny-theme/* "$TEMP_DIR/"

# Remove unwanted files
echo "🧹 Cleaning up files..."
find "$TEMP_DIR" -name ".DS_Store" -delete
find "$TEMP_DIR" -name "*.log" -delete

# Create zip file
echo "🗜️  Creating zip file..."
cd /tmp
zip -r "cbkny-theme.zip" "cbkny-theme-$(date +%s | tail -c 8)"

# Move zip to desktop for easy access
mv cbkny-theme.zip ~/Desktop/

echo "✅ Theme package created!"
echo "📁 Zip file saved to: ~/Desktop/cbkny-theme.zip"
echo ""
echo "📋 Next steps:"
echo "1. Go to SiteGround File Manager"
echo "2. Navigate to: public_html/wp-content/themes/"
echo "3. Upload cbkny-theme.zip"
echo "4. Extract the zip file"
echo "5. Rename folder to 'cbkny-theme'"
echo "6. Set permissions to 755 for folders, 644 for files"
echo ""
echo "🌐 Then visit: https://johnd501.sg-host.com/wp-admin"

# Clean up temp directory
rm -rf "$TEMP_DIR"

echo "🧹 Cleanup complete!"
