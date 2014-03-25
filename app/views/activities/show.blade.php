@section("show")
	<?php
		File::getRequire('assets/dist/pert/Persistence.php');
		File::getRequire('assets/dist/pert/pusher_config.php');

		$comment_post_ID = 1;
		$db = new Persistence();
		$comments = $db->get_comments($comment_post_ID);
		$has_comments = (count($comments) > 0);
	?>
	
	<div id="respond">

		<h3>Leave a Comment</h3>

		<form action="post_comment" method="post" id="commentform">

			<label for="comment_author" class="required">Your name</label>
			<input type="text" name="comment_author" id="comment_author" value="" tabindex="1" required="required">

			<label for="email" class="required">Your email:</label>
			<input type="email" name="email" id="email" value="" tabindex="2" required="required">

			<label for="comment" class="required">Your message</label>
			<textarea name="comment" id="comment" rows="10" tabindex="4"	 required="required"></textarea>

			<!-- comment_post_ID value hard-coded as 1 -->
			<input type="hidden" name="comment_post_ID" value="<?php echo($comment_post_ID); ?>" id="comment_post_ID" />
			<input name="submit" type="submit" value="Submit comment" />

		</form>
	</div>
	<ol id="posts-list" class="hfeed<?php echo($has_comments?' has-comments':''); ?>">
      <li class="no-comments">Be the first to add a comment.</li>
      <?php
        foreach ($comments as &$comment) {
          ?>
          <li><article id="comment_<?php echo($comment['id']); ?>" class="hentry">	
    				<footer class="post-info">
    					<abbr class="published" title="<?php echo($comment['date']); ?>">
    						<?php echo( date('d F Y', strtotime($comment['date']) ) ); ?>
    					</abbr>

    					<address class="vcard author">
    						By <a class="url fn" href="#"><?php echo($comment['comment_author']); ?></a>
    					</address>
    				</footer>

    				<div class="entry-content">
    					<p><?php echo($comment['comment']); ?></p>
    				</div>
    			</article></li>
          <?php
        }
      ?>
		</ol>
		<script>
			var APP_KEY = '<?php echo(APP_KEY); ?>';
		</script>

@show