<?php
/*----------------------------------------------------------------------------*/
/* Actions & Hooks
/*----------------------------------------------------------------------------*/

register_activation_hook( __FILE__, 'wap8_portfolio_mgmt_activation', 10 );
add_action( 'init', 'wap8_portfolio_services', 10 );
add_action( 'init', 'wap8_portfolio_tags', 10 );
add_action( 'init', 'wap8_portfolio', 10 );

/*----------------------------------------------------------------------------*/
/* Portfolio Services
/*----------------------------------------------------------------------------*/

/**
 * Portfolio Services
 *
 * Register wap8-services as a hierarchical custom taxonomy for wap8-portfolio.
 *
 * @package Portfolio Mgmt.
 * @version 1.0.0
 * @since 2.0.0 added saved settings to registration
 * @author Heavy Heavy <@heavyheavyco>
 *
 */

function wap8_portfolio_services() {

    $custom_post_type_slug = @get_option( 'wap8-cpt-slug' ) ? @get_option( 'wap8-cpt-slug' ) : 'portfolio';
    $slug = @get_option( 'wap8-hct-slug' ) ? @get_option( 'wap8-hct-slug' ) : 'services';
    $singular = @get_option( 'wap8-hct-singular' ) ? @get_option( 'wap8-hct-singular' ) : _x( 'Service' , 'taxonomy singular name', 'portfolio-mgmt' );
    $plural = @get_option( 'wap8-hct-plural' ) ? @get_option( 'wap8-hct-plural' ) : _x( 'Services' , 'taxonomy plural name', 'portfolio-mgmt' );;

    $additional_labels = array(
		'name'                       => $plural,
		'singular_name'              => $singular,
		'search_items'               => __( 'Search ' . $plural, 'portfolio-mgmt' ),
		'popular_items'              => __( 'Popular ' . $plural, 'portfolio-mgmt' ),
		'all_items'                  => __( 'All ' . $plural, 'portfolio-mgmt' ),
		'view_item'                  => __( 'View ' . $singular, 'portfolio-mgmt' ),
		'parent_item'                => __( 'Parent ' . $singular, 'portfolio-mgmt' ),
		'parent_item_colon'          => __( 'Parent ' . $singular . ':', 'portfolio-mgmt' ),
		'edit_item'                  => __( 'Edit ' . $singular, 'portfolio-mgmt' ),
		'update_item'                => __( 'Update ' . $singular, 'portfolio-mgmt' ),
		'add_new_item'               => __( 'Add New ' . $singular, 'portfolio-mgmt' ),
		'new_item_name'              => __( 'New ' . $singular, 'portfolio-mgmt' ),
		'separate_items_with_commas' => __( 'Separate ' . $plural . ' with commas', 'portfolio-mgmt' ),
		'add_or_remove_items'        => __( 'Add or remove ' . $plural, 'portfolio-mgmt' ),
		'choose_from_most_used'      => __( 'Choose from Most Used ' . $plural, 'portfolio-mgmt' ),
		'not_found'                  => __( 'No ' . $singular . ' found.', 'portfolio-mgmt' ),
	);

	$args = array(
		'labels'            => $additional_labels,
		'public'            => true,
		'hierarchical'      => true,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => false,
		'args'              => array(
			'orderby' => 'term_order'
			),
		'rewrite'           => array(
			'slug'       => $custom_post_type_slug . '/' . $slug,
			'with_front' => false ),
		'query_var'         => true,
	);

	$args = apply_filters( 'portfolio_mgmt_services_args', $args );

	// register services as a custom taxonomy
	register_taxonomy(
		'wap8-services',  // unique handle to avoid potential conflicts
		'wap8-portfolio', // this custom taxonomy should only be associated with our custom post type registered in wap8-portfolio-registration.php
		$args             // array of arguments for this custom taxonomy
	);

    flush_rewrite_rules();

}

/*----------------------------------------------------------------------------*/
/* Portfolio Tags
/*----------------------------------------------------------------------------*/

/**
 * Portfolio Tags
 *
 * Register wap8-portfolio-tags as a hierarchical custom taxonomy for wap8-portfolio.
 *
 * @package Portfolio Mgmt.
 * @version 1.0.0
 * @since 2.0.0 added saved settings to registration
 * @author Heavy Heavy <@heavyheavyco>
 *
 */

