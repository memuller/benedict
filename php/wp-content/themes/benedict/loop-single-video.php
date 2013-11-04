<?php
/**
 * The Template for loop video blog.
 *
 * @package WordPress
 * @subpackage Bloq
 * @since Bloq 1.0
 */
 $video = get_post_meta($post->ID, 'glg_video', true);
 ?>
 <article id="post-<?php the_ID(); ?>"  <?php post_class(); ?>>
 	<?php echo glg_video_featured($video, 'blog'); ?>
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title('<h1 class="post-title">', '</h1>'); ?></a>
	<?php echo glg_entry_meta($post) ?>
	<?php the_content(); ?>
</article>