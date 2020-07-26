<?php

$meta = [
    'title'=>'Login'
];

if(post('submit')){
    $username = post("username");
    $password = post("password");

    if(!$username){
        $error = "Please enter your username.";
    }elseif (!$password){
        $error = "Please enter password.";
    }else{
        // check if user exists or not.
        $row = User::user_exist($username);

        if($row){
            // check password
            $password_verify = password_verify($password, $row["user_password"]);
            if($password_verify){
                $success = "You have successfully login. You are being redirected.";
                User::login($row);
                header('Refresh:2;url='.site_url());
            }else{
                $error = "Password is not correct. Please check your password.";
            }
        }else{
            $error = "This user doesn't exist.";
        }
    }
}


require view('login');