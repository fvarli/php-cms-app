<?php

function admin_controller($controller_name){
    $controller_name = strtolower($controller_name);
    return PATH . '/admin/controller/' . $controller_name . '.php';
}

function admin_view($view_name){
    return PATH . '/admin/view/' . $view_name . '.php';
}