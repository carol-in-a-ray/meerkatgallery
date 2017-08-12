<?php
/**
 * The 404 for our theme
 *
 * @package Meerkat Gallery
 * @since 1.0
 * @version 1.0
 */
?>

<?php get_header(); ?>

<div class="wrapper-bg">
  <div class="wrapper">

    <?php /* The Main Loop */?>
      <main class="404">

        <h1>Oops, this is embarrassing!</h1>
        <p>We couldn't find the page you're looking for. But we think you might like one of these:</p>

      </main>


    </div><!-- .wrapper - close for full black BG -->
    <aside class="sticky-posts-bg">
      <div class="wrapper">
        <h2>Featured Artworks</h2>
        <div class="sticky-posts">
          <?php get_template_part('content', 'sticky'); ?>
        </div><!-- .sticky-posts -->
      </div><!-- .wrapper -->
    </aside>
    <div class="wrapper">


    <aside class="featured-links">
      <?php get_template_part('content', 'featured-links'); ?>
    </aside>


  </div><!-- .wrapper -->
</div><!-- .wrapper-bg -->

<?php get_footer(); ?>
