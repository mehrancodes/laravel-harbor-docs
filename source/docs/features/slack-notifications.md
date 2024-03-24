---
title: Setting Up Slack Notifications for Harbor
description: Set up Slack notifications for your Harbor to receive deployment announcements. 
extends: _layouts.documentation
section: content
---

# Setting Up Slack Notifications for Harbor

## [Overview](#overview) {#overview}
This document outlines the steps required to enable Slack notifications for your Laravel Harbor. By following these instructions, you can ensure that deployment announcements are sent to a designated Slack channel whenever a deployment occurs.

![Slack app showing Laravel Harbor announcements](/assets/docs/slack-notifications/slack-app-showing-laravel-harbor-announcements.png)

## [Prerequisites](#prerequisites) {#prerequisites}
- Access to the Slack workspace where you want to receive deployment notifications.
- Permissions to create a Slack app and add it to channels.
- Access to the GitHub repository where your Laravel Harbor is hosted.

## [Step-by-Step Guide](#step-by-step-guide) {#step-by-step-guide}

### [Create a Slack App](#create-a-slack-app) {#create-a-slack-app}
Begin by creating a new Slack app within your Slack workspace.

### [Obtain OAuth Access Token](#obtain-oauth-access-token) {#obtain-oauth-access-token}
Once your Slack app is created, navigate to the app settings and locate the OAuth Access token. Copy the OAuth Access token provided for the newly created Slack app.

### [Add OAuth Access Token to GitHub Secrets](#add-oauth-access-token-to-gitHub-secrets) {#add-oauth-access-token-to-gitHub-secrets}
In your GitHub repository settings, navigate to the Secrets section. Create a new secret named `SLACK_BOT_USER_OAUTH_TOKEN` and paste the copied OAuth Access token.

### [Invite Slack App to Channel](#invite-slack-app-to-channel) {#invite-slack-app-to-channel}
Invite the Slack app you created to the Slack channel where you want to receive deployment announcements.

### [Invite Slack App to Channel](#invite-slack-app-to-channel) {#invite-slack-app-to-channel}
Open the `preview-provision.yml` workflow file in your Laravel Harbor. Add the following environment variables:
```yaml
SLACK_ANNOUNCEMENT_ENABLED: true
SLACK_BOT_USER_OAUTH_TOKEN: ${{ secrets.SLACK_BOT_USER_OAUTH_TOKEN }}
SLACK_CHANNEL: "#deployments"  # Replace this with the channel where you invited the Slack app
```

### [Test Deployment](#test-deployment) {#test-deployment}
After configuring the Slack notifications, perform a test deployment to ensure that notifications are sent successfully.

By following these steps, you will successfully set up Slack notifications for your Laravel Harbor, ensuring that you stay informed about deployments in your Slack workspace.