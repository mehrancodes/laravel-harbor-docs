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
            'Use Harbor with Laravel' => 'docs/harbor-with-laravel'
        ]
    ]
];
