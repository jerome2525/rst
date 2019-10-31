<?php
/**
 * Rapid STD Testing
 *
 * Customize Theme for RST.
 *
 * @package Starter Theme
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    http://www.studiopress.com/
 */

// Start the engine.
include_once( get_template_directory() . '/lib/init.php' );

// Setup Theme.
include_once( get_stylesheet_directory() . '/lib/theme-defaults.php' );

// Set Localization (do not remove).
add_action( 'after_setup_theme', 'rst_localization_setup' );
function rst_localization_setup(){
	load_child_theme_textdomain( 'rst', get_stylesheet_directory() . '/languages' );
}

// Add the helper functions.
include_once( get_stylesheet_directory() . '/lib/helper-functions.php' );

// Add Image upload and Color select to WordPress Theme Customizer.
require_once( get_stylesheet_directory() . '/lib/customize.php' );

// Include Customizer CSS.
include_once( get_stylesheet_directory() . '/lib/output.php' );

// Add WooCommerce support.
include_once( get_stylesheet_directory() . '/lib/woocommerce/woocommerce-setup.php' );

// Add the required WooCommerce styles and Customizer CSS.
include_once( get_stylesheet_directory() . '/lib/woocommerce/woocommerce-output.php' );

// Add the Genesis Connect WooCommerce notice.
include_once( get_stylesheet_directory() . '/lib/woocommerce/woocommerce-notice.php' );

// Add Custom shortcode
include_once( get_stylesheet_directory() . '/inc/custom-shortcode.php' );

// Child theme (do not remove).
define( 'CHILD_THEME_NAME', 'RST' );
define( 'CHILD_THEME_URL', 'http://www.studiopress.com/' );
define( 'CHILD_THEME_VERSION', '2.3.0' );

