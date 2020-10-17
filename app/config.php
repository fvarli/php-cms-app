<?php

define('PATH', realpath('.'));
define('SUBFOLDER', true);
define('SUBFOLDER_NAME', trim(dirname($_SERVER['SCRIPT_NAME']), '/'));
define('URL', 'http://'. $_SERVER['SERVER_NAME'] . '/' . (SUBFOLDER_NAME == '/' ? null : SUBFOLDER_NAME ));


return [
    'db' => [
        'name' => 'php_cms_app',
        'host' => 'localhost',
        'user' => 'root',
        'pass' => ''
    ]
];