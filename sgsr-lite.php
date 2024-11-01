<?php
/**
 * Hayat Developers
 *
 * @package     Stylish Google Sheet Reader Lite
 * @author      Hayat Developers
 * @copyright   2021 Stylish Google Sheet Reader Lite
 * @license     GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name: Stylish Google Sheet Reader Lite 
 
 * Description: Create automatically updatable, responsive and modern designed sortable tables from google sheets. Add tables to web pages and posts in seconds with Stylish Google Sheet Reader Lite. Best WP google sheet viewer plugin.

 * Version:     4.0
 * Author:      Hayat Developers | Stylish Google Sheet Reader Lite - Made for Google Sheets
 * Author URI:  https://wppluginbox.com
 * Text Domain: Stylish Google Sheet Reader Lite 
 * License:     GPL v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

include __DIR__.'/functions-admin.php';
include __DIR__.'/functions-wp.php';

$short_code = 'sgsr-table';
$SGSR_PLUG_WEB = $_SERVER['HTTP_HOST'];

register_activation_hook(__File__, 'SGSR_createDB');
register_deactivation_hook(__FILE__, 'SGSR_DELDB');

add_action( 'admin_enqueue_scripts', 'SGSR_CSSJS' ,111);

add_action('admin_menu', 'SGSR_menu');
add_action('wp_enqueue_scripts', 'SGSR_scripts',111);

add_action('wp_ajax_sgsr_get_project_details', 'sgsr_get_project_details_ajax_handler');
add_action('wp_ajax_nopriv_sgsr_get_project_details', 'sgsr_get_project_details_ajax_handler'); // for non-logged in users



$web_url =  $_SERVER['REQUEST_URI'];
$filter_w = 'wp-admin';
if(strpos($web_url, $filter_w) !== false){return 0;} else {
add_shortcode($short_code, 'sgsr_render_table');
}?>