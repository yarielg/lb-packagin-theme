<?php

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