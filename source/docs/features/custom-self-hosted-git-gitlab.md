---
title: Custom or Self-Hosted Git (GitLab)
description: Use Harbor with custom Git providers like self-hosted GitLab.
extends: _layouts.documentation
section: content
---

# Custom or Self-Hosted Git (GitLab)

### [Overview](#overview) {#overview}
If your repository is not using Forge's default Git provider integration, use Harbor with the `custom` provider and a full repository URL.

This is a common setup for self-hosted GitLab.

### [Configuration](#configuration) {#configuration}
Add these environment variables to your provision workflow:

```yaml
FORGE_GIT_PROVIDER: custom
FORGE_GIT_REPOSITORY: my-group/my-project
FORGE_GIT_REPOSITORY_URL: git@gitlab.example.com:my-group/my-project.git
FORGE_GIT_BRANCH: ${{ github.head_ref }}
FORGE_GITHUB_DEPLOY_KEY: true
```

### [What happens with deploy keys](#what-happens-with-deploy-keys) {#what-happens-with-deploy-keys}
When `FORGE_GITHUB_DEPLOY_KEY` is `true`, Forge generates a deploy key during site creation.

If repository access fails, copy the public key from Forge and add it to your GitLab project deploy keys.
