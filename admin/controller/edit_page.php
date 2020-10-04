<?php

if (!permission('pages', 'edit')){
    permission_page();
}

$id = get('id');
if(!$id){
    header('Location:'.admin_url('pages'));
    exit;
}

$row = $db->from('pages')
    ->where('page_id', $id)
    ->first();

if(!$row){
    header('Location:'.admin_url('pages'));
    exit;
}

if (post('submit')){

    $page_title = post('page_title');
    $page_url = permalink(post('page_url'));
    if (!post('page_url')) {
        $page_url = permalink($page_title);
    }
    $page_content = post('page_content');
    $page_seo = json_encode(post('page_seo'));

    if (!$page_url || !$page_content){
        $error = 'Please enter page name.';
    } else {

        // check if there is same page
        $query = $db->from('pages')
            ->where('page_url', $page_url)
            ->where('page_id', $id, '!=')
            ->first();

        if ($query){
            $error = "There is already the same page". '<strong>' . $page_title . '</strong>';
        } else {

            $query = $db->update('pages')
                ->where('page_id', $id)
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

$seo = json_decode($row['page_seo'], true);

require admin_view('edit_page');