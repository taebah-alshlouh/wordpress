<?php
/**
 * Customizer Sanitize Functions
 *
 * @package Ta_Mag
**/

if( !function_exists('ta_mag_main_nav') ):

	function ta_mag_main_nav(){ ?>

		<nav id="site-navigation" class="main-navigation">

			<div class="ta-container clearfix">

				<div class="ta-main-menu-flex">

					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">

						<svg viewBox="0 0 448 512"><path fill="currentColor" d="M442 114H6a6 6 0 0 1-6-6V84a6 6 0 0 1 6-6h436a6 6 0 0 1 6 6v24a6 6 0 0 1-6 6zm0 160H6a6 6 0 0 1-6-6v-24a6 6 0 0 1 6-6h436a6 6 0 0 1 6 6v24a6 6 0 0 1-6 6zm0 160H6a6 6 0 0 1-6-6v-24a6 6 0 0 1 6-6h436a6 6 0 0 1 6 6v24a6 6 0 0 1-6 6z" class=""></path></svg>

					</button>

					<div class="ta-main-menu-wraper">

						<a class="focus-on-last-menu" href="javascript:void(0)"></a>

						<button id="ta-close-menu">
							<svg viewBox="0 0 320 512"><path fill="currentColor" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z" class=""></path></svg>
						</button>

						<?php
						wp_nav_menu( array(
							'theme_location' => 'ta-mag-primary-menu',
							'menu_id'        => 'primary-menu',
						) ); ?>

						<a class="focus-on-close-menu" href="javascript:void(0)"></a>

					</div>

					<?php
					if( is_active_sidebar( 'ta-mag-offcanvas' ) ){ ?>
						<button class="ta-offcanvas-toggle">

							<svg viewBox="0 0 448 512"><path fill="currentColor" d="M442 114H6a6 6 0 0 1-6-6V84a6 6 0 0 1 6-6h436a6 6 0 0 1 6 6v24a6 6 0 0 1-6 6zm0 160H6a6 6 0 0 1-6-6v-24a6 6 0 0 1 6-6h436a6 6 0 0 1 6 6v24a6 6 0 0 1-6 6zm0 160H6a6 6 0 0 1-6-6v-24a6 6 0 0 1 6-6h436a6 6 0 0 1 6 6v24a6 6 0 0 1-6 6z" class=""></path></svg>

						</button>
					<?php } ?>

				</div>

			</div>
		</nav><!-- #site-navigation -->
		
		<?php
		if( is_active_sidebar( 'ta-mag-offcanvas' ) ){ ?>

			<div class="ta-offcanvas-container">
				
				<a class="focus-on-last-widget" href="javascript:void(0)"></a>

				<button class="ta-offcanvas-toggle ta-offcanvas-toggle-close">

					<svg viewBox="0 0 320 512"><path fill="currentColor" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z" class=""></path></svg>

				</button>

				<div class="ta-offcanvas-content">
					
					<?php dynamic_sidebar( 'ta-mag-offcanvas' ); ?>
					
				</div>
				<a class="focus-on-last-widget-1" href="javascript:void(0)"></a>
				<a class="focus-on-offcanvas-close" href="javascript:void(0)"></a>

			</div>

		<?php }
	}

endif;


if( !function_exists('ta_mag_header_search') ):

	function ta_mag_header_search(){ ?>

		<?php
		$ed_header_search = get_theme_mod('ed_header_search',1);
		if( $ed_header_search ){ ?>

			<div id="ta-header-search" class="ta-header-search">
				<div class="ta-container clearfix">
	            	
	            	<a class="focus-on-close" href="javascript:void(0)"></a>
	            	<?php get_search_form(); ?>

	            	<div class="ta-header-search-close">
			            <a id="ta-search-close" href="javascript:void(0)"><svg viewBox="0 0 320 512"><path fill="currentColor" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z" class=""></path></svg></a>
			        </div>

			        <a class="focus-on-input" href="javascript:void(0)"></a>

		        </div>
	        </div>

	    <?php }

	}

endif;

