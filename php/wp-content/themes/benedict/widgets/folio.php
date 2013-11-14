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