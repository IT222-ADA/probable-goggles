<?php

require_once __DIR__ . '/../Core/Controller.php';

Class PublicController extends Controller{

    public function index(){
        $this->view('auth/login');
    }
}