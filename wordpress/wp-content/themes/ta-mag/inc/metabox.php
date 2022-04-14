<?php
/**
 * Create a metabox to added some custom filed in posts.
 *
 * @package TA Mag
 */

 add_action( 'add_meta_boxes', 'ta_mag_post_meta_options' );
 
 if( ! function_exists( 'ta_mag_post_meta_options' ) ):
 function  ta_mag_post_meta_options() {
    add_meta_box(
                'ta_mag_post_meta',
                esc_html__( 'Sidebar Layouts', 'ta-mag' ),
                'ta_mag_post_meta_callback',
                'post', 
                'normal', 
                'high'
            );
            add_meta_box(
                'ta_mag_page_meta',
                esc_html__( 'Sidebar', 'ta-mag' ),
                'ta_mag_post_meta_callback',
                'page',
                'normal', 
                'high'
            ); 
 }
 endif;

 $ta_mag_post_sidebar_options = array(
        'global' => array(
                        'label'     => esc_html__( 'Global sidebar', 'ta-mag' ),
                        'thumbnail' => get_template_directory_uri() . '/assets/images/both-sidebar.png'
                    ), 
        'left-sidebar' => array(
                        'label'     => esc_html__( 'Left sidebar', 'ta-mag' ),
                        'thumbnail' => get_template_directory_uri() . '/assets/images/left-sidebar.png'
                    ), 
        'right-sidebar' => array(
                        'label' => esc_html__( 'Right sidebar', 'ta-mag' ),
                        'thumbnail' => get_template_directory_uri() . '/assets/images/right-sidebar.png'
                    ),
        'no-sidebar' => array(
                        'label'     => esc_html__( 'No sidebar', 'ta-mag' ),
                        'thumbnail' => get_template_directory_uri() . '/assets/images/no-sidebar.png'
                    ),
    );

/**
 * Callback function for post option
 */
if( ! function_exists( 'ta_mag_post_meta_callback' ) ):

    function ta_mag_post_meta_callback() {

        global $post, $ta_mag_post_sidebar_options;

        wp_nonce_field( basename( __FILE__ ), 'ta_mag_post_meta_nonce' );
        ?>

        <table class="form-table">
            <tr>
                <td colspan="4"><em class="f13"><?php esc_html_e('Choose Sidebar Template','ta-mag'); ?></em></td>
            </tr>

            <tr>
                <td>
                    <?php
                    $ta_mag_post_sidebar = get_post_meta( $post->ID, 'ta_mag_post_sidebar_layout', true );
                    if( empty( $ta_mag_post_sidebar ) ){ $ta_mag_post_sidebar = 'global'; }
                    foreach ($ta_mag_post_sidebar_options as $key => $ta_mag_post_sidebar_option) { ?>

                    <div class="radio-image-wrapper" style="float:left; margin-right:30px;">

                        <label class="description">

                            <span><img src="<?php echo esc_url( $ta_mag_post_sidebar_option['thumbnail'] ); ?>" alt="" /></span></br>

                            <input type="radio" name="ta_mag_post_sidebar_layout" value="<?php echo esc_html( $key ); ?>" <?php checked( $key, $ta_mag_post_sidebar ); ?>/>&nbsp;<?php echo esc_html( $ta_mag_post_sidebar_option['label'] ); ?>

                        </label>

                    </div>

                    <?php } // end foreach ?>

                    <div class="clear"></div>

                </td>
            </tr>

        </table>
        <?php       
    }
endif;

/*--------------------------------------------------------------------------------------------------------------*/
/**
 * Function for save value of meta opitons
 *
 * @since 1.0.0
 */
add_action( 'save_post', 'ta_mag_save_post_meta' );

if( ! function_exists( 'ta_mag_save_post_meta' ) ):

function ta_mag_save_post_meta( $post_id ) {

    global $post, $ta_mag_post_sidebar_options;

    // Verify the nonce before proceeding.
    if ( !isset( $_POST[ 'ta_mag_post_meta_nonce' ] ) || !wp_verify_nonce( wp_unslash($_POST['ta_mag_post_meta_nonce'] ), basename( __FILE__ ) ) )
        return;

    // Stop WP from clearing custom fields on autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return;
        
    if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {  
        if (!current_user_can( 'edit_page', $post_id ) )
            return $post_id;  
    } elseif (!current_user_can( 'edit_post', $post_id ) ) {
            return $post_id;  
    }

    /*Page sidebar*/

    $old = get_post_meta( $post_id, 'ta_mag_post_sidebar_layout', true ); 
    $new = isset( $_POST['ta_mag_post_sidebar_layout'] ) ? sanitize_text_field( wp_unslash( $_POST['ta_mag_post_sidebar_layout'] ) ) : '';

    if ( $new && $new != $old ) {

        update_post_meta ( $post_id, 'ta_mag_post_sidebar_layout', $new );

    } elseif ( '' == $new && $old ) {

        delete_post_meta( $post_id,'ta_mag_post_sidebar_layout', $old );

    }
}
endif;  