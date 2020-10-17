<?php

if (!permission('comments', 'show')){
    permission_page();
}

$totalRecord = $db->from('comments')
    ->select('count(comment_id) as total');
if ($status = get('status')){
    $totalRecord = $db->where('comment_status', ($status == 2 ? 0 : $status));
}
$totalRecord = $db->total();

$pageLimit = 10;
$pageParam = 'page';
$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);

$query = $db->from('comments')
    ->join('posts', '%s.post_id = %s.comment_post_id')
    ->join('users', '%s.user_id = %s.comment_user_id', 'left');
if ($status = get('status')){
    $query = $db->where('comment_status', ($status == 2 ? 0 : $status));
}
$query = $db->orderby('comment_id', 'DESC')
    ->limit($pagination['start'], $pagination['limit'])
    ->all();

require admin_view('comments');