---
title: Getting Started
description: Getting started with Jigsaw's docs starter template is as easy as 1, 2, 3.
extends: _layouts.documentation
section: content
---

# Getting Started {#getting-started}

This guide details how to automate the provisioning of pull requests on GitHub using GitHub Actions, focusing on Veyoze for environment provisioning. It's ideal for projects needing automated deployment or testing environments for each pull request.

## Prerequisites

Before starting, ensure you have:

1. **GitHub Repository**: Your project should be hosted in a GitHub repository.
2. **GitHub Actions**: GitHub Actions must be enabled for your repository.
3. **Configured Secrets**: `FORGE_API_TOKEN` and `FORGE_SERVER_ID` should be set up in your GitHub repository settings.
