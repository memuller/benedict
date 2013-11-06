<?php
/**
 * The Template for display comments.
 *
 * @package WordPress
 * @subpackage Bloq
 * @since Bloq 1.0
 */
?>
<div id="comments">
	<h1><?php printf( _n('%1$s Comment', '%1$s Comments', get_comments_number(), 'themelovin'), number_format_i18n(get_comments_number())); ?></h1>
	<?php if(post_password_required()) { ?>
		<p class="nopassword"><?php _e('This post is password protected. Enter the password to view any comments.', 'themelovin'); ?></p>
</div>
<?php
	return;
	}
if(have_comments()) {
?>
<ol class="commentlist">
		<?php wp_list_comments(array( 'callback' => 'glg_comment')); ?>
	</ol>
<?php
	}
	if (get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
?>
	<nav class="comment-navigation">
    	<?php paginate_comments_links(); ?>
    </nav>
<?php endif; ?>
</div>	
<?php comment_form(glg_edit_comment_form()); ?>