<?php
/**
 * @package TA Mag
 */

add_action('widgets_init', 'ta_mag_post_block_1_register');

function ta_mag_post_block_1_register() {
    register_widget('Ta_Mag_Posts_Block_1_Widget');
}

class Ta_Mag_Posts_Block_1_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
                'Ta_Mag_Posts_Block_1_Widget', esc_html__('TA : Home Section Block 1', 'ta-mag'), array(
                'description' => esc_html__('This Widget show Posts by category', 'ta-mag')
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
            'widget_title_one' => array(
                'ta_mag_widgets_name' => 'widget_title_one',
                'ta_mag_widgets_title' => esc_html__('Title One', 'ta-mag'),
                'ta_mag_widgets_field_type' => 'text',
                'ta_mag_widgets_default_value' => esc_html__('Random Posts', 'ta-mag'),
            ),
            'post_category_one' => array(
                'ta_mag_widgets_name' => 'post_category_one',
                'ta_mag_widgets_title' => esc_html__('Post Category One', 'ta-mag'),
                'ta_mag_widgets_field_type' => 'select',
                'ta_mag_widgets_field_options' => $ta_mag_cat_list,
            ),
            'posts_per_page_1' => array(
                'ta_mag_widgets_name' => 'posts_per_page_1',
                'ta_mag_widgets_title' => esc_html__('Posts Per Page One', 'ta-mag'),
                'ta_mag_widgets_field_type' => 'number',
                'ta_mag_widgets_default_value' => 5,
            ),
            'widget_title_two' => array(
                'ta_mag_widgets_name' => 'widget_title_two',
                'ta_mag_widgets_title' => esc_html__('Title Two', 'ta-mag'),
                'ta_mag_widgets_field_type' => 'text',
                'ta_mag_widgets_default_value' => esc_html__('Recommended Posts', 'ta-mag'),
            ),
            'post_category_two' => array(
                'ta_mag_widgets_name' => 'post_category_two',
                'ta_mag_widgets_title' => esc_html__('Post Category Two', 'ta-mag'),
                'ta_mag_widgets_field_type' => 'select',
                'ta_mag_widgets_field_options' => $ta_mag_cat_list,
            ),
            'posts_per_page_2' => array(
                'ta_mag_widgets_name' => 'posts_per_page_2',
                'ta_mag_widgets_title' => esc_html__('Posts Per Page Two', 'ta-mag'),
                'ta_mag_widgets_field_type' => 'number',
                'ta_mag_widgets_default_value' => 4,
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
        
        if ( is_paged() ) {
            return;
        }
            
        $widget_title_one = apply_filters( 'widget_title', empty( $instance['widget_title_one'] ) ? '' : $instance['widget_title_one'], $instance, $this->id_base );
        $post_category_one = isset( $instance['post_category_one'] ) ? $instance['post_category_one'] : '' ;
        $posts_per_page_1 = isset( $instance['posts_per_page_1'] ) ? $instance['posts_per_page_1'] : '' ;

        $widget_title_two = apply_filters( 'widget_title', empty( $instance['widget_title_two'] ) ? '' : $instance['widget_title_two'], $instance, $this->id_base );
        $post_category_two = isset( $instance['post_category_two'] ) ? $instance['post_category_two'] : '' ;
        $posts_per_page_2 = isset( $instance['posts_per_page_2'] ) ? $instance['posts_per_page_2'] : '' ;


        $block_posts_query_post_args_1 = array(
            'poat_type' => 'post',
            'order' => 'DESC',
            'posts_per_page' => $posts_per_page_1,
            'post_status' => 'publish',
            'category_name' => $post_category_one
        ); 
        $block_posts_query_1 = new WP_Query($block_posts_query_post_args_1);

        $block_posts_query_post_args_2 = array(
            'poat_type' => 'post',
            'order' => 'DESC',
            'posts_per_page' => $posts_per_page_2,
            'post_status' => 'publish',
            'category_name' => $post_category_two
        ); 
        $block_posts_query_2 = new WP_Query($block_posts_query_post_args_2);

        echo $before_widget; ?>

        <div class="ta-home-section ta-block-post-1">
            <div class="ta-container">
                <div class="ta-row clearfix">

                    <div class="ta-left-side ta-col-8">

                        <?php
                        if ( !empty( $widget_title_one ) ):

                            ?>
                            <div class="ta-home-section-title">
                                <h2 class="entry-title ta-extra-large-font ta-secondary-font"><?php echo esc_html( $widget_title_one ); ?> </h2>
                            </div>

                        <?php
                        endif;

                        if( $block_posts_query_1->have_posts() ): ?>

                            <div class="blog-blog-main-wrap">
                                <div class="blog-blog-loop-wrap ta-row clearfix block-post-widget">
                                    <?php
                                    $i = 1;
                                    while( $block_posts_query_1->have_posts() ){
                                            $block_posts_query_1->the_post();

                                        if( $i == 1 ){

                                            $recent_post_image = wp_get_attachment_image_src( get_post_thumbnail_id(),'medium_large' );
                                            $recent_post_image = isset( $recent_post_image[0] ) ? $recent_post_image[0] : ''; ?>

                                            <div class="ta-col-6 block-post-widget-item">
                                                
                                                <article>
                                                    <div class="ta-artical-posts">

                                                    <?php if( $recent_post_image ){ ?>

                                                        <div class="ta-thumbnail-image">
                                                            <a href="<?php the_permalink(); ?>">
                                                                <img src="<?php echo esc_url( $recent_post_image ); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />
                                                            </a>
                                                            <?php ta_mag_post_formate(); ?>
                                                        </div>

                                                    <?php } ?>

                                                    <div class="ta-content-wraper">

                                                        <header class="entry-header">
                                                            <?php ta_mag_entry_footer(); ?>
                                                        </header><!-- .entry-header -->
                                                        
                                                        <?php echo '<h2 class="entry-title ta-large-font"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">'.esc_html( wp_trim_words( get_the_title(),10,'...' ) ).'</a></h2>'; ?>

                                                        <div class="entry-content">
                                                            <?php
                                                            if( has_excerpt() ){
                                                                the_excerpt();
                                                            }else{
                                                                echo esc_html( wp_trim_words( get_the_content(),30,'...' ) );
                                                            }
                                                            ?>
                                                        </div><!-- .entry-content -->

                                                    </div>

                                                        <footer class="entry-footer">

                                                            <div class="entry-meta">
                                                                <?php
                                                                ta_mag_posted_by();
                                                                ta_mag_posted_on();
                                                                ?>
                                                            </div><!-- .entry-meta -->
                                                                
                                                        </footer><!-- .entry-footer -->

                                                    </div>
                                                </article>

                                            </div>

                                        <?php
                                        }else{

                                            $recent_post_image = wp_get_attachment_image_src( get_post_thumbnail_id(),'thumbnail' );
                                            $recent_post_image = isset( $recent_post_image[0] ) ? $recent_post_image[0] : ''; ?>

                                            <div class="ta-col-6 block-post-widget-item">
                                                <div class="ta-thumbnail-title clearfix <?php if( !$recent_post_image ){ echo 'no-image'; } ?>">
                                                    
                                                    <?php if( $recent_post_image ){ ?>

                                                        <div class="ta-thumbnail-image">
                                                            <a href="<?php the_permalink(); ?>">
                                                                <img src="<?php echo esc_url( $recent_post_image ); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />
                                                            </a>
                                                        </div>

                                                    <?php } ?>
                                                    
                                                    <div class="wrap-meta-title">

                                                        <div class="entry-meta">
                                                            <?php
                                                            ta_mag_posted_by();
                                                            ta_mag_posted_on();
                                                            ?>
                                                        </div><!-- .entry-meta -->

                                                        <div class="title-thumbnail-title">
                                                            <h4 class="entry-title ta-medium-font ta-secondary-font"><a href="<?php the_permalink(); ?>"><?php echo esc_html( wp_trim_words( get_the_title(),10,'...' ) ); ?></a></h4>
                                                        </div>

                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        <?php
                                        }

                                        $i++;
                                    } ?>
                                </div>
                            </div>

                        <?php
                        wp_reset_postdata();
                        endif; ?>
                    
                    </div>

                    <div class="ta-right-side ta-col-4">

                        <?php
                        if ( !empty( $widget_title_two ) ):

                            ?>
                            <div class="ta-home-section-title">
                                <h2 class="entry-title ta-extra-large-font ta-secondary-font"><?php echo esc_html( $widget_title_two ); ?> </h2>
                            </div>

                        <?php
                        endif;

                        if( $block_posts_query_2->have_posts() ): ?>

                                <div class="blog-blog-main-wrap">
                                    <div class="blog-blog-loop-wrap">
                                        <?php
                                        while( $block_posts_query_2->have_posts() ){
                                                $block_posts_query_2->the_post();

                                                $recent_post_image = wp_get_attachment_image_src( get_post_thumbnail_id(),'thumbnail' );
                                                $recent_post_image = isset( $recent_post_image[0] ) ? $recent_post_image[0] : ''; ?>

                                                <div class="ta-thumbnail-title clearfix <?php if( !$recent_post_image ){ echo 'no-image'; } ?>">
                                                        
                                                    <?php if( $recent_post_image ){ ?>

                                                        <div class="ta-thumbnail-image">
                                                            <a href="<?php the_permalink(); ?>">
                                                                <img src="<?php echo esc_url( $recent_post_image ); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />
                                                            </a>
                                                        </div>

                                                    <?php } ?>
                                                    
                                                    <div class="wrap-meta-title">

                                                        <div class="entry-meta">
                                                            <?php
                                                            ta_mag_posted_by();
                                                            ta_mag_posted_on();
                                                            ?>
                                                        </div><!-- .entry-meta -->

                                                        <div class="title-thumbnail-title">
                                                            <h4 class="entry-title ta-medium-font"><a href="<?php the_permalink(); ?>"><?php echo esc_html( wp_trim_words( get_the_title(),10,'...' ) ); ?></a></h4>
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
        foreach ( $widget_fields as $widget_field ) {

            // Make array elements available as variables
            extract($widget_field);
            if( array_key_exists( $ta_mag_widgets_name , $instance ) ){
              $ta_mag_widgets_field_value = !empty( $instance[$ta_mag_widgets_name] ) ? esc_attr( $instance[$ta_mag_widgets_name] ) : '';
            }else{
              $ta_mag_widgets_field_value = !empty( $widget_field['ta_mag_widgets_default_value'] ) ? esc_attr( $widget_field['ta_mag_widgets_default_value'] ) : '';
            }
            

            ta_mag_widgets_show_widget_field($this, $widget_field, $ta_mag_widgets_field_value);
        }
    }

}
