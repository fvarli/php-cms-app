<?php

$name = post('name');
$email = post('email');
$post_id = post('post_id');
$comment = post('comment');

if (session('user_id')) {
    $name = session('user_name');
    $email = session('user_email');
}

if (!$name || !$email || !$post_id) {
    $json['error'] = 'Lütfen adınızı ve e-posta adresinizi belirtin.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $json['error'] = 'Lütfen geçerli bir e-posta adresi belirtin.';
} elseif (!$comment){
    $json['error'] = 'Lütfen yorumunuzu belirtin.';
} else {

    if (session('user_id')) {
        $status = settings('user_comment') == 1 ? 1 : 0;
    } else {
        $status = settings('visitor_comment') == 1 ? 1 : 0;
    }

    // ilgili blog konusunu bul
    $row = Blog::findPostById($post_id);
    if (!$row) {
        $json['error'] = 'Beklenmedik bir sorun oluştu, lütfen sayfayı yenileyin.';
    } else {
        // TODO add comment without login
        $comment = [
            'comment_user_id' => session('user_id'),
            'comment_post_id' => $post_id,
            'comment_name' => $name,
            'comment_email' => $email,
            'comment_content' => $comment,
            'comment_status' => $status
        ];

        // yorumu ekle
        $insert = $db->insert('comments')
            ->set($comment);

        if ($insert){

            if ($status == 0){
                $json['success'] = 'Yorumunuz gönderildi. Onaylandıktan sonra yayınlanacaktır. Teşekkürler.';
            } else {

                $comment['comment_date'] = date('Y-m-d H:i:s');

                ob_start();
                require view('static/comment');
                $output = ob_get_clean();

                $json['comment'] = $output;

            }

        } else {
            $json['error'] = 'Yorumunuzu eklerken bir sorun oluştu.';
        }

    }

}