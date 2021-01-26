<?php
/*
Plugin Name:       VideoLength Grabber
Description:       A ClassicPress plugin that grabs a video duration and inject it into a meta field in the post editor.
Plugin URI:        https://forums.classicpress.net/u/Horlaes
Contributors:      Devsrealm
Author:            Devsrealm
Author URI:        https://github.com/devsrealm/
Donate link:       https://devsrealm.com
Tags:              videolength, quote field
Version:           1.0
Stable tag:        1.0
Requires at least: 3.5
Tested up to:      4.9
Text Domain:       videolength
Domain Path:       /languages
License:           GPL v2 or later
License URI:       https://www.gnu.org/licenses/gpl-2.0.txt

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version
2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
with this program. If not, visit: https://www.gnu.org/licenses/
*/

// exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

// if admin area
if ( is_admin() ) {
    // include dependencies
    require_once plugin_dir_path( __FILE__ ) . 'includes/fields.php';

}

// enqueue public style
function videolength_enqueue_style_public() {

	if ( is_single() ) {

	$src = plugin_dir_url( __FILE__ ) .'public/css/styles.css';

	wp_enqueue_style( 'videolength', $src, array(), null, 'all' );

	}

}
add_action( 'wp_enqueue_scripts', 'videolength_enqueue_style_public' );


// enqueue style
function videolength_css_admin( $hook ) {

	// wp_die( $hook );

		$src = plugin_dir_url( __FILE__ ) .'admin/css/styles.css';
        $script = plugin_dir_url( __FILE__ ) .'admin/js/script.js';

		wp_enqueue_style( 'videolength', $src, array(), null, 'all' );
		wp_enqueue_script( 'videolength', $script, array(), false, true);


}
add_action( 'admin_enqueue_scripts', 'videolength_css_admin' );






