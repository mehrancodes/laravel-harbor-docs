---
title: GitHub PR Announcement Comments on Site Provision
description: Automatically receive site information as a comment on GitHub pull requests when provisioning is completed 
extends: _layouts.documentation
section: content
---

# GitHub PR Comment on Site Provision

### [Overview](#overview) {#overview}
This document outlines the steps required to enable GitHub pull request (PR) announcement comments on site provision for your project. By following these instructions, you can automatically receive site information as a comment on the associated pull request when provision is completed. This feature ensures better communication and visibility during the development process.

![Harbor site info comment on pull requests](/assets/docs/harbor-site-info-comment-on-pull-requests.png)

#### [Provision Workflow Configuration](#provision-workflow-configuration) {#provision-workflow-configuration}
To integrate GitHub pull request announcement comments into your provision workflow, follow these steps:

- Open your project's provision workflow file (e.g., `provision.yml`).
- Add the following environment variables to the workflow configuration:
```yaml
GIT_COMMENT_ENABLED: true
GIT_TOKEN: ${{ github.token }} # Required to post a comment on the pull request
GIT_ISSUE_NUMBER: ${{ github.event.number }} # Required to post a comment on the pull request
```
- Ensure that the `GIT_COMMENT_ENABLED` flag is set to `true` to enable PR announcement comments.
- Save and commit the changes to your repository.

#### Note:
GitHub pull request announcement comments will be sent only when the site is first created. Subsequent pushes to the same pull request won't trigger the notification.
