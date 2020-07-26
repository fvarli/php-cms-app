<?php

$meta = [
    'title' => 'Sign up'
];

if (post('submit')) {

    $username = post('username');
    $email = post('email');
    $password = post('password');
    $re_password = post('re_password');

    if (!$username) {
        $error = "Please enter your username.";
    } elseif (!$email){
        $error = "Please enter your email.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid e-mail.";
    } elseif (!$password || !$re_password) {
        $error = "Please enter password.";
    } elseif ($password != $re_password) {
        $error = "Password doesn't match, please try again.";
    } else {

        // check if record exists or not
        $row = User::user_exist($username, $email);

        if ($row) {
            $error = "This user already exist. Please try another one.";
        } else {
            // add new record
            $result = User::register(["username" => $username,
                "url" => permalink($username),
                "email" => $email,
                "password" => password_hash($password, PASSWORD_DEFAULT)
            ]);

            if ($result) {
                $success = "Your account has been successfully created. You are being redirected to the Homepage.";
                User::login([
                    "user_id" => $db->lastInsertId(),
                    "user_name" => $username
                ]);
                header('Refresh:2;url=' . site_url());
            } else {
                $error = "Something went wrong. Please try again later.";
            }
        }
    }
}


require view('register');