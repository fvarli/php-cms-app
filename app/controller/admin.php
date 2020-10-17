<?php

if (!route(1)) {
    $route[1] = 'index';
}

if (!file_exists(admin_controller(route(1)))) {
    $route[1] = 'index';
}

if (!session('user_rank') || session('user_rank') == 3) {
    $route[1] = 'login';
}

$menu_list = [
    [
        'url' => 'index',
        'title' => 'Home',
        'icon' => 'tachometer',
        'permissions' => [
            'show' => 'Show'
        ]
    ],
    [
        'url' => 'posts',
        'title' => 'Blog',
        'icon' => 'rss',
        'permissions' => [
            'show' => 'Show',
            'add' => 'Add',
            'edit' => 'Edit',
            'delete' => 'Delete'
        ],
        'submenu' => [
            [
                'url' => 'posts',
                'title' => 'Subjects',
            ],
            [
                'url' => 'tags',
                'title' => 'Tags',
                'permissions' => [
                    'show' => 'Show',
                    'add' => 'Add',
                    'edit' => 'Edit',
                    'delete' => 'Delete'
                ],
            ],
            [
                'url' => 'categories',
                'title' => 'Categories',
                'permissions' => [
                    'show' => 'Show',
                    'add' => 'Add',
                    'edit' => 'Edit',
                    'delete' => 'Delete'
                ],
            ],
            [
                'url' => 'comments',
                'title' => 'Comments',
                'permissions' => [
                    'show' => 'Show',
                    'edit' => 'Edit',
                    'delete' => 'Delete'
                ],
            ],
        ],
    ],
    [
        'url' => 'menu',
        'title' => 'Menu',
        'icon' => 'bars',
        'permissions' => [
            'show' => 'Show',
            'add' => 'Add',
            'edit' => 'Edit',
            'delete' => 'Delete'
        ]
    ],
    [
        'url' => 'pages',
        'title' => 'Pages',
        'icon' => 'file',
        'permissions' => [
            'show' => 'Show',
            'add' => 'Add',
            'edit' => 'Edit',
            'delete' => 'Delete'
        ]
    ],
    [
        'url' => 'references',
        'title' => 'References',
        'icon' => 'photo',
        'permissions' => [
            'show' => 'Show',
            'add' => 'Add',
            'edit' => 'Edit',
            'delete' => 'Delete'
        ],
        'submenu' => [
            [
                'url' => 'reference_categories',
                'title' => 'Categories',
                'permissions' => [
                    'show' => 'Show',
                    'add' => 'Add',
                    'edit' => 'Edit',
                    'delete' => 'Delete'
                ]
            ]
        ]
    ],
    [
        'url' => 'contact',
        'title' => 'Contact Messages',
        'icon' => 'envelope',
        'permissions' => [
            'show' => 'Show',
            'edit' => 'Edit',
            'send' => 'Send',
            'delete' => 'Delete'
        ]
    ],
    [
        'url' => 'users',
        'title' => 'Users',
        'icon' => 'user',
        'permissions' => [
            'show' => 'Show',
            'edit' => 'Edit',
            'delete' => 'Delete'
        ]
        //'submenu' => [
        //    'add_user' => 'Add User',
        //    'users' => 'User List'
        //]
    ],
    [
        'url' => 'settings',
        'title' => 'Settings',
        'icon' => 'cog',
        'permissions' => [
            'show' => 'Show',
            'edit' => 'Edit',
            'delete' => 'Delete'
        ]
    ]
];

require admin_controller(route(1));