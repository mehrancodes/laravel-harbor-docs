---
title: Git Providers (GitHub / GitLab / Custom)
description: Connect Harbor to GitHub, GitLab, self-hosted GitLab, or a custom git URL.
extends: _layouts.documentation
section: content
---

# Git Providers (GitHub / GitLab / Custom)

### [Overview](#overview) {#overview}
Harbor tells Forge which Git provider to use when cloning your preview site.

You choose:

1. **How Forge clones** — `FORGE_GIT_PROVIDER`
2. **Whether Harbor should manage deploy keys / comments** — token + optional API settings
3. **Whether you need a deploy key** — usually only for `custom` / self-hosted, or private repos Forge cannot reach via its built-in integration

See also the [configuration reference](/docs/configuration#forge-git-provider).

### [Choose your path](#choose-your-path) {#choose-your-path}

| Your repo lives on… | Set `FORGE_GIT_PROVIDER` to… | Also set |
|---|---|---|
| GitHub | `github` (default) | `FORGE_GIT_REPOSITORY` |
| GitLab.com | `gitlab` | `FORGE_GIT_REPOSITORY` |
| Self-hosted GitLab already linked in Forge | `gitlab-custom` | `FORGE_GIT_REPOSITORY` |
| Self-hosted GitLab / arbitrary SSH URL | `custom` | `FORGE_GIT_REPOSITORY` + `FORGE_GIT_REPOSITORY_URL` |
| Bitbucket | `bitbucket` | `FORGE_GIT_REPOSITORY` |

`FORGE_GIT_REPOSITORY` is always required (`owner/repo` or `group/project`).

---

### [GitHub (native)](#github-native) {#github-native}

#### Prerequisites
1. In [Laravel Forge](https://forge.laravel.com), connect your GitHub account under source control.
2. Harbor can reach the repo through Forge’s GitHub integration.

#### Workflow env

```yaml
FORGE_GIT_PROVIDER: github
FORGE_GIT_REPOSITORY: ${{ github.repository }}
FORGE_GIT_BRANCH: ${{ github.head_ref }}
```

#### Optional: Harbor-managed deploy key
Use this when Forge’s GitHub link is not enough (for example a private org repo Forge cannot access).

```yaml
FORGE_DEPLOY_KEY: true
GIT_TOKEN: ${{ secrets.GIT_TOKEN }} # needs permission to manage repository deploy keys
```

Harbor generates a keypair, adds the public key to the GitHub repo, and passes both halves to Forge when creating the site. On teardown it removes the key.

---

### [GitLab.com (native)](#gitlab-native) {#gitlab-native}

#### Prerequisites
1. Connect GitLab in Forge’s source control settings.
2. The Forge GitLab user can read the project.

#### Workflow env

```yaml
FORGE_GIT_PROVIDER: gitlab
FORGE_GIT_REPOSITORY: my-group/my-project
FORGE_GIT_BRANCH: ${{ github.head_ref }}
```

#### Optional: Harbor-managed deploy key

```yaml
FORGE_DEPLOY_KEY: true
GIT_TOKEN: ${{ secrets.GITLAB_TOKEN }} # GitLab PAT / project token with api scope
```

---

### [Self-hosted GitLab](#self-hosted-gitlab) {#self-hosted-gitlab}

Pick one of these patterns.

#### Option A — Forge already knows the instance (`gitlab-custom`)
Use when the self-hosted GitLab host is linked under Forge source control.

```yaml
FORGE_GIT_PROVIDER: gitlab-custom
FORGE_GIT_REPOSITORY: my-group/my-project
FORGE_GIT_BRANCH: ${{ github.head_ref }}
```

To let Harbor register deploy keys or post MR comments:

```yaml
FORGE_DEPLOY_KEY: true
GIT_TOKEN: ${{ secrets.GITLAB_TOKEN }}
GIT_API_URL: https://gitlab.example.com/api/v4
```

#### Option B — Full SSH URL (`custom`)
Use when you want Forge to clone via a full git SSH URL (typical for self-hosted setups).

```yaml
FORGE_GIT_PROVIDER: custom
FORGE_GIT_REPOSITORY: my-group/my-project
FORGE_GIT_REPOSITORY_URL: git@gitlab.example.com:my-group/my-project.git
FORGE_GIT_BRANCH: ${{ github.head_ref }}
FORGE_DEPLOY_KEY: true
FORGE_GIT_API_PROVIDER: gitlab
GIT_API_URL: https://gitlab.example.com/api/v4
GIT_TOKEN: ${{ secrets.GITLAB_TOKEN }}
```

- `FORGE_GIT_REPOSITORY_URL` is **required** for `custom`.
- `FORGE_GIT_API_PROVIDER=gitlab` tells Harbor to use the GitLab API even though Forge clones with `custom`.
- Without `GIT_TOKEN`, Harbor cannot register the key automatically (see [BYO deploy keys](#byo-deploy-keys)).

---

### [Custom / other git hosts](#custom-git) {#custom-git}

```yaml
FORGE_GIT_PROVIDER: custom
FORGE_GIT_REPOSITORY: my-group/my-project
FORGE_GIT_REPOSITORY_URL: git@git.example.com:my-group/my-project.git
FORGE_GIT_BRANCH: ${{ github.head_ref }}
```

Forge must be able to clone that URL. Provide access with either:

1. Harbor-managed deploy keys (`FORGE_DEPLOY_KEY` + a supported API provider + token), or
2. [BYO deploy keys](#byo-deploy-keys), or
3. The Forge server SSH key already trusted by the host

---

### [Deploy keys](#deploy-keys) {#deploy-keys}

#### How Harbor manages deploy keys
When `FORGE_DEPLOY_KEY=true`:

1. Harbor generates an SSH keypair (or uses your BYO pair).
2. If a Git API is configured (`github` / `gitlab` / `gitlab-custom` via provider or `FORGE_GIT_API_PROVIDER`) and `GIT_TOKEN` is set, Harbor adds the **public** key to the repository.
3. Harbor creates the Forge site with `public_deploy_key` and `private_deploy_key`.
4. On teardown, Harbor removes the matching key from the provider.

`FORGE_GITHUB_DEPLOY_KEY` still works but is **deprecated** — prefer `FORGE_DEPLOY_KEY`.

#### [BYO deploy keys](#byo-deploy-keys) {#byo-deploy-keys}
When Harbor cannot call your Git API (no token, unsupported host):

1. Generate a keypair locally.
2. Add the public key to the repository’s deploy keys.
3. Pass both halves into the workflow:

```yaml
FORGE_GIT_PROVIDER: custom
FORGE_GIT_REPOSITORY: my-group/my-project
FORGE_GIT_REPOSITORY_URL: git@gitlab.example.com:my-group/my-project.git
FORGE_DEPLOY_KEY: true
FORGE_DEPLOY_KEY_PUBLIC: ${{ secrets.FORGE_DEPLOY_KEY_PUBLIC }}
FORGE_DEPLOY_KEY_PRIVATE: ${{ secrets.FORGE_DEPLOY_KEY_PRIVATE }}
```

If no API token is set, Harbor prints the public key and continues — you must add it yourself before (or immediately after) the first provision.

---

### [Troubleshooting](#troubleshooting) {#troubleshooting}

| Symptom | What to check |
|---|---|
| Validation error about `repository_url` | `FORGE_GIT_PROVIDER=custom` requires `FORGE_GIT_REPOSITORY_URL` |
| Site creates but clone / deploy fails | Deploy key on the repo, or Forge source-control link for that provider |
| Native `github` / `gitlab` fails | Connect the provider in Forge; confirm Forge can see the repo |
| Self-hosted API / deploy-key register fails | `GIT_API_URL` (include `/api/v4` for GitLab) and token scopes |
| Comments not posted | `GIT_COMMENT_ENABLED`, `GIT_TOKEN`, `GIT_ISSUE_NUMBER`, and a supported API provider — see [Announcement Comments](/docs/features/announcement-comments) |
