		<?php include (TEMPLATEPATH . '/social.php'); ?>
        
        </div>
        <!-- End of main //-->
        
        <!-- Bottom //-->
        <div id="bottom"></div>
        <!-- End of Bottom //-->
        
    </div>
     <!-- End of border //-->
	
    <!-- Banner //-->
    <div id="banner"></div>
    <!-- End of banner //-->
    
    <!-- Subline //-->
    <div id="subline"><p>&copy; <?php echo date("Y",time()); ?> - <?php bloginfo('name'); ?>  | Realisierung: Rheinschmiede <?php if($_SERVER['REQUEST_URI']=="/"){ ?><a href="http://www.rheinschmiede.de">Webdesign</a><?php }else{ ?>Webdesign<?php } ?></p></div>
    <!-- End of subline //-->    

</div>
<!-- End of site //-->
<?php wp_footer(); ?>
</div>
</body>
</html>
