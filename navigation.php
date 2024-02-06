<?php

return [
    'Introduction'    => 'docs/introduction',
    'Prerequisites'   => 'docs/prerequisites',
    'Getting Started' => [
        'url' => 'docs/getting-started',
        'children' => [
            'Provisioning Your Site' => 'docs/provision',
            'Tearing Down The Site'  => 'docs/teardown',
            'Veyoze Configuration'   => 'docs/configuration',
        ],
    ],
    'Examples' => [
        'children' => [
            'Use Veyoze with Laravel' => 'docs/veyoze-with-laravel'
        ]
    ]
];
