<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package TomFrager
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function tomfrager_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'tomfrager_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function tomfrager_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'tomfrager_pingback_header' );

add_action('acf/init', 'logos');
function logos() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'logos',
            'title'             => __('Logos'),
            'description'       => __('Créer les logos'),
            'render_template'   => 'template-parts/content-logos.php',
            'enqueue_style'     => get_template_directory_uri().'/style.css',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'logos', 'logo' ),
            'post_types' => array('page'),

        ));

        acf_register_block_type(array(
            'name'              => 'quote',
            'title'             => __('Quote'),
            'description'       => __('Créer une citation'),
            'render_template'   => 'template-parts/content-brand.php',
            'enqueue_style'     => get_template_directory_uri().'/style.css',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'quotes', 'quote' ),
            'post_types' => array('page'),

        ));

        acf_register_block_type(array(
            'name'              => 'case',
            'title'             => __('case'),
            'description'       => __('Créer un exemple trousse'),
            'render_template'   => 'template-parts/content-case.php',
            'enqueue_style'     => get_template_directory_uri().'/style.css',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'case', 'trousse' ),
            'post_types' => array('page'),

        ));

    }

}



