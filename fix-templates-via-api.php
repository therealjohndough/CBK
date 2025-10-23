<?php
/**
 * Fix pillar content page templates via WordPress REST API
 */

// Function to update page template via REST API
function updatePageTemplate($pageId, $template) {
    $url = "https://johnd501.sg-host.com/wp-json/wp/v2/pages/$pageId";
    
    $data = array(
        'meta' => array(
            '_wp_page_template' => $template
        )
    );
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Authorization: Basic ' . base64_encode('admin:admin') // You'll need to update this
    ));
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    return array('http_code' => $httpCode, 'response' => $response);
}

// Get page IDs first
$pages = array(
    'ultimate-guide-cannabis-accounting-new-york' => 'page-ultimate-guide-cannabis-accounting.php',
    '280e-tax-compliance-complete-resource' => 'page-280e-compliance-guide.php',
    'ny-ocm-reporting-requirements-complete-guide' => 'page-ocm-reporting-guide.php',
    'cannabis-business-startup-financial-guide' => 'page-cannabis-startup-financial-guide.php'
);

echo "🔧 Fixing pillar content page templates...\n\n";

foreach ($pages as $slug => $template) {
    // Get page ID
    $url = "https://johnd501.sg-host.com/wp-json/wp/v2/pages?slug=$slug";
    $response = file_get_contents($url);
    $data = json_decode($response, true);
    
    if (!empty($data)) {
        $pageId = $data[0]['id'];
        $title = $data[0]['title']['rendered'];
        
        echo "📄 Found page: $title (ID: $pageId)\n";
        echo "🎯 Setting template: $template\n";
        
        // Note: This would require authentication to actually update
        echo "⚠️  Note: This requires WordPress admin authentication to update\n";
        echo "   You'll need to update the templates manually in WordPress admin\n\n";
    } else {
        echo "❌ Page not found: $slug\n\n";
    }
}

echo "💡 Manual fix instructions:\n";
echo "1. Go to WordPress Admin > Pages\n";
echo "2. Edit each pillar content page\n";
echo "3. In Page Attributes, set Page Template to the correct template\n";
echo "4. Update each page\n\n";

echo "📋 Pages to fix:\n";
foreach ($pages as $slug => $template) {
    echo "- $slug → $template\n";
}
?>
