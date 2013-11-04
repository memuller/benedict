<?php
/**
 * The Template for 404 pages.
 *
 * @package WordPress
 * @subpackage Bloq
 * @since Bloq 1.0
 */
get_header();
?>
<div id="claim" class="big">
	<div class="container row">
		<?php _e( 'It&rsquo;s looking like you may have taken a wrong turn.<br/>Don&rsquo;t worry... it happens to the best of us.', 'themelovin' ); ?>
	</div>
</div>
<div class="container row">
	<?php _e( '<h1>404', 'themelovin</h1>' ); ?>
</div>
<?php get_footer(); ?>