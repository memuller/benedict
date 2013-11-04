<?php
/**
 * The Template for portfolio link format.
 *
 * @package WordPress
 * @subpackage Bloq
 * @since Bloq 1.0
 */
 $url = glg_addhttp(get_post_meta($post->ID, 'glg_link', true));
?>
<aside class="col span_3 side">
	<?php the_title('<h1 class="post-title">', '</h1>'); ?>
	<?php echo glg_entry_meta($post) ?>
	<?php echo wpautop(get_post_meta($post->ID, 'glg_port_sidebar', true)); ?>
	
	<ul id="navigation">
		<li><?php previous_post_link('%link', __('<span class="pictogram post-nav">&#59225;</span> Previous', 'themelovin')); ?></li>
		<li><?php next_post_link('%link', __('<span class="pictogram post-nav">&#59226;</span> Next', 'themelovin')); ?></li>
	</ul>
</aside>
<div class="col span_9 side">
	<article>
		<a href="<?php echo $url['url']; ?>" title="<?php the_title(); ?>" target="_blank"><?php the_content(); ?></a>
		<?php echo $url['domain'] ?>
	</article>
</div>