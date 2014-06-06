<?php get_header(); ?>

<div class="container">
	<div class="content not-found">
		<h1>404</h1>
		<p><?php _e('The page you requested could not be found. Perhaps searching will help.', 'g7theme'); ?></p>
		<?php get_search_form(); ?>
	</div>
</div>

<?php get_footer(); ?>