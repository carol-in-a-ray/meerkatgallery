<?php
/**
 * The template part for displaying pagination
 *
 * @package Meerkat Gallery
 * @since 1.0
 * @version 1.0
 */
?>


<?php
$previous_post_link = get_previous_post_link( '%link', '&laquo;&laquo; Previous post' );
$next_post_link = get_next_post_link( '%link', 'Next post &raquo;&raquo;' );
?>


<?php if ( $previous_post_link ) : ?>
    <div class="previous">
        <?php echo $previous_post_link; ?>
    </div>
  <?php else : ?>
    <div class="inactive">
        <a>Previous Post</a>
    </div>
    <?php endif; ?>

<?php if ( $next_post_link ) : ?>
    <div class="next">
        <?php echo $next_post_link; ?>
    </div>
<?php else : ?>
  <div class="inactive">
      <a>Next Post</a>
  </div>
  <?php endif; ?>

<div class="back-home"><a href="<?php bloginfo('url'); ?>">Back to the Homepage</a></div>
