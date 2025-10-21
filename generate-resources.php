<?php
/**
 * Generate Resource Files
 * Creates actual PDF and Excel files for download
 */

// Simple PDF generator using basic PDF structure
function generatePDF($filename, $content) {
    $pdf_content = "%PDF-1.4\n";
    $pdf_content .= "1 0 obj\n";
    $pdf_content .= "<<\n";
    $pdf_content .= "/Type /Catalog\n";
    $pdf_content .= "/Pages 2 0 R\n";
    $pdf_content .= ">>\n";
    $pdf_content .= "endobj\n\n";
    
    $pdf_content .= "2 0 obj\n";
    $pdf_content .= "<<\n";
    $pdf_content .= "/Type /Pages\n";
    $pdf_content .= "/Kids [3 0 R]\n";
    $pdf_content .= "/Count 1\n";
    $pdf_content .= ">>\n";
    $pdf_content .= "endobj\n\n";
    
    $pdf_content .= "3 0 obj\n";
    $pdf_content .= "<<\n";
    $pdf_content .= "/Type /Page\n";
    $pdf_content .= "/Parent 2 0 R\n";
    $pdf_content .= "/MediaBox [0 0 612 792]\n";
    $pdf_content .= "/Contents 4 0 R\n";
    $pdf_content .= "/Resources <<\n";
    $pdf_content .= "/Font <<\n";
    $pdf_content .= "/F1 5 0 R\n";
    $pdf_content .= ">>\n";
    $pdf_content .= ">>\n";
    $pdf_content .= ">>\n";
    $pdf_content .= "endobj\n\n";
    
    // Content stream
    $content_stream = "BT\n";
    $content_stream .= "/F1 12 Tf\n";
    $content_stream .= "50 750 Td\n";
    $content_stream .= "($content) Tj\n";
    $content_stream .= "ET\n";
    
    $pdf_content .= "4 0 obj\n";
    $pdf_content .= "<<\n";
    $pdf_content .= "/Length " . strlen($content_stream) . "\n";
    $pdf_content .= ">>\n";
    $pdf_content .= "stream\n";
    $pdf_content .= $content_stream;
    $pdf_content .= "endstream\n";
    $pdf_content .= "endobj\n\n";
    
    $pdf_content .= "5 0 obj\n";
    $pdf_content .= "<<\n";
    $pdf_content .= "/Type /Font\n";
    $pdf_content .= "/Subtype /Type1\n";
    $pdf_content .= "/BaseFont /Helvetica\n";
    $pdf_content .= ">>\n";
    $pdf_content .= "endobj\n\n";
    
    $pdf_content .= "xref\n";
    $pdf_content .= "0 6\n";
    $pdf_content .= "0000000000 65535 f \n";
    $pdf_content .= "0000000009 00000 n \n";
    $pdf_content .= "0000000058 00000 n \n";
    $pdf_content .= "0000000115 00000 n \n";
    $pdf_content .= "0000000274 00000 n \n";
    $pdf_content .= "0000000830 00000 n \n";
    $pdf_content .= "trailer\n";
    $pdf_content .= "<<\n";
    $pdf_content .= "/Size 6\n";
    $pdf_content .= "/Root 1 0 R\n";
    $pdf_content .= ">>\n";
    $pdf_content .= "startxref\n";
    $pdf_content .= "889\n";
    $pdf_content .= "%%EOF\n";
    
    file_put_contents($filename, $pdf_content);
}

// Simple Excel generator (CSV format that Excel can open)
function generateExcel($filename, $data) {
    $csv_content = "";
    foreach ($data as $row) {
        $csv_content .= implode(',', $row) . "\n";
    }
    file_put_contents($filename, $csv_content);
}

// Generate PDF files
echo "Generating PDF files...\n";

// NY Cannabis Tax Compliance Checklist PDF
$checklist_content = "NY Cannabis Tax Compliance Checklist - CBKNY Cannabis Bookkeeper NY - Professional Cannabis Accounting Services - 1. Monthly Sales Tax Filing - Collect all sales receipts - Calculate excise tax due - File with NYS Department of Tax and Finance - Pay excise tax by due date - 2. Quarterly Income Tax Estimated Payments - Calculate estimated tax liability - Make quarterly payments - Track payments for year-end reconciliation";
generatePDF('cbkny-theme/assets/downloads/pdfs/NY-Cannabis-Tax-Compliance-Checklist.pdf', $checklist_content);

// 280E Deduction Guide PDF
$guide_content = "280E Deduction Guide for Cannabis Businesses - CBKNY Cannabis Bookkeeper NY - Professional Cannabis Accounting Services - Understanding 280E - What expenses are deductible - Cost of Goods Sold (COGS) - Inventory tracking requirements - Compliance best practices - Audit preparation tips";
generatePDF('cbkny-theme/assets/downloads/pdfs/280E-Deduction-Guide-for-Cannabis-Businesses.pdf', $guide_content);

echo "PDF files generated successfully!\n";

// Generate Excel files
echo "Generating Excel files...\n";

// COGS Tracking Template
$cogs_data = [
    ['Cannabis COGS Tracking Template', 'CBKNY Cannabis Bookkeeper NY'],
    [''],
    ['Date', 'Product', 'Quantity', 'Unit Cost', 'Total Cost', 'Category'],
    ['2024-01-01', 'Flower - Blue Dream', '100', '5.00', '500.00', 'Flower'],
    ['2024-01-02', 'Edibles - Gummies', '50', '3.00', '150.00', 'Edibles'],
    ['2024-01-03', 'Concentrates - Wax', '25', '8.00', '200.00', 'Concentrates'],
    [''],
    ['Total COGS:', '', '', '', '850.00', '']
];
generateExcel('cbkny-theme/assets/downloads/templates/Cannabis-COGS-Tracking-Template.xlsx', $cogs_data);

// Budget Template
$budget_data = [
    ['Cannabis Business Budget Template', 'CBKNY Cannabis Bookkeeper NY'],
    [''],
    ['Category', 'Monthly Budget', 'Actual', 'Variance'],
    ['Revenue', '50000', '0', '-50000'],
    ['Cost of Goods Sold', '20000', '0', '-20000'],
    ['Gross Profit', '30000', '0', '-30000'],
    ['Operating Expenses', '15000', '0', '-15000'],
    ['Net Profit', '15000', '0', '-15000']
];
generateExcel('cbkny-theme/assets/downloads/templates/Cannabis-Business-Budget-Template.xlsx', $budget_data);

echo "Excel files generated successfully!\n";
echo "All resource files created!\n";
?>
