<?php
/**
 * The Template for displaying archive page.
 *
 * @package WordPress
 * @subpackage Bloq
 * @since Bloq 1.0
 */
get_header();
?>
<div id="claim" class='big'>
	<div class="container row">
		<?php if ( is_day() ) : ?>
			<?php printf( __('Daily Archives: %s', 'themelovin'), get_the_date()); ?>
		<?php elseif ( is_month() ) : ?>
			<?php printf( __('Monthly Archives: %s', 'themelovin'), get_the_date( _x( 'F Y', 'monthly archives date format', 'themelovin'))); ?>
		<?php elseif ( is_year() ) : ?>
			<?php printf( __('Yearly Archives: %s', 'themelovin'), get_the_date( _x( 'Y', 'yearly archives date format', 'themelovin'))); ?>
		<?php else : ?>
			tag: <em><?php echo $GLOBALS['tag']; ?></em>
		<?php endif; ?>
	</div>
</div>
<div class="container row">
<?php
	if(have_posts()):
		while (have_posts()) : the_post();
			$format = get_post_format();
			if($format == 'quote') :
				get_template_part('loop', 'single-quote');
			elseif($format == 'link'):
				get_template_part('loop', 'single-link');
			elseif($format == 'video'):
				get_template_part('loop', 'single-video');
			else :
				get_template_part('loop', 'single-blog');
			endif;
		endwhile;
	endif;
	posts_nav_link(' | ', '<span class="pictogram post-nav">&#59225;</span> previous page', 'next page <span class="pictogram post-nav">&#59226;</span>');
?>
</div>
<?php get_footer(); ?>