<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
				
				<h2><?php the_title(); ?></h2>
				<details>
					<time><?php the_time(get_option('date_format')) ?></time>
					<span class="category"><?php the_category(', ');?></span> 
					<span class="post_tags"><?php the_tags('', ', ' ,  ''); ?></span>
				</details>
				
				<?php the_content(); ?>

				<hr class="clearfix" />

        <?php wp_link_pages('before=<p class="pagination">&after=</p>&next_or_number=number&pagelink=page %'); ?>
				<?php edit_post_link('Edit', '<p>', '</p>'); ?>
				
				<hr class="clearfix" />
				
			</article>

			<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

	<?php endif; ?>

<?php get_footer(); ?>
