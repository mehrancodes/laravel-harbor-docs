---
title: Setting Up Slack Notifications for Site Provision
description: Automatically receive site information as a Slack notification when provisioning is completed 
extends: _layouts.documentation
section: content
---

# Slack Announcements on Site Provision

### [Overview](#overview) {#overview}
This document guides you through the process of setting up Slack announcements notification on site provision for your project. By following these instructions, you can automatically receive site information as a notification on the associated channel when provision is completed. This feature ensures better communication and visibility during the development process.

![Slack app showing Harbor announcements](/assets/docs/slack-app-showing-laravel-harbor-announcements.png)

#### [Create a Slack App](#create-a-slack-app) {#create-a-slack-app}
Begin by creating a new Slack app within your Slack workspace. Once your Slack app is created, obtain its OAuth Access token. Then, invite the Slack app you created into the channel where you want to announce the deployments.

#### [Add Slack OAuth Access Token to GitHub Secrets](#add-slack-oauth-access-token-to-gitHub-secrets) {#add-slack-oauth-access-token-to-gitHub-secrets}
Navigate to your GitHub repository settings and create a new secret with the OAuth Access token obtained from Slack.

#### [Configure Environment Variables](#configure-environment-variables) {#configure-environment-variables}
Edit the `preview-provision.yml` workflow file in your Laravel Harbor CLI app. Add the following environment variables:

```yaml
SLACK_ANNOUNCEMENT_ENABLED: true
SLACK_BOT_USER_OAUTH_TOKEN: ${{ secrets.SLACK_BOT_USER_OAUTH_TOKEN }}
SLACK_CHANNEL: "#deployments"  # Replace this with the channel where you invited the Slack app
```

#### Note:
The Slack Notification will only be sent when the site is first created. Subsequent pushes to the same PR won't trigger the notification.