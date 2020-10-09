<?php

if (!permission('posts', 'add')) {
    permission_page();
}

$categories = $db->from('categories')
    ->orderby('category_name', 'ASC')
    ->all();

if (post('submit')) {

    $post_title = post('post_title');
    $post_url = permalink(post('post_url'));
    if (!post('post_url')) {
        $post_url = permalink($post_title);
    }
    $post_content = post('post_content');
    $post_short_content = post('post_short_content');
    $post_categories = implode(',', post('post_categories'));
    $post_status = post('post_status');
    $post_tags = post('post_tags');
    $post_seo = json_encode(post('post_seo'));

    if (!$post_url || !$post_content || !$post_status || !$post_categories ) {
        $error = 'Please enter post name.';
    } else {

        // check if there is same subject
        $query = $db->from('posts')
            ->where('post_url', $post_url)
            ->first();

        if ($query) {
            $error = "There is already the same subject " . '<strong>' . $post_title . '</strong>';
        } else {

            $query = $db->insert('posts')
                ->set([
                    'post_title' => $post_title,
                    'post_url' => $post_url,
                    'post_content' => $post_content,
                    'post_short_content' => $post_short_content,
                    'post_categories' => $post_categories,
                    'post_seo' => $post_seo,
                    'post_status' => $post_status
                ]);

            if ($query) {

                $postId = $db->lastId();

                $post_tags = explode('\n', $post_tags);

                foreach ($post_tags as $tag) {
                    //check if there is tag or not
                    $row = $db->from('tags')
                        ->where('tag_url', permalink($tag))
                        ->first();
                }

                if (!$row) {
                    $tagInsert = $db->insert('tags')
                        ->set([
                           'tag_name' => $tag,
                           'tag_url' => permalink($tag)
                        ]);
                    $tagId = $db->lastId();
                } else {
                    $tagId = $row['tag_id'];
                }

                // is there a tag related to the subject?

                $row = $db->from('post_tags')
                    ->where('tag_post_id', $postId)
                    ->where('tag_id', $tagId)
                    ->first();

                if (!$row) {
                    $db->insert('post_tags')
                        ->set([
                            'tag_post_id' => $postId,
                            'tag_id' => $tagId
                        ]);
                } else {
                    $tagID = $row['tag_id'];
                }


                header('Location:' . admin_url('posts'));
            } else {
                $error = 'Something went wrong.';
            }

        }

    }

}

require admin_view('add_post');