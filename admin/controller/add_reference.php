<?php

if (!permission('reference', 'add')) {
    permission_page();
}

$categories = $db->from('reference_categories')
    ->orderby('category_name', 'ASC')
    ->all();

if (post('submit')) {

    if ($data = form_control('reference_url', 'reference_demo')) {

        $data['reference_demo'] = post('reference_demo');
        $data['reference_url'] = permalink(post('reference_url') ? post('reference_url') : $data['reference_title']);
        $data['reference_seo'] = json_encode($data['reference_seo']);
        $data['reference_categories'] = implode(',', $data['reference_categories']);

        // if reference is added before
        $query = $db->from('reference')
            ->where('reference_url', $data['reference_url'])
            ->first();

        if ($query) {
            $error = "There is already the same reference ";
        } else {

            if (mkdir(PATH . '/upload/reference/' . $data['reference_url'], 0777)) {

                $handle = new upload($_FILES['reference_image']);
                if ($handle->uploaded) {
                    $handle->file_new_name_body = $data['reference_url'] . '_' . rand(1, 9999);
                    $handle->image_ratio_crop = true;
//                    $handle->image_ratio_fill = true;
                    $handle->image_resize = true;
                    $handle->image_x = 525;
                    $handle->image_y = 350;
                    $handle->allowed = ['image/*'];
                    $handle->process(PATH . '/upload/reference/' . $data['reference_url']);
                    if ($handle->processed){
                        $data['reference_image'] = $handle->file_dst_name_body . '.' . $handle->file_dst_name_ext;
                    } else {
                        $error = $handle->error;
                    }
                } else {
                    $error = 'Please add reference image!';
                }

            } else {
                $error = 'It couldn\'t be created ' . PATH . '/upload/reference/' . $data['reference_url'] . ' folder!';
            }

            if (!isset($error)){

                $insert = $db->insert('reference')
                    ->set($data);

                if ($insert){
                    header('Location:' . admin_url('references'));
                } else {
                    $error = 'Something went wrong.';
                }
            }

        }

    } else {
        $error = 'Please enter all fields.';
    }

}

require admin_view('add_reference');