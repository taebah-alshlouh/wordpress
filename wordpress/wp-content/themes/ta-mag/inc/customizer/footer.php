<?php
/**
 * TA Mag Footer Optionl
 *
 * @package Ta_Mag
 */

$wp_customize->add_section( 'footer_section',
    array(
    'title'      => esc_html__( 'Footer Setting', 'ta-mag' ),
    'capability' => 'edit_theme_options',
    'panel'      => 'theme_option_panel',
    )
);

$wp_customize->add_setting('footer_background_image',
    array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )
);
$wp_customize->add_control( new WP_Customize_Image_Control(
    $wp_customize,
    'footer_background_image',
        array(
            'label'      => esc_html__( 'Footer Background Image', 'ta-mag' ),
            'section'    => 'footer_section',
        )
    )
);

$wp_customize->add_setting(
	'footer_copyright_text',
    array(
        'default' => esc_html__( 'Copyright All rights reserved', 'ta-mag' ),
        'sanitize_callback' => 'sanitize_text_field'
    )
);
$wp_customize->add_control(
	'footer_copyright_text',
    array(
        'label' => esc_html__('Footer Copyright Text','ta-mag'),
        'type' => 'text',
        'section' => 'footer_section'
    )
);

$wp_customize->add_setting('ed_footer_go_top_button',
    array(
        'default' => 1,
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'ta_mag_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_footer_go_top_button',
    array(
        'label' => esc_html__('Enable Scroll to Top Button', 'ta-mag'),
        'section' => 'footer_section',
        'type' => 'checkbox',
    )
);