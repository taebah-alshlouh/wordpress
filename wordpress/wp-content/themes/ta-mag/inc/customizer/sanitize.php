<?php
/**
 * Customizer Sanitize Functions
 *
 * @package Ta_Mag
**/


if( !function_exists('ta_mag_sanitize_checkbox') ):

	/**
	* Customizer Checkbox Sanitize
	**/

	function ta_mag_sanitize_checkbox($input){

	    if($input == 1){
	        return 1;
	    }else{
	        return '';
	    }

	}

endif;

if( !function_exists('ta_mag_sanitize_sidebar') ):

	/**
	* Customizer Sidebar Sanitize
	**/

	function ta_mag_sanitize_sidebar( $input ) {

	    $valid_keys = array('right-sidebar','left-sidebar','no-sidebar');

	    if ( in_array( $input, $valid_keys ) ) {

	        return $input;

	    } else {

	        return '';

	    }

	}

endif;

if( !function_exists('ta_mag_sanitize_archive_layout') ):

	/**
	* Customizer Archive Layout Sanitize
	**/

	function ta_mag_sanitize_archive_layout( $input ) {

	    $valid_keys = array('grid','simple','masonry');

	    if ( in_array( $input, $valid_keys ) ) {

	        return $input;

	    } else {

	        return '';

	    }

	}

endif;

if( !function_exists('ta_mag_sanitize_category') ):

	/**
	* Customizer Category Sanitize
	**/

	function ta_mag_sanitize_category($input){

	    $ta_mag_Category_list = ta_mag_category_list();

	    if(array_key_exists($input,$ta_mag_Category_list)){
	        return $input;
	    }
	    else{
	        return '';
	    }
	}

endif;