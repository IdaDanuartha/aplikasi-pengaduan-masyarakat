<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center mt-3" href="#">
        <div class="sidebar-brand-icon">
            <img src="<?= BASE_URL ?>/assets/img/logo.png" width="60" alt="">
        </div>
        <div class="sidebar-brand-text mx-3">Pengaduan Masyarakat</div>
    </a>

    <hr class="sidebar-divider mb-0 mt-2">

    <?php if($_SESSION['user_session']['level'] !== 'masyarakat') : ?>
        <li class="nav-item <?= CURRENT_URL == BASE_URL . '/dashboard' || CURRENT_URL == BASE_URL . '/dashboard/index' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= BASE_URL ?>/dashboard">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
    <?php endif; ?>

    <?php if($_SESSION['user_session']['level'] === 'masyarakat') : ?>
        <li class="nav-item <?= CURRENT_URL == BASE_URL . '/pengaduan/masyarakat' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= BASE_URL ?>/pengaduan/masyarakat">
            <i class="fa-solid fa-comment-dots"></i>
                <span>Pengaduan Saya</span></a>
        </li>
    <?php endif; ?>

    <?php if($_SESSION['user_session']['level'] !== 'masyarakat') : ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fa-solid fa-comment-dots"></i>
                <span>Pengaduan</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                    <a class="collapse-item <?= CURRENT_URL == BASE_URL . '/pengaduan/masuk' ? 'active' : '' ?>" href="<?= BASE_URL ?>/pengaduan/masuk">Pengaduan Masuk</a>
                    <a class="collapse-item <?= CURRENT_URL == BASE_URL . '/pengaduan/proses' ? 'active' : '' ?>" href="<?= BASE_URL ?>/pengaduan/proses">Pengaduan Diproses</a>
                    <a class="collapse-item <?= CURRENT_URL == BASE_URL . '/pengaduan/tolak' ? 'active' : '' ?>" href="<?= BASE_URL ?>/pengaduan/tolak">Pengaduan Ditolak</a>
                    <a class="collapse-item <?= CURRENT_URL == BASE_URL . '/pengaduan/selesai' ? 'active' : '' ?>" href="<?= BASE_URL ?>/pengaduan/selesai">Pengaduan Selesai</a>
                </div>
            </div>
        </li>
    <?php endif; ?>                

    <?php if($_SESSION['user_session']['level'] === 'admin') : ?>
        <li class="nav-item <?= CURRENT_URL == BASE_URL . '/petugas' || CURRENT_URL == BASE_URL . '/petugas/index' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= BASE_URL ?>/petugas">
            <i class="fa-solid fa-user-shield"></i>
                <span>Petugas</span></a>
        </li>
    <?php endif; ?>

    <?php if($_SESSION['user_session']['level'] !== 'admin') : ?>
        <li class="nav-item <?= CURRENT_URL == BASE_URL . '/profile' || CURRENT_URL == BASE_URL . '/profile/index' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= BASE_URL ?>/profile">
            <i class="fa-solid fa-user-gear"></i>
                <span>Profile</span></a>
        </li>
    <?php endif; ?>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none mt-4 d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Search -->
            <!-- <form
                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                        aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form> -->

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                        aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small"
                                    placeholder="Search for..." aria-label="Search"
                                    aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['user_session']['nama'] ?></span>
                        <?php if(isset($_SESSION['user_session']['profile_picture'])) : ?>
                            <img class="img-profile rounded-circle"
                            src="<?= BASE_URL ?>/uploads/users/<?= $_SESSION['user_session']['profile_picture'] ?>">
                        <?php else : ?>
                            <img class="img-profile rounded-circle"
                            src="<?= BASE_URL ?>/assets/img/undraw_profile_2.svg">
                        <?php endif; ?>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">                
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->