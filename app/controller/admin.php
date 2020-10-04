<?php

if(!route(1)){
    $route[1] = 'index';
}

if(!file_exists(admin_controller(route(1)))){
    $route[1] = 'index';
}

if (!session('user_rank') || session('user_rank') == 3){
    $route[1] = 'login';
}

$menu_list = [
    'index' => [
        'title' => 'Home',
        'icon' => 'tachometer',
        'permissions' => [
            'show' => 'Show'
        ]
    ],
    'menu' => [
        'title' => 'Menu',
        'icon' => 'bars',
        'permissions' => [
            'show' => 'Show',
            'add'  => 'Add',
            'edit' => 'Edit',
            'delete' => 'Delete'
        ]
    ],
    'categories' => [
        'title' => 'Categories',
        'icon' => 'folder',
        'permissions' => [
            'show' => 'Show',
            'add'  => 'Add',
            'edit' => 'Edit',
            'delete' => 'Delete'
        ]
    ],
    'contact' => [
        'title' => 'Contact Messages',
        'icon' => 'envelope',
        'permissions' => [
            'show' => 'Show',
            'edit'  => 'Edit',
            'send' => 'Send',
            'delete' => 'Delete'
        ]
    ],
    'users' =>[
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

    'settings' => [
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