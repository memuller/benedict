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
	<div class="col center"><img src="<?php echo get_template_directory_uri().'/images/icons/folio-g.png'; ?>" alt=""></div>
	<div class="col diamond right"></div>
	<div class="col right line"></div>
</div>

<div class="container row list folio">
	<div id="portfolios">
	<?php if(have_posts()): $count = 1 ; ?> 
		<?php while(have_posts()): the_post(); $folio = new Benedict\Folio(); ?>
			<article class="meta box horizontal folio" <?php if($count != 1) echo 'style="border-top: none;"' ?>>
				<span class="title">
					<a href=<?php echo $folio->permalink ?>>
						<h1 class='post-title'><?php echo $folio->title ?></h1>
					</a>
				</span>
				<?php inline_svg($folio->icon, 'icon') ?>
			</article>		
		<?php $count++; endwhile ;?>
	<?php endif ?>
		
	</div>

</div>
</div>
<?php
	get_footer();
?>