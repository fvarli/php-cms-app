<?php

if($data = form_control()){

    $send = send_email($data['email'], $data['name'], $data['subject'], nl2br($data['message']));

    if($send){
        $json['success'] = 'Your message has been successfully sent.';
    }else{
        $json['error'] = 'Something went wrong';
    }
}else{
    $json['error'] = 'Please enter all information.';
}