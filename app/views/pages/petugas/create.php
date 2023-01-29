<div class="container-fluid">
    <div class="card shadow mb-4">
        <form action="<?= BASE_URL ?>/petugas/store" method="post" enctype="multipart/form-data">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Petugas</h6>
            </div> 
            <div class="py-3">
                <div class="form-group mb-4 col-md-6 col-12">
                    <img src="https://picsum.photos/200" alt="" class="rounded">
                    <input type="file" name="profile_picture" class="form-control mt-3">
                </div>
                <div class="form-group mb-4 col-md-6 col-12">
                    <label for="nama" class="form-label">Nama Petugas</label>
                    <input type="text" name="nama" class="form-control">
                </div>  
                <div class="form-group mb-4 col-md-6 col-12">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control">
                </div>  
                <div class="form-group mb-4 col-md-6 col-12">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control">
                </div> 
                <button class="btn btn-primary ml-2" type="submit">Tambah</button> 
            </div> 
        </form>
    </div>
</div>