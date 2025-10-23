#!/usr/bin/expect -f

set timeout 30
set password [lindex $argv 0]

# Upload the corrected template files
spawn scp -P 18765 /Users/dough/Documents/GitHub/CBK/cbkny-theme/page-ultimate-guide-cannabis-accounting.php u2270-ddifqp5quq66@ssh.johnd501.sg-host.com:/home/u2270-ddifqp5quq66/www/johnd501.sg-host.com/public_html/wp-content/themes/cbkny-theme/
expect "password:"
send "$password\r"
expect eof

spawn scp -P 18765 /Users/dough/Documents/GitHub/CBK/cbkny-theme/page-280e-compliance-guide.php u2270-ddifqp5quq66@ssh.johnd501.sg-host.com:/home/u2270-ddifqp5quq66/www/johnd501.sg-host.com/public_html/wp-content/themes/cbkny-theme/
expect "password:"
send "$password\r"
expect eof

spawn scp -P 18765 /Users/dough/Documents/GitHub/CBK/cbkny-theme/page-ocm-reporting-guide.php u2270-ddifqp5quq66@ssh.johnd501.sg-host.com:/home/u2270-ddifqp5quq66/www/johnd501.sg-host.com/public_html/wp-content/themes/cbkny-theme/
expect "password:"
send "$password\r"
expect eof

spawn scp -P 18765 /Users/dough/Documents/GitHub/CBK/cbkny-theme/page-cannabis-startup-financial-guide.php u2270-ddifqp5quq66@ssh.johnd501.sg-host.com:/home/u2270-ddifqp5quq66/www/johnd501.sg-host.com/public_html/wp-content/themes/cbkny-theme/
expect "password:"
send "$password\r"
expect eof

puts "✅ All template files uploaded successfully!"
