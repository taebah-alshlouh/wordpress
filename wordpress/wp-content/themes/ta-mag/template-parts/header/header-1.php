<?php
/**
 * Customizer Header Layout One
 *
 * @package Ta_Mag
**/

$ed_header_search = get_theme_mod('ed_header_search',1);
$header_class  = '';
if( !$ed_header_search ){
	$header_class = 'ta-no-search';
}
?>
<header id="masthead" class="site-header ta-header-1 <?php echo esc_attr( $header_class ); ?>" >

	<?php ta_mag_header_search(); ?>

    <div class="ta-header-main-wraper <?php if( get_header_image() ){ echo 'ta-has-header-image'; } ?>" <?php if( get_header_image() ){ echo 'style="background-image:url('.esc_url( get_header_image() ).')"'; } ?>>

		<div class="ta-main-header" >
			<div class="ta-container clearfix">

				<?php ta_mag_header_mid(); ?>

			</div>
		</div>

	</div>

	<?php ta_mag_main_nav(); ?>

</header><!-- #masthead -->