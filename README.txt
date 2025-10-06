# Author Write — Multi‑Agent Prompt Pack

This pack contains ready-to-paste prompts and repo templates to run a **multi‑agent vibe‑coding** workflow:
- **Orchestrator**: Copilot Chat in VS Code (primary coordinator).
- **Builder**: GPT‑5 (implements tasks as small PRs).
- **Reviewer**: GPT‑5 (security, standards, performance).
- **Tester**: GPT‑5 (QA against acceptance criteria).
- **Docs**: GPT‑5 (README/CHANGELOG/release notes).
- **Background**: GPT‑5 (tiny incremental cleanups).

Use with your existing `rules.md`, `acceptance.md`, and `context.md`. Project slug: `author_write`. Shortcode: `[author_write]`.

## Local Development

1. `npm install -g @wordpress/env`
2. `wp-env start`
3. Visit `http://localhost:8888` (default credentials `admin`/`password`).
4. Develop and test changes.
5. `wp-env stop`

See `docs/local-development.md` for full environment details.
