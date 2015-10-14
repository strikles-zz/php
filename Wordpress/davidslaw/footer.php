<footer id="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<div class="footer-title"><?php echo get_field('location_title','options'); ?></div>
				<div class="row">
					<div class="col-sm-6 footer-textfield">
						<?php echo get_field('adres_1','options'); ?>
					</div>
					<div class="col-sm-6 footer-textfield">
						<?php echo get_field('adres_2','options'); ?>
					</div>
				</div>
			</div>
			<div class="col-md-7">
				<div class="footer-title half-margin-mobile"><?php echo get_field('contact_title','options'); ?> <div class="footer-subtitle hidden-xs"><?php echo get_field('contact_subtitle','options'); ?></div></div>
				<?php gravity_form(1, $display_title=false, $display_description=false, $display_inactive=false, $field_values=null, $ajax=true); ?>
			</div>
		</div>
		<div class="row ">
			<div class="col-md-12">
				<div class="footers-footer">
					<div class="row">
						<div class="col-xs-5 col-sm-3 col-md-2 logo">
								<img src="<?php echo get_field('footer_logo','options')['url']; ?>" alt="" width="128">


						</div>
						<div class="col-xs-4 col-sm-6 col-md-4 footers-footertext">
							<?php echo get_field('disclaimer','options'); ?>
						</div>
						<div class="col-xs-3 col-sm-3 col-md-6 footers-footertext text-right">
							<a href="<?php echo get_field('linkedin_url','options'); ?>" target="_blank"><i class="fa fa-linkedin-square"></i></a>
							<a href="<?php echo get_field('facebook_url','options'); ?>" target="_blank"><i class="fa fa-facebook-square"></i></a>
						</div>
					</div>


				</div>
			</div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
	</body>
</html>
