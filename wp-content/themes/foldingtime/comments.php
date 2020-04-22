<?php       $word_t17=get_option('mytheme_word_t17');
			$word_t18=get_option('mytheme_word_t18');
			$word_t19=get_option('mytheme_word_t19');
			$word_t20=get_option('mytheme_word_t20');
			$word_t21=get_option('mytheme_word_t21');
			$word_t22=get_option('mytheme_word_t22');
			$shop_login = get_option('shop_login');
 $shop_register = get_option('shop_register');	
     $shop_qqlogin_open = get_option('shop_qqlogin_open');
		     	$shop_profile = get_option('shop_profile');
					$shop_login = get_option('shop_login');
					 $shop_profile_url=get_page_link( $shop_profile );

  
			?>

	

	
<?php  $current_user = wp_get_current_user();
       $user_id =$current_user->ID;
	   $id=get_the_ID(); 
	   $bbs_post_avatar=get_option('mytheme_bbs_post_avatar');
	  $author_name= get_usermeta($user_id,'nickname');

 if( get_usermeta($user_id,'user_avatar')){ $avatar_bbs_avatar ='<img width="50"  height="50"src="'. get_usermeta($user_id ,'user_avatar').'" alt="'.$author_name.'"/>';}else{$avatar_bbs_avatar ='<img width="70"  height="70" src="'.$bbs_post_avatar.'" alt="'.$author_name.'"/>';}  
 
 
 if (is_user_logged_in()) { $post_url_go= get_option('siteurl').'/wp-comments-post.php';
 
  }else{
	  if(!get_option('comment_registration')){  $post_url_go= get_option('siteurl').'/wp-comments-post.php';}else{ $ajax_no_login='<div class="ajax_no_login">请登录后发表评论</div>';}
	  
	   $hellos='您好！<a target="_blank" href="'.get_page_link( $shop_login ).'">请登录</a>';}

 
?>
	<div class="ajax_comment_from" id="comments">
    <div class="ajax_title"><p> <?php echo $hellos; ; ?></p> 
  
        
        </div>
    <a style="display:none" id="url_ajax" href="<?php echo get_permalink($id) ?>"></a>
    <div id="commentform_out">
    
    <form action="<?php echo $post_url_go; ?>" method="post" id="commentform" >
      <div class="caser_reply">点击取消回复</div>
      
    
        <div class="ajax_commont">
                <div class="smiley_kuang">
                <span> <a class="smiley_close_btn"></a></span>
                <div class="smiley_kuang_in"><?php include(dirname(__FILE__) . '/smiley.php'); ?></div>
                </div>
           <div class="tutle">
           <a class="avatar_comment"><?php echo  $avatar_bbs_avatar; ?></a>
         
           </div>
           <div id="ajax_commont_tex">
           
             <?php echo  $ajax_no_login;  if (is_user_logged_in()) {  ?>
				<input  type="hidden" name="author" id="author" value="<?php echo get_usermeta($user_id,'nickname'); ?>" size="28" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
				<input type="hidden" name="email" id="email" value="<?php echo $current_user->user_email; ?>" size="28" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
		<?php }else{ if(!get_option('comment_registration')){ ?>
        
            <label for="author">游客名称： <input  type="text" name="author" id="author" value="" size="28" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> /></label>
			<label for="email">电子邮箱：	<input type="text" name="email" id="email" value="" size="28" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />  </label>     
        
        <?php } };
		
		 if (function_exists( 'themepark_comment_post_form' ) ) {	 themepark_comment_post_form();}
		
		?>
          
           
           <textarea name="comment"  id="comment_ajax" cols="58" rows="4" tabindex="4"></textarea>
          
             <div class="bottom_ajax">
              <a class="smiley_btn" title="添加表情"></a><a class="img_c_btn" title="插入图片"></a>
            
              <input name="submit" type="submit" id="submit_ajax" tabindex="5" value="发表评论" />
                
              <div class="ajax_loading"></div>
              </div> 	
           </div>
       
		</div>

			<?php comment_id_fields(); ?>
		<?php cancel_comment_reply_link(); ?>
		
		<?php do_action('comment_form', $post->ID); ?>

	</form>
</div>
	
 
  <?php 
  $id = get_the_ID();
$themepark_comment_box_show =get_post_meta($id, 'themepark_comment_box_show', true);
  if($themepark_comment_box_show!='noshow'){ ?>
   <p class="nunbers_ajax">已有<?php echo get_comments_number(get_the_ID()); ?>评论 </p>
   <div id="commentlist"><ul class="commentlist"><?php wp_list_comments('type=comment&callback=shoppingbox_comment');	 ?></ul></div>
   <div id="previous_ajax"><div class="previous_ajax"><?php paginate_comments_links( array(show_all => true,prev_next =>false )); ?></div></div><?php } ?>

   
</div>
