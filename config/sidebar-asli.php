 <!-- Sidebar -->
<ul class="nav nav-pills flex-column mb-auto" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <!-- <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div> -->
        <div class="sidebar-brand-text mx-3">SARPRAS SEKOLAH</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Beranda -->
    <li class="nav-item <?=isset($home)?'active':'';?>">
        <a class="nav-link" href="?#">
            <i class="fas fa-fw fa-home"></i>
            <span>Beranda</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>
    <?php if($_SESSION['level']=='admin'):?>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?=isset($master)?'active':'';?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#master" aria-expanded="true"
            aria-controls="master">
            <i class="fas fa-fw fa-folder"></i>
            <span>Sekolah</span>
        </a>
        <div id="master" class="collapse <?=isset($master)?'show':'';?>" aria-labelledby="headingTwo"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?=isset($merek)?'active':'';?>" href="?merek">Peta</a>
                <a class="collapse-item <?=isset($kategori)?'active':'';?>" href="?kategori">Kategori</a>
                <a class="collapse-item <?=isset($kategori_sarana)?'active':'';?>" href="?kategori_sarana">Kategori Sarana</a>
                <a class="collapse-item <?=isset($kategori_prasarana)?'active':'';?>" href="?kategori_prasarana">Kategori Prasarana</a>
                <a class="collapse-item <?=isset($barang)?'active':'';?>" href="?barang">Barang</a>
                <a class="collapse-item <?=isset($pengguna)?'active':'';?>" href="?pengguna">Pengguna</a>
                <a class="collapse-item <?=isset($sekolah)?'active':'';?>" href="?sekolah">Sekolah</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?=isset($sarpras)?'active':'';?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#sarpras" aria-expanded="true"
            aria-controls="sarpras">
            <i class="fas fa-fw fa-folder"></i>
            <span>SarPras</span>
        </a>
        <div id="sarpras" class="collapse <?=isset($sarpras)?'show':'';?>" aria-labelledby="headingTwo"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?=isset($sarana)?'active':'';?>" href="?sarana">Sarana</a>
                <a class="collapse-item <?=isset($prasarana)?'active':'';?>" href="?prasarana">Prasarana</a>
                <a class="collapse-item <?=isset($sekolah_user)?'active':'';?>" href="?sekolah_user">Sekolah</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?=isset($laporan)?'active':'';?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#laporan" aria-expanded="true"
            aria-controls="laporan">
            <i class="fas fa-fw fa-folder"></i>
            <span>Laporan</span>
        </a>
        <div id="laporan" class="collapse <?=isset($laporan)?'show':'';?>" aria-labelledby="headingTwo"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?=isset($lap_barang_masuk)?'active':'';?>" href="?lap_barang_masuk">Laporan
                    Barang Masuk</a>
                <a class="collapse-item <?=isset($lap_barang_keluar)?'active':'';?>" href="?lap_barang_keluar">Laporan
                    Barang Keluar</a>
                <a class="collapse-item <?=isset($lap_stok_barang)?'active':'';?>"
                    href="<?=base_url();?>process/lap_stok_barang.php" target="_blank">Laporan Stok
                    Barang</a>
            </div>
        </div>
    </li>
    <?php endif; ?>

    <?php if($_SESSION['level']=='user'):?>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?=isset($sarpras)?'active':'';?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#sarpras" aria-expanded="true"
            aria-controls="sarpras">
            <i class="fas fa-fw fa-folder"></i>
            <span>SarPras</span>
        </a>
        <div id="sarpras" class="collapse <?=isset($sarpras)?'show':'';?>" aria-labelledby="headingTwo"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?=isset($sarana)?'active':'';?>" href="?sarana">Sarana</a>
                <a class="collapse-item <?=isset($prasarana)?'active':'';?>" href="?prasarana">Prasarana</a>
                <a class="collapse-item <?=isset($sekolah_user)?'active':'';?>" href="?sekolah_user">Sekolah</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?=isset($laporan)?'active':'';?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#laporan" aria-expanded="true"
            aria-controls="laporan">
            <i class="fas fa-fw fa-folder"></i>
            <span>Laporan</span>
        </a>
        <div id="laporan" class="collapse <?=isset($laporan)?'show':'';?>" aria-labelledby="headingTwo"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?=isset($lap_barang_masuk)?'active':'';?>" href="?lap_barang_masuk">Laporan
                    Barang Masuk</a>
                <a class="collapse-item <?=isset($lap_barang_keluar)?'active':'';?>" href="?lap_barang_keluar">Laporan
                    Barang Keluar</a>
                <a class="collapse-item <?=isset($lap_stok_barang)?'active':'';?>"
                    href="<?=base_url();?>process/lap_stok_barang.php" target="_blank">Laporan Stok
                    Barang</a>
            </div>
        </div>
    </li>
    <?php endif; ?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->