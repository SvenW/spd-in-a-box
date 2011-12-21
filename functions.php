<?php
// Removing metaboxes in posts & pages
function remove_post_custom_fields() {
	remove_meta_box( 'postcustom' , 'post' , 'normal' ); 
}
add_action( 'admin_menu' , 'remove_post_custom_fields' );

// This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
	'primary' => __( 'Primary Navigation', 'buddypress' ),
) );

// filtering widgets
function spdinabox_remove_clear_widgets(){
	global $wp_registered_widgets;
		
	$allowed_widgets=array( 'search-2', 'recent-posts-2', 'recent-posts-3', 'tag_cloud-2', 'widget_spd_nav_nachrichten','widget_spd_nav_termine' );
	
	foreach( $wp_registered_widgets AS $id => $widget ){
		if(!in_array($id,$allowed_widgets)){
			unregister_sidebar_widget( $id );		
		}
	}	
}
add_action('admin_head', 'spdinabox_remove_clear_widgets');

if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 200, 200, true ); // Normal post thumbnails
	add_image_size( 'single-post-thumbnail', 598, 448 ); // Permalink thumbnail size
  	add_image_size( 'rotator-post-image', 598, 448, true ); // Rotator large size, hard crop mode
}


register_sidebars( 1,
	array(
		'name' => 'sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>'
	)
	
);

add_action('admin_menu', 'spd_admin_menu',30);

function spd_admin_menu() {
	if ( !is_admin() ){
		return false;
		}
    // Add a new top-level menu (ill-advised):
    add_menu_page('SPD Theme', 'SPD Theme', 'administrator', 'menuetopspd', 'spd_start');
	
    // Add a submenu to the custom top-level menu:
    add_submenu_page('menuetopspd', 'Einstellungen', 'Social Bookmarks', 'administrator', 'social', 'spd_social');

}

function spd_start(){
	echo "<div class=\"wrap\">\n";
	echo "<h2>Willkommen in ihrem SPD Premium Bereich</h2>\n";
	echo "<p>Diese Seite wird in den n&auml;chsten Wochen ausgebaut.</p>\n";
	echo "</div>";

}
function spd_social(){
  ### Social Save and destroy
  
	if ( isset( $_POST['update_spd_social'] ) ) {
       
	   if($_POST['spd_facebook'] != get_option('spd_facebook')){
        $spd_facebook = $_POST['spd_facebook'];
        update_option('spd_facebook', $spd_facebook);
       ?> <div class="updated"><p>SPD Facebook wurde gespeichert!</p></div> <?php }
       
	   if($_POST['spd_twitter'] != get_option('spd_twitter')){
        $spd_twitter = $_POST['spd_twitter'];
        update_option('spd_twitter', $spd_twitter);
       ?> <div class="updated"><p>SPD Twitter wurde gespeichert!</p></div> <?php }
       
	   if($_POST['spd_youtube'] != get_option('spd_youtube')){
        $spd_youtube = $_POST['spd_youtube'];
        update_option('spd_youtube', $spd_youtube);
       ?> <div class="updated"><p>SPD YouTube wurde gespeichert!</p></div> <?php }
       
	    if($_POST['spd_studivz'] != get_option('spd_studivz')){
        $spd_studivz = $_POST['spd_studivz'];
        update_option('spd_studivz', $spd_studivz);
       ?> <div class="updated"><p>SPD StudiVZ URL wurde gespeichert!</p></div> <?php }
	   
	   if($_POST['spd_newsletter'] != get_option('spd_newsletter')){
        $spd_newsletter = $_POST['spd_newsletter'];
        update_option('spd_newsletter', $spd_newsletter);
       ?> <div class="updated"><p>SPD Newsletter URL wurde gespeichert!</p></div> <?php }
	   
	   if($_POST['spd_contact'] != get_option('spd_contact')){
        $spd_contact = $_POST['spd_contact'];
        update_option('spd_contact', $spd_contact);
       ?> <div class="updated"><p>SPD Kontakt URL wurde gespeichert!</p></div> <?php }
  }
  ### Social Load 	
  
	if ( get_option('spd_facebook') != "" )	{	$spd_facebook = get_option('spd_facebook'); }
	if ( get_option('spd_twitter') != "" )	{	$spd_twitter = get_option('spd_twitter'); }
	if ( get_option('spd_youtube') != "" )	{	$spd_youtube = get_option('spd_youtube'); }
	if ( get_option('spd_studivz') != "" )	{	$spd_studivz = get_option('spd_studivz'); }
	if ( get_option('spd_newsletter') != "" )	{	$spd_newsletter = get_option('spd_newsletter'); }
	if ( get_option('spd_contact') != "" )	{	$spd_contact = get_option('spd_contact'); }
?>

  <form method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
  <p><div class="submit"><input type="submit" name="update_spd_social" value="<?php _e('Speichern', 'update_spd_social') ?>"  style="font-weight:bold;" /></div></p>	

  <p><strong>Einstellungen</strong></p>
	<p><strong>Facebook url:</strong></p><input name="spd_facebook" type="text" size="85" id="spd_facebook" value="<?php echo $spd_facebook; ?>"/><br>
	<p><strong>Twitter url: </strong></p><input name="spd_twitter" type="text" size="85" id="spd_twitter" value="<?php echo $spd_twitter; ?>"/><br>
	<p><strong>YouTube url: </strong></p><input name="spd_youtube" type="text" size="85" id="spd_youtube" value="<?php echo $spd_youtube; ?>"/><br>
	<p><strong>StudiVZ url: </strong></p><input name="spd_studivz" type="text" size="85" id="spd_studivz" value="<?php echo $spd_studivz; ?>"/><br>
    <p><strong>Newsletter url: </strong></p><input name="spd_newsletter" type="text" size="85" id="spd_newsletter" value="<?php echo $spd_newsletter; ?>"/><br>
    <p><strong>Kontakt url: </strong></p><input name="spd_contact" type="text" size="85" id="spd_contact" value="<?php echo $spd_contact; ?>"/><br>
  </form>
<?php


}

