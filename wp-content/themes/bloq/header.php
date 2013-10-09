<?php
/**
 * The Template for displaying site head.
 *
 * @package WordPress
 * @subpackage Bloq
 * @since Bloq 1.0
 */
?>
<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
	<!--[if ie]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="description" content="">  
	<meta name="keywords" content="" />
	<meta name="author" content="Themelovin" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	
	<title><?php bloginfo('name'); ?> | <?php bloginfo('description') ?> <?php wp_title(); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	
	<?php if(get_option('adm_favicon')) { ?>
		<link rel="shortcut icon" href="<?php echo get_option('adm_favicon'); ?>" />
	<?php } ?>
	<?php if(get_option('adm_touch_icon')) { ?>
		<link rel="apple-touch-icon-precomposed" href="<?php echo get_option('adm_touch_icon'); ?>" />
	<?php } ?>
	
	<!-- RSS & Pingbacks -->
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<?php wp_head(); ?>
</head>
<body  <?php body_class(); ?>>
<div class="container row">
	<div class="col span_12">
		<a href="#" id="menu-icon">menu</a>
	</div>
</div>
<?php wp_nav_menu(array('theme_location' => 'header-menu', 'sort_column' => 'menu_order', 'container'=> 'nav', 'container_class' => 'menu-mobile', 'menu_class' => 'primary-menu',  'fallback_cb' => false, 'depth' => 2)); ?>
<div class="container row">
	<header id="primary-header">
		<div class="col span_3">
			<a href="<?php echo home_url() ?>" title="<?php bloginfo('name') ?>" id="logo-link">
			<?php if(!get_option('adm_sitelogo')) {
				bloginfo('name');
			} else { ?>
				<img src="<?php echo get_option('adm_sitelogo') ?>" alt="<?php bloginfo('name') ?>" />
			<?php } ?>
			</a>
		</div>
		<?php
			wp_nav_menu(array('theme_location' => 'header-menu', 'sort_column' => 'menu_order', 'container'=> 'nav', 'container_class' => 'col span_8', 'menu_class' => 'primary-menu',  'fallback_cb' => false, 'depth' => 2));
			get_template_part('search', 'custom');
		?>
		<div class="clear"></div>
	</header>
</div>