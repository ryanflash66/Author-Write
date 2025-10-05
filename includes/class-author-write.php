<?php
/**
 * Core plugin functionality for Author Write.
 *
 * @package Author_Write
 */

namespace Author_Write;

use function add_action;
use function add_shortcode;
use function trailingslashit;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Main plugin loader class.
 */
class Plugin {

    /**
     * Register WordPress hooks.
     */
    public function register_hooks(): void {
    add_action( 'init', [ $this, 'register_shortcode' ] );
    }

    /**
     * Register the [author_write] shortcode.
     */
    public function register_shortcode(): void {
    add_shortcode( 'author_write', [ $this, 'render_shortcode' ] );
    }

    /**
     * Render the shortcode markup.
     */
    public function render_shortcode(): string {
        ob_start();

    $template = trailingslashit( AUTHOR_WRITE_PLUGIN_DIR ) . 'templates/shortcode.php';

        if ( file_exists( $template ) ) {
            include $template;
        }

        return (string) ob_get_clean();
    }
}
