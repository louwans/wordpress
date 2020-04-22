<?php

function themepark_init_css() {


if ( !is_admin()) {
	
	
wp_deregister_script('jquery');
wp_register_script( 'jquery', get_template_directory_uri() ."/js/jquery-2.1.1.min.js");
wp_enqueue_script('jquery');




  
wp_deregister_script('script');
wp_register_script( 'script',get_template_directory_uri() ."/js/script.js");
wp_enqueue_script('script');
	
wp_deregister_style('stylesheet');
wp_register_style( 'stylesheet', get_template_directory_uri() .'/style.css');
wp_enqueue_style('stylesheet');

wp_deregister_style('default');
wp_register_style( 'default', get_template_directory_uri() .'/css/default-skin.css');
wp_enqueue_style('default');	   
wp_deregister_script('photoswipe');
wp_register_script( 'photoswipe',get_template_directory_uri() ."/js/photoswipe.min.js");
wp_enqueue_script('photoswipe');  	 

wp_deregister_script('jqueryform');
wp_register_script( 'jqueryform',get_template_directory_uri() ."/js/jquery.form.js");
wp_enqueue_script('jqueryform');  	 
}
	 
	 


	   

	}

add_action('wp_print_styles', 'themepark_init_css');


	?>