<?php
/**
 * File Manager System
 * Handles downloadable resources and file management
 */

// Create downloads directory on theme activation
function cbkny_create_downloads_directory() {
    $upload_dir = wp_upload_dir();
    $downloads_dir = $upload_dir['basedir'] . '/cbkny-downloads';
    
    if (!file_exists($downloads_dir)) {
        wp_mkdir_p($downloads_dir);
        wp_mkdir_p($downloads_dir . '/pdfs');
        wp_mkdir_p($downloads_dir . '/templates');
        
        // Create .htaccess for security
        $htaccess_content = "Options -Indexes\n";
        $htaccess_content .= "RewriteEngine On\n";
        $htaccess_content .= "RewriteCond %{HTTP_REFERER} !^https?://" . $_SERVER['HTTP_HOST'] . " [NC]\n";
        $htaccess_content .= "RewriteRule \\.(pdf|xlsx|xls)$ - [F]\n";
        file_put_contents($downloads_dir . '/.htaccess', $htaccess_content);
    }
}
add_action('after_switch_theme', 'cbkny_create_downloads_directory');

// File download handler
function cbkny_handle_file_download() {
    if (isset($_GET['cbkny_download']) && isset($_GET['file'])) {
        $file_id = sanitize_text_field($_GET['file']);
        $downloads = cbkny_get_downloadable_files();
        
        if (isset($downloads[$file_id])) {
            $file_info = $downloads[$file_id];
            $upload_dir = wp_upload_dir();
            $file_path = $upload_dir['basedir'] . '/cbkny-downloads/' . $file_info['path'];
            
            if (file_exists($file_path)) {
                // Track download
                cbkny_track_download($file_id, $file_info);
                
                // Set headers for download
                header('Content-Type: ' . $file_info['mime_type']);
                header('Content-Disposition: attachment; filename="' . $file_info['filename'] . '"');
                header('Content-Length: ' . filesize($file_path));
                header('Cache-Control: no-cache, must-revalidate');
                header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
                
                // Output file
                readfile($file_path);
                exit;
            }
        }
        
        // File not found
        wp_die('File not found.', 'Download Error', array('response' => 404));
    }
}
add_action('init', 'cbkny_handle_file_download');

// Get all downloadable files
function cbkny_get_downloadable_files() {
    return array(
        'compliance-checklist' => array(
            'title' => 'NY Cannabis Tax Compliance Checklist',
            'filename' => 'NY-Cannabis-Tax-Compliance-Checklist.pdf',
            'path' => 'pdfs/NY-Cannabis-Tax-Compliance-Checklist.pdf',
            'mime_type' => 'application/pdf',
            'size' => '2.1 MB',
            'description' => 'Complete 8-page checklist for OCM and 280E compliance'
        ),
        '280e-guide' => array(
            'title' => '280E Deduction Guide',
            'filename' => '280E-Deduction-Guide-for-Cannabis-Businesses.pdf',
            'path' => 'pdfs/280E-Deduction-Guide-for-Cannabis-Businesses.pdf',
            'mime_type' => 'application/pdf',
            'size' => '1.8 MB',
            'description' => 'Comprehensive guide to maximizing deductions under 280E'
        ),
        'cogs-tracker' => array(
            'title' => 'Cannabis COGS Tracking Template',
            'filename' => 'Cannabis-COGS-Tracking-Template.xlsx',
            'path' => 'templates/Cannabis-COGS-Tracking-Template.xlsx',
            'mime_type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'size' => '850 KB',
            'description' => 'Excel template for tracking Cost of Goods Sold'
        ),
        'budget-template' => array(
            'title' => 'Cannabis Business Budget Template',
            'filename' => 'Cannabis-Business-Budget-Template.xlsx',
            'path' => 'templates/Cannabis-Business-Budget-Template.xlsx',
            'mime_type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'size' => '1.2 MB',
            'description' => 'Comprehensive budget template for cannabis operations'
        )
    );
}

