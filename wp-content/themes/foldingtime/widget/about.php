<?php 

class about_x extends WP_Widget {

	function about_x()
	{
		$widget_ops = array('classname'=>'about_x','description' => '输出一个图+文的模块，你可以编写关于你的信息');
		$control_ops = array('width' => 200, 'height' => 300);
		parent::WP_Widget($id_base="about_x",$name='关于我【可悬浮】',$widget_ops,$control_ops);  

	}

	function form($instance) { 
	
	    	
	
		 $left_right=esc_attr($instance['left_right']);
		 $first_mod = esc_attr($instance['first_mod']);
		 $my_b_images = esc_attr($instance['my_b_images']);
		 $my_b_images_ad = esc_attr($instance['my_b_images_ad']);
      	 $nnmber = esc_attr($instance['nnmber']); 
		  $nnmber2 = esc_attr($instance['nnmber2']); 
	     $w_cat = esc_attr($instance['w_cat']);
		  $my_text2 = esc_attr($instance['my_text2']);
		 $title = esc_attr($instance['title']);
		 $showway= esc_attr($instance['showway']);

	?>
<p style="display:block; width:100%; border-bottom:1px #333333 solid; padding:5px; margin:5px;"><strong>模块属性设置</strong></p>







<p>
 <label  for="<?php echo $this->get_field_id('title'); ?>">文字模块-标题:</label> 
<input type="text" size="40" value="<?php echo $title ; ?>" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>"/>
</p>





<p><label for="<?php echo $this->get_field_id('nnmber2'); ?>"><?php esc_attr_e('上传图片:'); ?> 
<input class="widefat" id="<?php echo $this->get_field_id('nnmber2'); ?>" name="<?php echo $this->get_field_name('nnmber2'); ?>" type="text" value="<?php echo $nnmber2; ?>" />
 <a id="ashu_upload" class="left_right_upload_button button" href="#">上传</a>
</label></p>



<p>
  <label  for="<?php echo $this->get_field_id('showway'); ?>">图片的链接:</label><br />
 
 <input class="widefat" name="<?php echo $this->get_field_name('showway'); ?>" id="<?php echo $this->get_field_id('showway'); ?>"type="text" value="<?php echo $showway; ?>" />
 

</p> 

<p>
  <label  for="<?php echo $this->get_field_id('my_b_images'); ?>">是否悬浮:</label><br />
 
 
 <select name="<?php echo $this->get_field_name('my_b_images'); ?>" id="<?php echo $this->get_field_id('my_b_images'); ?>" >
              <option value=''>不悬浮</option>
               <option <?php if($my_b_images==1){echo "selected='selected'"; } ; ?> value='1'>悬浮</option>
</select>
 <em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">当滚动到底部自动悬浮，注意，只能放一个悬浮模块，否则会被遮住</em>
</p> 
<p>
 <label  for="<?php echo $this->get_field_id('my_text2'); ?>">html代码</label>

 
 <textarea style="width:96%" name="<?php echo $this->get_field_name('my_text2'); ?>" id="<?php echo $this->get_field_id('my_text2'); ?>"cols="52" rows="4" ><?php echo stripslashes($my_text2); ?></textarea>    
 <em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">上方的html代码框可以输入你的广告代码、视频代码、以及你自己编辑的html，也可以直接输入文字</em>
 </p>

	<?php
    }
	function update($new_instance, $old_instance) { // 更新保存
		return $new_instance;
	}
	function widget($args, $instance) { // 输出显示在页面上
	extract( $args );
	     $id =$instance['id'];
        $before_content = $instance['before_content'];
        $after_content = $instance['after_content'];
		$left_right = apply_filters('widget_title', empty($instance['left_right']) ? __('') : $instance['left_right']);
		$first_mod = apply_filters('widget_title', empty($instance['first_mod']) ? __('') : $instance['first_mod']);
		$my_b_images  = apply_filters('widget_title', empty($instance['my_b_images']) ? __('') : $instance['my_b_images']);
        $my_b_images_ad  = apply_filters('widget_title', empty($instance['my_b_images_ad']) ? __('') : $instance['my_b_images_ad']);
	    $w_cat = apply_filters('widget_title', empty($instance['w_cat']) ? __('') : $instance['w_cat']);
	    $nnmber2 = apply_filters('widget_title', empty($instance['nnmber2']) ? __('4') : $instance['nnmber2']);
	   $my_text2  = apply_filters('widget_title', empty($instance['my_text2']) ? __('') : $instance['my_text2']);
		$title  = apply_filters('widget_title', empty($instance['title']) ? __('') : $instance['title']);
	 $showway= apply_filters('widget_title', empty($instance['showway']) ? __('#') : $instance['showway']);
	 $args = array( 'cat' => $w_cat , 'showposts' => $nnmber2 );     $query = new WP_Query( $args );  
	 	if($my_b_images){
			
			$my_b_imagess='background: center url('.$my_b_images.');';
			$modle_style='style="'.$my_hights.$my_b_imagess.'"';
			
			}

 ?> 



<div class="<?php if($my_b_images){echo 'fixed_mok';} ?>">

 
 <div class="widget">
   
    <?php if($title){ ?> <h2><a href="<?php echo get_category_link($w_cat); ?>"> <?php echo $title; ?></a>  </h2> <?php } ?>
 <a class="about_pic" href="<?php echo $showway; ?>" target="_blank"><img src="<?php echo $nnmber2; ?>"  alt="<?php echo $title; ?>"/></a>
 
 <div class="code_s about_p"><?php echo html_entity_decode($my_text2); ?></div>
 
 </div>
 
 
 
 </div>
        <?php
	}
}
register_widget('about_x');
?>