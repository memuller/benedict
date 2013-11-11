<?php
/**
 * The Template for standard post format.
 *
 * @package WordPress
 * @subpackage Bloq
 * @since Bloq 1.0
 */
?>
<?php global $spacing; $pedia = new Benedict\Pedia(); 
	$format_labels = array(
		'person' => 'Pessoa',
		'module' => 'Módulo',
		'term' => 'Termo',
		'reference' => 'Referência',
		'project' => 'Projeto',
		'tool' => 'Ferramenta'
	);
	$feminine = in_array($pedia->post_format, array('person', 'reference', 'tool')) ? true : false ;  
?>
<div class="col span_9" style="margin-top: <?php echo $spacing ?>px;">
	<article>
		<?php the_title('<h1 class="post-title">', '</h1>'); ?>
		
		<?php the_content(); ?>
		<ul id="navigation">
			<li><?php previous_post_link('%link', __('<span class="pictogram post-nav">&#59225;</span> Previous', 'themelovin')); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
			<li><?php next_post_link('%link', __('<span class="pictogram post-nav">&#59226;</span> Next', 'themelovin')); ?></li>
		</ul>
	</article>
	<?php comments_template(); ?>
</div>
<aside class="col span_3" style="margin-top: <?php echo $spacing ?>px;">
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
				<em><?php echo $feminine ? 'uma' : 'um' ?></em>
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
	<div id="pedia-format-widget" class="pedia widget format">
		<div class="title small">
			<div class="col left line"></div>
			<div class="col diamond left"></div>
			<div class="col center">
				<?php inline_svg('/images/icons/'.$pedia->post_format.'.svg') ?>
			</div>
			<div class="col diamond right"></div>
			<div class="col right line"></div>
		</div>
		<?php if ('person' == $pedia->post_format): ?>
		<div class="meta box vertical term" style='padding-bottom: 8px;'>
			<span class="meta field no-icon">
				<em>conhecido como</em>
				<span class="field"><?php echo $pedia->title ?></span>
			</span>
			<span class="meta fullname field no-icon">
				<em>nome completo</em>
				<span class="field"><?php echo $pedia->full_name ?></span>
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
		<?php endif ?>

	</div>
	<?php if (in_array($post->post_type, array('pedia', 'post')) && $folios = \Benedict\Folio::current() ): ?>
		<div id='folio-widget' class='folio widget'>
			<div class="title small">
				<div class="col left line"></div>
				<div class="col diamond left"></div>
				<div class="col center">
					<?php inline_svg('/images/icons/folio.svg') ?>
				</div>
				<div class="col diamond right"></div>
				<div class="col right line"></div>
			</div>
			<?php foreach ( $folios as $folio):?>
				<div class="meta box vertical">
					<span class="meta name">
						<?php inline_svg($folio->icon, 'icon') ?>
						<span><a href="<?php echo $folio->permalink ?>"><?php echo $folio->title ?></a></span>
					</span>
					<span class='meta' style="padding-bottom: 8px;">
						<?php foreach ($folio->items() as $item): ?>
							<div>
								<?php if ($item->ID != $post->ID): ?>
									<a href="<?php echo $item->permalink ?>">
										<?php echo '- '.$item->title ?>
									</a>
								<?php else: ?>
									<?php echo '> '.$item->title ?>
								<?php endif ?>	
							</div>
						<?php endforeach ?>	
					</span>				
				</div>
			<?php endforeach ?>
		</div>
	<?php endif ?>
</aside>