<?php
/**
 * @package Ta_Mag
 */

add_action('widgets_init', 'ta_mag_author_register');

function ta_mag_author_register() {
    register_widget('Ta_Mag_Author_Widget');
}

class Ta_Mag_Author_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
                'Ta_Mag_Author_Widget', esc_html__('TA : Author Box', 'ta-mag'), array(
                'description' => esc_html__('This Widget show Author Profile', 'ta-mag')
                )
        );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {

        $fields = array(
            'ta_author_name' => array(
                'ta_mag_widgets_name' => 'ta_author_name',
                'ta_mag_widgets_title' => esc_html__('Author Name', 'ta-mag'),
                'ta_mag_widgets_field_type' => 'text',
            ),
            'ta_author_desc' => array(
                'ta_mag_widgets_name' => 'ta_author_desc',
                'ta_mag_widgets_title' => esc_html__('Author Words', 'ta-mag'),
                'ta_mag_widgets_field_type' => 'textarea',
            ),
            'ta_author_image' => array(
                'ta_mag_widgets_name' => 'ta_author_image',
                'ta_mag_widgets_title' => esc_html__('Author Image', 'ta-mag'),
                'ta_mag_widgets_field_type' => 'upload',
            ),
            'ta_author_facebook' => array(
                'ta_mag_widgets_name' => 'ta_author_facebook',
                'ta_mag_widgets_title' => esc_html__('Facebook Link', 'ta-mag'),
                'ta_mag_widgets_field_type' => 'text',
            ),
            'ta_author_twitter' => array(
                'ta_mag_widgets_name' => 'ta_author_twitter',
                'ta_mag_widgets_title' => esc_html__('Twitter Link', 'ta-mag'),
                'ta_mag_widgets_field_type' => 'text',
            ),
            'ta_author_youtube' => array(
                'ta_mag_widgets_name' => 'ta_author_youtube',
                'ta_mag_widgets_title' => esc_html__('Youtube Link', 'ta-mag'),
                'ta_mag_widgets_field_type' => 'text',
            ),
            'ta_author_instagram' => array(
                'ta_mag_widgets_name' => 'ta_author_instagram',
                'ta_mag_widgets_title' => esc_html__('Instagram Link', 'ta-mag'),
                'ta_mag_widgets_field_type' => 'text',
            ),
        );

        return $fields;
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance) {
        extract($args);
        
        $ta_author_name = apply_filters( 'widget_title', empty( $instance['ta_author_name'] ) ? '' : $instance['ta_author_name'], $instance, $this->id_base );        
        $ta_author_desc = isset( $instance['ta_author_desc'] ) ? $instance['ta_author_desc'] : '' ;
        $ta_author_image = isset( $instance['ta_author_image'] ) ? $instance['ta_author_image'] : '' ;
        $ta_author_facebook = isset( $instance['ta_author_facebook'] ) ? $instance['ta_author_facebook'] : '' ;
        $ta_author_twitter = isset( $instance['ta_author_twitter'] ) ? $instance['ta_author_twitter'] : '' ;
        $ta_author_youtube = isset( $instance['ta_author_youtube'] ) ? $instance['ta_author_youtube'] : '' ;
        $ta_author_instagram = isset( $instance['ta_author_instagram'] ) ? $instance['ta_author_instagram'] : '' ;
        
        echo $before_widget;
        ?>
            <div class="author-box-wrap">

                <?php  if( $ta_author_image ){ ?>
                    <div style="background-image: url(<?php echo esc_url( $ta_author_image ); ?>);" class="img-wrap">
                    </div>
                <?php } ?>

                <div class="author-name-desc">
                    <?php if($ta_author_name){ ?><h2><?php echo esc_html($ta_author_name); ?></h2> <?php } ?>
                    <?php if($ta_author_desc){ ?><p><?php echo esc_html($ta_author_desc); ?></p> <?php } ?>

                    <div class="ta-author-social">

                        <?php if( $ta_author_facebook ){ ?>
                            <a href="<?php echo esc_url( $ta_author_facebook ); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <?php } ?>

                        <?php if( $ta_author_twitter ){ ?>
                            <a href="<?php echo esc_url( $ta_author_twitter ); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <?php } ?>

                        <?php if( $ta_author_youtube ){ ?>
                            <a href="<?php echo esc_url( $ta_author_youtube ); ?>"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                        <?php } ?>

                        <?php if( $ta_author_instagram ){ ?>
                            <a href="<?php echo esc_url( $ta_author_instagram ); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        <?php } ?>

                    </div>

                </div>

            </div>
        <?php
        echo $after_widget;
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param   array   $new_instance   Values just sent to be saved.
     * @param   array   $old_instance   Previously saved values from database.
     *
     * @uses    ta_mag_widgets_updated_field_value()        defined in widget-fields.php
     *
     * @return  array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance) {
        $instance = $old_instance;

        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ($widget_fields as $widget_field) {

            extract($widget_field);

            // Use helper function to get updated field values
            $instance[$ta_mag_widgets_name] = ta_mag_widgets_updated_field_value($widget_field, $new_instance[$ta_mag_widgets_name]);
        }

        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param   array $instance Previously saved values from database.
     *
     * @uses    ta_mag_widgets_show_widget_field()      defined in widget-fields.php
     */
    public function form($instance) {
        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ($widget_fields as $widget_field) {

            // Make array elements available as variables
            extract($widget_field);
            $ta_mag_widgets_field_value = !empty($instance[$ta_mag_widgets_name]) ? esc_attr($instance[$ta_mag_widgets_name]) : '';
            ta_mag_widgets_show_widget_field($this, $widget_field, $ta_mag_widgets_field_value);
        }
    }

}
