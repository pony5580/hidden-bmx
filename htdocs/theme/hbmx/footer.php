		</main>
		<?php if (get_theme_mod('footer_widget')) : ?>
    <!--
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
    -->
		<?php endif; ?>
		<section id="footer" class="ova_footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="desc">
              <p>© 2014. HIDDEN-BMX.</p>
              <p class="produced">PRODUCED BY </p>
              <p class="footer-img"><img src="/shared/images/common/footer_logo.png" height="35" width="216" alt=""></p>
            </p></div>

            <a class="scrollup" href="#" data-mce-href="#" style="display: inline-block;"> <i class="fa fa-chevron-up"></i>
            </a>
          </div>
        </div>
      </div>
    </section>
		<!-- <footer class="bottom">
			<div class="container">
				<?php echo get_theme_mod('footer_text'); ?>
			</div>
		</footer> -->
	</div>
<?php wp_footer(); ?>


<script type="text/javascript">
(function ($) {
  $.fn.spectragram.accessData = {
    accessToken: '254921076.71326b9.4eda75dfe61e4cf4ab8d038d6db0a330',
    clientID: '71326b99faa84f88acc73fbe44f2c221'
  };
  $(function(){
  $('#body_instagram').spectragram('getRecentTagged',{
    query: 'hiddenchampion',
    max:20,
    size:'small'
  });
  });
})(jQuery);
  </script>
</body>
</html>
