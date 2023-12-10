---
title: Prerequisites
description: Essential prerequisites for setting up Veyoze CLI
extends: _layouts.documentation
section: content
---

# Prerequisites for Veyoze CLI {#prerequisites}

## Overview

Before you begin using the Veyoze CLI, it's essential to ensure that you have the necessary environment set up. This page outlines the prerequisites required for a smooth experience with Veyoze CLI.

## 1. Create Server on Forge

The Veyoze CLI relies on a [dedicated app server hosted on Forge](https://forge.laravel.com/docs/servers) to function correctly.

### Steps to Set Up:
- **Sign Up for Forge:** If you don't already have an account, [sign up for Forge](https://forge.laravel.com/auth/register).
- **Create a New App Server:** Once logged in, navigate to the server creation page and follow the instructions to set up a new app server.
- **Configure Your Server:** Customize the server settings according to your application's requirements, including memory allocation, storage, and network configurations.
- **Deploy the Server:** After configuration, deploy the server. Ensure it's running smoothly by checking its status in the Forge dashboard.
- **Obtain Server ID:** Note down the server ID provided by Forge. This ID is essential for configuring the Veyoze CLI to communicate with your server.

## 2. Forge API Token

A Forge API token is required to authenticate and authorize your interactions with the Forge platform through the Veyoze CLI. This token ensures secure communication between Veyoze CLI and the Forge services.

### Steps to Obtain and Secure:
- **Access Forge Dashboard:** Log in to your Forge account and access the dashboard.
- **Navigate to API Management:** Find the [API section](https://forge.laravel.com/docs/accounts/api.html) where you can manage and create new API tokens.
- **Create a New Token:** Select the option to create a new token.
- **Copy and Secure Your Token:** Once the token is generated, instead of keeping it in your local environment, store it as a GitHub Action secret. This method ensures that the token is encrypted and only exposed to GitHub Actions during runtime, enhancing security.

### Using GitHub Actions Secret:
- **Go to GitHub Repository:** Navigate to your GitHub repository associated with the project.
- **Access Secrets:** In the repository settings, find the 'Secrets' section.
- **Add New Secret:** Create a new secret and name it appropriately (e.g., `FORGE_API_TOKEN`).
- **Paste the Token:** Copy your Forge API token and paste it into the secret's value field.

## Conclusion

Having these prerequisites in place, including a secure method for storing your Forge API token and the server ID for your Forge app server, is crucial for using the Veyoze CLI effectively. With your app server on Forge set up, your API token securely stored as a GitHub Action secret, and the server ID at hand, you're all set to start using the Veyoze CLI to its full potential.