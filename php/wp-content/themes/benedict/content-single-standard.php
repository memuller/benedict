<?php
/**
 * The Template for standard post format.
 *
 * @package WordPress
 * @subpackage Bloq
 * @since Bloq 1.0
 */
?>
<?php global $spacing; ?>
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
	<div id='board-widget' class='board widget'>
		<div class="title small">
			<div class="col left line"></div>
			<div class="col diamond left"></div>
			<div class="col center">
				<?php inline_svg('/images/icons/board.svg') ?>
			</div>
			<div class="col diamond right"></div>
			<div class="col right line"></div>
		</div>
		<div class="meta box vertical">
			<span class="author meta">
				<?php $crafter = new Benedict\Crafter($post->author); $person = new Benedict\Pedia($crafter->person); ?>
				<?php inline_svg($person->icon, 'icon')  ?>
				<span><a href="<?php echo $person->permalink ?>"><?php the_author() ?></a></span>
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
					<span class='meta'>
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