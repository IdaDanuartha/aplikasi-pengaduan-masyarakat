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
}