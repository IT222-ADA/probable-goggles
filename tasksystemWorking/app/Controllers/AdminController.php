<?php

require_once __DIR__ . '/../Core/Controller.php';
require_once __DIR__ . '/../Core/Flash.php';

class AdminController extends Controller{

    private User $userModel;

    private Task $taskModel;
    /**
     * Show admin dashboard
     */
    public function __construct()
    {
        AdminGuard::require(['admin']); // 🔒 Protect ALL methods
        $this->userModel = $this->model('User');
        $this->taskModel = $this->model('Task');
    }
    public function dashboard()
    {   
        $this->view('admin/dashboard', [
            'title' => 'Admin Dashboard',
            'userCount' => $this->userModel->countAll(),
            'taskCount' => $this->taskModel->countAll()
        ]);
    }


}
