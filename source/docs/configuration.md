---
title: Veyoze Configuration
description: Explore the Veyoze configurations you can use in your workflow. 
extends: _layouts.documentation
section: content
---
# Configuration {#configuration}

### [Introduction](#introduction) {#introduction}
Veyoze utilizes environment keys similar to a Laravel application, offering flexibility and the potential for powerful extensions over time.
Using these keys, you can customize the way you provision or destroy a site.   

###### [FORGE_TOKEN](#forge-token) (required) {#forge-token}
This key holds your Forge API token, enabling Veyoze to communicate with Laravel Forge for site creation and resource management. **Always store this value as an encrypted secret; avoid pasting it directly into your workflow file.**

```yaml
FORGE_TOKEN: ${{ secrets.FORGE_TOKEN }}
```

###### [FORGE_SERVER](#forge-server) (required) {#forge-server}
Specify the server where Veyoze should create and deploy a site.  The value to use here is the Forge "Server ID" for the target server.  Examples: 723019, 68342, etc.

```yaml
FORGE_SERVER: 123456
```

###### [FORGE_GIT_REPOSITORY](#forge-git-repository) (required) {#forge-git-repository}
Indicate the Git repository name, such as 'mehrancodes/veyoze'.

```yaml
FORGE_GIT_REPOSITORY: ${{ github.repository }}
```

###### [FORGE_GIT_BRANCH](#forge-git-branch) (required) {#forge-git-branch}
Provide the Git repository branch name, for instance, 'add-new-feature'.

```yaml
FORGE_GIT_BRANCH: ${{ github.head_ref }}
```

###### [FORGE_DOMAIN](#forge-domain) (required) {#forge-domain}
Define the website's domain name. Acceptable formats include 'veyoze.com' or 'api.veyoze.com'.

```yaml
FORGE_DOMAIN: veyoze.com
```

