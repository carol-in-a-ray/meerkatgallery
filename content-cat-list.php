<?php
/**
 * The category list for our theme
 *
 * @package Meerkat Gallery
 * @since 1.0
 * @version 1.0
 */
?>

<?php
$categories = get_categories( array(
    'orderby' => 'name',
    'order'   => 'ASC'
) );

foreach( $categories as $category ) {
    $cat_link = esc_url( get_category_link( $category->term_id ) );
    $cat_name = esc_attr( $category->name );
    $cat_id = $category->term_id;
    ?>

    <div class="cat-link">

			<div class="cat-thumbnail">
				<a href="<?php echo $cat_link ?>">
					<img src="<?php the_field('category_image', 'category_' . $cat_id ); ?>" alt="" />
				</a>
			</div><!-- .cat-thumbnail -->

			<div class="cat-overlay">
				<div class="cat-content">
					<h3><a href="<?php echo $cat_link ?>"><?php echo $cat_name ?></a></h3>
				</div><!-- .cat-content" -->
			</div><!-- .cat-overlay -->

    </div>


<?php } ?>
