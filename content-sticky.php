<?php
/**
 * The template part for displaying the 3 latest sticky posts
 *
 * @package Meerkat Gallery
 * @since 1.0
 * @version 1.0
 */
?>

<?php
/* display sticky posts */
$sticky_args = array(
	'showposts'						=> 4, //not sure about this
	'post__in'  					=> get_option( 'sticky_posts' ),
	'ignore_sticky_posts' => 1 //not sure about this
);
$sticky_query = new WP_Query( $sticky_args );

if ($sticky_query->have_posts() ) : while ($sticky_query->have_posts() ) : $sticky_query->the_post(); ?>

<div class="the-sticky-post">

			<div class="post-thumbnail">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail( 'thumbnail' ); ?>
				</a>
			</div><!-- .post-thumbnail -->

			<div class="thumbnail-overlay">
				<div class="sticky-content">
					<h3><?php the_title(); ?></h3>
					<?php //<p class="categories">Media: <?php the_category(', '); ?>
					<div class="more-button"><a href="<?php the_permalink(); ?>">Learn More</a></div>
				</div><!-- .sticky-content" -->
			</div><!-- .thumbnail-overlay -->

</div>


<?php endwhile; endif;
