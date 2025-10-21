<?php get_header(); ?>
<main class="container">
  <article>
    <h1><?php the_title(); ?></h1>
    <?php while(have_posts()): the_post(); the_content(); endwhile; ?>
  </article>
</main>
<?php get_footer(); ?>
