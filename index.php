<?php

require __DIR__ . '/app/init.php';

$routeExplode = explode('?',$_SERVER['REQUEST_URI']);

$route = array_filter(explode('/', $routeExplode[0]));

if(SUBFOLDER){
    array_shift($route);
}

if(!route(0)){
    $route[0] = 'index';
}

if(!file_exists(controller(route(0)))){
    $route[0] = '404';
}

if(settings('maintenance_mode') == 1 && route(0) !='admin'){
    $route[0] = 'maintenance_mode';
}

require controller(route(0));