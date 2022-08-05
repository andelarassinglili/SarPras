<?php hakAkses(['user', 'admin']); ?>
<script>
    function submit(x) {
        if (x == 'add') {
            $('[name="nama_sarana"]').val("");
            $('[name="id_sekolah"]').val("");
            $('[name="jenis_sarana"]').val("").trigger('change');
            $('[name="no_regis"]').val("");
            $('[name="keperluan"]').val("");
            $('[name="kondisi_sarana"]').val("").trigger('change');
            $('#saranaModal .modal-title').html('Tambah sarana');
            $('[name="ubah"]').hide();
            $('[name="tambah"]').show();
        } else {
            $('#saranaModal .modal-title').html('Edit sarana');
            $('[name="id"]').prop('required', false);
            $('[name="nama_sarana"]').prop('required', false);
            $('[name="jenis_sarana"]').prop('required', false);
            $('[name="no_regis"]').prop('required', false);
            $('[name="keperluan"]').prop('required', false);
            $('[name="kondisi_sarana"]').prop('required', false);
            $('[name="tambah"]').hide();
            $('[name="ubah"]').show();
            // console.log(x)

            $.ajax({
                type: "POST",
                data: {
                    id: x
                },
                url: '<?= base_url(); ?>process/view_sarana.php',
                dataType: 'json',
                success: function(data) {
                    $('[name="id"]').val(data.id_sarana);
                    console.log(data.id);
                    $('[name="nama_sarana"]').val(data.nama_sarana);
                    $('[name="jenis_sarana"]').val(data.jenis_sarana).trigger('change');
                    $('[name="no_regis"]').val(data.no_regis);
                    $('[name="keperluan"]').val(data.keperluan);
                    $('[name=kondisi_sarana]').val(data.kondisi_sarana).trigger('change');
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
            <h4>Sarana Sekolah</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Sarana Sekolah</a></li>
            </ol>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#saranaModal" onclick="submit('add')">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah</span>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive table-striped">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="20">NO</th>
                                <th>NAMA SEKOLAH</th>
                                <th>NAMA SARANA</th>
                                <th>JENIS SARANA</th>
                                <th>NO REGIS</th>
                                <th>KEPERLUAN</th>
                                <th width="50">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // $pengguna = $_SESSION['id_sekolah'];
                            $n = 1;
                            // $query = mysqli_query($con,"SELECT x.*,x1.nama_merek,x2.nama_kategori FROM barang x JOIN merek x1 ON x1.idmerek=x.merek_id JOIN kategori x2 ON x2.idkategori=x.kategori_id ORDER BY x.idbarang DESC")or die(mysqli_error($con));
                            // $query = mysqli_query($con,"SELECT sarana.*,kategori_sarana.nama FROM sarana JOIN kategori_sarana ON kategori_sarana.idkat_sarana=sarana.jenis_sarana")or die(mysqli_error($con));
                            $query = mysqli_query($con, "SELECT x.*,x1.nama,x2.nama_sekolah FROM sarana x JOIN kategori_sarana x1 ON x1.idkat_sarana=x.jenis_sarana JOIN sekolah x2 ON x2.id_sekolah=x.id_sekolah WHERE x.id_sekolah=$pengguna ORDER BY X.id_sarana DESC") or die(mysqli_error($con));
                            // $query = mysqli_query($con,"SELECT * FROM sarana ORDER BY id_sarana DESC")or die(mysqli_error($con));
                            while ($row = mysqli_fetch_array($query)) :
                            ?>
                                <tr>
                                    <td><?= $n++; ?></td>
                                    <td><?= $row['nama_sekolah']; ?></td>
                                    <td><?= $row['nama_sarana']; ?></td>
                                    <td><?= $row['nama']; ?></td>
                                    <td><?= $row['no_regis']; ?></td>
                                    <td><?= $row['keperluan']; ?></td>
                                    <td>
                                        <div class="btn-group mr-2 mb-2">
                                            <a href="#saranaModal" data-toggle="modal" onclick="submit(<?= $row['id_sarana']; ?>)" class="btn btn-primary shadow sharp mr-1"><i class="fas fa-edit"></i></a>
                                            <a href="<?= base_url(); ?>/process/sarana.php?act=<?= encrypt('delete'); ?>&id=<?= encrypt($row['id_sarana']); ?>" class="btn btn-danger shadow sharp mr-1"><i class="fas fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- /.container-fluid -->

        <!-- Modal Tambah barang -->
        <div class="modal fade" id="saranaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form action="<?= base_url(); ?>process/sarana.php" method="post">
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
                                        <label for="nama_sarana">Nama sarana <span class="text-danger">*</span></label>
                                        <input type="hidden" name="nama_sarana" class="form-control">
                                        <input type="text" class="form-control" id="nama_sarana" name="nama_sarana" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jenis_sarana">Jenis Sarana <span class="text-danger">*</span></label>
                                        <select name="jenis_sarana" id="jenis_sarana" class="form-control select2" style="width:100%;" required>
                                            <option value="">-- Pilih Kategori --</option>
                                            <?= list_kategori_sarana(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="no_regis">No. Registrasi <span class="text-danger">*</span></label>
                                        <input type="hidden" name="no_regis" class="form-control">
                                        <input type="text" class="form-control" id="no_regis" name="no_regis" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="keperluan">keperluan<span class="text-danger">*</span></label>
                                        <input type="hidden" name="keperluan" class="form-control">
                                        <input type="text" class="form-control" id="npskeperluann" name="keperluan" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="kondisi_sarana">Kondisi <span class="text-danger">*</span></label>
                                        <select name="kondisi_sarana" id="kondisi_sarana" class="form-control select2" style="width:100%;" required>
                                            <option value="">-- Pilih Kondisi --</option>
                                            <option value="Baik">Baik</option>
                                            <option value="Rusak">Rusak</option>
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
                            </div>
                            <hr class="sidebar-divider">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fas fa-times"></i>
                                Batal</button>
                            <button class="btn btn-primary float-right" type="submit" name="tambah"><i class="fas fa-save"></i>
                                Tambah</button>
                            <button class="btn btn-primary float-right" type="submit" name="ubah"><i class="fas fa-save"></i>
                                Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>