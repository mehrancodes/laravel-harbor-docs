---
title: Prerequisites
description: Essential prerequisites for setting up Harbor CLI
extends: _layouts.documentation
section: content
---

# Prerequisites for Harbor CLI {#prerequisites}

## Overview

Before you begin using the Harbor CLI, it's essential to ensure that you have the necessary environment set up. This page outlines the prerequisites required for a smooth experience with Harbor CLI.

## 1. Create Server on Forge

The Harbor CLI relies on a [dedicated app server hosted on Forge](https://forge.laravel.com/docs/servers) to function correctly.

### Steps to Set Up:
- **Sign Up for Forge:** If you don't already have an account, [sign up for Forge](https://forge.laravel.com/auth/register).
- **Create a New App Server:** Once logged in, navigate to the server creation page and follow the instructions to set up a new app server.
- **Configure Your Server:** Customize the server settings according to your application's requirements, including memory allocation, storage, and network configurations.
- **Deploy the Server:** After configuration, deploy the server. Ensure it's running smoothly by checking its status in the Forge dashboard.
- **Obtain Server ID:** Note down the server ID provided by Forge. This ID is essential for configuring the Harbor CLI to communicate with your server.

## 2. Forge Organization Slug

Harbor v2 requires your Forge **organization slug** so API calls are scoped correctly.

### Steps to obtain:
- **Log in to Forge:** Open [forge.laravel.com](https://forge.laravel.com) and select your organization.
- **Copy the slug from the URL:** `https://forge.laravel.com/orgs/{slug}` — use `{slug}` as the value for `FORGE_ORGANIZATION`.

Store it as a GitHub Actions secret named `FORGE_ORGANIZATION`, or as a repository variable if the slug is not sensitive.

## 3. Forge API Token

A Forge API token is required to authenticate Harbor with Forge.

### Steps to obtain and secure:
- **Access Forge Dashboard:** Log in to your Forge account.
- **Navigate to API Management:** Find the [API section](https://forge.laravel.com/docs/accounts/api.html) where you can manage and create tokens.
- **Create a New Token:** Enable the Forge scopes Harbor uses — see the [scope table](/docs/configuration#forge-organization) on the configuration page. At minimum: `organization:view`, `server:view`, `site:create`, `site:delete`, `site:manage-project`, `site:manage-deploys`.
- **Store as a GitHub secret:** Create a repository secret named `FORGE_TOKEN` and paste the token value.

### GitHub Actions secrets to configure

| Secret name | Used as workflow env | Purpose |
|---|---|---|
| `FORGE_TOKEN` | `FORGE_TOKEN` | Forge API authentication |
| `FORGE_SERVER` | `FORGE_SERVER` | Target Forge server ID |
| `FORGE_ORGANIZATION` | `FORGE_ORGANIZATION` | Forge organization slug |

> **Upgrading from v1?** If your secrets are still named `FORGE_API_TOKEN` or `FORGE_SERVER_ID`, rename them or map them in your workflow. See [Upgrading to v2](/docs/upgrade-to-v2).

## Conclusion

With your Forge server, organization slug, and API token stored as GitHub secrets, you are ready to provision and tear down preview sites with Harbor.