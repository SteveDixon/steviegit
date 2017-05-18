<?php

	function register_scripts() {
		
		// De-register what we need to deregister...
		wp_deregister_script('jquery');
		
		
		// Register the scripts
		
		// Header...
		wp_register_script('jquery', get_template_directory_uri() . '/js/vendor/jquery.min.js', false, '2.1.4', false);
	
		// Footer...
		
		wp_register_script('jquery-flexslider', get_template_directory_uri() . '/js/vendor/jquery.flexslider-min.js', array('jquery'), '2.6.3', true);
		wp_register_script('jquery-matchheight', get_template_directory_uri() . '/js/vendor/jquery.matchHeight.js', array('jquery'), false, true);
		wp_register_script('html5shiv', get_template_directory_uri() . '/js/vendor/html5shiv.js', false, '3.7.3', true);
		wp_register_script('respond', get_template_directory_uri() . '/js/vendor/respond.min.js', false, false, true);
		wp_register_script('door4-misc', get_template_directory_uri() . '/js/door4/door4-misc.js', array('jquery'), false, true);
	
		
		// Enqueue the scripts
		
		// Header...
		wp_enqueue_script('jquery');
	
		// Footer...
		wp_enqueue_script('jquery-flexslider');
		wp_enqueue_script('jquery-matchheight');
		wp_enqueue_script('html5shiv');
		wp_enqueue_script('respond');
		wp_enqueue_script('door4-misc');

	} // function register_scripts() {
 
	add_action( 'wp_enqueue_scripts', 'register_scripts' ); 

