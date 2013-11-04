<?php
/**
 * The template for displaying search forms
 *
 * @package WordPress
 * @subpackage Bloq
 * @since Bloq 1.0
 */
?>
<div class="col span_1">
	<a href="#" title="<?php esc_attr_e( 'Search', 'themelovin' ); ?>" id="iconFadeIn"><span class="pictogram">&#128269;</span></a>
</div>
<div id="overlay"></div>
<div id="searchFadeIn">
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="text" class="field" name="s" id="s" data-placeholder="<?php esc_attr_e( 'What are you looking for?', 'themelovin' ); ?>" value="<?php esc_attr_e( 'What are you looking for?', 'themelovin' ); ?>" autocomplete="off" />
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'themelovin' ); ?>" />
	</form>
</div>
