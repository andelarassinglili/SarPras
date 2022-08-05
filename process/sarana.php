<?php
session_start();
include ('../config/conn.php');
include ('../config/function.php');

if(isset($_POST['tambah'])){
    $jenis_sarana = $_POST['jenis_sarana'];
    $nama_sarana = $_POST['nama_sarana'];
    $no_regis = $_POST['no_regis'];
    $keperluan = $_POST['keperluan'];
    $kondisi = $_POST['kondisi_sarana'];
    $idsekolah=$_SESSION['id_sekolah'];

    $insert = mysqli_query($con,"INSERT INTO sarana (jenis_sarana, nama_sarana, no_regis, keperluan, kondisi_sarana, id_sekolah) VALUES ('$jenis_sarana','$nama_sarana','$no_regis','$keperluan', '$kondisi', '$idsekolah')") or die (mysqli_error($con));
    if($insert){
        $success = 'Berhasil menambahkan data sarana';
    }else{
        $error = 'Gagal menambahkan data sarana';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?sarana');
}

if(isset($_POST['ubah'])){
    $id = $_POST['id'];
    $jenis_sarana = $_POST['jenis_sarana'];
    $nama_sarana = $_POST['nama_sarana'];
    $no_regis = $_POST['no_regis'];
    $keperluan = $_POST['keperluan'];
    $kondisi = $_POST['kondisi_sarana'];

    $update = mysqli_query($con,"UPDATE sarana SET jenis_sarana='$jenis_sarana', nama_sarana='$nama_sarana', keperluan='$keperluan', no_regis='$no_regis', kondisi_sarana='$kondisi' WHERE id_sarana='$id'") or die (mysqli_error($con));
    
    // var_dump($update);die;
    if($update > 0){
        $success = 'Berhasil mengubah data sarana';
    }else{
        $error = 'Gagal mengubah data sarana';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?sarana');
}

if(decrypt($_GET['act'])=='delete' && isset($_GET['id'])!=""){
    // echo $_GET['act'];die;
    $id = decrypt($_GET['id']);
    $delete = mysqli_query($con, "DELETE FROM sarana WHERE id_sarana='$id'")or die(mysqli_error($con));
    if ($delete) {
        $success = "Data sarana berhasil dihapus";
    }else{
        $error = "Data sarana gagal dihapus";
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?sarana');
}
?>