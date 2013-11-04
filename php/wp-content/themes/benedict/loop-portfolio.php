<?php
/**
 * The Template for loop portfolio.
 *
 * @package WordPress
 * @subpackage Bloq
 * @since Bloq 1.0
 */
 $format = get_post_format();
?>
<article id="post-<?php the_ID(); ?>"  <?php post_class(); ?>>
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark" class="img"><?php the_post_thumbnail('square'); ?></a>
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark">
		<div class="caption">
			<?php glg_truncate_title($post, 50); ?>
			<?php
				switch ($format) {
					case 'video':
			?>
				<span class="pictogram">&#127916;</span>
			<?php
				break;
				case 'quote':
			?>
				<span class="pictogram">&#10078;</span>
			<?php
				break;
				case 'gallery':
			?>
				<span class="pictogram">&#127748;</span>
			<?php
				break;
				case 'link':
			?>
				<span class="pictogram">&#128279;</span>
			<?php
				break;
				default:
			?>
				<span class="pictogram">&#128240;</span>
			<?php
				}
			?>
		</div>
	</a>
</article>