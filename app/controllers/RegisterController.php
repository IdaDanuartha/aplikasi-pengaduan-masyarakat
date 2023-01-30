<?php

class RegisterController extends Controller {
    public function index()
    {
        if(!isset($_SESSION['login'])) {
            $data['title'] = "Register";
        
            $this->view("layouts/auth/header", $data);
            $this->view("pages/auth/register");
            $this->view("layouts/auth/footer");            
        } else {
            redirect("dashboard");
        }
    }

    public function process()
    {
        if($this->model('User')->findUserByUsername($_POST['username'])) {
            Flasher::setFlash("Username sudah terdaftar", "danger");
            redirect('register');
        } else {
            if($this->model('User')->storeMasyarakat($_POST) > 0) {
                Flasher::setFlash("Akun berhasil dibuat!", "success");
                redirect('login');
            } else {            
                Flasher::setFlash("Akun gagal dibuat!", "danger");
                redirect('register');
            }
        }
    }
}