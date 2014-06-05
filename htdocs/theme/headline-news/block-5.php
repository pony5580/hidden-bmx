<?php
global $g7_builder_query;
$block_counter = 1;
list($image_w, $image_h) = g7_image_sizes('grid');
list($image_w2, $image_h2) = g7_image_sizes('thumb');
?>
<div class="block block-5">
	<header>
		<?php get_template_part('block', 'header'); ?>
	</header>
	<div class="row">
		<div class="col-xs-6">
			<div class="post post-main">
				<?php while ($g7_builder_query->have_posts()) : $g7_builder_query->the_post(); ?>
					<div class="top-meta">
						<div class="post-format"><?php echo g7_post_format_icon(); ?></div>
						<?php echo g7_post_rating('<div class="post-rating">', '</div>'); ?>
					</div>
					<?php if (has_post_thumbnail()) : ?>
						<div class="block-top">
							<?php echo g7_image($image_w, $image_h); ?>
						</div>
					<?php endif; ?>
					<h3 class="block-heading">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h3>
					<div class="block-meta">
						<?php echo g7_date_meta(); ?>
					</div>
					<div class="block-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 200); ?></div>
				<?php $block_counter++; break; endwhile; ?>
			</div>
		</div>
		<div class="col-xs-6">
			<ul>
				<?php while ($g7_builder_query->have_posts()) : $g7_builder_query->the_post(); ?>
					<li class="post">
						<div class="block-side">
							<?php echo g7_image($image_w2, $image_h2); ?>
						</div>
						<div class="block-content">
							<?php echo g7_post_rating('<div class="post-rating">', '</div>'); ?>
							<h4 class="block-heading">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h4>
							<div class="block-meta">
								<?php echo g7_date_meta(); ?>
							</div>
							<div class="block-excerpt-child"><?php echo wp_trim_words(get_the_excerpt(), 200); ?></div>
						</div>
						<div class="clear"></div>
					</li>
				<?php $block_counter++; endwhile; ?>
			</ul>
		</div>
	</div>
</div>
