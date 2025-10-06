# Shared Protocol

Author Write collaboration framework for orchestration and specialized agents.

## Canonical Sources
- `AGENTS.md` – repository rules, roadmap, security, testing, and coding standards.
- `acceptance.md` – definition of done and manual acceptance tests.
- `context.md` – product intent, mode behaviors, and user workflows.
- `CHANGELOG.md` – Keep a Changelog history with Semantic Versioning.
- `SHARED_PROTOCOL.md` – orchestration workflow and communication contract (this file).

## Issue Lifecycle
1. Orchestration agent drafts issues using the Task Card template (Title, Context, DoD, Out of Scope, Artifacts, Branch, Owner agent, Constraints).
2. Exactly one PR per Issue. Branch naming: `aw/<type>-<slug>`.
3. Builders respond with:
   - STEP N – PLAN
   - COMMANDS TO RUN
   - DIFFS/PATCHES
   - CHANGELOG UPDATE (Unreleased + proposed SemVer bump)

## Review & Testing
- Reviewers enforce WordPress standards, sanitization, nonces/capabilities, and scope defined in `AGENTS.md`.
- Testers execute acceptance scenarios (happy path + edge cases) citing `acceptance.md`, logging reproducible evidence.
- Docs agent updates README/CHANGELOG/release notes for merged user-visible changes.
- Background agent handles tasks labeled `agent:background` + `size:S` without altering public APIs.

## Release Hygiene
- Every PR updates `CHANGELOG.md` `[Unreleased]` with Added/Changed/Fixed/Removed entries and SemVer bump proposal.
- Run `wp-env run tests "phpunit"` plus documented manual steps before requesting review.
- Keep secrets server-side; never expose API keys in JS, REST payloads, or logs (`AGENTS.md` § Security, UX & Accessibility).
- Maintain accessible UI (focus states, ARIA usage) per `AGENTS.md`.

## Communication
- Kickoff DMs follow the role prompts defined by orchestration.
- Merge gates: Reviewer approval, Tester approval, green CI, CHANGELOG update.
- For milestones, Docs drafts release notes and coordinates the `vX.Y.Z` tag proposal.