if( !function_exists('ta_mag_header_mid') ):

	function ta_mag_header_mid(){ ?>

		<div class="ta-mid-header">

			<?php 
			$ed_header_social_icon = get_theme_mod('ed_header_social_icon',1);
			if( $ed_header_social_icon ){
				do_action('ta_mag_social_icon_action');
			} ?>

			<div class="site-branding">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
				else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
				endif;
				
				$ta_mag_description = get_bloginfo( 'description', 'display' );
				if ( $ta_mag_description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo esc_html( $ta_mag_description ); /* WPCS: xss ok. */ ?></p>
				<?php endif; ?>

			</div><!-- .site-branding -->

			<?php
			$ed_header_search = get_theme_mod('ed_header_search',1);
			if( $ed_header_search ){ ?>

				<div class="ta-header-search-main <?php if( !$ed_header_social_icon ){ echo 'ta-no-social-icon'; } ?>">
					<a class="ta-search-toggle" href="javascript:void(0)">
						<svg viewBox="0 0 512 512"><path fill="currentColor" d="M508.5 481.6l-129-129c-2.3-2.3-5.3-3.5-8.5-3.5h-10.3C395 312 416 262.5 416 208 416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c54.5 0 104-21 141.1-55.2V371c0 3.2 1.3 6.2 3.5 8.5l129 129c4.7 4.7 12.3 4.7 17 0l9.9-9.9c4.7-4.7 4.7-12.3 0-17zM208 384c-97.3 0-176-78.7-176-176S110.7 32 208 32s176 78.7 176 176-78.7 176-176 176z" class=""></path></svg>
					</a>
				</div>

			<?php } ?>

		</div>

	<?php
	}

endif;

if( !function_exists('ta_mag_social_icon') ):

	function ta_mag_social_icon(){

		$social_link_facebook = get_theme_mod('social_link_facebook');
		$social_link_twitter = get_theme_mod('social_link_twitter');
		$social_link_instagram = get_theme_mod('social_link_instagram');
		$social_link_youtube = get_theme_mod('social_link_youtube');
		$social_link_linkedin = get_theme_mod('social_link_linkedin');
		$social_link_pinterest = get_theme_mod('social_link_pinterest');
		$social_link_vk = get_theme_mod('social_link_vk');
		$social_link_reddit = get_theme_mod('social_link_reddit');
		$social_link_vimeo = get_theme_mod('social_link_vimeo');

		if( $social_link_facebook || 
			$social_link_twitter || 
			$social_link_instagram || 
			$social_link_youtube || 
			$social_link_linkedin || 
			$social_link_pinterest || 
			$social_link_vk || 
			$social_link_reddit || 
			$social_link_vimeo ){ ?>

			<div class="ta-social-icon">

				<?php if( $social_link_facebook ){ ?>
					<a target="_blank" href="<?php echo esc_url( $social_link_facebook ); ?>"><i class="fab fa-facebook-f"></i></a>
				<?php } ?>

				<?php if( $social_link_twitter ){ ?>
					<a target="_blank" href="<?php echo esc_url( $social_link_twitter ); ?>"><i class="fab fa-twitter"></i></a>
				<?php } ?>

				<?php if( $social_link_instagram ){ ?>
					<a target="_blank" href="<?php echo esc_url( $social_link_instagram ); ?>"><i class="fab fa-instagram"></i></a>
				<?php } ?>

				<?php if( $social_link_linkedin ){ ?>
					<a target="_blank" href="<?php echo esc_url( $social_link_linkedin ); ?>"><i class="fab fa-linkedin-in"></i></a>
				<?php } ?>

				<?php if( $social_link_youtube ){ ?>
					<a target="_blank" href="<?php echo esc_url( $social_link_youtube ); ?>"><i class="fab fa-youtube"></i></a>
				<?php } ?>

				<?php if( $social_link_pinterest ){ ?>
					<a target="_blank" href="<?php echo esc_url( $social_link_pinterest ); ?>"><i class="fab fa-pinterest-p"></i></a>
				<?php } ?>

				<?php if( $social_link_vk ){ ?>
					<a target="_blank" href="<?php echo esc_url( $social_link_vk ); ?>"><i class="fab fa-vk"></i></i></a>
				<?php } ?>

				<?php if( $social_link_reddit ){ ?>
					<a target="_blank" href="<?php echo esc_url( $social_link_reddit ); ?>"><i class="fab fa-reddit-alien"></i></a>
				<?php } ?>

				<?php if( $social_link_vimeo ){ ?>
					<a target="_blank" href="<?php echo esc_url( $social_link_vimeo ); ?>"><i class="fab fa-vimeo-v"></i></a>
				<?php } ?>

			</div>

		<?php }

	}

endif;

add_action( 'ta_mag_social_icon_action','ta_mag_social_icon' );

if( !function_exists('ta_mag_category_list') ):

	/** Post Category List **/
	function ta_mag_category_list(){
	    $cat_lists = get_categories(
	        array(
	            'hide_empty' => '0',
	            'exclude' => '1',
	        )
	    );
	    $cat_array = array();
	    $cat_array[] = esc_html__('--Choose Category--','ta-mag');
	    foreach( $cat_lists as $cat_list ){
	        $cat_array[$cat_list->slug] = $cat_list->name;
	    }
	    return $cat_array;
	}

endif;

function ta_mag_count_category_posts( $category ) {
	
	if( is_string( $category ) ){

	    $catID = get_cat_ID( $category );

	}elseif( is_numeric( $category ) ) {

	    $catID = $category;

	}else{

	    return 0;

	}

	$cat = get_category( $catID );
	return $cat->count;

}

function ta_mag_post_formate(){

    $post_formate = esc_html( get_post_format( get_the_ID() ) );

    if( $post_formate == 'gallery' ){
        $icon_class = '<svg viewBox="0 0 512 512" class="svg-inline--fa"><path fill="currentColor" d="M528 32H112c-26.51 0-48 21.49-48 48v16H48c-26.51 0-48 21.49-48 48v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48v-16h16c26.51 0 48-21.49 48-48V80c0-26.51-21.49-48-48-48zm-48 400c0 8.822-7.178 16-16 16H48c-8.822 0-16-7.178-16-16V144c0-8.822 7.178-16 16-16h16v240c0 26.51 21.49 48 48 48h368v16zm64-64c0 8.822-7.178 16-16 16H112c-8.822 0-16-7.178-16-16V80c0-8.822 7.178-16 16-16h416c8.822 0 16 7.178 16 16v288zM176 200c30.928 0 56-25.072 56-56s-25.072-56-56-56-56 25.072-56 56 25.072 56 56 56zm0-80c13.234 0 24 10.766 24 24s-10.766 24-24 24-24-10.766-24-24 10.766-24 24-24zm240.971 23.029c-9.373-9.373-24.568-9.373-33.941 0L288 238.059l-31.029-31.03c-9.373-9.373-24.569-9.373-33.941 0l-88 88A24.002 24.002 0 0 0 128 312v28c0 6.627 5.373 12 12 12h360c6.627 0 12-5.373 12-12v-92c0-6.365-2.529-12.47-7.029-16.971l-88-88zM480 320H160v-4.686l80-80 48 48 112-112 80 80V320z" ></path></svg>';
    }elseif( $post_formate == 'link' ){
        $icon_class = '<svg viewBox="0 0 512 512" class="svg-inline--fa"><path fill="currentColor" d="M301.148 394.702l-79.2 79.19c-50.778 50.799-133.037 50.824-183.84 0-50.799-50.778-50.824-133.037 0-183.84l79.19-79.2a132.833 132.833 0 0 1 3.532-3.403c7.55-7.005 19.795-2.004 20.208 8.286.193 4.807.598 9.607 1.216 14.384.481 3.717-.746 7.447-3.397 10.096-16.48 16.469-75.142 75.128-75.3 75.286-36.738 36.759-36.731 96.188 0 132.94 36.759 36.738 96.188 36.731 132.94 0l79.2-79.2.36-.36c36.301-36.672 36.14-96.07-.37-132.58-8.214-8.214-17.577-14.58-27.585-19.109-4.566-2.066-7.426-6.667-7.134-11.67a62.197 62.197 0 0 1 2.826-15.259c2.103-6.601 9.531-9.961 15.919-7.28 15.073 6.324 29.187 15.62 41.435 27.868 50.688 50.689 50.679 133.17 0 183.851zm-90.296-93.554c12.248 12.248 26.362 21.544 41.435 27.868 6.388 2.68 13.816-.68 15.919-7.28a62.197 62.197 0 0 0 2.826-15.259c.292-5.003-2.569-9.604-7.134-11.67-10.008-4.528-19.371-10.894-27.585-19.109-36.51-36.51-36.671-95.908-.37-132.58l.36-.36 79.2-79.2c36.752-36.731 96.181-36.738 132.94 0 36.731 36.752 36.738 96.181 0 132.94-.157.157-58.819 58.817-75.3 75.286-2.651 2.65-3.878 6.379-3.397 10.096a163.156 163.156 0 0 1 1.216 14.384c.413 10.291 12.659 15.291 20.208 8.286a131.324 131.324 0 0 0 3.532-3.403l79.19-79.2c50.824-50.803 50.799-133.062 0-183.84-50.802-50.824-133.062-50.799-183.84 0l-79.2 79.19c-50.679 50.682-50.688 133.163 0 183.851z" ></path></svg>';
    }elseif( $post_formate == 'image' ){
        $icon_class = '<svg viewBox="0 0 512 512" class="svg-inline--fa"><path fill="currentColor" d="M32 58V38c0-3.3 2.7-6 6-6h116c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H38c-3.3 0-6-2.7-6-6zm344 230c0-66.2-53.8-120-120-120s-120 53.8-120 120 53.8 120 120 120 120-53.8 120-120zm-32 0c0 48.5-39.5 88-88 88s-88-39.5-88-88 39.5-88 88-88 88 39.5 88 88zm-120 0c0-17.6 14.4-32 32-32 8.8 0 16-7.2 16-16s-7.2-16-16-16c-35.3 0-64 28.7-64 64 0 8.8 7.2 16 16 16s16-7.2 16-16zM512 80v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V144c0-26.5 21.5-48 48-48h136l33.6-44.8C226.7 39.1 240.9 32 256 32h208c26.5 0 48 21.5 48 48zM224 96h240c5.6 0 11 1 16 2.7V80c0-8.8-7.2-16-16-16H256c-5 0-9.8 2.4-12.8 6.4L224 96zm256 48c0-8.8-7.2-16-16-16H48c-8.8 0-16 7.2-16 16v288c0 8.8 7.2 16 16 16h416c8.8 0 16-7.2 16-16V144z" ></path></svg>';
    }elseif( $post_formate == 'video' ){
        $icon_class = '<svg viewBox="0 0 512 512" class="svg-inline--fa"><path fill="currentColor" d="M256 504c137 0 248-111 248-248S393 8 256 8 8 119 8 256s111 248 248 248zM40 256c0-118.7 96.1-216 216-216 118.7 0 216 96.1 216 216 0 118.7-96.1 216-216 216-118.7 0-216-96.1-216-216zm331.7-18l-176-107c-15.8-8.8-35.7 2.5-35.7 21v208c0 18.4 19.8 29.8 35.7 21l176-101c16.4-9.1 16.4-32.8 0-42zM192 335.8V176.9c0-4.7 5.1-7.6 9.1-5.1l134.5 81.7c3.9 2.4 3.8 8.1-.1 10.3L201 341c-4 2.3-9-.6-9-5.2z" ></path></svg>';
    }elseif( $post_formate == 'quote' ){
        $icon_class = '<svg viewBox="0 0 512 512" class="svg-inline--fa"><path fill="currentColor" d="M176 32H64C28.7 32 0 60.7 0 96v128c0 35.3 28.7 64 64 64h64v24c0 30.9-25.1 56-56 56H56c-22.1 0-40 17.9-40 40v32c0 22.1 17.9 40 40 40h16c92.6 0 168-75.4 168-168V96c0-35.3-28.7-64-64-64zm32 280c0 75.1-60.9 136-136 136H56c-4.4 0-8-3.6-8-8v-32c0-4.4 3.6-8 8-8h16c48.6 0 88-39.4 88-88v-56H64c-17.7 0-32-14.3-32-32V96c0-17.7 14.3-32 32-32h112c17.7 0 32 14.3 32 32v216zM448 32H336c-35.3 0-64 28.7-64 64v128c0 35.3 28.7 64 64 64h64v24c0 30.9-25.1 56-56 56h-16c-22.1 0-40 17.9-40 40v32c0 22.1 17.9 40 40 40h16c92.6 0 168-75.4 168-168V96c0-35.3-28.7-64-64-64zm32 280c0 75.1-60.9 136-136 136h-16c-4.4 0-8-3.6-8-8v-32c0-4.4 3.6-8 8-8h16c48.6 0 88-39.4 88-88v-56h-96c-17.7 0-32-14.3-32-32V96c0-17.7 14.3-32 32-32h112c17.7 0 32 14.3 32 32v216z" ></path></svg>';
    }elseif( $post_formate == 'audio' ){
        $icon_class = '<svg viewBox="0 0 512 512" class="svg-inline--fa"><path fill="currentColor" d="M342.91 193.57c-7.81-3.8-17.5-.48-21.34 7.5-3.81 7.97-.44 17.53 7.53 21.34C343.22 229.2 352 242.06 352 256s-8.78 26.8-22.9 33.58c-7.97 3.81-11.34 13.38-7.53 21.34 3.86 8.05 13.54 11.29 21.34 7.5C368.25 306.28 384 282.36 384 256s-15.75-50.29-41.09-62.43zM231.81 64c-5.91 0-11.92 2.18-16.78 7.05L126.06 160H24c-13.26 0-24 10.74-24 24v144c0 13.25 10.74 24 24 24h102.06l88.97 88.95c4.87 4.87 10.88 7.05 16.78 7.05 12.33 0 24.19-9.52 24.19-24.02V88.02C256 73.51 244.13 64 231.81 64zM224 404.67L139.31 320H32V192h107.31L224 107.33v297.34zM421.51 1.83c-7.89-4.08-17.53-1.12-21.66 6.7-4.13 7.81-1.13 17.5 6.7 21.61 84.76 44.55 137.4 131.1 137.4 225.85s-52.64 181.3-137.4 225.85c-7.82 4.11-10.83 13.8-6.7 21.61 4.1 7.75 13.68 10.84 21.66 6.7C516.78 460.06 576 362.67 576 255.99c0-106.67-59.22-204.06-154.49-254.16zM480 255.99c0-66.12-34.02-126.62-88.81-157.87-7.69-4.38-17.59-1.78-22.04 5.89-4.45 7.66-1.77 17.44 5.96 21.86 44.77 25.55 72.61 75.4 72.61 130.12s-27.84 104.58-72.61 130.12c-7.72 4.42-10.4 14.2-5.96 21.86 4.3 7.38 14.06 10.44 22.04 5.89C445.98 382.62 480 322.12 480 255.99z" ></path></svg>';
    }else{
        $icon_class = '';
    }
    if( $icon_class ){
    ?>
        <div class="post-formate-icon">

            	<?php echo $icon_class; ?>

        </div>
    <?php
    }

}

if( ! function_exists( 'ta_mag_single_related_post' ) ) :

    /** Get Related Posts **/
    function ta_mag_single_related_post(){

    	$ed_related_posts = get_theme_mod('ed_related_posts',1);
    	if( !is_singular('post') || !$ed_related_posts ){
			return;
		}

        global $post;
        $cats = get_the_category( $post->ID );

        if( $cats ){

            $list_cats = array();
            foreach( $cats as $cat ){
                $list_cats[] = $cat->term_id; 
            }

        }

        $related_posts_query = new WP_Query( array( 'post_type' => 'post','posts_per_page' => 3,'post__not_in' => array( $post->ID, 'category__in' => $list_cats ) ) );

        if( $related_posts_query->have_posts() ): 
            
            $related_posts_title = get_theme_mod('related_posts_title',esc_html__( 'Related Posts','ta-mag' ) ); ?>

            <div class="single-related-posts clearfix">
                <div class="ta-container">

                    <?php if( $related_posts_title ){ ?>

                        <div class="ta-home-section-title">
		                    <h2 class="entry-title ta-extra-large-font ta-secondary-font"><?php echo esc_html( $related_posts_title ); ?></h2>
		                </div>

                    <?php } ?>

                    <div class="wrap-related-posts ta-row-2 clearfix">

                        <?php while( $related_posts_query->have_posts() ){
                            $related_posts_query->the_post();

                            $ta_mag_related_image = wp_get_attachment_image_src( get_post_thumbnail_id(),'medium_large' ); ?>

                            <div class="loop-related-conents ta-match-height ta-col-2-4">
                                <div class="related-img-contents">

                                	<?php if( isset( $ta_mag_related_image[0] ) && $ta_mag_related_image[0] ){ ?>
                                    <div class="related-image">
                                        <a href="<?php the_permalink(); ?>">

                                             <img src="<?php echo  esc_url( $ta_mag_related_image[0]); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>"/>
                                            
                                        </a>
                                    </div>
                                    <?php } ?>
                                    <div class="related-title-cat-date">

                                        <?php
                                        the_title( '<h2 class="entry-title ta-medium-font ta-secondary-font"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                                        ?>

                                        <footer class="entry-footer">

											<div class="entry-meta">
												<?php
												ta_mag_posted_by();
												ta_mag_posted_on();
												?>
											</div><!-- .entry-meta -->
												
										</footer><!-- .entry-footer -->

                                    </div>

                                </div>
                            </div>

                        <?php }
                        wp_reset_postdata(); ?>

                    </div>

                </div>
            </div>
        <?php endif;
    }

endif;