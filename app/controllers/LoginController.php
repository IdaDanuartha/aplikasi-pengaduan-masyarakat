<?php

class LoginController extends Controller {
    public function index()
    {
        if(!isset($_SESSION['login'])) {
            $data['title'] = "Login";
        
            $this->view("layouts/auth/header", $data);
            $this->view("pages/auth/login");
            $this->view("layouts/auth/footer");            
        } else {
            redirect("dashboard");
        }
    }

    public function process()
    {        
        if($this->model('User')->findUserByUsername($_POST['username'])) {
            $loginInUser = $this->model('User')->login($_POST);
            if($loginInUser) {
                redirect("dashboard");
            } else {
                Flasher::setFlash("Username atau password salah", "danger");
                redirect("login");
            }
        } else {            
            Flasher::setFlash("Akun belum terdaftar", "danger");
            redirect("login");
        }
    }
}