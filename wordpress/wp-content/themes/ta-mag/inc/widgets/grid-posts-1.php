<?php
/**
 * @package TA Mag
 */

add_action('widgets_init', 'ta_mag_grid_post_register');

function ta_mag_grid_post_register() {
		register_widget('Ta_Mag_Grid_Posts_Widget');
}

class Ta_Mag_Grid_Posts_Widget extends WP_Widget {

		public function __construct() {
				parent::__construct(
								'Ta_Mag_Grid_Posts_Widget', esc_html__('TA : Home Section Grid 1', 'ta-mag'), array(
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
						'home_section_title' => array(
								'ta_mag_widgets_name' => 'home_section_title',
								'ta_mag_widgets_title' => esc_html__('Title', 'ta-mag'),
								'ta_mag_widgets_field_type' => 'text',
								'ta_mag_widgets_default_value' => esc_html__('Popular on This Week', 'ta-mag'),
						),
						'section_post_category' => array(
								'ta_mag_widgets_name' => 'section_post_category',
								'ta_mag_widgets_title' => esc_html__('Blog Category', 'ta-mag'),
								'ta_mag_widgets_field_type' => 'select',
								'ta_mag_widgets_field_options' => $ta_mag_cat_list,
						),
						'posts_per_page' => array(
								'ta_mag_widgets_name' => 'posts_per_page',
								'ta_mag_widgets_title' => esc_html__('Posts Per Page', 'ta-mag'),
								'ta_mag_widgets_field_type' => 'number',
								'ta_mag_widgets_default_value' => 6,
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

			$ta_mag_title_widget = apply_filters( 'widget_title', empty( $instance['home_section_title'] ) ? '' : $instance['home_section_title'], $instance, $this->id_base );
			$section_post_category = isset( $instance['section_post_category'] ) ? $instance['section_post_category'] : '' ;
			$posts_per_page = isset( $instance['posts_per_page'] ) ? $instance['posts_per_page'] : '' ;
			if($posts_per_page == ''){ $posts_per_page = '4'; }

			$grid_post_args = array(
					'poat_type' => 'post',
					'order' => 'DESC',
					'posts_per_page' => $posts_per_page,
					'post_status' => 'publish',
					'category_name' => $section_post_category
			); 
			$grid_post_query = new WP_Query($grid_post_args);

			echo $before_widget; ?>

			<div class="grid-blog-wrap grid-blog-wrap-1">
				<div class="ta-container">
						
					<?php
					if ( !empty( $ta_mag_title_widget ) ):

						?>
						<div class="ta-home-section-title">
							<h2 class="entry-title ta-extra-large-font ta-secondary-font"><?php echo esc_html( $ta_mag_title_widget ); ?> </h2>
						</div>

					<?php
					endif;

					if( $grid_post_query->have_posts() ): ?>

						<div class="grid-blog-main-wrap">
							<div class="ta-row-2 clearfix">
									<?php
									while( $grid_post_query->have_posts() ){
										$grid_post_query->the_post();

										$grid_post_image = wp_get_attachment_image_src( get_post_thumbnail_id(),'medium_large' );
										$grid_post_image = isset( $grid_post_image[0] ) ? $grid_post_image[0] : ''; ?>

										<div class="ta-col-2-4">

											<div class="ta-grid-content-main">

												<div class="ta-banner-content ta-banner-content-height-1" <?php if( $grid_post_image ){ ?> style="background-image: url(<?php echo esc_url( $grid_post_image ); ?> );" <?php } ?> >
												</div>

												<?php ta_mag_post_formate(); ?>
												
												<div class="ta-content-absolute-2 ta-content-white">

													<header class="entry-header ta-align-center">
														<?php ta_mag_entry_footer(); ?>
													</header><!-- .entry-header -->

													<div class="entry-meta ta-align-center">
														<?php
														ta_mag_posted_by();
														ta_mag_posted_on();
														?>
													</div><!-- .entry-meta -->

													<div class="title-grid-post ta-align-center">
														<h4 class="entry-title ta-extra-large-font ta-secondary-font"><a href="<?php the_permalink(); ?>"><?php echo esc_html( wp_trim_words( get_the_title(),10,'...' ) ); ?></a></h4>
													</div>

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
