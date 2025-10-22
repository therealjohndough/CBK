<?php get_header(); ?>
<main class="container">
  <?php cbkny_breadcrumbs(); ?>
  
  <?php while (have_posts()) : the_post(); ?>
    <article class="blog-post">
      <header class="blog-header" style="margin-bottom: 3rem;">
        <div class="blog-meta" style="display: flex; gap: 1rem; margin-bottom: 1rem; font-size: 0.9rem; color: var(--cbkny-gray);">
          <span><?php echo get_the_date(); ?></span>
          <span>•</span>
          <span><?php the_category(', '); ?></span>
          <span>•</span>
          <span><?php echo reading_time(); ?> min read</span>
        </div>
        
        <h1 style="color: var(--cbkny-black); margin-bottom: 1.5rem; font-size: 2.5rem; line-height: 1.2;">
          <?php the_title(); ?>
        </h1>
        
        <?php if (has_excerpt()) : ?>
          <div class="blog-excerpt" style="font-size: 1.2rem; color: var(--cbkny-gray); line-height: 1.6;">
            <?php the_excerpt(); ?>
          </div>
        <?php endif; ?>
      </header>
      
      <div class="blog-content" style="display: grid; grid-template-columns: 2fr 1fr; gap: 4rem;">
        
        <!-- Main Content -->
        <div class="blog-main">
          <?php if (has_post_thumbnail()) : ?>
            <div class="blog-featured-image" style="margin-bottom: 2rem;">
              <?php the_post_thumbnail('large', array('style' => 'width: 100%; height: auto; border-radius: 0.5rem;')); ?>
            </div>
          <?php endif; ?>
          
          <div class="blog-body" style="line-height: 1.8; font-size: 1.1rem;">
            <?php the_content(); ?>
          </div>
          
          <!-- Tags -->
          <?php if (has_tag()) : ?>
            <div class="blog-tags" style="margin: 3rem 0; padding-top: 2rem; border-top: 1px solid var(--cbkny-border);">
              <h4 style="color: var(--cbkny-black); margin-bottom: 1rem;">Tags:</h4>
              <div class="tag-list" style="display: flex; flex-wrap: wrap; gap: 0.5rem;">
                <?php the_tags('<span class="tag" style="background: var(--cbkny-light-pink); color: var(--cbkny-pink); padding: 0.25rem 0.75rem; border-radius: 1rem; font-size: 0.9rem;">', '</span><span class="tag" style="background: var(--cbkny-light-pink); color: var(--cbkny-pink); padding: 0.25rem 0.75rem; border-radius: 1rem; font-size: 0.9rem;">', '</span>'); ?>
              </div>
            </div>
          <?php endif; ?>
          
          <!-- Author Bio -->
          <div class="author-bio card" style="padding: 2rem; margin: 3rem 0;">
            <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
              <div style="width: 60px; height: 60px; background: var(--cbkny-light-pink); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--cbkny-pink); font-weight: bold;">
                RS
              </div>
              <div>
                <h4 style="color: var(--cbkny-black); margin: 0;">Rosanna St. John</h4>
                <p style="color: var(--cbkny-gray); margin: 0; font-size: 0.9rem;">Certified Cannabis Bookkeeper</p>
              </div>
            </div>
            <p style="margin: 0; line-height: 1.6;">
              Rosanna St. John is a NACPB Certified Bookkeeper specializing in cannabis accounting and 280E compliance. 
              She helps New York cannabis businesses stay audit-ready and compliant with OCM reporting requirements.
            </p>
          </div>
          
          <!-- Related Posts -->
          <?php
          $related_posts = get_posts(array(
              'category__in' => wp_get_post_categories(get_the_ID()),
              'numberposts' => 3,
              'post__not_in' => array(get_the_ID())
          ));
          if ($related_posts) :
          ?>
            <div class="related-posts" style="margin-top: 3rem;">
              <h3 style="color: var(--cbkny-black); margin-bottom: 2rem;">Related Articles</h3>
              <div style="display: grid; gap: 1.5rem;">
                <?php foreach ($related_posts as $related_post) : ?>
                  <div class="related-post card" style="padding: 1.5rem;">
                    <h4 style="color: var(--cbkny-black); margin-bottom: 0.5rem;">
                      <a href="<?php echo get_permalink($related_post->ID); ?>" 
                         style="color: inherit; text-decoration: none;">
                        <?php echo $related_post->post_title; ?>
                      </a>
                    </h4>
                    <p style="color: var(--cbkny-gray); font-size: 0.9rem; margin: 0;">
                      <?php echo wp_trim_words($related_post->post_excerpt, 15); ?>
                    </p>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endif; ?>
        </div>
        
        <!-- Sidebar -->
        <aside class="blog-sidebar">
          <div class="sidebar-widget card" style="padding: 2rem; margin-bottom: 2rem;">
            <h3 style="color: var(--cbkny-black); margin-bottom: 1.5rem;">Categories</h3>
            <ul style="list-style: none; padding: 0;">
              <?php
              $categories = get_categories();
              foreach ($categories as $category) :
              ?>
                <li style="margin-bottom: 0.5rem;">
                  <a href="<?php echo get_category_link($category->term_id); ?>" 
                     style="color: var(--cbkny-pink); text-decoration: none;">
                    <?php echo $category->name; ?> (<?php echo $category->count; ?>)
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
          
          <div class="sidebar-widget card" style="padding: 2rem;">
            <h3 style="color: var(--cbkny-black); margin-bottom: 1.5rem;">Get Our Newsletter</h3>
            <p style="margin-bottom: 1.5rem; color: var(--cbkny-gray);">
              Stay updated with the latest cannabis accounting tips and compliance news.
            </p>
            <form class="newsletter-form" style="display: flex; flex-direction: column; gap: 1rem;">
              <input type="email" placeholder="Your email address" 
                     style="padding: 0.75rem; border: 1px solid var(--cbkny-border); border-radius: 0.25rem;">
              <button type="submit" class="btn btn-primary" style="width: 100%;">
                Subscribe
              </button>
            </form>
          </div>
        </aside>
      </div>
    </article>
  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
