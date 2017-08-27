<?php
/**
 * The single page template for our theme
 *
 * @package Meerkat Gallery
 * @since 1.0
 * @version 1.0
 */
?>

<?php get_header(); ?>

<div class="wrapper-bg">
  <div class="wrapper">

    <main class="single-post">

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


      <article>
        <h1><?php the_title(); ?></h1>

        <?php //here we do a conditional statement to check the size of the image. The div receives display flex if portrait ?>
        <?php if( get_the_post_thumbnail() ) :
          $image_data = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "large" );
          $image_width = $image_data[1];
          $image_height = $image_data[2];

          if ($image_width > $image_height) { ?>
            <!-- LANDSCAPE -->
            <div class="post-landscape">
          <?php } else { ?>

            <!-- PORTRAIT OR SQUARE -->
            <div class="post-portrait">
          <?php } endif; ?>


            <div class="post-featured-img zoom" id='ex2'>
              <?php the_post_thumbnail('large'); ?>
            </div>

            <div class="single-content">
              <p><?php the_content(); ?></p>
              <div class="artwork-details">
                <p class="categories"><strong>Media: </strong><?php the_category(', '); ?></p>
                <p><strong>Status: </strong><?php the_field('status'); ?></p>
                <p><strong>Price:</strong> N$<?php the_field('price'); ?></p>
              </div><!-- .artwork-details -->
            </div><!-- .single-content -->

          </div><!-- .post-landscape/portrait -->


      </article>



      <div class="pagination">
        <?php get_template_part('content', 'pagination'); ?>
      </div><!-- .pagination -->


      <?php endwhile; else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
      <?php endif; ?>

    </main><!-- .single-post -->


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


    <aside class="random-cat-wrapper">
      <?php get_template_part('content', 'random-cat'); ?>
    </aside>


  </div><!-- .wrapper -->
</div><!-- .wrapper-bg -->

<?php get_footer(); ?>
