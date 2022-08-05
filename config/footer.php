<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Keluar</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body bg-danger text-white">Anda yakin ingin keluar dari aplikasi ?</div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-sm btn-danger" href="<?= base_url(); ?>process/logout.php"><i class="fas fa-sign-out-alt"></i>
                    Iya, Keluar</a>
            </div>
        </div>
    </div>
</div>
<!-- Ganti Password Modal-->
<div class="modal fade" id="gantiPasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url(); ?>process/users.php?act=<?= encrypt('ganti_pass'); ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="text-black">Password Lama</label>
                        <input type="hidden" name="id" value="<?= $_SESSION['iduser']; ?>">
                        <input type="password" name="old_password" class="form-control">
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="text-black">Password Baru</label>
                        <input type="hidden" name="id" value="<?= $_SESSION['iduser']; ?>">
                        <input type="password" name="new_password" class="form-control" required>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="text-black">Konfirmasi Password</label>
                        <input type="hidden" name="id" value="<?= $_SESSION['iduser']; ?>">
                        <input type="password" name="valid_password" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-sm btn-success" type="submit" name="ubah_pass"><i class="fas fa-key"></i>
                        Ganti Password</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<!--**********************************
        Main wrapper end
    ***********************************-->

<!-- Bootstrap core JavaScript-->
<!-- <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script> -->
<!-- <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

<!-- Core plugin JavaScript-->
<!-- <script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script> -->

<!-- Custom scripts for all pages-->
<!-- <script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script> -->

<!-- Page level plugins -->
<!-- <script src="<?= base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script> -->
<!-- <script src="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script> -->
<!-- <script src="<?= base_url(); ?>assets/vendor/jquery-mask/jquery-mask.min.js"></script> -->
<!-- <script src="<?= base_url(); ?>assets/vendor/sweet-alert/sweetalert2.all.min.js"></script> -->
<!-- <script src="<?= base_url(); ?>assets/vendor/select2/js/select2.min.js"></script> -->

<!-- Page level custom scripts -->
<!-- <script src="<?= base_url(); ?>assets/js/demo/datatables-demo.js"></script> -->
<!-- <script src="<?= base_url(); ?>assets/js/demo/sweet-alert.js"></script> -->

<!-- <script>
    $(".select2").select2({
        //here my options
    }).on("select2:opening",
        function() {
            // $(".modal").removeAttr("tabindex", "-1");
            console.log($('#id_sekolah').val());
            console.log('opening');
        }).on("select2:close",
        function() {
            // $(".modal").attr("tabindex", "-1");
            console.log($('#id_sekolah').val());
            console.log('close');
        }
    );
</script> -->
<!-- <script>
    // $('.select2').select2({
    //   placeholder: 'Select an option'
    //   });
    // if ($('.select2').length > 0) {
    //     $('.select2').select2({
    //         placeholder: 'Select an option'
    //     });
    // }
    $(".modal").on("show.bs.modal", function() {
        console.log("muncul");
        var $option = $('<option value="" selected>-- Pilih Status --</option> <option value="Negeri">Negeri</option> <option value="Swasta">Swasta</option>');
        $('#status').append($option).trigger("change");
    });

    $(".modal").on("hidden.bs.modal", function() {
        console.log("test sembunyi");
        $('#status').empty();
        // $('#status').remove().append("Swasta").trigger("change");
        // $('.select2').select2();
    });
</script> -->

<!-- <script src="<?= base_url(); ?>assets/js/global/global.min.js"></script> -->
<!-- <script src="<?= base_url(); ?>assets/js/bootstrap-select/dist/js/bootstrap-select.min.js"></script> -->
<!-- <script src="<?= base_url(); ?>assets/js/custom.min.js"></script> -->
<!-- <script src="<?= base_url(); ?>assets/js/deznav-init.js"></script> -->
<!-- <script src="<?= base_url(); ?>assets/js/bootstrap-datetimepicker/js/moment.js"></script> -->
<!-- <script src="<?= base_url(); ?>assets/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script> -->
<!-- Required vendors -->
<!-- Chart piety plugin files -->
<!-- <script src="<?= base_url(); ?>assets/vendor/peity/jquery.peity.min.js"></script> -->

<!-- Dashboard 1 -->
<!-- <script src="<?= base_url(); ?>assets/js/dashboard/dashboard-1.js"></script> -->
<!-- Datatable -->
<!-- <script src="<?= base_url(); ?>assets/js/datatables/js/jquery.dataTables.min.js"></script> -->
<!-- <script src="<?= base_url(); ?>assets/js/plugins-init/datatables.init.js"></script> -->
<!-- <script>
    $(function() {
        $('#datetimepicker1').datetimepicker({
            inline: true,
        });
    });
</script> -->
<script>
    function selectedSubjectName() {
        var subjectIdNode = document.getElementById('id_sekolah');
        var value =
            subjectIdNode.options[subjectIdNode.selectedIndex].text;
        console.log("The selected value=" + value);
        //   console.log($('#id_sekolah').val());
    }
</script>
<script>
    var flashError = $('#flash-error').data('flash');
    var flashSuccess = $('#flash-success').data('flash');
    if (flashError) {
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: flashError,
            type: 'danger',
            confirmButtonText: 'Ok'
        });
    }
    if (flashSuccess) {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: flashSuccess,
            type: 'success',
            confirmButtonText: 'Ok'
        });
    }
</script>
<!-- Required vendors -->
<script src="./bin/vendor/global/global.min.js"></script>
<script src="./bin/js/custom.min.js"></script>
<script src="./bin/js/deznav-init.js"></script>
<script src="./bin/vendor/select2/js/select2.full.min.js"></script>
<script src="./bin/js/plugins-init/select2-init.js"></script>
<!-- <script src="./vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script> -->
<script src="<?= base_url(); ?>assets/vendor/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url(); ?>assets/vendor/sweet-alert/sweetalert2.all.min.js"></script>
<script src="<?= base_url(); ?>assets/js/demo/sweet-alert.js"></script>
<script src="<?= base_url(); ?>assets/js/sweetalert2.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>