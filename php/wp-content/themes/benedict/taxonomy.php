<?php
/**
 * The Template for displaying Skills.
 *
 * @package WordPress
 * @subpackage Bloq
 * @since Bloq 1.0
 */
$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
get_header();
?>
<div id="claim" class='big'>
	<div class="container row">
		<?php _e('All posts in ', 'themelovin'); echo $term->name; ?>
	</div>
</div>
<div id="portfolios">
	<?php
		$args = array(
			'post-type' => 'portfolio',
			'skill' => $term->slug,
			'posts_per_page' => -1 
		);
		$query = new WP_Query($args);
		if (have_posts()) :
		while ($query->have_posts()) : $query->the_post();
			get_template_part('loop', 'portfolio');
		endwhile;
		endif;
	?>
</div>
<?php get_footer(); ?>