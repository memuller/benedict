<div id="person-widget" class="pedia widget format person">
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
		<span class="meta field">
			<?php inline_svg($pedia->icon) ?>
			<em><?php echo $pedia->position ?></em>
			<span class="field"><?php echo $pedia->title ?></span>
		</span>
		<span class="meta place field no-icon">
			<em>membro</em>
			<span class="field"><?php echo $pedia->works_at ?></span>
		</span>
		<span class="meta place field no-icon">
			<em>base</em>
			<span class="field"><?php echo $pedia->place ?></span>
		</span>
		<span class="meta facebook field no-icon">
			<em>perfis sociais</em>
			<span class="field"><a href="<?php $pedia->facebook ?>">Facebook</a></span>
		</span>
	</div>
</div>