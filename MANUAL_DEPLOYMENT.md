# Manual Deployment Guide for SiteGround

Since SSH requires password authentication, here's a step-by-step manual deployment process:

## Option 1: Using SiteGround File Manager (Easiest)

### Step 1: Access SiteGround File Manager
1. Log into your SiteGround account
2. Go to "Websites" → "Site Tools"
3. Navigate to "Files" → "File Manager"
4. Navigate to: `public_html/wp-content/themes/`

### Step 2: Create Theme Directory
1. Click "New Folder"
2. Name it: `cbkny-theme`
3. Click "Create"

### Step 3: Upload Theme Files
1. Navigate into the `cbkny-theme` folder
2. Click "Upload Files"
3. Select all files from your local `cbkny-theme` folder:
   - `style.css`
   - `functions.php`
   - `header.php`
   - `footer.php`
   - `front-page.php`
   - `page-services.php`
   - `page-about.php`
   - `page-contact.php`
   - `page-resources.php`
   - `page-landing.php`
   - `index.php`
   - `404.php`
   - `archive.php`
   - `single.php`
   - `page.php`
   - `assets/` folder (with all contents)
   - `inc/` folder (with all contents)

### Step 4: Set Permissions
1. Select all uploaded files
2. Right-click → "Permissions"
3. Set to: `644` for files, `755` for directories

## Option 2: Using SSH with Password (Terminal)

### Step 1: Test SSH Connection
```bash
ssh u2270-ddifqp5quq66@ssh.johnd501.sg-host.com -p 18765
# Enter your SSH password when prompted
```

### Step 2: Create Theme Directory
```bash
# Once connected via SSH
mkdir -p /home/u2270-ddifqp5quq66/www/johnd501.sg-host.com/public_html/wp-content/themes/cbkny-theme
cd /home/u2270-ddifqp5quq66/www/johnd501.sg-host.com/public_html/wp-content/themes/cbkny-theme
```

### Step 3: Upload Files (from your local machine)
```bash
# From your local machine, upload files one by one
scp -P 18765 /Users/dough/Documents/GitHub/CBK/cbkny-theme/style.css u2270-ddifqp5quq66@ssh.johnd501.sg-host.com:/home/u2270-ddifqp5quq66/www/johnd501.sg-host.com/public_html/wp-content/themes/cbkny-theme/

# Repeat for each file, or upload the entire directory:
scp -P 18765 -r /Users/dough/Documents/GitHub/CBK/cbkny-theme/* u2270-ddifqp5quq66@ssh.johnd501.sg-host.com:/home/u2270-ddifqp5quq66/www/johnd501.sg-host.com/public_html/wp-content/themes/cbkny-theme/
```

### Step 4: Set Permissions
```bash
# SSH into server
ssh u2270-ddifqp5quq66@ssh.johnd501.sg-host.com -p 18765

# Navigate to theme directory
cd /home/u2270-ddifqp5quq66/www/johnd501.sg-host.com/public_html/wp-content/themes/cbkny-theme

# Set permissions
find . -type d -exec chmod 755 {} \;
find . -type f -exec chmod 644 {} \;
```

## Option 3: Using rsync with Password

### Step 1: Install sshpass (if not available)
```bash
# On macOS with Homebrew
brew install sshpass

# Or use expect script
```

### Step 2: Create expect script for password automation
Create file: `deploy-with-password.sh`
```bash
#!/usr/bin/expect -f

set timeout 30
set password [lindex $argv 0]
set commit_message [lindex $argv 1]

# Commit to git
spawn git add .
expect eof
spawn git commit -m $commit_message
expect eof
spawn git push origin main
expect eof

# Deploy with rsync
spawn rsync -avz -e "ssh -p 18765" /Users/dough/Documents/GitHub/CBK/cbkny-theme/ u2270-ddifqp5quq66@ssh.johnd501.sg-host.com:/home/u2270-ddifqp5quq66/www/johnd501.sg-host.com/public_html/wp-content/themes/cbkny-theme/

expect "password:"
send "$password\r"
expect eof
```

### Step 3: Use the script
```bash
chmod +x deploy-with-password.sh
./deploy-with-password.sh "your_ssh_password" "commit message"
```

## After Deployment

### Step 1: Install WordPress (if not already installed)
1. Go to SiteGround Site Tools
2. Navigate to "WordPress" → "Install & Manage"
3. Click "Install WordPress"
4. Configure:
   - Domain: `johnd501.sg-host.com`
   - Path: (leave blank for root)
   - Admin credentials
5. Click "Install"

### Step 2: Activate Theme
1. Visit: `https://johnd501.sg-host.com/wp-admin`
2. Login with WordPress credentials
3. Go to "Appearance" → "Themes"
4. Find "CBKNY" theme
5. Click "Activate"

### Step 3: Configure Theme
1. Go to "Appearance" → "Customize"
2. Navigate to "CBKNY Theme Options"
3. Update all content sections
4. Click "Publish"

### Step 4: Create Pages
1. Create pages using the provided templates
2. Set up navigation menu
3. Configure WordPress settings

## Troubleshooting

### SSH Connection Issues
- Make sure SSH is enabled in SiteGround
- Check port number (18765)
- Try password authentication if key fails

### File Permission Errors
- Set directory permissions: `chmod 755`
- Set file permissions: `chmod 644`
- Check file ownership

### Theme Not Showing
- Verify theme is in correct directory
- Check folder name: `cbkny-theme`
- Ensure all files uploaded correctly
- Clear WordPress cache

## Quick Commands Reference

### SSH Connection
```bash
ssh u2270-ddifqp5quq66@ssh.johnd501.sg-host.com -p 18765
```

### Upload Single File
```bash
scp -P 18765 /path/to/local/file u2270-ddifqp5quq66@ssh.johnd501.sg-host.com:/remote/path/
```

### Upload Directory
```bash
scp -P 18765 -r /local/directory/ u2270-ddifqp5quq66@ssh.johnd501.sg-host.com:/remote/path/
```

### Set Permissions
```bash
ssh u2270-ddifqp5quq66@ssh.johnd501.sg-host.com -p 18765
cd /path/to/theme
find . -type d -exec chmod 755 {} \;
find . -type f -exec chmod 644 {} \;
```
