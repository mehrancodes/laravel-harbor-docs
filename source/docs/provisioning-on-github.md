---
title: Automating Pull Request Provisioning with GitHub Actions and Veyoze
description: Step-by-step guide on setting up GitHub Actions to automate pull request provisioning with Veyoze, streamlining deployment and testing processes.
extends: _layouts.documentation
section: content
---
# Automating Pull Request Provisioning with GitHub Actions {#provisioning-on-github}

## Introduction

This guide details how to automate the provisioning of pull requests on GitHub using GitHub Actions, focusing on Veyoze for environment provisioning. It's ideal for projects needing automated deployment or testing environments for each pull request.

## Prerequisites

Before starting, ensure you have:

1. **GitHub Repository**: Your project should be hosted in a GitHub repository.
2. **GitHub Actions**: GitHub Actions must be enabled for your repository.
3. **Configured Secrets**: `FORGE_API_TOKEN` and `FORGE_SERVER_ID` should be set up in your GitHub repository settings.

## Creating the Workflow File

First, create the workflow file in your GitHub repository:

1. Go to the 'Actions' tab of your repository.
2. Choose to set up a workflow yourself.
3. This creates a new file under `.github/workflows/`. Name it `preview-provision.yml`.

## Workflow Configuration

### Detailed Breakdown of the Workflow Script

#### Conditional Execution Block

```yaml
veyoze-provision:
  if: |
    github.event.pull_request.draft == false &&
    contains(github.event.pull_request.title, '[veyoze]')
```

- **Conditions**: Runs for non-draft pull requests with `[veyoze]` in the title.

#### Veyoze Installation Step

```yaml
- name: Install Veyoze via Composer
  run: composer global require mehrancodes/veyoze -q
```

- **Command Details**: Installs Veyoze globally on the runner using Composer.

#### Start Provisioning Step

```yaml
- name: Start Provisioning
  env:
      FORGE_TOKEN: ${{ secrets.FORGE_API_TOKEN }}
      FORGE_SERVER: ${{ secrets.FORGE_SERVER_ID }}
      FORGE_GIT_REPOSITORY: ${{ github.repository }}
      FORGE_GIT_BRANCH: ${{ github.head_ref }}
      FORGE_DOMAIN: veyoze.com
  run: veyoze provision
```

- **Environment Variables**: Sets up necessary variables for Veyoze provisioning.
- **Command**: Executes `veyoze provision`.

### Complete Workflow Script

```yaml
name: preview-provision
on:
  pull_request:
    types: [opened, edited, reopened, ready_for_review]
jobs:
  veyoze-provision:
    if: |
      github.event.pull_request.draft == false &&
      contains(github.event.pull_request.title, '[veyoze]')
    runs-on: ubuntu-latest
    container:
      image: kirschbaumdevelopment/laravel-test-runner:8.1
    steps:
      - name: Install Veyoze via Composer
        run: composer global require mehrancodes/veyoze -q
      - name: Start Provisioning
        env:
            FORGE_TOKEN: ${{ secrets.FORGE_API_TOKEN }}
            FORGE_SERVER: ${{ secrets.FORGE_SERVER_ID }}
            FORGE_GIT_REPOSITORY: ${{ github.repository }}
            FORGE_GIT_BRANCH: ${{ github.head_ref }}
            FORGE_DOMAIN: veyoze.com
        run: veyoze provision
```

### Steps to Configure the Workflow

1. Add the complete script into `preview-provision.yml` in the `.github/workflows` directory.
2. Commit and push the changes to your GitHub repository.

## Utilizing the Workflow

Once set up, the workflow automatically runs based on the defined triggers. Monitor progress in the 'Actions' tab.

## Troubleshooting

If issues arise:

- Check the workflow YAML file's format and location.
- Confirm that `FORGE_API_TOKEN` and `FORGE_SERVER_ID` are correctly configured.
- Review error messages or logs in the 'Actions' tab.
