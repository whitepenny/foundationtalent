	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
	    <div class="footer-inner-wrap">
			<div class="footer-intro-container grid1120">
				<div class="footer-intro-left footer-intro-section">
					<?php 
						//variables
						$truelinkedin = get_field('true_linkedin', 'options'); 
						$truetwitter = get_field('true_twitter', 'options'); 
						$truefacebook = get_field('true_facebook', 'options'); 
					?>
					<ul class="footer-social">
						<?php if( $truefacebook ): ?>
		             		<li><a href="<?php echo $truefacebook; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
		         		<?php endif; ?>
		         		<?php if( $truetwitter ): ?>
		             		<li><a href="<?php echo $truetwitter; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
		         		<?php endif; ?>
		         		<?php if( $truelinkedin ): ?>
		             		<li><a href="<?php echo $truelinkedin; ?>" target="_blank"><i class="fa fa-linkedin-square"></i></a></li>
		         		<?php endif; ?>
					</ul>
				</div>
				<div class="footer-intro-middle footer-intro-section">
					<?php $footerintrotxt = get_field('footer_intro_text', 'options'); ?>
					<?php if( $footerintrotxt ): ?>
	             		<?php echo $footerintrotxt; ?>
	         		<?php endif; ?>

				</div>
				<div class="footer-intro-right footer-intro-section">
					<span class="headline-style-4"><a href="https://foundation.thrivetrm.com/">Client Login <i class="fa fa-lock"></i></a></span>
				</div>
			</div>
			<div class="footer-section-divider">
				<div class="footer-divider-border"></div>
				<div class="footer-divider-map-marker">
					<i class="fa fa-map-marker"></i>
				</div>
			</div>
			<div class="footer-location-container grid1120">

				<?php if ( have_rows('footer_locations', 'options') ): ?>
					<?php while ( have_rows('footer_locations', 'options') ) : the_row();

					//variables
					$thecity = get_sub_field('the_city');
					$theaddress = get_sub_field('the_address');
					?>
					<div class="the-location">
						<?php if( $thecity): ?>
		            		<h3 class="headline-style-4"><?php echo $thecity; ?></h3>
		        		<?php endif; ?>
		        		<?php if( $theaddress): ?>
		            		<div><?php echo $theaddress; ?></div>
		        		<?php endif; ?>
		        	</div>
						
					<?php endwhile; ?>
				<?php endif; ?>

					<div class="the-location"></div>
					<div class="the-location"></div>
					<div class="the-location"></div>
					<div class="the-location"></div>

			</div>
			<div class="copyright">
				<p style="font-size: 12px;">Copyright <?php echo date('Y') ?> Foundation Talent.&nbsp;&nbsp;All rights reserved. <a href="/privacy-policy">Privacy Policy</a></p>
			</div>
		</div>
	</footer><!-- #colophon -->
	</div><!-- Site Wrapper -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
