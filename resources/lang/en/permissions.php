<?php

return [
    'access' => [
        'backend' => [
            'display_name' => 'Backoffice access',
            'description' => 'Can access to administration pages',
        ],
    ],

    'manage' => [
        'users' => [
            'display_name' => 'Manage users',
            'description' => 'Can manage all users (create, update, delete)',
        ],

        'roles' => [
            'display_name' => 'Manage roles',
            'description' => 'Can manage all roles (create, update, delete)',
        ],

        'metas' => [
            'display_name' => 'Manage metas',
            'description' => 'Can manage all metas (create, update, delete)',
        ],
    ],

    'impersonate' => [
        'display_name' => 'Impersonate user',
        'description' => 'Can take ownership of others user identities. Useful for tests.',
    ],
];
