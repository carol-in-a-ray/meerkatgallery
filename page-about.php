<?php
/**
 *
 *  Template Name: About Page
 *
 * The about page for our theme
 *
 * @package Meerkat Gallery
 * @since 1.0
 * @version 1.0
 */
?>

<?php get_header(); ?>

<div class="wrapper-bg">
  <div class="wrapper">

    <main class="about-page">

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      <?php the_title('<h1>','</h1>'); ?>
      <?php the_content(); ?>

      <?php endwhile; endif;  ?>

    </main>

    <aside class="artist-inspiration">
      <h2>My Inspiration</h2>
      <aside class="artist-inspiration-flex">
      <?php get_template_part('content', 'artist-inspiration'); ?>
    </aside>


    </div><!-- .wrapper - close for full black BG -->
    <aside class="cat-list">
      <div class="wrapper">
        <h2>Browse by Media</h2>
        <div class="cat-list-flex">
        <?php get_template_part('content', 'cat-list');  ?>
        </div><!-- .cat-list-flex -->
      </div><!-- .wrapper -->
    </aside>
    <div class="wrapper">


    <aside class="featured-links">
      <?php get_template_part('content', 'featured-links'); ?>
    </aside>




  </div><!-- .wrapper -->
</div><!-- .wrapper-bg -->

<?php get_footer(); ?>
