<?php
/**
 * TA Mag Footer Optionl
 *
 * @package Ta_Mag
 */

$wp_customize->add_section( 'single_post_section',
    array(
    'title'      => esc_html__( 'Single Post Setting', 'ta-mag' ),
    'capability' => 'edit_theme_options',
    'panel'      => 'theme_option_panel',
    )
);

$wp_customize->add_setting('ed_author_box',
    array(
        'default' => 1,
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'ta_mag_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_author_box',
    array(
        'label' => esc_html__('Enable Author Box', 'ta-mag'),
        'section' => 'single_post_section',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('related_posts_title',
    array(
        'default' => esc_html__('Related Posts', 'ta-mag'),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('related_posts_title',
    array(
        'label' => esc_html__('Related Posts Title', 'ta-mag'),
        'section' => 'single_post_section',
        'type' => 'text',
    )
);

$wp_customize->add_setting('ed_related_posts',
    array(
        'default' => 1,
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'ta_mag_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_related_posts',
    array(
        'label' => esc_html__('Enable Related Posts', 'ta-mag'),
        'section' => 'single_post_section',
        'type' => 'checkbox',
    )
);