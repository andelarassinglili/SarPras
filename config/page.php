<?php
if (isset($_GET['backup_app'])) {
    include('proses/backup_app.php');
} else if (isset($_GET['backup_db'])) {
    include('proses/backup_db.php');
} else if (isset($_GET['merek'])) {
    $master = $merek = true;
    $views = 'views/master/merek.php';
} else if (isset($_GET['kategori'])) {
    $master = $kategori = true;
    $views = 'views/master/kategori.php';
} else if (isset($_GET['kategori_sarana'])) {
    $master = $kategori_sarana = true;
    $views = 'views/master/kategori_sarana.php';
} else if (isset($_GET['kategori_prasarana'])) {
    $master = $kategori_prasarana = true;
    $views = 'views/master/kategori_prasarana.php';
} else if (isset($_GET['barang'])) {
    $master = $barang = true;
    $views = 'views/master/barang.php';
} else if (isset($_GET['sekolah'])) {
    $master = $sekolah = true;
    $views = 'views/master/sekolah.php';
} else if (isset($_GET['sekolah_user'])) {
    $sarpras = $sekolah_user = true;
    $views = 'views/sarpras/sekolah_user.php';
} else if (isset($_GET['pengguna'])) {
    $master = $pengguna = true;
    $views = 'views/master/pengguna.php';
} else if (isset($_GET['admin'])) {
    $master = $admin = true;
    $views = 'views/master/admin.php';
} else if (isset($_GET['barang_masuk'])) {
    $transaksi = $barang_masuk = true;
    $views = 'views/transaksi/barang_masuk.php';
} else if (isset($_GET['barang_keluar'])) {
    $transaksi = $barang_keluar = true;
    $views = 'views/transaksi/barang_keluar.php';
} else if (isset($_GET['sarana'])) {
    $sarpras = $sarana = true;
    $views = 'views/sarpras/sarana.php';
} else if (isset($_GET['prasarana'])) {
    $sarpras = $prasarana = true;
    $views = 'views/sarpras/prasarana.php';
} else if (isset($_GET['sekolah'])) {
    $master = $sekolah = true;
    $views = 'views/master/sekolah.php';
} else if (isset($_GET['lap_barang_masuk'])) {
    $laporan = $lap_barang_masuk = true;
    $views = 'views/laporan/lap_barang_masuk.php';
} else if (isset($_GET['lap_barang_keluar'])) {
    $laporan = $lap_barang_keluar = true;
    $views = 'views/laporan/lap_barang_keluar.php';
} else {
    $home = true;
    $views = 'views/home.php';
}
?>
