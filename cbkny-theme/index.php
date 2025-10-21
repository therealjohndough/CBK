<?php get_header(); ?>
<main class="container">
  <section class="hero">
    <h1><?php bloginfo('name'); ?></h1>
    <p><?php bloginfo('description'); ?></p>
  </section>
  <?php if(have_posts()): ?>
    <div class="grid" style="grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));">
    <?php while(have_posts()): the_post(); ?>
      <article class="card">
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <p><?php echo wp_trim_words( get_the_excerpt() ?: wp_strip_all_tags(get_the_content()), 22 ); ?></p>
      </article>
    <?php endwhile; ?>
    </div>
    <?php the_posts_pagination(); ?>
  <?php else: ?>
    <p>No content yet.</p>
  <?php endif; ?>
</main>
<?php get_footer(); ?>
