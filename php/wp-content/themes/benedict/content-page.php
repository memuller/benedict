<?php
/**
 * The Template for pages.
 *
 * @package WordPress
 * @subpackage Bloq
 * @since Bloq 1.0
 */
?>
<?php the_title('<h1 class="page-title">', '</h1>'); ?>
<?php the_content(); ?>
<?php wp_link_pages(); ?>