<?php

if ( 'posts' == get_option( 'show_on_front' ) && !is_active_sidebar( 'ta-mag-home' ) ) {
    
    include( get_home_template() );

}elseif( is_active_sidebar( 'ta-mag-home' ) ){ 

    get_header(); ?>

	    <div class="ta-home-sections-main">

			<?php dynamic_sidebar( 'ta-mag-home' ); ?>

		</div>

	<?php
	get_footer();

}
else {

    include( get_page_template() );
    
}
