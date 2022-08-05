<?php
session_start();
include ('../config/conn.php');
include ('../config/function.php');

if(isset($_POST['tambah'])){
    $jenis_prasarana = $_POST['jenis_prasarana'];
    $nama_prasarana = $_POST['nama_prasarana'];
    $no_regis = $_POST['no_regis'];
    $luas = $_POST['luas'];
    $kapasitas = $_POST['kapasitas'];
    $kondisi = $_POST['kondisi_prasarana'];
    $idsekolah=$_SESSION['id_sekolah'];

    $insert = mysqli_query($con,"INSERT INTO prasarana (jenis_prasarana, nama_prasarana, no_regis, luas, kapasitas, id_sekolah, kondisi_prasarana) VALUES ('$jenis_prasarana','$nama_prasarana','$no_regis','$luas', '$kapasitas', '$idsekolah', '$kondisi')") or die (mysqli_error($con));
    if($insert){
        $success = 'Berhasil menambahkan data prasarana';
    }else{
        $error = 'Gagal menambahkan data prasarana';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?prasarana');
}

if(isset($_POST['ubah'])){
    $id = $_POST['id'];
    $jenis_prasarana = $_POST['jenis_prasarana'];
    $nama_prasarana = $_POST['nama_prasarana'];
    $no_regis = $_POST['no_regis'];
    $luas = $_POST['luas'];
    $kapasitas = $_POST['kapasitas'];
    $kondisi = $_POST['kondisi_prasarana'];

    $update = mysqli_query($con,"UPDATE prasarana SET jenis_prasarana='$jenis_prasarana', nama_prasarana='$nama_prasarana', luas='$luas', no_regis='$no_regis', kapasitas='$kapasitas', kondisi_prasarana='$kondisi' WHERE id_prasarana='$id'") or die (mysqli_error($con));
    
    // var_dump($update);die;
    if($update > 0){
        $success = 'Berhasil mengubah data prasarana';
    }else{
        $error = 'Gagal mengubah data prasarana';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?prasarana');
}

if(decrypt($_GET['act'])=='delete' && isset($_GET['id'])!=""){
    // echo $_GET['act'];die;
    $id = decrypt($_GET['id']);
    $delete = mysqli_query($con, "DELETE FROM prasarana WHERE id_prasarana='$id'")or die(mysqli_error($con));
    if ($delete) {
        $success = "Data prasarana berhasil dihapus";
    }else{
        $error = "Data prasarana gagal dihapus";
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?prasarana');
}
