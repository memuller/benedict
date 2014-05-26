<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<title><?php wp_title('&laquo;', true, 'right'); bloginfo( 'name' ); ?></title>
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<link href='http://fonts.googleapis.com/css?family=Ubuntu+Mono:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,400italic,500,500italic' rel='stylesheet' type='text/css'>
		<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php if (!is_admin()) { wp_enqueue_script('html5_shim',  get_template_directory_uri() . '/html5.js'); } ?>
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>

	  <div id="wrapper">

  		<header>
  			<h1>
				<a href="<?php echo home_url(); ?>/">memuller<span class='section'>();</span>
				</a>
			</h1>
  		</header>

  		<section>
