<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

/**
 * Initialize theme default settings
 */
require get_template_directory() . '/inc/theme-settings.php';

/**
 * Theme setup and custom theme supports.
 */
require get_template_directory() . '/inc/setup.php';

/**
 * Register widget area.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom pagination for this theme.
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom Comments file.
 */
require get_template_directory() . '/inc/custom-comments.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom WordPress nav walker.
 */
require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Load WooCommerce functions.
 */
require get_template_directory() . '/inc/woocommerce.php';

/**
 * Load Editor functions.
 */
require get_template_directory() . '/inc/editor.php';



add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {

            $title = single_cat_title( '', false );

        } elseif ( is_tag() ) {

            $title = single_tag_title( '', false );

        } elseif ( is_author() ) {

            $title = '<span class="vcard">' . get_the_author() . '</span>' ;

        }

    return $title;

});

//add_image_size( 'category-thumb', 300, 9999 ); //300 pixels wide (and unlimited height)



if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)

    // additional image sizes
    // delete the next line if you do not need additional image sizes
    add_image_size( 'widescreen-sm', 300, 168, array( 'center', 'center' )); //300 pixels wide (and unlimited height)
    add_image_size( 'widescreen-md', 600, 338, array( 'center', 'center' )); //300 pixels wide (and unlimited height)

}
// Register new post types
//register_post_type( 'collections',
// CPT Options
//     array(
//         'labels' => array(
//             'name' => __( 'Collections' ),
//             'singular_name' => __( 'Collection' )
//         ),
//         'public' => true,
//         'has_archive' => true,
//         'rewrite' => array('slug' => 'collections'),
//         'show_in_rest' => true,
//
//     )
// );

// Hooking up our function to theme setup
//add_action( 'init', 'create_posttype' );

if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'id' => 'instagram-feed-area',
    'name' => 'Instagram Feed',
    'before_widget' => '<div class = "instagram-feed-area">',
    'description' => 'Instagram or other social media widget.',
    'after_widget' => '</div>',
    'before_title' => '<div class="col-header"><h2 class="display-3">',
    'after_title' => '</h2></div>',
  )
);
