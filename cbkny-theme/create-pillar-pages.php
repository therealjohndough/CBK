<?php
/**
 * Manual script to create pillar content pages
 * Run this script to create the SEO pillar content pages
 */

// Include WordPress
require_once('../../../wp-config.php');

// Create pillar content pages
function create_pillar_pages() {
    $pages = array(
        array(
            'title' => 'Ultimate Guide to Cannabis Accounting in New York',
            'slug' => 'ultimate-guide-cannabis-accounting-new-york',
            'template' => 'page-ultimate-guide-cannabis-accounting.php',
            'meta_description' => 'Complete guide to cannabis accounting in New York. Learn about 280E compliance, OCM reporting, and audit preparation for dispensaries, cultivators, and processors.',
            'meta_keywords' => 'cannabis accounting new york, cannabis bookkeeping guide, 280e compliance, ocm reporting'
        ),
        array(
            'title' => '280E Tax Compliance: Complete Resource for Cannabis Businesses',
            'slug' => '280e-tax-compliance-complete-resource',
            'template' => 'page-280e-compliance-guide.php',
            'meta_description' => 'Master 280E compliance with our comprehensive guide covering deductions, record-keeping, and audit preparation for cannabis businesses.',
            'meta_keywords' => '280e compliance, cannabis tax compliance, 280e deductions, cannabis tax planning'
        ),
        array(
            'title' => 'NY OCM Reporting Requirements: Complete Guide',
            'slug' => 'ny-ocm-reporting-requirements-complete-guide',
            'template' => 'page-ocm-reporting-guide.php',
            'meta_description' => 'Stay compliant with New York Office of Cannabis Management reporting requirements, deadlines, and best practices for cannabis businesses.',
            'meta_keywords' => 'ocm reporting ny, ny cannabis reporting, ocm compliance, cannabis regulatory compliance'
        ),
        array(
            'title' => 'Cannabis Business Startup Financial Guide',
            'slug' => 'cannabis-business-startup-financial-guide',
            'template' => 'page-cannabis-startup-financial-guide.php',
            'meta_description' => 'Plan your cannabis business finances from day one with our comprehensive startup financial guide covering costs, funding, and planning.',
            'meta_keywords' => 'cannabis business startup, cannabis business planning, cannabis funding, cannabis financial planning'
        )
    );
    
    $created_count = 0;
    
    foreach ($pages as $page_data) {
        // Check if page already exists
        $existing_page = get_page_by_path($page_data['slug']);
        
        if (!$existing_page) {
            $page_id = wp_insert_post(array(
                'post_title' => $page_data['title'],
                'post_name' => $page_data['slug'],
                'post_content' => '<!-- Content handled by page template -->',
                'post_status' => 'publish',
                'post_type' => 'page',
                'post_author' => 1,
                'meta_input' => array(
                    '_wp_page_template' => $page_data['template'],
                    '_cbkny_meta_description' => $page_data['meta_description'],
                    '_cbkny_meta_keywords' => $page_data['meta_keywords']
                )
            ));
            
            if ($page_id) {
                echo "✅ Created: {$page_data['title']} (ID: $page_id)\n";
                $created_count++;
            } else {
                echo "❌ Failed to create: {$page_data['title']}\n";
            }
        } else {
            echo "⚠️  Already exists: {$page_data['title']} (ID: {$existing_page->ID})\n";
        }
    }
    
    echo "\n📊 Summary: $created_count new pages created\n";
    echo "🌐 Check your site: https://johnd501.sg-host.com/\n";
}

// Run the function
create_pillar_pages();
?>
