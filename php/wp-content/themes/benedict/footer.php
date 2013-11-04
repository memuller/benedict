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

		<div class="col span_6" style="width: 20%;">
		<img src="<?php echo get_stylesheet_directory_uri() ?>/images/benedict_symbol_white.png" alt="" width='50px'>
		</div>
		<div class="credits">
			&copy; 2013 Benedict' Brand Crafters. <em> Powered by <a href="http://wordpress.org/"> Wordpress </a>. </em>
		</div>
	</div>
</div>
<?php echo get_option('adm_tracking'); ?>
<?php wp_footer(); ?>
</body>
</html>