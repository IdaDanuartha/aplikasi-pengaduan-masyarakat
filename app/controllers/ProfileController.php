<?php

class ProfileController extends Controller {
    public function index()
    {
        if(isset($_SESSION['login'])) {
            $data['title'] = 'Profile';

            $this->view("layouts/dashboard/header", $data);
            $this->view("layouts/dashboard/sidebar");
            $this->view("pages/profile/index", $data);
            $this->view("layouts/dashboard/footer");
        } else {
            redirect("login");
        }
    }

    public function update($id)
    {
        $user = $this->model("User")->edit($id);

        // File name
        $filename = null;        
        if(isset($_FILES['profile_picture'])) {
            $filename = date("dmyhis") . '_' . basename($_FILES['profile_picture']['name']);
        }
        
        // Location
        $target_file = "./uploads/users/$filename";

        // Path
        $path = "./uploads/users/" . $user['profile_picture'];        

        // file extension
        $file_extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
           
        // Valid image extension
        $valid_extension = ["png","jpeg","jpg","svg","webp"];        
        if($this->model("User")->updateProfile($id, $_POST, $filename) > 0) {
            if(in_array($file_extension, $valid_extension)) {
                // Upload file            
                if(isset($_FILES['profile_picture'])) {
                    if(file_exists($path)) {  
                        unlink($path);                      
                    }
                    move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target_file);
                }
            }
            Flasher::setFlash("Profile berhasil diubah", "success");
            $_SESSION['user_session'] = $_POST;
            $_SESSION['user_session']['profile_picture'] = $_FILES['profile_picture']['name'] ? $filename : null;
            redirect("profile");
        } else {
            Flasher::setFlash("Profile gagal diubah", "danger");
            redirect("profile");
        }
    }
}