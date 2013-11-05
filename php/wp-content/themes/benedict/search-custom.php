<?php
/**
 * The template for displaying search forms
 *
 * @package WordPress
 * @subpackage Bloq
 * @since Bloq 1.0
 */
?>
<div class="col span_1 search">
	<a href="#" title="<?php esc_attr_e( 'Search', 'themelovin' ); ?>" id="iconFadeIn"><span class="search" style="width: 22px; height: 22px; vertical-align: middle;">
		<img src="<?php echo get_template_directory_uri() ?>/images/header-search-icon.png" alt="">
	</span></a>
</div>
<div id="overlay"></div>
<div id="searchFadeIn">
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="text" class="field" name="s" id="s" data-placeholder="<?php echo('O que está procurando?') ?>" value="<?php echo('O que está procurando?') ?>" autocomplete="off" />
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'themelovin' ); ?>" />
	</form>
</div>
