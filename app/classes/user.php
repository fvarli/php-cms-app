<?php

class User {

    public static function login($data)
    {
        $_SESSION['user_id'] = $data['user_id'];
        $_SESSION['user_name'] = $data['user_name'];
        $_SESSION['user_rank'] = $data['user_rank'];
        $_SESSION['user_permissions'] = $data['user_permissions'];

    }

    public static function user_exist($username, $email = '@@')
    {
        global $db;
        $query = $db->prepare('SELECT * FROM users WHERE user_name = :username || user_email = :email');
        $query->execute([
            'username' => $username,
            'email' => $email
        ]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public static function register($data)
    {
        global $db;
        $query = $db->prepare('INSERT INTO users SET user_name = :username, user_url = :url, user_email = :email, user_password = :password');
        return $query->execute($data);
    }
}