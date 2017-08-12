<?php
/**
 * The functions for our theme
 *
 * @package Meerkat Gallery
 * @since 1.0
 * @version 1.0
 */
?>

<?php
/* Link to the style sheets & fonts */
function bb_main_style() {
  wp_enqueue_style( 'main_css', get_stylesheet_uri(), array(), '1,0,0');
  wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Grand+Hotel', false);
  wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css', false);
}

add_action( 'wp_enqueue_scripts', 'bb_main_style' );



// Change menu order:
function bb_custom_menu_order($menu_ord) {
    if (!$menu_ord) return true;
    return array(
        'index.php', // Dashboard
        'separator1', // First separator
        'edit.php?post_type=page', // Pages
        'edit.php', // Posts
        'upload.php', // Media
        'link-manager.php', // Links
        'edit-comments.php', // Comments
        'separator2', // Second separator
        'themes.php', // Appearance
        'plugins.php', // Plugins
        'users.php', // Users
        'tools.php', // Tools
        'options-general.php', // Settings
        'separator-last', // Last separator
    );
}
add_filter('custom_menu_order', 'bb_custom_menu_order'); // Activate custom_menu_order
add_filter('menu_order', 'bb_custom_menu_order');



/* Enable featured image uploads on posts and pages */
add_theme_support( 'post-thumbnails' );



/*
function add_image_sizes() {
  add_image_size( 'sq-thumbnail' , 300, 300, true);
}
add_action( 'init', 'add_image_sizes' );

// Register the useful image sizes for use in Add Media modal
/*
function display_image_sizes($sizes) {
$sizes['2-col-thumb'] = __( '2 Columned Image' );
return $sizes;
}
add_filter('image_size_names_choose', 'display_image_sizes'); */



/* Enable custom header image */
$custom_header_args = array(
  'flex-width'    => true,
	'width'         => 2000,
  'flex-height'   => true,
	'height'        => 700,
);
add_theme_support( 'custom-header', $custom_header_args );



/* Add Custom logo Support */
function bb_custom_logo_setup() {
    $bb_custom_logo_args = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    );
    add_theme_support( 'custom-logo', $bb_custom_logo_args );
}
add_action( 'after_setup_theme', 'bb_custom_logo_setup' );



/*
* Registers multiple menus; called with wp_nav_menu() function.
* From: http://codex.wordpress.org/Function_Reference/register_nav_menus: This function automatically registers custom menu support for the theme, therefore you do not need to call add_theme_support( 'menus' );
*/
function register_theme_menus() {
  register_nav_menus(
    array(
      'primary-menu' => __( 'Primary Menu' ),
      'secondary-menu' => __( 'Secondary Menu' ),
    )
  );
}

add_action('init', 'register_theme_menus');



// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

global $wp_version;
if ( $wp_version !== '4.7.1' ) {
   return $data;
}

$filetype = wp_check_filetype( $filename, $mimes );

return [
    'ext'             => $filetype['ext'],
    'type'            => $filetype['type'],
    'proper_filename' => $data['proper_filename']
];

}, 10, 4 );

