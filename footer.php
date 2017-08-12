<?php
/**
 * The footer for our theme
 *
 * @package Meerkat Gallery
 * @since 1.0
 * @version 1.0
 */
?>


<div class="wrapper-bg">

  <footer class="site-footer">

    <?php
      $defaults = array(
        'container' => false,
        'theme_location' => 'secondary-menu',
        'menu_class' => 'secondary-navigation'
      );
    ?><div class="footer-nav">
      <?php wp_nav_menu( $defaults ); ?>
    </div><!-- .footer-nav -->


    <div class="facebook">
      <a href="<?php echo get_option('facebook'); ?>" target="_blank"><img src="<?php site_url(); ?>/wp-content/uploads/2017/08/facebook.svg" alt="" /></a>
    </div><!-- .facebook -->

    <div class="footer-logo">
      <?php if ( function_exists( 'the_custom_logo' ) ) { the_custom_logo(); } ?>
    </div><!-- .footer-logo -->


    <div class="site-info">
      <a href="mailto:<?php echo get_option('email'); ?>"><?php echo get_option('email'); ?></a><br />
      <p>&copy; Both Birds <?php echo ('&nbsp'); echo date('Y'); ?></p>
    </div><!-- .site-info -->

    </footer>
    <?php wp_footer(); ?>


</div><!-- .wrapper-bg -->

</body>
</html>
