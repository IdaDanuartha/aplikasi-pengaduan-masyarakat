<div class="container-fluid">
    <div class="my-3">
        <?php Flasher::flash(); ?>
    </div>
    <div class="card shadow mb-4">
        <form action="<?= BASE_URL ?>/pengaduan/update/<?= $data['pengaduan']['id'] ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="old_gambar" value="<?= $data['pengaduan']['gambar'] ?>" class="form-control mt-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Pengaduan</h6>
            </div> 
            <div class="py-3">
                <div class="form-group mb-4 col-md-6 col-12">
                    <img src="<?= BASE_URL ?>/uploads/pengaduan/<?= $data['pengaduan']['gambar'] ?>" alt="" width="200" class="rounded mb-4">                    
                    <input type="file" name="gambar" required class="form-control mt-3">
                </div>
                <div class="form-group mb-4 col-md-6 col-12">
                    <label for="nama" class="form-label">Laporan</label>
                    <textarea name="laporan" required class="form-control" rows="7"><?= $data['pengaduan']['laporan'] ?></textarea>
                </div>
                <button class="btn btn-primary ml-2" type="submit">Simpan perubahan</button> 
            </div> 
        </form>
    </div>
</div>