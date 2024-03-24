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
            'Slack Notifications' => 'docs/features/slack-notifications'
        ]
    ]
];
