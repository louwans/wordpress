<?php 


if (!function_exists('wpe_gallery_shortcode')) {

function wpe_gallery_shortcode($attr) {
		$post = get_post();

	static $instance = 0;
	$instance++;

	if ( ! empty( $attr['ids'] ) ) {
		// 'ids' is explicitly ordered, unless you specify otherwise.
		if ( empty( $attr['orderby'] ) )
			$attr['orderby'] = 'post__in';
		$attr['include'] = $attr['ids'];
	}

	// Allow plugins/themes to override the default gallery template.
	$output = apply_filters('post_gallery', '', $attr);
	if ( $output != '' )
		return $output;

	// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}

	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post ? $post->ID : 0,
		'itemtag'    => 'li',
		'icontag'    => 'a',
		'captiontag' => 'span',
		'columns'    => 3,
		'size'       => 'page-thumbb',
		'include'    => '',
		'exclude'    => '',
		'link'       => ''
	), $attr, 'gallery'));

	$id = intval($id);
	if ( 'RAND' == $order )
		$orderby = 'none';

	if ( !empty($include) ) {
		$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( !empty($exclude) ) {
		$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	} else {
		$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	}

	if ( empty($attachments) )
		return '';

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment )
			$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
		return $output;
	}

	$itemtag = tag_escape($itemtag);
	$captiontag = tag_escape($captiontag);
	$icontag = tag_escape($icontag);
	$valid_tags = wp_kses_allowed_html( 'post' );
	
	$columns = intval($columns);
	$itemwidth = $columns > 0 ? floor(100/$columns) : 100;
	$float = is_rtl() ? 'right' : 'left';
    $postid=get_the_ID();
	$gallery_tlye=get_post_meta($postid,"gallery_tlye", true);
	$selector = "gallery-{$instance}";
    $post_author= get_post($postid)->post_author;
	
	$gallery_style = $gallery_div = '';
	if ( apply_filters( 'use_default_gallery_style', true ) )
		$gallery_style = "";
	$size_class = sanitize_html_class( $size );
	
    $gallery_div = '<div id="gallerys">'; 
	
	
	$output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );
    
	$i = 0;
	foreach ( $attachments as $id => $attachment ) {
	
		
		
		   $image_output = wp_get_attachment_image( $id, 'gallery_lightbox', false );
           $image_meta  = wp_get_attachment_metadata( $id );
		   $image_scr = wp_get_attachment_image_src( $id,"full" , false );
		
		
		
		

		$orientation = '';
		if ( isset( $image_meta['height'], $image_meta['width'] ) )
			$orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';

	
	
		
		$output .= "<a  href='$image_scr[0]' data-med='$image_scr[0]'data-med-size='$image_scr[1]x$image_scr[2]'data-size='$image_scr[1]x$image_scr[2]' data-author='by.".get_the_author_nickname()."' title='$attachment->post_excerpt'>$image_output<figure>$attachment->post_excerpt</figure></a>";
	
	
		
		
		if ( $columns > 0 && ++$i % $columns == 0 )
			$output .= '';
	}
		$output .= '</div>';		
		

	return $output;
}
remove_shortcode('gallery', 'gallery_shortcode');
add_shortcode('gallery', 'wpe_gallery_shortcode');
}
?>