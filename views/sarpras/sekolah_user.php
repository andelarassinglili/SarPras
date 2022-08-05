<?php hakAkses(['admin', 'user']); ?>
<script>
    function submit(x) {
        if (x == 'add') {
            $('[name="nama_sekolah"]').val("");
            $('[name="npsn"]').val("");
            $('[name="status"]').val("").trigger('change');
            $('[name="alamat"]').val("");
            $('[name="telepon"]').val("");
            $('[name="kode_pos"]').val("");
            $('[name="kelurahan"]').val("");
            $('[name="kecamatan"]').val("");
            $('#sekolah_userModal .modal-title').html('Tambah Data Sekolah');
            $('[name="ubah"]').hide();
            $('[name="tambah"]').show();
        } else {
            $('#sekolah_userModal .modal-title').html('Edit Data Sekolah');
            $('[name="id"]').prop('required', false);
            $('[name="nama_sekolah"]').prop('required', false);
            $('[name="npsn"]').prop('required', false);
            $('[name="status"]').prop('required', false);
            $('[name="alamat"]').prop('required', false);
            $('[name="telepon"]').prop('required', false);
            $('[name="kode_pos"]').prop('required', false);
            $('[name="kelurahan"]').prop('required', false);
            $('[name="kecamatan"]').prop('required', false);
            $('[name="tambah"]').hide();
            $('[name="ubah"]').show();
            // console.log(x)

            $.ajax({
                type: "POST",
                data: {
                    id: x
                },
                url: '<?= base_url(); ?>process/view_sekolah_user.php',
                dataType: 'json',
                success: function(data) {
                    $('[name="id"]').val(data.id_sekolah);
                    console.log(data.id);
                    $('[name="nama_sekolah"]').val(data.nama_sekolah);
                    $('[name="npsn"]').val(data.npsn);
                    $('[name="status"]').val(data.status).trigger('change');
                    $('[name="alamat"]').val(data.alamat);
                    $('[name="telepon"]').val(data.telepon);
                    $('[name="kode_pos"]').val(data.kode_pos).trigger('change');
                    $('[name="kelurahan"]').val(data.kelurahan).trigger('change');
                    $('[name="kecamatan"]').val(data.kecamatan).trigger('change');
                    // console.log(data);
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
            <h4>SarPras Sekolah</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Data Sekolah</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">SarPras Sekolah</a></li>
            </ol>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="" width="100%">
                        <thead>
                            <tr>
                                <th>NAMA SEKOLAH</th>
                                <th>NPSN</th>
                                <th>STATUS</th>
                                <th>ALAMAT</th>
                                <th>TELEPON</th>
                                <th>KODE POS</th>
                                <th>KELURAHAN</th>
                                <th>KECAMATAN</th>
                                <th width="50">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // $pengguna = $_SESSION['id_sekolah'];
                            // $query = mysqli_query($con,"SELECT x.*,x1.nama_merek,x2.nama_kategori FROM barang x JOIN merek x1 ON x1.idmerek=x.merek_id JOIN kategori x2 ON x2.idkategori=x.kategori_id ORDER BY x.idbarang DESC")or die(mysqli_error($con));
                            $query = mysqli_query($con, "SELECT * FROM sekolah WHERE id_sekolah=$pengguna ORDER BY id_sekolah DESC") or die(mysqli_error($con));
                            while ($row = mysqli_fetch_array($query)) :
                                // $query = mysqli_query($con, "SELECT users.*,sekolah_user.nama_sekolah FROM sekolah_user INNER JOIN users ON sekolah_user.id_sekolah_user=users.id_sekolah_user WHERE users.id_sekolah_user='2'") or die(mysqli_error($con));
                                // while ($row = mysqli_fetch_array($query)) :
                            ?>
                                <tr>
                                    <td><?= $row['nama_sekolah']; ?></td>
                                    <td><?= $row['npsn']; ?></td>
                                    <td><?= $row['status']; ?></td>
                                    <td><?= $row['alamat']; ?></td>
                                    <td><?= $row['telepon']; ?></td>
                                    <td><?= $row['kode_pos']; ?></td>
                                    <td><?= $row['kelurahan']; ?></td>
                                    <td><?= $row['kecamatan']; ?></td>
                                    <td>
                                        <div class="btn-group mr-2 mb-2">
                                            <button type="button" class="btn btn-primary shadow sharp mr-1" data-toggle="modal" data-target="#sekolah_userModal" onclick="submit(<?= $row['id_sekolah']; ?>)">
                                                <i class="fa fa-edit"></i>
                                            </button>
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
    <!-- /.container-fluid -->

    <!-- Modal Tambah barang -->
    <div class="modal fade" id="sekolah_userModal" tabindex="-1" role="dialog" data-dropdown-parent="#modal_element_id">
        <div class="modal-dialog modal-lg" role="document" tabindex="-1">
            <div class="modal-content" tabindex="-1">
                <form action="<?= base_url(); ?>process/sekolah_user.php" method="post" id="form_sekolah">
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
                                    <label for="nama_sekolah">Nama Sekolah <span class="text-danger">*</span></label>
                                    <input type="hidden" name="nama_sekolah" class="form-control">
                                    <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="npsn">NPSN<span class="text-danger">*</span></label>
                                    <input type="hidden" name="npsn" class="form-control">
                                    <input type="text" class="form-control" id="npsn" name="npsn" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status <span class="text-danger">*</span></label>
                                    <select name="status" class="disabling-options" id="status" required>
                                        <option value="" disabled="disabled">-- Pilih Status --</option>
                                        <option value="Negeri">Negeri</option>
                                        <option value="Swasta">Swasta</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="alamat">Alamat<span class="text-danger">*</span></label>
                                    <input type="hidden" name="alamat" class="form-control">
                                    <input type="text" class="form-control" id="npsalamatn" name="alamat" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="telepon">Telepon<span class="text-danger">*</span></label>
                                    <input type="hidden" name="telepon" class="form-control">
                                    <input type="text" class="form-control" id="telepon" name="telepon" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kode_pos">Kode Pos <span class="text-danger">*</span></label>
                                    <select name="kode_pos" class="disabling-options" id="kode_pos" required>
                                        <option value="" disabled="disabled">-- Pilih Kode Pos --</option>
                                        <option value="91831">91831</option>
                                        <option value="91832">91832</option>
                                        <option value="91833">91833</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kelurahan">Kelurahan <span class="text-danger">*</span></label>
                                    <select name="kelurahan" class="disabling-options" id="single-select" required>
                                        <option value="" disabled="disabled">-- Pilih Kelurahan --</option>
                                        <option value="Tampo">Tampo</option>
                                        <option value="Penanian">Penanian</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kecamatan">Kecamatan <span class="text-danger">*</span></label>
                                    <select name="kecamatan" class="disabling-options" id="kecamatan" required>
                                        <option value="" disabled="disabled">-- Pilih Kecamatan --</option>
                                        <option value="Rantepao">Rantepao</option>
                                        <option value="Tallunglipu">Tallunglipu</option>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                            <div class="form-group">
                                <label for="kategori_id">Kategori Barang <span class="text-danger">*</span></label>
                                <select name="kategori_id" id="kategori_id" class="form-control select2"
                                    style="width:100%;" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    <?= list_kategori(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="stok">Stok <span class="text-danger">*</span></label>
                                <input type="hidden" name="stok" class="form-control">
                                <input type="text" class="form-control" id="stok" name="stok" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="keterangan">Keterangan <span class="text-danger">*</span></label>
                                <textarea name="keterangan" id="keterangan" cols="30" rows="5" class="form-control"
                                    required></textarea>
                            </div>
                        </div> -->
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
            </div>
            </form>
        </div>
    </div>
</div>