<?php

class Auth{
    public static function login(array $user){
        Session::set('user',[
            'id' => $user['id'],
            'name' => $user['name'],
            'role' => $user['role']
        ]);
    }

    public static function logout(){
        Session::destroy();
    }

    public static function check():bool{
        return Session::has('user');
    }

    public static function user(): ?array{
        return Session::get('user');
    }
    public static function isAdmin():bool{
        return self::check() && in_array(
            $_SESSION['user']['role'],
            ['admin']
        );
    }

    
}