// Track download analytics
function cbkny_track_download($file_id, $file_info) {
    // Store download in database
    global $wpdb;
    
    $table_name = $wpdb->prefix . 'cbkny_downloads';
    
    // Create table if it doesn't exist
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        file_id varchar(50) NOT NULL,
        file_title varchar(255) NOT NULL,
        user_email varchar(255),
        user_ip varchar(45) NOT NULL,
        user_agent text,
        referrer varchar(255),
        download_date datetime DEFAULT CURRENT_TIMESTAMP,
        source_page varchar(255),
        utm_source varchar(100),
        utm_medium varchar(100),
        utm_campaign varchar(100),
        PRIMARY KEY (id),
        KEY file_id (file_id),
        KEY download_date (download_date),
        KEY user_email (user_email)
    ) $charset_collate;";
    
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
    
    // Get tracking parameters
    $utm_source = isset($_GET['utm_source']) ? sanitize_text_field($_GET['utm_source']) : '';
    $utm_medium = isset($_GET['utm_medium']) ? sanitize_text_field($_GET['utm_medium']) : '';
    $utm_campaign = isset($_GET['utm_campaign']) ? sanitize_text_field($_GET['utm_campaign']) : '';
    $source_page = isset($_GET['source_page']) ? sanitize_text_field($_GET['source_page']) : '';
    $user_email = isset($_GET['email']) ? sanitize_email($_GET['email']) : '';
    
    // Insert download record
    $wpdb->insert(
        $table_name,
        array(
            'file_id' => $file_id,
            'file_title' => $file_info['title'],
            'user_email' => $user_email,
            'user_ip' => $_SERVER['REMOTE_ADDR'],
            'user_agent' => $_SERVER['HTTP_USER_AGENT'],
            'referrer' => $_SERVER['HTTP_REFERER'] ?? '',
            'source_page' => $source_page,
            'utm_source' => $utm_source,
            'utm_medium' => $utm_medium,
            'utm_campaign' => $utm_campaign
        )
    );
    
    // Track in Google Analytics if available
    if (function_exists('gtag')) {
        wp_enqueue_script('gtag-download', '', array(), '', true);
        wp_add_inline_script('gtag-download', "
            if (typeof gtag !== 'undefined') {
                gtag('event', 'download', {
                    'event_category': 'lead_magnet',
                    'event_label': '" . esc_js($file_info['title']) . "',
                    'value': 1
                });
            }
        ");
    }
}

// Generate download URL
function cbkny_get_download_url($file_id) {
    return add_query_arg(array(
        'cbkny_download' => '1',
        'file' => $file_id
    ), home_url());
}

// Check if file exists
function cbkny_file_exists($file_id) {
    $downloads = cbkny_get_downloadable_files();
    if (!isset($downloads[$file_id])) {
        return false;
    }
    
    $file_info = $downloads[$file_id];
    $upload_dir = wp_upload_dir();
    $file_path = $upload_dir['basedir'] . '/cbkny-downloads/' . $file_info['path'];
    
    return file_exists($file_path);
}

// Admin page for file management
function cbkny_add_file_manager_page() {
    add_theme_page(
        'CBKNY File Manager',
        'File Manager',
        'manage_options',
        'cbkny-file-manager',
        'cbkny_file_manager_page'
    );
}
add_action('admin_menu', 'cbkny_add_file_manager_page');

