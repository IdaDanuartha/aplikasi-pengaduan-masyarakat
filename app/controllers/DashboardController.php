<?php

class DashboardController extends Controller {
    public function index()
    {
        if(isset($_SESSION['login'])) {
            $data['total_pengaduan_masuk'] = count($this->model("Pengaduan")->getByStatus("masuk"));
            $data['total_pengaduan_diproses'] = count($this->model("Pengaduan")->getByStatus("proses"));
            $data['total_pengaduan_ditolak'] = count($this->model("Pengaduan")->getByStatus("tolak"));
            $data['total_pengaduan_selesai'] = count($this->model("Pengaduan")->getByStatus("selesai"));

            $this->view("layouts/dashboard/header", $data);
            $this->view("layouts/dashboard/sidebar");
            $this->view("pages/dashboard/index", $data);
            $this->view("layouts/dashboard/footer");
        } else {
            redirect("login");
        }
    }
}