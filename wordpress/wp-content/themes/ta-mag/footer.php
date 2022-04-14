<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ta_Mag
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" itemscope itemtype="http://schema.org/WPFooter">

        <?php
        $ed_footer_social_icon = get_theme_mod('ed_footer_social_icon',1);
        $footer_background_image = get_theme_mod('footer_background_image');
        if( 
        	is_active_sidebar('ta-mag-footer-1') || 
            is_active_sidebar('ta-mag-footer-2') || 
            is_active_sidebar('ta-mag-footer-3') || 
        	$ed_footer_social_icon){
            echo '<div class="top-footer" style="background-image:url('.esc_url( $footer_background_image ).')">';
            echo '<div class="ta-container clearfix">';

            if( has_nav_menu('ta-mag-footer-menu') ):

            	echo '<div class="ta-footer-menu">';
	            wp_nav_menu( array(
					'theme_location' => 'ta-mag-footer-menu',
					'menu_id'        => 'footer-menu',
					'depth'			 => 1,
				) );
				echo '</div>';

	        endif;
            $social_link_facebook = get_theme_mod('social_link_facebook');
            $social_link_twitter = get_theme_mod('social_link_twitter');
            $social_link_instagram = get_theme_mod('social_link_instagram');
            $social_link_youtube = get_theme_mod('social_link_youtube');
            $social_link_linkedin = get_theme_mod('social_link_linkedin');
            $social_link_pinterest = get_theme_mod('social_link_pinterest');
            $social_link_vk = get_theme_mod('social_link_vk');
            $social_link_reddit = get_theme_mod('social_link_reddit');
            $social_link_vimeo = get_theme_mod('social_link_vimeo');

            if( ( $social_link_facebook || 
                $social_link_twitter || 
                $social_link_instagram || 
                $social_link_youtube || 
                $social_link_linkedin || 
                $social_link_pinterest || 
                $social_link_vk || 
                $social_link_reddit || 
                $social_link_vimeo ) && $ed_footer_social_icon ){
				echo '<div class="ta-footer-social-icon">';
				    do_action('ta_mag_social_icon_action');
				echo '</div>';
			}

            if( is_active_sidebar('ta-mag-footer-1') || 
            is_active_sidebar('ta-mag-footer-2') || 
            is_active_sidebar('ta-mag-footer-3') ){

    			echo '<div class="footer-widget-area clearfix">';
                for ($x = 0; $x <= 3; $x++) {
                    if( is_active_sidebar('ta-mag-footer-'.$x) ){

                        echo '<div id="ta-footer-widget-'.$x.'" class="ta-footer-widget">';
                            dynamic_sidebar('ta-mag-footer-'.$x);
                        echo '</div>';

                    }
                }

            }
            echo '</div>';
            echo '</div>';
            echo '</div>';

        } ?>

        <div class="bottom-footer">
            <div class="ta-container">
        		<div class="site-info">

        			<?php
        			$footer_copyright_text = get_theme_mod( 'footer_copyright_text',esc_html__( 'Copyright All rights reserved', 'ta-mag' ) );
        			?>
        			<div class="footer-copyright">
                        <span class="copyright-text"><?php echo esc_html( $footer_copyright_text ); ?></span>
            			<span class="sep"> | </span>
            			<?php printf( esc_html__( 'TA Mag - By %1$s.', 'ta-mag' ), '<a target="_blank" href="'.esc_url( 'https://themesarray.com' ).'" rel="designer">'.esc_html__('Themesarray', 'ta-mag').'</a>' ); ?>
    	           </div><!-- .site-info -->

        		</div><!-- .site-info -->
            </div>
        </div>

	</footer><!-- #colophon -->

</div><!-- #page -->

<?php $ed_footer_go_top_button = get_theme_mod('ed_footer_go_top_button',1);
    if( $ed_footer_go_top_button ){ ?>

    <span id="ta-go-top" class="ta-off"><i class="fa fa-angle-up" aria-hidden="true"></i></span>

<?php } ?>

<div id="dynamic-css"></div>

<?php wp_footer(); ?>

</body>
</html>
