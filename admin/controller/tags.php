<?php

if (!permission('tags', 'show')){
    permission_page();
}

$totalRecord = $db->from('tags')
    ->select('count(tags.tag_id) as total')
    ->total();

$pageLimit = 10;
$pageParam = 'page';
$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);

$query = $db->from('tags')
    ->select('tags.*, COUNT(post_tags.id) as total')
    ->join('post_tags', '%s.tag_id = %s.tag_id', 'left')
    ->groupby('tags.tag_id')
    ->orderby('tag_id', 'DESC')
    ->limit($pagination['start'], $pagination['limit'])
    ->all();

require admin_view('tags');