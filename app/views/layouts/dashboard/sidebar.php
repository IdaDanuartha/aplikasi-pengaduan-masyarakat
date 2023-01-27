<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center mt-3" href="#">
        <!-- <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div> -->
        <div class="sidebar-brand-text mx-3">Aplikasi Pengaduan Masyarakat</div>
    </a>

    <hr class="sidebar-divider mb-0 mt-3">

    <li class="nav-item">
        <a class="nav-link" href="<?= BASE_URL ?>/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Pengaduan</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                <a class="collapse-item" href="<?= BASE_URL ?>/pengaduan/masuk">Pengaduan Masuk</a>
                <a class="collapse-item" href="<?= BASE_URL ?>/pengaduan/proses">Pengaduan Diproses</a>
                <a class="collapse-item" href="<?= BASE_URL ?>/pengaduan/tolak">Pengaduan Ditolak</a>
                <a class="collapse-item" href="<?= BASE_URL ?>/pengaduan/selesai">Pengaduan Selesai</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= BASE_URL ?>/laporan">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Laporan</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= BASE_URL ?>/pengguna">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Pengguna</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none mt-4 d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
