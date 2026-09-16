---
title: Custom Git Repositories
description: Use Harbor with custom or self-hosted Git repositories.
extends: _layouts.documentation
section: content
---

# Custom Git Repositories

Use `FORGE_GIT_PROVIDER` to tell Forge how to clone your repository.

- `github`, `gitlab`, `gitlab-custom`, or `bitbucket` — use `FORGE_GIT_REPOSITORY` in `owner/repo` form
- `custom` — also set `FORGE_GIT_REPOSITORY_URL` to the full git URL

### [Custom provider example](#custom-provider-example) {#custom-provider-example}

```yaml
FORGE_GIT_PROVIDER: custom
FORGE_GIT_REPOSITORY: my-group/my-project
FORGE_GIT_REPOSITORY_URL: git@gitlab.example.com:my-group/my-project.git
FORGE_GIT_BRANCH: ${{ github.head_ref }}
```

`FORGE_GIT_REPOSITORY_URL` is required for `custom`. If it is missing, Harbor fails validation before provisioning.
