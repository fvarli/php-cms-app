<?php

$json = [];

$api =  route(2);

if(!$api){
    exit;
}

if(file_exists(admin_controller(('api/'.$api)))){
    require admin_controller('api/'.$api);
}

echo json_encode($json);