<?php
if (!defined('ABSPATH')) exit;

/**
 * Blog Functions for SEO Content Strategy
 */

// Create blog categories for content organization
function cbkny_create_blog_categories() {
    $categories = array(
        'cannabis-accounting' => 'Cannabis Accounting',
        '280e-compliance' => '280E Compliance',
        'ocm-reporting' => 'OCM Reporting',
        'tax-strategies' => 'Tax Strategies',
        'industry-news' => 'Industry News',
        'compliance-tips' => 'Compliance Tips'
    );
    
    foreach ($categories as $slug => $name) {
        if (!term_exists($slug, 'category')) {
            wp_insert_term($name, 'category', array('slug' => $slug));
        }
    }
}
add_action('after_switch_theme', 'cbkny_create_blog_categories');

// Create sample blog posts for SEO content
function cbkny_create_sample_blog_posts() {
    $posts = array(
        array(
            'title' => 'Ultimate Guide to Cannabis Accounting in New York',
            'slug' => 'ultimate-guide-cannabis-accounting-new-york',
            'content' => 'Comprehensive guide covering all aspects of cannabis accounting in New York, including 280E compliance, OCM reporting requirements, and best practices for dispensaries, cultivators, and processors.',
            'category' => 'cannabis-accounting',
            'excerpt' => 'Everything you need to know about cannabis accounting in New York, from 280E compliance to OCM reporting requirements.'
        ),
        array(
            'title' => '280E Tax Compliance: Complete Resource for Cannabis Businesses',
            'slug' => '280e-tax-compliance-complete-resource',
            'content' => 'Detailed explanation of 280E tax code and how it affects cannabis businesses, including strategies for maximizing deductions and staying compliant.',
            'category' => '280e-compliance',
            'excerpt' => 'Master 280E compliance with our comprehensive guide covering deductions, record-keeping, and audit preparation.'
        ),
        array(
            'title' => 'NY OCM Reporting Requirements: What Cannabis Businesses Need to Know',
            'slug' => 'ny-ocm-reporting-requirements-cannabis-businesses',
            'content' => 'Complete breakdown of New York Office of Cannabis Management reporting requirements, deadlines, and compliance strategies.',
            'category' => 'ocm-reporting',
            'excerpt' => 'Stay compliant with NY OCM reporting requirements. Learn about deadlines, documentation, and best practices.'
        ),
        array(
            'title' => 'Cannabis Business Startup Financial Guide',
            'slug' => 'cannabis-business-startup-financial-guide',
            'content' => 'Essential financial planning guide for new cannabis businesses, covering startup costs, funding options, and financial management.',
            'category' => 'tax-strategies',
            'excerpt' => 'Plan your cannabis business finances from day one with our comprehensive startup financial guide.'
        )
    );
    
    foreach ($posts as $post_data) {
        // Check if post already exists
        $existing_post = get_page_by_path($post_data['slug'], OBJECT, 'post');
        
        if (!$existing_post) {
            $category = get_term_by('slug', $post_data['category'], 'category');
            $category_id = $category ? $category->term_id : 1;
            
            $post_id = wp_insert_post(array(
                'post_title' => $post_data['title'],
                'post_name' => $post_data['slug'],
                'post_content' => $post_data['content'],
                'post_excerpt' => $post_data['excerpt'],
                'post_status' => 'publish',
                'post_type' => 'post',
                'post_author' => 1,
                'post_category' => array($category_id)
            ));
            
            if ($post_id) {
                // Add SEO meta fields
                update_post_meta($post_id, '_cbkny_meta_description', $post_data['excerpt']);
                update_post_meta($post_id, '_cbkny_meta_keywords', 'cannabis accounting, ' . $post_data['category'] . ', new york, 280e compliance');
            }
        }
    }
}
add_action('after_switch_theme', 'cbkny_create_sample_blog_posts');

// Add blog post meta fields
function cbkny_add_blog_meta_boxes() {
    add_meta_box(
        'cbkny_seo_meta',
        'SEO Settings',
        'cbkny_seo_meta_box_callback',
        'post',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'cbkny_add_blog_meta_boxes');

function cbkny_seo_meta_box_callback($post) {
    wp_nonce_field('cbkny_seo_meta_box', 'cbkny_seo_meta_box_nonce');
    
    $meta_description = get_post_meta($post->ID, '_cbkny_meta_description', true);
    $meta_keywords = get_post_meta($post->ID, '_cbkny_meta_keywords', true);
    $seo_title = get_post_meta($post->ID, '_cbkny_seo_title', true);
    
    echo '<table class="form-table">';
    echo '<tr>';
    echo '<th><label for="cbkny_seo_title">SEO Title</label></th>';
    echo '<td><input type="text" id="cbkny_seo_title" name="cbkny_seo_title" value="' . esc_attr($seo_title) . '" style="width: 100%;" /></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="cbkny_meta_description">Meta Description</label></th>';
    echo '<td><textarea id="cbkny_meta_description" name="cbkny_meta_description" rows="3" style="width: 100%;">' . esc_textarea($meta_description) . '</textarea></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="cbkny_meta_keywords">Meta Keywords</label></th>';
    echo '<td><input type="text" id="cbkny_meta_keywords" name="cbkny_meta_keywords" value="' . esc_attr($meta_keywords) . '" style="width: 100%;" /></td>';
    echo '</tr>';
    echo '</table>';
}

function cbkny_save_blog_meta($post_id) {
    if (!isset($_POST['cbkny_seo_meta_box_nonce'])) return;
    if (!wp_verify_nonce($_POST['cbkny_seo_meta_box_nonce'], 'cbkny_seo_meta_box')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;
    
    if (isset($_POST['cbkny_seo_title'])) {
        update_post_meta($post_id, '_cbkny_seo_title', sanitize_text_field($_POST['cbkny_seo_title']));
    }
    if (isset($_POST['cbkny_meta_description'])) {
        update_post_meta($post_id, '_cbkny_meta_description', sanitize_textarea_field($_POST['cbkny_meta_description']));
    }
    if (isset($_POST['cbkny_meta_keywords'])) {
        update_post_meta($post_id, '_cbkny_meta_keywords', sanitize_text_field($_POST['cbkny_meta_keywords']));
    }
}
add_action('save_post', 'cbkny_save_blog_meta');

// Blog archive template
function cbkny_blog_archive_template($template) {
    if (is_home() || is_category() || is_tag()) {
        $new_template = locate_template('blog-archive.php');
        if (!empty($new_template)) {
            return $new_template;
        }
    }
    return $template;
}
add_filter('template_include', 'cbkny_blog_archive_template');

// Single blog post template
function cbkny_single_post_template($template) {
    if (is_single() && get_post_type() === 'post') {
        $new_template = locate_template('single-blog.php');
        if (!empty($new_template)) {
            return $new_template;
        }
    }
    return $template;
}
add_filter('template_include', 'cbkny_single_post_template');

// Add blog navigation to main menu
function cbkny_add_blog_to_menu($items, $args) {
    if ($args->theme_location === 'primary') {
        $blog_link = '<li><a href="' . get_permalink(get_option('page_for_posts')) . '">Blog</a></li>';
        $items .= $blog_link;
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'cbkny_add_blog_to_menu', 10, 2);

// Calculate reading time
function reading_time() {
    $content = get_post_field('post_content', get_the_ID());
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200); // Average reading speed: 200 words per minute
    return $reading_time;
}
