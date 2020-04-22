<?php

if ( function_exists( 'add_theme_support' ) ) {add_theme_support( 'post-thumbnails' );}
if ( function_exists( 'add_image_size' ) ) {
   
	
	add_image_size( 'case', 307, 204,true );
	add_image_size( 'news', 400, 266,true );
	add_image_size( 'gallery_lightbox', 150, 150,true ); 
    add_image_size( 'main', 841,390,true );
	
	
	
}
 function themepark_thumbnails($thumbnail_size){
	  $id =get_the_ID(); 
	  if(get_option('mytheme_'.$thumbnail_size.'_thumbnails')){$case_thumbnails=get_option('mytheme_'.$thumbnail_size.'_thumbnails');}else{$case_thumbnails= get_bloginfo('template_url').'/thumbnails/'.$thumbnail_size.'.jpg';} 
		 
		  $tit= get_the_title();

		 if (has_post_thumbnail()) { the_post_thumbnail($thumbnail_size ,array('alt'=>$tit, 'title'=> $tit ));}else{
			 echo '<img alt="'.$tit.'" title="'.$tit.'" src="'.$case_thumbnails.'" />';
			 }
	  
	 
	 }


?>