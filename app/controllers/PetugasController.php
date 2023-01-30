<?php

class PetugasController extends Controller {
    public function index()
    {
        if(isset($_SESSION['login'])) {
            $data['petugas'] = $this->model('User')->getPetugas();

            $this->view("layouts/dashboard/header", $data);
            $this->view("layouts/dashboard/sidebar");
            $this->view("pages/petugas/index", $data);
            $this->view("layouts/dashboard/footer");
        } else {
            redirect("login");
        }
    }

    public function create()
    {
        if(isset($_SESSION['login'])) {
            $this->view("layouts/dashboard/header");
            $this->view("layouts/dashboard/sidebar");
            $this->view("pages/petugas/create");
            $this->view("layouts/dashboard/footer");
        } else {
            redirect("login");
        }
    }

    public function store()
    {
        // File name
        $filename = date("dmyhis") . '_' . basename($_FILES['profile_picture']['name']);
    
        // Location
        $target_file = "./uploads/users/$filename";

        // file extension
        $file_extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                
        // Valid image extension
        $valid_extension = ["png","jpeg","jpg","svg","webp"];
    
        if(in_array($file_extension, $valid_extension)) {
            // Upload file
            
            if($this->model('User')->findUserByUsername($_POST['username'])) {
                Flasher::setFlash("Username sudah terdaftar", "danger");
                redirect('petugas/create');
            } else {
                if($this->model('User')->storePetugas($_POST, $filename) > 0) {
                    move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target_file);
                    Flasher::setFlash("Akun petugas berhasil dibuat!", "success");
                    redirect('petugas');
                } else {            
                    Flasher::setFlash("Akun petugas gagal dibuat!", "danger");
                    redirect('petugas/create');
                }
            }
        }
    }
}