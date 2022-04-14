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
<header id="masthead" class="site-header ta-header-2 <?php if( get_header_image() ){ echo 'ta-has-header-image'; } ?> <?php echo esc_attr( $header_class ); ?>" <?php if( get_header_image() ){ echo 'style="background-image:url('.esc_url( get_header_image() ).')"'; } ?>>

	<?php ta_mag_header_search(); ?>

	<div class="ta-main-header">
		<div class="ta-container clearfix">

			<?php ta_mag_header_mid(); ?>
			
			<?php ta_mag_main_nav(); ?>

		</div>
	</div>

</header><!-- #masthead -->