<?php
/**
 * The Template for single post.
 *
 * @package WordPress
 * @subpackage Bloq
 * @since Bloq 1.0
 */
get_header();
$format = get_post_format();
if($format === false ) $format = 'standard';
$header = get_post_meta( $post->ID, 'image_header', true) == 1 ? 'image' : 'big' ;
echo glg_post_header($post->ID);
?>
<?php if ( get_the('claim') ): ?>
	<div id="claim" <?php if($header != 'image') echo "class='big'"; ?>>
		<div class="container row">
			<?php echo get_the('claim') ?>
		</div>
	</div>	
<?php endif ?>

<div class="container row">
	<?php
		while (have_posts()) : the_post();
			get_template_part('content-single', $format);
		endwhile;
	?>
</div>
<div class="col holder" style="width: 100%; height: 100%; background-color: red;"></div>
<?php get_footer(); ?>