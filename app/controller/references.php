<?php

$categories = $db->from('reference_categories')
    ->orderBy('category_order', 'ASC')
    ->all();

if (route(1)){

    $curr_category = null;
    foreach ($categories as $category){
        if ($category['category_url'] == route(1)){
            $curr_category = $category;
        }
    }
    if (!$curr_category){
        header('Location:' . site_url('references'));
        exit;
    }
    require controller('reference_category');

} else {

    $meta = [
        'title' => settings('reference_title'),
        'description' => settings('reference_description')
    ];

    $query = $db->from('reference')
        ->select('reference.*, GROUP_CONCAT(reference_categories.category_name SEPARATOR \' | \') as categories')
        ->join('reference_categories', 'FIND_IN_SET(%s.category_id, %s.reference_categories)')
        ->orderby('reference_id', 'DESC')
        ->groupBy('reference_id')
        ->all();

    require view('references');

}