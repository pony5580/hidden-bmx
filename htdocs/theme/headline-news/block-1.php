<?php
global $g7_builder_query;
list($image_w, $image_h) = g7_image_sizes('small');
?>
<div class="block block-1">
	<header>
		<?php get_template_part('block', 'header'); ?>
	</header>
	<ul>
		<?php while ($g7_builder_query->have_posts()) : $g7_builder_query->the_post(); ?>
			<li class="post">
				<?php if (has_post_thumbnail()) : ?>
				<div class="block-side">
					<?php echo g7_image($image_w, $image_h); ?>
				</div>
				<?php endif; ?>
				<div class="block-content">
					<div class="top-meta">
						<div class="post-format"><?php echo g7_post_format_icon(); ?></div>
						<?php echo g7_post_rating('<div class="post-rating">', '</div>'); ?>
					</div>
					<h3 class="block-heading">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h3>
					<div class="block-meta">
						<span class="block-category">
							<?php the_category(' '); ?>
						</span>
						| <?php _e('by', 'g7theme'); ?> <?php echo g7_author_meta(); ?>
					</div>
					<div class="block-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></div>
				</div>
				<div class="clear"></div>
			</li>
		<?php endwhile; ?>
	</ul>
</div>
