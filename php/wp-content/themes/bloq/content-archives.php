<?php
/**
 * The Template for archives.
 *
 * @package WordPress
 * @subpackage Bloq
 * @since Bloq 1.0
 */
?>
<?php the_title('<h1 class="page-title">', '</h1>'); ?>
<?php the_content(); ?>
<h5 class="archive-title"><?php _e('LAST 30 POSTS', 'themelovin') ?></h5>
<ul class="archives">
	<?php
		$archive_30 = get_posts('numberposts=30');
		foreach($archive_30 as $post) :
	?>
	<li><a href="<?php the_permalink(); ?>"><?php the_title();?></a></li>
	<?php endforeach; ?>
</ul>
		
<h5 class="archive-title"><?php _e('ARCHIVES BY MONTH', 'themelovin') ?></h5>	
<ul class="archives">
	<?php wp_get_archives('type=monthly'); ?>
</ul>
			
<h5 class="archive-title"><?php _e('ARCHIVES BY SUBJECT', 'themelovin') ?></h5>	
	<ul class="archives">
		<?php wp_list_categories( 'title_li=' ); ?>
	</ul>