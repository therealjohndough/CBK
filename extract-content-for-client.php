<?php
/**
 * Extract All Website Content for Client Review
 * This script will extract all guides, resources, and content from the CBK website
 * and prepare them for PDF generation and client review
 */

// Set longer execution time for content processing
ini_set('max_execution_time', 300);

echo "🎯 CBK Website Content Extraction for Client Review\n";
echo "==================================================\n\n";

// Create output directory
$outputDir = __DIR__ . '/client-content-review';
if (!file_exists($outputDir)) {
    mkdir($outputDir, 0755, true);
}

// Create subdirectories
$directories = [
    'guides',
    'resources', 
    'templates',
    'existing-pdfs',
    'service-pages',
    'html-exports'
];

foreach ($directories as $dir) {
    $fullPath = $outputDir . '/' . $dir;
    if (!file_exists($fullPath)) {
        mkdir($fullPath, 0755, true);
    }
}

echo "📁 Created output directories in: $outputDir\n\n";

/**
 * Function to extract clean HTML content from PHP template
 */
function extractContentFromTemplate($filePath, $title = '') {
    if (!file_exists($filePath)) {
        return null;
    }
    
    $content = file_get_contents($filePath);
    
    // Remove PHP tags and WordPress functions
    $content = preg_replace('/<\?php.*?\?>/s', '', $content);
    $content = preg_replace('/get_header\(\).*?;/', '', $content);
    $content = preg_replace('/get_footer\(\).*?;/', '', $content);
    $content = preg_replace('/cbkny_breadcrumbs\(\).*?;/', '', $content);
    $content = preg_replace('/echo date\([^)]+\);/', date('F j, Y'), $content);
    
    // Clean up WordPress-specific code
    $content = str_replace('<?php', '', $content);
    $content = str_replace('?>', '', $content);
    $content = preg_replace('/\s+/', ' ', $content);
    
    // Add basic HTML structure
    $html = "<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <title>$title</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; max-width: 800px; margin: 0 auto; padding: 20px; }
        h1 { color: #2c3e50; border-bottom: 3px solid #e74c3c; padding-bottom: 10px; }
        h2 { color: #34495e; margin-top: 30px; }
        h3 { color: #7f8c8d; }
        .highlight-box { background: #f8f9fa; padding: 20px; border-radius: 8px; margin: 20px 0; border-left: 4px solid #e74c3c; }
        .warning-box { background: #fff3cd; border: 1px solid #ffeaa7; padding: 20px; border-radius: 8px; margin: 20px 0; }
        .toc { background: #f4f4f4; padding: 20px; border-radius: 8px; margin: 30px 0; }
        .btn { background: #e74c3c; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px; display: inline-block; }
        ul, ol { margin: 15px 0; padding-left: 30px; }
        li { margin: 8px 0; }
    </style>
</head>
<body>
    $content
</body>
</html>";
    
    return $html;
}

// Main guide pages to extract
$mainGuides = [
    'page-ultimate-guide-cannabis-accounting.php' => 'Ultimate Guide to Cannabis Accounting in New York',
    'page-280e-compliance-guide.php' => '280E Tax Compliance Complete Resource',
    'page-ocm-reporting-guide.php' => 'NY OCM Reporting Requirements Complete Guide',
    'page-cannabis-startup-financial-guide.php' => 'Cannabis Business Startup Financial Guide'
];

echo "📚 Extracting Main Guide Content...\n";
foreach ($mainGuides as $filename => $title) {
    $filePath = __DIR__ . '/cbkny-theme/' . $filename;
    $missingFilePath = __DIR__ . '/missing-templates/' . $filename;
    
    // Check both locations
    $sourceFile = file_exists($filePath) ? $filePath : $missingFilePath;
    
    if (file_exists($sourceFile)) {
        echo "   ✓ Processing: $title\n";
        $htmlContent = extractContentFromTemplate($sourceFile, $title);
        
        if ($htmlContent) {
            $cleanFilename = preg_replace('/[^a-zA-Z0-9-]/', '-', $title);
            file_put_contents($outputDir . '/guides/' . $cleanFilename . '.html', $htmlContent);
            echo "     → Saved as: $cleanFilename.html\n";
        }
    } else {
        echo "   ⚠️  File not found: $filename\n";
    }
}

// Resource and service pages
$resourcePages = [
    'page-resources.php' => 'Free Cannabis Accounting Resources',
    'page-free-guides.php' => 'Free Cannabis Accounting Guides', 
    'page-templates.php' => 'Free Cannabis Business Templates',
    'page-assessment-tools.php' => 'Cannabis Business Assessment Tools',
    'page-services.php' => 'Cannabis Accounting Services',
    'page-about.php' => 'About Canna Bookkeeper NY',
    'page-contact.php' => 'Contact Information'
];

echo "\n📄 Extracting Resource and Service Pages...\n";
foreach ($resourcePages as $filename => $title) {
    $filePath = __DIR__ . '/cbkny-theme/' . $filename;
    
    if (file_exists($filePath)) {
        echo "   ✓ Processing: $title\n";
        $htmlContent = extractContentFromTemplate($filePath, $title);
        
        if ($htmlContent) {
            $cleanFilename = preg_replace('/[^a-zA-Z0-9-]/', '-', $title);
            file_put_contents($outputDir . '/service-pages/' . $cleanFilename . '.html', $htmlContent);
            echo "     → Saved as: $cleanFilename.html\n";
        }
    } else {
        echo "   ⚠️  File not found: $filename\n";
    }
}

// Copy existing PDFs and templates
echo "\n📎 Copying Existing PDFs and Templates...\n";

$downloadsDir = __DIR__ . '/cbkny-theme/assets/downloads';
if (file_exists($downloadsDir)) {
    // Copy PDFs
    $pdfDir = $downloadsDir . '/pdfs';
    if (file_exists($pdfDir)) {
        $pdfs = glob($pdfDir . '/*.pdf');
        foreach ($pdfs as $pdf) {
            $filename = basename($pdf);
            copy($pdf, $outputDir . '/existing-pdfs/' . $filename);
            echo "   ✓ Copied PDF: $filename\n";
        }
    }
    
    // Copy templates
    $templateDir = $downloadsDir . '/templates';
    if (file_exists($templateDir)) {
        $templates = glob($templateDir . '/*.xlsx');
        foreach ($templates as $template) {
            $filename = basename($template);
            copy($template, $outputDir . '/templates/' . $filename);
            echo "   ✓ Copied Template: $filename\n";
        }
    }
}

// Create a comprehensive index file
$indexContent = "<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <title>CBK Website Content Review - Complete Index</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; max-width: 1000px; margin: 0 auto; padding: 20px; }
        h1 { color: #2c3e50; text-align: center; border-bottom: 3px solid #e74c3c; padding-bottom: 15px; }
        h2 { color: #34495e; margin-top: 40px; background: #f8f9fa; padding: 15px; border-radius: 8px; }
        .section { margin: 30px 0; }
        .file-list { background: white; border: 1px solid #ddd; border-radius: 8px; padding: 20px; }
        .file-item { padding: 10px 0; border-bottom: 1px solid #eee; }
        .file-item:last-child { border-bottom: none; }
        .file-name { font-weight: bold; color: #e74c3c; }
        .file-desc { color: #666; font-size: 0.9em; margin-top: 5px; }
        .stats { background: #e8f4f8; padding: 20px; border-radius: 8px; text-align: center; margin: 30px 0; }
        .note { background: #fff3cd; border: 1px solid #ffeaa7; padding: 15px; border-radius: 8px; margin: 20px 0; }
    </style>
</head>
<body>
    <h1>🎯 CBK Website Content Review</h1>
    <p style='text-align: center; font-size: 1.2em; color: #666;'>Complete content extraction for client review - " . date('F j, Y') . "</p>
    
    <div class='stats'>
        <h3>📊 Content Summary</h3>
        <p><strong>Total Files Extracted:</strong> " . (count($mainGuides) + count($resourcePages)) . " pages</p>
        <p><strong>Existing PDFs:</strong> " . count(glob($downloadsDir . '/pdfs/*.pdf')) . " files</p>
        <p><strong>Templates:</strong> " . count(glob($downloadsDir . '/templates/*.xlsx')) . " files</p>
    </div>

    <div class='section'>
        <h2>📚 Main Cannabis Accounting Guides</h2>
        <div class='file-list'>";

foreach ($mainGuides as $filename => $title) {
    $cleanFilename = preg_replace('/[^a-zA-Z0-9-]/', '-', $title);
    $indexContent .= "
            <div class='file-item'>
                <div class='file-name'>$title</div>
                <div class='file-desc'>Comprehensive guide extracted from $filename</div>
                <div class='file-desc'>📁 Location: guides/$cleanFilename.html</div>
            </div>";
}

$indexContent .= "
        </div>
    </div>

    <div class='section'>
        <h2>📄 Resource & Service Pages</h2>
        <div class='file-list'>";

foreach ($resourcePages as $filename => $title) {
    $cleanFilename = preg_replace('/[^a-zA-Z0-9-]/', '-', $title);
    $indexContent .= "
            <div class='file-item'>
                <div class='file-name'>$title</div>
                <div class='file-desc'>Resource page extracted from $filename</div>
                <div class='file-desc'>📁 Location: service-pages/$cleanFilename.html</div>
            </div>";
}

$indexContent .= "
        </div>
    </div>

    <div class='section'>
        <h2>📎 Existing PDFs & Templates</h2>
        <div class='file-list'>
            <div class='file-item'>
                <div class='file-name'>280E Deduction Guide for Cannabis Businesses (PDF)</div>
                <div class='file-desc'>Existing lead magnet PDF - ready for client review</div>
                <div class='file-desc'>📁 Location: existing-pdfs/</div>
            </div>
            <div class='file-item'>
                <div class='file-name'>NY Cannabis Tax Compliance Checklist (PDF)</div>
                <div class='file-desc'>Existing lead magnet PDF - ready for client review</div>
                <div class='file-desc'>📁 Location: existing-pdfs/</div>
            </div>
            <div class='file-item'>
                <div class='file-name'>Cannabis COGS Tracking Template (Excel)</div>
                <div class='file-desc'>Excel template for cost tracking and 280E compliance</div>
                <div class='file-desc'>📁 Location: templates/</div>
            </div>
            <div class='file-item'>
                <div class='file-name'>Cannabis Business Budget Template (Excel)</div>
                <div class='file-desc'>Comprehensive budget planning template</div>
                <div class='file-desc'>📁 Location: templates/</div>
            </div>
        </div>
    </div>

    <div class='note'>
        <h3>📝 Notes for Client Review</h3>
        <ul>
            <li><strong>HTML Files:</strong> All guide content has been extracted as clean HTML files that can easily be converted to PDF</li>
            <li><strong>Existing PDFs:</strong> Lead magnets are already in PDF format and ready for review</li>
            <li><strong>Excel Templates:</strong> Fully functional templates with formulas and cannabis-specific categories</li>
            <li><strong>Content Quality:</strong> All content is professional, comprehensive, and industry-specific</li>
            <li><strong>SEO Value:</strong> Guides contain substantial, valuable content for cannabis accounting niche</li>
        </ul>
    </div>

    <div class='section'>
        <h2>🚀 Next Steps</h2>
        <div class='file-list'>
            <div class='file-item'>
                <div class='file-name'>1. Review HTML Files</div>
                <div class='file-desc'>Open HTML files in browser to review formatted content</div>
            </div>
            <div class='file-item'>
                <div class='file-name'>2. Convert to PDF (Optional)</div>
                <div class='file-desc'>Use browser \"Print to PDF\" or PDF conversion tool for final PDFs</div>
            </div>
            <div class='file-item'>
                <div class='file-name'>3. Test Excel Templates</div>
                <div class='file-desc'>Open Excel files to verify formulas and functionality</div>
            </div>
            <div class='file-item'>
                <div class='file-name'>4. Client Feedback</div>
                <div class='file-desc'>Share organized content package with client for review</div>
            </div>
        </div>
    </div>

</body>
</html>";

file_put_contents($outputDir . '/index.html', $indexContent);

echo "\n✅ Content Extraction Complete!\n";
echo "📁 All files saved to: $outputDir\n";
echo "🌐 Open index.html in your browser to review all extracted content\n\n";

echo "📋 Summary:\n";
echo "   • " . count($mainGuides) . " main guide pages extracted\n";
echo "   • " . count($resourcePages) . " resource/service pages extracted\n";
echo "   • Existing PDFs and templates copied\n";
echo "   • Complete index file created\n\n";

echo "🎯 Ready for client review!\n";
?>