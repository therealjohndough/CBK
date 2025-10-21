<?php
/**
 * Simple script to create download pages
 * Run this once to create the pages
 */

// WordPress configuration
define('WP_USE_THEMES', false);
require_once('wp-config.php');

// Create download pages
$pages = array(
    array(
        'title' => 'NY Cannabis Tax Compliance Checklist',
        'slug' => 'ny-cannabis-compliance-checklist',
        'content' => '<!-- Content handled by page template -->',
        'template' => 'page-ny-cannabis-compliance-checklist.php'
    ),
    array(
        'title' => '280E Deduction Guide',
        'slug' => '280e-deduction-guide',
        'content' => '<!-- Content handled by page template -->',
        'template' => 'page-280e-deduction-guide.php'
    ),
    array(
        'title' => 'Audit Readiness Quiz',
        'slug' => 'audit-readiness-quiz',
        'content' => '<!-- Content handled by page template -->',
        'template' => 'page-audit-readiness-quiz.php'
    ),
    array(
        'title' => '280E Tax Calculator',
        'slug' => '280e-tax-calculator',
        'content' => '<!-- Content handled by page template -->',
        'template' => 'page-280e-tax-calculator.php'
    )
);

echo "Creating download pages...\n";

foreach ($pages as $page) {
    // Check if page already exists
    $existing_page = get_page_by_path($page['slug']);
    
    if (!$existing_page) {
        $page_id = wp_insert_post(array(
            'post_title' => $page['title'],
            'post_name' => $page['slug'],
            'post_content' => $page['content'],
            'post_status' => 'publish',
            'post_type' => 'page',
            'post_author' => 1,
            'meta_input' => array(
                '_wp_page_template' => $page['template']
            )
        ));
        
        if ($page_id) {
            echo "✅ Created page: {$page['title']} (ID: $page_id)\n";
        } else {
            echo "❌ Failed to create page: {$page['title']}\n";
        }
    } else {
        echo "⚠️  Page already exists: {$page['title']} (ID: {$existing_page->ID})\n";
    }
}

echo "\nAll pages created! You can now access:\n";
echo "- https://johnd501.sg-host.com/ny-cannabis-compliance-checklist\n";
echo "- https://johnd501.sg-host.com/280e-deduction-guide\n";
echo "- https://johnd501.sg-host.com/audit-readiness-quiz\n";
echo "- https://johnd501.sg-host.com/280e-tax-calculator\n";
?>
