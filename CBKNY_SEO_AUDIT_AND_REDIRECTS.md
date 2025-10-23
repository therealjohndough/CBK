# CBKNY.com SEO Audit & Redirect Structure
## Complete URL Mapping for Domain Migration

### 🎯 **Current Site Structure Analysis**

Based on the CBKNY theme analysis, here's the complete URL structure that needs to be preserved during migration:

---

## 📋 **Core Pages (High Priority - Priority 1.0)**

| Page | Current URL | Template | SEO Importance |
|------|-------------|----------|----------------|
| **Homepage** | `https://cbkny.com/` | `front-page.php` | **CRITICAL** |
| **Services** | `https://cbkny.com/services/` | `page-services.php` | **CRITICAL** |
| **About** | `https://cbkny.com/about/` | `page-about.php` | **CRITICAL** |
| **Contact** | `https://cbkny.com/contact/` | `page-contact.php` | **CRITICAL** |
| **Resources** | `https://cbkny.com/resources/` | `page-resources.php` | **CRITICAL** |

---

## 🏆 **Pillar Content Pages (High Priority - Priority 0.9)**

| Page | Current URL | Template | SEO Value |
|------|-------------|----------|-----------|
| **Ultimate Cannabis Accounting Guide** | `https://cbkny.com/ultimate-guide-cannabis-accounting/` | `page-ultimate-guide-cannabis-accounting.php` | **HIGH** |
| **280E Tax Compliance Guide** | `https://cbkny.com/280e-compliance-guide/` | `page-280e-compliance-guide.php` | **HIGH** |
| **NY OCM Reporting Guide** | `https://cbkny.com/ocm-reporting-guide/` | `page-ocm-reporting-guide.php` | **HIGH** |
| **Cannabis Startup Financial Guide** | `https://cbkny.com/cannabis-startup-financial-guide/` | `page-cannabis-startup-financial-guide.php` | **HIGH** |

---

## 📚 **Educational Content Pages (Medium Priority - Priority 0.8)**

| Page | Current URL | Template | SEO Value |
|------|-------------|----------|-----------|
| **Understanding 280E Guide** | `https://cbkny.com/understanding-280e-complete-guide/` | `page-understanding-280e-complete-guide.php` | **MEDIUM** |
| **OCM Reporting Requirements** | `https://cbkny.com/ocm-reporting-requirements-explained/` | `page-ocm-reporting-requirements-explained.php` | **MEDIUM** |
| **Multi-Entity Business Structures** | `https://cbkny.com/multi-entity-cannabis-business-structures/` | `page-multi-entity-cannabis-business-structures.php` | **MEDIUM** |
| **Preparing for Audits** | `https://cbkny.com/preparing-cannabis-business-audits/` | `page-preparing-cannabis-business-audits.php` | **MEDIUM** |
| **Inventory Tracking Best Practices** | `https://cbkny.com/cannabis-inventory-tracking-best-practices/` | `page-cannabis-inventory-tracking-best-practices.php` | **MEDIUM** |
| **NY Cannabis Tax Deadlines** | `https://cbkny.com/ny-cannabis-tax-deadlines-penalties/` | `page-ny-cannabis-tax-deadlines-penalties.php` | **MEDIUM** |

---

## 🛠️ **Service & Tool Pages (Medium Priority - Priority 0.8)**

| Page | Current URL | Template | SEO Value |
|------|-------------|----------|-----------|
| **280E Deduction Guide** | `https://cbkny.com/280e-deduction-guide/` | `page-280e-deduction-guide.php` | **MEDIUM** |
| **280E Tax Calculator** | `https://cbkny.com/280e-tax-calculator/` | `page-280e-tax-calculator.php` | **MEDIUM** |
| **Assessment Tools** | `https://cbkny.com/assessment-tools/` | `page-assessment-tools.php` | **MEDIUM** |
| **Audit Readiness Quiz** | `https://cbkny.com/audit-readiness-quiz/` | `page-audit-readiness-quiz.php` | **MEDIUM** |
| **Monthly Bookkeeping** | `https://cbkny.com/monthly-bookkeeping/` | `page-monthly-bookkeeping.php` | **MEDIUM** |
| **Chief Compliance Officer** | `https://cbkny.com/chief-compliance-officer/` | `page-chief-compliance-officer.php` | **MEDIUM** |
| **Cleanup & Catchup** | `https://cbkny.com/cleanup-catchup/` | `page-cleanup-catchup.php` | **MEDIUM** |
| **NY Cannabis Compliance Checklist** | `https://cbkny.com/ny-cannabis-compliance-checklist/` | `page-ny-cannabis-compliance-checklist.php` | **MEDIUM** |

---

## 📄 **Legal & Policy Pages (Low Priority - Priority 0.7)**

| Page | Current URL | Template | SEO Value |
|------|-------------|----------|-----------|
| **Privacy Policy** | `https://cbkny.com/privacy-policy/` | `page-privacy-policy.php` | **LOW** |
| **Terms of Service** | `https://cbkny.com/terms-of-service/` | `page-terms-of-service.php` | **LOW** |
| **Cookie Policy** | `https://cbkny.com/cookie-policy/` | `page-cookie-policy.php` | **LOW** |
| **Disclaimer** | `https://cbkny.com/disclaimer/` | `page-disclaimer.php` | **LOW** |

---

## 🎁 **Lead Generation Pages (Medium Priority - Priority 0.8)**

| Page | Current URL | Template | SEO Value |
|------|-------------|----------|-----------|
| **Free Guides** | `https://cbkny.com/free-guides/` | `page-free-guides.php` | **MEDIUM** |
| **Download Page** | `https://cbkny.com/download/` | `page-download.php` | **MEDIUM** |
| **Landing Page** | `https://cbkny.com/landing/` | `page-landing.php` | **MEDIUM** |

