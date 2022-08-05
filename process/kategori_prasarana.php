<?php
session_start();
include ('../config/conn.php');
include ('../config/function.php');

if(isset($_POST['tambah'])){
    $nama = $_POST['nama'];
    $keterangan = $_POST['keterangan'];

    $insert = mysqli_query($con,"INSERT INTO kategori_prasarana (keterangan, nama) VALUES ('$keterangan','$nama')") or die (mysqli_error($con));
    if($insert){
        $success = 'Berhasil menambahkan data kategori_prasarana';
    }else{
        $error = 'Gagal menambahkan data kategori_prasarana';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?kategori_prasarana');
}

if(isset($_POST['ubah'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $keterangan = $_POST['keterangan'];

    $update = mysqli_query($con,"UPDATE kategori_prasarana SET keterangan='$keterangan', nama='$nama' WHERE idkat_prasarana='$id'") or die (mysqli_error($con));
    
    // var_dump($update);die;
    if($update > 0){
        $success = 'Berhasil mengubah data kategori_prasarana';
    }else{
        $error = 'Gagal mengubah data kategori_prasarana';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?kategori_prasarana');
}

if(decrypt($_GET['act'])=='delete' && isset($_GET['id'])!=""){
    // echo $_GET['act'];die;
    $id = decrypt($_GET['id']);
    $delete = mysqli_query($con, "DELETE FROM kategori_prasarana WHERE idkat_prasarana='$id'")or die(mysqli_error($con));
    if ($delete) {
        $success = "Data kategori_prasarana berhasil dihapus";
    }else{
        $error = "Data kategori_prasarana gagal dihapus";
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?kategori_prasarana');
}
?>