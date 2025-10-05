<?php
/**
 * Plugin Name:       Author Write
 * Plugin URI:        https://example.com/author-write
 * Description:       AI-assisted writing companion with specialized creative modes.
 * Version:           0.0.0
 * Requires at least: 6.5
 * Requires PHP:      8.0
 * Author:            Author Write
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       author-write
 * Domain Path:       /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'AUTHOR_WRITE_VERSION', '0.0.0' );
define( 'AUTHOR_WRITE_PLUGIN_FILE', __FILE__ );
define( 'AUTHOR_WRITE_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
require_once AUTHOR_WRITE_PLUGIN_DIR . 'includes/class-author-write.php';

/**
 * Bootstrap the plugin.
 */
function author_write_bootstrap() {
    $plugin = new Author_Write\Plugin();
    $plugin->register_hooks();
}
add_action( 'plugins_loaded', 'author_write_bootstrap' );
