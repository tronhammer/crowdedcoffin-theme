<?php
/**
 * Crowded Coffin functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link http://codex.wordpress.org/Theme_Development
 * @link http://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Crowded_Coffin
 * @since Crowded Coffin 1.0
 */

if ( ! function_exists( 'crowdedcoffin_setup' ) ) :
/**
 * Crowded Coffin setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 * @since Crowded Coffin 1.0
 */
function crowdedcoffin_setup() {

	/*
	 * Make Crowded Coffin available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Crowded Coffin, use a find and
	 * replace to change 'crowdedcoffin' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'crowdedcoffin', get_template_directory() . '/languages' );

	// Enable support for Post Thumbnails, and declare two sizes.
	// add_theme_support( 'post-thumbnails' );
	// set_post_thumbnail_size( 672, 372, true );
	// add_image_size( 'crowdedcoffin-full-width', 1038, 576, true );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
	) );

		// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'crowdedcoffin_custom_background_args', array(
		'default-color' => 'f5f5f5',
	) ) );
}
endif; // crowdedcoffin_setup
add_action( 'after_setup_theme', 'crowdedcoffin_setup' );

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since Crowded Coffin 1.0
 */
function crowdedcoffin_scripts() {
	wp_deregister_script('jquery');
	wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"), false, '1.9.1');
	wp_enqueue_script('jquery');

	wp_enqueue_style( 'jquery-ui', get_template_directory_uri() . '/css/jquery-ui.min.css', array(), '3.0.2' );

	// Load our main stylesheet.
	wp_enqueue_style( 'crowdedcoffin-style', get_stylesheet_uri(), array() );

	wp_enqueue_script( 'crowdedcoffin-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20140319', true );
	wp_enqueue_script( 'crowdedcoffin-jquery-ui', get_template_directory_uri() . '/js/jquery-ui.min.js', array( 'jquery' ), '20131209', true );
	// wp_enqueue_script( 'crowdedcoffin-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', '20131209', true );
}
add_action( 'wp_enqueue_scripts', 'crowdedcoffin_scripts' );

if ( ! function_exists( 'crowdedcoffin_the_attached_image' ) ) :
/**
 * Print the attached image with a link to the next attached image.
 *
 * @since Crowded Coffin 1.0
 */
function crowdedcoffin_the_attached_image() {
	$post                = get_post();
	/**
	 * Filter the default Crowded Coffin attachment size.
	 *
	 * @since Crowded Coffin 1.0
	 *
	 * @param array $dimensions {
	 *     An array of height and width dimensions.
	 *
	 *     @type int $height Height of the image in pixels. Default 810.
	 *     @type int $width  Width of the image in pixels. Default 810.
	 * }
	 */
	$attachment_size     = apply_filters( 'crowdedcoffin_attachment_size', array( 810, 810 ) );
	$next_attachment_url = wp_get_attachment_url();

	/*
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL
	 * of the next adjacent image in a gallery, or the first image (if we're
	 * looking at the last image in a gallery), or, in a gallery of one, just the
	 * link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID',
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id ) {
			$next_attachment_url = get_attachment_link( $next_id );
		}

		// or get the URL of the first image attachment.
		else {
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
		}
	}

	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;



class cc_walker_nav_menu extends Walker_Nav_Menu {
	  
	// add classes to ul sub-menus
	function start_lvl( &$output, $depth = 0, $args = array() ) {
	    $output .= PHP_EOL.'<div class="sub-menu-container row">';
	}

	// add main/sub classes to li's and links
	 function start_el(  &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
	    $output .= PHP_EOL.'    <div class="menu-item columns">'.PHP_EOL.'<a href="#!'.basename($item->url).'">'.apply_filters( 'the_title', $item->title, $item->ID ).'</a>';
	}

	// add classes to ul sub-menus
	function end_lvl( &$output, $depth = 0, $args = array() ) {
	    $output .= PHP_EOL.'</div>';
	}

		// add classes to ul sub-menus
	function end_el( &$output, $depth = 0, $args = array() ) {
	    $output .= PHP_EOL.'    </div>';
	}

}