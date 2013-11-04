<?php
/**
 * The Template for loop search.
 *
 * @package WordPress
 * @subpackage Bloq
 * @since Bloq 1.0
 */
?>
<article id="post-<?php the_ID(); ?>"  <?php post_class('search') ?>>
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title('<h1 class="post-title">', '</h1>'); ?></a>
	<?php the_excerpt(); ?>
</article>