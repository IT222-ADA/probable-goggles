<?php 
require_once __DIR__ . '/../Core/Controller.php';
require_once __DIR__ . '/../Core/Auth.php';
require_once __DIR__ . '/../Core/Flash.php';

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

        Auth::login($user);

        switch($user['roler']){
            case 'admin':
                $redirect = '/admin/dashboard';
                break;
            case 'user':
                $redirect = '/tasks';
                break;
        }

        $this->redirect($redirect);
        exit;

    }

    public function register(){
        if($_SERVER['REQUEST_METHOD'] !== 'POST'){
            $this->redirect('/registration');
        }

        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $username = trim($_POST['username'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if($username === '' || $name === '' || $password === '' || $email === ''){
            Flash::set('error','All fields are required');
            $this->redirect('/registration');
        }

        $this->userModel->create([
            'name' => $name,
            'email' => $email,
            'username' => $username,
            'password' => $password,
            'active' => 1,
            'role' => 'user',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        Flash::set('success', 'Registration successful. Please log in.');
        $this->redirect('/login');
    }

    public function logout(){
        Auth::logout();
        $this->redirect('/login');
    }
}