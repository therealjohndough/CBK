# Complete CBKNY.com Live Site Mapping
## All Pages, URLs, and SEO Elements for Migration

### 🎯 **Complete Site Structure from Live cbkny.com**

---

## 📋 **Core Pages (Main Navigation)**

| Page | URL | Purpose | Priority |
|------|-----|---------|----------|
| **Home** | `https://cbkny.com/` | Main landing page | **CRITICAL** |
| **Home (Alt)** | `https://cbkny.com/home` | Alternative home URL | **CRITICAL** |
| **About** | `https://cbkny.com/about` | Company information | **HIGH** |
| **Contact** | `https://cbkny.com/contact` | Contact information | **HIGH** |

---

## 🧭 **Blog/Feature Pages (/f/) - 12 Pages**

| Page | URL | Content Focus | SEO Priority |
|------|-----|---------------|-------------|
| **Three Key Strategies** | `https://cbkny.com/f/three-key-strategies-for-cannabis-accountancy-as-told-by-cbk` | Cannabis accounting strategies | **HIGH** |
| **NY Sales Tax Calendar 2024** | `https://cbkny.com/f/new-york-state-sales-tax-calendar-2024` | NY tax calendar | **HIGH** |
| **NY Business Tax Calendar 2024** | `https://cbkny.com/f/new-york-business-tax-calendar-2024` | Business tax calendar | **HIGH** |
| **Empowering Cannabis Businesses** | `https://cbkny.com/f/empowering-cannabis-businesses-the-story-of-canna-bookkeeper%E2%84%A2%EF%B8%8F` | Company story | **MEDIUM** |
| **Free Download: NY Potency Tax Calculator** | `https://cbkny.com/f/free-download-new-york-potency-tax-calculator` | Lead magnet | **HIGH** |
| **Six Tips for Better Organization** | `https://cbkny.com/f/six-tips-for-better-organization` | Organization tips | **MEDIUM** |
| **Meet My Friends at Her Seed Bank** | `https://cbkny.com/f/meet-my-friends-at-her-seed-bank` | Partnership content | **MEDIUM** |
| **Ready to Grow with Us** | `https://cbkny.com/f/ready-to-grow-with-us` | Call to action | **MEDIUM** |
| **Consulting Two Accountants** | `https://cbkny.com/f/consulting-two-accountants` | Service content | **MEDIUM** |
| **Our Take: HR Compliance** | `https://cbkny.com/f/our-take-hr-compliance-for-cannabis-businesses` | HR compliance | **MEDIUM** |
| **The Tightrope Walk** | `https://cbkny.com/f/the-tightrope-walk` | Business advice | **MEDIUM** |
| **Tips for DIY Bookkeeping** | `https://cbkny.com/f/tips-for-diy-bookkeeping` | DIY bookkeeping | **MEDIUM** |

---

## 🎯 **SEO Elements to Preserve for Each Page**

### **Core Pages SEO Elements**

#### **Homepage (https://cbkny.com/)**
- **Meta Title**: "Canna Bookkeeper™ NY | Cannabis Accounting Services"
- **Meta Description**: "Professional cannabis accounting services in New York. 280E compliance, OCM reporting, and tax preparation for cannabis businesses."
- **H1**: "Canna Bookkeeper™ NY"
- **Keywords**: cannabis accounting, 280E compliance, NY cannabis tax

#### **About Page (https://cbkny.com/about)**
- **Meta Title**: "About Canna Bookkeeper NY | Cannabis Accounting Experts"
- **Meta Description**: "Meet the cannabis accounting experts at CBKNY. Professional bookkeeping and tax services for New York cannabis businesses."
- **H1**: "About Canna Bookkeeper NY"
- **Keywords**: cannabis accounting experts, NY cannabis bookkeeping

#### **Contact Page (https://cbkny.com/contact)**
- **Meta Title**: "Contact CBKNY | Cannabis Accounting Services"
- **Meta Description**: "Contact CBKNY for professional cannabis accounting services. Free consultation available for NY cannabis operators."
- **H1**: "Contact Canna Bookkeeper NY"
- **Keywords**: contact cannabis accounting, NY cannabis services

---

## 📝 **Blog/Feature Pages SEO Elements**

### **High Priority Blog Posts**

#### **Three Key Strategies for Cannabis Accountancy**
- **URL**: `https://cbkny.com/f/three-key-strategies-for-cannabis-accountancy-as-told-by-cbk`
- **Meta Title**: "Three Key Strategies for Cannabis Accountancy | CBKNY"
- **Meta Description**: "Learn the three essential strategies for cannabis accounting success. Expert advice from Canna Bookkeeper NY."
- **Keywords**: cannabis accounting strategies, cannabis bookkeeping tips

#### **NY Sales Tax Calendar 2024**
- **URL**: `https://cbkny.com/f/new-york-state-sales-tax-calendar-2024`
- **Meta Title**: "New York State Sales Tax Calendar 2024 | CBKNY"
- **Meta Description**: "Complete NY sales tax calendar for 2024. Stay compliant with cannabis business tax deadlines."
- **Keywords**: NY sales tax calendar, cannabis tax deadlines 2024

