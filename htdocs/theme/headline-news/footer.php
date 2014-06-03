		</main>
		<?php if (get_theme_mod('footer_widget')) : ?>
			<div class="footer-widget">
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-xs-6"><?php dynamic_sidebar('footer1'); ?></div>
						<div class="col-md-3 col-xs-6"><?php dynamic_sidebar('footer2'); ?></div>
						<div class="col-md-3 col-xs-6"><?php dynamic_sidebar('footer3'); ?></div>
						<div class="col-md-3 col-xs-6"><?php dynamic_sidebar('footer4'); ?></div>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<footer class="bottom">
			<div class="container">
				<?php echo get_theme_mod('footer_text'); ?>
			</div>
		</footer>
	</div>
<?php wp_footer(); ?>
</body>
</html>
