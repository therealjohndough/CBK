<?php get_header(); ?>
<main class="container">
  <header><h1><?php the_archive_title(); ?></h1><p><?php the_archive_description(); ?></p></header>
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
    <p>No posts.</p>
  <?php endif; ?>
</main>
<?php get_footer(); ?>
