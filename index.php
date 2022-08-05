<?php
session_start();
$pengguna = $_SESSION['id_sekolah'];
if ($_SESSION['username'] == "" && $_SESSION['level'] == "") :
    header("Location:" . $base_url . "login.php");
else :
    include('config/header.php');

    session_timeout();
?>

    <body>


        <?php include "config/page.php"; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <?php include "config/topbar.php"; ?>
                <?php include "config/sidebar.php"; ?>

                <?php if (isset($_SESSION['success'])) : ?>
                    <div id="flash-success" data-flash="<?= $_SESSION['success']; ?>"></div>
                    <div class="alert alert-primary alert-dismissible fade show" data-berhasil="<?= $_SESSION['success']; ?>"></div>
                <?php endif;
                unset($_SESSION['success']); ?>
                <?php if (isset($_SESSION['error'])) : ?>
                    <div id="flash-error" data-flash="<?= $_SESSION['error']; ?>"></div>
                    <div class="alert alert-danger alert-dismissible fade show" data-gagal="<?= $_SESSION['error']; ?>"></div>
                <?php endif;
                unset($_SESSION['error']); ?>
                <?php include($views); ?>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; SarPras <?= date('Y'); ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->
        <!-- End of Page Wrapper -->
        <?php include "config/footer.php"; ?>
    <?php endif; ?>