---
title: Upgrading to v2
description: Learn what changed in Harbor v2 and how to migrate your existing workflows.
extends: _layouts.documentation
section: content
---
# Upgrading to v2 {#upgrading-to-v2}

### [Overview](#overview) {#overview}
Harbor v2 introduces a new organization-scoped Forge API integration. The previous release relied on the legacy `laravel/forge-sdk`, which used flat API routes. v2 replaces this with a custom [Saloon](https://docs.saloon.dev/)-based Forge client that routes all requests through your Forge organization, matching the current Forge API structure.

This is a **breaking change** if you are upgrading from v1. The only required action is adding `FORGE_ORGANIZATION` to your workflow.

---

### [What Changed](#what-changed) {#what-changed}

#### Forge API Client
The `laravel/forge-sdk` dependency has been removed and replaced with a lightweight Saloon-based client built into Harbor. All Forge API calls are now routed through:

```
https://forge.laravel.com/api/v1/orgs/{organization}/...
```

This matches the current Forge API, which requires all requests to be scoped to an organization.

#### New Required Configuration: `FORGE_ORGANIZATION`
Every Forge account belongs to an organization. Harbor now requires you to specify your organization slug so it can construct the correct API paths.

See the [FORGE_ORGANIZATION](/docs/configuration#forge-organization) configuration reference for details.

---

### [Migration Steps](#migration-steps) {#migration-steps}

#### 1. Find your Forge organization slug
Log in to [forge.laravel.com](https://forge.laravel.com). Your organization slug appears in the URL after you select your organization:

```
https://forge.laravel.com/orgs/{your-slug}
```

#### 2. Add `FORGE_ORGANIZATION` to your workflow
Open your `preview-provision.yml` (and `preview-teardown.yml` if you have one) and add the new key under `env`:

```yaml
- name: Start Provisioning
  env:
      FORGE_TOKEN: ${{ secrets.FORGE_TOKEN }}
      FORGE_SERVER: ${{ secrets.FORGE_SERVER }}
      FORGE_ORGANIZATION: ${{ secrets.FORGE_ORGANIZATION }}   # ← add this
      FORGE_GIT_REPOSITORY: ${{ github.repository }}
      FORGE_GIT_BRANCH: ${{ github.head_ref }}
      FORGE_DOMAIN: your-domain.com
  run: harbor provision
```

Store the value as an encrypted GitHub secret (`FORGE_ORGANIZATION`) or a repository variable if the slug is not sensitive.

#### 3. Rename legacy secret names (if applicable)
If you are using the old secret names from v1 examples, update them:

| v1 (legacy) | v2 |
|---|---|
| `FORGE_API_TOKEN` | `FORGE_TOKEN` |
| `FORGE_SERVER_ID` | `FORGE_SERVER` |

#### 4. Update Harbor to v2
```bash
composer global require mehrancodes/laravel-harbor
```

---

### [Breaking Changes Summary](#breaking-changes) {#breaking-changes}

| Area | v1 | v2 |
|---|---|---|
| Forge client | `laravel/forge-sdk` | Custom Saloon client |
| API route structure | Flat (`/api/v1/servers/...`) | Org-scoped (`/api/v1/orgs/{slug}/...`) |
| `FORGE_ORGANIZATION` | Not required | **Required** |
| Secret name for token | `FORGE_API_TOKEN` (by convention) | `FORGE_TOKEN` |
| Secret name for server | `FORGE_SERVER_ID` (by convention) | `FORGE_SERVER` |

---

### [Need Help?](#need-help) {#need-help}
If you run into issues during migration, open an issue on the [GitHub repository](https://github.com/mehrancodes/laravel-harbor/issues) or refer to the full [Configuration reference](/docs/configuration).
