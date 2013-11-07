<?php
/**
 * The Template for loop quote blog.
 *
 * @package WordPress
 * @subpackage Bloq
 * @since Bloq 1.0
 */
 $author = get_post_meta($post->ID, 'glg_author', true);
 ?>
 <article id="post-<?php the_ID(); ?>"  <?php post_class(); ?>>
 	<span class="pictogram">&#10078;</span>
	<?php the_content(); ?>
	<?php echo $author; ?>
</article>