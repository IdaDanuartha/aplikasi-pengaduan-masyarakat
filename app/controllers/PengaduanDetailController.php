<?php

class PengaduanDetailController extends Controller {
    public function masuk($id)
    {
        $data['pengaduan'] = $this->model("Pengaduan")->pengaduanDetail($id);

        $this->view("layouts/dashboard/header", $data);
        $this->view("layouts/dashboard/sidebar");
        $this->view("pages/pengaduan/masuk/detail", $data);
        $this->view("layouts/dashboard/footer");
    }
}