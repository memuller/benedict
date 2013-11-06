<?php
/**
 * The Template for portfolio standard format.
 *
 * @package WordPress
 * @subpackage Bloq
 * @since Bloq 1.0
 */
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
		<?php the_content(); ?>
	</article>
</div>