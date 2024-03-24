<?php

return [
    'Introduction'    => 'docs/introduction',
    'Prerequisites'   => 'docs/prerequisites',
    'Getting Started' => [
        'url' => 'docs/getting-started',
        'children' => [
            'Provisioning Your Site' => 'docs/provision',
            'Tearing Down The Site'  => 'docs/teardown',
            'Harbor Configuration'   => 'docs/configuration',
        ],
    ],
    'Examples' => [
        'children' => [
            'Use Harbor With Laravel' => 'docs/harbor-with-laravel'
        ]
    ],
    'Features' => [
        'children' => [
            'Slack Announcement Notifications' => 'docs/features/slack-announcement-notifications',
            'GitHub Announcement Comments' => 'docs/features/github-announcement-comments',
            'Inertia SSR Support' => 'docs/features/enable-inertia-ssr',
        ]
    ]
];
