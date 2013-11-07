<?php
/**
 * The Template for loop blog full.
 *
 * @package WordPress
 * @subpackage Bloq
 * @since Bloq 1.0
 */
 $board = new \Benedict\Post($post) ; 
 ?>
 <article id="post-<?php the_ID(); ?>"  <?php post_class();?>>
 	<?php if(has_post_thumbnail()): ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark">
			<?php the_post_thumbnail('inner'); ?>
		</a>
	<?php endif; ?>
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title('<h1 class="post-title">', '</h1>'); ?></a>
	<div class="meta box horizontal">
		<span class="author meta">
			<?php $crafter = new Benedict\Crafter($post->post_author); $person = new Benedict\Pedia($crafter->person); ?>
			<img src="<?php echo $person->icon ?>" alt="" class="svg icon">
			<span><a href="<?php echo $person->permalink ?>"><?php the_author() ?></a></span>
		</span>
		<span class="date meta">
			<img src="<?php echo get_template_directory_uri().'/images/icons/date.svg' ?>" alt="" class="svg icon">
			<span><?php the_date() ?></span>
		</span>
		<?php if (has_tag()) { ?>
			<span class="tags meta">
				<img src="<?php echo get_template_directory_uri().'/images/icons/tag.svg' ?>" alt="" class="svg icon">
				<span class="links"><?php the_tags('', ', ', '') ?></span>
			</span>			
		<?php } ?>
	</div>
	<div style="clear: both;"></div>
	<?php
		global $more;
		$more = false;
		the_content('...leia mais');
	?>
	<div class="separator gray">
		<div class="diamond"></div>				
		<div class="line"></div>
	</div>
</article>