// custom login for theme
function childtheme_custom_login() {
	echo '<link rel="stylesheet" type="text/css" href="http://spd-seite.de/wp-content/themes/spd-community/customlogin.css"/>';
}
 
add_action('login_head', 'childtheme_custom_login');
/*
function register_my_menus() {
	register_nav_menus(array('main-menu' => __( 'Menue' )));
}
add_action( 'init', 'register_my_menus' );
*/
if(!function_exists('is_wp_nav_menu')){
	function is_wp_nav_menu( $args = array() ) {
		static $menu_id_slugs = array();
	
		$defaults = array( 'menu' => '', 'container' => 'div', 'container_class' => '', 'container_id' => '', 'menu_class' => 'menu', 'menu_id' => '',
		'echo' => true, 'fallback_cb' => 'wp_page_menu', 'before' => '', 'after' => '', 'link_before' => '', 'link_after' => '',
		'depth' => 0, 'walker' => '', 'theme_location' => '' );
	
		$args = wp_parse_args( $args, $defaults );
		$args = apply_filters( 'wp_nav_menu_args', $args );
		$args = (object) $args;
	
		// Get the nav menu based on the requested menu
		$menu = wp_get_nav_menu_object( $args->menu );
	
		// Get the nav menu based on the theme_location
		if ( ! $menu && $args->theme_location && ( $locations = get_nav_menu_locations() ) && isset( $locations[ $args->theme_location ] ) )
			$menu = wp_get_nav_menu_object( $locations[ $args->theme_location ] );
	
		// get the first menu that has items if we still can't find a menu
		if ( ! $menu && !$args->theme_location ) {
			$menus = wp_get_nav_menus();
			foreach ( $menus as $menu_maybe ) {
				if ( $menu_items = wp_get_nav_menu_items($menu_maybe->term_id) ) {
					$menu = $menu_maybe;
					break;
				}
			}
		}
	
		// If the menu exists, get its items.
		if ( $menu && ! is_wp_error($menu) && !isset($menu_items) )
			$menu_items = wp_get_nav_menu_items( $menu->term_id );
	
		// If no menu was found or if the menu has no items and no location was requested, call the fallback_cb if it exists
		if ( ( !$menu || is_wp_error($menu) || ( isset($menu_items) && empty($menu_items) && !$args->theme_location ) )
			&& ( function_exists($args->fallback_cb) || is_callable( $args->fallback_cb ) ) ){
			return false;
		}else{
			return true;
		}	
	}
}

### widget for the spd navigation
function widget_spd_nav_nachrichten() {
?>
     <ul class="news">
                	<h2>Nachrichten</h2>
                    <?php 
					
						$news_query = new WP_Query();
						$news_query->query("showposts=3&category_name=Nachrichten");
				
					?>
                    <?php if($news_query->have_posts()){ ?>
                    <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
					<?php 
						$snip_title=60;
						
						$the_title=get_the_title();
						if(strlen($the_title)>$snip_title){
							$the_title=substr($the_title,0,$snip_title)." ...";
						}			
						
					?>
                	<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo $the_title; ?></a></li>
                    <?php endwhile; ?>
                    <?php }else{ ?>
                    <li><a href="#" title="Es wurde noch keine Nachricht ver&ouml;ffentlicht">Es wurde noch keine Nachricht ver&ouml;ffentlicht</a></li>
                    <?php } ?>

                </ul>
                <ul class="further">
                    <?php $catId = get_category_by_slug('Nachrichten'); ?>
                    <?php if(isset($catId->term_id)){?>
                		<li><a href="<?php echo  get_category_link($catId->term_id); ?>" title="Weitere Nachrichten">Weitere Nachrichten</a></li>
                	<?php } ?>
                </ul>
            
  

<?php
}

if ( function_exists('widget_spd_nav_nachrichten') )
    wp_register_sidebar_widget( 'widget_spd_nav_nachrichten', 'SPD Nachrichten', 'widget_spd_nav_nachrichten', '' );
    
### widget for the community navigation
function widget_spd_nav_termine() {
?>
                <ul class="dates"><h2>Termine</h2>
                	<?php 
					
						$date_query = new WP_Query();
						$date_query->query("showposts=3&category_name=Termine");
				
					?>
                    <?php if($date_query->have_posts()){ ?>
                    <?php while ($date_query->have_posts()) : $date_query->the_post(); ?>
                    <?php 
						$snip_title=65;
						$the_title=get_the_title();
						if(strlen($the_title)>$snip_title){
							$the_title=substr($the_title,0,$snip_title)." ...";
						}			
						
					?>
                	<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo $the_title; ?></a></li>
                    <?php endwhile; ?>
                    <?php }else{ ?>
                    <li><a href="#" title="Es wurde noch keine Termine ver&ouml;ffentlicht">Es wurde noch keine Termine ver&ouml;ffentlicht</a></li>
                    <?php } ?>
                </ul>
                <ul class="further">
                	<?php $catId = get_category_by_slug('Termine'); ?>
                	<?php if(isset($catId->term_id)){?>
                		<li><a href="<?php echo  get_category_link($catId->term_id); ?>" title="Weitere Termine">Weitere Termine</a></li>
                	<?php } ?>
                </ul>
  

<?php
}

if ( function_exists('widget_spd_nav_termine') )
    wp_register_sidebar_widget( 'widget_spd_nav_termine', 'SPD Termine', 'widget_spd_nav_termine', '' );


?>