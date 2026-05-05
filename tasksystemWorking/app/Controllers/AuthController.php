<?php
require_once __DIR__ . '/../Core/Controller.php';
require_once __DIR__ . '/../Core/Auth.php';
require_once __DIR__ . '/../Core/Flash.php';

class AuthController extends Controller
{
    private User $userModel;

    public function __construct()
    {
        // Load User model
        $this->userModel = $this->model('User');
       
    }
    public function handleRegister()
    {
        // Only allow POST
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/register');
        }

        // Sanitize inputs
        $username = trim($_POST['username'] ?? '');
        $name = trim($_POST['name'] ?? '');
        $password = trim($_POST['password'] ?? '');
        $email = trim($_POST['email'] ?? '');

        // Validate inputs
        if ($username === '' || $name === '' || $password === '' || $email === '') {
            Flash::set('error', 'All fields are required');
            $this->redirect('/register');
        }

        // Create new user (default role: user)
        $this->userModel->create([
            'username' => $username,
            'name'     => $name,
            'role'     => 'user',
            'password' => $password,
            'email'    => $email,
            'active'   => 1,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        Flash::set('success', 'Registration successful. Please log in.');
        $this->redirect('/login');
    }

    /**
     * Handle login form submission
     */
    public function authenticate()
    {
        // Only allow POST
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/login');
        }

        // Sanitize inputs
        $username = trim($_POST['username'] ?? '');
        $password = trim($_POST['password'] ?? '');

        // Validate inputs
        if ($username === '' || $password === '') {
            Flash::set('error', 'Please enter both username and password');
            $this->redirect('/login');
        }

        // Verify login credentials
        $user = $this->userModel->verifyLogin($username, $password);

        if (!$user) {
            Flash::set('error', 'Invalid username or password');
            $this->redirect('/login');
        }

        // ✅ Login success → create session
        Auth::login($user);

        switch ($user['role']) {
            case 'admin':
                $redirect = '/admin/dashboard';
                break;

            case 'user':
            default:
                $redirect = '/tasks';
                break;
        }

        $this->redirect($redirect);
        exit;
    }

    /**
     * Logout
     */
    public function logout()
    {
        Auth::logout();
        Flash::set('success', 'You have been logged out');
        $this->redirect('/login');
    }

}
