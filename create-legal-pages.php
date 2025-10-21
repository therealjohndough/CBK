<?php
// Simple script to create legal pages
require_once('cbkny-theme/functions.php');

// Force create the legal pages
cbkny_create_legal_pages();

echo "Legal pages created successfully!\n";
echo "- Terms of Service: https://johnd501.sg-host.com/terms-of-service\n";
echo "- Cookie Policy: https://johnd501.sg-host.com/cookie-policy\n";
echo "- Disclaimer: https://johnd501.sg-host.com/disclaimer\n";
?>
