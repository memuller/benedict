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
<div id="portfolios">
<?php
	$wp_query = new WP_Query();
		$num = get_option('adm_port_items');
		$wp_query->query('showposts='.$num.'&post_type=portfolio');
		while ($wp_query->have_posts()) : $wp_query->the_post(); 
			get_template_part('loop', 'portfolio');
		endwhile;
		wp_reset_query();
?>
</div>
<div class="container row">
	<?php the_content(); ?>
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