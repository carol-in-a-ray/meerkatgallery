<?php
/**
 *
 *  Template Name: Contact Page
 *
 * The contact page for our theme
 *
 * @package Meerkat Gallery
 * @since 1.0
 * @version 1.0
 */
?>

<?php get_header(); ?>

<div class="wrapper-bg">
  <div class="wrapper">

    <main class="contact-page">

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      <?php the_title('<h1>','</h1>'); ?>
      <?php the_content(); ?>

      <?php endwhile; endif;  ?>

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
