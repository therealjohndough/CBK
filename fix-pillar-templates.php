<?php
/**
 * Fix pillar content page templates
 * This script will update the page templates for the pillar content pages
 */

// Include WordPress
require_once('../../../wp-config.php');

// Function to fix pillar content page templates
function fix_pillar_content_templates() {
    $pages_to_fix = array(
        'ultimate-guide-cannabis-accounting-new-york' => 'page-ultimate-guide-cannabis-accounting.php',
        '280e-tax-compliance-complete-resource' => 'page-280e-compliance-guide.php',
        'ny-ocm-reporting-requirements-complete-guide' => 'page-ocm-reporting-guide.php',
        'cannabis-business-startup-financial-guide' => 'page-cannabis-startup-financial-guide.php'
    );
    
    $fixed_count = 0;
    
    foreach ($pages_to_fix as $slug => $template) {
        // Get the page
        $page = get_page_by_path($slug);
        
        if ($page) {
            // Update the page template
            $updated = update_post_meta($page->ID, '_wp_page_template', $template);
            
            if ($updated) {
                echo "✅ Fixed template for: {$page->post_title} (ID: {$page->ID})\n";
                echo "   Template: $template\n";
                $fixed_count++;
            } else {
                echo "❌ Failed to update template for: {$page->post_title}\n";
            }
        } else {
            echo "⚠️  Page not found: $slug\n";
        }
    }
    
    echo "\n📊 Summary: $fixed_count pages fixed\n";
    echo "🌐 Check your site: https://johnd501.sg-host.com/\n";
}

// Run the function
fix_pillar_content_templates();
?>
