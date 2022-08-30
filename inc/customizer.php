<?php

defined( 'ABSPATH' ) || exit;

/**
 * Implement Theme Customizer additions and adjustments.
 * https://codex.wordpress.org/Theme_Customization_API
 *
 * How do I "output" custom theme modification settings? https://developer.wordpress.org/reference/functions/get_theme_mod
 * echo get_theme_mod( 'copyright_info' );
 * or: echo get_theme_mod( 'copyright_info', 'Default (c) Copyright Info if nothing provided' );
 *
 * "sanitize_callback": https://codex.wordpress.org/Data_Validation
 */
function lb_packaging_customize( $wp_customize ) {
	/**
	 * Initialize sections
	 */
	$wp_customize->add_section(
		'theme_header_section',
		array(
			'title'    => __( 'Header', 'lb_packaging' ),
			'priority' => 1000,
		)
	);

	/**
	 * Section: Page Layout
	 */
	// Header Logo.
	$wp_customize->add_setting(
		'header_logo',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'header_logo',
			array(
				'label'       => __( 'Upload Header Logo', 'lb_packaging' ),
				'description' => __( 'Height: &gt;80px', 'lb_packaging' ),
				'section'     => 'theme_header_section',
				'settings'    => 'header_logo',
				'priority'    => 1,
			)
		)
	);

	// Predefined Navbar scheme.
	$wp_customize->add_setting(
		'navbar_scheme',
		array(
			'default'           => 'default',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'navbar_scheme',
		array(
			'type'     => 'radio',
			'label'    => __( 'Navbar Scheme', 'lb_packaging' ),
			'section'  => 'theme_header_section',
			'choices'  => array(
				'navbar-light bg-light'  => __( 'Default', 'lb_packaging' ),
				'navbar-dark bg-dark'    => __( 'Dark', 'lb_packaging' ),
				'navbar-dark bg-primary' => __( 'Primary', 'lb_packaging' ),
			),
			'settings' => 'navbar_scheme',
			'priority' => 1,
		)
	);

	// Fixed Header?
	$wp_customize->add_setting(
		'navbar_position',
		array(
			'default'           => 'static',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'navbar_position',
		array(
			'type'     => 'radio',
			'label'    => __( 'Navbar', 'lb_packaging' ),
			'section'  => 'theme_header_section',
			'choices'  => array(
				'static'       => __( 'Static', 'lb_packaging' ),
				'fixed_top'    => __( 'Fixed to top', 'lb_packaging' ),
				'fixed_bottom' => __( 'Fixed to bottom', 'lb_packaging' ),
			),
			'settings' => 'navbar_position',
			'priority' => 2,
		)
	);

	// Search?
	$wp_customize->add_setting(
		'search_enabled',
		array(
			'default'           => '1',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'search_enabled',
		array(
			'type'     => 'checkbox',
			'label'    => __( 'Show Searchfield?', 'lb_packaging' ),
			'section'  => 'theme_header_section',
			'settings' => 'search_enabled',
			'priority' => 3,
		)
	);
}
add_action( 'customize_register', 'lb_packaging_customize' );


/**
 * Bind JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function lb_packaging_customize_preview_js() {
	wp_enqueue_script( 'customizer', get_template_directory_uri() . '/inc/customizer.js', array( 'jquery' ), null, true );
}
add_action( 'customize_preview_init', 'lb_packaging_customize_preview_js' );

/**
 * Kirki Customizer
 */
add_action( 'customize_register', 'kirki_sections');

add_filter( 'kirki/fields', 'kirki_fields');

function kirki_sections($wp_customize ){
    /**
     * Add panels
     */
    $wp_customize->add_panel( 'lbp_main', array(
        'priority'    => 10,
        'title'       => __( 'Theme Settings', 'lb_packaging' ),
    ) );

    /**
     * Add sections
     */

    $wp_customize->add_section( 'lbp_hero', array(
        'title'       => __( 'Hero', 'lb_packaging' ),
        'priority'    => 10,
        'panel'       => 'lbp_main',
    ));

    $wp_customize->add_section( 'lbp_headings', array(
        'title'       => __( 'Text', 'lb_packaging' ),
        'priority'    => 10,
        'panel'       => 'lbp_main',
    ));

}

function kirki_fields($fields ){
    
    /* HERO */
    $fields[] = array(
            'type' => 'background',
            'settings'    => 'lb_hero_bg',
            'label'       => esc_html__( 'Set the hero background image', 'lb_packaging' ),
            'section'     => 'lbp_hero',
            'default'     => [
                'background-position'   => 'center',
                'background-size'       => 'cover',
                'overflow'       => 'hidden',
            ],
            'output'      => array(
                array(
                    'element' => '.hero-img',
                    'property'=> 'background-image',
                    'value_pattern' => 'url($) !important',
                ),
            ),
    );

    $fields[] = array(
        'type' => 'editor',
        'settings'    => 'lb_hero_heading',
        'label'       => esc_html__( 'Set the hero heading', 'lb_packaging' ),
        'section'     => 'lbp_hero',
        'default'     => '',
    );

    /* TEXT */

    $fields[] = array(
        'type' => 'slider',
        'settings'    => 'lb_h1_size',
        'label'       => esc_html__( 'Set H1 Font Size', 'lb_packaging' ),
        'section'     => 'lbp_headings',
        'default'     => 4.1,
        'choices'     => [
            'min'  => 0.1,
            'max'  => 5,
            'step' => 0.1,
        ],
        'output'      => array(
            array(
                'element' => 'h1',
                'property'=> 'font-size',
                'units' => 'rem'
            )
        )
    );

    $fields[] = array(
        'type' => 'color',
        'settings'    => 'lb_h1_color',
        'label'       => __( 'H1 Font Color', 'lb_packaging' ),
        'section'     => 'lbp_headings',
        'default'     => '#000000',
        'output'      => array(
            array(
                'element' => 'h1',
                'property'=> 'color'
            )
        )
    );

    $fields[] = array(
        'type' => 'select',
        'settings'    => 'lb_h1_weight',
        'label'       => esc_html__( 'Set H1 Font Weight', 'lb_packaging' ),
        'section'     => 'lbp_headings',
        'default'     => '500',
        'placeholder' => esc_html__( 'Choose an option', 'lb_packaging' ),
        'choices'     => [
            '300' => esc_html__( 'Thin', 'lb_packaging' ),
            '400' => esc_html__( 'Regular', 'lb_packaging' ),
            '500' => esc_html__( 'Medium', 'lb_packaging' ),
            '700' => esc_html__( 'Bold', 'lb_packaging' ),
        ],
        'output'      => array(
            array(
                'element' => 'h1',
                'property'=> 'font-weight'
            )
        )
    );

    $fields[] = array(
        'type' => 'slider',
        'settings'    => 'lb_h2_size',
        'label'       => esc_html__( 'Set H2 Font Size', 'lb_packaging' ),
        'section'     => 'lbp_headings',
        'default'     => 2.64,
        'choices'     => [
            'min'  => 0.1,
            'max'  => 5,
            'step' => 0.1,
        ],
        'output'      => array(
            array(
                'element' => 'h2',
                'property'=> 'font-size',
                'units' => 'rem'
            )
        )
    );

    $fields[] = array(
        'type' => 'color',
        'settings'    => 'lb_h2_color',
        'label'       => __( 'H2 Font Color', 'lb_packaging' ),
        'section'     => 'lbp_headings',
        'default'     => '#ff6b02',
        'output'      => array(
            array(
                'element' => 'h2',
                'property'=> 'color'
            )
        )
    );

    $fields[] = array(
        'type' => 'select',
        'settings'    => 'lb_h2_weight',
        'label'       => esc_html__( 'Set H2 Font Weight', 'lb_packaging' ),
        'section'     => 'lbp_headings',
        'default'     => '500',
        'placeholder' => esc_html__( 'Choose an option', 'lb_packaging' ),
        'choices'     => [
            '300' => esc_html__( 'Thin', 'lb_packaging' ),
            '400' => esc_html__( 'Regular', 'lb_packaging' ),
            '500' => esc_html__( 'Medium', 'lb_packaging' ),
            '700' => esc_html__( 'Bold', 'lb_packaging' ),
        ],
        'output'      => array(
            array(
                'element' => 'h2',
                'property'=> 'font-weight'
            )
        )
    );


    $fields[] = array(
        'type' => 'slider',
        'settings'    => 'lb_h3_size',
        'label'       => esc_html__( 'Set H3 Font Size', 'lb_packaging' ),
        'section'     => 'lbp_headings',
        'default'     => 2.2,
        'choices'     => [
            'min'  => 0.1,
            'max'  => 5,
            'step' => 0.1,
        ],
        'output'      => array(
            array(
                'element' => 'h3',
                'property'=> 'font-size',
                'units' => 'rem'
            )
        )
    );

    $fields[] = array(
        'type' => 'color',
        'settings'    => 'lb_h3_color',
        'label'       => __( 'H3 Font Color', 'lb_packaging' ),
        'section'     => 'lbp_headings',
        'default'     => '#000000',
        'output'      => array(
            array(
                'element' => 'h3',
                'property'=> 'color'
            )
        )
    );

    $fields[] = array(
        'type' => 'select',
        'settings'    => 'lb_h3_weight',
        'label'       => esc_html__( 'Set H3 Font Weight', 'lb_packaging' ),
        'section'     => 'lbp_headings',
        'default'     => '500',
        'placeholder' => esc_html__( 'Choose an option', 'lb_packaging' ),
        'choices'     => [
            '300' => esc_html__( 'Thin', 'lb_packaging' ),
            '400' => esc_html__( 'Regular', 'lb_packaging' ),
            '500' => esc_html__( 'Medium', 'lb_packaging' ),
            '700' => esc_html__( 'Bold', 'lb_packaging' ),
        ],
        'output'      => array(
            array(
                'element' => 'h3',
                'property'=> 'font-weight'
            )
        )
    );

    $fields[] = array(
        'type' => 'slider',
        'settings'    => 'lb_h4_size',
        'label'       => esc_html__( 'Set H4 Font Size', 'lb_packaging' ),
        'section'     => 'lbp_headings',
        'default'     => 1.8,
        'choices'     => [
            'min'  => 0.1,
            'max'  => 5,
            'step' => 0.1,
        ],
        'output'      => array(
            array(
                'element' => 'h4',
                'property'=> 'font-size',
                'units' => 'rem'
            )
        )
    );

    $fields[] = array(
        'type' => 'color',
        'settings'    => 'lb_h4_color',
        'label'       => __( 'H4 Font Color', 'lb_packaging' ),
        'section'     => 'lbp_headings',
        'default'     => '#000000',
        'output'      => array(
            array(
                'element' => 'h4',
                'property'=> 'color'
            )
        )
    );
    $fields[] = array(
        'type' => 'select',
        'settings'    => 'lb_h4_weight',
        'label'       => esc_html__( 'Set H4 Font Weight', 'lb_packaging' ),
        'section'     => 'lbp_headings',
        'default'     => '500',
        'placeholder' => esc_html__( 'Choose an option', 'lb_packaging' ),
        'choices'     => [
            '300' => esc_html__( 'Thin', 'lb_packaging' ),
            '400' => esc_html__( 'Regular', 'lb_packaging' ),
            '500' => esc_html__( 'Medium', 'lb_packaging' ),
            '700' => esc_html__( 'Bold', 'lb_packaging' ),
        ],
        'output'      => array(
            array(
                'element' => 'h4',
                'property'=> 'font-weight'
            )
        )
    );


    $fields[] = array(
        'type' => 'slider',
        'settings'    => 'lb_h5_size',
        'label'       => esc_html__( 'Set H5 Font Size', 'lb_packaging' ),
        'section'     => 'lbp_headings',
        'default'     => 1.4,
        'choices'     => [
            'min'  => 0.1,
            'max'  => 5,
            'step' => 0.1,
        ],
        'output'      => array(
            array(
                'element' => 'h5',
                'property'=> 'font-size',
                'units' => 'rem'
            )
        )
    );

    $fields[] = array(
        'type' => 'color',
        'settings'    => 'lb_h5_color',
        'label'       => __( 'H5 Font Color', 'lb_packaging' ),
        'section'     => 'lbp_headings',
        'default'     => '#000000',
        'output'      => array(
            array(
                'element' => 'h5',
                'property'=> 'color'
            )
        )
    );

    $fields[] = array(
        'type' => 'select',
        'settings'    => 'lb_h5_weight',
        'label'       => esc_html__( 'Set H5 Font Weight', 'lb_packaging' ),
        'section'     => 'lbp_headings',
        'default'     => '500',
        'placeholder' => esc_html__( 'Choose an option', 'lb_packaging' ),
        'choices'     => [
            '300' => esc_html__( 'Thin', 'lb_packaging' ),
            '400' => esc_html__( 'Regular', 'lb_packaging' ),
            '500' => esc_html__( 'Medium', 'lb_packaging' ),
            '700' => esc_html__( 'Bold', 'lb_packaging' ),
        ],
        'output'      => array(
            array(
                'element' => 'h5',
                'property'=> 'font-weight'
            )
        )
    );

    $fields[] = array(
        'type' => 'slider',
        'settings'    => 'lb_menu_item_size',
        'label'       => esc_html__( 'Set Menu Item Font Size', 'lb_packaging' ),
        'section'     => 'lbp_headings',
        'default'     => 1.4,
        'choices'     => [
            'min'  => 0.1,
            'max'  => 5,
            'step' => 0.1,
        ],
        'output'      => array(
            array(
                'element' => '#navbar ul > li > a',
                'property'=> 'font-size',
                'units' => 'rem'
            )
        )
    );

    $fields[] = array(
        'type' => 'color',
        'settings'    => 'lb_menu_item_color',
        'label'       => __( 'Set Menu Item  Font Color', 'lb_packaging' ),
        'section'     => 'lbp_headings',
        'default'     => '#000000',
        'output'      => array(
            array(
                'element' => '#navbar ul > li > a',
                'property'=> 'color'
            )
        )
    );

    $fields[] = array(
        'type' => 'select',
        'settings'    => 'lb_menu_item_weight',
        'label'       => esc_html__( 'Set Menu Item  Font Weight', 'lb_packaging' ),
        'section'     => 'lbp_headings',
        'default'     => '500',
        'placeholder' => esc_html__( 'Choose an option', 'lb_packaging' ),
        'choices'     => [
            '300' => esc_html__( 'Thin', 'lb_packaging' ),
            '400' => esc_html__( 'Regular', 'lb_packaging' ),
            '500' => esc_html__( 'Medium', 'lb_packaging' ),
            '700' => esc_html__( 'Bold', 'lb_packaging' ),
        ],
        'output'      => array(
            array(
                'element' => '#navbar ul > li > a',
                'property'=> 'font-weight'
            )
        )
    );



    //CART ITEMS
    /*$fields[] = array(
        'type' => 'radio_image',
        'settings'    => 'wrech_cart_item_close_icon',
        'label'       => esc_html__( 'Cart header close icon', 'wrech_domain' ),
        'section'     => 'wrech_cart_item_modal',
        'default'     => 'close_icon_3',
        'choices'     => [
            'close_icon_1'   => WRECH_PLUGIN_URL . '/assets/images/close_icon_1.png',
            'close_icon_2' => WRECH_PLUGIN_URL . '/assets/images/close_icon_2.png',
            'close_icon_3'  => WRECH_PLUGIN_URL . '/assets/images/close_icon_3.png',
            'close_icon_4'  => WRECH_PLUGIN_URL . '/assets/images/close_icon_4.png',
            'close_icon_5'  => WRECH_PLUGIN_URL . '/assets/images/close_icon_5.png',
            'close_icon_6'  => WRECH_PLUGIN_URL . '/assets/images/close_icon_6.png',
            'close_icon_7'  => WRECH_PLUGIN_URL . '/assets/images/close_icon_7.png',
        ],
        'output'      => array(
            array(
                'element' => '.wrech_remove_item_img',
                'property'=> 'mask',
                'value_pattern' => 'url("'. WRECH_PLUGIN_URL . '/assets/images/$.png") no-repeat center / contain'
            ),
            array(
                'element' => '.wrech_remove_item_img',
                'property'=> '-webkit-mask',
                'value_pattern' => 'url("'. WRECH_PLUGIN_URL . '/assets/images/$.png") no-repeat center / contain'
            )
        )
    );*/

    /*$fields[] = array(
        'type' => 'color',
        'settings'    => 'wrech_info_modal_label_color',
        'label'       => __( 'Field Label Color', 'wrech_domain' ),
        'description' => esc_html__( 'Set the field labels color', 'wrech_domain' ),
        'section'     => 'wrech_info_modal',
        'default'     => '#000000',
        'output'      => array(
            array(
                'element' => '.wrech-step-info label',
                'property'=> 'color',
                'value_pattern' => '$ !important'
            )
        )
    );*/

    /*$fields[] = array(
        'type' => 'slider',
        'settings'    => 'wrech_info_modal_field_font',
        'label'       => __( 'Field Font Size', 'wrech_domain' ),
        'description' => esc_html__( 'Set field font size', 'wrech_domain' ),
        'section'     => 'wrech_info_modal',
        'default'     => 14,
        'choices'     => [
            'min'  => 10,
            'max'  => 20,
            'step' => 1,
        ],
        'output'      => array(
            array(
                'element' => ".wrech-step-info input[type='text'], .wrech-step-info input[type='phone'], .wrech-step-info input[type='number'],
                                   .wrech-step-info input[type='email'], .wrech-step-info .select2-selection--single, .wrech-step-info .select2-container,
                                   .wrech-step-info .input-text",
                'property'=> 'font-size',
                'value_pattern' => '$px !important',
            )
        )
    );*/


    return $fields;
}
