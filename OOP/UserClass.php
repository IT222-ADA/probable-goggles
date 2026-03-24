<?php

Class User{
    private readonly string $username;
    private readonly UserProfile $profile;

    public function __construct(string $username)
    {
        $this->username = $username;
    }

    public function setProfile(UserProfile $profile){
        $this->profile = $profile;
    }

    public function profile() : UserProfile{
        return $this->profile;
    }

    public function getUsername(){
        return $this->username;
    }

    public function setUsername(string $username){
        $this->username = $username;
    }
}

class UserProfile{
    public function __construct(private string $name , private string $phone)
    {
    }

    public function changePhone(string $phone){
        $this->phone = $phone;
    }

    public function changeName(string $name){
        $this->name = $name;
    }
}

$user = new User("johnnibato");
$user->setProfile(new UserProfile('john nibato',"0912313"));
$user->profile()->changePhone('123456789');
$user->profile()->changeName('John Doe');
//$user->username = "john123"; error
//$user->setUsername("john222");
echo $user->getUsername() . ' ';
var_dump($user->profile());