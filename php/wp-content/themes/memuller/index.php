<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<h1 class='title'>
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
						<?php the_title(); ?>
					</a>
				</h1>
				<div class="content">
					<details>
						<time>
							<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
								<?php the_time(get_option('date_format')) ?>
							</a>
						</time>
						<?php $categories = get_the_category(); if($categories){ ?>
							<span class="category">
								<?php echo $categories[0]->name ; ?>	
							</span>
						<?php } ?>
					</details>
					<?php the_content('Read the rest of this entry &raquo;'); ?>	
				
				

				<hr class="clearfix" />

        <?php wp_link_pages('before=<p>&after=</p>&next_or_number=number&pagelink=page %'); ?>

				<p class="postmetadata">
					<?php edit_post_link('Edit', '', ' | '); ?>  
					<?php comments_popup_link('Share your thoughts', '1 Comment', '% Comments'); ?>
				</p>
				</div>
			</article>

		<?php endwhile; ?>

			<ul class="prevnext">
				<li><?php next_posts_link('&lt; Older Entries') ?></li>
				<li><?php previous_posts_link('Newer Entries &gt;') ?></li>
			</ul>

	<?php else : ?>

		<article class="noposts">
			<h2>404 - Content Not Found</h2>
			<p>We don't seem to be able to find the content you have requested - why not try a search below?</p>
			<?php get_search_form(); ?>
		</article>

	<?php endif; ?>


<?php get_footer(); ?>