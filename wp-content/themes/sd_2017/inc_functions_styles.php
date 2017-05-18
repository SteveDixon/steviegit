<?php

	function register_stylesheets() {
			
		wp_register_style('normalize', get_stylesheet_directory_uri() . '/stylesheets/vendor/normalize.css');
		wp_register_style('theme-large', get_stylesheet_directory_uri() . '/stylesheets/compiled/large.css');
		wp_register_style('theme-medium', get_stylesheet_directory_uri() . '/stylesheets/compiled/medium.css');
		wp_register_style('theme-small', get_stylesheet_directory_uri() . '/stylesheets/compiled/small.css');
		wp_register_style('font-awesome', get_stylesheet_directory_uri() . '/components/font-awesome/css/font-awesome.min.css');
	
		wp_enqueue_style('normalize');
		wp_enqueue_style('theme-large');
		wp_enqueue_style('theme-medium');
		wp_enqueue_style('theme-small');
		wp_enqueue_style('font-awesome');
	
	} // function register_stylesheets() {
	
	add_action('wp_enqueue_scripts', 'register_stylesheets');

