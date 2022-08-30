<?php


/**
 * Include Theme Customizer.
 *
 * @since v1.0
 */
$theme_customizer = __DIR__ . '/inc/customizer.php';
if ( is_readable( $theme_customizer ) ) {
	require_once $theme_customizer;
}

/**
 * General Theme Settings.
 *
 * @since v1.0
 */
if ( ! function_exists( 'lb_packaging_setup_theme' ) ) :
	function lb_packaging_setup_theme() {
		// Make theme available for translation: Translations can be filed in the /languages/ directory.
		load_theme_textdomain( 'lb_packaging', __DIR__ . '/languages' );

		// Theme Support.
		add_theme_support( 'title-tag' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
				'navigation-widgets',
			)
		);

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );
		// Add support for full and wide alignment.
		add_theme_support( 'align-wide' );
		// Add support for editor styles.
		add_theme_support( 'editor-styles' );
		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		// Default Attachment Display Settings.
		update_option( 'image_default_align', 'none' );
		update_option( 'image_default_link_type', 'none' );
		update_option( 'image_default_size', 'large' );

		// Custom CSS-Styles of Wordpress Gallery.
		add_filter( 'use_default_gallery_style', '__return_false' );
	}
	add_action( 'after_setup_theme', 'lb_packaging_setup_theme' );

	// Disable Block Directory: https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/filters/editor-filters.md#block-directory
	remove_action( 'enqueue_block_editor_assets', 'wp_enqueue_editor_block_directory_assets' );
	remove_action( 'enqueue_block_editor_assets', 'gutenberg_enqueue_block_editor_assets_block_directory' );
endif;

/**
 * Init Widget areas in Sidebar.
 *
 * @since v1.0
 */
function lb_packaging_widgets_init() {
	// Footer 1.
	register_sidebar(
		array(
			'name'          => 'Footer 1',
			'id'            => 'footer_1',
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

    // Footer 2
    register_sidebar(
        array(
            'name'          => 'Footer 2',
            'id'            => 'footer_2',
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );

    // Footer 3
    register_sidebar(
        array(
            'name'          => 'Footer 3',
            'id'            => 'footer_3',
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );

}
add_action( 'widgets_init', 'lb_packaging_widgets_init' );

/**
 * Nav menus.
 *
 * @since v1.0
 */
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
			'main-menu'   => 'Main Navigation Menu',
			'footer-menu' => 'Footer Menu',
		)
	);
}

// Custom Nav Walker: wp_bootstrap_navwalker().
$custom_walker = __DIR__ . '/inc/wp_bootstrap_navwalker.php';
if ( is_readable( $custom_walker ) ) {
	require_once $custom_walker;
}

$custom_walker_footer = __DIR__ . '/inc/wp_bootstrap_navwalker_footer.php';
if ( is_readable( $custom_walker_footer ) ) {
	require_once $custom_walker_footer;
}


/**
 * Loading All CSS Stylesheets and Javascript Files.
 *
 * @since v1.0
 */
function lb_packaging_scripts_loader() {
	$theme_version = wp_get_theme()->get( 'Version' );

	// 1. Styles.
	wp_enqueue_style( 'style', get_theme_file_uri( 'style.css' ), array(), $theme_version, 'all' );
	wp_enqueue_style( 'main', get_theme_file_uri( 'assets/css/main.css' ), array(), $theme_version, 'all' ); // main.scss: Compiled Framework source + custom styles.
	wp_enqueue_style( 'custom-main', get_theme_file_uri( 'assets/css/custom-main.css' ), array(), $theme_version, 'all' );

	/*if ( is_rtl() ) {
		wp_enqueue_style( 'rtl', get_theme_file_uri( 'assets/css/rtl.css' ), array(), $theme_version, 'all' );
	}*/

	// 2. Scripts.
	wp_enqueue_script( 'mainjs', get_theme_file_uri( 'assets/js/main.bundle.js' ), array(), $theme_version, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lb_packaging_scripts_loader' );
