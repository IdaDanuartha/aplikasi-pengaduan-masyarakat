<?php

class PengaduanController extends Controller {
    public function masuk()
    {
        $data['pengaduan'] = $this->model("Pengaduan")->getByStatus('masuk');

        $this->view("layouts/dashboard/header", $data);
        $this->view("layouts/dashboard/sidebar");
        $this->view("pages/pengaduan/masuk/index", $data);
        $this->view("layouts/dashboard/footer");
    }

    public function proses()
    {
        $data['pengaduan'] = $this->model("Pengaduan")->getByStatus('proses');

        $this->view("layouts/dashboard/header", $data);
        $this->view("layouts/dashboard/sidebar");
        $this->view("pages/pengaduan/proses/index", $data);
        $this->view("layouts/dashboard/footer");
    }

    public function tolak()
    {
        $data['pengaduan'] = $this->model("Pengaduan")->getByStatus('tolak');

        $this->view("layouts/dashboard/header", $data);
        $this->view("layouts/dashboard/sidebar");
        $this->view("pages/pengaduan/tolak/index", $data);
        $this->view("layouts/dashboard/footer");
    }

    public function selesai()
    {
        $data['pengaduan'] = $this->model("Pengaduan")->getByStatus('selesai');

        $this->view("layouts/dashboard/header", $data);
        $this->view("layouts/dashboard/sidebar");
        $this->view("pages/pengaduan/selesai/index", $data);
        $this->view("layouts/dashboard/footer");
    }
}