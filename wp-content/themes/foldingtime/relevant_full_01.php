


   <div id="relevat">
   <div class="relevat_title"><?php $word_t44=get_option('mytheme_word_t44'); if($word_t44!=""){echo $word_t44;}else{echo '相关推荐';}  ?></div>
         <ul>
<?php

$post_num =6;
$exclude_id = $post->ID;
$posttags = get_the_tags(); $i = 0;
if ( $posttags ) {
	$tags = ''; foreach ( $posttags as $tag ) $tags .= $tag->term_id . ',';
	$args = array(
		'post_status' => 'publish',
		'tag__in' => explode(',', $tags),
		'post__not_in' => explode(',', $exclude_id),
		'caller_get_posts' => 1,
		'orderby' => 'rand',
		'posts_per_page' => $post_num,
	);
	query_posts($args);
	while( have_posts() ) { the_post(); 
	
	
	?>
    	  <?php 
		   $tit= get_the_title();
		    $id =get_the_ID();
		   $linkss=get_post_meta($id,"hoturl", true); 
		    if($linkss !=""){ $links1=  $linkss;}else{$links1=  get_permalink();};
		    
			
		 ?>
              <?php 
		   $tit= get_the_title();
		    $id =get_the_ID(); 
		   $linkss=get_post_meta($id,"hoturl", true); 
		    if($linkss !=""){ $links1=  $linkss;}else{$links1=  get_permalink();};
		    $target =get_post_meta($id,"hots_tlye", true);
			 $word_t1=get_option('mytheme_word_t1');
			   $price = get_post_meta($id, 'shop_price', true);
          	$original_price=get_post_meta($id,"original_price", true);
		 ?>
          
          
       <?php 
		   $id=get_the_ID(); 
  $tit= get_the_title($id);
  $linkss=get_post_meta($id,"hoturl", true); 
    $price = get_post_meta($id, 'shop_price', true);
    $original_price=get_post_meta($id,"original_price", true);
		 ?>
          
    <li>
             <a  <?php echo $tagerts ?> title="<?php the_title(); ?>" href="<?php if($linkss !=""){echo $linkss;}else{echo get_permalink();}; ?>" class="news_pics">
             
            <?php  themepark_thumbnails('case' ); ?>
          
          </a>
          <div class="news_textss">
           <a  <?php echo $tagerts ?> title="<?php the_title(); ?>" href="<?php if($linkss !=""){echo $linkss;}else{echo get_permalink();}; ?>" ><?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,30,"...",'utf8'); ?></a>
            
           
             <p> <?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,40,"...",'utf-8'); ?></p>
         </div>
            
             </li>

  
             
           
	<?php
		$exclude_id .= ',' . $post->ID; $i ++;
	} wp_reset_query();
}
if ( $i < $post_num ) {
	$cats = ''; foreach ( get_the_category() as $cat ) $cats .= $cat->cat_ID . ',';
	$args = array(
		'category__in' => explode(',', $cats),
		'post__not_in' => explode(',', $exclude_id),
		'caller_get_posts' => 1,
		'orderby' => 'rand',
		'posts_per_page' => $post_num - $i
	);
	query_posts($args);
	while( have_posts() ) { the_post(); 
	
		$id =get_the_ID(); 
	$author_id=get_the_author_meta( 'ID' );
	$bbs_post_avatar=get_option('bbs_post_avatar');
	
	?>
		    <?php 
		   $tit= get_the_title();
		    $id =get_the_ID();
		   $linkss=get_post_meta($id,"hoturl", true); 
		    if($linkss !=""){ $links1=  $linkss;}else{$links1=  get_permalink();};
		    $target =get_post_meta($id,"hots_tlye", true);
			
		 ?>
       <?php 
		   $id=get_the_ID(); 
  $tit= get_the_title($id);
  $linkss=get_post_meta($id,"hoturl", true); 
    $price = get_post_meta($id, 'shop_price', true);
    $original_price=get_post_meta($id,"original_price", true);
		 ?>
          
    <li>
             <a  <?php echo $tagerts ?> title="<?php the_title(); ?>" href="<?php if($linkss !=""){echo $linkss;}else{echo get_permalink();}; ?>" class="news_pics">
             
            <?php  themepark_thumbnails('case' ); ?>
          
          </a>
          <div class="news_textss">
             <a  <?php echo $tagerts ?> title="<?php the_title(); ?>" href="<?php if($linkss !=""){echo $linkss;}else{echo get_permalink();}; ?>" ><?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,30,"...",'utf8'); ?></a>
            
           
             <p> <?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,40,"...",'utf-8'); ?></p>
         </div>
            
             </li>

           
	<?php $i++;
	} wp_reset_query();
}
if ( $i  == 0 )  echo '';
?>
</ul>
</div>
