<?php hakAkses(['admin']); ?>
<script>
    function submit(x) {
        if (x == 'add') {
            $('[name="nama"]').val("");
            $('[name="keterangan"]').val("");
            $('#kategori_prasaranaModal .modal-title').html('Tambah Kategori Prasarana');
            $('[name="ubah"]').hide();
            $('[name="tambah"]').show();
        } else {
            $('#kategori_prasaranaModal .modal-title').html('Edit Kategori Prasarana');
            $('[name="id"]').prop('required', false);
            $('[name="nama"]').prop('required', false);
            $('[name="keterangan"]').prop('required', false);
            $('[name="tambah"]').hide();
            $('[name="ubah"]').show();
            // console.log(x)

            $.ajax({
                type: "POST",
                data: {
                    id: x
                },
                url: '<?= base_url(); ?>process/view_kategori_prasarana.php',
                dataType: 'json',
                success: function(data) {
                    $('[name="id"]').val(data.idkat_prasarana);
                    console.log(data.idkat_prasarana);
                    $('[name="nama"]').val(data.nama);
                    $('[name="keterangan"]').val(data.keterangan);
                    // console.log(data);
                }
            });
        }
    }
</script>
<!-- Begin Page Content -->
<!-- Begin Page Content -->
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <!-- Page Heading -->
            <h4>Kategori Prasarana</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Kategori Prasarana</a></li>
            </ol>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#kategori_prasaranaModal" onclick="submit('add')">
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
                                <th>NAMA KATEGORI PRASARANA</th>
                                <th>KETERANGAN</th>
                                <th width="50">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $n = 1;
                            // $query = mysqli_query($con,"SELECT x.*,x1.nama_merek,x2.nama_kategori FROM barang x JOIN merek x1 ON x1.idmerek=x.merek_id JOIN kategori x2 ON x2.idkategori=x.kategori_id ORDER BY x.idbarang DESC")or die(mysqli_error($con));
                            $query = mysqli_query($con, "SELECT * FROM kategori_prasarana ORDER BY idkat_prasarana DESC") or die(mysqli_error($con));
                            while ($row = mysqli_fetch_array($query)) :
                            ?>
                                <tr>
                                    <td><?= $n++; ?></td>
                                    <td><?= $row['nama']; ?></td>
                                    <td><?= $row['keterangan']; ?></td>
                                    <td>
                                        <div class="btn-group mr-2 mb-2">
                                            <button type="button" class="btn btn-primary shadow sharp mr-1" data-toggle="modal" data-target="#kategori_prasaranaModal" onclick="submit(<?= $row['idkat_prasarana']; ?>)">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <a href="<?= base_url(); ?>/process/kategori_prasarana.php?act=<?= encrypt('delete'); ?>&id=<?= encrypt($row['idkat_prasarana']); ?>" class="btn btn-danger shadow sharp mr-1"><i class="fa fa-trash"></i></a>
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
    <div class="modal fade" id="kategori_prasaranaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="<?= base_url(); ?>process/kategori_prasarana.php" method="post">
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
                                    <label for="nama">Nama Kategori Prasarana <span class="text-danger">*</span></label>
                                    <input type="hidden" name="nama" class="form-control">
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="keterangan">Keterangan<span class="text-danger">*</span></label>
                                    <input type="hidden" name="keterangan" class="form-control">
                                    <input type="text" class="form-control" id="keterangan" name="keterangan" required>
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