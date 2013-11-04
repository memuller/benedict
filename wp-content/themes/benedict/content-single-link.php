<?php
/**
 * The Template for standard post format.
 *
 * @package WordPress
 * @subpackage Bloq
 * @since Bloq 1.0
 */
 $url = glg_addhttp(get_post_meta($post->ID, 'glg_link', true));
?>
<div class="col span_9">
	<article>
		<?php the_title('<h1 class="post-title">', '</h1>'); ?>
		<?php echo glg_entry_meta($post) ?>
		<a href="<?php echo $url['url']; ?>" title="<?php the_title(); ?>" target="_blank"><?php the_content(); ?></a>
		<?php echo $url['domain'] ?>
		<ul id="navigation">
			<li><?php previous_post_link('%link', __('<span class="pictogram post-nav">&#59225;</span> Previous', 'themelovin')); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
			<li><?php next_post_link('%link', __('<span class="pictogram post-nav">&#59226;</span> Next', 'themelovin')); ?></li>
		</ul>
	</article>
	<?php comments_template(); ?>
</div>
<aside class="col span_3">
	<?php if(!function_exists('dynamic_sidebar') || dynamic_sidebar('Blog Widget')) {}; ?>
</aside>