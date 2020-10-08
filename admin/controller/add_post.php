<?php

if (!permission('posts', 'add')){
    permission_page();
}

$categories = $db->from('categories')
    ->orderby('category_name', 'ASC')
    ->all();

if (post('submit')){

    $post_title = post('post_title');
    $post_url = permalink(post('post_url'));
    if (!post('post_url')) {
        $post_url = permalink($post_title);
    }
    $post_content = post('post_content');
    $post_seo = json_encode(post('post_seo'));

    if (!$post_seo || !$post_content){
        $error = 'Please enter page name.';
    } else {

        // check if there is same page
        $query = $db->from('posts')
            ->where('post_url', $post_url)
            ->first();

        if ($query){
            $error = "There is already the same page". '<strong>' . $post_title . '</strong>';
        } else {

            $query = $db->insert('posts')
                ->set([
                    'post_title' => $post_title,
                    'post_content' => $post_content,
                    'post_url' => $post_url,
                    'post_seo' => $post_seo
                ]);

            if ($query){
                header('Location:' . admin_url('posts'));
            } else {
                $error = 'Something went wrong.';
            }

        }

    }

}

require admin_view('add_post');