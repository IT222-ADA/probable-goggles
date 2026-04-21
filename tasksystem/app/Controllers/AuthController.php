<?php 
require_once __DIR__ . '/../Core/Controller.php';
require_once __DIR__ . '/../Core/Auth.php';

class AuthController extends Controller
{
    private User $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function login(){
        $this->view('/login');
    }

    public function authenticate(){

        if($_SERVER['REQUEST_METHOD'] !== 'POST'){
            $this->redirect('/login');
        }

        $username = trim($_POST['username']) ?? '';
        $password = trim($_POST['password']) ?? '';

        if($username === '' || $password === ''){
            $this->redirect('login');
        }

        $user = $this->userModel->verifylogin($username,$password);

        if(!$user){
            $this->redirect('/login');
        }

        if(Auth::login($user)){
            $this->redirect('/admin/dashboard');
        }else {
            $this->redirect('/login');
        }

    }

    public function logout(){
        Auth::logout();
        $this->redirect('/login');
    }
}