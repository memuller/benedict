<?php

add_filter ( 'pre_option_home', 'test_localhosts' );
add_filter ( 'pre_option_siteurl', 'test_localhosts' );
function test_localhosts( ) {
  /* DB URL is set with SetEnv in Apache https://github.com/mhoofman/wordpress-heroku#linux-or-manual-apache-config */

 if (preg_match('/localhost/',$_SERVER['DATABASE_URL'])) {
    preg_match('/(.*)\/wp-.*\/(\w*\.php)+$/', $_SERVER['REQUEST_URI'], $path);
   return ("http://" . $_SERVER['SERVER_ADDR'] . $path[1]);
  }

  else return false; // act as normal; will pull main site info from db
}


if( !defined('PG4WP_ROOT'))
{
// You can choose the driver to load here
define('DB_DRIVER', 'mysql'); // 'pgsql' or 'mysql' are supported for now

// Set this to 'true' and check that `pg4wp` is writable if you want debug logs to be written
define( 'PG4WP_DEBUG', false);
// If you just want to log queries that generate errors, leave PG4WP_DEBUG to "false"
// and set this to true
define( 'PG4WP_LOG_ERRORS', false);

// If you want to allow insecure configuration (from the author point of view) to work with PG4WP,
// change this to true
define( 'PG4WP_INSECURE', true);

// This defines the directory where PG4WP files are loaded from
//   2 places checked : wp-content and wp-content/plugins
if( file_exists( ABSPATH.'/wp-content/pg4wp'))
	define( 'PG4WP_ROOT', ABSPATH.'/wp-content/pg4wp');
else
	define( 'PG4WP_ROOT', ABSPATH.'/wp-content/plugins/pg4wp');

// Here happens all the magic
require_once( PG4WP_ROOT.'/core.php');
} // Protection against multiple loading
