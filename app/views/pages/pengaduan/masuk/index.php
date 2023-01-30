
<div class="container-fluid">

    <div class="d-sm-flex align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pengaduan Masuk</h1>                
    </div>
    <div class="my-3">
        <?php Flasher::flash(); ?>
    </div>
    <?php if(count($data['pengaduan']) > 0) : ?>
    <div class="row row-cols-5 g-4">
        <?php foreach($data['pengaduan'] as $key => $value) : ?>
            <div class="col">
                <div class="card position-relative" style="width: 18rem;">
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
                        <a href="<?= BASE_URL ?>/pengaduandetail/masuk/<?= $value['id'] ?>" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php else : ?>
        <div class="alert alert-warning" role="alert">
            Belum ada pengaduan yang masuk
        </div>
    <?php endif; ?>
</div>

