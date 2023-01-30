<div class="container-fluid">
    <div class="my-3">
        <?php Flasher::flash(); ?>
    </div>
    <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Data Petugas</h6>
        <a href="<?= BASE_URL ?>/pengaduan/tambah" class="btn btn-primary">Tambah Petugas</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pengaduan</th>
                        <th>Jam Pengaduan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['pengaduan'] as $key => $value) : ?>
                        <tr>
                            <td><?= ++$key ?></td>
                            <td><?= date_format(date_create($value['created_at']), "d M Y") ?></td>
                            <td><?= date_format(date_create($value['created_at']), "H.i") ?></td>
                            <td class="text-capitalize"><?= $value['status'] ?></td>
                            <td>
                                <a href="#" class="btn btn-primary btn-sm mr-2">Detail</a>
                                <a href="<?= BASE_URL ?>/pengaduan/edit/<?= $value['id'] ?>" class="btn btn-warning btn-sm mr-2">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>