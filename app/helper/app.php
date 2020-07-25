<?php

function controller($controller_name){
    $controller_name = strtolower($controller_name);
    return PATH . '/app/controller/' . $controller_name . '.php';
}

function view($view_name){
    return PATH . '/app/view/' . settings('theme') . '/' . $view_name . '.php';
}

function route($index){
    global $route;
    return isset($route[$index]) ? $route[$index] : false;
}

function settings($name){
    global $settings;
    return isset($settings[$name]) ? $settings[$name] : false;
}