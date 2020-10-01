<?php

if (post('submit')){
    if ($data = form_control()){

        $row = $db->from('users')
            ->where('user_url', permalink($data['user_name']))
            ->where('user_rank', 3, '!=')
            ->first();

        if (!$row){
            $error = 'Your login information is not correct';
        } else {

            $password_verify = password_verify($data['user_password'], $row['user_password']);
            if ($password_verify){
                if ($row['user_rank'] == 3){
                    $error = 'You don\'t have permission.';
                } else {
                    User::login($row);
                    header('Location:' . admin_url());
                }
            } else {
                $error = 'Your password is not correct, please check it';
            }

        }

    } else {
        $error = 'Enter your information.';
    }
}

require admin_view('login');