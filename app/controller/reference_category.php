<?php

$seo = json_decode($curr_category['category_seo'], true);

$meta = [
    'title' => $seo['title'] ? $seo['title'] : $curr_category['category_name'],
    'description' => $seo['description'] ? $seo['description'] : null
];

$query = $db->from('reference')
    ->select('reference.*, GROUP_CONCAT(reference_categories.category_name SEPARATOR \' | \') as categories')
    ->join('reference_categories', 'FIND_IN_SET(%s.category_id, %s.reference_categories)')
    ->findInSetReverse('reference_categories', $curr_category['category_id'])
    ->orderby('reference_id', 'DESC')
    ->groupBy('reference_id')
    ->all();

require view('reference_category');