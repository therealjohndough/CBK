<?php get_header(); ?>
<main class="container">
  <?php cbkny_breadcrumbs(); ?>
  
  <section class="hero">
    <h1>Cannabis Accounting Blog</h1>
    <p>Expert insights, compliance tips, and industry updates for New York cannabis businesses</p>
  </section>

  <section class="blog-content" style="margin: 4rem 0;">
    <div class="blog-grid" style="display: grid; grid-template-columns: 2fr 1fr; gap: 4rem;">
      
      <!-- Main Content -->
      <div class="blog-posts">
        <?php if (have_posts()) : ?>
          <div class="posts-grid" style="display: grid; gap: 2rem;">
            <?php while (have_posts()) : the_post(); ?>
              <article class="blog-card card" style="padding: 2rem;">
                <div class="blog-meta" style="display: flex; gap: 1rem; margin-bottom: 1rem; font-size: 0.9rem; color: var(--cbkny-gray);">
                  <span><?php echo get_the_date(); ?></span>
                  <span>•</span>
                  <span><?php the_category(', '); ?></span>
                </div>
                
                <h2 style="color: var(--cbkny-black); margin-bottom: 1rem;">
                  <a href="<?php the_permalink(); ?>" style="color: inherit; text-decoration: none;">
                    <?php the_title(); ?>
                  </a>
                </h2>
                
                <div class="blog-excerpt" style="margin-bottom: 1.5rem; line-height: 1.6;">
                  <?php the_excerpt(); ?>
                </div>
                
                <a href="<?php the_permalink(); ?>" class="btn btn-primary" style="display: inline-block;">
                  Read More
                </a>
              </article>
            <?php endwhile; ?>
          </div>
          
          <!-- Pagination -->
          <div class="pagination" style="margin-top: 3rem; text-align: center;">
            <?php
            the_posts_pagination(array(
                'mid_size' => 2,
                'prev_text' => '← Previous',
                'next_text' => 'Next →',
            ));
            ?>
          </div>
          
        <?php else : ?>
          <div class="no-posts" style="text-align: center; padding: 4rem 2rem;">
            <h2>No blog posts found</h2>
            <p>Check back soon for new content!</p>
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
          <h3 style="color: var(--cbkny-black); margin-bottom: 1.5rem;">Recent Posts</h3>
          <ul style="list-style: none; padding: 0;">
            <?php
            $recent_posts = wp_get_recent_posts(array(
                'numberposts' => 5,
                'post_status' => 'publish'
            ));
            foreach ($recent_posts as $post) :
            ?>
              <li style="margin-bottom: 1rem; padding-bottom: 1rem; border-bottom: 1px solid var(--cbkny-border);">
                <a href="<?php echo get_permalink($post['ID']); ?>" 
                   style="color: var(--cbkny-black); text-decoration: none; font-weight: 500;">
                  <?php echo $post['post_title']; ?>
                </a>
                <div style="font-size: 0.8rem; color: var(--cbkny-gray); margin-top: 0.25rem;">
                  <?php echo get_the_date('M j, Y', $post['ID']); ?>
                </div>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </aside>
    </div>
  </section>
</main>

<?php get_footer(); ?>
