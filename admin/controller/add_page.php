<?php

if (!permission('pages', 'add')){
    permission_page();
}

if (post('submit')){

    $page_title = post('page_title');
    $page_url = permalink(post('page_url'));
    if (!post('page_url')) {
        $page_url = permalink($page_title);
    }
    $page_content = post('page_content');
    $page_seo = json_encode(post('page_seo'));

    if (!$page_title || !$page_url || !$page_content){
        $error = 'Please enter category name.';
    } else {

        // check if there is same page
        $query = $db->from('pages')
            ->where('page_url', $page_url)
            ->first();

        if ($query){
            $error = "There is already the same page". '<strong>' . $page_title . '</strong>';
        } else {

            $query = $db->insert('categories')
                ->set([
                    'page_title' => $page_title,
                    'page_content' => $page_content,
                    'page_url' => $page_url,
                    'page_seo' => $page_seo
                ]);

            if ($query){
                header('Location:' . admin_url('pages'));
            } else {
                $error = 'Something went wrong.';
            }

        }

    }

}

require admin_view('add_page');