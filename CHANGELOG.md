# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added

- Local development environment proposal using `@wordpress/env`.
- Initial plugin scaffold with the `[author_write]` shortcode placeholder UI.
- Checked-in `.wp-env.json` configuration for consistent local environments.
- Enqueued front-end assets to hide inactive modes until reset when using `[author_write]`.
- Stubbed `author_write/v1/chat` REST endpoint with nonce plumbing and friendly error messaging surfaced in the chat UI.
- Surfaced user-facing error messaging in the chat UI when chat requests fail.

### Changed

- Normalized plugin slug and text domain to `author_write`.
- Clarified README setup steps and referenced local development docs.

## [0.1.0] - TBD

### Added

- First public release with the `[author_write]` shortcode rendering the Author Write interface.
