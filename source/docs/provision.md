---
title: Automating Pull Request Provisioning with GitHub Actions and Veyoze
description: Step-by-step guide on setting up GitHub Actions to automate pull request provisioning with Veyoze, streamlining deployment and testing processes.
extends: _layouts.documentation
section: content
---
# Automating Pull Request Provisioning with GitHub Actions {#provisioning}

As we are documenting the Veyoze CLI, we picked GitHub as our preview environment because it is also used a lot by developers, but we are also working on supporting other platforms.   

## Creating the Workflow File

First, create the workflow file in your GitHub repository:

1. Go to the 'Actions' tab of your repository.
2. Choose to set up a workflow yourself.
3. This creates a new file under `.github/workflows/`. Name it `preview-provision.yml`.

## Workflow Configuration
Now let's start with this simple workflow ready for a Laravel project.
Assuming we have some changes in a branch named `add-user-notification`, we want to have a preview environment ready for us after we created a pull request for it. 

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


### Steps to Configure the Workflow

1. Add the complete script into `preview-provision.yml` in the `.github/workflows` directory.
2. Commit and push the changes to your GitHub repository.

## Utilizing the Workflow

Once set up, the workflow automatically runs based on the defined triggers. Monitor progress in the 'Actions' tab.
Given the workflow above, After the GitHub action is done running, we expect to have a site on our Forge server with domain `add-user-notification.veyoze.com`. 

## Troubleshooting

If issues arise:

- Check the workflow YAML file's format and location.
- Confirm that `FORGE_API_TOKEN` and `FORGE_SERVER_ID` are correctly configured.
- Review error messages or logs in the 'Actions' tab.
