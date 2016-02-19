<?php while(have_posts()) : the_post(); ?>
	<div class=”post-content”>
		<?php the_content(); ?>
		<div class="edit"><small><?php edit_post_link(); ?></small></div>
	</div>
<?php endwhile; ?>