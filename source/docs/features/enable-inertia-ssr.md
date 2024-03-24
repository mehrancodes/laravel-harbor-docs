---
title: Enable Inertia.js SSR via Harbor
description: Enable Server-Side Rendering for Inertia.js applications using Harbor 
extends: _layouts.documentation
section: content
---

# Enabling Inertia.js SSR

## [Overview](#overview) {#overview}
This documentation page provides instructions on enabling Server-Side Rendering (SSR) for Inertia.js applications using Harbor. SSR enhances the performance and SEO capabilities of your Inertia.js applications by rendering pages on the server-side before sending them to the client.

### [Add Environment Variable For Provision](#add-environment-variable-for-provision) {#add-environment-variable-for-provision}
In your preview provisioning GitHub workflow file (`/.github/workflows/preview-provision.yml`), add the following environment variable:

```yaml
env:
 INERTIA_SSR_ENABLED: true
```

This environment variable instructs Harbor to enable SSR for your Inertia.js application.

### [Update Teardown Workflow](#update-teardown-workflow) {#update-teardown-workflow}
Ensure that when tearing down the preview environment, you include the `INERTIA_SSR_ENABLED=true` environment variable in your teardown workflow.