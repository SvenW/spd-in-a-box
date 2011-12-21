<?php get_header(); ?>
<?php get_sidebar(); ?>

<!-- Content //-->

<div id="content"> 
  
  <!-- Article //--->
  
  <div id="articleoverview">
    <?php if (have_posts()) : ?>
    <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
    <?php /* If this is a category archive */ if (is_category()) { ?>
    <h3><?php echo single_cat_title('', false); ?></h3>
    <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
    <h3>Archiv f&uuml;r den Tag <?php echo single_tag_title('', false); ?></h3>
    <h5>Hier finden Sie weitere Nachrichten zu allen Kategorien.</h5>
    <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
    <h3><?php printf(_c('Archive for %s|Daily archive page', false), get_the_time(__('F jS, Y', 'kubrick'))); ?></h3>
    <h5>Hier finden Sie weitere Nachrichten zu allen Kategorien.</h5>
    <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
    <h3><?php printf(_c('Archive for %s|Monthly archive page', false), get_the_time(__('F, Y', 'kubrick'))); ?></h3>
    <h5>Hier finden Sie weitere Nachrichten zu allen Kategorien.</h5>
    <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
    <h3>Archiv aus dem Jahr <?php echo get_the_time(__('Y', false)); ?></h3>
    <h5>Hier finden Sie weitere Nachrichten zu allen Kategorien.</h5>
    <?php /* If this is an author archive */ } elseif (is_author()) { ?>
    <h3>Archiv</h3>
    <h5>Hier finden Sie weitere Nachrichten zu allen Kategorien.</h5>
    <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
      <h3>Blogarchiv</h3>
      <h5>Hier finden Sie weitere Nachrichten zu allen Kategorien.</h5>
      <?php } ?>
    <?php while (have_posts()) : the_post(); ?>
    
    <!-- Article summary //-->
    
    <div class="summary">
      <h4 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
        <?php the_title(); ?>
        </a></h4>
      <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
      <?php the_excerpt() ?>
      </a> </div>
    
    <!-- End of article summary //-->
    
    <?php endwhile; ?>
    <?php else : endif; ?>
  </div>
</div>

<!-- End of content //-->

<?php get_footer(); ?>
