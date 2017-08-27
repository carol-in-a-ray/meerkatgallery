<?php
/**
 * The blog page for our theme
 *
 * @package Meerkat Gallery
 * @since 1.0
 * @version 1.0
 */
?>

<main class="blog-page">

  <?php
  $recent_posts = new WP_Query( array(
      'posts_per_page'  => 2,
      'orderby'         => 'date',
      'post__not_in'    => get_option( 'sticky_posts' )
    ));
  if ( $recent_posts -> have_posts() ) : while ( $recent_posts -> have_posts() ) : $recent_posts -> the_post(); ?>

  <div class="the-recent-post">

		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'thumbnail' ); ?>
			</a>
		</div><!-- .post-thumbnail -->

		<div class="thumbnail-overlay">
			<div class="recent-content">
				<h3><?php the_title(); ?></h3>
        <div class="more-button"><a href="<?php the_permalink(); ?>">Learn More</a></div>
			</div><!-- .recent-content" -->
		</div><!-- .thumbnail-overlay -->

  </div><!-- .the-recent-post -->

  <?php endwhile; wp_reset_query();
  the_posts_pagination( array(
    'mid_size'  => 2,
    'prev_text' => __( 'Previous', 'textdomain' ),
    'next_text' => __( 'Next', 'textdomain' ),

  ) );

endif;



?>

</main>
