<?php
/**
 * Core plugin functionality for Author Write.
 *
 * @package Author_Write
 */

namespace Author_Write;

use function add_action;
use function add_shortcode;
use function plugins_url;
use function trailingslashit;
use function wp_enqueue_script;
use function wp_enqueue_style;
use function wp_register_script;
use function wp_register_style;

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
		add_action( 'wp_enqueue_scripts', [ $this, 'register_assets' ] );
	}

	/**
	 * Register the [author_write] shortcode.
	 */
	public function register_shortcode(): void {
		add_shortcode( 'author_write', [ $this, 'render_shortcode' ] );
	}

	/**
	 * Register front-end assets.
	 */
	public function register_assets(): void {
		wp_register_style(
			'author_write-ui',
			plugins_url( 'assets/css/author_write.css', AUTHOR_WRITE_PLUGIN_FILE ),
			[],
			AUTHOR_WRITE_VERSION
		);

		wp_register_script(
			'author_write-ui',
			plugins_url( 'assets/js/author_write.js', AUTHOR_WRITE_PLUGIN_FILE ),
			[],
			AUTHOR_WRITE_VERSION,
			true
		);
	}

	/**
	 * Render the shortcode markup.
	 */
	public function render_shortcode(): string {
		ob_start();

		wp_enqueue_style( 'author_write-ui' );
		wp_enqueue_script( 'author_write-ui' );

		$template = trailingslashit( AUTHOR_WRITE_PLUGIN_DIR ) . 'templates/shortcode.php';

		if ( file_exists( $template ) ) {
			include $template;
		}

		return (string) ob_get_clean();
	}
}
