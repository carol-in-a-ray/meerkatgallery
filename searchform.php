<?php
/**
 * Template for displaying search forms in Meerkat Gallery
 *
 * @package Meerkat Gallery
 * @since 1.0
 * @version 1.0
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">

  <label class="screen-reader-text" for="s">' . __('',  'domain') . '</label>

  <input type="text" value="" name="s" id="s" placeholder="Search..."/>
  <input type="hidden" value="1" name="sentence" />

  <button><i class="fa fa-search"></i></button>

</form>