function wap8_portfolio_tags() {

    $custom_post_type_slug = @get_option( 'wap8-cpt-slug' ) ? @get_option( 'wap8-cpt-slug' ) : 'portfolio';
    $slug = @get_option( 'wap8-nhct-slug' ) ? @get_option( 'wap8-nhct-slug' ) : 'service-tags';
    $singular = @get_option( 'wap8-nhct-singular' ) ? @get_option( 'wap8-nhct-singular' ) : _x( 'Portfolio Tag' , 'taxonomy singular name', 'portfolio-mgmt' );
    $plural = @get_option( 'wap8-nhct-plural' ) ? @get_option( 'wap8-nhct-plural' ) : _x( 'Portfolio Tags' , 'taxonomy plural name', 'portfolio-mgmt' );

	$additional_labels = array(
		'name'                       => _x( $plural, 'taxonomy plural name', 'portfolio-mgmt' ),
		'singular_name'              => _x( $singular, 'taxonomy singular name', 'portfolio-mgmt'),
		'search_items'               => __( 'Search ' . $plural, 'portfolio-mgmt' ),
		'popular_items'              => __( 'Popular ' . $plural, 'portfolio-mgmt' ),
		'all_items'                  => __( 'All ' . $plural, 'portfolio-mgmt' ),
		'view_item'                  => __( 'View ' . $singular, 'portfolio-mgmt' ),
		'edit_item'                  => __( 'Edit ' . $singular, 'portfolio-mgmt' ),
		'update_item'                => __( 'Update ' . $singular, 'portfolio-mgmt' ),
		'add_new_item'               => __( 'Add New ' . $singular, 'portfolio-mgmt' ),
		'new_item_name'              => __( 'New ' . $singular, 'portfolio-mgmt' ),
		'separate_items_with_commas' => __( 'Separate ' . $plural . ' with commas', 'portfolio-mgmt' ),
		'add_or_remove_items'        => __( 'Add or Remove ' . $plural, 'portfolio-mgmt' ),
		'choose_from_most_used'      => __( 'Choose from Most Used ' . $plural, 'portfolio-mgmt' ),
		'not_found'                  => __( 'No ' . $singular . ' found.', 'portfolio-mgmt' ),
	);

	$args = array(
		'labels'            => $additional_labels,
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => false,
		'args'              => array(
			'orderby' => 'term_order'
			),
		'rewrite'           => array(
			'slug'       => $custom_post_type_slug . '/' . $slug,
			'with_front' => false,
			),
		'query_var'         => true,
	);

	$args = apply_filters( 'portfolio_mgmt_portfolio_tag_args', $args );

	// register portfolio tags as a custom taxonomy
	register_taxonomy(
		'wap8-portfolio-tags', // unique handle to avoid potential conflicts
		'wap8-portfolio',      // this custom taxonomy should only be associated with our custom post type registered in wap8-portfolio-registration.php
		$args                  // array of arguments for this custom taxonomy
	);

    flush_rewrite_rules();

}

/*----------------------------------------------------------------------------*/
/* Portfolio
/*----------------------------------------------------------------------------*/

/**
 * Portfolio
 *
 * Register wap8-portfolio as a custom post type.
 *
 * @package Portfolio Mgmt.
 * @version 1.0.0
 * @since 2.0.0 added saved settings to registration
 * @author Heavy Heavy <@heavyheavyco>
 *
 */

function wap8_portfolio() {

    $slug = @get_option( 'wap8-cpt-slug' ) ? @get_option( 'wap8-cpt-slug' ) : 'portfolio';
    $singular = @get_option( 'wap8-cpt-singular' ) ? @get_option( 'wap8-cpt-singular' ) : _x( 'Portfolio Project' , 'taxonomy singular name', 'portfolio-mgmt' );
    $plural = @get_option( 'wap8-cpt-plural' ) ? @get_option( 'wap8-cpt-plural' ) : _x( 'Portfolio Projects' , 'taxonomy plural name', 'portfolio-mgmt' );;
    
    $additional_labels = array(
		'name'               => _x( $plural, 'post type plural name', 'portfolio-mgmt' ),
		'singular_name'      => _x( $singular, 'post type singular name', 'portfolio-mgmt' ),
		'add_new'            => _x( 'Add New', 'wap8-portfolio', 'portfolio-mgmt' ),
		'all_items'          => __( 'All ' . $plural, 'portfolio-mgmt' ),
		'add_new_item'       => __( 'Add New ' . $singular, 'portfolio-mgmt' ),
		'edit'               => __( 'Edit', 'portfolio-mgmt' ),
		'edit_item'          => __( 'Edit ' . $singular, 'portfolio-mgmt' ),
		'new_item'           => __( 'New ' . $singular, 'portfolio-mgmt' ),
		'view'               => __( 'View', 'portfolio-mgmt' ),
		'view_item'          => __( 'View ' . $singular, 'portfolio-mgmt' ),
		'search_items'       => __( 'Search ' . $plural, 'portfolio-mgmt' ),
		'not_found'          => __( 'No ' . $singular . ' found', 'portfolio-mgmt' ),
		'not_found_in_trash' => __( 'No ' . $singular . ' found in Trash', 'portfolio-mgmt' ),
	    );

	$supports = array(
		'title',
		'editor',
		'thumbnail',
		'excerpt',
		'revisions',
		'author',
	);

	$args = array(
		'labels'             => $additional_labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_nav_menus'  => true,
		'query_var'          => true,
		'rewrite'            => array(
			'slug'       => $slug,
			'with_front' => false
			),
		'capability_type'    => 'post',
		'hierarchical'       => false,
		'has_archive'        => true,
		'menu_position'      => 5,
		'menu_icon'          => 'dashicons-layout',
		'supports'           => $supports,
	);

	$args = apply_filters( 'portfolio_mgmt_args', $args );

	// register the post type
	register_post_type(
		'wap8-portfolio', // unique post type handle to avoid any potential conflicts
		$args             // array of arguments for this custom post type
	);

    flush_rewrite_rules();

}

