<?php
/**
 *
 *  Template Name: Exhibition Page
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

    <main class="exhibition-page">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?php the_title('<h1>','</h1>'); ?>
      <?php the_content(); ?>
      <?php endwhile; endif;  ?>


      </div><!-- .wrapper - close for full map -->
        <?php if( get_field('location') ): ?>
        <div class="location">
          <?php the_field('location', '7' ); ?>
        </div>
        <?php endif; ?>
      <div class="wrapper">


      <!-- Appointment Field -->
      <?php if( get_field( 'appointment_heading', '7' ) ): ?>
      <div class="appointment">
        <h2><?php the_field('appointment_heading', '7' ); ?></h2>
        <p><?php the_field('appointment_description', '7' ) ?></p>
        <div class="make_app"><a href="<?php site_url(); ?>/contact/">Make an Appointment</a></div>
      </div>
      <?php endif; ?>
    </main><!-- .exhibition-page -->


    <!-- Cat List Field -->
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


    <!-- CTA Field -->
    <aside class="featured-links">
      <?php get_template_part('content', 'featured-links'); ?>
    </aside>


  </div><!-- .wrapper -->
</div><!-- .wrapper-bg -->

<?php get_footer(); ?>
