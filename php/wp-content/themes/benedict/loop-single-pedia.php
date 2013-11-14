<?php
/**
 * The Template for loop blog full.
 *
 * @package WordPress
 * @subpackage Bloq
 * @since Bloq 1.0
 */
 $pedia = new \Benedict\Post($post) ; 
 ?>
 <article id="post-<?php the_ID(); ?>"  <?php post_class();?>>
 	<?php if( $pedia->show_image && has_post_thumbnail()): ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark">
			<?php the_post_thumbnail('inner'); ?>
		</a>
	<?php endif; ?>
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title('<h1 class="post-title">', '</h1>'); ?></a>
	<div class="meta box horizontal">
		<span class="type meta">
			<?php inline_svg("/images/icons/$pedia->post_format.svg") ?>
			<span><?php _e("pedia-$pedia->post_format") ?></span>
		</span>
		<span class="date meta">
			<?php inline_svg('/images/icons/date.svg') ?>
			<span><?php echo get_the_date() ?></span>
		</span>
		<?php if (has_tag()) { ?>
			<span class="tags meta">
				<?php inline_svg('/images/icons/tag.svg') ?>
				<span class="links"><?php the_tags('', ', ', '') ?></span>
			</span>			
		<?php } ?>
	</div>
	<div style="clear: both;"></div>
	<?php
		global $more;
		$more = false;
		if(has_excerpt()){
			the_excerpt();
		} else {
			the_content('...leia mais');	
		}
		
	?>
	<div class="separator gray">
		<div class="diamond"></div>				
		<div class="line"></div>
	</div>
</article>