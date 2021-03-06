<?php

if (!permission('posts', 'edit')) {
    permission_page();
}


$id = get('id');
if (!$id) {
    header('Location:' . admin_url('posts'));
    exit;
}

if (!empty($db)) {
    $row = $db->from('posts')
        ->where('post_id', $id)
        ->first();
}
if (!$row) {
    header('Location:' . admin_url('posts'));
    exit;
}

$categories = $db->from('categories')
    ->orderby('category_name', 'ASC')
    ->all();

$allTags = $db->from('tags')
    ->orderby('tag_id', 'DESC')
    ->all();
$tagsArr = [];
foreach ($allTags as $allTag) {
    $tagsArr[] = trim(htmlspecialchars($allTag['tag_name']));
}

// tags
$tags = $db->from('post_tags')
    ->join('tags', 'tags.tag_id = post_tags.tag_id')
    ->where('tag_post_id', $id)
    ->all();

$postTags = [];
foreach ($tags as $tag) {
    $postTags[] = trim($tag['tag_name']);
}

if (post('submit')) {

    $post_title = post('post_title');
    $post_url = permalink(post('post_url'));
    if (!post('post_url')) {
        $post_url = permalink($post_title);
    }
    $post_content = post('post_content');
    $post_short_content = post('post_short_content');
    $post_categories = post('post_categories');
    $post_status = post('post_status');
    $post_tags = post('post_tags');
    $post_seo = json_encode(post('post_seo'));

    if (!$post_url || !$post_content || !$post_status || !$post_categories) {
        $error = 'Please enter post name.';
    } else {

        $post_categories = implode(',', $post_categories);

        // check if there is same subject
        $query = $db->from('posts')
            ->where('post_url', $post_url)
            ->where('post_id', $id, '!=')
            ->first();

        if ($query) {
            $error = "There is already the same subject " . '<strong>' . $post_title . '</strong>';
        } else {

            $query = $db->update('posts')
                ->where('post_id', $id)
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

                $postId = $id;

                $post_tags = array_map('trim', explode(",", $post_tags));
                $post_tags = array_filter($post_tags);
                if (count($post_tags) > 0) {
                    foreach ($post_tags as $tag) {
                        //check if there is tag or not
                        $row = $db->from('tags')
                            ->where('tag_url', permalink($tag))
                            ->first();


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

                    }
                }

                // check deleted tags
                $diffs = array_diff($postTags, $post_tags);
                if (count($diffs) > 0) {
                    foreach ($diffs as $diff) {
                        foreach ($allTags as $allTag) {
                            if (trim($allTag['tag_name']) == $diff) {
                                $db->delete('post_tags')
                                    ->where('tag_id', $allTag['tag_id'])
                                    ->where('tag_post_id', $id)
                                    ->done();
                            }
                        }
                    }
                }

                header('Location:' . admin_url('posts'));
            } else {
                $error = 'Something went wrong.';
            }

        }

    }

}

$seo = json_decode($row['post_seo'], true);

require admin_view('edit_post');