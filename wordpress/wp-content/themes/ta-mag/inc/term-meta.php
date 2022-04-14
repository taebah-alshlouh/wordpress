<?php
if( !function_exists('ta_mag_term_meta_field') ):

	// Add term page
    function ta_mag_term_meta_field(){ ?>

        <div class="ta-custom-field" style="margin-bottom: 20px;">
            
            <label><?php esc_html_e('Feature Image', 'ta-mag'); ?></label>


                <div class="ta-image-uploader">

                    <button type="button" class="ta-image-upload" style="border: solid 1px #bababa; padding: 20px;">
                        <span class="dashicons dashicons-upload"></span>  <?php esc_html_e('Choose Image','ta-mag') ?>
                    </button>

                    <input class="ta-image-upload" name="ta-cat-image" type="hidden"/>

                </div>

                <div class="term-image-preview" style="display: none; position: relative;">

                    <button type="button" class="ta-img-delete" style="position: absolute; top: 3px; left: 3px; background: red; color: #fff; border: none;">
                        <span class="dashicons dashicons-no-alt"></span>
                    </button>

                    <div class="ta-image-prev"></div>

                </div>
            
        </div>
    
    <?php
    }

endif;

add_action('category_add_form_fields', 'ta_mag_term_meta_field', 10, 2);


if( !function_exists('ta_mag_edit_term_meta') ):

	// Edit term Meta
    function ta_mag_edit_term_meta($term){

        $ta_term_image = get_term_meta( $term->term_id, 'ta-cat-image', true );
        $image = wp_get_attachment_image_src( $ta_term_image,'medium' );
        $ta_term_image = isset( $image[0] ) ? $image[0] : ''; ?>

        <tr>

            <td>

                <div class="ta-custom-field" style="margin-bottom: 20px;">
                    
                    <label><?php esc_html_e('Feature Image', 'ta-mag'); ?></label>


                        <div class="ta-image-uploader">

                            <button type="button" class="ta-image-upload" style="border: solid 1px #bababa; padding: 20px;">
                                <span class="dashicons dashicons-upload"></span>  <?php esc_html_e('Choose Image','ta-mag') ?>
                            </button>

                            <input class="ta-image-upload" name="ta-cat-image" value="<?php echo esc_attr( $ta_term_image ); ?>" type="hidden"/>

                        </div>

                        <div class="term-image-preview" <?php if( !$ta_term_image ){ ?> style="display: none; position: relative;" <?php }else{ ?> style=" position: relative;"<?php } ?>>

                            <button type="button" class="ta-img-delete" style="position: absolute; top: 3px; left: 3px; background: red; color: #fff; border: none;">
                                <span class="dashicons dashicons-no-alt"></span>
                            </button>

                            <div class="ta-image-prev">
                                <?php if( $ta_term_image ){ ?>
                                    <img src="<?php echo esc_url( $ta_term_image ); ?>" style="width:200px; height:auto;">
                                <?php } ?>
                            </div>

                        </div>
                    
                </div>
            
            </td>
        </tr>

        
        <?php
    }

endif;

add_action('category_edit_form_fields', 'ta_mag_edit_term_meta', 10, 2);


if( !function_exists('ta_mag_save_term_meta') ):

	// Save term Meta
    function ta_mag_save_term_meta( $term_id ){

        if( isset( $_POST['ta-cat-image'] ) ){

            update_term_meta(
                $term_id,
                'ta-cat-image',
                absint( wp_unslash( $_POST[ 'ta-cat-image' ] ) )
            );

        }

    }

endif;

add_action('edited_category', 'ta_mag_save_term_meta', 10, 2);
add_action('create_category', 'ta_mag_save_term_meta', 10, 2);