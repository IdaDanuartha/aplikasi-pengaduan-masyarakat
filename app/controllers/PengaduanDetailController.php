<?php

class PengaduanDetailController extends Controller {
    public function masuk($id)
    {
        if(isset($_SESSION['login'])) {
            $data['title'] = 'Pengaduan Detail';
            $data['pengaduan'] = $this->model("Pengaduan")->pengaduanDetail($id);

            $this->view("layouts/dashboard/header", $data);
            $this->view("layouts/dashboard/sidebar");
            $this->view("pages/pengaduan/masuk/detail", $data);
            $this->view("layouts/dashboard/footer");
        } else {
            redirect("login");
        }
    }

    public function proses()
    {
        if($this->model("Tanggapan")->store($_POST) > 0) {
            Flasher::setFlash("Tanggapan berhasil ditambahkan", "success");
            redirect("pengaduan/masuk");
        } else {
            redirect("pengaduan/tolak");
        }
    }
}