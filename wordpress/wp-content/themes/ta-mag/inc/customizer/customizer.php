<?php
/**
 * TA Mag Theme Customizer
 *
 * @package Ta_Mag
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ta_mag_customize_register( $wp_customize ) {
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->get_section( 'title_tagline' )->panel = 'ta_mag_general_panel';
	$wp_customize->get_section( 'header_image' )->panel = 'ta_mag_general_panel';
	$wp_customize->get_section( 'background_image' )->panel = 'ta_mag_general_panel';
	$wp_customize->get_section( 'colors' )->panel = 'ta_mag_general_panel';

	if ( isset( $wp_customize->selective_refresh ) ) {

		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'ta_mag_customize_partial_blogname',
		) );

		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'ta_mag_customize_partial_blogdescription',
		) );
	}

	$wp_customize->add_panel( 'ta_mag_general_panel',
		array(
			'title'      => esc_html__( 'General Settings', 'ta-mag' ),
			'priority'   => 5,
			'capability' => 'edit_theme_options',
		)
	);

	$wp_customize->add_panel(
        'ta_mag_home_panel', 
    	array(
    		'priority'       => 5,
        	'capability'     => 'edit_theme_options',
        	'theme_supports' => '',
        	'title'          => esc_html__( 'Front Page Settings', 'ta-mag' ),
        ) 
    );

	$wp_customize->add_panel( 'theme_option_panel',
		array(
			'title'      => esc_html__( 'Theme Options', 'ta-mag' ),
			'priority'   => 10,
			'capability' => 'edit_theme_options',
		)
	);
	
	/**  TA Mag Pro Link **/
    class TA_Mag_Link_Section extends WP_Customize_Section {

        public $type = 'ta-mag-pro';

        public $pro_text = '';

        public $pro_url = '';

        public function json() {
            $json = parent::json();
            $json['pro_text'] = $this->pro_text;
            $json['pro_url']  = esc_url( $this->pro_url );
            return $json;
        }
        protected function render_template() { ?>

            <li id="custom-section-{{ data.id }}" class="custom-section control-section control-section-{{ data.type }} cannot-expand">
                <h3 class="custom-section-title" style="background: #ec4743; margin: 0; padding: 20px 5px 8px 5px; color: #fff;">
                    {{ data.title }}
                    <# if ( data.pro_text && data.pro_url ) { #>
                        <a style="margin-left: 10px; transform: translateY(-5px);" href="{{ data.pro_url }}" class="button button-custom center" target="_blank">{{ data.pro_text }}</a>
                    <# } #>
                </h3>
            </li>
        <?php }
    }

	/** Upgrade to TA Mag Pro **/

	$wp_customize->register_section_type( 'TA_Mag_Link_Section' );

	// Register sections.
	$wp_customize->add_section(
	    new TA_Mag_Link_Section(
	        $wp_customize,
	        'ta-mag-pro',
	        array(
	            'title'    => esc_html__( 'Upgrade to TA Mag Pro', 'ta-mag' ),
	            'pro_text' => esc_html__( 'Go Pro','ta-mag' ),
	            'pro_url'  => 'https://themesarray.com/wordpress_themes/ta-mag-pro',
	            'priority' => 1,
	        )
	    )
	);

	require get_template_directory() . '/inc/customizer/social-icon.php';
	require get_template_directory() . '/inc/customizer/header.php';
	require get_template_directory() . '/inc/customizer/single.php';
	require get_template_directory() . '/inc/customizer/footer.php';
	require get_template_directory() . '/inc/customizer/layoyt.php';

}
add_action( 'customize_register', 'ta_mag_customize_register' );

require get_template_directory() . '/inc/customizer/sanitize.php';


/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function ta_mag_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function ta_mag_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function ta_mag_customize_preview_js() {
	wp_enqueue_script( 'ta-mag-customizer', get_template_directory_uri() . '/assets/core/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'ta_mag_customize_preview_js' );

function ta_mag_customizer_enqueue(){

    wp_enqueue_script( 'jquery-ui-button' );
    wp_enqueue_style( 'ta-mag-custom-customizer', get_template_directory_uri() . '/assets/css/custom-customizer.css' );
    wp_enqueue_script( 'ta-mag-custom-customizer', get_template_directory_uri() . '/assets/js/custom-customizer.js', array( 'jquery', 'customize-controls' ), '20160714', true );

    $array = array(
        'home_url'     => get_home_url(),
    );
    wp_localize_script( 'ta-mag-custom-customizer', 'ta_mag_customize_data', $array );
}
add_action('customize_controls_enqueue_scripts','ta_mag_customizer_enqueue');

