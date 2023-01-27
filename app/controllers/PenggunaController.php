<?php

class PenggunaController extends Controller {
    public function index()
    {
        $this->view("layouts/dashboard/header");
        $this->view("layouts/dashboard/sidebar");
        $this->view("pages/pengguna/index");
        $this->view("layouts/dashboard/footer");
    }
}