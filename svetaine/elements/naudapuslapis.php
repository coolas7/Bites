<div class="bluebg">
	<div class="flexcenter">
	    <div class="title">
		     <h2><?php the_field('puslapiutitle'); ?></h2>
	    </div>
    </div>
    <?php 
	$query = new WP_Query(array('cat' => get_field('naudinga')));
?>
<?php 
if ($query->have_posts() ) : ?>
<?php
	while ($query->have_posts() ) : $query->the_post(); 
?>
	<div class="ProzaLibre naudapadding">
		<h2 class="textcenter-green"><?php the_title(); ?></h2>
		<p><?php the_content(); ?></p>
		<hr>
	</div>
		<?php
	 endwhile; 
	 else: ?> <h2 class="textcenter-green ProzaLibre naudapadding"> <?php _e('Nėra įrašų');?></h2>
</div>
<?php
 endif;
 wp_reset_query();
 // the_title();
?>