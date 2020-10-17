<?php

$tag_url = route(2);

if (!$tag_url) {
    header('Location: ' . site_url('404'));
    exit;
}

$tag = $db->from('tags')
    ->where('tag_url', $tag_url)
    ->first();

if (!$tag) {
    header('Location: ' . site_url('404'));
    exit;
}

$seo = json_decode($tag['tag_seo'], true);

$meta = [
    'title' => $seo['title'] ? $seo['title'] : $tag['tag_name'],
    'description' => $seo['description'] ? $seo['description'] : null
];


$totalRecord = $db->from('post_tags')
    ->select('count(id) as total')
    ->where('tag_id', $tag['tag_id'])
    ->total();

$pageLimit = settings('tag_pagination');
$pageParam = 'page';
$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);

$query = $db->from('post_tags')
    ->select('posts.*, GROUP_CONCAT(category_name SEPARATOR ", ") as category_name, GROUP_CONCAT(category_url SEPARATOR ", ") as category_url')
    ->join('posts', 'posts.post_id = post_tags.tag_post_id')
    ->join('categories', 'FIND_IN_SET(categories.category_id, posts.post_categories)')
    ->where('tag_id', $tag['tag_id'])
    ->orderBy('post_id', 'DESC')
    ->groupBy('posts.post_id')
    ->limit($pagination['start'], $pagination['limit'])
    ->all();


require view('tag');
