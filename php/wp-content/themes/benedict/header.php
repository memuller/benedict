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
	
	<!-- Google Fonts -->
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Overlock+SC|Bitter:400,400italic,700" media="screen">

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
		<div class="col span_3" style="line-height: 0;">
			<a href="<?php echo home_url() ?>" title="<?php bloginfo('name') ?>" id="logo-link">
				<img src="<?php echo get_template_directory_uri().'/images/benedict_logo.png'; ?>" alt="<?php bloginfo('name') ?>" />
			</a>
		</div>
		<?php global $current_section ;  ?>
		<nav class="col span_8">
			<ul class="primary-menu sf-js-enabled" id="menu">
				<?php foreach (array('board', 'pedia', 'folio') as $section): ?>
					<li class="menu-item
						 <?php if($GLOBALS['current_section'] == $section) echo 'selected'; ?>
						 <?php echo $section ; ?>
						">
						<a href="<?php echo $section == 'board' ? '' : '/'.$section ?>"><?php echo $section ?></a>
					</li>
				<?php endforeach ?>
			</ul>
		</nav>
		<?php get_template_part('search', 'custom'); ?>
		<div class="clear"></div>
	</header>
</div>
<div id="main">