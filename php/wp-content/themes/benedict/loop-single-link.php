<?php
/**
 * The Template for loop link blog.
 *
 * @package WordPress
 * @subpackage Bloq
 * @since Bloq 1.0
 */
 $url = glg_addhttp(get_post_meta($post->ID, 'glg_link', true));
 ?>
 <article id="post-<?php the_ID(); ?>"  <?php post_class(); ?>>
 	<span class="pictogram">&#128279;</span>
	<a href="<?php echo $url['url']; ?>" title="<?php the_title(); ?>" target="_blank"><?php the_content(); ?></a>
	<?php echo $url['domain'] ?>
</article>