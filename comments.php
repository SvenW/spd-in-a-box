<hr />
<?php
	
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Bitte laden Sie diese Datei nicht direkt. Vielen Dank!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">Die Kommentare sind Passwortgesch&uuml;tzt.</p>
	<?php
		return;
	}
?>
					
                    <?php if ( comments_open() ) : ?>
                    <!-- Comments //--->       
                    <div id="comments">
                    	
                        
                        <h3><?php comments_number('Keine Kommentare', 'Ein Kommentar', '% Kommentare' );?> zu &#8220;<?php the_title(); ?>&#8221;</h3>
						<?php if ( have_comments() ) : ?>
                        <!-- Commentlist //--->
                        <ol id="commentlist">
                        	<?php wp_list_comments(); ?>
                        </ol>
                        
                        <div class="navigation">
                            <div class="alignleft"><?php previous_comments_link() ?></div>
                            <div class="alignright"><?php next_comments_link() ?></div>
                        </div>
                        
                        <?php else : // this is displayed if there are no comments so far ?>
							<?php if ( comments_open() ) : ?>
                            <p>Es wurden noch keine Kommentare zu diesem Artikel hinterlassen.</p>
                            <?php else : // comments are closed ?>
                            <!--<p class="nocomments">Kommentarfunktion ist deaktiviert.</p>//-->
                            <?php endif; ?>
                        <?php endif; ?>
                        
                        <?php if ( comments_open() ) : ?>

                        <hr />
                        
                        <h3><?php comment_form_title( 'Hinterlassen Sie einen Kommentar', 'Hinterlassen Sie einen Kommentar zu %s' ); ?></h3>
                        
                        <div class="cancel-comment-reply">
	                        <small><?php cancel_comment_reply_link(); ?></small>
                        </div>
                        
                        <?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
	                        <p>Sie m&uuml;ssen <a href="<?php echo wp_login_url( get_permalink() ); ?>">eingeloggt sein</a>, um Kommentieren zu d&uuml;rfen.</p>
                        <?php else : ?>
                        <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
                        <?php if ( is_user_logged_in() ) : ?>

                        <p>Eingeloggt als <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Ausloggen &raquo;</a></p>
                        
                        <?php else : ?>
                        	<p>
                            	<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" />
                            	<label for="author"><small>Name<?php if ($req) echo " *"; ?></small></label>
                            </p>
                            
                            <p>
                            	<input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
                            	<label for="email"><small>Email (wird nicht ver&ouml;ffentlicht) <?php if ($req) echo "*"; ?></small></label>
                            </p>
                            
                            <p>
                            	<input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
                            	<label for="url"><small>Webseite</small></label>
                            </p>
                        <?php endif; ?>
                            <p><textarea name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea></p>
                            <p><input name="submit" type="submit" id="submit" tabindex="5" value="Kommentar absenden" /></p>
                            <?php comment_id_fields(); ?>
                            <?php do_action('comment_form', $post->ID); ?>
                        </form>
                        <?php endif; ?>
                        <?php endif; ?>

                        <!-- End of commentlist //--->
                    </div>
                    <!-- End of comments //--->
                    <?php endif; ?>