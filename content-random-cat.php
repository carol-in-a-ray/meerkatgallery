<?php
/**
 * The template part for displaying 3 random posts
 *
 * @package Meerkat Gallery
 * @since 1.0
 * @version 1.0
 */
?>

  <?php


$categories = get_categories();
shuffle( $categories );
$categories = array_slice( $categories, 0, 1 );

foreach( $categories as $category ) {
$cat_link = esc_url( get_category_link( $category->term_id ) );
$random_cat_id = $category->term_id;
$random_cat_name = esc_attr( $category->name );
}
$search_post_id = get_the_ID();
?>

<div class="random-cats">
  <h2><a href="<?php $cat_link ?>"><?php echo $random_cat_name ?></a></h2>

  <?php
  $random_posts = new WP_Query( array(
      'showposts'       => 3,
      'orderby'         => 'date',
      'post__not_in'    => array(get_option( 'sticky_posts' ), $GLOBALS[ 'search_post_id' ],  ),
      'cat'             => $random_cat_id,
    ));
  if ( $random_posts -> have_posts() ) : while ( $random_posts -> have_posts() ) : $random_posts -> the_post(); ?>

  <div class="the-random-post">

		<div class="random-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'thumbnail' ); ?>
			</a>
		</div><!-- .random-thumbnail -->

		<div class="thumbnail-overlay">
			<div class="random-content">
				<h3><?php the_title(); ?></h3>
        <div class="more-button"><a href="<?php the_permalink(); ?>">Learn More</a></div>
			</div><!-- .random-content" -->
		</div><!-- .thumbnail-overlay -->

  </div><!-- .the-random-post -->

<?php endwhile; wp_reset_query(); endif; ?>

</div><!-- .random-cats -->
