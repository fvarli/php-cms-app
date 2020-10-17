<?php

if (route(1) == 'category') {
    require controller('blog_category');
} elseif (route(1) == 'search'){
    require controller('search');
}elseif (route(1) == 'tag'){
    require controller('tag');
} else {

    if ($post_url = route(1)) {
        require controller('blog_detail');
    } else {

        $meta = [
            'title' => settings('blog_title'),
            'description' => settings('blog_description'),
            'keywords' => settings('keywords')
        ];

        $totalRecord = $db->from('posts')
            ->select('count(post_id) as total')
            ->where('post_status', 1)
            ->total();

        $pageLimit = settings('blog_pagination');
        $pageParam = 'page';
        $pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);

        $query = $db->from('posts')
            ->select('posts.*, GROUP_CONCAT(category_name SEPARATOR ", ") AS category_name, GROUP_CONCAT(category_url SEPARATOR ", ") AS category_url ')
            ->join('categories', 'FIND_IN_SET(categories.category_id, posts.post_categories)')
            ->where('post_status', 1)
            ->groupBy('posts.post_id')
            ->orderBy('post_id', 'DESC')
            ->limit($pagination['start'], $pagination['limit'])
            ->all();

        require view('blog');
    }

}