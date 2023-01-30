<div class="container-fluid">
    <div class="my-3">
        <?php Flasher::flash(); ?>
    </div>
    <div class="card shadow mb-4">
        <form action="<?= BASE_URL ?>/pengaduan/store" method="post" enctype="multipart/form-data">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Pengaduan</h6>
            </div> 
            <div class="py-3">
                <div class="form-group mb-4 col-md-6 col-12">
                    <img src="https://picsum.photos/200" alt="" class="rounded">
                    <input type="file" name="gambar" class="form-control mt-3">
                </div>
                <div class="form-group mb-4 col-md-6 col-12">
                    <label for="nama" class="form-label">Laporan</label>
                    <textarea name="laporan" class="form-control" rows="7"></textarea>
                </div>
                <button class="btn btn-primary ml-2" type="submit">Tambah</button> 
            </div> 
        </form>
    </div>
</div>