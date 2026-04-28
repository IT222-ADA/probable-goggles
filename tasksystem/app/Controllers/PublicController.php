<?php

require_once __DIR__ . '/../Core/Controller.php';

Class PublicController extends Controller{

    public function index(){
        $this->view('auth/login');
    }

    public function login(){
        $this->view('auth/login');
    }

    public function registration(){
        $this->view('auth/registration');
    }
}