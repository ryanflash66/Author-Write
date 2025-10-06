# Author Write

**AI-powered writing companion for WordPress with specialized creative modes.**

Author Write is a WordPress plugin that embeds an AI chatbot to support creative writing workflows. Use the `[author_write]` shortcode to add focused writing assistance anywhere on your site with three specialized modes: Review, Character Development, and Plot Generation.

## Features

- **Three Specialized Modes:**
  - **Review** — Constructive critique of prose (style, pacing, grammar, emotional impact)
  - **Character Development** — Structured character profiles and arc development
  - **Plot Generation** — Story outlines, conflicts, and scene structures
- **Focused UI** — Selecting a mode hides the others until reset to maintain concentration
- **Transcript Export** — Download conversation history as `.txt` files
- **Save to Draft** — Store transcripts as WordPress draft posts
- **Usage Tracking** — Admin dashboard for monitoring mode usage

## Prerequisites

Before you begin, ensure you have:

- **Docker Desktop** (latest stable release)
- **Node.js 20+** (for the `@wordpress/env` tool)
- **Git** for version control
- **WordPress 6.5+** and **PHP 8.0+**

## Local Development Setup

This plugin uses [`@wordpress/env`](https://developer.wordpress.org/block-editor/reference-guides/packages/packages-env/) for a consistent local WordPress environment.

### Quick Start

1. **Install the WordPress environment tool:**
   ```bash
   npm install -g @wordpress/env
   ```

2. **Clone the repository:**
   ```bash
   git clone https://github.com/ryanflash66/Author-Write.git
   cd Author-Write
   ```

3. **Start the WordPress environment:**
   ```bash
   wp-env start
   ```

4. **Access WordPress:**
   - Site: `http://localhost:8888`
   - Admin: `http://localhost:8888/wp-admin`
   - Credentials: `admin` / `password`

5. **Activate the plugin:**
   - Navigate to **Plugins** in WP Admin
   - Find "Author Write" and click **Activate**

6. **Stop the environment when finished:**
   ```bash
   wp-env stop
   ```

For detailed environment configuration, see [`docs/local-development.md`](docs/local-development.md).

## Configuration

### API Key Setup (Server-Side Only)

**Important:** API credentials must remain server-side and never be exposed to the browser.

The plugin routes chat traffic through the WordPress REST endpoint `author_write/v1/chat`. Configure your AI provider credentials in PHP:

1. Add your API key to `wp-config.php` or use WordPress constants:
   ```php
   define( 'AUTHOR_WRITE_API_KEY', 'your-api-key-here' );
   ```

2. Or use environment variables in your hosting setup (recommended for production)

**Note:** Detailed AI provider configuration is planned for future releases.

## Usage

### Adding the Chatbot to Your Site

1. **Create or edit a post/page** in WordPress
2. **Add the shortcode:**
   ```
   [author_write]
   ```
3. **Publish or preview** the page to see the chat interface

### Using the Chat Interface

1. **Select a mode** — Click Review, Character Development, or Plot Generation
2. **Start chatting** — Type your message and press send
3. **Export transcript** — Click the Export button to download a `.txt` file
4. **Save to Draft** — Store the conversation as a WordPress draft post
5. **Reset** — Return to mode selection to switch modes

## Manual Verification Steps

After setup, verify the plugin is working:

1. **Start the environment:**
   ```bash
   wp-env start
   ```

2. **Log in to WordPress Admin** at `http://localhost:8888/wp-admin`

3. **Create a test page:**
   - Go to **Pages → Add New**
   - Add the `[author_write]` shortcode to the content
   - Click **Preview**

4. **Test the interface:**
   - Verify the mode buttons appear
   - Click a mode and confirm others are hidden
   - Click Reset to restore all modes
   - Test the chat input (requires API key configuration)

5. **Run the test suite:**
   ```bash
   wp-env run tests "phpunit"
   ```

## Troubleshooting

### wp-env Lifecycle Issues

**Environment won't start:**
- Ensure Docker Desktop is running
- Check for port conflicts (8888, 8889)
- Try: `wp-env destroy && wp-env start`

**Plugin not visible:**
- Verify you're in the plugin root directory when running `wp-env start`
- Check `.wp-env.json` has `"plugins": ["./"]`

**Tests failing:**
- Ensure test environment is running: `wp-env start`
- Reset test database: `wp-env clean tests`
- Check PHP version: `wp-env run cli php --version`

**Data persistence:**
- Environment data persists in `.wp-env/` directory
- To reset completely: `wp-env destroy` (deletes all data)
- To keep data: `wp-env stop` (preserves database and uploads)

**Permission issues:**
- On Linux, you may need to adjust Docker permissions
- Try: `sudo chown -R $(whoami) .wp-env/`

### General Issues

**Shortcode not rendering:**
- Confirm plugin is activated in WP Admin
- Check for PHP errors: Enable `WP_DEBUG` in `wp-config.php`
- View browser console for JavaScript errors

**Chat not responding:**
- Verify API key configuration
- Check server error logs for REST endpoint issues
- Ensure nonce generation is working (logged-in user required)

For detailed environment documentation, see [`docs/local-development.md`](docs/local-development.md).

## Project Structure

```
author_write/
├── author_write.php          # Main plugin bootstrap
├── includes/                 # Core plugin classes
├── admin/                    # Admin dashboard pages
├── assets/                   # CSS and JavaScript
├── templates/                # View templates
├── docs/                     # Documentation
└── tests/                    # PHPUnit tests
```

## Development Workflow

1. Make changes to plugin files
2. Refresh your browser to see updates
3. Run tests: `wp-env run tests "phpunit"`
4. Check for PHP errors with `WP_DEBUG` enabled
5. Use `wp-env restart` if configuration changes

## Contributing

- Follow [WordPress PHP coding standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/)
- Write tests for new features
- Update `CHANGELOG.md` following [Keep a Changelog](https://keepachangelog.com/)
- Use Conventional Commits for commit messages

## License

GPL-2.0-or-later

## Support

For issues and feature requests, please use the GitHub issue tracker.