#### **NY Business Tax Calendar 2024**
- **URL**: `https://cbkny.com/f/new-york-business-tax-calendar-2024`
- **Meta Title**: "New York Business Tax Calendar 2024 | CBKNY"
- **Meta Description**: "Essential business tax calendar for NY cannabis businesses. Never miss a tax deadline."
- **Keywords**: NY business tax calendar, cannabis business tax deadlines

#### **Free Download: NY Potency Tax Calculator**
- **URL**: `https://cbkny.com/f/free-download-new-york-potency-tax-calculator`
- **Meta Title**: "Free NY Potency Tax Calculator | CBKNY"
- **Meta Description**: "Download our free NY potency tax calculator. Calculate cannabis potency taxes accurately."
- **Keywords**: NY potency tax calculator, cannabis tax calculator

---

## 🔄 **Required Redirects for Migration**

### **Critical Redirects**
```apache
# Homepage redirects
RewriteRule ^home/?$ / [R=301,L]

# Blog/Feature pages redirects (if URL structure changes)
RewriteRule ^f/(.*)$ /blog/$1 [R=301,L]
```

### **URL Structure Preservation**
- **Maintain exact URLs**: All current URLs must work identically
- **Preserve /f/ structure**: Blog/feature pages under /f/ directory
- **Maintain case sensitivity**: Exact URL casing must be preserved

---

## ✅ **Migration Validation Checklist**

### **Core Pages (Test First)**
- [ ] **Homepage**: `https://cbkny.com/` - 200 status, meta tags intact
- [ ] **Home Alt**: `https://cbkny.com/home` - redirects to homepage
- [ ] **About**: `https://cbkny.com/about` - 200 status, content intact
- [ ] **Contact**: `https://cbkny.com/contact` - 200 status, form works

### **High Priority Blog Posts (Test Second)**
- [ ] **Three Key Strategies**: `https://cbkny.com/f/three-key-strategies-for-cannabis-accountancy-as-told-by-cbk`
- [ ] **NY Sales Tax Calendar**: `https://cbkny.com/f/new-york-state-sales-tax-calendar-2024`
- [ ] **NY Business Tax Calendar**: `https://cbkny.com/f/new-york-business-tax-calendar-2024`
- [ ] **Potency Tax Calculator**: `https://cbkny.com/f/free-download-new-york-potency-tax-calculator`

### **Medium Priority Blog Posts (Test Third)**
- [ ] **Empowering Cannabis Businesses**: `https://cbkny.com/f/empowering-cannabis-businesses-the-story-of-canna-bookkeeper%E2%84%A2%EF%B8%8F`
- [ ] **Six Tips for Organization**: `https://cbkny.com/f/six-tips-for-better-organization`
- [ ] **Meet My Friends**: `https://cbkny.com/f/meet-my-friends-at-her-seed-bank`
- [ ] **Ready to Grow**: `https://cbkny.com/f/ready-to-grow-with-us`
- [ ] **Consulting Two Accountants**: `https://cbkny.com/f/consulting-two-accountants`
- [ ] **HR Compliance**: `https://cbkny.com/f/our-take-hr-compliance-for-cannabis-businesses`
- [ ] **The Tightrope Walk**: `https://cbkny.com/f/the-tightrope-walk`
- [ ] **DIY Bookkeeping Tips**: `https://cbkny.com/f/tips-for-diy-bookkeeping`

---

## 📊 **Content Analysis**

### **Content Types**
- **Educational Content**: Tax calendars, compliance guides
- **Lead Magnets**: Free downloads, calculators
- **Company Story**: Brand building content
- **Tips & Advice**: Practical business advice
- **Partnership Content**: Industry connections

### **SEO Value Assessment**
- **High SEO Value**: Tax calendars, compliance content, lead magnets
- **Medium SEO Value**: Company story, tips, advice
- **Brand Building**: Partnership content, company story

---

## 🎯 **Migration Priority Order**

### **Week 1: Core Pages**
1. Homepage (`https://cbkny.com/`)
2. About (`https://cbkny.com/about`)
3. Contact (`https://cbkny.com/contact`)

### **Week 2: High Priority Blog Posts**
1. Three Key Strategies
2. NY Sales Tax Calendar 2024
3. NY Business Tax Calendar 2024
4. Free Download: NY Potency Tax Calculator

### **Week 3: Medium Priority Blog Posts**
1. Empowering Cannabis Businesses
2. Six Tips for Better Organization
3. Meet My Friends at Her Seed Bank
4. Ready to Grow with Us

### **Week 4: Remaining Blog Posts**
1. Consulting Two Accountants
2. Our Take: HR Compliance
3. The Tightrope Walk
4. Tips for DIY Bookkeeping

---

## 🚨 **Critical Success Factors**

### **URL Preservation**
- **Exact URL matching**: All URLs must work identically
- **Case sensitivity**: Preserve exact casing
- **Special characters**: Handle encoded characters correctly

### **SEO Preservation**
- **Meta titles**: Preserve exact meta titles
- **Meta descriptions**: Preserve exact descriptions
- **Keywords**: Maintain keyword targeting
- **Internal linking**: Preserve all internal links

### **Content Preservation**
- **Full content**: All text content must be identical
- **Images**: All images with alt tags
- **Downloads**: All downloadable content
- **Forms**: All contact forms and functionality

---

*This mapping provides the complete structure of the live cbkny.com site with all 16 pages, their SEO elements, and migration priorities.*
