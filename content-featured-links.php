<?php
/**
 * The template part for displaying our featured links
 *
 * @package Meerkat Gallery
 * @since 1.0
 * @version 1.0
 */
?>
<?php global $wp_query;
$postid = $wp_query->post->ID; ?>


<?php if( get_field('cta_heading_1', $postid) ): ?>
    <div class="cta-link-1">

      <h3><?php the_field('cta_heading_1', $postid); ?></h3>

      <div class="cta-content">

        <div class="cta-thumbnail">
          <img src="<?php the_field('cta_image_1', $postid); ?>" alt=""/>
        </div><!-- .cta-thumbnail -->

        <div class="cta-info">
          <p><?php the_field('cta_description_1', $postid) ?></p>
          <div class="more-button"><a href="<?php the_permalink(); ?>">Learn More</a></div>
        </div><!-- .cta-info -->

      </div><!-- .cta-content -->

    </div>

<?php endif; ?>

<?php if( get_field('cta_heading_2', $postid) ): ?>
    <div class="cta-link-2">

      <h3><?php the_field('cta_heading_2', $postid); ?></h3>

      <div class="cta-content">

        <div class="cta-thumbnail">
          <img src="<?php the_field('cta_image_2', $postid); ?>" alt=""/>
        </div><!-- .cta-thumbnail -->

        <div class="cta-info">
          <p><?php the_field('cta_description_2', $postid) ?></p>
          <div class="more-button"><a href="<?php the_permalink(); ?>">Learn More</a></div>
        </div><!-- .cta-info -->

      </div><!-- .cta-content -->

    </div>

<?php endif; ?>
