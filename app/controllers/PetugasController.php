<?php

class PetugasController extends Controller {
    public function index()
    {
        if(isset($_SESSION['login'])) {
            $data['title'] = 'Data Petugas';
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
            $data['title'] = 'Tambah Petugas';
            $this->view("layouts/dashboard/header", $data);
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

    public function edit($id)
    {
        if(isset($_SESSION['login'])) {
            $data['title'] = 'Edit petugas';
            $data['petugas'] = $this->model("User")->edit($id);

            $this->view("layouts/dashboard/header", $data);
            $this->view("layouts/dashboard/sidebar");
            $this->view("pages/petugas/edit", $data);
            $this->view("layouts/dashboard/footer");
        } else {
            redirect("login");
        }
    }

    public function update($id)
    {
        $petugas = $this->model("User")->edit($id);

        // File name
        $filename = null;        
        if(isset($_FILES['profile_picture'])) {
            $filename = date("dmyhis") . '_' . basename($_FILES['profile_picture']['name']);
        }
        
        // Location
        $target_file = "./uploads/users/$filename";

        // Path
        $path = "./uploads/users/" . $petugas['profile_picture'];        

        // file extension
        $file_extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
           
        // Valid image extension
        $valid_extension = ["png","jpeg","jpg","svg","webp"];
        
        if($this->model("User")->update($id, $_POST, $filename) > 0) {
            if(in_array($file_extension, $valid_extension)) {
                // Upload file            
                if(isset($_FILES['profile_picture'])) {
                    if(file_exists($path)) {  
                        unlink($path);                      
                    }
                    move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target_file);
                }
            }
            Flasher::setFlash("Data petugas berhasil diubah", "success");
            redirect("petugas");
        } else {
            Flasher::setFlash("Data petugas gagal diubah", "danger");
            redirect("petugas/edit/$id");
        }
    }

    public function destroy($id)
    {
        $petugas = $this->model("User")->edit($id);

        // File name
        $filename = $petugas['profile_picture'];        

        // Path
        $path = "./uploads/users/" . $filename;        
             
        if($this->model("User")->destroy($id) > 0) { 
            unlink($path);           
            Flasher::setFlash("Data petugas berhasil dihapus", "success");
        } else {
            Flasher::setFlash("Data petugas gagal dihapus", "danger");
        }
        redirect("petugas");
    }
}