jQuery(document).ready(function($) {	

    /* Move Widget Area Into Cutomizer Pannel As section */
    wp.customize.section( 'sidebar-widgets-ta-mag-home' ).panel( 'ta_mag_home_panel' );
    wp.customize.section( 'sidebar-widgets-ta-mag-home' ).priority( '10' );
    
    /* Redirect Front Page */
    wp.customize.panel( 'ta_mag_home_panel', function( section ){
        section.expanded.bind( function( isExpanded ) {
            if( isExpanded ){
                wp.customize.previewer.previewUrl.set( ta_mag_customize_data.home_url );
            }
        });
    });

});

( function( api ) {
    
    api.sectionConstructor['ta-mag-pro'] = api.Section.extend( {
        
        attachEvents: function () {},
        
        isContextuallyActive: function () {
            return true;
        }
    } );
} )( wp.customize );