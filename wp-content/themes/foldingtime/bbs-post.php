<?php  
/* 
Template Name:接收首页发布信息模板
*/ 

if(is_user_logged_in())

{   
 $current_user = wp_get_current_user();

if( isset($_POST['tougao_form'])) {
  
  global $wpdb;
    $current_url= get_option('home')."/bbs-posts";
    $name = isset( $_POST['tougao_authorname'] ) ? trim(htmlspecialchars($_POST['tougao_authorname'], ENT_QUOTES)) : '';
    $email =  isset( $_POST['tougao_authoremail'] ) ? trim(htmlspecialchars($_POST['tougao_authoremail'], ENT_QUOTES)) : '';
    $blog =  isset( $_POST['tougao_authorblog'] ) ? trim(htmlspecialchars($_POST['tougao_authorblog'], ENT_QUOTES)) : '';
    $title =  isset( $_POST['tougao_title'] ) ? trim(htmlspecialchars($_POST['tougao_title'], ENT_QUOTES)) : '';
    $category =  isset( $_POST['cat'] ) ? (int)$_POST['cat'] : 0;
    $content =  isset( $_POST['tougao_content'] ) ? $_POST['tougao_content'] : '';
	

    if ( empty($title) || mb_strlen($title) > 100 ) {
	  wp_die('标题必须填写，且长度不得超过100字！</p><a href="'.$current_url.'">点此返回</a>');

    }

    

    $post_content = wpautop(trim($content));
	
		$user_bbs_post_ok_s='发布成功！';
    $tougao = array(
        'post_title' => $title,
        'post_content' => $post_content, 
		'post_status' => 'publish',
        'post_category' => array($category),
    );

    $status = wp_insert_post( $tougao );
    if ($status != 0) {
		 wp_die($user_bbs_post_ok_s.'<a href="'.get_option('home').'">点此返回</a>');
    }
    else {
		  wp_die( '发帖失败！</p><a href="'.$current_url.'">点此返回</a>');
    }
}

?>

<li class="mians_li" >
<div id="post_admin">
<a class="main_title">快速发布 <em>点击打开</em></a>

  <div class="enter nopading">    
  <form class="bbs_post_form" method="post" action="<?php echo get_page_link(get_option('mytheme_from_page')); ?>">
        <input type="hidden" size="40" value="<?php if ( 0 != $current_user->ID ){ echo $current_user->user_login;} ?>" id="tougao_authorname" name="tougao_authorname" />
        <input type="hidden" size="40" value="<?php if ( 0 != $current_user->ID ){ echo $current_user->user_email; }?>" id="tougao_authoremail" name="tougao_authoremail" />
        <input  type="hidden" size="40" value="<?php if ( 0 != $current_user->ID ) {echo $current_user->user_url;} ?>" id="tougao_authorblog" name="tougao_authorblog" />

    <div class="cat">

        <label for="tougao_title">标题:</label>

        <input type="text" size="40" value="" id="tougao_title" name="tougao_title" />

    </div>

 

    <div class="cat">

        <label for="tougaocategorg">分类:*</label>

        <?php wp_dropdown_categories('hide_empty=0&id=tougaocategorg&show_count=0&hierarchical=1'); ?>

    </div>

                   

    <div class="editor">

          <?php echo wp_editor($content, "tougao_content",array('teeny' => true ));?>

    </div>


    <div class="tijiao">

        <input type="hidden" value="send" name="tougao_form" />

        <input class="submit" type="submit" value="提交" />

     

    </div>

</form>
</div>
 </li> 

<?php  wp_reset_query(); }; ?>