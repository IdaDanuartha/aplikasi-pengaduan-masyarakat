<div id="content">

    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Search -->
        <form
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
        </form>

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
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                    <img class="img-profile rounded-circle"
                        src="<?= BASE_URL ?>/assets/img/undraw_profile.svg">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>

        </ul>

    </nav>

    <div class="container-fluid">

        <div class="d-sm-flex align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Detail Pengaduan Masuk</h1>                
        </div>

        <div class="form-group mb-3 d-flex">
            <img src="https://picsum.photos/300" class="rounded" alt="">
            <div class="ml-3 p-3 rounded text-white bg-primary">
                <div class="mb-3 d-flex">
                    <h6 class="font-weight-bold mr-2">Tanggal Pengaduan : </h6>
                    <h6><?= date_format(date_create($data['pengaduan']['created_at']), "d M Y") ?></h6>
                </div>
                <div class="mb-3 d-flex">
                    <h6 class="font-weight-bold mr-2">Jam Pengaduan : </h6>
                    <h6><?= date_format(date_create($data['pengaduan']['created_at']), "H.i") ?></h6>
                </div>
                <div class="mb-3 d-flex">
                    <h6 class="font-weight-bold mr-2">Pelapor : </h6>
                    <h6><?= $data['pengaduan']['nama'] ?></h6>
                </div>
                <div class="mb-3">
                    <h6 class="font-weight-bold mr-2">Laporan : </h6>
                    <h6><?= $data['pengaduan']['laporan'] ?></h6>
                </div>
            </div>
        </div>

        <hr>

        <form action="" method="post" class="mt-4">
            <h5 class="font-weight-bold">Masukkan tanggapan anda</h5>
            <div class="form-group my-3">
                <h6>Status tanggapan</h6>
                <div class="d-flex">
                    <div class="d-flex mr-3">
                        <input type="radio" name="status" id="setuju" value="setuju">
                        <label for="setuju" class="ml-2 mt-1">Setuju</label>
                    </div>
                    <div class="d-flex">
                        <input type="radio" name="status" id="tolak" value="tolak">
                        <label for="tolak" class="ml-2 mt-1">Tolak</label>
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="tanggapan" class="d-block">Tanggapan</label>
                <textarea name="tanggapan" class="form-control" id="tanggapan" rows="7" style="width:
                500px"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</div>

