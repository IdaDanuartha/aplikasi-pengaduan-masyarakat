<div class="container-fluid">
    <div class="my-3">
        <?php Flasher::flash(); ?>
    </div>
    <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Data Petugas</h6>
        <a href="<?= BASE_URL ?>/pengaduan/tambah" class="btn btn-primary">Tambah Pengaduan</a>
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
                                <a href="#" class="btn btn-primary btn-sm mr-2" data-toggle="modal" data-target="#detailPengaduan<?= $value['id'] ?>Modal">Detail</a>
                                <a href="<?= BASE_URL ?>/pengaduan/edit/<?= $value['id'] ?>" class="btn btn-warning btn-sm mr-2">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletePengaduan<?= $value['id'] ?>Modal">Delete</a>
                            </td>
                        </tr>

                         <!-- Modal Detail -->
                         <div class="modal fade" id="detailPengaduan<?= $value['id'] ?>Modal" tabindex="-1" aria-labelledby="detailPengaduan<?= $value['id'] ?>ModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="detailPengaduan<?= $value['id'] ?>ModalLabel">Detail Pengaduan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <img src="<?= BASE_URL ?>/uploads/pengaduan/<?= $value['gambar'] ?>" width="300" class="rounded" alt="">
                                    <div class="form-group my-3">
                                        <label>Laporan Pengaduan</label>
                                        <textarea rows="4" class="form-control" readonly><?= $value['laporan'] ?></textarea>
                                    </div>
                                    <?php if($value['tanggapan']) : ?>
                                    <hr>
                                        <div class="form-group my-3">
                                            <label>Tanggapan</label>
                                            <textarea rows="4" class="form-control" readonly><?= $value['tanggapan'] ?></textarea>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Delete -->
                        <div class="modal fade" id="deletePengaduan<?= $value['id'] ?>Modal" tabindex="-1" aria-labelledby="deletePengaduan<?= $value['id'] ?>ModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deletePengaduan<?= $value['id'] ?>ModalLabel">Hapus Pengaduan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Apakah kamu yakin ingin menghapus data pengaduan ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="<?= BASE_URL ?>/pengaduan/destroy/<?= $value['id'] ?>" type="button" class="btn btn-danger">Hapus</a>
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