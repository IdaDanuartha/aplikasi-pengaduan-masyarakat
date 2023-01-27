<?php

class PetugasController extends Controller {
    public function index()
    {
        $data['petugas'] = $this->model('User')->getPetugas();

        $this->view("layouts/dashboard/header", $data);
        $this->view("layouts/dashboard/sidebar");
        $this->view("pages/petugas/index", $data);
        $this->view("layouts/dashboard/footer");
    }
}