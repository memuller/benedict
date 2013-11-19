<div id="project-widget" class="pedia widget format project">
	<div class="title small">
		<div class="col left line"></div>
		<div class="col diamond left"></div>
		<div class="col center">
			<?php inline_svg('/images/icons/'.$pedia->post_format.'.svg') ?>
		</div>
		<div class="col diamond right"></div>
		<div class="col right line"></div>
	</div>
	
	<div class="meta box vertical term" style='padding-bottom: 8px;'>
		<span class="meta modules">
			<?php inline_svg('/images/icons/module.svg') ?>
			<span>Módulos</span>
		</span>
		<span class="meta">
			<?php foreach ($pedia->connected() as $module): ?>
				<div>
					<a href="<?php echo $module->permalink ?>">
						<?php echo '- '. $module->title ?>
					</a>	
				</div>
			<?php endforeach ?>
		</span>
		<span class="meta field no-icon">
			<em>tipo</em>
			<span class="field"><?php the_('motivator') ?></span>
		</span>
	</div>
</div>