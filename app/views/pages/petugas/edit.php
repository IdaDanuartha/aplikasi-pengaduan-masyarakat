<div class="container-fluid">
    <div class="my-3">
        <?php Flasher::flash(); ?>
    </div>
    <div class="card shadow mb-4">
        <form action="<?= BASE_URL ?>/petugas/update/<?= $data['petugas']['id'] ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="old_profile_picture" value="<?= $data['petugas']['profile_picture'] ?>">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Petugas</h6>
            </div> 
            <div class="py-3">
                <div class="form-group mb-4 col-md-6 col-12">
                    <img src="<?= BASE_URL ?>/uploads/users/<?= $data['petugas']['profile_picture'] ?>" width="200" alt="" class="rounded">
                    <input type="file" required name="profile_picture" class="form-control mt-3">
                </div>
                <div class="form-group mb-4 col-md-6 col-12">
                    <label for="nama" class="form-label">Nama Petugas</label>
                    <input type="text" required name="nama" value="<?= $data['petugas']['nama'] ?>" class="form-control">
                </div>  
                <div class="form-group mb-4 col-md-6 col-12">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" required name="username" value="<?= $data['petugas']['username'] ?>" class="form-control">
                </div>  
                <!-- <div class="form-group mb-4 col-md-6 col-12">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" required name="password" class="form-control">
                </div>  -->
                <button class="btn btn-primary ml-2" type="submit">Simpan perubahan</button> 
            </div> 
        </form>
    </div>
</div>