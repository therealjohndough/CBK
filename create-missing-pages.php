<?php
// Simple script to create missing service pages
require_once('cbkny-theme/functions.php');

// Create missing service pages
$pages = array(
    array(
        'title' => 'Monthly Bookkeeping',
        'slug' => 'monthly-bookkeeping',
        'template' => 'page-monthly-bookkeeping.php'
    ),
    array(
        'title' => 'Clean Up / Catch Up',
        'slug' => 'cleanup-catchup',
        'template' => 'page-cleanup-catchup.php'
    ),
    array(
        'title' => 'Chief Compliance Officer',
        'slug' => 'chief-compliance-officer',
        'template' => 'page-chief-compliance-officer.php'
    )
);

foreach ($pages as $page) {
    // Check if page already exists
    $existing_page = get_page_by_path($page['slug']);
    
    if (!$existing_page) {
        $page_id = wp_insert_post(array(
            'post_title' => $page['title'],
            'post_name' => $page['slug'],
            'post_content' => '<!-- Content handled by page template -->',
            'post_status' => 'publish',
            'post_type' => 'page',
            'post_author' => 1,
            'meta_input' => array(
                '_wp_page_template' => $page['template']
            )
        ));
        
        if ($page_id) {
            echo "Created page: {$page['title']} (ID: $page_id)\n";
        } else {
            echo "Failed to create page: {$page['title']}\n";
        }
    } else {
        echo "Page already exists: {$page['title']}\n";
    }
}

echo "Service pages creation complete!\n";
?>
