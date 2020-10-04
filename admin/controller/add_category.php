<?php

if (!permission('categories', 'add')){
    permission_page();
}

if (post('submit')){

    $category_name = post('category_name');
    $category_url = permalink(post('category_url'));
    if (!post('category_url')) {
        $category_url = permalink($category_name);
    }
    $category_seo = json_encode(post('category_seo'));

    if (!$category_name || !$category_url){
        $error = 'Please enter category name.';
    } else {

        // check if there is same category
        $query = $db->from('categories')
            ->where('category_url', $category_url)
            ->first();

        if ($query){
            $error = "There is already the same category". '<strong>' . $category_name . '</strong>';
        } else {

            $query = $db->insert('categories')
                ->set([
                    'category_name' => $category_name,
                    'category_url' => $category_url,
                    'category_seo' => $category_seo
                ]);

            if ($query){
                header('Location:' . admin_url('categories'));
            } else {
                $error = 'Something went wrong.';
            }

        }

    }

}

require admin_view('add_category');