<?php

// Misc PHP functions...


// ------------------------------------------------------------------------	


// trim_text() -> trims text to a certain number of characters	
	
function trim_text($input, $length, $ellipses = true, $strip_html = true) {
    //strip tags, if desired
    if ($strip_html) {
        $input = strip_tags($input);
    }
  
    //no need to trim, already shorter than trim length
    if (strlen($input) <= $length) {
        return $input;
    }
  
    //find last space within length
    $last_space = strrpos(substr($input, 0, $length), ' ');
    $trimmed_text = substr($input, 0, $last_space);
  
    //add ellipses (...)
    if ($ellipses) {
        $trimmed_text .= '...';
    }
  
    return $trimmed_text;
}

// ------------------------------------------------------------------------


// current_page_url() -> gets the current page URL


function current_page_url() {

	$page_url = 'http';

	if (isset($_SERVER['HTTPS'])) {
		
		if ($_SERVER['HTTPS'] == 'on') {
			
			$page_url .= 's';
	
		} // if ($_SERVER['HTTPS'] == 'on') {
		
	} // if (isset($_SERVER['HTTPS'])) {
	
	$page_url .= '://';
	
	if ($_SERVER["SERVER_PORT"] != '80') {
	
		$page_url .= $_SERVER["SERVER_NAME"] . ':' . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
	
	} else {
	
		$page_url .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
	
	} // if ($_SERVER["SERVER_PORT"] != '80') {
	
	return $page_url;

} // function current_page_url() {


// ------------------------------------------------------------------------


// door4_wp_title() -> Filters wp_title to print a neat <title> tag based on what is being viewed

function door4_wp_title( $title, $sep ) {
	if ( is_feed() ) {
		return $title;
	}
	
	global $page, $paged;

	// Add the blog name
	$title .= get_bloginfo( 'name', 'display' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " $sep $site_description";
	}

	// Add a page number if necessary:
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title .= " $sep " . sprintf( __( 'Page %s', '_s' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'door4_wp_title', 10, 2 );


// ------------------------------------------------------------------------


function _remove_script_version( $src ){
	$parts = explode( '?', $src );
	return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );


// ------------------------------------------------------------------------
