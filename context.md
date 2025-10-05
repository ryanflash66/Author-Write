# context.md — Project Context & Intent

## Objective
Build a custom **WordPress plugin** that embeds an **AI-powered chatbot** for authors with three focused modes that support creative writing workflows (reviewing prose, developing characters, and outlining plots). The chatbot is embedded anywhere via a shortcode.

## Key Features (from the project brief)
- **Chatbot Integration** with an AI model (OpenAI or OpenRouter) and **contextual conversation flow per mode**.
- **Mode Switching** UI with three buttons (**Review, Character Development, Plot Generation**). Selecting one highlights it and **temporarily hides the others** to keep focus until a reset.
- **Customizable UI**: simple chatbox embedded via shortcode **`[author_write]`**, styled lightly to blend with common themes.
- **Author Workflow Support**: ability to **save chat transcripts to drafts** or **export them**; an **Admin dashboard** for basic **usage tracking**.

## Mode Behaviors
- **Review**: constructive critique of writing (style, pacing, grammar, emotional impact) with actionable suggestions and optional line edits.
- **Character Development**: structured character profiles (identity, goals, wounds, contradictions, backstory, relationships, and arc beats).
- **Plot Generation**: story outlines, conflicts/stakes, and scene lists aligned to common beat structures.

## Constraints & Preferences
- Keep dependencies minimal; prefer WordPress-native patterns.
- Secrets (API keys) must remain **server-side**.
- Provide **small, reviewable increments** with clear commands, diffs, and test steps.
- Produce a **README** and an installable **.zip** when done.

## Success Criteria (high level)
- The shortcode renders a functional, accessible chat UI.
- Mode switching behaves exactly as specified (hide others until reset).
- Transcripts can be exported and saved to Drafts securely.
- Admin usage tracking works and is easy to understand.
