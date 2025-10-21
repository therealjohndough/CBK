<?php
/**
 * Create Download Pages Script
 * This script creates the actual WordPress pages for downloads
 */

// WordPress database connection details
$host = 'localhost';
$dbname = 'wp_johnd501';
$username = 'wp_johnd501';
$password = 'your_password_here'; // You'll need to update this

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Connected to WordPress database successfully!\n";
    
    // Create download pages
    $pages = array(
        array(
            'title' => 'NY Cannabis Tax Compliance Checklist',
            'slug' => 'ny-cannabis-compliance-checklist',
            'content' => '<!-- Download form will be handled by page template -->',
            'template' => 'page-ny-cannabis-compliance-checklist.php'
        ),
        array(
            'title' => '280E Deduction Guide',
            'slug' => '280e-deduction-guide',
            'content' => '<!-- Download form will be handled by page template -->',
            'template' => 'page-280e-deduction-guide.php'
        ),
        array(
            'title' => 'Audit Readiness Quiz',
            'slug' => 'audit-readiness-quiz',
            'content' => '<!-- Quiz will be handled by page template -->',
            'template' => 'page-audit-readiness-quiz.php'
        ),
        array(
            'title' => '280E Tax Calculator',
            'slug' => '280e-tax-calculator',
            'content' => '<!-- Calculator will be handled by page template -->',
            'template' => 'page-280e-tax-calculator.php'
        )
    );
    
    foreach ($pages as $page) {
        // Check if page already exists
        $stmt = $pdo->prepare("SELECT ID FROM wp_posts WHERE post_name = ? AND post_type = 'page'");
        $stmt->execute([$page['slug']]);
        
        if ($stmt->rowCount() > 0) {
            echo "Page '{$page['title']}' already exists.\n";
            continue;
        }
        
        // Create the page
        $stmt = $pdo->prepare("
            INSERT INTO wp_posts (post_title, post_name, post_content, post_status, post_type, post_author, post_date, post_date_gmt, post_modified, post_modified_gmt, comment_status, ping_status, post_parent, menu_order, post_mime_type, comment_count, page_template)
            VALUES (?, ?, ?, 'publish', 'page', 1, NOW(), NOW(), NOW(), NOW(), 'closed', 'closed', 0, 0, '', 0, ?)
        ");
        
        $stmt->execute([
            $page['title'],
            $page['slug'],
            $page['content'],
            $page['template']
        ]);
        
        $page_id = $pdo->lastInsertId();
        
        // Update post meta for template
        $stmt = $pdo->prepare("
            INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
            VALUES (?, '_wp_page_template', ?)
        ");
        $stmt->execute([$page_id, $page['template']]);
        
        echo "Created page '{$page['title']}' with ID: $page_id\n";
    }
    
    echo "All download pages created successfully!\n";
    
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage() . "\n";
    echo "Please update the database credentials in this script.\n";
}
?>
