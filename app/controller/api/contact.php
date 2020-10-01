<?php

if ($data = form_control('phone')) {

    // print_r($data);

    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $json['error'] = 'Please enter a valid email';
    } else {


        $query = $db->insert('contact')
            ->set([
                'contact_name' => $data['full_name'],
                'contact_email' => $data['email'],
                'contact_phone' => $data['phone'],
                'contact_subject' => $data['subject'],
                'contact_message' => $data['message']
            ]);
        if ($query) {
            $json['success'] = 'We received your message, thank you.';
        } else {
            $json['error'] = 'Something went wrong while sending message.';
        }
    }
} else {
    $json['error'] = 'Please enter the missing fields.';
}