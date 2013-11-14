<?php global $format ;

$subtitle = get_post_meta($post->ID, 'glg_page_subtitle', true);
$header = '';
get_header();
$slider = glg_header_slider($post->ID, 'post');
if($slider != false)
	echo $slider;
else
	$header = 'simple';
if(!empty($subtitle)) :
?>
<?php endif; ?>
<div class="container row main pedia">
	<div class="title folio">
		<div class="col left line"></div>
		<div class="col diamond left"></div>
		<div class="col center"><?php inline_svg('/images/icons/pedia.svg') ?></div>
		<div class="col diamond right"></div>
		<div class="col right line"></div>
	</div>

	<div class="pedia selector">
		<?php foreach (\Benedict\Pedia::$formats as $i => $format): ?>
			<span class="format item <?php echo $format ?> <?php if($format == $active) echo 'active' ?>" 
				id="<?php echo $format ?>-selector"
				<?php if($i != 0) echo 'style="border-left: none;"' ?>
			>
				<a href="<?php echo home_url("pedia/$format") ?>">
					<?php inline_svg('/images/icons/'.$format.'.svg') ?>	
				
					<label for="<?php echo $format.'-selector' ?>">
						<?php echo __('pedia-'.$format).'s' ?>
					</label>
				</a>
			</span>
		<?php endforeach ?>
	</div>
	<div style="clear: both;"></div>
	<div class="container row pedia">
		<?php if(have_posts()): ?>
			<ul>
				<?php while(have_posts()): the_post(); $pedia = new Benedict\Pedia(); ?>
					<li class="item">
						<a href="<?php echo $pedia->permalink ?>"><?php echo $pedia->title ?></a>
					</li>
				<?php endwhile ?>
			</ul>	
		<?php else: ?>
			<div class="notfound">
				Ainda não temos nada aqui.
			</div>
		<?php endif ?>	 
	</div>

</div>
<?php
	get_footer();
?>