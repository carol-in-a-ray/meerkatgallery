<?php
/**
 * The category page for our theme
 *
 * @package Meerkat Gallery
 * @since 1.0
 * @version 1.0
 */
?>

<?php get_header(); ?>

<div class="wrapper-bg">
  <div class="wrapper">

    <main class="category-page">

      <h1><?php single_cat_title(); ?></h1>
      <p><?php echo category_description( ); ?></p>

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      <div class="the-cat-post">

  			<div class="post-thumbnail">
  				<a href="<?php the_permalink(); ?>">
  					<?php the_post_thumbnail( 'thumbnail' ); ?>
  				</a>
  			</div><!-- .post-thumbnail -->

  			<div class="thumbnail-overlay">
  				<div class="cat-content">
  					<h3><?php the_title(); ?></h3>
  					<div class="more-button"><a href="<?php the_permalink(); ?>">Learn More</a></div>
  				</div><!-- .sticky-content" -->
  			</div><!-- .thumbnail-overlay -->

      </div>


      <?php endwhile; else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
      <?php endif; ?>

      <?php
        the_posts_pagination( array(
          'mid_size'  => 2,
          'prev_text' => __( 'Back', 'textdomain' ),
          'next_text' => __( 'Next', 'textdomain' ),
        ) );
      ?>

    </main>


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


    <aside class="sticky-posts-bg-none">
        <h2>Featured Artworks</h2>
        <div class="sticky-posts">
          <?php get_template_part('content', 'sticky'); ?>
        </div><!-- .sticky-posts -->
    </aside>


  </div><!-- .wrapper -->
</div><!-- .wrapper-bg -->

<?php get_footer(); ?>
