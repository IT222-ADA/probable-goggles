<?php 

require_once __DIR__ . '/../Core/Controller.php';
require_once __DIR__ . '/../Core/Flash.php';


Class PublicController extends Controller
{
    public function __construct()
    {
        // If already logged in, redirect to dashboard
        if (Auth::check()) {
            $this->redirect('/admin/dashboard');
        }
    }
    /**
     * Show home page
     */
    public function index()
    {
        $this->view('auth/login');
    }

    public function login()
    {
         // If already logged in, redirect to dashboard
        if (Auth::check()) {
            $this->redirect('admin/dashboard');
        }
        $this->view('auth/login');
    }

    public function registration()
    {
        $this->view('auth/registration');
    }



}