[//]: # (###### [FORGE_GIT_PROVIDER]&#40;#forge-git-provider&#41; &#40;required&#41; {#forge-git-provider})

[//]: # (Identify the Git service provider. Options include GitHub, GitLab, etc., with 'github' as the default. Refer to the [Forge API documentation]&#40;https://forge.laravel.com/api-documentation#install-new&#41; for more details.)

[//]: # ()
[//]: # (```yaml)

[//]: # (FORGE_DOMAIN: github)

[//]: # (```)

###### [FORGE_SUBDOMAIN_PATTERN](#forge-subdomain-pattern) {#forge-subdomain-pattern}
Veyoze constructs the site's subdomain based on your branch name. If your branch name follows a format like **YOUR_TEAM_SHORT_NAME-TICKET_ID** (e.g., **apt-123-added-new-feature**), you can employ a [regex pattern](https://en.wikipedia.org/wiki/Regular_expression) to abbreviate your subdomain name to **apt-123**.

```yaml
FORGE_SUBDOMAIN_PATTERN: /^[a-z]{1,3}-(\d{1,4})/i
```

###### [SUBDOMAIN_NAME](#subdomain-name) {#subdomain-name}
Use this flag to manually set the Forge site subdomain. For example having a value of `pr-${{ github.event.number }}` aims to have a site name of `pr-123.YOUR_DOMAIN.com`.

```yaml
FORGE_DOMAIN: pr-${{ github.event.number }}
```

###### [FORGE_DEPLOY_SCRIPT](#forge-deploy-script) {#forge-deploy-script}
By setting the [Forge Deploy Script](https://forge.laravel.com/docs/sites/deployments.html#deploy-script) environment key, you can seamlessly relay your custom bash deploy script to your new Forge site before project deployment. Here's a basic deploy script example:

```yaml
FORGE_DEPLOY_SCRIPT: "cd $FORGE_SITE_PATH; git pull origin $FORGE_SITE_BRANCH; composer install;"
```

For improved workflow readability and manage your deploy script easier, consider using a [GitHub action variable](https://docs.github.com/en/actions/learn-github-actions/variables).

Consider storing the deploy script below in a variable, e.g., LARAVEL_DEPLOY_SCRIPT:
```bash
cd $FORGE_SITE_PATH
git pull origin $FORGE_SITE_BRANCH
composer install
```

Then reference it inside the workflow like this:
```yaml
FORGE_DEPLOY_SCRIPT: ${{ vars.LARAVEL_DEPLOY_SCRIPT }}
```

#### `FORGE_ENV_KEYS`
Employ this key to introduce or update your project's custom environment keys, separated by ';':

```bash
FORGE_ENV_KEYS="GOOGLE_API=${{secrets.APP_NAME}}; SMS_API=${{secrets.SMS_API}}"
```

Alternatively, as mentioned in the deploy script section, utilize a secret key for easier management:

```bash
FORGE_ENV_KEYS: ${{ secrets.LARAVEL_ENV_KEYS }}
```

###### [FORGE_NGINX_TEMPLATE](#forge-nginx-template) {#forge-nginx-template}
This key allows you to specify a custom [Nginx configuration](https://forge.laravel.com/docs/servers/nginx-templates.html) template. This is useful when you need to tweak the default Nginx settings to cater to specific requirements of your application.

```yaml
FORGE_NGINX_TEMPLATE: 1234
```

###### [FORGE_NGINX_VARIABLES](#forge-nginx-variables) {#forge-nginx-variables}
When creating a Nginx template, you can use this flag to specify a custom variable.
This is particularly handy when you need to automatically set values inside your Nginx template, such as proxying your Nuxt.js app to a specific port.
You may add as many variables as you like by separating them by a semicolon.

Given you want to add a custom variable to set your Nuxt.js port after you run the application.
In order to proxy the incoming requests from your Nginx template to the given port, you can assign a variable like **{{NUXT_CUSTOM_PORT}}** as a port number on the template.
Now you can add a randomly generated port number to the given flag in your workflow, like below: 

```yaml
FORGE_NGINX_VARIABLES: "NUXT_CUSTOM_PORT:8182"
```

[//]: # (###### [FORGE_PHP_VERSION]&#40;#forge-php-version&#41; {#forge-php-version})

[//]: # (Specify the desired PHP version for your application. The default is 'php82', but you can set it to other supported versions installed on your server as per your application's requirements.)

[//]: # ()
[//]: # (###### [FORGE_PROJECT_TYPE]&#40;#forge-project-type&#41; {#forge-project-type})

[//]: # (Indicate the [type of the project]&#40;https://forge.laravel.com/api-documentation#create-site&#41;. The default is 'php', but depending on your application's stack, you might need to specify a different type.)

[//]: # ()
[//]: # (###### [FORGE_SITE_ISOLATION]&#40;#forge-site-isolation&#41; {#forge-site-isolation})

[//]: # (A flag to determine if [user isolation]&#40;https://forge.laravel.com/docs/sites/user-isolation.html&#41; is required. By default, it's set to false.)

[//]: # ()
[//]: # (###### [FORGE_JOB_SCHEDULER]&#40;#forge-job-scheduler&#41; {#forge-job-scheduler})

[//]: # (This flag indicates whether a job scheduler, like Laravel's task scheduler, is needed. By default, it's set to false.)

[//]: # ()
[//]: # (###### [FORGE_AUTO_SOURCE_REQUIRED]&#40;#forge-auto-source-required&#41; {#forge-auto-source-required})

[//]: # (A flag to determine if environment variables should be auto-sourced during deployment. By default, it's set to false. Enable this if your deployment process requires environment variables to be sourced automatically.)

[//]: # ()
[//]: # (###### [FORGE_DB_CREATION_REQUIRED]&#40;#forge-db-creation-required&#41; {#forge-db-creation-required})

[//]: # (Indicate if a database should be automatically created during the provisioning process. By default, it's set to false.)

[//]: # ()
[//]: # (###### [FORGE_SSL_REQUIRED]&#40;#forge-ssl-required&#41; {#forge-ssl-required})

[//]: # (This flag indicates whether SSL certification should be enabled for the site. While the default setting is false, enabling this ensures your site is served securely over HTTPS.)

[//]: # ()
[//]: # (**Note**: If you enable this, ensure you've added [a wildcard subdomain DNS record]&#40;https://en.wikipedia.org/wiki/Wildcard_DNS_record&#41; pointing to your Forge server.)

[//]: # ()
[//]: # (###### [FORGE_QUICK_DEPLOY]&#40;#forge-quick-deploy&#41; {#forge-quick-deploy})

[//]: # (This flag allows you to toggle the [Quick Deploy]&#40;https://forge.laravel.com/docs/sites/deployments.html#deploy-script&#41; feature. By default, it's set to false.)

[//]: # ()
[//]: # (**Caution**: If you intend to enable this feature on your site, ensure the provision workflow isn't triggered.)

[//]: # ()
[//]: # (I've made the descriptions more concise and clear, and added emphasis where needed for clarity.)

[//]: # ()
[//]: # (###### [FORGE_WAIT_ON_SSL]&#40;#forge-wait-on-ssl&#41; {#forge-wait-on-ssl})

[//]: # (A flag to pause the provisioning process until the SSL setup completes. By default, it's set to true, ensuring that the provisioning doesn't proceed until the SSL is fully set up.)

[//]: # ()
[//]: # (###### [FORGE_WAIT_ON_DEPLOY]&#40;#forge-wait-on-deploy&#41; {#forge-wait-on-deploy})

[//]: # (This flag pauses the provisioning process until the site deployment completes. By default, it's true, ensuring a smooth and complete deployment before any subsequent steps.)

[//]: # ()
[//]: # (###### [FORGE_TIMEOUT_SECONDS]&#40;#forge-timeout-seconds&#41; {#forge-timeout-seconds})

[//]: # (This flag indicates how much time should be allowed for the deployment process. Defaults to 180 seconds.)

[//]: # ()
[//]: # (###### [GIT_TOKEN]&#40;#git-token&#41; {#git-token})

[//]: # (This flag is required in order to post a comment on the pull request. You may assign `${{ github.token }}` to it as the GitHub API token.)

[//]: # ()
[//]: # (###### [GIT_COMMENT_ENABLED]&#40;#git-comment-enabled&#41; {#git-comment-enabled})

[//]: # (This flag indicates if you would like to receive the site information in your pull request as a comment when provision is done. Defaults to false.)

[//]: # (You also need to set the `GIT_TOKEN` and `GIT_ISSUE_NUMBER` so this feature being able to work.)

[//]: # ()
[//]: # (###### [GIT_ISSUE_NUMBER]&#40;#git-issue-number&#41; {#git-issue-number})

[//]: # (This flag is required in order to post a comment on the pull request. You may assign `${{ github.event.number }}` to it as the GitHub pull request number.)