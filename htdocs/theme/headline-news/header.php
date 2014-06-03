<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="wrapper">
		<header class="top">
			<div class="container">
				<?php get_template_part('news-ticker'); ?>
				<div class="row">
					<div class="col-sm-6 col-sm-push-3 col-xs-12">
						<?php echo g7_site_title(); ?>
					</div>
					<div class="col-sm-3 col-sm-pull-6 col-xs-6">
						<?php if (get_theme_mod('header_time', 1)) : ?>
							<div class="header-time">
								<i class="fa fa-clock-o"></i>
								<span><?php echo g7_current_time(get_theme_mod('header_time', 'h:i a')); ?></span>
							</div>
						<?php endif; ?>
						<?php if (get_theme_mod('header_date', 1)) : ?>
							<div class="header-date"><?php echo g7_current_time(get_theme_mod('header_date', 'd F Y')); ?></div>
						<?php endif; ?>
						<?php if (get_theme_mod('header_search', 1)) : ?>
							<form class="header-search">
								<i class="fa fa-search"></i>
								<input type="text" name="s" placeholder="<?php _e('Search...', 'g7theme'); ?>">
							</form>
						<?php endif; ?>
					</div>
					<div class="col-sm-3 col-xs-6">
						<?php if (get_theme_mod('top_menu', 1)) : ?>
							<?php echo g7_menu('topmenu'); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</header>

		<nav class="mainnav">
			<div class="container">
				<?php echo g7_menu('mainmenu'); ?>
			</div>
		</nav>

		<?php get_template_part('featured'); ?>

		<main>