---

## 🔄 **Required Redirects for Migration**

### **Critical Redirects (Must Implement)**

#### **1. WWW to Non-WWW (or vice versa)**
```apache
# If current site uses www.cbkny.com
RewriteEngine On
RewriteCond %{HTTP_HOST} ^www\.cbkny\.com$ [NC]
RewriteRule ^(.*)$ https://cbkny.com/$1 [R=301,L]

# If current site uses cbkny.com (non-www)
RewriteCond %{HTTP_HOST} ^www\.cbkny\.com$ [NC]
RewriteRule ^(.*)$ https://cbkny.com/$1 [R=301,L]
```

#### **2. HTTP to HTTPS Redirects**
```apache
RewriteEngine On
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
```

#### **3. Trailing Slash Consistency**
```apache
# Ensure all URLs have consistent trailing slash behavior
RewriteCond %{REQUEST_URI} !(/$|\.)
RewriteRule (.*) https://%{HTTP_HOST}%{REQUEST_URI}/ [R=301,L]
```

---

## 📊 **SEO Elements to Preserve**

### **Meta Tags & Schema Markup**
Each page has specific SEO elements that must be preserved:

#### **Homepage SEO Elements**
- **Title**: "Cannabis Accounting Services New York | CBKNY"
- **Meta Description**: "Professional cannabis accounting services in New York. 280E compliance, OCM reporting, and tax preparation for cannabis businesses."
- **Schema**: LocalBusiness, ProfessionalService
- **Keywords**: cannabis accounting, 280E compliance, NY cannabis tax

#### **Pillar Content SEO Elements**
- **280E Compliance Guide**: Focus on "280E tax compliance", "cannabis tax deductions"
- **OCM Reporting Guide**: Focus on "OCM reporting", "NY cannabis regulations"
- **Ultimate Guide**: Focus on "cannabis accounting", "cannabis bookkeeping"

### **Internal Linking Structure**
Critical internal links to preserve:
- Homepage → Services, About, Contact, Resources
- Services → Pillar content pages
- Resources → Lead magnet pages
- Pillar content → Related educational content

---

## 🚨 **Migration Risk Assessment**

### **High-Risk Pages (Monitor Closely)**
1. **Homepage** - Highest traffic, most important
2. **Services Page** - Primary conversion page
3. **Pillar Content Pages** - High SEO value
4. **Contact Page** - Lead generation critical

### **Medium-Risk Pages**
1. **Educational Content** - Good SEO value
2. **Service Pages** - Conversion important
3. **Lead Generation Pages** - Marketing critical

### **Low-Risk Pages**
1. **Legal Pages** - Important but low traffic
2. **Blog Archive** - If exists, monitor for broken links

---

## ✅ **Pre-Migration Checklist**

### **URL Validation**
- [ ] Test all URLs return 200 status codes
- [ ] Verify no 404 errors on important pages
- [ ] Check internal linking works correctly
- [ ] Validate canonical URLs are correct

### **SEO Element Verification**
- [ ] Meta titles and descriptions present
- [ ] Schema markup validation
- [ ] Image alt tags present
- [ ] Internal linking structure intact
- [ ] XML sitemap accessible

### **Performance Baseline**
- [ ] Page speed scores (GTmetrix, PageSpeed Insights)
- [ ] Core Web Vitals scores
- [ ] Mobile responsiveness scores
- [ ] Accessibility scores

---

## 🔧 **Post-Migration Validation**

### **Critical Tests**
1. **URL Accessibility**: All URLs return 200 status
2. **Redirect Functionality**: All redirects work correctly
3. **SEO Elements**: Meta tags, schema, images intact
4. **Performance**: Page speed maintained or improved
5. **Mobile Experience**: Responsive design works
6. **Forms**: Contact forms and downloads work

### **Search Engine Validation**
1. **Google Search Console**: Monitor for crawl errors
2. **Site: Search**: Test "site:cbkny.com" in Google
3. **Indexing Status**: Verify pages are being indexed
4. **Rankings**: Monitor keyword positions

---

## 📈 **Success Metrics**

### **Immediate (Week 1)**
- [ ] All URLs accessible
- [ ] No 404 errors
- [ ] Page speed maintained
- [ ] Mobile experience works

### **Short-term (Month 1)**
- [ ] Search rankings maintained
- [ ] Organic traffic returns to baseline
- [ ] No significant ranking drops
- [ ] Google Search Console shows no errors

### **Long-term (Month 3)**
- [ ] Rankings improved or maintained
- [ ] Organic traffic growth
- [ ] New content being indexed
- [ ] Core Web Vitals scores improved

---

## 🎯 **Action Items for Migration**

### **Before Migration**
1. **Backup Current Site**: Full database and file backup
2. **Document Current Rankings**: Screenshot keyword positions
3. **Export Google Analytics**: Current traffic data
4. **Test All URLs**: Ensure all pages work correctly

### **During Migration**
1. **Implement Redirects**: Set up all required redirects
2. **Update DNS**: Point domain to SiteGround
3. **Verify SSL**: Ensure HTTPS works correctly
4. **Test Functionality**: All features work as expected

### **After Migration**
1. **Monitor Rankings**: Track keyword positions daily
2. **Check Search Console**: Monitor for crawl errors
3. **Test Performance**: Ensure speed is maintained
4. **Validate SEO**: All meta tags and schema intact

---

*This audit provides the complete URL structure and redirect requirements for a successful cbkny.com migration while preserving all SEO value.*
