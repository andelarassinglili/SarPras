<?php
session_start();
include ('../config/conn.php');
include ('../config/function.php');

if(isset($_POST['tambah'])){
    $nama = $_POST['nama'];
    $keterangan = $_POST['keterangan'];

    $insert = mysqli_query($con,"INSERT INTO kategori_sarana (keterangan, nama) VALUES ('$keterangan','$nama')") or die (mysqli_error($con));
    if($insert){
        $success = 'Berhasil menambahkan data kategori_sarana';
    }else{
        $error = 'Gagal menambahkan data kategori_sarana';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?kategori_sarana');
}

if(isset($_POST['ubah'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $keterangan = $_POST['keterangan'];

    $update = mysqli_query($con,"UPDATE kategori_sarana SET keterangan='$keterangan', nama='$nama' WHERE idkat_sarana='$id'") or die (mysqli_error($con));
    
    // var_dump($update);die;
    if($update > 0){
        $success = 'Berhasil mengubah data kategori_sarana';
    }else{
        $error = 'Gagal mengubah data kategori_sarana';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?kategori_sarana');
}

if(decrypt($_GET['act'])=='delete' && isset($_GET['id'])!=""){
    // echo $_GET['act'];die;
    $id = decrypt($_GET['id']);
    $delete = mysqli_query($con, "DELETE FROM kategori_sarana WHERE idkat_sarana='$id'")or die(mysqli_error($con));
    if ($delete) {
        $success = "Data kategori_sarana berhasil dihapus";
    }else{
        $error = "Data kategori_sarana gagal dihapus";
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?kategori_sarana');
}
?>