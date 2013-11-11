<?php

	add_action('wp_enqueue_scripts', function(){
		wp_enqueue_style('roots_main', get_template_directory_uri() . '/assets/css/main.min.css');
	}, 100);
?>