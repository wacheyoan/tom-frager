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
            'category'          => 'tom-frager',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'logos', 'logo' ),
            'post_types' => array('page'),
        ));

        acf_register_block_type(array(
            'name'              => 'quote',
            'title'             => __('Quote'),
            'description'       => __('Créer une citation'),
            'render_template'   => 'template-parts/content-brand.php',
            'category'          => 'tom-frager',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'quotes', 'quote' ),
            'post_types' => array('page'),
        ));

        acf_register_block_type(array(
            'name'              => 'case',
            'title'             => __('case'),
            'description'       => __('Créer un exemple trousse'),
            'render_template'   => 'template-parts/content-case.php',
            'category'          => 'tom-frager',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'case', 'trousse' ),
            'post_types' => array('page'),

        ));

        acf_register_block_type(array(
            'name'              => 'description',
            'title'             => __('description'),
            'description'       => __('Créer une description'),
            'render_template'   => 'template-parts/content-description.php',
            'category'          => 'tom-frager',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'description'),
            'post_types' => array('page'),

        ));

        acf_register_block_type(array(
            'name'              => 'separateur',
            'title'             => __('separateur'),
            'description'       => __('Créer un séparateur'),
            'render_template'   => 'template-parts/content-separator.php',
            'category'          => 'tom-frager',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'séparateur'),
            'post_types' => array('page'),

        ));

        acf_register_block_type(array(
            'name'              => 'images',
            'title'             => __('images'),
            'description'       => __('Créer un bloc d\'images'),
            'render_template'   => 'template-parts/content-images.php',
            'category'          => 'tom-frager',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'images'),
            'post_types' => array('page'),

        ));

        acf_register_block_type(array(
            'name'              => 'instagram',
            'title'             => __('instagram'),
            'description'       => __('Cherche le feed instagram du compte'),
            'render_template'   => 'template-parts/content-instagram.php',
            'category'          => 'tom-frager',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'images'),
            'post_types' => array('page'),

        ));
    }

}

function wpc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'wpc_mime_types');

function wpdocs_new_block_category( $categories ) {
    // Plugin’s block category title and slug.
    $block_category = array( 'title' => esc_html__( 'Tom Frager', 'text-domain' ), 'slug' => 'tom-frager' );
    $category_slugs = wp_list_pluck( $categories, 'slug' );

    if ( ! in_array( $block_category['slug'], $category_slugs, true ) ) {
        $categories = array_merge(
            array(
                array(
                    'title' => $block_category['title'],
                    'slug'  => $block_category['slug'],
                    'icon'  => 'palmtree',
                ),
            ),
            $categories
        );
    }


    return $categories;
}
add_filter( 'block_categories', 'wpdocs_new_block_category' );



