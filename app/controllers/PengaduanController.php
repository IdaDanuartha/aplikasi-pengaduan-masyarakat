<?php

class PengaduanController extends Controller {
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
}