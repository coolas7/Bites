<div class="bluebg">
  <div class="flexcenter">
	  <div class="title">
		  <h2><i class="far fa-images"></i> <?php the_field('puslapiutitle'); ?></h2>
	  </div>
  </div>
  <?php if (have_rows('elementas')) : ?>
    <div class="ProzaLibre" id="carousel">
       <?php while(have_rows('elementas')) : 
          the_row();
        ?>
      <div class="<?php the_sub_field('klase'); ?>">
       	<p><?php the_sub_field('antraste'); ?></p>
        <img src="<?php the_sub_field('paveiksl'); ?>">
      </div>
        <?php endwhile; ?>
    </div>
  <?php endif; ?>

  <div class="buttons">
    <button id="prev"><span><?php the_field('atgal'); ?></span></button>
    <button id="next"><span><?php the_field('pirmyn'); ?></span></button>
  </div>
</div>
   