/*----------------------------------------------------------------------------*/
/* Portfolio Mgmt. Activation
/*----------------------------------------------------------------------------*/

/**
 * Portfolio Mgmt. Activation
 *
 * Flush rewrite rules upon plugin activation.
 *
 * @package Portfolio Mgmt.
 * @version 1.0.8
 * @since 1.0.8
 * @author Heavy Heavy <@heavyheavyco>
 *
 */

function wap8_portfolio_mgmt_activation() {

	// wap8-services custom taxonomy
	wap8_portfolio_services();

	// wap8-portfolio-tgs custom taxonomy
	wap8_portfolio_tags();

	// custom post type
	wap8_portfolio();

	// flush rewrite rules
	flush_rewrite_rules();

}

/*----------------------------------------------------------------------------*/
/* Portfolio Mgmt. Deactivation
/*----------------------------------------------------------------------------*/

register_deactivation_hook( __FILE__, 'wap8_portfolio_mgmt_deactivation', 10 );

/**
 * Portfolio Mgmt. Deactivation
 *
 * Flush rewrite rules upon plugin deactivation.
 *
 * @package Portfolio Mgmt.
 * @version 1.0.8
 * @since 1.0.8
 * @author Heavy Heavy <@heavyheavyco>
 *
 */

function wap8_portfolio_mgmt_deactivation() {
	flush_rewrite_rules();
}

/*-----------------------------------------------------------------------------------*/
/* Portfolio Mgmt. Title Field Label
/*-----------------------------------------------------------------------------------*/

add_filter( 'enter_title_here', 'wap8_portfolio_mgmt_title_field_label', 10, 1 );

/**
 * Portfolio Mgmt. Title Field Label
 *
 * Modify the post editor title field for this custom post type.
 *
 * @param $title Default title field label
 * @return $title Modified title field label
 *
 * @package Portfolio Mgmt.
 * @version 1.0.0
 * @since 1.1.5 Accounting for filtered post type arguments
 * @author Heavy Heavy <@heavyheavyco>
 *
 */

function wap8_portfolio_mgmt_title_field_label( $title ) {

	$screen = get_current_screen();

	if ( 'wap8-portfolio' == $screen->post_type ) {

		$portfolio       = get_post_type_object( 'wap8-portfolio' );
		$portfolio_label = $portfolio->labels->singular_name;

		$title = $portfolio_label . __( ' Title', 'portfolio-mgmt' );

	}

	return $title;

}

/*----------------------------------------------------------------------------*/
/* Portfolio Mgmt. Post Thumbnail
/*----------------------------------------------------------------------------*/

add_action( 'init', 'wap8_portfolio_mgmt_post_thumbnail', 10 );

/**
 * Portfolio Mgmt. Post Thumbnail
 *
 * Add theme support for post-thumbnails, if the current theme does not already.
 *
 * @package Portfolio Mgmt.
 * @version 1.0.0
 * @since 1.0.0
 * @author Heavy Heavy <@heavyheavyco>
 *
 */

function wap8_portfolio_mgmt_post_thumbnail() {

	if ( !current_theme_supports( 'post-thumbnails' ) ) { // if the currently active theme does not support post-thumbnails

		add_theme_support( 'post-thumbnail', array( 'wap8-portfolio' ) ); // add theme support for post-thumbnails for the custom post type only

	}

}