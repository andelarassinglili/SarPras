<?php
session_start();
include ('../config/conn.php');
include ('../config/function.php');

if(isset($_POST['tambah'])){
    $npsn = $_POST['npsn'];
    $nama_sekolah = $_POST['nama_sekolah'];
    $status = $_POST['status'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $kode_pos = $_POST['kode_pos'];
    $kelurahan = $_POST['kelurahan'];
    $kecamatan = $_POST['kecamatan'];

    $insert = mysqli_query($con,"INSERT INTO sekolah (npsn, nama_sekolah, status, alamat, telepon, kode_pos, kelurahan, kecamatan) VALUES ('$npsn','$nama_sekolah','$status','$alamat', '$telepon', '$kode_pos', '$kelurahan', '$kecamatan')") or die (mysqli_error($con));
    if($insert){
        $success = 'Berhasil menambahkan data sekolah_user';
    }else{
        $error = 'Gagal menambahkan data sekolah_user';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?sekolah_user');
}

if(isset($_POST['ubah'])){
    $id = $_POST['id'];
    $npsn = $_POST['npsn'];
    $nama_sekolah = $_POST['nama_sekolah'];
    $status = $_POST['status'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $kode_pos = $_POST['kode_pos'];
    $kelurahan = $_POST['kelurahan'];
    $kecamatan = $_POST['kecamatan'];

    $update = mysqli_query($con,"UPDATE sekolah SET npsn='$npsn', nama_sekolah='$nama_sekolah', alamat='$alamat', status='$status', telepon='$telepon', kode_pos='$kode_pos', kelurahan='$kelurahan', kecamatan='$kecamatan' WHERE id_sekolah='$id'") or die (mysqli_error($con));
    
    // var_dump($update);die;
    if($update > 0){
        $success = 'Berhasil mengubah data sekolah_user';
    }else{
        $error = 'Gagal mengubah data sekolah_user';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?sekolah_user');
}

if(decrypt($_GET['act'])=='delete' && isset($_GET['id'])!=""){
    // echo $_GET['act'];die;
    $id = decrypt($_GET['id']);
    $delete = mysqli_query($con, "DELETE FROM sekolah_user WHERE id_sekolah_user='$id'")or die(mysqli_error($con));
    if ($delete) {
        $success = "Data sekolah_user berhasil dihapus";
    }else{
        $error = "Data sekolah_user gagal dihapus";
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?sekolah_user');
}
?>