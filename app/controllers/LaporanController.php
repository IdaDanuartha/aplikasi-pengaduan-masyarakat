<?php

class LaporanController extends Controller {
    public function index()
    {
        $this->view("layouts/dashboard/header");
        $this->view("layouts/dashboard/sidebar");
        $this->view("pages/laporan/index");
        $this->view("layouts/dashboard/footer");
    }
}