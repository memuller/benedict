<?php
/**
 * The Template for loop blog.
 *
 * @package WordPress
 * @subpackage Bloq
 * @since Bloq 1.0
 */
 ?>
 <article id="post-<?php the_ID(); ?>"  <?php post_class(); ?>>
 	<?php if(has_post_thumbnail()): ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark">
			<?php the_post_thumbnail('inner-blog'); ?>
		</a>
	<?php endif; ?>
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title('<h1 class="post-title">', '</h1>'); ?></a>
	<?php echo glg_entry_meta($post) ?>
	<?php the_content(); ?>
</article>