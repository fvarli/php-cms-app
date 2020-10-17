<?php

if(!get('query')){
    header('Location:' . site_url('blog'));
    exit;
}

$meta = [
    'title' => sprintf(settings('search_title'), get('query')),
    'description' => sprintf(settings('search_description'), get('query'))
];

$totalRecord = $db->from('posts')
    ->select('count(DISTINCT post_id) as total')
    ->join('categories', 'FIND_IN_SET(categories.category_id, posts.post_categories)')
    ->where('post_status', 1)
    ->total();

$pageLimit = settings('search_pagination');
$pageParam = 'page';
$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);

$query = $db->from('posts')
    ->select('posts.*, GROUP_CONCAT(category_name SEPARATOR ", ") as category_name, GROUP_CONCAT(category_url SEPARATOR ", ") as category_url')
    ->join('categories', 'FIND_IN_SET(categories.category_id, posts.post_categories)')
    ->where('post_status', 1)
    ->group(function ($db){
        $db->where('post_title', get('query'), 'LIKE')
            ->or_where('post_content', get('query'), 'LIKE')
            ->or_where('post_short_content', get('query'), 'LIKE');
    })
    ->groupby('posts.post_id')
    ->orderby('post_id', 'DESC')
    ->limit($pagination['start'], $pagination['limit'])
    ->all();

// TODO get two categories in one post

require view('blog_search');