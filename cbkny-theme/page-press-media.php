<?php
/*
Template Name: Press & Media Page
*/

get_header(); ?>

<div class="container" style="max-width: 1200px; margin: 0 auto; padding: 2rem;">
  <article style="margin: 2rem 0;">
    <header style="text-align: center; margin-bottom: 3rem;">
      <h1 style="color: var(--cbkny-black); font-size: 2.5rem; margin-bottom: 1rem;">Press & Media</h1>
      <p style="font-size: 1.25rem; color: var(--cbkny-gray); margin-bottom: 1rem;">Media coverage, speaking engagements, and industry recognition for Canna Bookkeeper NY.</p>
    </header>

    <!-- Article Schema for SEO -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Article",
      "headline": "Press & Media - Canna Bookkeeper NY",
      "author": {
        "@type": "Person",
        "name": "Rosanna St. John"
      },
      "publisher": {
        "@type": "Organization",
        "name": "Canna Bookkeeper NY",
        "logo": {
          "@type": "ImageObject",
          "url": "https://cbkny.com/logo.png"
        }
      },
      "datePublished": "2025-10-23",
      "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "https://cbkny.com/press-media/"
      }
    }
    </script>

    <div class="press-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; max-width: 100%;">
      
      <!-- Finance Chair, AAF Buffalo -->
      <div class="press-card" style="background: white; border: 1px solid #e0e0e0; border-radius: 8px; padding: 1.5rem; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <h3 style="color: var(--cbkny-pink); margin-bottom: 1rem; font-size: 1.2rem;">Finance Chair, American Advertising Federation of Buffalo</h3>
        <p style="color: var(--cbkny-gray); margin-bottom: 1rem;">Rosanna St. John serves as Finance Chair for the American Advertising Federation of Buffalo, bringing cannabis industry expertise to the advertising community.</p>
        <button onclick="togglePress(this)" style="background: var(--cbkny-pink); color: white; border: none; padding: 0.5rem 1rem; border-radius: 4px; cursor: pointer;">Show More</button>
        <div class="press-details" style="display: none; margin-top: 1rem; padding-top: 1rem; border-top: 1px solid #e0e0e0;">
          <p>Meet the Board of AAF Buffalo and learn about our commitment to advancing advertising excellence in Western New York.</p>
        </div>
      </div>

      <!-- HR Compliance Guide -->
      <div class="press-card" style="background: white; border: 1px solid #e0e0e0; border-radius: 8px; padding: 1.5rem; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <h3 style="color: var(--cbkny-pink); margin-bottom: 1rem; font-size: 1.2rem;">The Ultimate HR Compliance Guide for Cannabis Businesses in 2025</h3>
        <p style="color: var(--cbkny-gray); margin-bottom: 1rem;">Featured in Paragon Payroll's comprehensive guide with insights from Canna Bookkeeper LLC Founder, Rosanna St. John.</p>
        <button onclick="togglePress(this)" style="background: var(--cbkny-pink); color: white; border: none; padding: 0.5rem 1rem; border-radius: 4px; cursor: pointer;">Show More</button>
        <div class="press-details" style="display: none; margin-top: 1rem; padding-top: 1rem; border-top: 1px solid #e0e0e0;">
          <p>Comprehensive guide covering HR compliance challenges unique to cannabis businesses, featuring expert insights on employment law, workplace safety, and regulatory requirements.</p>
        </div>
      </div>

      <!-- Rochester Career Summit -->
      <div class="press-card" style="background: white; border: 1px solid #e0e0e0; border-radius: 8px; padding: 1.5rem; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <h3 style="color: var(--cbkny-pink); margin-bottom: 1rem; font-size: 1.2rem;">Speaker at Rochester Career Summit</h3>
        <p style="color: var(--cbkny-gray); margin-bottom: 1rem;">Invited by New York State Cannabis Connect to speak at the first Cannabis Career Summit in New York State.</p>
        <button onclick="togglePress(this)" style="background: var(--cbkny-pink); color: white; border: none; padding: 0.5rem 1rem; border-radius: 4px; cursor: pointer;">Show More</button>
        <div class="press-details" style="display: none; margin-top: 1rem; padding-top: 1rem; border-top: 1px solid #e0e0e0;">
          <p>Keynote presentation on cannabis industry career opportunities, financial planning, and the growing demand for specialized cannabis accounting professionals.</p>
        </div>
      </div>

      <!-- Honey Suckle Magazine -->
      <div class="press-card" style="background: white; border: 1px solid #e0e0e0; border-radius: 8px; padding: 1.5rem; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <h3 style="color: var(--cbkny-pink); margin-bottom: 1rem; font-size: 1.2rem;">Featured by Honey Suckle Magazine</h3>
        <p style="color: var(--cbkny-gray); margin-bottom: 1rem;">Our Weedsday Playlist featured in HoneySuckle magazine, showcasing cannabis industry culture and community.</p>
        <button onclick="togglePress(this)" style="background: var(--cbkny-pink); color: white; border: none; padding: 0.5rem 1rem; border-radius: 4px; cursor: pointer;">Show More</button>
        <div class="press-details" style="display: none; margin-top: 1rem; padding-top: 1rem; border-top: 1px solid #e0e0e0;">
          <p>Featured in HoneySuckle magazine's Weedsday Playlist, highlighting the intersection of cannabis culture and business professionalism.</p>
        </div>
      </div>

      <!-- Canvas Rebel Interview -->
      <div class="press-card" style="background: white; border: 1px solid #e0e0e0; border-radius: 8px; padding: 1.5rem; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <h3 style="color: var(--cbkny-pink); margin-bottom: 1rem; font-size: 1.2rem;">Interview with Canvas Rebel</h3>
        <p style="color: var(--cbkny-gray); margin-bottom: 1rem;">An interview, and a few years later, a check in with Canvas Rebel about cannabis business growth and challenges.</p>
        <button onclick="togglePress(this)" style="background: var(--cbkny-pink); color: white; border: none; padding: 0.5rem 1rem; border-radius: 4px; cursor: pointer;">Show More</button>
        <div class="press-details" style="display: none; margin-top: 1rem; padding-top: 1rem; border-top: 1px solid #e0e0e0;">
          <p>In-depth interview covering the evolution of cannabis business accounting, regulatory changes, and the future of cannabis industry financial services.</p>
        </div>
      </div>

      <!-- WNY Entrepreneur Podcast -->
      <div class="press-card" style="background: white; border: 1px solid #e0e0e0; border-radius: 8px; padding: 1.5rem; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <h3 style="color: var(--cbkny-pink); margin-bottom: 1rem; font-size: 1.2rem;">WNY Entrepreneur Podcast</h3>
        <p style="color: var(--cbkny-gray); margin-bottom: 1rem;">A guest spot on WNY Entrepreneur Podcast, hosted by David Schaub, discussing cannabis business entrepreneurship.</p>
        <button onclick="togglePress(this)" style="background: var(--cbkny-pink); color: white; border: none; padding: 0.5rem 1rem; border-radius: 4px; cursor: pointer;">Show More</button>
        <div class="press-details" style="display: none; margin-top: 1rem; padding-top: 1rem; border-top: 1px solid #e0e0e0;">
          <p>Podcast episode covering cannabis business startup challenges, financial planning, and the importance of specialized accounting services in the cannabis industry.</p>
        </div>
      </div>

      <!-- Dope CFO Podcast -->
      <div class="press-card" style="background: white; border: 1px solid #e0e0e0; border-radius: 8px; padding: 1.5rem; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <h3 style="color: var(--cbkny-pink); margin-bottom: 1rem; font-size: 1.2rem;">Dope CFO Podcast</h3>
        <p style="color: var(--cbkny-gray); margin-bottom: 1rem;">Meeting Andrew, the Accountant behind the DOPE CFO program, discussing cannabis industry financial strategies.</p>
        <button onclick="togglePress(this)" style="background: var(--cbkny-pink); color: white; border: none; padding: 0.5rem 1rem; border-radius: 4px; cursor: pointer;">Show More</button>
        <div class="press-details" style="display: none; margin-top: 1rem; padding-top: 1rem; border-top: 1px solid #e0e0e0;">
          <p>Collaborative discussion on cannabis CFO strategies, 280E compliance, and financial planning for cannabis businesses with industry expert Andrew.</p>
        </div>
      </div>

      <!-- Cannabis Cum Laude Podcast -->
      <div class="press-card" style="background: white; border: 1px solid #e0e0e0; border-radius: 8px; padding: 1.5rem; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <h3 style="color: var(--cbkny-pink); margin-bottom: 1rem; font-size: 1.2rem;">Cannabis Cum Laude Podcast</h3>
        <p style="color: var(--cbkny-gray); margin-bottom: 1rem;">Joining Steve Vandewalle on Cannabis Cum Laude to talk about 280E, tax strategies, and our hopes and dreams for the cannabis industry.</p>
        <button onclick="togglePress(this)" style="background: var(--cbkny-pink); color: white; border: none; padding: 0.5rem 1rem; border-radius: 4px; cursor: pointer;">Show More</button>
        <div class="press-details" style="display: none; margin-top: 1rem; padding-top: 1rem; border-top: 1px solid #e0e0e0;">
          <p>In-depth podcast discussion covering 280E tax implications, cannabis industry growth, regulatory challenges, and the future of cannabis business accounting.</p>
        </div>
      </div>
    </div>

    <!-- Contact Section -->
    <section style="text-align: center; background: #f8f9fa; padding: 2rem; border-radius: 8px; margin-top: 3rem;">
      <h3 style="color: var(--cbkny-pink); margin-bottom: 1rem;">Media Inquiries</h3>
      <p style="margin-bottom: 1.5rem; color: var(--cbkny-gray);">For media inquiries, interviews, or speaking engagements, please contact us.</p>
      <a href="/contact" style="background: var(--cbkny-pink); color: white; padding: 0.75rem 1.5rem; text-decoration: none; border-radius: 4px; font-weight: 600; display: inline-block;">Contact Us</a>
    </section>
  </article>
</div>

<script>
function togglePress(button) {
  const details = button.nextElementSibling;
  
  if (details.style.display === 'none' || details.style.display === '') {
    details.style.display = 'block';
    button.textContent = 'Show Less';
  } else {
    details.style.display = 'none';
    button.textContent = 'Show More';
  }
}
</script>

<?php get_footer(); ?>
