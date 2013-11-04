<?php
/**
 * The Template for portfolio quote format.
 *
 * @package WordPress
 * @subpackage Bloq
 * @since Bloq 1.0
 */
 $author = get_post_meta($post->ID, 'glg_author', true);
?>
<div class="col span_12">
	<?php the_title('<h1 class="post-title">', '</h1>'); ?>
	<?php echo glg_entry_meta($post) ?>
	<?php the_content(); ?>
	<?php echo $author; ?>
	
	<ul id="navigation">
		<li><?php previous_post_link('%link', __('<span class="pictogram post-nav">&#59225;</span> Previous', 'themelovin')); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
		<li><?php next_post_link('%link', __('<span class="pictogram post-nav">&#59226;</span> Next', 'themelovin')); ?></li>
	</ul>
</div>