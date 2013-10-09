<?php
/**
 * Template Name: Blog full width
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
<div id="claim" <?php if($header == 'simple') echo "class='big'"; ?>>
	<div class="container row">
		<?php echo $subtitle; ?>
	</div>
</div>
<?php else: ?>
<div id="spacer" <?php if($header == 'simple') echo "class='big'"; ?>></div>
<?php endif; ?>
<div class="container row">
	<?php
		$temp = $wp_query; 
		$wp_query = null; 
		$wp_query = new WP_Query(); 
		$num = get_option('posts_per_page');
		$wp_query->query('showposts='.$num.'&paged='.$paged); 

		while ($wp_query->have_posts()) : $wp_query->the_post(); 
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
		endwhile;
		?>
		<nav id="navigation">
		<?php
			posts_nav_link('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', '<span class="pictogram post-nav">&#59225;</span> Previous page', '<span class="pictogram post-nav">&#59226;</span> Next page');
		?>
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