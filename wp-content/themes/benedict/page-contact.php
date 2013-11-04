<?php
/**
 * Template Name: Contact
 *
 * @package WordPress
 * @subpackage Bloq
 * @since Bloq 1.0
 */
$subtitle = get_post_meta($post->ID, 'glg_page_subtitle', true);
$form = get_option('adm_contact_form');
get_header();
?>
<section class="gmap" id="map" data-center="<?php echo get_option('adm_address'); ?>" data-zoom="15"></section>
<div id="claim">
		<div class="container row">
			<div class="col span_9">
				<?php echo $subtitle; ?>
			</div>
			<div class="col span_3">
				<h1><span class="pictogram">&#59172;</span> <?php _e('Our address', 'themelovin') ?></h1>
				<?php echo get_option('adm_address'); ?>
			</div>
		</div>
</div>
<div class="container row">
	<?php
		while (have_posts()) : the_post();
			if($form == 'enable')
				get_template_part( 'content', 'contact' );
			else
				get_template_part( 'content', 'page' );
		endwhile;
	?>
</div>
<script>
jQuery(document).ready(function(jQuery){
	jQuery('.gmap').mobileGmap();
});
</script>
<?php
	get_footer();
?>