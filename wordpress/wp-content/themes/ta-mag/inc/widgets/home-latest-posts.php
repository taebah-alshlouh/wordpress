<?php
/**
 * @package TA Mag
 */

add_action('widgets_init', 'ta_mag_latest_post_register');

function ta_mag_latest_post_register() {
    register_widget('Ta_Mag_Latest_Posts_Widget');
}

class Ta_Mag_Latest_Posts_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
                'Ta_Mag_Latest_Posts_Widget', esc_html__('TA : Home Latest Posts', 'ta-mag'), array(
                'description' => esc_html__('This Widget Latests Posts With sidebar', 'ta-mag')
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
            'home_section_title' => array(
                'ta_mag_widgets_name' => 'home_section_title',
                'ta_mag_widgets_title' => esc_html__('Title', 'ta-mag'),
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
        
        $ta_mag_title_widget = apply_filters( 'widget_title', empty( $instance['home_section_title'] ) ? '' : $instance['home_section_title'], $instance, $this->id_base );


        echo $before_widget;

        $global_sidebar_layout = get_theme_mod('global_sidebar_layout','right-sidebar');
        $ta_archive_layout = get_theme_mod('ta_archive_layout','simple'); ?>

        <div class="ta-container">
            
            <?php
            if ( !empty( $ta_mag_title_widget ) ):

                ?>
                <div class="ta-home-section-title">
                    <h2 class="entry-title ta-extra-large-font ta-secondary-font"><?php echo esc_html( $ta_mag_title_widget ); ?> </h2>
                </div>

            <?php
            endif;
            ?>

            <div id="primary" class="content-area">
              <main id="main" class="site-main <?php if( $ta_archive_layout == 'grid' || $ta_archive_layout == 'masonry' ){ echo 'ta-archive-grid-2 archive-'.esc_attr( $ta_archive_layout ); }else{ echo 'ta-archive-simple'; } ?> clearfix">

              <?php
              if ( have_posts() ) :

                if ( is_home() && ! is_front_page() ) :
                  ?>
                  <header>
                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                  </header>
                  <?php
                endif;

                /* Start the Loop */
                while ( have_posts() ) :
                  the_post();

                  /*
                   * Include the Post-Type-specific template for the content.
                   * If you want to override this in a child theme, then include a file
                   * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                   */
                  get_template_part( 'template-parts/content', get_post_type() );

                endwhile;

              else :

                get_template_part( 'template-parts/content', 'none' );

              endif;
              ?>

              </main><!-- #main -->

              <?php the_posts_pagination(); ?>

            </div><!-- #primary -->

            <?php if( $global_sidebar_layout != 'no-sidebar' ){ get_sidebar(); } ?>

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
