<?php
/**
 * The Template for portfolio video format.
 *
 * @package WordPress
 * @subpackage Bloq
 * @since Bloq 1.0
 */
 $video = get_post_meta($post->ID, 'glg_video', true);
?>
<div class="col span_12">
	<?php the_title('<h1 class="post-title">', '</h1>'); ?>
	<?php echo glg_entry_meta($post) ?>
	<?php echo glg_video_featured($video, 'portfolio'); ?>
	<?php the_content(); ?>
	
	<ul id="navigation">
		<li><?php previous_post_link('%link', __('<span class="pictogram post-nav">&#59225;</span> Previous', 'themelovin')); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
		<li><?php next_post_link('%link', __('<span class="pictogram post-nav">&#59226;</span> Next', 'themelovin')); ?></li>
	</ul>
</div>