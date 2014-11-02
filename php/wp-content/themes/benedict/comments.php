<div id="social">
	<div class="meta box horizontal sharing">
		<?php echo sharing_display(); ?>
			<span class="share meta">
			<?php inline_svg('/images/icons/share.svg', 'icon')  ?>
			<span>Compartilhe</span>
		</span>
	</div>
	<div class="fb-comments" data-href="<?php the_permalink() ?>" data-num-posts="4" data-width="700" data-colorscheme="light" data-mobile="false">
	</div>
</div>