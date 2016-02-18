<?php while(have_posts()) : the_post(); ?>
	<h2 class=”post-title”><?php the_title(); ?></h2>
	<div class=”post-content”><?php the_content(); ?></div>
	<?php edit_post_link(); ?>
<?php endwhile; ?>