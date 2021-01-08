<?php
/**
 * WP Allow JFIF
 *
 * @package     SergeLiatko\WPAllowJfif
 * @author      Serge Liatko
 * @copyright   2021 Serge Liatko https://sergeliatko.com
 * @license     GPL-3.0+
 *
 * @wordpress-plugin
 * Plugin Name: WP Allow JFIF
 * Plugin URI:  https://github.com/sergeliatko/wp-allow-jfif.git?utm_source=wordpress&utm_medium=plugin&utm_campaign=wp-allow-jfif&utm_content=plugin-link
 * Description: Allows upload of .jfif images.
 * Version:     0.0.1
 * Author:      Serge Liatko
 * Author URI:  https://sergeliatko.com?utm_source=wordpress&utm_medium=plugin&utm_campaign=wp-allow-jfif&utm_content=author-link
 * Text Domain: wp-allow-jfif
 * License:     GPL-3.0+
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 */

// do not load this file directly
defined( 'ABSPATH' ) or die( sprintf( 'Please do not load %s directly', __FILE__ ) );

// load plugin text domain
add_action( 'plugins_loaded', function () {
	load_plugin_textdomain(
		'wp-allow-jfif',
		false,
		basename( dirname( __FILE__ ) ) . '/languages'
	);
}, 10, 0 );

//add jfif mime type to wordpress
add_filter( 'mime_types', function ( array $mimes = array() ) {
	$mimes['jfif'] = 'image/jfif+xml';

	return $mimes;
}, 10, 1 );

//allow wordpress to get jfif file extension from mime type
add_filter( 'getimagesize_mimes_to_exts', function ( array $extensions ) {
	$extensions['image/jfif+xml'] = 'jfif';

	return $extensions;
}, 10, 1 );
