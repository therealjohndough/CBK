# Domain Migration Plan: GoDaddy to SiteGround
## CBKNY.com SEO-Preserving Migration Strategy

### 🎯 **Migration Overview**
**Objective**: Migrate cbkny.com from GoDaddy to SiteGround while preserving all SEO value and ensuring zero downtime.

**Current Setup**:
- Domain: cbkny.com (GoDaddy)
- Current Hosting: SiteGround (johnd501.sg-host.com)
- WordPress Theme: CBKNY custom theme
- SEO Status: Active with comprehensive optimization

---

## 📋 **Pre-Migration Checklist**

### **Phase 1: Preparation (Week 1)**

#### **1.1 Backup Current Site**
- [ ] **Full Site Backup**: Download complete WordPress installation
- [ ] **Database Export**: Export MySQL database with all content
- [ ] **File System Backup**: Download wp-content, themes, plugins
- [ ] **DNS Records Backup**: Screenshot current DNS settings in GoDaddy
- [ ] **Email Configuration**: Document current email settings

#### **1.2 SEO Audit & Documentation**
- [ ] **Google Search Console**: Export current search performance data
- [ ] **Google Analytics**: Document current traffic patterns
- [ ] **Backlink Audit**: Use tools like Ahrefs/SEMrush to document all backlinks
- [ ] **Keyword Rankings**: Document current keyword positions
- [ ] **Page Speed Analysis**: Record current Core Web Vitals scores
- [ ] **Schema Markup**: Document all structured data implementations

#### **1.3 SiteGround Preparation**
- [ ] **SSL Certificate**: Ensure SSL is active on SiteGround
- [ ] **WordPress Installation**: Verify clean WordPress installation
- [ ] **Theme Upload**: Deploy CBKNY theme to SiteGround
- [ ] **Plugin Installation**: Install necessary plugins (Yoast, etc.)
- [ ] **Database Setup**: Prepare database for content import

---

## 🔄 **Migration Execution (Week 2)**

### **Phase 2: Content Migration**

#### **2.1 Database Migration**
```bash
# Export from current site
mysqldump -u username -p database_name > cbkny_backup.sql

# Import to SiteGround
mysql -u siteground_user -p siteground_db < cbkny_backup.sql
```

#### **2.2 File Migration**
- [ ] **Upload wp-content**: Transfer all themes, plugins, uploads
- [ ] **Update wp-config.php**: Configure database connections
- [ ] **Set Permissions**: Ensure proper file permissions (644/755)
- [ ] **Test Functionality**: Verify all pages load correctly

#### **2.3 SEO Preservation Steps**
- [ ] **URL Structure**: Maintain exact URL structure
- [ ] **Meta Tags**: Preserve all meta descriptions and titles
- [ ] **Schema Markup**: Verify structured data is intact
- [ ] **Internal Links**: Check all internal linking works
- [ ] **Images**: Ensure all images load with proper alt tags

---

## 🌐 **DNS Configuration (Week 2)**

### **Phase 3: Domain Pointing**

#### **3.1 GoDaddy DNS Changes**
**Current DNS Records to Update**:
```
Type: A Record
Name: @
Value: [SiteGround IP Address]
TTL: 600

Type: A Record  
Name: www
Value: [SiteGround IP Address]
TTL: 600

Type: CNAME
Name: mail
Value: [SiteGround Mail Server]
TTL: 3600
```

#### **3.2 SiteGround Configuration**
- [ ] **Add Domain**: Add cbkny.com as primary domain in SiteGround
- [ ] **SSL Certificate**: Install SSL for cbkny.com
- [ ] **Email Setup**: Configure email accounts if needed
- [ ] **Subdomain Setup**: Configure www.cbkny.com redirect

---

## 🔍 **SEO Preservation Strategy**

### **Phase 4: SEO Maintenance**

#### **4.1 Technical SEO Preservation**
- [ ] **301 Redirects**: Set up redirects from old URLs if any
- [ ] **XML Sitemap**: Update sitemap with new server location
- [ ] **Robots.txt**: Update robots.txt with new domain
- [ ] **Canonical URLs**: Ensure canonical tags point to correct domain
- [ ] **Page Speed**: Optimize for Core Web Vitals on new server

#### **4.2 Search Engine Notifications**
- [ ] **Google Search Console**: Add new property and verify ownership
- [ ] **Bing Webmaster Tools**: Add and verify new site
- [ ] **Submit Sitemap**: Submit updated XML sitemap to search engines
- [ ] **Request Re-indexing**: Request Google to re-crawl important pages

