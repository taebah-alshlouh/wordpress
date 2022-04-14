<?php
/**
 * TA Mag Layouts Optionl
 *
 * @package Ta_Mag
 */

$wp_customize->add_section( 'layout_section',
    array(
    'title'      => esc_html__( 'Layout Setting', 'ta-mag' ),
    'capability' => 'edit_theme_options',
    'panel'      => 'theme_option_panel',
    )
);

$wp_customize->add_setting('global_sidebar_layout',
    array(
        'default' => 'right-sidebar',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'ta_mag_sanitize_sidebar',
    )
);
$wp_customize->add_control('global_sidebar_layout',
    array(
        'label' => esc_html__('Global Sidebar Layout', 'ta-mag'),
        'section' => 'layout_section',
        'type' => 'select',
        'choices' => array(
            'right-sidebar' => esc_html__('Right Sidebar', 'ta-mag'),
            'left-sidebar' => esc_html__('Left Sidebar', 'ta-mag'),
            'no-sidebar' => esc_html__('No Sidebar', 'ta-mag'),
        )
    )
);

$wp_customize->add_setting('ta_archive_layout',
    array(
        'default' => 'simple',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'ta_mag_sanitize_archive_layout',
    )
);
$wp_customize->add_control('ta_archive_layout',
    array(
        'label' => esc_html__('Archive Page Layout', 'ta-mag'),
        'section' => 'layout_section',
        'type' => 'select',
        'choices' => array(
            'grid' => esc_html__('Simple Grid Layout', 'ta-mag'),
            'simple' => esc_html__('Full Width Layout', 'ta-mag'),
            'masonry' => esc_html__('Masonry Layout', 'ta-mag'),
        )
    )
);