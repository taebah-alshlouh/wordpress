<?php
/**
 * @package TA Mag
 */

add_action('widgets_init', 'ta_mag_slider_posts_register');

function ta_mag_slider_posts_register() {
	register_widget('Ta_Mag_Slider_Posts_Widget');
}

class Ta_Mag_Slider_Posts_Widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
				'Ta_Mag_Slider_Posts_Widget', esc_html__('TA : Home Section Slider 1', 'ta-mag'), array(
				'description' => esc_html__('This Widget show Posts in Slides', 'ta-mag')
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
			'slider_ed_full_width' => array(
				'ta_mag_widgets_name' => 'slider_ed_full_width',
				'ta_mag_widgets_title' => esc_html__('Enable Full Width', 'ta-mag'),
				'ta_mag_widgets_field_type' => 'checkbox',
				'ta_mag_widgets_default_value' => 0,
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
		$slider_ed_full_width = isset( $instance['slider_ed_full_width'] ) ? $instance['slider_ed_full_width'] : '' ;

		if( $slider_ed_full_width ){
			$height_class = 'ta-banner-content-height-2';
		}else{
			$height_class = 'ta-banner-content-height-1';
		}

		$slider_post_args = array(
			'poat_type' => 'post',
			'order' => 'DESC',
			'posts_per_page' => $posts_per_page,
			'post_status' => 'publish',
			'category_name' => $section_post_category
		); 
		$banner_post_query = new WP_Query($slider_post_args);

		echo $before_widget; ?>

		<div class="ta-banner-wrap">

		  <?php
			if ( !empty( $ta_mag_title_widget ) ):

				?>
				<div class="ta-container clearfix">
					<div class="ta-home-section-title">
						<h2 class="entry-title ta-extra-large-font ta-secondary-font"><?php echo esc_html( $ta_mag_title_widget ); ?> </h2>
					</div>
				</div>

			<?php
			endif;

			if( $banner_post_query->have_posts() ): 

			  	if( !$slider_ed_full_width ){ ?>
			  	<div class="ta-container clearfix">
			  	<?php } ?>

					<div class="ta-main-banner ta-banner-1">

						<div class="action-banner-1">
							<?php
							while( $banner_post_query->have_posts() ){
									$banner_post_query->the_post();

								$banner_post_image = wp_get_attachment_image_src( get_post_thumbnail_id(),'full' );
								$banner_post_image = isset( $banner_post_image[0] ) ? $banner_post_image[0] : ''; ?>

								<div class="ta-banner-loop">

									<div class="ta-banner-content <?php echo $height_class; ?>" <?php if( $banner_post_image ){ ?> style="background-image: url(<?php echo esc_url( $banner_post_image ); ?> );" <?php } ?> >
										  
									</div>

									<div class="ta-content-absolute ta-content-white">

										<header class="entry-header">
										  <?php ta_mag_entry_footer(); ?>
										</header><!-- .entry-header -->
			
										<div class="entry-meta">
											<?php
											ta_mag_posted_by();
											ta_mag_posted_on();
											?>
										</div><!-- .entry-meta -->

										<div class="title-banner-post">
											<h4 class="entry-title ta-extra-large-font ta-secondary-font"><a href="<?php the_permalink(); ?>"><?php echo esc_html( wp_trim_words( get_the_title(),10,'...' ) ); ?></a></h4>
										</div>

									</div>

								</div>
									<?php
							} ?>
						</div>

						<div class="action-banner-nav-area">

						  <div class="action-banner-1-nav">
							  <?php
							  $i = 0;
							  while( $banner_post_query->have_posts() ){
									$banner_post_query->the_post();

									$banner_post_image = wp_get_attachment_image_src( get_post_thumbnail_id(),'full' ); 
									$banner_post_image = isset( $banner_post_image[0] ) ? $banner_post_image[0] : ''; ?>

									<div class="ta-banner-nav-loop clearfix <?php if( !$banner_post_image[0] ){ echo 'no-image'; } ?>"  index-data="<?php echo $i; ?>">

										<?php if( $banner_post_image ){ ?>

											<div class="banner-post-image" <?php if( $banner_post_image ){ ?> style="background-image: url(<?php echo esc_url( $banner_post_image ); ?> );" <?php } ?>>
											</div>

											<?php } ?>
											
											<div class="wrap-meta-title">

												<div class="title-banner-post">
													<h4 class="entry-title ta-medium-font ta-secondary-font"><?php echo esc_html( wp_trim_words( get_the_title(),10,'...' ) ); ?></h4>
												</div>

												<div class="entry-meta">
													<?php ta_mag_posted_on(); ?>
												</div><!-- .entry-meta -->

											</div>
											
										</div>

								  <?php
								  $i++;

							  } ?>
						  </div>

					  </div>

				  </div>
			  	
			  	<?php 
			  	if( !$slider_ed_full_width ){ ?>
			  	</div>
			  	<?php }
			
			endif; ?>

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
