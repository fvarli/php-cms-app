<?php

if(!route(1)){
    $route[1] = 'index';
}

if(!file_exists(admin_controller(route(1)))){
    $route[1] = 'index';
}


$menu_list = [
    'index' => [
        'title' => 'Home',
        'icon' => 'tachometer'
    ],
    'menu' => [
        'title' => 'Menu',
        'icon' => 'bars'
    ],
    'users' =>[
        'title' => 'Users',
        'icon' => 'user'
        //'submenu' => [
        //    'add_user' => 'Add User',
        //    'users' => 'User List'
        //]
    ],

    'settings' => [
        'title' => 'Settings',
        'icon' => 'cog'
    ]
];

require admin_controller(route(1));