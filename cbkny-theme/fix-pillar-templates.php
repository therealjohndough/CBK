<?php
/**
 * Fix pillar content page templates
 * Add this to functions.php or run as a one-time script
 */

// Function to fix pillar content page templates
function cbkny_fix_pillar_content_templates() {
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
    
    return $fixed_count;
}

// Add admin menu for fixing templates
function cbkny_add_fix_templates_menu() {
    add_management_page(
        'Fix Pillar Content Templates',
        'Fix Templates',
        'manage_options',
        'cbkny-fix-templates',
        'cbkny_fix_templates_admin_page'
    );
}
add_action('admin_menu', 'cbkny_add_fix_templates_menu');

// Admin page for fixing templates
function cbkny_fix_templates_admin_page() {
    if (isset($_POST['fix_templates'])) {
        $fixed_count = cbkny_fix_pillar_content_templates();
        echo '<div class="notice notice-success"><p>Fixed ' . $fixed_count . ' page templates successfully!</p></div>';
    }
    
    echo '<div class="wrap">';
    echo '<h1>Fix Pillar Content Templates</h1>';
    echo '<p>This will fix the page templates for your pillar content pages so they display the full articles.</p>';
    echo '<p><strong>Pages to be fixed:</strong></p>';
    echo '<ul>';
    echo '<li><a href="/ultimate-guide-cannabis-accounting-new-york" target="_blank">Ultimate Guide to Cannabis Accounting in New York</a></li>';
    echo '<li><a href="/280e-tax-compliance-complete-resource" target="_blank">280E Tax Compliance: Complete Resource</a></li>';
    echo '<li><a href="/ny-ocm-reporting-requirements-complete-guide" target="_blank">NY OCM Reporting Requirements: Complete Guide</a></li>';
    echo '<li><a href="/cannabis-business-startup-financial-guide" target="_blank">Cannabis Business Startup Financial Guide</a></li>';
    echo '</ul>';
    echo '<form method="post">';
    echo '<input type="submit" name="fix_templates" class="button button-primary" value="Fix Page Templates">';
    echo '</form>';
    echo '</div>';
}

// Auto-fix on theme activation
add_action('after_switch_theme', function() {
    cbkny_fix_pillar_content_templates();
});
?>
