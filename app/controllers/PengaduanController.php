<?php

class PengaduanController extends Controller {

    public function masyarakat()
    {
        if(isset($_SESSION['login'])) {
            $data['pengaduan'] = $this->model("Pengaduan")->getByUser();

            $this->view("layouts/dashboard/header", $data);
            $this->view("layouts/dashboard/sidebar");
            $this->view("pages/pengaduan/masyarakat/index", $data);
            $this->view("layouts/dashboard/footer");
        } else {
            redirect("login");
        }
    }

    public function tambah()
    {
        if(isset($_SESSION['login'])) {
            $this->view("layouts/dashboard/header");
            $this->view("layouts/dashboard/sidebar");
            $this->view("pages/pengaduan/masyarakat/tambah");
            $this->view("layouts/dashboard/footer");
        } else {
            redirect("login");
        }
    }

    public function edit($id)
    {
        if(isset($_SESSION['login'])) {
            $data['pengaduan'] = $this->model("Pengaduan")->edit($id);

            $this->view("layouts/dashboard/header");
            $this->view("layouts/dashboard/sidebar");
            $this->view("pages/pengaduan/masyarakat/edit", $data);
            $this->view("layouts/dashboard/footer");
        } else {
            redirect("login");
        }
    }

    public function masuk()
    {
        if(isset($_SESSION['login'])) {
            $data['pengaduan'] = $this->model("Pengaduan")->getByStatus('masuk');

            $this->view("layouts/dashboard/header", $data);
            $this->view("layouts/dashboard/sidebar");
            $this->view("pages/pengaduan/masuk/index", $data);
            $this->view("layouts/dashboard/footer");
        } else {
            redirect("login");
        }
    }

    public function proses()
    {
        if(isset($_SESSION['login'])) {
            $data['pengaduan'] = $this->model("Pengaduan")->getByStatus('proses');

            $this->view("layouts/dashboard/header", $data);
            $this->view("layouts/dashboard/sidebar");
            $this->view("pages/pengaduan/proses/index", $data);
            $this->view("layouts/dashboard/footer");
        } else {
            redirect("login");
        }
    }

    public function tolak()
    {
        if(isset($_SESSION['login'])) {
            $data['pengaduan'] = $this->model("Pengaduan")->getByStatus('tolak');

            $this->view("layouts/dashboard/header", $data);
            $this->view("layouts/dashboard/sidebar");
            $this->view("pages/pengaduan/tolak/index", $data);
            $this->view("layouts/dashboard/footer");
        } else {
            redirect("login");
        }
    }

    public function selesai()
    {
        if(isset($_SESSION['login'])) {
            $data['pengaduan'] = $this->model("Pengaduan")->getByStatus('selesai');

            $this->view("layouts/dashboard/header", $data);
            $this->view("layouts/dashboard/sidebar");
            $this->view("pages/pengaduan/selesai/index", $data);
            $this->view("layouts/dashboard/footer");
        } else {
            redirect("login");
        }
    }

    public function store()
    {
        // File name
        $filename = date("dmyhis") . '_' . basename($_FILES['gambar']['name']);
    
        // Location
        $target_file = "./uploads/pengaduan/$filename";

        // file extension
        $file_extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                
        // Valid image extension
        $valid_extension = ["png","jpeg","jpg","svg","webp"];
    
        if(in_array($file_extension, $valid_extension)) {
            if($this->model("Pengaduan")->store($_POST, $filename) > 0) {
                // Upload file            
                move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file);
                Flasher::setFlash("Pengaduan berhasil dilaporkan", "success");
                redirect("pengaduan/masyarakat");
            } else {
                Flasher::setFlash("Pengaduan gagal ditambahkan", "danger");
                redirect("pengaduan/tambah");
            }
        }
    }

    public function update($id)
    {
        $pengaduan = $this->model("Pengaduan")->edit($id);

        // File name
        $filename = $pengaduan['gambar'];        
        if(isset($_FILES['gambar'])) {
            $filename = date("dmyhis") . '_' . basename($_FILES['gambar']['name']);
        }
    
        // Location
        $target_file = "./uploads/pengaduan/$filename";

        // Path
        $path = "./uploads/pengaduan/" . $pengaduan['gambar'];        

        // file extension
        $file_extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
           
        // Valid image extension
        $valid_extension = ["png","jpeg","jpg","svg","webp"];
                
        if($this->model("Pengaduan")->update($id, $_POST, $filename) > 0) {
            if(in_array($file_extension, $valid_extension)) {
                // Upload file            
                if(isset($_FILES['gambar'])) {
                    if(file_exists($path)) {  
                        unlink($path);                      
                        move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file);
                    }
                }
            }
            Flasher::setFlash("Pengaduan berhasil diubah", "success");
            redirect("pengaduan/masyarakat");
        } else {
            Flasher::setFlash("Pengaduan gagal diubah", "danger");
            redirect("pengaduan/edit/$id");
        }
    }

    public function destroy($id)
    {
        $pengaduan = $this->model("Pengaduan")->edit($id);

        // File name
        $filename = $pengaduan['gambar'];        

        // Path
        $path = "./uploads/pengaduan/" . $filename;        
             
        if($this->model("Pengaduan")->destroy($id) > 0) { 
            unlink($path);           
            Flasher::setFlash("Pengaduan berhasil dihapus", "success");
        } else {
            Flasher::setFlash("Pengaduan gagal dihapus", "danger");
        }
        redirect("pengaduan/masyarakat");
    }
}