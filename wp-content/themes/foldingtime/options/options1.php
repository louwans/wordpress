



 
 
               
                <div class="up">
                 
                     
                     <div class="up">
                 
                     
                    <b class="bt">ICO图标上传</b>
                    <input type="text" size="80"  name="ico" id="ico" value="<?php echo get_option('mytheme_ico'); ?>"/>   
                    <input type="button" name="upload_button" value="上传" id="upbottom"/>   
                    <p><a href="http://www.themepark.com.cn/icotpssmrhzzicowj.html" target="_blank">ico是什么？ico图片制作教程</a></p>
                </div>     
                
                  <div class="up">
                 
                     
                    <b class="bt">网站LOGO图标上传</b>
                    <input type="text" size="80"  name="logo" id="logo" value="<?php echo get_option('mytheme_logo'); ?>"/>   
                    <input type="button" name="upload_button" value="上传" id="upbottom"/>   
                 
                </div>    
                
                
                 <div class="up">
                 
                     
                    <b class="bt">默认头像上传(评论的头像)</b>
                    <input type="text" size="80"  name="bbs_post_avatar" id="bbs_post_avatar" value="<?php echo get_option('mytheme_bbs_post_avatar'); ?>"/>   
                    <input type="button" name="upload_button" value="上传" id="upbottom"/>   
                 
                </div>   
                <div class="up">
                    <b class="bt">选择首页的发布页面</b>
                    <p>这款主题可以让你登陆之后直接在首页发布文章，而你需要选择一个页面，并将这个页面的模板选择为“接收首页发布信息模板”，这样才能接收到数据，并成功发布，如果不选择，那么首页发布框将不会出现。</strong></p>
                    
                    <label  for="from_page">选择页面:</label><br />
             <select id="from_page" name="from_page" >
              <option value=''>不显示</option>
<?php 
		$pages = get_pages();
		
		
		foreach( $pages AS $page ) { 
		 $page_id=$page->ID;
		  $page_name=$page->post_title;
		?>
       
			<option 
				value='<?php echo  $page_id; ?>'
				<?php
					if ( $page_id ==  get_option('mytheme_from_page') ) {
						echo "selected='selected'";
					}
				?>><?php echo $page_name; ?></option>
		<?php } ?>
	</select>

                </div>
                
                  <div class="up">
                    <b class="bt">网站关键字填写（pc）</b>
                    <textarea name="keywords" cols="86" rows="3" id="keywords"><?php echo get_option('mytheme_keywords'); ?></textarea>   
                    <p>请填写网站的关键字，使用“ , ”分开，一个网站的关键字一般不超过100个字符。</p>
                </div>   
                
                 <div class="up">
                    <b class="bt">网站描述填写（中文）</b>
                    <textarea name="description" cols="86" rows="3" id="description"><?php echo get_option('mytheme_description'); ?></textarea>    
                    <p>请填写网站的描述，使用,分开，一个网站的描述一般不超过200个字符。</p>
                </div>   
                  <div class="up">    
                    <b class="bt">网站统计代码添加</b>
                    <textarea name="analytics" cols="86" rows="4" id="analytics"><?php echo stripslashes(get_option('mytheme_analytics')); ?></textarea>    
                 
                 <a href="http://www.themepark.com.cn/wordpresswzseohj.html">网站的seo应该如何去做？ 我们给你一些文章作为参考</a>
                   <p class="tishiwenzi"><a target="_blank" href="http://www.themepark.com.cn/msscwordpressqyzt.html"> 查看更多WEB主题公园开发的主题</a></p>
  </div>        
                
     
              <div class="xiaot">
              
              
                <b class="bt">各尺寸略缩图默认图片</b>
            
            <p><strong>在首页、侧边栏和列表页有的列表会调用一个封面图片，如果没有设置，而你的文章中也没有图片，那么将会调用一张默认的图片，你可以在此处上传各个尺寸的默认图片。</strong></p>
            
    <?php if(get_option('mytheme_case_thumbnails')){$case_thumbnails=get_option('mytheme_case_thumbnails');}else{$case_thumbnails= get_bloginfo('template_url').'/thumbnails/case.jpg';} 
		  if(get_option('mytheme_fang_thumbnails')){$fang_thumbnails=get_option('mytheme_fang_thumbnails');}else{$fang_thumbnails= get_bloginfo('template_url').'/thumbnails/fang.jpg';}
		  if(get_option('mytheme_four_s_thumbnails')){$four_s_thumbnails=get_option('mytheme_four_s_thumbnails');}else{$four_s_thumbnails= get_bloginfo('template_url').'/thumbnails/four_s.jpg';}
		  if(get_option('mytheme_news_thumbnails')){$news_thumbnails=get_option('mytheme_news_thumbnails');}else{$news_thumbnails= get_bloginfo('template_url').'/thumbnails/news.jpg';}
		  if(get_option('mytheme_case_full_thumbnails')){$case_full_thumbnails=get_option('mytheme_case_full_thumbnails');}else{$case_full_thumbnails= get_bloginfo('template_url').'/thumbnails/case_full.jpg';}
			
			
			
			?>
            <div class="up"><img style="width:100px; height:auto;"  src="<?php echo $case_thumbnails; ?>"/><br />

            <label  for="case_thumbnails">图片：287, 191</label> 
            
              <input type="text" size="60"  name="case_thumbnails" id="case_thumbnails" value="<?php echo $case_thumbnails; ?>"/>   
              <input type="button" name="upload_button" value="上传" id="upbottom"/>  <br /> 
            </div> 
            
             <div class="up"><img  style="width:100px; height:auto;"src="<?php echo $fang_thumbnails; ?>"/><br />
            <label  for="case_thumbnails">图片：287, 287</label> 
            
              <input type="text" size="60"  name="fang_thumbnails" id="fang_thumbnails" value="<?php echo $fang_thumbnails; ?>"/>   
              <input type="button" name="upload_button" value="上传" id="upbottom"/>  <br /> 
            </div> 
            
             
            
            
               <div class="up">      <img style="width:100px; height:auto;" src="<?php echo $news_thumbnails; ?>"/><br />
            <label  for="news_thumbnails">图片：400, 266</label> 
      
              <input type="text" size="60"  name="news_thumbnails" id="news_thumbnails" value="<?php echo $news_thumbnails; ?>"/>   
              <input type="button" name="upload_button" value="上传" id="upbottom"/>  <br /> 
            </div> 
            
               <div class="up">
               
                <img style="width:100px; height:auto;" src="<?php echo $case_full_thumbnails; ?>"/><br />
            <label  for="case_full_thumbnails">图片：287, 320</label> 
           
              <input type="text" size="60"  name="case_full_thumbnails" id="case_full_thumbnails" value="<?php echo $case_full_thumbnails; ?>"/>   
              <input type="button" name="upload_button" value="上传" id="upbottom"/>  <br /> 
            </div> 
              
              </div>
                              
   
                
             	     	
      
            
    </div>
     

                                         
            
            
            
           
                   
                         
           
                   
                     