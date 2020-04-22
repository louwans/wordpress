<div class="footer">
    <div class="footer_in">
    <?php  ob_start(); wp_nav_menu(array('walker' => new header_menu(), 'container' => false,'theme_location' => 'link-menu2','items_wrap' => '<ul class="link">%3$s</ul>' ) ); ?>
     <p class="f_bq "> <?php if($word_t2!=""){echo $word_t2;}else{echo '版权所有';}  ?> &copy;<?php echo date("Y"); echo " "; bloginfo('name'); 
		   if($icp_b !=="") {echo ' |   <a rel="nofollow" target="_blank" href="http://www.miitbeian.gov.cn/">'.$icp_b.'</a>'; };
		   echo ' |  <a class="banquan" target="_blank" href="http://www.themepark.com.cn">theme by themepark</a>'; 
		    echo ' |  '.stripslashes(get_option('mytheme_analytics')); ?> </p>
    
    </div>


</div>


<a href="#" title="回到顶部" class="top_go_btn"></a>







	
    <div id="gallery" class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="pswp__bg"></div>

        <div class="pswp__scroll-wrap">

          <div class="pswp__container">
			<div class="pswp__item"></div>
			<div class="pswp__item"></div>
			<div class="pswp__item"></div>
          </div>

          <div class="pswp__ui pswp__ui--hidden">

            <div class="pswp__top-bar">

				<div class="pswp__counter"></div>

				<button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

		

				<button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

				<button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

				<div class="pswp__preloader">
					<div class="pswp__preloader__icn">
					  <div class="pswp__preloader__cut">
					    <div class="pswp__preloader__donut"></div>
					  </div>
					</div>
				</div>
            </div>


			<!-- <div class="pswp__loading-indicator"><div class="pswp__loading-indicator__line"></div></div> -->

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
	            <div class="pswp__share-tooltip">
					<!-- <a href="#" class="pswp__share--facebook"></a>
					<a href="#" class="pswp__share--twitter"></a>
					<a href="#" class="pswp__share--pinterest"></a>
					<a href="#" download class="pswp__share--download"></a> -->
	            </div>
	        </div>

            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
            <div class="pswp__caption">
              <div class="pswp__caption__center">
              </div>
            </div>
          </div>

        </div>


    </div>
    <?php  wp_footer(); ?>
    <script type="text/javascript">
   
		
</script>
</body>
   <!--<?php echo get_num_queries() . ' queries in ' . timer_stop(0) . ' seconds.'; ?>-->	
</html>
