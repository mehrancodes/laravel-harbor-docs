---
title: Getting Started
description: Effortlessly create isolated preview environments.
extends: _layouts.documentation
section: content
---

# Veyoze {#introduction}

#### Get new features out faster by reducing testing time

## Introduction
In today's fast-paced software development world, the ability to quickly and efficiently test new features is a game-changer for teams aiming to maintain a competitive edge. Preview Environments serve as the critical testing grounds for new features, bug fixes, and updates before they are integrated into the main codebase. These environments are crafted on-demand to validate specific git branches, providing a transient yet powerful platform for thorough pre-merge testing.


### A Common Scenario without Using Preview Environments
Imagine John, a dedicated developer, eager to add a new feature to the project. He diligently starts making changes and pushes them to a new branch named `add-user-notification` in the project repository. Once his work is complete, he initiates a pull request and assigns it to his colleague for review.

At this juncture, John's colleague faces two testing options: either pull the branch and test it locally or merge the changes into the dev branch for shared environment testing. However, utilizing shared environments poses challenges. Every time changes are made, they must be merged with the dev branch for testing. If another developer, like David, wants to test their changes simultaneously, they must also merge to the dev branch, leading to two critical issues.

Firstly, David has to wait for John to finish testing before starting his own. Secondly, John's changes must be released only when the dev branch is unblocked and confirmed safe by David's changes. In larger development teams with over four developers, these conflicts and the waiting time for using shared environments can result in significant productivity costs.

### Veyoze: A Game-Changer in Development Efficiency
Enter Veyoze, a revolutionary CLI tool that transforms this cumbersome process. Now, when John creates a pull request, Veyoze seamlessly leverages GitHub Actions to provision a dedicated site on the Laravel Forge server. This site comes pre-configured with everything needed—database setup, seeders, task schedulers, and even a specific subdomain tailored to the pull request.

With Veyoze, developers can thoroughly test changes without merging to the main branch, eliminating conflicts and reducing waiting times. When the pull request is ready for release, a simple merge triggers Veyoze to efficiently clean up the site and associated resources from the Forge server.

Efficiency, collaboration, and speed—Veyoze is the missing piece in your development toolkit. 