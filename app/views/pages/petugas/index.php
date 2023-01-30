<div class="container-fluid">
    <div class="my-3">
        <?php Flasher::flash(); ?>
    </div>
    <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Data Petugas</h6>
        <a href="<?= BASE_URL ?>/petugas/create" class="btn btn-primary">Tambah Petugas</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Profile Picture</th>
                        <th>Nama Petugas</th>
                        <th>Username</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['petugas'] as $key => $value) : ?>
                        <tr>
                            <td><?= ++$key ?></td>
                            <td>
                                <img src="<?= BASE_URL ?>/uploads/users/<?= $value['profile_picture'] ?>" alt="" width="40">
                            </td>
                            <td><?= $value['nama'] ?></td>
                            <td><?= $value['username'] ?></td>
                            <td>
                                <a href="<?= BASE_URL ?>/petugas/edit/<?= $value['id'] ?>" class="btn btn-primary btn-sm mr-2">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletePetugas<?= $value['id'] ?>Modal">Delete</a>
                            </td>
                        </tr>

                        <!-- Modal Delete -->
                        <div class="modal fade" id="deletePetugas<?= $value['id'] ?>Modal" tabindex="-1" aria-labelledby="deletePetugas<?= $value['id'] ?>ModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deletePetugas<?= $value['id'] ?>ModalLabel">Hapus Petugas</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Apakah kamu yakin ingin menghapus data petugas ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="<?= BASE_URL ?>/petugas/destroy/<?= $value['id'] ?>" type="button" class="btn btn-danger">Hapus</a>
                                </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>