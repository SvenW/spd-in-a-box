<!-- Umbrella bar //-->
<div id="umbrella">	
    <ul>
        <li>Willkommen! <?php bloginfo('name'); ?></li>
        <?php // wp_list_bookmarks('title_li=&categorize=0&category_before=<li id=\"%id\" class=\"umbrellalink\">&category_after=</li>'); 
		
		?>
        <?php get_links('-1', '<li class="umbrellalink">', '</li>','',false,'name'); ?>

    </ul>
</div>
<!-- End of umbrella bar //-->