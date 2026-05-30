---
title: Upgrading to v2
description: Learn what changed in Harbor v2 and how to migrate your existing workflows.
extends: _layouts.documentation
section: content
---
# Upgrading to v2 {#upgrading-to-v2}

## [Overview](#overview) {#overview}
Harbor v2 replaces the legacy `laravel/forge-sdk` with a custom [Saloon](https://docs.saloon.dev/)-based client that talks to Forge's current organization-scoped API. All Forge requests are routed through your organization slug.

If you are upgrading from Harbor v1, you **must** add `FORGE_ORGANIZATION` to every workflow that runs `harbor provision` or `harbor teardown`. You should also verify your Forge API token has the scopes Harbor needs.

---

### [What Changed](#what-changed) {#what-changed}

#### Forge API client
The `laravel/forge-sdk` dependency has been removed. Harbor now uses a built-in Saloon client with JSON:API request and response handling. API calls use this base pattern:

```text
https://forge.laravel.com/api/orgs/{organization}/...
```

Examples:

- `GET /api/orgs/{organization}/servers/{serverId}`
- `POST /api/orgs/{organization}/servers/{serverId}/sites`

#### New required configuration: `FORGE_ORGANIZATION`
Every Forge account belongs to an organization. Harbor requires the organization slug so it can build the correct API paths.

See the [FORGE_ORGANIZATION](/docs/configuration#forge-organization) configuration reference for how to find your slug and configure it in GitHub Actions.

#### Forge API token scopes
Harbor v2 may call endpoints that were not used by v1. Regenerate or update your Forge API token with the scopes Harbor actually uses — see the scope table on [FORGE_ORGANIZATION](/docs/configuration#forge-organization) in the configuration reference.

At minimum: `organization:view`, `server:view`, `site:create`, `site:delete`, `site:manage-project`, `site:manage-deploys`. Add `site:manage-environment`, `site:manage-nginx`, `site:manage-ssl`, `site:meta`, `site:manage-notifications`, `site:manage-commands`, and the `server:create-*` / `server:delete-*` scopes when you use the matching Harbor options.

#### Behavioral differences (v1 → v2)
These are not configuration keys, but they matter when you upgrade:

| Area | v1 behavior | v2 behavior |
|---|---|---|
| **Existing sites** | Harbor could install a git repository on an existing site | Automatic repository installation for existing sites is not available on the new Forge API yet; Harbor logs a warning and continues |
| **GitHub deploy keys** | Harbor could create a Forge deploy key and add it to GitHub | Forge generates deploy keys during site creation when enabled; add the key in Forge to your repository manually if deployment fails |
| **Queue workers** | Created via Forge site worker API | Created as server daemons with `queue:work` / `queue:listen` commands |

---

### [Migration Steps](#migration-steps) {#migration-steps}

#### 1. Find your Forge organization slug
Log in to [forge.laravel.com](https://forge.laravel.com). Your organization slug appears in the URL after you select your organization:

```text
https://forge.laravel.com/orgs/{your-slug}
```

#### 2. Add `FORGE_ORGANIZATION` to your workflows
Open `preview-provision.yml` and `preview-teardown.yml` (or any workflow that runs Harbor) and add the new key under `env`:

```yaml
- name: Start Provisioning
  env:
      FORGE_TOKEN: ${{ secrets.FORGE_TOKEN }}
      FORGE_SERVER: ${{ secrets.FORGE_SERVER }}
      FORGE_ORGANIZATION: ${{ secrets.FORGE_ORGANIZATION }}
      FORGE_GIT_REPOSITORY: ${{ github.repository }}
      FORGE_GIT_BRANCH: ${{ github.head_ref }}
      FORGE_DOMAIN: your-domain.com
  run: harbor provision
```

Store the slug as a GitHub secret (`FORGE_ORGANIZATION`) or a repository variable if the slug is not sensitive.

#### 3. Update Harbor to v2
```bash
composer global require mehrancodes/laravel-harbor
```

#### 4. Run a test provision
Open or update a pull request that triggers your Harbor workflow. Confirm the site is created on Forge and that deploy/git access works for **new** preview sites.

---

### [Breaking Changes Summary](#breaking-changes) {#breaking-changes}

| Area | v1 | v2 |
|---|---|---|
| Forge client | `laravel/forge-sdk` | Custom Saloon client |
| API route structure | Flat legacy routes | Org-scoped (`/api/orgs/{slug}/...`) |
| `FORGE_ORGANIZATION` | Not required | **Required** |

---

### [Need Help?](#need-help) {#need-help}
If you run into issues during migration, open an issue on the [GitHub repository](https://github.com/mehrancodes/laravel-harbor/issues) or refer to the full [Configuration reference](/docs/configuration).
