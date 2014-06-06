<?php
global $g7_builder_query;
list($image_w, $image_h) = g7_image_sizes('small');
?>
<div class="block block-3">
	<header>
		<?php get_template_part('block', 'header'); ?>
	</header>
	<ul class="row">
		<?php while ($g7_builder_query->have_posts()) : $g7_builder_query->the_post(); ?>
			<li class="col-lg-3 col-md-4 col-sm-3 col-xs-4 post">
				<?php if (has_post_thumbnail()) : ?>
				<div class="block-top">
					<?php echo g7_image($image_w, $image_h); ?>
				</div>
				<?php endif; ?>
				<div class="block-content">
					<h4 class="block-heading">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h4>
					<div class="block-meta">
						<?php echo g7_date_meta(); ?>
					</div>
				</div>
			</li>
		<?php endwhile; ?>
	</ul>
</div>
