<?php

class PengaduanProsesController extends Controller {
    public function selesai()
    {
        if($this->model("Tanggapan")->updateStatus($_POST['id'], 'selesai') > 0) {
            Flasher::setFlash("Pengaduan berhasil diselesaikan", "success");
        } else {
            Flasher::setFlash("Pengaduan gagal diselesaikan", "danger");            
        }
        redirect("pengaduan/proses");
    }
}