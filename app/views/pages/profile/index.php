<div class="container-fluid">
    <div class="card shadow mb-4">
        <form action="<?= BASE_URL ?>/pengaduan/store" method="post" enctype="multipart/form-data">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Profile Saya</h6>
            </div> 
            <div class="row gap-4 p-3">
                <div class="col-lg-6 col-12">
                    <div class="form-group mb-4">
                        <label class="d-block text-primary">Profile Picture</label>
                        <?php if(isset($_SESSION['user_session']['gambar'])) : ?>
                            <img src="<?= $_SESSION['user_session']['gambar'] ?>" width="150" alt="" class="rounded">
                        <?php else : ?>
                            <img src="<?= BASE_URL ?>/assets/img/undraw_profile_1.svg" width="150" alt="" class="rounded">
                        <?php endif; ?>
                        <input type="file" name="gambar" class="form-control mt-3">
                    </div>
                    <div class="form-group mb-4">
                        <label class="d-block text-primary">Nama</label>
                        <input type="text" class="form-control" name="nama" value="<?= $_SESSION['user_session']['nama'] ?>">
                    </div>
                    <div class="form-group mb-4">
                        <label class="d-block text-primary">Username</label>
                        <input type="text" class="form-control" name="username" value="<?= $_SESSION['user_session']['username'] ?>">
                    </div>
                </div> 
                <div class="col-lg-6 col-12">
                    <h6 class="mb-3 font-weight-bold text-primary">Ubah password</h6>
                    <div class="form-group mb-4">
                        <label class="d-block text-primary">Password Lama</label>
                        <input type="password" class="form-control" name="old_password">
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12 mb-4">
                            <label class="d-block text-primary">Password Baru</label>
                            <input type="password" class="form-control" name="new_password">
                        </div>
                        <div class="form-group mb-4 col-md-6 col-12">
                            <label class="d-block text-primary">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" name="confirm_new_password">
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                    </div>
                </div> 
            </div> 
        </form>
    </div>
</div>