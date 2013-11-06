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

<div class="container row list folio">
	<div class="title">
		<div class="col left line"></div>
		<div class="col diamond left"></div>
		<div class="col center"><img src="<?php echo get_template_directory_uri().'/images/icons/folio-g.png'; ?>" alt=""></div>
		<div class="col diamond right"></div>
		<div class="col right line"></div>
	</div>
	
	<div id="portfolios">
	<?php if(have_posts()): $count = 1 ; ?> 
		<?php while(have_posts()): the_post(); $folio = new Benedict\Folio(); ?>
			<article id="post-<?php the_ID(); ?>"  <?php post_class(
				$count % 4 == 0 || $count == sizeof($posts) ? 'bordered' : '' 
			); ?>>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark" class="img">
					<img src="<?php echo $folio->icon; ?>" 
						<?php if(strpos($folio->icon, '.svg') != -1) echo ' class="svg" ' ; ?>
					>
				</a>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark">
				<div class="caption">
					<?php echo get_the_title() ?>
				</div>
				</a>
			</article>	
		<?php $count++; endwhile ;?>
	<?php endif ?>
		
	</div>

</div>
<?php
	get_footer();
?>