// Enqueue Scripts and Styles.
add_action( 'wp_enqueue_scripts', 'rst_enqueue_scripts_styles' );
function rst_enqueue_scripts_styles() {

	// CSS
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Poppins:100,200,300,300i,400,400i,500,600,700,700i,800,900&display=swap' );
	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'slicktheme', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css', array(), CHILD_THEME_VERSION );
        wp_enqueue_style( 'slicktheme-min', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css', array(), CHILD_THEME_VERSION );
       	wp_enqueue_style( 'slicktheme-map', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css.map', array(), CHILD_THEME_VERSION );
      	wp_enqueue_style( 'slick', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css', array(), CHILD_THEME_VERSION ); 
      	
  	wp_enqueue_style( 'child', get_stylesheet_directory_uri() . '/child.css', array(), CHILD_THEME_VERSION );
	wp_enqueue_style( 'dashicons' );
  
  // JS
  //wp_enqueue_script( 'jquery-ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', array( 'jquery' ), "1.12.1" ); // sample
	wp_enqueue_script( 'slick', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js', array( 'jquery' ), CHILD_THEME_VERSION, true );
	wp_enqueue_script ( 'matchheight' , '//cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js', array( 'jquery' ), CHILD_THEME_VERSION, true );
	//wp_enqueue_script( 'mansory', '//unpkg.com/isotope-layout@3/dist/isotope.pkgd.js', array( 'jquery' ), CHILD_THEME_VERSION, true );
	//wp_enqueue_script( 'mansory2', '//unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js', array( 'jquery' ), CHILD_THEME_VERSION, true );
  	wp_enqueue_script( 'child-js', get_stylesheet_directory_uri() . '/js/child.js', array( 'jquery' ), CHILD_THEME_VERSION );

	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	//wp_enqueue_script( 'rst-responsive-menu', get_stylesheet_directory_uri() . "/js/responsive-menus{$suffix}.js", array( 'jquery' ), CHILD_THEME_VERSION, true );
	//wp_localize_script(
		//'rst-responsive-menu',
		//'genesis_responsive_menu',
		//rst_responsive_menu_settings()
	//);

}

// Define our responsive menu settings.
function rst_responsive_menu_settings() {

	$settings = array(
		'mainMenu'          => __( 'Menu', 'rst' ),
		'menuIconClass'     => 'dashicons-before dashicons-menu',
		'subMenu'           => __( 'Submenu', 'rst' ),
		'subMenuIconsClass' => 'dashicons-before dashicons-arrow-down-alt2',
		'menuClasses'       => array(
			'combine' => array(
				'.nav-primary',
				'.nav-header',
			),
			'others'  => array(),
		),
	);

	return $settings;

}


/** CHANGE ADMIN CSS **/
/** http://www.code-slap.com/4-space-tabs-in-textarea-editors/ **/
if ( !function_exists('base_admin_css') ) {
	function base_admin_css()
	{
		wp_enqueue_style('base-admin-css', get_stylesheet_directory_uri() .'/admin.css', false, '1.0', 'all');
	}
	add_action( 'admin_print_styles', 'base_admin_css' );
}


// Add HTML5 markup structure.
add_theme_support( 'html5', array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ) );

// Add Accessibility support.
add_theme_support( 'genesis-accessibility', array( '404-page', 'drop-down-menu', 'headings', 'rems', 'search-form', 'skip-links' ) );

// Add viewport meta tag for mobile browsers.
add_theme_support( 'genesis-responsive-viewport' );

// Add support for custom header.
add_theme_support( 'custom-header', array(
	'width'           => 600,
	'height'          => 160,
	'header-selector' => '.site-title a',
	'header-text'     => false,
	'flex-height'     => true,
) );

// Add support for custom background.
add_theme_support( 'custom-background' );

// Add support for after entry widget.
add_theme_support( 'genesis-after-entry-widget-area' );

// Add support for 3-column footer widgets.
add_theme_support( 'genesis-footer-widgets', 3 );

// Add Image Sizes.
add_image_size( 'featured-image', 720, 400, TRUE );

// Rename primary and secondary navigation menus.
//add_theme_support( 'genesis-menus', array( 'primary' => __( 'After Header Menu', 'rst' ), 'secondary' => __( 'Footer Menu', 'rst' ) ) );

// Reposition the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 5 );

// Reduce the secondary navigation menu to one level depth.
//add_filter( 'wp_nav_menu_args', 'rst_secondary_menu_args' );
function rst_secondary_menu_args( $args ) {

	if ( 'secondary' != $args['theme_location'] ) {
		return $args;
	}

	$args['depth'] = 1;

	return $args;

}

// Modify size of the Gravatar in the author box.
add_filter( 'genesis_author_box_gravatar_size', 'rst_author_box_gravatar' );
function rst_author_box_gravatar( $size ) {
	return 90;
}

// Modify size of the Gravatar in the entry comments.
add_filter( 'genesis_comment_list_args', 'rst_comments_gravatar' );
function rst_comments_gravatar( $args ) {

	$args['avatar_size'] = 60;

	return $args;

}


add_action( 'get_header', 'rst_remove_titles_all_single_pages' );
function rst_remove_titles_all_single_pages() {
    if ( is_singular() ) {
        remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
        remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
        remove_action( 'genesis_after_post_content', 'genesis_post_meta', 12 );
        remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_open', 5 );
		remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_close', 15 );
		remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
    }
}

add_action('template_redirect', 'remove_primary_nav_front_page');
function remove_primary_nav_front_page() {
	remove_action('genesis_after_header', 'genesis_do_nav');
}


add_filter( 'wpsl_templates', 'custom_templates' );

function custom_templates( $templates ) {

    /**
     * The 'id' is for internal use and must be unique ( since 2.0 ).
     * The 'name' is used in the template dropdown on the settings page.
     * The 'path' points to the location of the custom template,
     * in this case the folder of your active theme.
     */
    $templates[] = array (
        'id'   => 'custom',
        'name' => 'Custom template',
        'path' => get_stylesheet_directory() . '/' . 'wpsl-templates/custom.php',
    );

    return $templates;
}


add_filter( 'fl_builder_loop_query_args', 'fl_builder_loop_query_args_filter' );
function fl_builder_loop_query_args_filter( $query_args ) {
	if ( !class_exists('ACF') ) {
		return;
	}

	if ( 'locationchild1' == $query_args['settings']->id ) {
		$query_args['post_parent'] = get_the_ID();
	}
	elseif ( 'locationchild2' == $query_args['settings']->id ) {
		$query_args['post_parent'] = 3025;
	}
	elseif ( 'locationblog1' == $query_args['settings']->id ) {
		if( get_field('state_name') ) {
			$tax_query = array(
			    'tax_query' => array(
			        array(
			            'taxonomy' => 'post_tag',
			            'field'    => 'name',
			            'terms'    => get_field('state_name'),
			        ),
			    ),
			);

			$query_args['tax_query'] = $tax_query;
		}
		elseif( get_field('city_state_name') ) {
			$tax_query = array(
			    'tax_query' => array(
			        array(
			            'taxonomy' => 'post_tag',
			            'field'    => 'name',
			            'terms'    => get_field('city_state_name'),
			        ),
			    ),
			);

			$query_args['tax_query'] = $tax_query;
		}
		elseif( get_field('location_state') ) {
			$tax_query = array(
			    'tax_query' => array(
			        array(
			            'taxonomy' => 'post_tag',
			            'field'    => 'name',
			            'terms'    => get_field('location_state'),
			        ),
			    ),
			);

			$query_args['tax_query'] = $tax_query;
		}
	}
    return $query_args;
}

add_filter( 'the_content', 'remove_divi_shortcodes' );
function remove_divi_shortcodes( $content ) {
    $content = preg_replace('/\[\/?et_pb.*?\]/', '', $content);
    return $content;
}




