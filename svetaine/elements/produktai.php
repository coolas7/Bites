<div class="flex sectionpadding ProzaLibre geltonazalia">
	
	<?php $features =  get_field('featurespost'); 
		if ($features): ?>
	
			<?php foreach ($features as $post):
				setup_postdata($post);
			?>
			<div class="produktai borders">
				<img src="<?php the_field('paveiksliukas'); ?>" alt="produktas1">
				<h3><?php the_title(); ?></h3>
				<div>
					<?php the_field('kaina'); ?>
					<a href="#" class="btnpirkti">Pirkti</a>
				</div>
				<p><?php the_content(); ?></p>
			</div>	
			<?php endforeach; ?>
		<?php endif; ?>	
<?php wp_reset_query(); ?>
</div>