#### **4.3 Link Preservation**
- [ ] **Internal Links**: Update any hardcoded internal links
- [ ] **Social Media**: Update social media profiles with new domain
- [ ] **Directory Listings**: Update business directory listings
- [ ] **Email Signatures**: Update email signatures with new domain

---

## 🧪 **Testing & Validation (Week 3)**

### **Phase 5: Post-Migration Testing**

#### **5.1 Functionality Testing**
- [ ] **Homepage**: Verify homepage loads correctly
- [ ] **All Pages**: Test every page for proper loading
- [ ] **Contact Forms**: Test form submissions
- [ ] **Downloads**: Test lead magnet downloads
- [ ] **Mobile Responsiveness**: Test on mobile devices
- [ ] **Page Speed**: Run speed tests (GTmetrix, PageSpeed Insights)

#### **5.2 SEO Testing**
- [ ] **Meta Tags**: Verify all meta tags are present
- [ ] **Schema Markup**: Test structured data with Google's tool
- [ ] **URL Structure**: Confirm all URLs work correctly
- [ ] **Redirects**: Test any redirects are working
- [ ] **SSL Certificate**: Verify HTTPS is working properly

#### **5.3 Search Engine Testing**
- [ ] **Google Search Console**: Monitor for crawl errors
- [ ] **Site: Search**: Test "site:cbkny.com" in Google
- [ ] **Indexing Status**: Check if pages are being indexed
- [ ] **Rankings**: Monitor keyword rankings for changes

---

## 📊 **Monitoring & Recovery (Week 4+)**

### **Phase 6: Ongoing Monitoring**

#### **6.1 Performance Monitoring**
- [ ] **Traffic Analysis**: Monitor Google Analytics for traffic drops
- [ ] **Ranking Monitoring**: Track keyword position changes
- [ ] **Backlink Monitoring**: Ensure backlinks still work
- [ ] **Error Monitoring**: Watch for 404 errors or crawl issues

#### **6.2 Recovery Plan**
- [ ] **Rollback Plan**: Keep old site accessible for 30 days
- [ ] **DNS Rollback**: Document how to quickly revert DNS
- [ ] **Backup Access**: Ensure backups are easily accessible
- [ ] **Emergency Contacts**: Have SiteGround support contact ready

---

## 🚨 **Risk Mitigation**

### **Potential Issues & Solutions**

#### **SEO Risks**
- **Risk**: Temporary ranking drops during DNS propagation
- **Solution**: Keep old site live during transition, use gradual migration

#### **Technical Risks**
- **Risk**: Broken links or missing content
- **Solution**: Comprehensive testing checklist, backup verification

#### **Email Risks**
- **Risk**: Email delivery issues during DNS changes
- **Solution**: Update MX records carefully, test email functionality

---

## 📅 **Timeline Summary**

| Week | Phase | Key Activities |
|------|-------|----------------|
| **Week 1** | Preparation | Backup, audit, SiteGround setup |
| **Week 2** | Migration | Content transfer, DNS changes |
| **Week 3** | Testing | Functionality and SEO validation |
| **Week 4+** | Monitoring | Performance tracking, optimization |

---

## 🎯 **Success Metrics**

### **Migration Success Criteria**
- [ ] **Zero Downtime**: Site remains accessible throughout migration
- [ ] **SEO Preservation**: No significant ranking drops (monitor for 30 days)
- [ ] **Functionality**: All features work identically to before
- [ ] **Performance**: Page speed maintained or improved
- [ ] **Traffic**: Organic traffic returns to pre-migration levels within 2 weeks

### **Post-Migration Optimization**
- [ ] **Site Speed**: Optimize for Core Web Vitals
- [ ] **Mobile Experience**: Ensure perfect mobile performance
- [ ] **Local SEO**: Update Google Business Profile if needed
- [ **Content Freshness**: Add new content to signal site activity

---

## 📞 **Support Contacts**

- **SiteGround Support**: Available 24/7 via chat/phone
- **GoDaddy Support**: For DNS-related issues
- **Google Search Console**: For indexing issues
- **Emergency Rollback**: Keep old hosting active for 30 days

---

*This migration plan ensures zero SEO loss while providing a smooth transition to SiteGround hosting. Follow each step carefully and monitor results closely for the first month post-migration.*
