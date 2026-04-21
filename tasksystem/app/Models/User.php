<?php 

class User extends Model{
    protected $table = 'tbl_user';

    public function verifylogin(string $username, string $password): ?array
    {
        $user = $this->findColumn('username',$username);
        if($user && password_verify($password, $user['password'])){
            unset($user['password']);
            return $user;
        }
        return null;

    }
}