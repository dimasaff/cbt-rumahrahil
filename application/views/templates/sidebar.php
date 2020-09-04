<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon ">
            <img src="<?= base_url('assets/') ?>img/cms.png" width="60px" height="60px">
        </div>
        <div class="sidebar-brand-text mx-3">RUMAH RAHIL</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data Khusus SD
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('theme'); ?>">
            <i class="fas fa-book"></i>
            <span>Tema</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('theme/subtema'); ?>">
            <i class="fas fa-book"></i>
            <span>SubTema</span>
        </a>
    </li>
    <!-- Heading -->
    <div class="sidebar-heading">
        Data Khusus SMP dan SMA
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#">
            <i class="fas fa-book"></i>
            <span>Mata Pelajaran</span>
        </a>
    </li>
    <!-- Nav Item - Charts -->
    <div class="sidebar-heading">
        Data Soal dan Kunci Jawaban
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#">
            <i class="fas fa-book"></i>
            <span>Soal</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#">
            <i class="fas fa-book"></i>
            <span>Jawaban</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#">
            <i class="fas fa-book"></i>
            <span>Kunci Jawaban</span>
        </a>
    </li>
    <div class="sidebar-heading">
        Data Nilai Siswa
    </div>
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->