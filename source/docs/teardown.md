---
title: Tearing down your preview site
description: Step-by-step guide on setting up GitHub Actions to automate site teardown after the pull request is merged.
extends: _layouts.documentation
section: content
---
# Automating site teardown when Pull Request is merged {#teardown}

## Introduction

Considering you already have set up your workflow for creating preview sites on new pull requests, this guide details how to automate the teardown of the site when you merge or close your pull request on GitHub using GitHub Actions.

## Creating the Workflow File

First, create the workflow file in your GitHub repository:

1. Go to the 'Actions' tab of your repository.
2. Choose to set up a workflow yourself.
3. This creates a new file under `.github/workflows/`. Name it `preview-teardown.yml`.

## Workflow Configuration
Now it's time to configure our workflow to get triggered when an existing pull request gets merged, or closed.
As you see, the only changes in the teardown workflow is the pull request type we want our workflow to get triggered on,
as well as the `veyoze teardown` command.  

```yaml
name: preview-teardown
on:
  pull_request:
    types: [closed]
jobs:
  veyoze-teardown:
    if: |
      github.event.pull_request.draft == false &&
      contains(github.event.pull_request.title, '[veyoze]')
    runs-on: ubuntu-latest
    container:
      image: kirschbaumdevelopment/laravel-test-runner:8.1
    steps:
      - name: Install Veyoze
        run: composer global require mehrancodes/veyoze -q
      - name: Start Teardown
        env:
          FORGE_TOKEN: ${{ secrets.FORGE_TOKEN }}
          FORGE_SERVER: ${{ secrets.FORGE_SERVER }}
          FORGE_GIT_REPOSITORY: ${{ github.repository }}
          FORGE_GIT_BRANCH: ${{ github.head_ref }}
          FORGE_DOMAIN: veyoze.com
        run: veyoze teardown
```

### Steps to Configure the Workflow

1. Add the complete script into `preview-provision.yml` in the `.github/workflows` directory.
2. Commit and push the changes to your GitHub repository.

## Utilizing the Workflow

Consider the previous pull request we have created for provisioning the site, where the branch name was 'add-user-notification'.
After we are done with testing out our changes on the preview site, this workflow gets triggered when we merge or close the pull request.
Running the `veyoze teardown` removes the previously created task scheduler, database, database user, and finally, the site for the related site on Forge.