<?php get_header(); ?>
                    
<!-- Content //-->
<div id="content">

	<!-- Article //--->
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php $custom=get_post_custom(); ?>
    <?php if($custom["javascript"][0]!=""){echo "<script type=\"text/javascript\">\n".$custom["javascript"][0]."</script>\n"; } ?>       	
    <?php if($custom["preloadimage"][0]!=""){ ?>
		
		<script type="text/javascript">
        function MM_preloadImages() { //v3.0
		  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
			var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
			if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
		}
		<?php // Creating action to load images
		
		$preloadimages=$custom["preloadimage"];
		$preloadfunction="MM_preloadImages(";
							
		for($i=0;$i<count($preloadimages);$i++){
			$preloadfunction.="'".$preloadimages[$i]."'";
			
			if($i<count($preloadimages)-1){
				$preloadfunction.=",";
			}
		}
		$preloadfunction.=");";
		
		echo $preloadfunction;
		
		?>
		</script>				
	<?php } ?>
  	<div id="article">
        
        <h3><?php the_title(); ?></h3>
        
        <?php if($custom["htmlbefore"][0]!=""){echo $custom["htmlbefore"][0]; } ?>
        
        <?php the_content(); ?>
        
         <?php if($custom["htmlafter"][0]!=""){echo $custom["htmlafter"][0]; } ?>
        
        <!-- <iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink($post->ID)); ?>&amp;layout=standard&amp;show_faces=true&amp;width=450&amp;action=like&amp;colorscheme=light" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:450px; height:60px"></iframe>//-->
        
        <?php // comments_template(); ?>
        
        <div style="clear:both"></div>

    </div>
    
    <?php endwhile; else: ?>

	<?php endif; ?>
    <!-- End of article //-->
    
</div>
<!-- End of content //-->
            
<?php get_sidebar(); ?>

<?php get_footer(); ?>