function cbkny_file_manager_page() {
    $downloads = cbkny_get_downloadable_files();
    $upload_dir = wp_upload_dir();
    
    // Get download statistics
    global $wpdb;
    $table_name = $wpdb->prefix . 'cbkny_downloads';
    $stats = $wpdb->get_results("
        SELECT 
            file_id,
            file_title,
            COUNT(*) as download_count,
            COUNT(DISTINCT user_email) as unique_emails,
            COUNT(DISTINCT user_ip) as unique_visitors,
            MAX(download_date) as last_download
        FROM $table_name 
        GROUP BY file_id, file_title 
        ORDER BY download_count DESC
    ");
    
    $total_downloads = $wpdb->get_var("SELECT COUNT(*) FROM $table_name");
    $unique_emails = $wpdb->get_var("SELECT COUNT(DISTINCT user_email) FROM $table_name WHERE user_email != ''");
    
    ?>
    <div class="wrap">
        <h1>CBKNY File Manager & Analytics</h1>
        
        <!-- Statistics Overview -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin: 2rem 0;">
            <div style="background: #fff; padding: 1rem; border: 1px solid #ddd; border-radius: 4px; text-align: center;">
                <h3 style="margin: 0; color: #d63384;"><?php echo number_format($total_downloads); ?></h3>
                <p style="margin: 0;">Total Downloads</p>
            </div>
            <div style="background: #fff; padding: 1rem; border: 1px solid #ddd; border-radius: 4px; text-align: center;">
                <h3 style="margin: 0; color: #d63384;"><?php echo number_format($unique_emails); ?></h3>
                <p style="margin: 0;">Email Captures</p>
            </div>
            <div style="background: #fff; padding: 1rem; border: 1px solid #ddd; border-radius: 4px; text-align: center;">
                <h3 style="margin: 0; color: #d63384;"><?php echo count($downloads); ?></h3>
                <p style="margin: 0;">Available Resources</p>
            </div>
            <div style="background: #fff; padding: 1rem; border: 1px solid #ddd; border-radius: 4px; text-align: center;">
                <h3 style="margin: 0; color: #d63384;"><?php echo $unique_emails > 0 ? round(($unique_emails / $total_downloads) * 100, 1) : 0; ?>%</h3>
                <p style="margin: 0;">Email Capture Rate</p>
            </div>
        </div>
        
        <!-- File Management -->
        <h2>File Management</h2>
        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th>File</th>
                    <th>Status</th>
                    <th>Downloads</th>
                    <th>Email Captures</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($downloads as $file_id => $file_info): ?>
                    <?php
                    $file_path = $upload_dir['basedir'] . '/cbkny-downloads/' . $file_info['path'];
                    $exists = file_exists($file_path);
                    
                    // Get stats for this file
                    $file_stats = array_filter($stats, function($stat) use ($file_id) {
                        return $stat->file_id === $file_id;
                    });
                    $file_stats = !empty($file_stats) ? array_values($file_stats)[0] : null;
                    ?>
                    <tr>
                        <td>
                            <strong><?php echo esc_html($file_info['title']); ?></strong><br>
                            <small><?php echo esc_html($file_info['description']); ?></small>
                        </td>
                        <td>
                            <?php if ($exists): ?>
                                <span style="color: green;">✓ Available</span><br>
                                <small><?php echo esc_html($file_info['size']); ?></small>
                            <?php else: ?>
                                <span style="color: red;">✗ Missing</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if ($file_stats): ?>
                                <strong><?php echo number_format($file_stats->download_count); ?></strong><br>
                                <small><?php echo $file_stats->last_download ? date('M j, Y', strtotime($file_stats->last_download)) : 'Never'; ?></small>
                            <?php else: ?>
                                <span style="color: #666;">0</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if ($file_stats): ?>
                                <strong><?php echo number_format($file_stats->unique_emails); ?></strong><br>
                                <small><?php echo $file_stats->download_count > 0 ? round(($file_stats->unique_emails / $file_stats->download_count) * 100, 1) . '%' : '0%'; ?> rate</small>
                            <?php else: ?>
                                <span style="color: #666;">0</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if ($exists): ?>
                                <a href="<?php echo esc_url(cbkny_get_download_url($file_id)); ?>" class="button">Download</a>
                                <a href="<?php echo esc_url(cbkny_get_download_url($file_id)); ?>&source_page=admin" class="button" target="_blank">Test</a>
                            <?php else: ?>
                                <span style="color: #666;">Upload file to: <code><?php echo esc_html($file_info['path']); ?></code></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <!-- Recent Downloads -->
        <h2>Recent Downloads</h2>
        <?php
        $recent_downloads = $wpdb->get_results("
            SELECT file_title, user_email, download_date, source_page, utm_source, utm_medium, utm_campaign
            FROM $table_name 
            ORDER BY download_date DESC 
            LIMIT 10
        ");
        ?>
        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th>File</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Source</th>
                    <th>Campaign</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($recent_downloads): ?>
                    <?php foreach ($recent_downloads as $download): ?>
                        <tr>
                            <td><?php echo esc_html($download->file_title); ?></td>
                            <td><?php echo esc_html($download->user_email ?: 'No email'); ?></td>
                            <td><?php echo date('M j, Y g:i A', strtotime($download->download_date)); ?></td>
                            <td>
                                <?php if ($download->utm_source): ?>
                                    <?php echo esc_html($download->utm_source); ?>
                                    <?php if ($download->utm_medium): ?>
                                        / <?php echo esc_html($download->utm_medium); ?>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php echo esc_html($download->source_page ?: 'Direct'); ?>
                                <?php endif; ?>
                            </td>
                            <td><?php echo esc_html($download->utm_campaign ?: '-'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" style="text-align: center; color: #666;">No downloads yet</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        
        <div style="margin-top: 2rem; padding: 1rem; background: #f1f1f1; border-radius: 4px;">
            <h3>Upload Instructions</h3>
            <p>Upload files to: <code><?php echo esc_html($upload_dir['basedir'] . '/cbkny-downloads/'); ?></code></p>
            <ul>
                <li>PDFs go in: <code>pdfs/</code> folder</li>
                <li>Excel files go in: <code>templates/</code> folder</li>
                <li>Use exact filenames as shown above</li>
            </ul>
        </div>
    </div>
    <?php
}

// Create placeholder files on theme activation
function cbkny_create_placeholder_files() {
    $upload_dir = wp_upload_dir();
    $downloads_dir = $upload_dir['basedir'] . '/cbkny-downloads';
    
    if (!file_exists($downloads_dir)) {
        cbkny_create_downloads_directory();
    }
    
    $downloads = cbkny_get_downloadable_files();
    
    foreach ($downloads as $file_id => $file_info) {
        $file_path = $downloads_dir . '/' . $file_info['path'];
        
        if (!file_exists($file_path)) {
            // Create directory if needed
            $file_dir = dirname($file_path);
            if (!file_exists($file_dir)) {
                wp_mkdir_p($file_dir);
            }
            
            // Create placeholder file
            $placeholder_content = cbkny_generate_placeholder_content($file_id, $file_info);
            file_put_contents($file_path, $placeholder_content);
        }
    }
}
add_action('after_switch_theme', 'cbkny_create_placeholder_files');

function cbkny_generate_placeholder_content($file_id, $file_info) {
    if (strpos($file_info['mime_type'], 'pdf') !== false) {
        return cbkny_generate_placeholder_pdf($file_id, $file_info);
    } elseif (strpos($file_info['mime_type'], 'excel') !== false || strpos($file_info['mime_type'], 'spreadsheet') !== false) {
        return cbkny_generate_placeholder_excel($file_id, $file_info);
    }
    
    return "Placeholder file for " . $file_info['title'];
}

function cbkny_generate_placeholder_pdf($file_id, $file_info) {
    // Simple PDF placeholder - in production, you'd use a proper PDF library
    return "%PDF-1.4\n1 0 obj\n<<\n/Type /Catalog\n/Pages 2 0 R\n>>\nendobj\n2 0 obj\n<<\n/Type /Pages\n/Kids [3 0 R]\n/Count 1\n>>\nendobj\n3 0 obj\n<<\n/Type /Page\n/Parent 2 0 R\n/MediaBox [0 0 612 792]\n/Contents 4 0 R\n>>\nendobj\n4 0 obj\n<<\n/Length 44\n>>\nstream\nBT\n/F1 12 Tf\n100 700 Td\n(Placeholder PDF) Tj\nET\nendstream\nendobj\nxref\n0 5\n0000000000 65535 f \n0000000009 00000 n \n0000000058 00000 n \n0000000115 00000 n \n0000000204 00000 n \ntrailer\n<<\n/Size 5\n/Root 1 0 R\n>>\nstartxref\n298\n%%EOF";
}

function cbkny_generate_placeholder_excel($file_id, $file_info) {
    // Simple Excel placeholder - in production, you'd use a proper Excel library
    return "PK\x03\x04\x14\x00\x00\x00\x08\x00\x00\x00\x00\x00Placeholder Excel file for " . $file_info['title'];
}

// AJAX handler for download requests
function cbkny_ajax_download() {
    // Verify nonce for security
    if (!wp_verify_nonce($_POST['nonce'], 'cbkny_download_nonce')) {
        wp_die('Security check failed');
    }
    
    $file_id = sanitize_text_field($_POST['file_id']);
    $email = sanitize_email($_POST['email']);
    $business = sanitize_text_field($_POST['business']);
    $consent = isset($_POST['consent']) ? true : false;
    
    if (!$file_id || !$email || !$consent) {
        wp_send_json_error('Missing required information');
        return;
    }
    
    $downloads = cbkny_get_downloadable_files();
    if (!isset($downloads[$file_id])) {
        wp_send_json_error('File not found');
        return;
    }
    
    $file_info = $downloads[$file_id];
    
    // Check if file exists
    if (!cbkny_file_exists($file_id)) {
        wp_send_json_error('File not available');
        return;
    }
    
    // Track the download
    cbkny_track_download($file_id, $file_info);
    
    // Store lead information
    cbkny_store_lead($email, $business, $file_id, $file_info['title']);
    
    // Generate download URL with tracking parameters
    $download_url = cbkny_get_download_url($file_id);
    $download_url = add_query_arg(array(
        'email' => $email,
        'utm_source' => sanitize_text_field($_POST['utm_source'] ?? ''),
        'utm_medium' => sanitize_text_field($_POST['utm_medium'] ?? ''),
        'utm_campaign' => sanitize_text_field($_POST['utm_campaign'] ?? ''),
        'source_page' => 'download_form'
    ), $download_url);
    
    wp_send_json_success(array(
        'download_url' => $download_url,
        'message' => 'Download ready!'
    ));
}
add_action('wp_ajax_cbkny_download', 'cbkny_ajax_download');
add_action('wp_ajax_nopriv_cbkny_download', 'cbkny_ajax_download');

// Store lead information
function cbkny_store_lead($email, $business, $file_id, $file_title) {
    global $wpdb;
    
    $table_name = $wpdb->prefix . 'cbkny_leads';
    
    // Create leads table if it doesn't exist
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        email varchar(255) NOT NULL,
        business_name varchar(255),
        file_id varchar(50),
        file_title varchar(255),
        lead_date datetime DEFAULT CURRENT_TIMESTAMP,
        status varchar(50) DEFAULT 'new',
        notes text,
        PRIMARY KEY (id),
        KEY email (email),
        KEY lead_date (lead_date)
    ) $charset_collate;";
    
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
    
    // Check if lead already exists
    $existing = $wpdb->get_row($wpdb->prepare(
        "SELECT id FROM $table_name WHERE email = %s",
        $email
    ));
    
    if ($existing) {
        // Update existing lead
        $wpdb->update(
            $table_name,
            array(
                'business_name' => $business,
                'file_id' => $file_id,
                'file_title' => $file_title,
                'lead_date' => current_time('mysql')
            ),
            array('email' => $email)
        );
    } else {
        // Insert new lead
        $wpdb->insert(
            $table_name,
            array(
                'email' => $email,
                'business_name' => $business,
                'file_id' => $file_id,
                'file_title' => $file_title
            )
        );
    }
}

// Enqueue download script
function cbkny_enqueue_download_script() {
    wp_enqueue_script('cbkny-download', get_template_directory_uri() . '/assets/js/download-handler.js', array('jquery'), '1.0.0', true);
    wp_localize_script('cbkny-download', 'cbkny_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('cbkny_download_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'cbkny_enqueue_download_script');
?>
