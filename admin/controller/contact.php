<?php

if(!permission('contact', 'show')){
    permission_page();
}


$totalRecord = $db->from('contact')->select('count(contact_id) as total')->total();


$pageLimit = 10;
$pageParam = 'page';
$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);

$query = $db->from('contact')
    ->join('users', 'users.user_id = contact.contact_read_user', 'left')
    ->orderBy('contact_id', 'DESC')
    ->limit($pagination['start'], $pagination['limit'])
    ->all();



require admin_view('contact');