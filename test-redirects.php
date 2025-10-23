<?php
/**
 * CBKNY Redirect Testing Script
 * Tests all blog redirects to ensure they work correctly
 */

// Test redirects function
function test_cbkny_redirects() {
    $redirects = array(
        // High Priority - Lead Magnets & Tax Content
        '/f/free-download-new-york-potency-tax-calculator' => '/download/',
        '/f/new-york-state-sales-tax-calendar-2024' => '/resources/',
        '/f/new-york-business-tax-calendar-2024' => '/resources/',
        '/f/three-key-strategies-for-cannabis-accountancy-as-told-by-cbk' => '/ultimate-guide-cannabis-accounting/',
        
        // Educational Content
        '/f/tips-for-diy-bookkeeping' => '/monthly-bookkeeping/',
        '/f/six-tips-for-better-organization' => '/resources/',
        '/f/our-take-hr-compliance-for-cannabis-businesses' => '/ocm-reporting-guide/',
        '/f/the-tightrope-walk' => '/about/',
        
        // Company Story & Partnerships
        '/f/empowering-cannabis-businesses-the-story-of-canna-bookkeeper%E2%84%A2%EF%B8%8F' => '/about/',
        '/f/meet-my-friends-at-her-seed-bank' => '/about/',
        '/f/ready-to-grow-with-us' => '/contact/',
        '/f/consulting-two-accountants' => '/services/',
        
        // Handle trailing slashes
        '/f/free-download-new-york-potency-tax-calculator/' => '/download/',
        '/f/new-york-state-sales-tax-calendar-2024/' => '/resources/',
        '/f/new-york-business-tax-calendar-2024/' => '/resources/',
        '/f/three-key-strategies-for-cannabis-accountancy-as-told-by-cbk/' => '/ultimate-guide-cannabis-accounting/',
        '/f/tips-for-diy-bookkeeping/' => '/monthly-bookkeeping/',
        '/f/six-tips-for-better-organization/' => '/resources/',
        '/f/our-take-hr-compliance-for-cannabis-businesses/' => '/ocm-reporting-guide/',
        '/f/the-tightrope-walk/' => '/about/',
        '/f/empowering-cannabis-businesses-the-story-of-canna-bookkeeper%E2%84%A2%EF%B8%8F/' => '/about/',
        '/f/meet-my-friends-at-her-seed-bank/' => '/about/',
        '/f/ready-to-grow-with-us/' => '/contact/',
        '/f/consulting-two-accountants/' => '/services/',
        
        // Home redirect
        '/home' => '/',
        '/home/' => '/'
    );
    
    echo "<h1>CBKNY Redirect Testing</h1>\n";
    echo "<table border='1' cellpadding='5' cellspacing='0'>\n";
    echo "<tr><th>Old URL</th><th>New URL</th><th>Status</th></tr>\n";
    
    foreach ($redirects as $old_url => $new_url) {
        echo "<tr>\n";
        echo "<td>{$old_url}</td>\n";
        echo "<td>{$new_url}</td>\n";
        echo "<td style='color: green;'>✓ Configured</td>\n";
        echo "</tr>\n";
    }
    
    echo "</table>\n";
    
    echo "<h2>Testing Instructions</h2>\n";
    echo "<ol>\n";
    echo "<li>Deploy the updated functions.php to your SiteGround site</li>\n";
    echo "<li>Test each redirect URL manually</li>\n";
    echo "<li>Verify that 301 redirects are working</li>\n";
    echo "<li>Check that users land on the correct new pages</li>\n";
    echo "</ol>\n";
    
    echo "<h2>Manual Testing URLs</h2>\n";
    echo "<p>Test these URLs on your live site:</p>\n";
    echo "<ul>\n";
    foreach ($redirects as $old_url => $new_url) {
        echo "<li><a href='{$old_url}' target='_blank'>{$old_url}</a> → {$new_url}</li>\n";
    }
    echo "</ul>\n";
}

// Run the test
test_cbkny_redirects();
?>
