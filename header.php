<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('&laquo;', true, 'right'); ?><?php bloginfo('name'); ?></title>
<?php do_action( 'bp_head' ) ?>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( function_exists( 'bp_sitewide_activity_feed_link' ) ) : ?>
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> | <?php _e('Site Wide Activity RSS Feed', 'buddypress' ) ?>" href="<?php bp_sitewide_activity_feed_link() ?>" />
<?php endif; ?>
<?php if ( function_exists( 'bp_member_activity_feed_link' ) && bp_is_member() ) : ?>
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> | <?php bp_displayed_user_fullname() ?> | <?php _e( 'Activity RSS Feed', 'buddypress' ) ?>" href="<?php bp_member_activity_feed_link() ?>" />
<?php endif; ?>
<?php if ( function_exists( 'bp_group_activity_feed_link' ) && bp_is_group() ) : ?>
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> | <?php bp_current_group_name() ?> | <?php _e( 'Group Activity RSS Feed', 'buddypress' ) ?>" href="<?php bp_group_activity_feed_link() ?>" />
<?php endif; ?>

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> <?php _e( 'Blog Posts RSS Feed', 'buddypress' ) ?>" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> <?php _e( 'Blog Posts Atom Feed', 'buddypress' ) ?>" href="<?php bloginfo('atom_url'); ?>" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_enqueue_script('jquery'); ?>
<?php wp_enqueue_script('jquery-ui-core'); ?>
<?php wp_enqueue_script('jquery-ui-tabs'); ?>
<?php wp_head(); ?>

<script type="text/javascript">
jQuery(document).ready(function($){
    $("#photo-rotator").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 8000);
});

</script>
</head>

<body>
<?php global $blog_id; ?>
<!-- Site //-->
<div id="site" <?php body_class(); ?>>

	<?php include (TEMPLATEPATH . '/umbrella.php'); ?>
    
    <?php // echo $wp_query; ?>
	
    <!-- Border //-->
	<div id="border">
    	
        <!-- Head //-->
        <div id="head">
        	
            <!-- Menue //-->
            <div id="menue"> 
 			<ul>
				<li><a href="<?php bloginfo('url')?>">Startseite</a></li>
			</ul>           
         	<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary','container' => '' ) ); ?>                   	
                	<?php /*
						if(is_wp_nav_menu()){
							wp_nav_menu(array('container'=>''));
						}else{
							echo "<ul>\n";
							echo "<li><a href=\"".get_option('home')."\">Startseite</a></li>\n";
							wp_list_pages('title_li='); 
							echo "</ul>\n";
						}
					*/?>
            </div>
            <!-- End of menue //-->
            
            <!-- Logo //-->
            <div id="logo"><a href="<?php echo get_option('home'); ?>"><img src="<?php bloginfo('template_directory'); ?>/bilder/logo.png" width="176" height="141" alt="<?php bloginfo('name'); ?>" title="Zur Startseite: <?php bloginfo('name'); ?>" /></a></div>
			<!-- End of logo //-->
		</div>
        <!-- End of head //-->
        
        <!-- Main //-->
        <div id="main">