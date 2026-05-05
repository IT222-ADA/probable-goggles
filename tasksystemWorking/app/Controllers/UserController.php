<?php
require_once __DIR__ . '/../Core/Controller.php';
require_once __DIR__ . '/../Core/Auth.php';
require_once __DIR__ . '/../Core/Flash.php';

class UserController extends Controller
{
    private User $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    // List users
    public function index()
    {
        $users = $this->userModel->getAllUser();
         $this->view('users/index', [
        'title' => 'Users',
        'users' => $users
        ]);
    }

    // Show create form
    public function create()
    {
        $this->view('users/create');
    }

    // Handle create POST
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/admin/users');
        }

        $username = trim($_POST['username'] ?? '');
        $name = trim($_POST['name'] ?? '');
        $role = trim($_POST['role'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if (!$username || !$name || !$role || !$password) {
            Flash::set('error', 'All fields are required');
            $this->redirect('/admin/users/create');
        }

        $this->userModel->create([
            'username' => $username,
            'name'     => $name,
            'role'     => $role,
            'password' => $password
        ]);

        Flash::set('success', 'User created successfully');
        $this->redirect('/admin/users');
    }

    // Show edit form
    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            $this->redirect('/admin/users');
        }

        $user = $this->userModel->getById((int)$id);
        $this->view('users/edit', ['user' => $user]);
    }

    // Handle update POST
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/admin/users');
        }

        $id = $_POST['id'] ?? null;
        if (!$id) {
            $this->redirect('/admin/users');
        }

        $username = trim($_POST['username'] ?? '');
        $name = trim($_POST['name'] ?? '');
        $role = trim($_POST['role'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if (!$username || !$name || !$role) {
            Flash::set('error', 'Username, name, and role are required');
            $this->redirect('/admin/users/edit?id=' . $id);
        }

        $data = [
            'username' => $username,
            'name'     => $name,
            'role'     => $role
        ];

        if ($password) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $this->userModel->updateUser((int)$id, $data);
        Flash::set('success', 'User updated successfully');
        $this->redirect('/admin/users');
    }

    // Delete user
    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            $this->redirect('/admin/users');
        }

        $this->userModel->deleteUser((int)$id);
        Flash::set('success', 'User deleted successfully');
        $this->redirect('/admin/users');
    }
}
