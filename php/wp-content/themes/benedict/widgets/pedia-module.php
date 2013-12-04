<div id="module-widget" class="pedia widget format module">
	<div class="title small">
		<div class="col left line"></div>
		<div class="col diamond left"></div>
		<div class="col center">
			<?php inline_svg('/images/icons/'.$pedia->post_format.'.svg') ?>
		</div>
		<div class="col diamond right"></div>
		<div class="col right line"></div>
	</div>
	
	<div class="meta box vertical module" style='padding-bottom: 8px;'>
		<span class="meta field no-icon">
			<em>fase</em>
			<span class="field"><?php the_('phase') ?></span>
		</span>

		<span class="meta field no-icon">
			<em>valor</em>
			<span class="field"><?php echo $pedia->cost . ' b$' ?></span>
		</span>
	</div>
</div>