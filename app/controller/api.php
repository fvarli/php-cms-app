<?php

$json = [];

$api =  route(1);

if(!$api){
    exit;
}

if(file_exists(controller(('api/'.$api)))){
    require controller('api/'.$api);
}

echo json_encode($json);