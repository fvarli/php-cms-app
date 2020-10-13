<?php

$table = get('table');
$column = get('column');
$id = get('id');

if(!permission($table, 'delete')){
    permission_page();
}

$query = $db->delete($table)
    ->where($column, $id)
    ->done();

if($table == 'posts'){
    if ($query){
        $db->delete('post_tags')
            ->where('tag_post_id', $id)
            ->done();
    }
}

header('Location:' . $_SERVER['HTTP_REFERER']);
exit;