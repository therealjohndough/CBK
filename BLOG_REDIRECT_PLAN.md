# Blog Redirect Plan for CBKNY.com Migration
## Mapping Blog Pages to New Site Resources

### 🎯 **Objective**: Redirect all blog/feature pages from old cbkny.com to relevant resources on new SiteGround site

---

## 📋 **Complete Blog Redirect Mapping**

### **High Priority Blog Posts (Lead Magnets & Tax Content)**

| Old Blog URL | New Resource URL | Redirect Type | Content Match |
|--------------|------------------|---------------|---------------|
| `https://cbkny.com/f/free-download-new-york-potency-tax-calculator` | `https://cbkny.com/download/` | **301 Redirect** | Lead magnet download page |
| `https://cbkny.com/f/new-york-state-sales-tax-calendar-2024` | `https://cbkny.com/resources/` | **301 Redirect** | Resources page with tax calendar |
| `https://cbkny.com/f/new-york-business-tax-calendar-2024` | `https://cbkny.com/resources/` | **301 Redirect** | Resources page with tax calendar |
| `https://cbkny.com/f/three-key-strategies-for-cannabis-accountancy-as-told-by-cbk` | `https://cbkny.com/ultimate-guide-cannabis-accounting/` | **301 Redirect** | Ultimate guide pillar content |

### **Educational Content Redirects**

| Old Blog URL | New Resource URL | Redirect Type | Content Match |
|--------------|------------------|---------------|---------------|
| `https://cbkny.com/f/tips-for-diy-bookkeeping` | `https://cbkny.com/monthly-bookkeeping/` | **301 Redirect** | Monthly bookkeeping service page |
| `https://cbkny.com/f/six-tips-for-better-organization` | `https://cbkny.com/resources/` | **301 Redirect** | Resources page with organization tips |
| `https://cbkny.com/f/our-take-hr-compliance-for-cannabis-businesses` | `https://cbkny.com/ocm-reporting-guide/` | **301 Redirect** | OCM compliance guide |
| `https://cbkny.com/f/the-tightrope-walk` | `https://cbkny.com/about/` | **301 Redirect** | About page with business philosophy |

### **Company Story & Partnership Redirects**

| Old Blog URL | New Resource URL | Redirect Type | Content Match |
|--------------|------------------|---------------|---------------|
| `https://cbkny.com/f/empowering-cannabis-businesses-the-story-of-canna-bookkeeper%E2%84%A2%EF%B8%8F` | `https://cbkny.com/about/` | **301 Redirect** | About page with company story |
| `https://cbkny.com/f/meet-my-friends-at-her-seed-bank` | `https://cbkny.com/about/` | **301 Redirect** | About page with partnerships |
| `https://cbkny.com/f/ready-to-grow-with-us` | `https://cbkny.com/contact/` | **301 Redirect** | Contact page for growth consultation |
| `https://cbkny.com/f/consulting-two-accountants` | `https://cbkny.com/services/` | **301 Redirect** | Services page with consulting info |

---

## 🔄 **Redirect Implementation**

### **Apache .htaccess Redirects**

```apache
# Blog/Feature Pages Redirects
RewriteEngine On

# High Priority - Lead Magnets & Tax Content
RewriteRule ^f/free-download-new-york-potency-tax-calculator/?$ /download/ [R=301,L]
RewriteRule ^f/new-york-state-sales-tax-calendar-2024/?$ /resources/ [R=301,L]
RewriteRule ^f/new-york-business-tax-calendar-2024/?$ /resources/ [R=301,L]
RewriteRule ^f/three-key-strategies-for-cannabis-accountancy-as-told-by-cbk/?$ /ultimate-guide-cannabis-accounting/ [R=301,L]

# Educational Content
RewriteRule ^f/tips-for-diy-bookkeeping/?$ /monthly-bookkeeping/ [R=301,L]
RewriteRule ^f/six-tips-for-better-organization/?$ /resources/ [R=301,L]
RewriteRule ^f/our-take-hr-compliance-for-cannabis-businesses/?$ /ocm-reporting-guide/ [R=301,L]
RewriteRule ^f/the-tightrope-walk/?$ /about/ [R=301,L]

# Company Story & Partnerships
RewriteRule ^f/empowering-cannabis-businesses-the-story-of-canna-bookkeeper%E2%84%A2%EF%B8%8F/?$ /about/ [R=301,L]
RewriteRule ^f/meet-my-friends-at-her-seed-bank/?$ /about/ [R=301,L]
RewriteRule ^f/ready-to-grow-with-us/?$ /contact/ [R=301,L]
RewriteRule ^f/consulting-two-accountants/?$ /services/ [R=301,L]
```

### **WordPress Redirects (Alternative)**

```php
// Add to functions.php or use redirect plugin
function cbkny_blog_redirects() {
    $redirects = array(
        '/f/free-download-new-york-potency-tax-calculator' => '/download/',
        '/f/new-york-state-sales-tax-calendar-2024' => '/resources/',
        '/f/new-york-business-tax-calendar-2024' => '/resources/',
        '/f/three-key-strategies-for-cannabis-accountancy-as-told-by-cbk' => '/ultimate-guide-cannabis-accounting/',
        '/f/tips-for-diy-bookkeeping' => '/monthly-bookkeeping/',
        '/f/six-tips-for-better-organization' => '/resources/',
        '/f/our-take-hr-compliance-for-cannabis-businesses' => '/ocm-reporting-guide/',
        '/f/the-tightrope-walk' => '/about/',
        '/f/empowering-cannabis-businesses-the-story-of-canna-bookkeeper%E2%84%A2%EF%B8%8F' => '/about/',
        '/f/meet-my-friends-at-her-seed-bank' => '/about/',
        '/f/ready-to-grow-with-us' => '/contact/',
        '/f/consulting-two-accountants' => '/services/'
    );
    
    foreach ($redirects as $old_url => $new_url) {
        if (strpos($_SERVER['REQUEST_URI'], $old_url) !== false) {
            wp_redirect(home_url($new_url), 301);
            exit;
        }
    }
}
add_action('template_redirect', 'cbkny_blog_redirects');
```

