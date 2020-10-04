<?php

$tableName = post('table');
$whereColumnName = post('where');
$columnName = post('column');

foreach (post('id') as $index => $id){
    $db->update($tableName)
        ->where($whereColumnName, $id)
        ->set([
            $columnName => $index
        ]);
}

$json['success'] = 'Sort process are done.';