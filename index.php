<?php
/**
 * The index for our theme
 *
 * @package Meerkat Gallery
 * @since 1.0
 * @version 1.0
 */
?>


<?php get_header(); ?>

<div class="wrapper-bg">
  <div class="wrapper">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      <h1><?php the_title(); ?></h1>
      <p><?php the_content(); ?></p>

    <?php endwhile; else : ?>

      <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

    <?php endif; ?>

  </div><!-- .wrapper -->
</div><!-- .wrapper-bg -->

<?php get_footer(); ?>
