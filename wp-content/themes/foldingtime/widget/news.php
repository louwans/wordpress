<?php 

class news_index extends WP_Widget {

	function news_index()
	{
		$widget_ops = array('classname'=>'news_index','description' => '调用一个图文模块，可选悬浮');
		$control_ops = array('width' => 200, 'height' => 300);
		parent::WP_Widget($id_base="news_index",$name='图文模块【可悬浮】',$widget_ops,$control_ops);  

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



<p>
<label  for="<?php echo $this->get_field_id('w_cat'); ?>">选择分类1:</label><br />
             <select id="<?php echo $this->get_field_id('w_cat'); ?>" name="<?php echo $this->get_field_name('w_cat'); ?>" >
              <option value=''>不显示</option>
<?php 
		 $categorys = get_categories();
		$sigk_cat2= $w_cat;
		foreach( $categorys AS $category ) { 
		 $category_id= $category->term_id;
		 $category_name=$category->cat_name;
		?>
       
			<option 
				value='<?php echo  $category_id; ?>'
				<?php
					if ( $sigk_cat2 == $category_id ) {
						echo "selected='selected'";
					}
				?>><?php echo  $category_name; ?></option>
		<?php } ?>
	</select>

</p>


<p><label for="<?php echo $this->get_field_id('nnmber2'); ?>"><?php esc_attr_e('显示数量(默认4):'); ?> <input class="widefat" id="<?php echo $this->get_field_id('nnmber2'); ?>" name="<?php echo $this->get_field_name('nnmber2'); ?>" type="text" value="<?php echo $nnmber2; ?>" /></label></p>



<p>
  <label  for="<?php echo $this->get_field_id('showway'); ?>">显示模式:</label><br />
 
 
 <select name="<?php echo $this->get_field_name('showway'); ?>" id="<?php echo $this->get_field_id('showway'); ?>" >
              <option value=''>默认上下图文</option>
               <option <?php if($showway==1){echo "selected='selected'"; } ; ?> value='1'>左图右文</option>
</select>
 <em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">你可以选择这个模块的文章显示模式，这种一个模块显示多种样式的方式在<a target="_blank" href="http://www.themepark.com.cn/">WEB主题公园</a>开发的主题被称为“魔术模块”，是一种很方便并很容易学会控制的方法，在<a target="_blank" href="http://www.themepark.com.cn/">WEB主题公园</a>开发的主题中很常见</em>
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
 <em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">上方的html代码框可以输入你的广告代码、视频代码、以及你自己编辑的html</em>
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
	 $showway= apply_filters('widget_title', empty($instance['showway']) ? __('') : $instance['showway']);
	 $args = array( 'cat' => $w_cat , 'showposts' => $nnmber2 );     $query = new WP_Query( $args );  
	 	if($my_b_images){
			
			$my_b_imagess='background: center url('.$my_b_images.');';
			$modle_style='style="'.$my_hights.$my_b_imagess.'"';
			
			}

 ?> 


<?php if($w_cat){ ?>
<div class="<?php if($my_b_images){echo 'fixed_mok';} ?>">
<div  class="news_tuoch widget " <?php if($showway){echo 'id="two_show"';} ?>>
             
             
             
            
             <h2>
              <?php if($title){ ?> <a href="<?php echo get_category_link($w_cat); ?>"> <?php echo $title; ?></a><?php } ?>
             </h2> 
             
             <ul>
             
                <?php  while ( $query->have_posts() ) :$query->the_post();  
					 $tit= get_the_title();
		             $id =get_the_ID(); 
	                 
					 $linkss=get_post_meta($id,"hoturl", true); 
		             if($linkss !=""){ $links1=  $linkss;}else{$links1=  get_permalink();}; 
					
					  ?>     
                <li>
                <a class="news_pics" href="<?php echo $links1 ; ?>" target="_blank"><?php themepark_thumbnails('case'); ?></a>
               <div class="news_textss">
               <a href="<?php echo $links1 ; ?>" target="_blank" title="<?php echo $tit;?>" ><?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,30,"...",'utf-8'); ?></a>
                <em><?php echo get_the_time('Y/m/d') ; ?></em>
                <?php if($showway){echo '<p>'.mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,50,"...",'utf-8').'</p>';} ?>
                </div>
                </li>
                
                
               <?php endwhile; ?>
             
             </ul>
             
             
             
             
             
           
             
             
             
 </div>
 
 <?php } if($my_text2){ ?>  <div class="widget"><div class="code_s"><?php echo html_entity_decode($my_text2); ?></div></div><?php } ?>
 </div>
        <?php
	}
}
register_widget('news_index');
?>