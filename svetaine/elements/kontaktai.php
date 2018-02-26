<div id="kontaktai" class="flex sectionpadding background-green ProzaLibre">
		<div class="borders sectionpadding"> 
			<h2 class="textcenter-green"><i class="far fa-compass"></i> <?php the_field('kontaktaititle'); ?></h2>

			<?php if (have_rows('kontaktaicontent')) : ?>
				<?php while(have_rows('kontaktaicontent')) : 
						the_row(); ?>
						<p>
							<i class="<?php the_sub_field('icon'); ?>"></i><?php the_sub_field('tekstas'); ?>
							<span>
							 	<a class="kontaktai" href="<?php the_sub_field('tipas'); ?><?php the_sub_field('nuoroda'); ?>"><?php the_sub_field('nuorodostekstas');?></a>
							</span>
						</p>
				<?php endwhile; ?>
						
			<?php endif; ?>
		</div>
	<!-- 	<div class="borders" id="googleMap"> <?php the_field('map');?></div> -->
	<?php 

	$location = get_field('map');

	if( !empty($location) ):
	?>
	<div class="borders acf-map">
		<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
	</div>
	<?php endif; ?>

</div>

	<div class="clearfloat"></div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDheZDjJxCxRC8_3nWe508y5w7aAZb-Ps"></script>
