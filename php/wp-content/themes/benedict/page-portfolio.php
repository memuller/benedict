<?php
/**
 * Template Name: Portfolio
 *
 * @package WordPress
 * @subpackage Bloq
 * @since Bloq 1.0
 */
$subtitle = get_post_meta($post->ID, 'glg_page_subtitle', true);
$header = '';
get_header();
$slider = glg_header_slider($post->ID, 'portfolio');
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
<?php endif; ?>
<div class="container row">
	<?php
		while (have_posts()) : the_post();
			get_template_part( 'content', 'page' );
		endwhile;
	?>
</div>
<div id="portfolios">
	<?php
		$wp_query = new WP_Query();
		$num = -1;
		$wp_query->query('showposts='.$num.'&post_type=portfolio');
		while ($wp_query->have_posts()) : $wp_query->the_post(); 
			get_template_part('loop', 'portfolio');
		endwhile;
	?>
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