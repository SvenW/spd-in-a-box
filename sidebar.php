			<!-- Sidebar //-->
            <div id="sidebar">
            	<?php if ( ! dynamic_sidebar( 'sidebar' ) ) : ?>
            
            
                <ul class="news">
                	<h2>Nachrichten</h2>
                    <?php 
					
						$news_query = new WP_Query();
						$news_query->query("showposts=3&category_name=Nachrichten");
				
					?>
                    <?php if($news_query->have_posts()){ ?>
                    <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
					<?php 
						$snip_title=55;
						
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
                
                <ul class="dates"><h2>Termine</h2>
                	<?php 
					
						$date_query = new WP_Query();
						$date_query->query("showposts=3&category_name=Termine");
				
					?>
                    <?php if($date_query->have_posts()){ ?>
                    <?php while ($date_query->have_posts()) : $date_query->the_post(); ?>
                    <?php 
						$snip_title=55;
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
                		<?php endif; // end primary widget area ?>
                <div style="clear: both;"></div>
            </div>
            <div style="clear: both;"></div>
            <!-- End of sidebar //-->