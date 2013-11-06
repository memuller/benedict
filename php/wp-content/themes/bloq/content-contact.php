<?php
/**
 * The Template for big contact page.
 *
 * @package WordPress
 * @subpackage Bloq
 * @since Bloq 1.0
 */
?>
<?php the_title('<h1 class="page-title">', '</h1>'); ?>
<?php the_content(); ?>
	
<div id="loading"></div>
<form action="<?php the_permalink(); ?>" id="contactForm" method="post">
	<ul>
		<li>
			<label for="contactName"><?php _e('Name', 'themelovin'); ?><sup>*</sup></label>
			<input type="text" name="contactName" id="contactName" value="" class="required" />
		</li>
		<li>
			<label for="email"><?php _e('Email', 'themelovin'); ?><sup>*</sup></label>
			<input type="text" name="email" id="email" value="" />
		</li>
		<li>
			<label for="commentsText"><?php _e('Message', 'themelovin'); ?><sup>*</sup></label>
			<textarea name="commentsText" id="commentsText" rows="10"></textarea>
		</li>
		<li>
			<input type="submit" value="<?php _e('Send mail', 'themelovin'); ?>" />
		</li>
	</ul>
	<input type="hidden" name="submitted" id="submitted" value="true" />
</form>
<div id="messages"></div>
