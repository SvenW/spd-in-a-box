<?php get_header(); ?>		
<?php get_sidebar(); ?>

<!-- Content //-->
<div id="content">
  <div id="photo-rotator">
    <?php 
    $slide_id=1; 
    $featuredPosts = new WP_Query();
    $featuredPosts->query("showposts=3&category_name=Leitartikel");
    while ($featuredPosts->have_posts()) : $featuredPosts->the_post();
    ?>     
      <div id="slide-<?php echo $slide_id; $slide_id++;?>"> 
        <a href="<?php the_permalink() ?>" class="post-image">
         <?php the_post_thumbnail( 'rotator-post-image' ); ?>
         <span class="title"><h2><?php the_title(); ?></h2></span>
       	 <span class="text"><p><?php the_excerpt(); ?><br /><span class="more">Weiter zum Artikel</span></p></span>
         	<!--<span class="link"><p>&nbsp;&nbsp;Weiterlesen</p></span>//-->
         	<!--<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"></a> -->
        </a> 
      </div>
  <?php endwhile; ?><!--/close loop-->

  <ul id="slide-nav">
      <?php $nav_id=1; ?>
      <?php while ($featuredPosts->have_posts()) : $featuredPosts->the_post(); ?>
          <li>
              <a href="#slide-<?php echo $nav_id; ?>">
                  <?$nav_id++;?>
              </a>
          </li>
      <?php endwhile; ?><!--/close loop-->
  </ul>
 </div> 	
</div><!-- End of content //-->

<?php get_footer(); ?>
