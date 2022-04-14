<?php
/**
 * @package TA Mag
 */

add_action('widgets_init', 'ta_mag_category_register');

function ta_mag_category_register() {
    register_widget('Ta_Mag_Category_Widget');
}

class Ta_Mag_Category_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
                'Ta_Mag_Category_Widget', esc_html__('TA : Sidebar Category', 'ta-mag'), array(
                'description' => esc_html__('This Widget show Categories', 'ta-mag')
                )
        );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        $ta_mag_cat_list = ta_mag_category_list();
        $fields = array(
            'recent_post_title' => array(
                'ta_mag_widgets_name' => 'recent_post_title',
                'ta_mag_widgets_title' => esc_html__('Title', 'ta-mag'),
                'ta_mag_widgets_field_type' => 'text',
            ),
            'recent_post_category_1' => array(
                'ta_mag_widgets_name' => 'recent_post_category_1',
                'ta_mag_widgets_title' => esc_html__('Category One', 'ta-mag'),
                'ta_mag_widgets_field_type' => 'select',
                'ta_mag_widgets_field_options' => $ta_mag_cat_list,
            ),
            'recent_post_category_2' => array(
                'ta_mag_widgets_name' => 'recent_post_category_2',
                'ta_mag_widgets_title' => esc_html__('Category Two', 'ta-mag'),
                'ta_mag_widgets_field_type' => 'select',
                'ta_mag_widgets_field_options' => $ta_mag_cat_list,
            ),
            'recent_post_category_3' => array(
                'ta_mag_widgets_name' => 'recent_post_category_3',
                'ta_mag_widgets_title' => esc_html__('Category Three', 'ta-mag'),
                'ta_mag_widgets_field_type' => 'select',
                'ta_mag_widgets_field_options' => $ta_mag_cat_list,
            ),
            'recent_post_category_4' => array(
                'ta_mag_widgets_name' => 'recent_post_category_4',
                'ta_mag_widgets_title' => esc_html__('Category Four', 'ta-mag'),
                'ta_mag_widgets_field_type' => 'select',
                'ta_mag_widgets_field_options' => $ta_mag_cat_list,
            ),
            'recent_post_category_5' => array(
                'ta_mag_widgets_name' => 'recent_post_category_5',
                'ta_mag_widgets_title' => esc_html__('Category Five', 'ta-mag'),
                'ta_mag_widgets_field_type' => 'select',
                'ta_mag_widgets_field_options' => $ta_mag_cat_list,
            ),
            'recent_post_category_6' => array(
                'ta_mag_widgets_name' => 'recent_post_category_6',
                'ta_mag_widgets_title' => esc_html__('Category Six', 'ta-mag'),
                'ta_mag_widgets_field_type' => 'select',
                'ta_mag_widgets_field_options' => $ta_mag_cat_list,
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
        
        $ta_mag_title_widget = apply_filters( 'widget_title', empty( $instance['recent_post_title'] ) ? '' : $instance['recent_post_title'], $instance, $this->id_base );
        
        $recent_post_category_2 = isset( $instance['recent_post_category_2'] ) ? $instance['recent_post_category_2'] : '' ;
        $recent_post_category_3 = isset( $instance['recent_post_category_3'] ) ? $instance['recent_post_category_3'] : '' ;
        $recent_post_category_4 = isset( $instance['recent_post_category_4'] ) ? $instance['recent_post_category_4'] : '' ;
        $recent_post_category_5 = isset( $instance['recent_post_category_5'] ) ? $instance['recent_post_category_5'] : '' ;
        $recent_post_category_6 = isset( $instance['recent_post_category_6'] ) ? $instance['recent_post_category_6'] : '' ;

        echo $before_widget; ?>

        <div class="ta-widget-category-wrap">
            <div class="ta-widget-category-secondary">

                <?php
                if ( !empty( $ta_mag_title_widget ) ):
                    echo $args['before_title'] . esc_html( $ta_mag_title_widget ) . $args['after_title'];
                endif;

                for( $x = 1; $x <= 6; $x++ ){

                    $recent_post_category = isset( $instance['recent_post_category_'.$x] ) ? $instance['recent_post_category_'.$x] : '' ;

                    if( $recent_post_category ){

                        $category_post_count_1 = ta_mag_count_category_posts( $recent_post_category );
                        $cat_info = get_category_by_slug( $recent_post_category );
                        $cat_link = get_category_link(  $cat_info->term_id );
                        $image_id = get_term_meta($cat_info->term_id,'ta-cat-image',true);
                        $image = wp_get_attachment_image_src( $image_id,'ta-mag-cat-img' );
                        $image = isset( $image[0] ) ? $image[0] : '';
                        ?>
                        <a href="<?php echo esc_url( $cat_link ); ?>" class="item-cat" <?php if( $image ){ ?> style="background-image: url('<?php echo esc_url( $image ); ?>')" <?php } ?>>
                            
                            <?php if( isset( $cat_info->name ) && $cat_info->name ){ ?>
                                <h3><?php echo esc_html( $cat_info->name ); ?></h3>
                            <?php } ?>

                            <span><?php echo absint( $category_post_count_1 ); ?></span>

                        </a>
                        <?php

                    }

                } ?>

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
     * @param	array	$new_instance	Values just sent to be saved.
     * @param	array	$old_instance	Previously saved values from database.
     *
     * @uses	ta_mag_widgets_updated_field_value()		defined in widget-fields.php
     *
     * @return	array Updated safe values to be saved.
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
     * @param	array $instance Previously saved values from database.
     *
     * @uses	ta_mag_widgets_show_widget_field()		defined in widget-fields.php
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
