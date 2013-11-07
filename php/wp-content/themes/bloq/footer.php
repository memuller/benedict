<?php
/**
 * The Template for displaying footer.
 *
 * @package WordPress
 * @subpackage Bloq
 * @since Bloq 1.0
 */
?>
<footer class="row">
	<div class="container row">
		<div class="col span_4">
			<?php if(!function_exists('dynamic_sidebar') || dynamic_sidebar('Footer 1 Widget')) {}; ?>
		</div>
		<div class="col span_4">
			<?php if(!function_exists('dynamic_sidebar') || dynamic_sidebar('Footer 2 Widget')) {}; ?>
		</div>
		<div class="col span_4">
			<?php if(!function_exists('dynamic_sidebar') || dynamic_sidebar('Footer 3 Widget')) {}; ?>
		</div>
		<div class="clear"></div>
	</div>
</footer>
<div class="row" id="copyright">
	<div class="container row">
		<div class="col span_6">
		&copy; <?php _e('Copyright', 'themelovin') ?> <?php echo date( 'Y' ); ?> <a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>. <?php _e('Powered by', 'themelovin') ?> <a href="http://wordpress.org/">WordPress</a>. Adam by <a href="http://themelovin.com">Themelovin.</a>
		</div>
		<div class="col span_6">
			<?php echo glg_social_link(); ?>
		</div>
	</div>
</div>
<?php echo get_option('adm_tracking'); ?>
<?php wp_footer(); ?>
</body>
</html>