<?php
/**
 * The header for our theme
 *
 * @package Meerkat Gallery
 * @since 1.0
 * @version 1.0
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js" lang="en"><!-- class="no-js" - This ensures your theme will not break (too badly) when JavaScript is not installed on someones browser. Its function resides in functions.php -->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); bloginfo( 'name' )?></title>
<?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>

  <div class="wrapper-bg">


		<header class="site-header">
			<div class="custom-header-media">
				<?php the_custom_header_markup(); ?>
			</div>
		</header><!-- .site-header -->


	<?php
	  $defaults = array(
	    'container' => false,
	    'theme_location' => 'primary-menu',
	    'menu_class' => 'main-navigation'
	  );

		//Mobile Navigation
		?><div class="nav-top-bar">
      <div class="navigation-top">
  				<input data-function='swipe' id='swipe' type='checkbox' class="mob-nav-toggle">
  				<label data-function='swipe' for='swipe' class="three-bars mob-nav-toggle">
  						<span class="bar1"></span>
  						<span class="bar2"></span>
  						<span class="bar3"></span>
  				</label>

  			<nav class="main-nav">
  				<?php wp_nav_menu( $defaults ); ?>
  			</nav>

        <div class="search-bar">
          <?php get_search_form(); ?>
        </div>

  		</div><!-- .navigation-top-->



    </div><!-- .nav-top-bar -->

	</div><!-- .wrapper-bg -->
