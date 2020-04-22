<?php
ob_start();
include_once("load.php");
include_once("widget.php"); 
include_once("xuanxiang.php");
include_once("functions/seo.php");
include_once("gallery.php");
include_once("ajax_comments_fun.php");
include_once("customize_box2.php");
function custom_excerpt_length( $length ) {
	return 500;    
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );




      require 'theme-updates/theme-update-checker.php';
	    $example_update_checker = new ThemeUpdateChecker(	
		  'foldingtime', 
         'http://www.themepark.com.cn/free_themes/2016/foldingtime.json'  
);

function shoppingbox_theme_support() {
return "您的主题已经支持购物盒子插件，您可以直接使用";
}

function ajax_next($query_string){   
global $posts_per_page, $paged;   
$my_query = new WP_Query($query_string ."&posts_per_page=-1");   
$total_posts = $my_query->post_count;   
if(empty($paged))$paged = 1;   
 
$next = $paged + 1;   

echo '<a href="'.get_option('home').'?paged='.$next.'"></a>';
}

function remove_open_sans() {
wp_deregister_style( 'open-sans' );
wp_register_style( 'open-sans', false );
wp_enqueue_style('open-sans','');
}
add_action( 'init', 'remove_open_sans' );
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'start_post_rel_link',10, 0 );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link');
remove_action( 'wp_head', 'rel_canonical' ); 
remove_action ( 'pre_post_update', 'wp_save_post_revision' );
//移除版本号
function themepark_remove_cssjs_ver( $src ) {
	if( strpos( $src, 'ver='. get_bloginfo( 'version' ) ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}
add_filter( 'style_loader_src', 'themepark_remove_cssjs_ver', 999 );
add_filter( 'script_loader_src', 'themepark_remove_cssjs_ver', 999 );


/*特色图片*/

register_nav_menus(
array(
'header-menu' => __( '菜单导航' ),
'footer-menu' => __( '底部菜单' ),
'link-menu2' => __( '友情链接' ),
)
);

/*特色图片*/


function get_category_root_id($cat)
{
$this_category = get_category($cat);   // 取得当前分类
while($this_category->category_parent) // 若当前分类有上级分类时，循环
{
$this_category = get_category($this_category->category_parent); // 将当前分类设为上级分类（往上爬）
}
return $this_category->term_id; // 返回根分类的id号
}



//面包屑
function get_breadcrumbs()
{
global $wp_query;
if(get_option('mytheme_word_t7')==""){$word_t7='首页';}else{ $word_t7=get_option('mytheme_word_t7');};
if(get_option('mytheme_word_t8')==""){$word_t12='标签筛选';}else{ $word_t12=get_option('mytheme_word_t12');};
if(get_option('mytheme_word_t9')==""){$word_t9='搜索结果';}else{ $word_t9=get_option('mytheme_word_t9');};
if(get_option('mytheme_word_t10')==""){$word_t10='很遗憾，没有找到你要的信息';}else{ $word_t10=get_option('mytheme_word_t10');};
if ( !is_home() ){
// Start the UL

// Add the Home link
echo '<a href="'. get_settings('home') .'">'. $word_t7 .'</a>';
if ( is_category() )
{
global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo '<a> ></a>'.(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $currentBefore . '<a> ></a><a>';
      single_cat_title();
      echo '' . $currentAfter."</a>";
}
elseif ( is_archive() && !is_category() )
{
echo "<a> > </a><a>".$word_t12."</a>";
}
elseif ( is_search() ) {
echo "<a> > </a> <a>".$word_t9."</a>";
}
elseif ( is_404() )
{
echo "<a> > </a><a>".$word_t10."</a>";
}
elseif ( is_single() )
{
$category = get_the_category();
$category_id = get_cat_ID( $category[0]->cat_name );
echo '<a> > </a> '. get_category_parents( $category_id, TRUE, " <a> > </a> " );
echo " <a> ".the_title('','', FALSE)."</a>";
}
elseif ( is_page() )
{
$post = $wp_query->get_queried_object();
if ( $post->post_parent == 0 ){
echo " <a> > </a><a> ".the_title('','', FALSE)."</a>";
} else {
$title = the_title('','', FALSE);
$ancestors = array_reverse( get_post_ancestors( $post->ID ) );
array_push($ancestors, $post->ID);
foreach ( $ancestors as $ancestor ){
if( $ancestor != end($ancestors) ){
echo ' <a> > </a> <a href="'. get_permalink($ancestor) .'">'. strip_tags( apply_filters( 'single_post_title', get_the_title( $ancestor ) ) ) .'</a>';
} else {
echo '<a> > </a> <a>'. strip_tags( apply_filters( 'single_post_title', get_the_title( $ancestor ) ) ) .'</a>';
}
}
}
}
// End the UL

}
}


function get_post_thumbnail_url($post_id){
        $post_id = ( null === $post_id ) ? get_the_ID() : $post_id;
        $thumbnail_id = get_post_thumbnail_id($post->ID);
        if($thumbnail_id ){
                $thumb = wp_get_attachment_image_src($thumbnail_id, 'news-vedio-thumb');
                return $thumb[0];
        }else{
                return false;
        }
}
//增强编辑器开始
add_editor_style('/css/editor-style.css');  
function add_editor_buttons($buttons) {

$buttons[] = 'fontselect';

$buttons[] = 'fontsizeselect';

$buttons[] = 'cleanup';

$buttons[] = 'styleselect';

$buttons[] = 'hr';

$buttons[] = 'del';

$buttons[] = 'sub';

$buttons[] = 'sup';

$buttons[] = 'copy';

$buttons[] = 'paste';

$buttons[] = 'cut';

$buttons[] = 'undo';

$buttons[] = 'image';

$buttons[] = 'anchor';

$buttons[] = 'backcolor';

$buttons[] = 'wp_page';

$buttons[] = 'charmap';

return $buttons;

}

add_filter("mce_buttons_3", "add_editor_buttons");

function get_attachment_id_from_src ($link) {
    global $wpdb;
    $link = preg_replace('/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $link);
    return $wpdb->get_var("SELECT ID FROM {$wpdb->posts} WHERE guid='$link'");
};
  
function set_post_views() {   
  
    global $post;   
  
    $post_id = $post -> ID;   
    $count_key = 'views';   
    $count = get_post_meta($post_id, $count_key, true);   
  
    if (is_single() || is_page()) {   
  
        if ($count == '') {   
            delete_post_meta($post_id, $count_key);   
            add_post_meta($post_id, $count_key, '0');   
        } else {   
            update_post_meta($post_id, $count_key, $count + 1);   
        }   
  
    }   
  
}   
	add_action('get_header', 'set_post_views');  

function shoppingbox_theme_cart() {  
 $shop_pay_opens = get_option('shop_pay_opens');
  if(is_user_logged_in()&&!$shop_pay_opens){
  $shop_profile = get_option('shop_profile');
  $shop_profile_url=get_page_link( $shop_profile );
  $post_url_true=strstr($shop_profile_url,'?');
  if($post_url_true!=''){$cart_url='&cart=ture';}else{$cart_url='?cart=ture';}
 $cart_go=$shop_profile_url.$cart_url;
  global $wpdb;
  global $current_user;    get_currentuserinfo();
  $user_ID = $current_user->id ;
   $total_trade   = $wpdb->get_var("SELECT COUNT(alipay_id)     FROM $wpdb->alipay WHERE  alipay_user='".$user_ID."' and alipay_status='购物车'");
   
   if($total_trade>10){ echo  '<div class="cart_nuber">...</div>';}else{
  echo '<div class="cart_nuber">'.$total_trade.'</div>';}

  }
}


add_action( 'personal_options_update', 'save_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_user_profile_fields' );
 
function save_user_profile_fields( $user_id ) {
 
	if ( !current_user_can( 'edit_user', $user_id ) ) { return false; }
	update_usermeta( $user_id, 'user_avatar', $_POST['user_avatar'] );
}
add_action( 'show_user_profile', 'extra_user_profile_fields' );
add_action( 'edit_user_profile', 'extra_user_profile_fields' );
 
function extra_user_profile_fields( $user ) { ?>

 
<table class="form-table">
	
    <tr>
		<th><label for="Phone">头像</label></th>
		<td>
			<input type="text" name="user_avatar" id="user_avatar" value="<?php echo esc_attr( get_the_author_meta( 'user_avatar', $user->ID ) ); ?>" class="regular-text" />
             <input class='upload_button button' type="button" name="upload_button" value="上传" id="upbottom"/>   
            <br />
			<span class="description">用户头像100X100</span>
		</td>
	</tr>
    
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/upload.js"></script>  
<script src="<?php bloginfo('template_url'); ?>/js/jquery-1.11.0.js"></script> 
    

    
   
	
</table>

<?php }
function disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );    
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );  
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );

function disable_emojis_tinymce( $plugins ) {
	return array_diff( $plugins, array( 'wpemoji' ) );
}
add_filter('smilies_src','custom_smilies_src',1,10);
function custom_smilies_src ($img_src, $img, $siteurl){
    return get_bloginfo('template_directory').'/smilies/'.$img;
}
function smilies_reset() {
global $wpsmiliestrans, $wp_smiliessearch;

// don't bother setting up smilies if they are disabled
if ( !get_option( 'use_smilies' ) )
    return;

    $wpsmiliestrans = array(
    ':mrgreen:' => 'icon_mrgreen.gif',
    ':neutral:' => 'icon_neutral.gif',
    ':twisted:' => 'icon_twisted.gif',
      ':arrow:' => 'icon_arrow.gif',
      ':shock:' => 'icon_eek.gif',
      ':smile:' => 'icon_smile.gif',
        ':???:' => 'icon_confused.gif',
       ':cool:' => 'icon_cool.gif',
       ':evil:' => 'icon_evil.gif',
       ':grin:' => 'icon_biggrin.gif',
       ':idea:' => 'icon_idea.gif',
       ':oops:' => 'icon_redface.gif',
       ':razz:' => 'icon_razz.gif',
       ':roll:' => 'icon_rolleyes.gif',
       ':wink:' => 'icon_wink.gif',
        ':cry:' => 'icon_cry.gif',
        ':eek:' => 'icon_surprised.gif',
        ':lol:' => 'icon_lol.gif',
        ':mad:' => 'icon_mad.gif',
        ':sad:' => 'icon_sad.gif',
          '8-)' => 'icon_cool.gif',
          '8-O' => 'icon_eek.gif',
          ':-(' => 'icon_sad.gif',
          ':-)' => 'icon_smile.gif',
          ':-?' => 'icon_confused.gif',
          ':-D' => 'icon_biggrin.gif',
          ':-P' => 'icon_razz.gif',
          ':-o' => 'icon_surprised.gif',
          ':-x' => 'icon_mad.gif',
          ':-|' => 'icon_neutral.gif',
          ';-)' => 'icon_wink.gif',
    // This one transformation breaks regular text with frequency.
    //     '8)' => 'icon_cool.gif',
           '8O' => 'icon_eek.gif',
           ':(' => 'icon_sad.gif',
           ':)' => 'icon_smile.gif',
           ':?' => 'icon_confused.gif',
           ':D' => 'icon_biggrin.gif',
           ':P' => 'icon_razz.gif',
           ':o' => 'icon_surprised.gif',
           ':x' => 'icon_mad.gif',
           ':|' => 'icon_neutral.gif',
           ';)' => 'icon_wink.gif',
          ':!:' => 'icon_exclaim.gif',
          ':?:' => 'icon_question.gif',
    );
}
smilies_reset();

function add_smiles_t(){
global $wpsmiliestrans;
$wpsmilies = array_unique($wpsmiliestrans);
foreach($wpsmilies as $alt => $src_path){
$output .= '<a class="add-smily" data-smilies="'.$alt.'"><img class="wp-smiley" src="'.get_bloginfo('template_directory').'/smilies/'.rtrim($src_path, "gif").'gif" /></a>';
}
return $output;
}
add_action('media_buttons_context', 'add_smiles_btn');
function add_smiles_btn($context) {
$context .= '<style>.smilies-wrap{background:#fff;border: 1px solid #ccc;box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.24);padding: 10px;position: absolute;top: 60px;width: 380px;display:none}.smilies-wrap img{height:24px;width:24px;cursor:pointer;margin-bottom:5px} .is-active.smilies-wrap{display:block}</style><a id="insert-media-button" style="position:relative" class="button insert-smilies add_smilies" title="添加表情" data-editor="content" href="javascript:;">
添加表情
</a><div class="smilies-wrap" style=" max-width:90%;">'. add_smiles_t() .'</div><script>jQuery(document).ready(function(){jQuery(document).on("click", ".insert-smilies",function() { if(jQuery(".smilies-wrap").hasClass("is-active")){jQuery(".smilies-wrap").removeClass("is-active");}else{jQuery(".smilies-wrap").addClass("is-active");}});jQuery(document).on("click", ".add-smily",function() { send_to_editor(" " + jQuery(this).data("smilies") + " ");jQuery(".smilies-wrap").removeClass("is-active");return false;});});</script>';
return $context;
}

function themepark_add_thumbnails() {
          global $post;
          $already_has_thumb = has_post_thumbnail($post->ID);
              if (!$already_has_thumb)  {
              $attached_image = get_children( "post_parent=$post->ID&post_type=attachment&post_mime_type=image&numberposts=1" );
                          if ($attached_image) {
                                foreach ($attached_image as $attachment_id => $attachment) {
                                set_post_thumbnail($post->ID, $attachment_id);
                                }
                           }
                        }
      }  
add_action('the_post', 'themepark_add_thumbnails');
add_action('save_post', 'themepark_add_thumbnails');

function my_login_redirect($redirect_to, $request){
if( empty( $redirect_to ) || $redirect_to == 'wp-admin/' || $redirect_to == admin_url() )
return home_url('');
else
return $redirect_to;
}
add_filter('login_redirect', 'my_login_redirect', 10, 3);
?>