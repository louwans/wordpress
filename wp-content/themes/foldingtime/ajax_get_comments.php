<?php
if ('comment_list.php' == basename($_SERVER['SCRIPT_FILENAME']) && !isset($_POST['post_id'])) {
    header("content-type:text/html; charset=utf-8");
    echo '您好！请不要直接访问这个页面！';
    exit();
}
require('../wp-blog-header.php');
header("Content-type: text/html;charset=UTF-8");
header('HTTP/1.1 200 OK');
$comments = get_comments(array(
	'post_id' => $_POST['post_id'],
	'status' => 'approve'
));
echo '<ol class="commentlist">';
wp_list_comments('type=comment&reverse_top_level=true&page=0&callback=mytheme_comment&end-callback=mytheme_end_comment',$comments);
echo '</ol>';
?>