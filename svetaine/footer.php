		<footer class="bottom0">
				<div class="flex ProzaLibre background-green">
					<div>
						<p>&copy; <?php echo date('Y')." "; bloginfo('name') ?> <br> Design: V.U.</p>
					</div>
					<div class="footericons">
							<p><?php the_field('footertext'); ?></p>
						
						<div class="footericons2">
							<?php if (have_rows('footericons')) : ?>
								<?php while(have_rows('footericons')) : 
									the_row(); ?>
								<a class="kontaktai" href="<?php the_sub_field('tipas'); ?><?php the_sub_field('kontaktas'); ?>"><i class="<?php the_sub_field('footericon'); ?>"></i></a>
								<?php endwhile;
							 endif; ?>
						</div>
					</div>
				</div>
			</footer>
		</div>
		 <?php wp_footer(); ?>
	</body>
</html>