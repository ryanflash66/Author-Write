# acceptance.md — Definition of Done & Acceptance Tests

## Global
- ✅ The plugin packages into an installable `.zip` and activates without errors.
- ✅ Works with WordPress (latest) under PHP 8.2+ and default theme.
- ✅ No exposed API keys in page source, JS bundles, or REST payloads.
- ✅ `WP_DEBUG` shows no new notices/warnings/errors from this plugin.

## Feature DoD
1) **Shortcode**
- Placing `[author_write]` in a post/page renders the chat UI.
- The UI loads styles/scripts only on pages where the shortcode exists.

2) **Three Modes UI**
- Buttons: **Review**, **Character**, **Plot** appear above the chat.
- Clicking a button **activates** that mode, visually highlights it, and **hides the other two** options until a **Reset** action is taken.
- A **Reset** control restores visibility of all three modes.

3) **Chat Backend**
- POSTing a message triggers a server-side call to the AI provider via a WP REST endpoint (e.g., `author_write/v1/chat`).
- Errors/timeouts return a friendly message; JavaScript handles and displays it.
- Prompting differs per mode (Review vs Character vs Plot).

4) **Transcripts**
- **Export** button downloads a `.txt` transcript with a readable filename (e.g., `assistant-YYYYMMDD-HHMM.txt`).
- **Save to Draft** creates a WordPress Draft post for the current user with transcript content (or stored in post meta), protected by nonces/capability checks.

5) **Admin Usage Page**
- A `Tools` or `Settings` submenu page is available to Admins only.
- Displays usage counts (at minimum by **mode**; ideally per day).
- Optional: **Export CSV** of usage data.

6) **Docs & Polish**
- A `README.md` exists with: prerequisites, setup steps, environment variables, how to run locally, how to build/package, and basic troubleshooting.
- Basic accessibility: keyboard navigation works; controls are labeled.

## Manual Acceptance Tests (Happy Path)
- Create a page with `[author_write]` → load page → see UI.
- Click **Character** → other two options disappear → send a prompt → get a response.
- Click **Reset** → all three modes visible again.
- Send a prompt in each mode; responses are mode-appropriate.
- Click **Export** → a `.txt` file downloads with the full thread.
- Click **Save to Draft** → a new Draft appears in WP Admin → content present.
- Visit the Admin Usage page → see counters update after interactions.

## Manual Acceptance Tests (Edge Cases)
- Disable network or set a very low timeout → user sees a clear, friendly error.
- Attempt to save a draft as a non-logged-in user → blocked with proper message.
- With `WP_DEBUG=true`, navigate and interact → no new plugin warnings/notices.


7) **CHANGELOG & Versioning**
- A top-level **CHANGELOG.md** exists and is kept up to date.
- Entries follow **Keep a Changelog** style with **Added/Changed/Fixed/Removed** sections.
- Versioning uses **Semantic Versioning**; the first functional shortcode release is **0.1.0** or higher.
