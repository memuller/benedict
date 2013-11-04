<?php
/**
 * The Template for displaying search results.
 *
 * @package WordPress
 * @subpackage Bloq
 * @since Bloq 1.0
 */
get_header();
?>
<div id="claim" class="big"; ?>
	<div class="container row">
		<?php printf(__('Search Results for: %s', 'themelovin' ), get_search_query()); ?>
	</div>
</div>
<div class="container row">
	<?php
		if (have_posts()) :
			while (have_posts()) : the_post();
				get_template_part('loop', 'search');
			endwhile;
		else :
	?>
	<article id="post-0" class="post no-results not-found">
		<?php
			_e('<h1 class="post-title">Sorry, but nothing matched your search criteria. Please try again.</h1>', 'themelovin');
		?>
	</article>
	<?php
		endif;
	?>
</div>
<?php
	get_footer();
?>