<?php
/**
 * Template Name: Home
 *
 * @package WordPress
 * @subpackage Bloq
 * @since Bloq 1.0
 */

$folio = new \Benedict\Folio();
?>

	<div class="title folio">
		<div class="col left line"></div>
		<div class="col diamond left"></div>
		<div class="col center"><?php inline_svg('/images/icons/folio.svg') ?></div>
		<div class="col diamond right"></div>
		<div class="col right line"></div>
	</div>

<div class="container row list">
	<div class="meta box horizontal folio">
		<span class="title"><h1 class='post-title'><?php the_title() ?></h1></span>
		<?php inline_svg($folio->icon, 'icon') ?>
		<?php if($folio->claim){ ?>
			<span class="description"><?php the_('claim') ?></span>
		<?php } ?>
		
		<?php foreach ($folio->items() as $item): ?>
			<div class='list item'>
				<?php if ($item->ID != $post->ID): ?>
					<a href="<?php echo $item->permalink ?>">
						<?php echo '- '.$item->title ?>
					</a>
				<?php else: ?>
					<?php echo '> '.$item->title ?>
				<?php endif ?>	
			</div>
		<?php endforeach ?>
	</div>	
	<?php $posts = $folio->items(false); ?>
	<?php foreach ($posts as $post){ setup_postdata( $post );
			$format = get_post_format();
			if($post->post_type == 'pedia') :
				get_template_part('loop', 'single-pedia');
			else :
				get_template_part('loop', 'single-blog');
			endif;	
	} ?>

</div></div>
<?php
	get_footer();
?>