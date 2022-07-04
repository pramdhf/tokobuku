<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">DUNIA ILMU</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/dashboard'); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Kelola Toko
        </div>

        <!-- Nav Item - Produk -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/produk'); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Produk</span></a>
        </li>

        <!-- Nav Item - Kategori -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/kategori'); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Kategori</span></a>
        </li>

        <!-- Nav Item - Pesanan -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/pesanan'); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Pesanan</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Keluar
        </div>

        <!-- Nav Item - Keluar -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth/logout') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Keluar</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

    </ul>
    <!-- End of Sidebar -->