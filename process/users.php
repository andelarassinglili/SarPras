<?php
session_start();
include('../config/conn.php');
include('../config/function.php');

if (isset($_POST['tambah'])) {
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $level = $_POST['level'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $id_sekolah = $_POST['id_sekolah'];

    $cek = mysqli_query($con, "SELECT * FROM users WHERE username='$username'") or die(mysqli_error($con));
    if (mysqli_num_rows($cek) == 0) {
        $insert = mysqli_query($con, "INSERT INTO users (nama, no_hp, username, password, level, id_sekolah) VALUES ('$nama','$no_hp','$username','$password','$level', '$id_sekolah')") or die(mysqli_error($con));
        if ($insert) {
            echo '<script>alert("Welcome to Geeks for Geeks")</script>';
            $success = 'Berhasil menambahkan data users';
        } else {
            $error = 'Gagal menambahkan data users';
        }
    } else {
        $error = 'Username telah terdaftar !';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?pengguna');
}
if (isset($_POST['ubah'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $level = $_POST['level'];
    $id_sekolah = $_POST['id_sekolah'];

    if ($password != "") {
        $update = mysqli_query($con, "UPDATE users SET nama='$nama', username='$username', no_hp='$no_hp', password='$password', level='$level', id_sekolah='$id_sekolah' WHERE id_users='$id'") or die(mysqli_error($con));
    } else {
        $update = mysqli_query($con, "UPDATE users SET nama='$nama', username='$username', no_hp='$no_hp', level='$level', id_sekolah='$id_sekolah' WHERE id_users='$id'") or die(mysqli_error($con));
    }
    if ($update) {
        $success = 'Berhasil mengubah data users';
    } else {
        $error = 'Gagal mengubah data users';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?pengguna');
}

if (decrypt($_GET['act']) == 'delete' && isset($_GET['id']) != "") {
    $id = decrypt($_GET['id']);
    $delete = mysqli_query($con, "DELETE FROM users WHERE id_users='$id'") or die(mysqli_error($con));
    if ($delete) {
        $success = "Data users berhasil dihapus";
    } else {
        $error = "Data users gagal dihapus";
    }
    $_SESSION['success'] = $success;
    header('Location:../?pengguna');
}

if (decrypt($_GET['act']) == 'ganti_pass' && isset($_POST['ubah_pass'])) {
    $id = $_POST['id'];
    $password = $_POST['old_password'];
    $password_baru = $_POST['new_password'];
    $konfirmasi_password = $_POST['valid_password'];
    $cek = mysqli_query($con, "SELECT * FROM users WHERE id_users='$id'") or die(mysqli_error($con));
    $password_lama  = mysqli_fetch_array($cek);
    $validasi1 = password_verify($password, $password_lama['password']);
    if (mysqli_num_rows($cek) == 0) {
        $error = "Username tidak ditemukan";
    } else if ($validasi1 == true) {
        if ($password_baru == $konfirmasi_password) {
            $update = mysqli_query($con, "UPDATE users SET password='" . password_hash($password_baru, PASSWORD_DEFAULT) . "' WHERE id_users='$id'") or die(mysqli_error($con));
            if ($update) {
                $success = "Password berhasil diubah";
            } else {
                $error = "Password gagal diubah";
            }
        } else {
            $error = "Password baru dan konfirmasi password tidak sama";
        }
    } else {
        $error = "Password Lama Tidak Sesuai";
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?pengguna');
}
