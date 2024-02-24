---
title: Use Harbor with Laravel
description: Previewing a Laravel Project with Harbor 
extends: _layouts.documentation
section: content
---
# Previewing a Laravel Project with Harbor

The goal of this example is to show you how to automate the site provisioning and deployment on staging servers for your Laravel projects using the Laravel Forge. We use GitHub Action workflows to trigger the Harbor when we create or merge a Pull Request with our new changes to automatically create the site on the server.

## [Get Laravel Forge ready](#prepare-larave-forge-server) {#prepare-larave-forge-server}

Let's start by making sure your Laravel Forge server is ready for previewing. Using Harbor, a robust wrapper for Laravel Forge, simplifies your site creation process. For your server's prerequisites, [click here](https://laravel-harbor.com/docs/prerequisites/).

## [Setting up the project for deployment](#setting-up-the-project-for-deployment) {#setting-up-the-project-for-deployment}

Once you've got Laravel Forge set up, you're ready to get your Laravel project up and running quickly. It's pretty easy to customize the Harbor site creation and deployment process. Harbor lets us easily configure it via the environment keys it uses to provision our site. Some of them are required, like the Forge token and the Forge server ID. Other optional keys are to help with various challenges we might run into during the provision.

Let’s start by adding our first GItHub workflow. For our Laravel project, we'd add a new file called "preview-provision.yml" under '.github/workflows/'. Know more about [GitHub workflows.](https://docs.github.com/en/actions/using-workflows)

```yaml
name: preview-provision
on:
  pull_request:
    types: [opened, edited, reopened, ready_for_review]
jobs:
  harbor-provision:
		if: |
      github.event.pull_request.draft == false &&
      (
          (
              contains(github.event.pull_request.title, '[harbor]') &&
              contains(fromJson('["opened", "reopened", "synchronize", "ready_for_review"]'), github.event.action)
          ) ||
          (
              github.event.action == 'edited' &&
              contains(github.event.pull_request.title, '[harbor]') &&
              github.event.changes.title.from &&
              !contains(github.event.changes.title.from, '[harbor]')
          )
      )
    runs-on: ubuntu-latest
    container:
      image: kirschbaumdevelopment/laravel-test-runner:8.1
    steps:
      - name: Install Harbor via Composer
        run: composer global require mehrancodes/laravel-harbor -q
      - name: Start Provisioning
        env:
            FORGE_TOKEN: ${{ secrets.FORGE_API_TOKEN }}
            FORGE_SERVER: ${{ secrets.FORGE_SERVER_ID }}
            FORGE_GIT_REPOSITORY: ${{ github.repository }}
            FORGE_GIT_BRANCH: ${{ github.head_ref }}
            FORGE_DOMAIN: laravel-harbor.com
        run: harbor provision
```

Adding "**[harbor]**" to the title of a pull request lets us create a site when we create a new pull request or edit an existing one. It also handles deploying new changes coming to our pull request. You can trigger the workflow however you want.

Up to this time, Harbor knows which Forge server to create sites on, as well the domain to use. Harbor by default uses the branch name passed to **FORGE_GIT_BRANCH** as the subdomain for your site. The good news is there are also options like **[FORGE_SUBDOMAIN_PATTERN](https://laravel-harbor.com/docs/configuration/#forge-subdomain-pattern)** and **[FORGE_DOMAIN](https://laravel-harbor.com/docs/configuration/#subdomain-name)** to customize the subdomain name. In this example, we use [SUBDOMAIN_NAME](https://laravel-harbor.com/docs/configuration/#subdomain-name) to pass a custom subdomain starting with ‘pr-’ and the id of our pull request. We add this new environemnt key under the `env` before running the **harbor provision** command:

So far, Harbor knows which Forge server to create sites on, as well as the domain to use. By default, Harbor uses the branch name passed to **FORGE_GIT_BRANCH** as the subdomain name. Luckily, there are options like **[FORGE_SUBDOMAIN_PATTERN](https://laravel-harbor.com/docs/configuration/#forge-subdomain-pattern)** and **[SUBDOMAIN_NAME](https://laravel-harbor.com/docs/configuration/#subdomain-name)** to customize it. Here, we're going to use SUBDOMAIN_NAME to pass in a custom subdomain that starts with 'pr-' and our pull request id. We add this new environment key under 'env':

```yaml
    ...
    FORGE_GIT_BRANCH: ${{ github.head_ref }}
    FORGE_DOMAIN: laravel-harbor.com
**+   SUBDOMAIN_NAME: pr-${{ github.event.number }}**
```

Assuming our pull request number is 11, we'd have [**pr-11.laravel-harbor.com**](http://pr-11.laravel-harbor.com/) as our subdomain when site creation is done.

If you don't want to use the default PHP version used by the Laravel Forge, you could define your own. To do so, set **[FORGE_PHP_VERSION](https://laravel-harbor.com/docs/configuration/#forge-php-version)** to a version that is already installed on your Forge server.

```yaml
FORGE_PHP_VERSION: php83
```

If you'd like to specify some environment keys for your Laravel project, Harbor makes it easy with [**FORGE_ENV_KEYS**](https://laravel-harbor.com/docs/configuration/#forge-env-keys). Multiple keys can be separated by a semicolon:

```yaml
FORGE_ENV_KEYS: "GOOGLE_API=${{secrets.GOOGLE_API}}; SMS_API=${{secrets.SMS_API}}"
```

Let's tell Harbor to create a database for our project and update our database credentials environment keys. Furthermore, we enable SSL for our subdomain, enable the job scheduler, and give our custom deploy script:

```yaml
FORGE_SSL_REQUIRED: true
FORGE_JOB_SCHEDULER: true
FORGE_DB_CREATION_REQUIRED: true
FORGE_DEPLOY_SCRIPT: "cd $FORGE_SITE_PATH; git pull origin $FORGE_SITE_BRANCH; composer install;"
```

Last but not least, you might want to tell Harbor to send you the site's link and database info in your pull request when it's done.

```yaml
GIT_COMMENT_ENABLED: GIT_COMMENT_ENABLED
GIT_TOKEN: ${{ github.token }}
GIT_ISSUE_NUMBER: ${{ github.event.number }}`
```

Once you've got these keys in your workflow, you'll see your site info like this:

![Harbor site info comment on pull requests](/assets/docs/harbor-with-laravel/harbor-site-info-comment-on-pull-requests.png)

After you add '[harbor]' to your pull request, the workflow 'preview-provision' should be triggered to provision the site, and update it every time you commit a new change.

## [Start tearing down the site](#start-tearing-down-the-site) {#start-tearing-down-the-site}

Once the quality assurance for the new changes got done, it’s time to merge the pull request, and of course, erase the site we made for the pull request. Let’s add a new workflow named “preview-teardown.yml” under the directory ‘.github/workflows/’ to tell Harbor make this process automated for us!

```yaml
name: preview-teardown
on:
  pull_request:
    types: [closed]
jobs:
  harbor-teardown:
		if: |
      github.event.pull_request.draft == false &&
      (
          (
              contains(github.event.pull_request.title, '[harbor]') &&
              github.event.action == 'closed'
          ) ||
          (
              github.event.action == 'edited' &&
              contains(github.event.changes.title.from, '[harbor]') &&
              !contains(github.event.pull_request.title, '[harbor]')
          )
      )
    runs-on: ubuntu-latest
    container:
      image: kirschbaumdevelopment/laravel-test-runner:8.1
    steps:
      - name: Install Harbor
        run: composer global require mehrancodes/harbor -q
      - name: Start Teardown
        env:
          FORGE_TOKEN: ${{ secrets.FORGE_TOKEN }}
          FORGE_SERVER: ${{ secrets.FORGE_SERVER }}
          FORGE_GIT_REPOSITORY: ${{ github.repository }}
          FORGE_GIT_BRANCH: ${{ github.head_ref }}
          FORGE_DOMAIN: laravel-harbor.com
					SUBDOMAIN_NAME: pr-${{ github.event.number }}
        run: harbor teardown
```

As you may have noticed, the workflow is almost the same as the preview-provision.yml workflow, but it only runs when we close or merge a pull request that contains the ‘[harbor]’ in the title. We also need to have the environment key **SUBDOMAIN_NAME** to tell the Harbor which available site we want to tear down.

In summary, Harbor is your go-to tool for effortlessly previewing Laravel projects. This tutorial has provided a step-by-step guide on server setup, project configuration, and teardown. However, our exploration doesn't end here. We're committed to covering a variety of examples beyond Laravel projects. If you have a specific use case in mind, feel free to open an issue on the Harbor GitHub repository. Your input shapes our content, ensuring it remains relevant and valuable to the development community. Stay tuned for more tutorials, tips, and examples as we navigate the ever-evolving world of web development. Happy coding!
