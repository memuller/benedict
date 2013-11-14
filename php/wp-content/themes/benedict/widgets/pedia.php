<div id='pedia-widget' class='pedia widget'>
	<div class="title small">
		<div class="col left line"></div>
		<div class="col diamond left"></div>
		<div class="col center">
			<?php inline_svg('/images/icons/pedia.svg') ?>
		</div>
		<div class="col diamond right"></div>
		<div class="col right line"></div>
	</div>
	<div class="meta box vertical">
		<span class="format meta field">
			<?php inline_svg('/images/icons/'.$pedia->post_format.'.svg') ?>
			<em>isto é <?php echo $feminine ? 'uma' : 'um' ?></em>
			<span><?php echo $format_labels[$pedia->post_format] ?></span>
		</span>
		<span class="date meta">
			<?php inline_svg('/images/icons/date.svg', 'icon') ?>
			<span><?php the_date() ?></span>
		</span>
		<?php if (has_tag()) { ?>
			<span class="tags meta">
				<?php inline_svg('/images/icons/tag.svg', 'icon') ?>
				<?php 
					$tags = get_the_tags(); 
					$links = array_map(function($tag){ return sprintf('<a href="%s">%s</a>', get_term_link($tag), $tag->name);}, $tags);
					$tags = array_map(function($tag){return $tag->name;}, $tags); 
					$tags = implode(', ', $tags); $links = implode(', ', $links);
					
				?>
				<span class="links" <?php if(strlen($tags)> 25) echo 'style="margin-top:0px;"' ?>><?php echo $links; ?></span>
			</span>			
		<?php } ?>
	</div>
</div>