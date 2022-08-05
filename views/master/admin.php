<?php hakAkses(['admin']) ?>
<script>
    function submit(x) {
        if (x == 'add') {
            $('[name="nama"]').val("");
            $('[name="username"]').val("");
            $('[name="no_hp"]').val("");
            $('[name="level"]').val("").trigger('change');
            $('[name="id_sekolah"]').val("").trigger('change');
            $('[name="password"]').val("").prop('required', true);
            $('#adminModal .modal-title').html('Tambah Admin');
            $('#passwordHelp').hide();
            $('[name="ubah"]').hide();
            $('[name="tambah"]').show();
        } else {
            $('#adminModal .modal-title').html('Edit Admin');
            $('[name="id_users"]').prop('required', true);
            $('[name="nama"]').prop('required', true);
            $('[name="username"]').prop('required', true);
            $('[name="password"]').prop('required', false);
            $('[name="no_hp"]').prop('required', true);
            $('[name="level"]').prop('required', true);
            $('[name="id_sekolah"]');
            $('#passwordHelp').show();
            $('[name="tambah"]').hide();
            $('[name="ubah"]').show();
            // console.log(x);

            $.ajax({
                type: "POST",
                data: {
                    id: x
                },
                url: '<?= base_url(); ?>process/view_admin.php',
                dataType: 'json',
                success: function(data) {
                    $('[name="id_users"]').val(data.id);
                    $('[name="nama"]').val(data.nama);
                    $('[name="username"]').val(data.username);
                    // $('[name="password"]').val(data.password);
                    $('[name="no_hp"]').val(data.no_hp);
                    $('[name="level"]').val(data.level).trigger('change');
                }
            });
        }
    }
</script>
<!-- Begin Page Content -->
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <!-- Page Heading -->
            <h4>Data SMP</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Admin</a></li>
            </ol>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adminModal" onclick="submit('add')">
                    Tambah
                    <span class="btn-icon-right"><i class="fa fa-plus"></i></span>
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="20">NO</th>
                                <th>NAMA LENGKAP</th>
                                <th>TELP</th>
                                <th>USERNAME</th>
                                <th>LEVEL</th>
                                <th width="50">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $n = 1;
                            // $query = mysqli_query($con, "SELECT * FROM users ORDER BY id_users DESC") or die(mysqli_error($con));
                            // while ($row = mysqli_fetch_array($query)) :
                            // $query = mysqli_query($con,"SELECT x.*,x1.nama_merek,x2.nama_kategori FROM barang x JOIN merek x1 ON x1.idmerek=x.merek_id JOIN kategori x2 ON x2.idkategori=x.kategori_id ORDER BY x.idbarang DESC")or die(mysqli_error($con));
                            $query = mysqli_query($con, "SELECT * FROM users WHERE level='admin' ") or die(mysqli_error($con));
                            while ($row = mysqli_fetch_array($query)) :
                            ?>
                                <tr>
                                    <td><?= $n++; ?></td>
                                    <td><?= $row['nama']; ?></td>
                                    <td><?= $row['no_hp']; ?></td>
                                    <td><?= $row['username']; ?></td>
                                    <td><?= $row['level']; ?></td>
                                    <td>
                                        <div class="btn-group mr-2 mb-2">
                                            <a href="#adminModal" data-toggle="modal" onclick="submit(<?= $row['id']; ?>)" class="btn btn-primary shadow sharp mr-1"><i class="fa fa-edit"></i></a>
                                            <a href="<?= base_url(); ?>/process/admin.php?act=<?= encrypt('delete'); ?>&id=<?= encrypt($row['id_users']); ?>" class="btn btn-danger shadow sharp mr-1"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- Modal Tambah admin -->
<div class="modal fade" id="adminModal" tabindex="-1" role="dialog" data-dropdown-parent="#modal_element_id">
    <div class="modal-dialog modal-lg" role="document" tabindex="-1">
        <div class="modal-content" tabindex="-1">
            <form action="<?= base_url(); ?>process/admin.php" method="post" name="form_admin">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id" class="form-control">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nomor Telepon</label>
                                <input type="text" class="form-control" name="no_hp" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" name="username" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" name="password" aria-describedby="passwordHelp">
                                <small id="passwordHelp" class="form-text" style="color:red;">Biarkan kosong
                                    jika tidak ingin merubah password</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="level">Level <span class="text-danger">*</span></label>
                                <select name="level" id="level" class="disabling-options" required>
                                    <option value="" disabled="disabled">-- Pilih Level --</option>
                                    <option value="user">Staff Sekolah</option>
                                    <option value="admin">Administrator</option>
                                </select>
                            </div>
                        </div>
                        </input>
                    </div>
                    <hr class="sidebar-divider">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Batal
                        <span class="btn-icon-right"><i class="fa fa-times"></i></span>
                    </button>
                    <button type="submit" class="btn btn-primary float-right" name="tambah">
                        Tambah
                        <span class="btn-icon-right"><i class="fa fa-save"></i></span>
                    </button>
                    <button type="submit" class="btn btn-primary float-right" name="ubah">
                        Ubah
                        <span class="btn-icon-right"><i class="fa fa-save"></i></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>