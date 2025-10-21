</main>
<footer class="footer">
  <div class="container" style="display:flex; gap:1rem; justify-content:space-between; flex-wrap:wrap;">
    <div>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></div>
    <nav aria-label="<?php esc_attr_e('Footer', 'cbkny'); ?>">
      <?php wp_nav_menu([ 'theme_location'=>'footer', 'container'=>false, 'menu_class'=>'menu', 'fallback_cb'=>false ]); ?>
    </nav>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
