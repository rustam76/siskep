<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Informasi Kepegawain SDN 1 Mokupa</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/sweet/sweetalert2.min.css">

</head>

<body id="page-top">

    <div id="wrapper">

        <!-- Sidebar -->

        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-text mx-3">
                    <img src="<?= base_url('assets/img/logsd.png')?>" alt="" width="200px">
                </sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <?php if ($this->session->userdata('level') == "admin") { ?>
                <!-- Nav Item - Dashboard -->
                <li class="nav-item <?= $this->uri->segment(2) == 'Home' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= base_url('admin/Home') ?>">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Interface
                </div>
                
                <li class="nav-item <?= $this->uri->segment(2) == 'Disposisi' ? 'active' : '' ?>">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-pen"></i>
                        <span>Surat</span>
                    </a>
                    <div id="collapseTwo" class="collapse <?=  $this->uri->segment(2) == 'Disposisi'  ? 'show' : '' ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Data Surat:</h6>
                            <a class="collapse-item " href="<?= base_url('admin/Disposisi'); ?>">Masuk</a>
                            <a class="collapse-item" href="<?= base_url('admin/Disposisi/Arsip'); ?>">Arsip</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item <?= $this->uri->segment(2) == 'Pegawai' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= base_url('admin/Pegawai'); ?>">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Data Pegawai</span>
                    </a>
                </li>
                <li class="nav-item <?= $this->uri->segment(3) == 'absenuser' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= base_url('admin/Absensi/absenuser'); ?>">
                    <i class="fas fa-fw fa-clipboard-list"></i>
                        <span>Data Absensi</span>
                    </a>
                </li>


                <li class="nav-item <?= $this->uri->segment(2) == 'User' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= base_url('admin/User'); ?>">
                    <i class="fas fa-fw fa-folder"></i>
                        <span>Data User</span>
                    </a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Pengguna
                </div>

                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Auth/logout') ?>" id="btn-keluar">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        <span>Log Out</span></a>
                </li>

                <?php } else if ($this->session->userdata('level') == "atasan") { ?>
                <!-- Nav Item - Dashboard -->
                <li class="nav-item  <?= $this->uri->segment(1) == 'Home' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= base_url('Home') ?>">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Interface
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item  <?= $this->uri->segment(1) == 'Disposisi' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= base_url('Disposisi'); ?>">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Disposisi</span>
                    </a>
                </li>
                <li class="nav-item  <?= $this->uri->segment(1) == 'Absensi' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= base_url('Absensi'); ?>">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Data Absensi</span>
                    </a>
                </li>


                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Pengguna
                </div>

                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Auth/logout') ?>" id="btn-keluar">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        <span>Log Out</span></a>
                </li>


            <?php } else if ($this->session->userdata('level') == "pegawai") { ?>
                <!-- Nav Item - Dashboard -->
                <li class="nav-item  <?= $this->uri->segment(1) == 'Home' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= base_url('Home') ?>">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Interface
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item <?php echo activate_menu('Disposisi'); ?>">
                    <a class="nav-link" href="<?= base_url('Disposisi'); ?>">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Disposisi</span>
                    </a>
                </li>
                <li class="nav-item <?php echo activate_menu('Absensi'); ?>">
                    <a class="nav-link" href="<?= base_url('Absensi'); ?>">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Data Absensi</span>
                    </a>
                </li>


                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Pengguna
                </div>

                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Auth/logout') ?>" id="btn-keluar">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        <span>Log Out</span></a>
                </li>
            <?php } ?>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>




        </ul>
        <!-- End of Sidebar -->