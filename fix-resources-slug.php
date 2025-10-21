<?php
/**
 * Fix Resources Page Slug
 * This script fixes the typo in the resources page slug
 */

// WordPress configuration
define('WP_USE_THEMES', false);
require_once('wp-config.php');

echo "Fixing resources page slug...\n";

// Find the page with the wrong slug
$wrong_page = get_page_by_path('resouces');
$correct_page = get_page_by_path('resources');

if ($wrong_page && !$correct_page) {
    // Update the slug
    $updated = wp_update_post(array(
        'ID' => $wrong_page->ID,
        'post_name' => 'resources'
    ));
    
    if ($updated) {
        echo "✅ Fixed resources page slug from 'resouces' to 'resources'\n";
        echo "Page ID: {$wrong_page->ID}\n";
        echo "New URL: https://johnd501.sg-host.com/resources\n";
    } else {
        echo "❌ Failed to update page slug\n";
    }
} elseif ($correct_page) {
    echo "✅ Resources page already exists with correct slug\n";
} elseif ($wrong_page && $correct_page) {
    echo "⚠️  Both pages exist. You may need to delete the wrong one manually.\n";
} else {
    echo "❌ No resources page found. Creating new one...\n";
    
    // Create the page with correct slug
    $page_id = wp_insert_post(array(
        'post_title' => 'Resources',
        'post_name' => 'resources',
        'post_content' => '<!-- Content handled by page template -->',
        'post_status' => 'publish',
        'post_type' => 'page',
        'post_author' => 1,
        'meta_input' => array(
            '_wp_page_template' => 'page-resources.php'
        )
    ));
    
    if ($page_id) {
        echo "✅ Created resources page with correct slug (ID: $page_id)\n";
    } else {
        echo "❌ Failed to create resources page\n";
    }
}

echo "\nDone!\n";
?>
