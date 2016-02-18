<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<?php if (is_front_page()): ?>
			
			<?php
			$locations = get_nav_menu_locations();
			$menu = wp_get_nav_menu_object($locations[ 'header-menu' ]);
			$menu_items = wp_get_nav_menu_items($menu->name);
			if( $menu_items ) :
				foreach ($menu_items as $menu_item ) :
					$args = array('p' => $menu_item->object_id,'post_type' => 'any');
					 if($menu_item->xfn == "nofollow") :
						global $wp_query;
						$wp_query = new WP_Query($args);
						$templatePart = ($menu_item->title == 'Réalisations') ? 'realisations' : $menu_item->object;
						?>
						<section <?php post_class(); ?> id="<?= sanitize_title($menu_item->title); ?>">
							<?php 
							if ( have_posts() ){
							   include(locate_template('home-'.$templatePart.'.php'));
							} ?>
						</section>
						<?php
					 wp_reset_query();
					 endif;
				endforeach;
			endif; ?>

		<?php else: ?>

			<section>
			<?php if (have_posts()): while (have_posts()) : the_post(); ?>

				<!-- article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<?php the_content(); ?>

					<?php edit_post_link(); ?>

				</article>
				<!-- /article -->

			<?php endwhile; ?>

			<?php else: ?>

				<!-- article -->
				<article>

					<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

				</article>
				<!-- /article -->

			<?php endif; ?>

			</section>
			<!-- /section -->
		<?php endif ?>
		
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
