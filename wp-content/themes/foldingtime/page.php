<?php get_header();?>
<div class="content">

   
  
  <div class="main_loop">
  
  <ul class="main_loop_ul">
  
  
  <?php

while (have_posts()) : the_post();
$category = get_the_category($post->ID);
 ?>
<li class="mian_li">
<div class="ajax_content">

<a class="main_title" target="_blank"href="<?php the_permalink() ?>"> <?php the_title(); ?></a>

<div class="main_others">
<a class="main_cat" href="<?php echo get_category_link($category[0]->term_id ) ?>" class="main_cat"><?php echo $category[0]->name;  ?> /  <?php echo $category[0]->slug;  ?></a>

<a class="main_actor" target="_blank" href="<?php echo get_author_posts_url(get_the_author_ID()); ?>"> <?php the_author_nickname(); ?></a> 写在<?php echo get_the_time('Y年m月d日') ; ?></div>
<div class="main_fenge"></div>
<div class="main_enter"><?php the_content() ?></div>




<div class="moretag">

<span class="main_tag"><?php $posttags = get_the_tags(); if ($posttags) {echo 'TAG：'; foreach($posttags as $tag) { echo '<a title="查看所有' .$tag->name .'" target="_blank" id="tagss" href="'.get_bloginfo('url').'?tag='.$tag->slug.'">' .$tag->name .'</a>';}}?></span>
</div>
 </div>

</li>




<?php endwhile; wp_reset_query(); ?>     
  
  <?php  include_once("relevant_full_01.php"); ?>
  
  </ul>
 <?php if ( comments_open() ){ comments_template();} ?>
  </div>
  
  
  <div class="sidbar"><?php dynamic_sidebar('sidebar-widgets4');?></div>
  
  
  
</div>
<?php  get_footer(); ?>
