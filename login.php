<?php
session_start();
include('config/conn.php');
$base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$base_url .= "://" . $_SERVER['HTTP_HOST'];
$base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

if (isset($_POST['cek_login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) && empty($password)) {
        $error = 'Harap isi username dan password';
    } else {
        $user = mysqli_query($con, "SELECT * FROM users WHERE username='$username'") or die(mysqli_error($con));
        if (mysqli_num_rows($user) != 0) {
            $data = mysqli_fetch_array($user);
            if (password_verify($password, $data['password'])) {
                $_SESSION['iduser'] = $data['id_users'];
                $_SESSION['username'] = $data['username'];
                $_SESSION['fullname'] = $data['nama'];
                $_SESSION['level'] = $data['level'];
                $_SESSION['id_sekolah'] = $data['id_sekolah'];
                if  ($_SESSION['level'] == 'admin') {
                    header("Location:" . $base_url);
                } else {
                    header('Location:../?sekolah_user');
                }
            } else {
                $error = 'Password anda salah';
            }
        } else {
            $error = 'Username tidak terdaftar';
        }
    }
    $_SESSION['error'] = $error;
}
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>SarPras</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./bin/images/favicon.png">
    <link href="./bin/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="index.html"><img src="images/logo-full.png" alt=""></a>
                                    </div>
                                    <h4 class="text-center mb-4 text-white">Sign in your account</h4>
                                    <?php if (isset($_SESSION['success'])) : ?>
                                        <div class="flash-data-berhasil" data-berhasil="<?= $_SESSION['success']; ?>"></div>
                                    <?php endif;
                                    unset($_SESSION['success']); ?>
                                    <?php if (isset($_SESSION['error'])) : ?>
                                        <div class="flash-data-gagal" data-gagal="<?= $_SESSION['error']; ?>"></div>
                                    <?php endif;
                                    unset($_SESSION['error']); ?>
                                    <form class="user" method="post" action="">
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Email</strong></label>
                                            <input type="text" name="username" class="form-control" placeholder="Masukkan username">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Password</strong></label>
                                            <input type="password" name="password" class="form-control" placeholder="Masukkan password">
                                        </div>
                                        <hr>
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-white text-primary btn-block" name="cek_login">Login</button>
                                        </div>

                                        <hr>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./bin/vendor/global/global.min.js"></script>
    <script src="./bin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="./bin/js/custom.min.js"></script>
    <script src="./bin/js/deznav-init.js"></script>
</body>

</html>