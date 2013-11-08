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
		Buscando por: <?php echo get_search_query(); ?>
	</div>
</div>
<div class="container row">
	<?php
		if (have_posts()) || false :
			while (have_posts()) : the_post();
				get_template_part('loop', 'search');
			endwhile;
		else :
	?>
	<article id="post-0" class="post no-results not-found">
		<h1 class="post-title">
			Não encontramos nada parecido com o que procurou.
		</h1>
	</article>
	<?php endif ?>
</div>
<?php
	get_footer();
?>