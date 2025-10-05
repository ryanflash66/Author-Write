# rules.md — Author Write (WordPress Plugin)

## Role & Scope
You are the **coding agent**. I (the human) will **not** hand-write code. You will plan, generate diffs, and instruct me which commands to run. The project is a WordPress plugin called **Author Write** that embeds an AI chatbot with three modes and a shortcode.

## Product Requirements (source of truth)
- **Shortcode**: `[author_write]` renders the chat UI in posts/pages.
- **Three Modes** (top buttons): **Review**, **Character Development**, **Plot Generation**.
  - Clicking a mode **activates** it and **hides the other two** options until a **Reset** action restores them.
- **Chatbot Integration**: Server-side call to an AI provider (OpenAI or OpenRouter). **Never** expose keys to the browser.
- **Transcripts**: Allow users to **Export (.txt)** and **Save to Draft** (WordPress `draft` post, storing transcript in post content or post meta).
- **Admin Usage Page**: Simple dashboard in WP-Admin showing usage counts (e.g., by mode/date) and a basic CSV export.
- **UI/Styling**: Lightweight CSS that matches common WP themes. No heavy frontend framework unless explicitly requested.

## Architecture & Implementation Rules
1. **Secrets safety**: API keys **must remain server-side** (PHP). No keys in JS, HTML, or REST responses.
2. **WordPress-native**:
   - Register a dedicated **REST endpoint** (e.g., `author_write/v1/chat`) for the chatbot requests.
   - Use nonces and capabilities for requests that alter WP content (e.g., saving drafts).
   - Sanitize and validate all request parameters.
3. **Code quality & structure**:
   - Follow WP coding standards for PHP and enqueue assets correctly.
   - Organize plugin files: main plugin file, `includes/` for classes, `assets/js`, `assets/css`, and `admin/` for admin pages.
   - Small PR-sized changes. For each step: provide **unified diffs/patches** plus exact shell commands.
4. **Error handling & UX**:
   - Handle timeouts and provider errors. Surface a friendly, concise error message in the UI.
   - Avoid blocking UI; give immediate feedback (e.g., disabled button with spinner or status text).
5. **Performance & limits**:
   - Reasonable client-side debouncing; optional **simple rate limit** (e.g., 3 req/10s per user) server-side.
6. **Accessibility**:
   - Buttons have proper roles, focus states, and labels. Text area labeled for screen readers.
7. **Observability (minimal)**:
   - Log errors server-side via `error_log` or a lightweight logger behind a WP_DEBUG check.
8. **Testing expectations**:
   - Provide manual test steps after each change.
   - Avoid introducing PHP notices/warnings under `WP_DEBUG=true`.

## Deliverables by Phase
1. **Environment & Scaffold**: Propose local WP dev approach; create plugin skeleton and register shortcode.
2. **Modes UI**: Three buttons (Review/Character/Plot), active highlight, **hide other modes until Reset**.
3. **Chat Backend**: PHP REST endpoint calls the AI provider; strong error handling; prompt templates per mode.
4. **Transcripts**: Implement **Export .txt** and **Save to Draft** with nonces and capability checks.
5. **Admin Usage**: `/wp-admin/admin.php?page=author_write-usage` — show usage counts, optional CSV export.
6. **Polish & Docs**: Accessibility pass, CSS tidy-up, and a **README** (run, configure, package). Produce an installable `.zip`.

## Process Contract
- After each applied change, **update CHANGELOG.md** accordingly and state the proposed **SemVer** bump.

- Always begin each step with: **“STEP N – PLAN”** (what you’ll change and why).
- Then output: **exact shell commands** for me to run.
- Then output: **diffs/patches** for files you will create/modify.
- After I run it, I will post terminal/browser output. You will fix issues **without me hand-editing**.
- Keep each step **small** and **reversible**. Produce clear commit messages (e.g., `feat: add shortcode and base UI`).

## Non‑Negotiables
- No secrets in JS/HTML.
- Follow `rules.md` + `acceptance.md` exactly.
- If a decision is ambiguous, propose the **simplest** standards-compliant option and continue.


## Changelog & Versioning
- Maintain a top-level **CHANGELOG.md** following **Keep a Changelog** style with **Semantic Versioning**.
- Start at **0.1.0** once the shortcode renders; keep an **Unreleased** section on top.
- Each step must specify: proposed version bump (**patch/minor/major**) and **CHANGELOG.md** entries using **Added / Changed / Fixed / Removed**.
- On release steps, create a Git tag (e.g., `v0.1.0`) and include a short release note.
