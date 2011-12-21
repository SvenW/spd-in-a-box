<?php

global $blog_id;
$facebook_link=get_blog_option($blog_id,"spd_facebook");
$twitter_link=get_blog_option($blog_id,"spd_twitter");
$youtube_link=get_blog_option($blog_id,"spd_youtube");
$studivz_link=get_blog_option($blog_id,"spd_studivz");
$newsletter_link=get_blog_option($blog_id,"spd_newsletter");
$contact_link=get_blog_option($blog_id,"spd_contact");

if($facebook_link!="" || $facebook_link!="" || $facebook_link!="" || $facebook_link!=""){
	
?>
            <!-- Social //-->
            <div id="social">
              <ul>
              	<?php if($facebook_link!="") { ?>
                <li class="facebook"><a target="_blank" href="<?php echo $facebook_link; ?>" title="<?php bloginfo('name'); ?> bei facebook"></a></li>
                <?php } ?>
                <?php if($twitter_link!="") { ?>
                <li class="twitter"><a target="_blank" href="<?php echo $twitter_link; ?>" title="<?php bloginfo('name'); ?> bei twitter"></a></li>
                <?php } ?>
                <?php if($youtube_link!="") { ?>
                <li class="youtube"><a target="_blank" href="<?php echo $youtube_link;  ?>" title="<?php bloginfo('name'); ?> bei youtube"></a></li>
                <?php } ?>
                <?php if($studivz_link!="") { ?>
                <li class="studivz"><a target="_blank" href="<?php echo $studivz_link;  ?>" title="<?php bloginfo('name'); ?> bei studivz"></a></li>
                <?php } ?>
                <?php if($newsletter_link!="") { ?>
                <li class="newsletter"><a href="<?php echo $newsletter_link;  ?>" title="<?php bloginfo('name'); ?> Newsletter"></a></li>
                <?php } ?>
                <?php if($contact_link!="") { ?>
                <li class="contact"><a href="<?php echo $contact_link;  ?>" title="Kontakt zu <?php bloginfo('name'); ?>"></a></li>
                <?php } ?>
              </ul>
            </div>
            <!-- End of social //-->
<?php 
}
?>