---

## 🎯 **Content Mapping Strategy**

### **Lead Magnets → Download Page**
- **NY Potency Tax Calculator** → Download page
- **Tax Calendars** → Resources page (with calendar downloads)

### **Educational Content → Service Pages**
- **DIY Bookkeeping Tips** → Monthly Bookkeeping service
- **Organization Tips** → Resources page
- **HR Compliance** → OCM Reporting Guide

### **Company Story → About Page**
- **Empowering Cannabis Businesses** → About page
- **Partnership Content** → About page
- **Business Philosophy** → About page

### **Consultation Content → Contact/Services**
- **Ready to Grow** → Contact page
- **Consulting Info** → Services page

---

## 📊 **SEO Preservation Strategy**

### **Meta Title Preservation**
```html
<!-- Old blog post meta title -->
<title>Free Download: NY Potency Tax Calculator | CBKNY</title>

<!-- New page meta title (preserve keywords) -->
<title>Download Cannabis Accounting Resources | CBKNY</title>
```

### **Meta Description Preservation**
```html
<!-- Old blog post meta description -->
<meta name="description" content="Download our free NY potency tax calculator. Calculate cannabis potency taxes accurately.">

<!-- New page meta description (preserve intent) -->
<meta name="description" content="Download free cannabis accounting resources, calculators, and guides for NY cannabis businesses.">
```

### **Keyword Preservation**
- **Primary Keywords**: cannabis accounting, NY cannabis tax
- **Secondary Keywords**: potency tax, tax calculator, compliance
- **Long-tail Keywords**: cannabis business accounting, NY cannabis compliance

---

## ✅ **Redirect Testing Checklist**

### **High Priority Redirects (Test First)**
- [ ] **Potency Tax Calculator**: `/f/free-download-new-york-potency-tax-calculator` → `/download/`
- [ ] **Sales Tax Calendar**: `/f/new-york-state-sales-tax-calendar-2024` → `/resources/`
- [ ] **Business Tax Calendar**: `/f/new-york-business-tax-calendar-2024` → `/resources/`
- [ ] **Three Key Strategies**: `/f/three-key-strategies-for-cannabis-accountancy-as-told-by-cbk` → `/ultimate-guide-cannabis-accounting/`

### **Medium Priority Redirects (Test Second)**
- [ ] **DIY Bookkeeping**: `/f/tips-for-diy-bookkeeping` → `/monthly-bookkeeping/`
- [ ] **Organization Tips**: `/f/six-tips-for-better-organization` → `/resources/`
- [ ] **HR Compliance**: `/f/our-take-hr-compliance-for-cannabis-businesses` → `/ocm-reporting-guide/`
- [ ] **Tightrope Walk**: `/f/the-tightrope-walk` → `/about/`

### **Low Priority Redirects (Test Third)**
- [ ] **Company Story**: `/f/empowering-cannabis-businesses-the-story-of-canna-bookkeeper%E2%84%A2%EF%B8%8F` → `/about/`
- [ ] **Partnership Content**: `/f/meet-my-friends-at-her-seed-bank` → `/about/`
- [ ] **Ready to Grow**: `/f/ready-to-grow-with-us` → `/contact/`
- [ ] **Consulting Info**: `/f/consulting-two-accountants` → `/services/`

---

## 🚨 **Critical Success Factors**

### **URL Structure Preservation**
- **Exact URL matching**: All old URLs must redirect correctly
- **Case sensitivity**: Preserve exact casing in redirects
- **Special characters**: Handle encoded characters correctly
- **Trailing slashes**: Handle both with and without trailing slashes

### **SEO Value Preservation**
- **301 redirects**: Ensure all redirects are 301 (permanent)
- **Keyword preservation**: Maintain keyword targeting on new pages
- **Link equity**: Preserve link equity from old blog posts
- **User experience**: Ensure users land on relevant content

### **Content Relevance**
- **Logical mapping**: Redirect to most relevant new page
- **Content continuity**: Ensure new page has related content
- **User intent**: Match user intent from old page to new page

---

## 📈 **Expected Results**

### **SEO Benefits**
- **Link equity preservation**: All backlinks to blog posts transfer to new pages
- **Keyword ranking maintenance**: Rankings preserved through relevant redirects
- **User experience**: Users land on relevant, updated content
- **Search engine trust**: 301 redirects maintain search engine trust

### **Business Benefits**
- **Lead generation**: Tax calculator redirects to download page
- **Service promotion**: Educational content redirects to relevant services
- **Company story**: Story content redirects to about page
- **Consultation leads**: Growth content redirects to contact page

---

*This redirect plan ensures all blog content from the old cbkny.com site is properly redirected to relevant resources on the new SiteGround site, preserving SEO value and improving user experience.*
