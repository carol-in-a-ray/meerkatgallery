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
        <?php if( get_the_post_thumbnail() ) : ?>
          <div class="post-featured-img">
            <?php the_post_thumbnail('large'); ?>
          </div>
        <?php endif; ?>
        <p><?php the_content(); ?></p>
      </article>


      <div class="artwork-details">
        <p class="categories"><strong>Media: </strong><?php the_category(', '); ?></p>
        <p><strong>Status: </strong><?php the_field('status'); ?></p>
        <p><strong>Price:</strong> N$<?php the_field('price'); ?></p>
      </div><!-- .artwork-details -->


      <div class="pagination">
        <div class="previous"><?php if ( previous_post_link('%link', '&laquo;&laquo; Previous post') ); ?></div>
        <div class="back-home"><a href="<?php bloginfo('url'); ?>/blog">Back to the Homepage</a></div>
        <div class="next"><?php if ( next_post_link('%link', 'Next post &raquo;&raquo;') ); ?></div>
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
