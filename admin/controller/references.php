<?php

if(!permission('references', 'show')){
    permission_page();
}


$totalRecord = $db->from('reference')->select('count(reference_id) as total')->total();


$pageLimit = 10;
$pageParam = 'page';
$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);

$query = $db->from('reference')
    ->select('reference.*, GROUP_CONCAT(reference_categories.category_name SEPARATOR \' | \') as categories')
    ->join('reference_categories', 'FIND_IN_SET(%s.category_id, %s.reference_categories)')
    ->orderby('reference_id', 'DESC')
    ->limit($pagination['start'], $pagination['limit'])
    ->groupBy('reference_id')
    ->all();



require admin_view('references');