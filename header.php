<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' : '; } ?><?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?>" href="<?php bloginfo('rss2_url'); ?>" />

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?= get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

	</head>
	<body <?php body_class(); ?>>

		<!-- wrapper -->
		<div class="wrapper">
		<?php 
			$slideshow = get_post_meta($post->ID,'slideshow', true);
			$url = get_post_meta($post->ID, 'video', true);
			if(!empty($slideshow)) : ?>
			<div class="highlight">
				<?= do_shortcode('[smartslider3 slider='.$slideshow.']'); ?>
			</div>
			<?php 
			elseif(!empty($url)) : ?>
				<div class="highlight video">
					<?= wp_oembed_get($url, ''); ?>
				</div>
			<?php endif ?>
			<!-- header -->
			<header class="header clear" role="banner">

					<!-- logo -->
					<a href="<?= home_url(); ?>" class="logo">
						<!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
						<img src="<?= get_template_directory_uri(); ?>/img/logo.svg" alt="Logo" class="logo-img">
						<img src="<?= get_template_directory_uri(); ?>/img/banner.svg" alt="description" class="logo-description">
					</a>
					<!-- /logo -->
					<div class="sidebar-widget">
						<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-2')) ?>
					</div>

					<div class="info">
						<h1 class="site-title"><?= bloginfo('name') ?></h1>
						<h2 class="site-description"><?= bloginfo('description') ?></h2>
					</div>

					<!-- nav -->
					<nav class="nav" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'header-menu','walker' => new mono_walker() ) ); ?>
					</nav>
					<!-- /nav -->

			</header>
			<!-- /header -->
