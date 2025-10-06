# Local Development Environment

## Recommended Stack

- **Docker Desktop** (latest stable release)
- **Node.js 20+** (for the `@wordpress/env` tool)
- **pnpm** or **npm** (comes with Node.js)
- **Git** (for cloning and version control)

## WordPress Environment Setup

The simplest repeatable setup is to use [`@wordpress/env`](https://developer.wordpress.org/block-editor/reference-guides/packages/packages-env/) which runs WordPress, MySQL, and Mailhog via Docker containers. It keeps the configuration close to production while staying easy to tear down.

1. Install the CLI globally:
   ```bash
   npm install -g @wordpress/env
   ```
2. Review the existing `.wp-env.json` in the repository root (matches the following configuration):
   ```json
   {
     "plugins": ["./"],
     "mappings": {
       "wp-content/uploads": "./.wp-env/uploads"
     },
     "env": {
       "tests": {
         "mappings": {
           "wp-content/uploads": "./.wp-env/uploads-tests"
         }
       }
     }
   }
   ```
3. Start the environment:
   ```bash
   wp-env start
   ```
4. WordPress will be available at `http://localhost:8888` with default credentials (`admin`/`password`).
5. Stop the environment when you are done:
   ```bash
   wp-env stop
   ```

## Database & Mail

- MySQL runs inside the Docker environment and persists data in the `.wp-env` directory.
- Mailhog captures all outbound mail at `http://localhost:8025`.

## Plugin Directory Layout

The plugin lives directly in this repository so it can be zipped and installed without extra nesting. The planned structure is:

```
author_write/
├── author_write.php          # Main plugin bootstrap file
├── uninstall.php             # Cleanup (to be added in later steps)
├── includes/
│   ├── class-author-write.php   # Core loader class and shortcode registration
│   └── functions-template.php   # Additional helpers (future)
├── admin/
│   └── index.php             # Admin dashboard entry (future)
├── assets/
│   ├── css/
│   │   └── author_write.css  # Front-end styles (future)
│   └── js/
│       └── author_write.js   # Front-end logic (future)
├── templates/
│   └── shortcode.php         # Render markup (future)
├── docs/
│   └── local-development.md  # Environment instructions
└── CHANGELOG.md              # Keep a Changelog compliant history
```

Additional files (e.g., `README.md`, `composer.json`) will be introduced as capabilities expand.

## Git Ignore

Update or add a `.gitignore` entry for `.wp-env/` to keep Docker volumes out of version control once the directory is created.
