<?php

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
<div class="container row">
<div class="title folio">
	<div class="col left line"></div>
	<div class="col diamond left"></div>
	<div class="col center"><?php inline_svg('/images/icons/pedia.svg') ?></div>
	<div class="col diamond right"></div>
	<div class="col right line"></div>
</div>

<div class="container row list folio">
	<div id="portfolios">
	<?php if(have_posts()): $count = 1 ; ?> 
		<?php while(have_posts()): the_post(); $pedia = new Benedict\Pedia(); ?>
			<article class="meta box horizontal folio" <?php if($count != 1) echo 'style="border-top: none;"' ?>>
				<span class="title">
					<a href=<?php echo $pedia->permalink ?>>
						<h1 class='post-title'><?php echo $pedia->title ?></h1>
					</a>
				</span>
				<?php inline_svg('/images/icons/'.$pedia->post_format.'.svg', 'icon') ?>
			</article>		
		<?php $count++; endwhile ;?>
	<?php endif ?>
		
	</div>

</div>
</div>
<?php
	get_footer();
?>