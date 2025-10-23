<?php
/**
 * Fix page templates for pillar content pages
 * Add this to functions.php or run as a one-time script
 */

// Function to fix page templates
function cbkny_fix_pillar_templates() {
    $pages_to_fix = array(
        350 => 'page-ultimate-guide-cannabis-accounting.php', // Ultimate Guide
        351 => 'page-280e-compliance-guide.php', // 280E Compliance
        352 => 'page-ocm-reporting-guide.php', // OCM Reporting
        362 => 'page-cannabis-startup-financial-guide.php' // Startup Guide
    );
    
    $fixed_count = 0;
    
    foreach ($pages_to_fix as $page_id => $template) {
        $updated = update_post_meta($page_id, '_wp_page_template', $template);
        
        if ($updated) {
            $page = get_post($page_id);
            echo "✅ Fixed template for: {$page->post_title} (ID: $page_id)\n";
            echo "   Template: $template\n";
            $fixed_count++;
        } else {
            echo "❌ Failed to update template for page ID: $page_id\n";
        }
    }
    
    return $fixed_count;
}

// Add admin menu for fixing templates
function cbkny_add_fix_templates_menu() {
    add_management_page(
        'Fix Page Templates',
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
        $fixed_count = cbkny_fix_pillar_templates();
        echo '<div class="notice notice-success"><p>Fixed ' . $fixed_count . ' page templates successfully!</p></div>';
    }
    
    echo '<div class="wrap">';
    echo '<h1>Fix Page Templates</h1>';
    echo '<p>This will assign the correct page templates to your pillar content pages.</p>';
    echo '<p><strong>Pages to be fixed:</strong></p>';
    echo '<ul>';
    echo '<li>Ultimate Guide to Cannabis Accounting in New York → Ultimate Guide Cannabis Accounting</li>';
    echo '<li>280E Tax Compliance: Complete Resource → 280E Compliance Guide</li>';
    echo '<li>NY OCM Reporting Requirements: Complete Guide → OCM Reporting Guide</li>';
    echo '<li>Cannabis Business Startup Financial Guide → Cannabis Startup Financial Guide</li>';
    echo '</ul>';
    echo '<form method="post">';
    echo '<input type="submit" name="fix_templates" class="button button-primary" value="Fix Page Templates">';
    echo '</form>';
    echo '</div>';
}

// Auto-fix on theme activation
add_action('after_switch_theme', function() {
    cbkny_fix_pillar_templates();
});
?>
