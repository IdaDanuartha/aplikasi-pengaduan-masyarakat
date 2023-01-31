<div class="container-fluid">

    <div class="d-sm-flex align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Pengaduan Masuk</h1>                
    </div>

    <div class="form-group mb-3 d-flex">
    <img src="<?= BASE_URL ?>/uploads/pengaduan/<?= $data['pengaduan']['gambar'] ?>" width="300" class="" alt="...">
        <div class="ml-3 p-3 rounded text-white bg-primary">
            <div class="mb-3 d-flex">
                <h6 class="font-weight-bold mr-2">Tanggal Pengaduan : </h6>
                <h6><?= date_format(date_create($data['pengaduan']['created_at']), "d M Y") ?></h6>
            </div>
            <div class="mb-3 d-flex">
                <h6 class="font-weight-bold mr-2">Jam Pengaduan : </h6>
                <h6><?= date_format(date_create($data['pengaduan']['created_at']), "H.i") ?></h6>
            </div>
            <div class="mb-3 d-flex">
                <h6 class="font-weight-bold mr-2">Pelapor : </h6>
                <h6><?= $data['pengaduan']['nama'] ?></h6>
            </div>
            <div class="mb-3">
                <h6 class="font-weight-bold mr-2">Laporan : </h6>
                <h6><?= $data['pengaduan']['laporan'] ?></h6>
            </div>
        </div>
    </div>

    <hr>

    <form action="<?= BASE_URL ?>/pengaduandetail/proses" method="post" class="mt-4">
        <input type="hidden" name="pengaduan_id" value="<?= $data['pengaduan']['id'] ?>">
        <input type="hidden" name="user_id" value="<?= $_SESSION['user_session']['id'] ?>">
        <h5 class="font-weight-bold">Masukkan tanggapan anda</h5>
        <div class="form-group my-3">
            <h6>Status tanggapan</h6>
            <div class="d-flex">
                <div class="d-flex mr-3">
                    <input type="radio" name="status" checked id="setuju" value="setuju">
                    <label for="setuju" class="ml-2 mt-1">Setuju</label>
                </div>
                <div class="d-flex">
                    <input type="radio" name="status" id="tolak" value="tolak">
                    <label for="tolak" class="ml-2 mt-1">Tolak</label>
                </div>
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="tanggapan" class="d-block">Tanggapan</label>
            <textarea name="tanggapan" class="form-control" required id="tanggapan" rows="7" style="width:
            500px"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

