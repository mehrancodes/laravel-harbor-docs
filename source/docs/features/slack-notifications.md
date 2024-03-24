---
title: Setting Up Slack Notifications for Laravel Harbor
description: Set up Slack notifications for your Laravel Harbor to receive deployment announcements. 
extends: _layouts.documentation
section: content
---
Certainly! Here's an updated version of the document with meta title and meta description included:

# Setting Up Slack Notifications for Laravel Harbor

## Overview
This document outlines the steps required to enable Slack notifications for your Laravel Harbor CLI app. By following these instructions, you can ensure that deployment announcements are sent to a designated Slack channel whenever a deployment occurs.

## Prerequisites
- Access to the Slack workspace where you want to receive deployment notifications.
- Permissions to create a Slack app and add it to channels.
- Access to the GitHub repository where your Laravel Harbor CLI app is hosted.

## Step-by-Step Guide

1. **Create a Slack App:**
    - Begin by creating a new Slack app within your Slack workspace.

2. **Obtain OAuth Access Token:**
    - Once your Slack app is created, navigate to the app settings and locate the OAuth Access token.
    - Copy the OAuth Access token provided for the newly created Slack app.

3. **Add OAuth Access Token to GitHub Secrets:**
    - In your GitHub repository settings, navigate to the Secrets section.
    - Create a new secret named `SLACK_BOT_USER_OAUTH_TOKEN` and paste the copied OAuth Access token.

4. **Invite Slack App to Channel:**
    - Invite the Slack app you created to the Slack channel where you want to receive deployment announcements.

5. **Configure Environment Variables:**
    - Open the `preview-provision.yml` workflow file in your Laravel Harbor CLI app.
    - Add the following environment variables:
      ```yaml
      SLACK_ANNOUNCEMENT_ENABLED: true
      SLACK_BOT_USER_OAUTH_TOKEN: ${{ secrets.SLACK_BOT_USER_OAUTH_TOKEN }}
      SLACK_CHANNEL: "#deployments"  # Replace this with the channel where you invited the Slack app
      ```

6. **Test Deployment:**
    - After configuring the Slack notifications, perform a test deployment to ensure that notifications are sent successfully.

![Slack app showing Laravel Harbor announcements](/assets/docs/harbor-with-laravel/slack-app-showing-laravel-harbor-announcements.png)

By following these steps, you will successfully set up Slack notifications for your Laravel Harbor, ensuring that you stay informed about deployments in your Slack workspace.