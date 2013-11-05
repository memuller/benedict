<?php
/**
 * Template Name: Home
 *
 * @package WordPress
 * @subpackage Bloq
 * @since Bloq 1.0
 */
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

<div class="container row list">
	<div class="title">
		<div class="col left line"></div>
		<div class="col diamond left"></div>
		<div class="col center"><img src="<?php echo get_template_directory_uri().'/images/icons/board-g.png'; ?>" alt=""></div>
		<div class="col diamond right"></div>
		<div class="col right line"></div>
	</div>

	<?php $paged = $page; ?>
	<?php $paged = isset($paged) && $paged != 0 ? $paged : 1 ?>
	<?php $posts = get_posts(array('paged' => $paged, 'posts_per_page' => get_option('posts_per_page'))); ?>
	<?php foreach ($posts as $post){ setup_postdata( $post );
			$format = get_post_format();
			if($format == 'quote') :
				get_template_part('loop', 'single-quote');
			elseif($format == 'link'):
				get_template_part('loop', 'single-link');
			elseif($format == 'video'):
				get_template_part('loop', 'single-video');
			else :
				get_template_part('loop', 'single-blog');
			endif;	
	} ?>
	<nav id="navigation">
		<a href="<?php echo home_url("page/").strval($paged+1) ?>" class="next nav">antigos</a>
		<?php if(isset($paged) && $paged > 1): ?>
			<a href="<?php echo home_url("page/").strval($paged-1) ?>" class="previous nav">recentes</a>
		<?php endif; ?>
	</nav>
</div>
<script type="text/javascript">
      jQuery('.flexslider').flexslider({
        animation: "fade",
        directionNav: false,
        controlNav: true
      });
</script>
<?php
	get_footer();
?>