function cc_mime_types( $mimes ){
$mimes['svg'] = 'image/svg+xml';
return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

function fix_svg() {
echo '<style type="text/css">
      .attachment-266x266, .thumbnail img {
           width: 100% !important;
           height: auto !important;
      }
      </style>';
}
add_action( 'admin_head', 'fix_svg' );



// Defines Global Footer Details under Settings > Global Footer Details to specify company contact details for pulling through into the footer. MB

add_action('admin_menu', 'bb_add_gfd_interface');

function bb_add_gfd_interface() {
	add_options_page('Global Footer Details', 'Global Footer Details', '8', 'footer-details', 'bb_global_footer_details');
}

function bb_global_footer_details() {
  ?>
	<div class='wrap'>
	<h2>Global Footer Details</h2>
	<form method="post" action="options.php">
	<?php wp_nonce_field('update-options') ?>

	<p><strong>Email:</strong><br />
	<input type='text' name="email" size="45" value="<?php echo get_option('email'); ?>" /></p>

  <p><strong>Facebook:</strong><br />
  <input type='text' name="facebook" size="45" value="<?php echo get_option('facebook'); ?>" /></p>

	<p><input type="submit" name="Submit" value="Update Options" /></p>

	<input type="hidden" name="action" value="update" />
	<input type="hidden" name="page_options" value="email, facebook" />

	</form>
	</div>
	<?php }


/* How to Obtain a random category */
function get_random_categories( $number, $args = null ) {
$categories = get_categories( $args ); // Get all the categories, optionally with additional arguments

// If there aren't enough categories, use as many as possible to avoid an error
if( $number > count( $categories ) )
  $number = count( $categories );

// If no categories are available or none were requested, return an empty array
if( $number === 0 )
  return array();

shuffle( $categories ); // Mix up the category array randomly

// Return the first $number categories from the shuffled list
return array_slice( $categories, 0, $number );
}



/**************** HERE START THE CUSTOM FIELDS *******************/

/* ARTWORK DETAILS */
  if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_artwork-detail',
		'title' => 'Artwork Detail',
		'fields' => array (
			array (
				'key' => 'field_5989a3835b764',
				'label' => 'Medium',
				'name' => 'medium',
				'type' => 'taxonomy',
				'taxonomy' => 'category',
				'field_type' => 'checkbox',
				'allow_null' => 0,
				'load_save_terms' => 1,
				'return_format' => 'id',
				'multiple' => 0,
			),
			array (
				'key' => 'field_5989a3c65b765',
				'label' => 'Price',
				'name' => 'price',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => 'N$',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5989a3e55b766',
				'label' => 'Status',
				'name' => 'status',
				'type' => 'select',
				'choices' => array (
					'AVAILABLE' => 'AVAILABLE',
					'SOLD' => 'SOLD',
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));

  /* CTA FEILDS */
	register_field_group(array (
		'id' => 'acf_cta',
		'title' => 'CTA',
		'fields' => array (
			array (
				'key' => 'field_5989db71f7901',
				'label' => 'CTA Heading 1',
				'name' => 'cta_heading_1',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5989dbb7f7904',
				'label' => 'CTA URL 1',
				'name' => 'cta_url_1',
				'type' => 'page_link',
				'post_type' => array (
					0 => 'page',
				),
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_5989db89f7902',
				'label' => 'CTA Image 1',
				'name' => 'cta_image_1',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_5989db9cf7903',
				'label' => 'CTA Description 1',
				'name' => 'cta_description_1',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_5989dc39f7905',
				'label' => 'CTA Heading 2',
				'name' => 'cta_heading_2',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5989dc43f7906',
				'label' => 'CTA URL 2',
				'name' => 'cta_url_2',
				'type' => 'page_link',
				'post_type' => array (
					0 => 'page',
				),
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_5989dc55f7907',
				'label' => 'CTA Image 2',
				'name' => 'cta_image_2',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_5989dc5ef7908',
				'label' => 'CTA Description 2',
				'name' => 'cta_description_2',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}


/* CATEGORY IMAGES */
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_category-image',
		'title' => 'Category Image',
		'fields' => array (
			array (
				'key' => 'field_598ac37f22775',
				'label' => 'Category Image',
				'name' => 'category_image',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'medium',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'ef_taxonomy',
					'operator' => '==',
					'value' => 'category',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}



/* ARTIST INSPIRATION */
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_artist-inspiration',
		'title' => 'Artist Inspiration',
		'fields' => array (
			array (
				'key' => 'field_598cb4e550ae1',
				'label' => 'Insp Image 1',
				'name' => 'insp_image_1',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_598cb4d250ae0',
				'label' => 'Inspiration 1',
				'name' => 'inspiration_1',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_598cb5472efd5',
				'label' => 'Insp Description 1',
				'name' => 'insp_description_1',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_598cb4fc50ae3',
				'label' => 'Insp Image 2',
				'name' => 'insp_image_2',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_598cb4f550ae2',
				'label' => 'Inspiration 2',
				'name' => 'inspiration_2',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_598cb5582efd6',
				'label' => 'Insp Description 2',
				'name' => 'insp_description_2',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_598cb51350ae5',
				'label' => 'Insp Image 3',
				'name' => 'insp_image_3',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_598cb50650ae4',
				'label' => 'Inspiration 3',
				'name' => 'inspiration_3',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_598cb5602efd7',
				'label' => 'Insp Description 3',
				'name' => 'insp_description_3',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page',
					'operator' => '==',
					'value' => '9',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}


/* EXHIBITION MAP & APPOINTMENT FIELD */
