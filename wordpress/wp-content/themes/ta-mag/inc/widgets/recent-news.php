<?php
/**
 * @package TA Mag
 */

add_action('widgets_init', 'ta_mag_recent_post_register');

function ta_mag_recent_post_register() {
    register_widget('Ta_Mag_Recent_Posts_Widget');
}

class Ta_Mag_Recent_Posts_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
                'Ta_Mag_Recent_Posts_Widget', esc_html__('TA : Sidebar Recent Posts', 'ta-mag'), array(
                'description' => esc_html__('This Widget show Recent Posts', 'ta-mag')
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
            'recent_post_category' => array(
                'ta_mag_widgets_name' => 'recent_post_category',
                'ta_mag_widgets_title' => esc_html__('Blog Category', 'ta-mag'),
                'ta_mag_widgets_field_type' => 'select',
                'ta_mag_widgets_field_options' => $ta_mag_cat_list,
            ),
            'recent_post_posts' => array(
                'ta_mag_widgets_name' => 'recent_post_posts',
                'ta_mag_widgets_title' => esc_html__('Recent Blog Posts Number', 'ta-mag'),
                'ta_mag_widgets_field_type' => 'number',
                'ta_mag_widgets_default_value' => 5,
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
        $ta_post_slide_layout = isset( $instance['ta_post_slide_layout'] ) ? $instance['ta_post_slide_layout'] : '' ;
        $recent_post_category = isset( $instance['recent_post_category'] ) ? $instance['recent_post_category'] : '' ;
        $recent_post_posts = isset( $instance['recent_post_posts'] ) ? $instance['recent_post_posts'] : '' ;
        if($recent_post_posts == ''){ $recent_post_posts = '4'; }

        $recent_post_args = array(
            'poat_type' => 'post',
            'order' => 'DESC',
            'posts_per_page' => $recent_post_posts,
            'post_status' => 'publish',
            'category_name' => $recent_post_category
        ); 
        $recent_post_query = new WP_Query($recent_post_args);

        echo $before_widget; ?>

        <div class="recent-blog-wrap">
            <div class="recent-blog-contents">
                <?php
                
                if (!empty($ta_mag_title_widget)): ?>
                    <?php echo $args['before_title'] . esc_html($ta_mag_title_widget) . $args['after_title']; ?>
                <?php endif;
                if( $recent_post_query->have_posts() ): ?>

                        <div class="recent-blog-main-wrap">
                            <div class="recent-blog-loop-wrap">
                                <?php
                                while( $recent_post_query->have_posts() ){
                                        $recent_post_query->the_post();

                                        $recent_post_image = wp_get_attachment_image_src( get_post_thumbnail_id(),'thumbnail' );
                                        $recent_post_image = isset( $recent_post_image[0] ) ? $recent_post_image[0] : ''; ?>

                                        <div class="loop-posts-blog-recent clearfix <?php if( !$recent_post_image[0] ){ echo 'no-image'; } ?>">
                                            
                                            <?php if( $recent_post_image ){ ?>

                                                <div class="recent-post-image">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <img src="<?php echo esc_url( $recent_post_image ); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />
                                                    </a>
                                                </div>

                                            <?php } ?>
                                            
                                            <div class="wrap-meta-title">

                                                <div class="entry-meta">
                                                    <?php
                                                    ta_mag_posted_on();
                                                    ?>
                                                </div><!-- .entry-meta -->

                                                <div class="title-recent-post">
                                                    <h4 class="entry-title ta-small-font ta-secondary-font"><a href="<?php the_permalink(); ?>"><?php echo esc_html( wp_trim_words( get_the_title(),10,'...' ) ); ?></a></h4>
                                                </div>

                                            </div>
                                            
                                        </div>
                                        <?php
                                } ?>
                            </div>
                        </div>

                <?php
                wp_reset_postdata();
                endif; ?>
                
                
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
