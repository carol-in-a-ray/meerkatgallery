<?php
/**
 * The template part for displaying the artist's inspiration
 *
 * @package Meerkat Gallery
 * @since 1.0
 * @version 1.0
 */
?>
<?php global $wp_query;
$postid = $wp_query->post->ID; ?>


<?php if( get_field('inspiration_1', $postid) ): ?>
    <div class="inspiration_1">

      <div class="insp-content">

        <div class="insp-thumbnail">
          <img src="<?php the_field('insp_image_1', $postid); ?>" alt=""/>
        </div><!-- .insp-thumbnail -->

        <div class="insp-info">
          <h3><?php the_field('inspiration_1', $postid); ?></h3>
          <p><?php the_field('insp_description_1', $postid) ?></p>
        </div><!-- .insp-info -->

      </div><!-- .insp-content -->

    </div>

<?php endif; ?>


<?php if( get_field('inspiration_2', $postid) ): ?>
    <div class="inspiration_2">

      <div class="insp-content">

        <div class="insp-thumbnail">
          <img src="<?php the_field('insp_image_2', $postid); ?>" alt=""/>
        </div><!-- .insp-thumbnail -->

        <div class="insp-info">
          <h3><?php the_field('inspiration_2', $postid); ?></h3>
          <p><?php the_field('insp_description_2', $postid) ?></p>
        </div><!-- .insp-info -->

      </div><!-- .insp-content -->

    </div>

<?php endif; ?>


<?php if( get_field('inspiration_3', $postid) ): ?>
    <div class="inspiration_3">

      <div class="insp-content">

        <div class="insp-thumbnail">
          <img src="<?php the_field('insp_image_3', $postid); ?>" alt=""/>
        </div><!-- .insp-thumbnail -->

        <div class="insp-info">
          <h3><?php the_field('inspiration_3', $postid); ?></h3>
          <p><?php the_field('insp_description_3', $postid) ?></p>
        </div><!-- .insp-info -->

      </div><!-- .insp-content -->

    </div>

<?php endif; ?>
