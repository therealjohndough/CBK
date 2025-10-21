#!/bin/bash

# Upload Resource Files Script
# This script uploads the actual PDF and Excel files to the server

echo "📁 Uploading resource files to SiteGround..."

# Server details
SSH_HOST="johnd501.sg-host.com"
SSH_PORT="18765"
SSH_USER="johnd501"
REMOTE_PATH="public_html/wp-content/themes/cbkny-theme/assets/downloads/"

# Create directories if they don't exist
echo "📂 Creating remote directories..."
ssh -p $SSH_PORT -i ~/.ssh/cbkny_siteground $SSH_USER@$SSH_HOST "mkdir -p $REMOTE_PATH/pdfs $REMOTE_PATH/templates"

# Upload PDF files
echo "📄 Uploading PDF files..."
scp -P $SSH_PORT -i ~/.ssh/cbkny_siteground \
    cbkny-theme/assets/downloads/pdfs/*.pdf \
    $SSH_USER@$SSH_HOST:$REMOTE_PATH/pdfs/

# Upload Excel files (if they exist)
echo "📊 Uploading Excel files..."
if [ -d "cbkny-theme/assets/downloads/templates" ]; then
    scp -P $SSH_PORT -i ~/.ssh/cbkny_siteground \
        cbkny-theme/assets/downloads/templates/*.xlsx \
        $SSH_USER@$SSH_HOST:$REMOTE_PATH/templates/ 2>/dev/null || echo "No Excel files to upload"
fi

# Upload HTML files (for reference)
echo "🌐 Uploading HTML files..."
scp -P $SSH_PORT -i ~/.ssh/cbkny_siteground \
    cbkny-theme/assets/downloads/pdfs/*.html \
    $SSH_USER@$SSH_HOST:$REMOTE_PATH/pdfs/

scp -P $SSH_PORT -i ~/.ssh/cbkny_siteground \
    cbkny-theme/assets/downloads/templates/*.html \
    $SSH_USER@$SSH_HOST:$REMOTE_PATH/templates/

echo "✅ Resource files uploaded successfully!"
echo "🌐 Files are now available at: https://johnd501.sg-host.com/wp-content/themes/cbkny-theme/assets/downloads/"
