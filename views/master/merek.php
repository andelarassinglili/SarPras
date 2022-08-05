<?php hakAkses(['admin']) ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Peta</h1>
    </div>
 
    <?php

        $conn=($GLOBALS["___mysqli_ston"] = mysqli_connect("localhost", "root", "")) or die("Tidak Terkoneksi");
        $db=mysqli_select_db($GLOBALS["___mysqli_ston"], "inventaris") or die ("Database Tidak Terdeteksi");

        $info = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM wilayah where id_wilayah='3'");
        while($row=mysqli_fetch_array($info)){
    ?>

    

    <script type="text/javascript">

    function initialize() {
    var propertiPeta = {
        center: new google.maps.LatLng(<?php echo  $row['latitude']; ?>,<?php echo  $row['longitude']; ?>),
        zoom: 14,
        mapTypeId:google.maps.MapTypeId.ROADMAP
    };

    var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
    
    // membuat Marker
    var marker=new google.maps.Marker({
        position: new google.maps.LatLng(<?php echo  $row['latitude']; ?>, <?php echo  $row['longitude']; ?>),
        map: peta
    });
    }

    </script>

    <center><h3> Titik Koordinat Lokasi: <?php echo  $row['wilayah']; ?></h3></center>

    <div id="googleMap" style="width:auto;height:500px;"></div>

<?php } ?>

</div>
<!-- /.container-fluid -->

<!-- Modal Tambah merek -->
<div class="modal fade" id="merekModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="<?=base_url();?>process/merek.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Merek</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nama_merek">Nama Merek <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nama_merek" name="nama_merek" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="keterangan">Keterangan <span class="text-danger">*</span></label>
                                <textarea name="keterangan" id cols="30" rows="5" class="form-control"
                                    required></textarea>
                            </div>
                        </div>
                    </div>
                    <hr class="sidebar-divider">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fas fa-times"></i>
                        Batal</button>
                    <button class="btn btn-primary float-right" type="submit" name="tambah"><i class="fas fa-save"></i>
                        Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>