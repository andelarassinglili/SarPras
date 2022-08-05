<?php hakAkses(['user', 'admin']); ?>
<script>
    function submit(x) {
        if (x == 'add') {
            $('[name="nama_prasarana"]').val("");
            $('[name="jenis_prasarana"]').val("").trigger('change');
            $('[name="no_regis"]').val("");
            $('[name="luas"]').val("");
            $('[name="kapasitas"]').val("");
            $('[name="kondisi_prasarana"]').val("").trigger('change');
            $('#prasaranaModal .modal-title').html('Tambah prasarana');
            $('[name="ubah"]').hide();
            $('[name="tambah"]').show();
        } else {
            $('#prasaranaModal .modal-title').html('Edit prasarana');
            $('[name="id"]').prop('required', false);
            $('[name="nama_prasarana"]').prop('required', false);
            $('[name="jenis_prasarana"]').prop('required', false);
            $('[name="no_regis"]').prop('required', false);
            $('[name="luas"]').prop('required', false);
            $('[name="kapasitas"]').prop('required', false);
            $('[name="kondisi_prasarana"]').prop('required', false);
            $('[name="tambah"]').hide();
            $('[name="ubah"]').show();
            // console.log(x)

            $.ajax({
                type: "POST",
                data: {
                    id: x
                },
                url: '<?= base_url(); ?>process/view_prasarana.php',
                dataType: 'json',
                success: function(data) {
                    $('[name="id"]').val(data.id_prasarana);
                    console.log(data.id_prasarana);
                    $('[name="nama_prasarana"]').val(data.nama_prasarana);
                    $('[name="jenis_prasarana"]').val(data.jenis_prasarana).trigger('change');
                    $('[name="no_regis"]').val(data.no_regis);
                    $('[name="luas"]').val(data.luas);
                    $('[name="kapasitas"]').val(data.kapasitas);
                    $('[name=kondisi_prasarana]').val(data.kondisi_prasarana).trigger('change');
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
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Prasarana</h1>
            </div>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#prasaranaModal" onclick="submit('add')">
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
                                    <th>NAMA PRASARANA</th>
                                    <th>JENIS PRASARANA</th>
                                    <th>NO REGIS</th>
                                    <th>LUAS</th>
                                    <th>KAPASITAS</th>
                                    <th>KONDISI</th>
                                    <th width="50">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // $pengguna = $_SESSION['id_sekolah'];
                                $n = 1;
                                // $query = mysqli_query($con,"SELECT x.*,x1.nama_merek,x2.nama_kategori FROM barang x JOIN merek x1 ON x1.idmerek=x.merek_id JOIN kategori x2 ON x2.idkategori=x.kategori_id ORDER BY x.idbarang DESC")or die(mysqli_error($con));
                                // $query = mysqli_query($con,"SELECT * FROM prasarana ORDER BY id_prasarana DESC")or die(mysqli_error($con));
                                $query = mysqli_query($con, "SELECT x.*,x1.nama,x2.nama_sekolah FROM prasarana x JOIN kategori_prasarana x1 ON x1.idkat_prasarana=x.jenis_prasarana JOIN sekolah x2 ON x2.id_sekolah=x.id_sekolah WHERE x.id_sekolah=$pengguna ORDER BY x.id_prasarana DESC") or die(mysqli_error($con));
                                while ($row = mysqli_fetch_array($query)) :
                                ?>
                                    <tr>
                                        <td><?= $n++; ?></td>
                                        <td><?= $row['nama_sekolah']; ?></td>
                                        <td><?= $row['nama_prasarana']; ?></td>
                                        <td><?= $row['nama']; ?></td>
                                        <td><?= $row['no_regis']; ?></td>
                                        <td><?= $row['luas']; ?></td>
                                        <td><?= $row['kapasitas']; ?></td>
                                        <td><?= $row['kondisi_prasarana']; ?></td>
                                        <td>
                                            <div class="btn-group mr-2 mb-2">
                                                <a href="#prasaranaModal" data-toggle="modal" onclick="submit(<?= $row['id_prasarana']; ?>)" class="btn btn-primary shadow sharp mr-1"><i class="fas fa-edit"></i></a>
                                                <a href="<?= base_url(); ?>/process/prasarana.php?act=<?= encrypt('delete'); ?>&id=<?= encrypt($row['id_prasarana']); ?>" class="btn btn-danger shadow sharp mr-1"><i class="fas fa-trash"></i></a>
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
        <div class="modal fade" id="prasaranaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form action="<?= base_url(); ?>process/prasarana.php" method="post">
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
                                        <label for="nama_prasarana">Nama Prasarana <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="nama_prasarana" name="nama_prasarana" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="jenis_prasarana">Jenis Prasarana<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="jenis_prasarana" name="jenis_prasarana" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jenis_prasarana">Jenis Sarana <span class="text-danger">*</span></label>
                                        <select name="jenis_prasarana" id="jenis_prasarana" class="form-control select2" style="width:100%;" required>
                                            <option value="">-- Pilih Kategori --</option>
                                            <?= list_kategori_prasarana(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="luas">Luas (dalam meter persegi/m2)<span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="npsluasn" name="luas" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="no_regis">Nomor Registrasi<span class="text-danger">*</span></label>
                                        <input type="text" name="no_regis" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="kapasitas">Kapasitas<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="kapasitas" name="kapasitas" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="kondisi_prasarana">Kondisi <span class="text-danger">*</span></label>
                                        <select name="kondisi_prasarana" id="kondisi_prasarana" class="form-control select2" style="width:100%;" required>
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