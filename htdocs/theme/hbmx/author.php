<?php get_header(); ?>

	<?php if (have_posts()) : ?>

		<?php
			/* Queue the first post, that way we know
			 * what author we're dealing with (if that is the case).
			 *
			 * We reset this later so we can run the loop
			 * properly with a call to rewind_posts().
			 */
			the_post();
		?>

		<header class="archive-header">
			<h1 class="page-title author"><span><?php _e('Author Archives', 'g7theme'); ?></span></h1>
		</header>

		<?php get_template_part('wrapper', 'start'); ?>

			<div class="archive-meta clearfix">
				<div class="author-avatar">
					<?php echo get_avatar(get_the_author_meta('user_email'), 60); ?>
				</div>
				<div class="author-description">
					<h2><?php the_author_link(); ?></h2>
					<?php the_author_meta('description'); ?>
				</div>
				<?php if (get_the_author_meta('url')) : ?>
					<div class="author-website">
						<i class="fa fa-external-link"></i>
						<a href="<?php echo get_the_author_meta('url'); ?>" target="_blank">
							<?php echo get_the_author_meta('url'); ?>
						</a>
					</div>
				<?php endif; ?>
				<?php $social_links = g7_author_social_links(); if ($social_links) : ?>
					<div class="widget_g7_social">
						<ul class="horizontal square">
							<?php foreach ($social_links as $k => $v) : ?>
								<li class="social-<?php echo $k; ?>">
									<a href="<?php echo $v['link']; ?>" title="<?php echo ucfirst($k); ?>" target="_blank">
										<span class="social-box">
											<i class="fa fa-<?php echo $v['icon']; ?>"></i>
										</span>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
						<div class="clear"></div>
					</div>
				<?php endif; ?>
			</div>

			<?php
				/* Since we called the_post() above, we need to
				 * rewind the loop back to the beginning that way
				 * we can run the loop properly, in full.
				 */
				rewind_posts();
			?>

			<div class="posts blog-small">
				<?php while (have_posts()) : the_post(); ?>
					<?php get_template_part('content', 'small'); ?>
				<?php endwhile; ?>
			</div>

			<?php g7_pagination(); ?>

		<?php get_template_part('wrapper', 'end'); ?>

	<?php endif; ?>

<?php get_footer(); ?>