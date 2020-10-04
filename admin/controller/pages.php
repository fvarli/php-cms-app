<?php

if(!permission('pages', 'show')){
    permission_page();
}


$totalRecord = $db->from('pages')->select('count(pages_id) as total')->total();


$pageLimit = 10;
$pageParam = 'page';
$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);

$query = $db->from('pages')
    ->orderBy('pages_id', 'DESC')
    ->limit($pagination['start'], $pagination['limit'])
    ->all();



require admin_view('pages');