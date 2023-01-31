<div class="container-fluid">

    <div class="d-sm-flex align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pengaduan Selesai</h1>                
    </div>

    <?php if(count($data['pengaduan']) > 0) : ?>
    <div class="row row-cols-4 g-4">
        <?php foreach($data['pengaduan'] as $key => $value) : ?>
            <div class="col">
                <div class="card position-relative">
                <div class="badge badge-success position-absolute" style="top: 10px; right: 10px;">
                    <?= date_format(date_create($value['created_at']), 'd M Y') ?>
                </div>
                <img src="<?= BASE_URL ?>/uploads/pengaduan/<?= $value['gambar'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="mb-1 d-flex">
                            <h6 class="font-weight-bold mr-2">Pelapor : </h6>
                            <h6><?= $value['nama'] ?></h6>
                        </div>
                        <div class="mb-3">
                            <h6 class="font-weight-bold mr-2">Laporan </h6>
                            <p>- <?= $value['laporan'] ?></p>
                        </div>
                        <div class="mb-3">
                            <h6 class="font-weight-bold mr-2">Tanggapan </h6>
                            <p>- <?= $value['tanggapan'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php else : ?>
        <div class="alert alert-warning" role="alert">
            Belum ada pengaduan yang selesai
        </div>
    <?php endif; ?>
</div>