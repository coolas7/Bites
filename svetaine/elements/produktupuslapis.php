<div class="bluebg">
	<div class="flexcenter">
	    <div class="title">
		     <h2><i class="fas fa-shopping-cart"></i> <?php the_field('puslapiutitle'); ?></h2>
	    </div>
    </div>
	<div class="ProzaLibre">
		<div class="flex sectionpadding">
			<?php $features =  get_field('featurespost'); 
		if ($features): ?>
	
			<?php foreach ($features as $post):
				setup_postdata($post);
			?>
			<div class="produktai">
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
	</div>
</div>