# Repository Guidelines

## Project Structure & Module Organization
- `author_write.php` bootstraps the plugin, defines constants, and loads `includes/` classes.
- Place core classes in `includes/Author_Write/*`, use `admin/` for the usage dashboard, and keep views in `templates/`.
- Enqueue CSS/JS from `assets/` and keep `docs/` (e.g., `docs/local-development.md`) current.

## Product Requirements & Roadmap
- The `[author_write]` shortcode surfaces Review, Character, and Plot modes; activating one hides the others until Reset restores the selector.
- Route chat traffic through a server-side REST endpoint such as `author_write/v1/chat`; keep API credentials in PHP only.
- Provide transcript `.txt` export, "Save to Draft" via core post APIs, and a WP-Admin usage page with per-mode counts + optional CSV export.

## Build, Test, and Development Commands
- `npm install -g @wordpress/env` sets up the local WordPress stack.
- `wp-env start`/`wp-env stop` control containers; data persists in `.wp-env/`.
- `wp-env run tests "phpunit"` executes the suite in `tests/phpunit/`; run before PRs.

## Coding Style & Naming Conventions
- Follow WordPress PHP standards: 4-space indent, Yoda conditions, snake_case functions, PascalCase classes.
- Namespace under `Author_Write`, prefix hooks `author_write_`, use the `author_write` text domain.
- Sanitize inputs, escape outputs, and require nonces plus capability checks on mutating REST calls.

## Security, UX & Accessibility
- Keep secrets server-side, validate payloads, and add a lightweight rate cap (~3 requests/10s per user).
- Provide optimistic UI: disable buttons during requests, show progress, surface fallback messages.
- Ensure buttons expose focus styles and ARIA labels; pair the chat textarea with an accessible label and status output.
- Log unexpected server errors with `error_log` when `WP_DEBUG` is true.

## Testing Guidelines
- Mirror plugin layout in `tests/phpunit/test-*.php`; store fixtures in `tests/fixtures/` for transcripts and REST payloads.
- Cover shortcode toggling, REST auth, transcript storage, and admin metrics.
- Run `wp-env run tests "phpunit"` and manually smoke mode switching, export, and draft saves before review.

## Commit & Pull Request Guidelines
- Use Conventional Commits (`feat:`, `fix:`, `chore:`); keep subjects <= 50 chars and note impact + tests in the body.
- Update `[Unreleased]` in `CHANGELOG.md` with Added/Changed/Fixed entries and call out the proposed SemVer bump.
- PRs must link issues, list verification steps, attach UI proof for visual changes, and note follow-up tasks.

## Documentation & Release Notes
- Keep `docs/` current with setup and configuration changes.
- Tag `v0.1.0` once the shortcode is production-ready and add concise release notes per tag.
