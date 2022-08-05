 <!--**********************************
                Sidebar start
        ***********************************-->
 <div class="deznav">
     <div class="deznav-scroll">
         <ul class="metismenu" id="menu">
             <?php if ($_SESSION['level'] == 'admin') : ?>
                 <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                         <i class="flaticon-381-networking"></i>
                         <span class="nav-text">Master</span>
                     </a>
                     <ul aria-expanded="false">
                         <li><a href="./">Dashboard</a></li>
                         <li><a href="?kategori_sarana">Kategori Sarana</a></li>
                         <li><a href="?kategori_prasarana">Kategori Prasarana</a></li>
                         <li><a href="?sekolah">Sekolah</a></li>
                         <li><a href="?pengguna">User SarPras</a></li>
                         <li><a href="?admin">Admin SarPras</a></li>
                     </ul>
                 </li>
                 <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                         <i class="flaticon-381-layer-1"></i>
                         <span class="nav-text">Laporan</span>
                     </a>
                     <ul aria-expanded="false">
                         <li><a href="?lap_barang_masuk">Laporan Masuk</a></li>
                         <!-- <li><a href="?lap_barang_keluar">Laporan Keluar</a></li> -->
                         <!-- <li><a href="<?= base_url(); ?>process/lap_stok_barang.php">Laporan Stok</a></li> -->
                     </ul>
                 </li>
             <?php endif; ?>
             <?php if ($_SESSION['level'] == 'user') : ?>
                 <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                         <i class="flaticon-381-notepad"></i>
                         <span class="nav-text">Data Sekolah</span>
                     </a>
                     <ul aria-expanded="false">
                         <li><a href="?sarana">Sarana</a></li>
                         <li><a href="?prasarana">Prasarana</a></li>
                         <li><a href="?sekolah_user">Data SarPras</a></li>
                     </ul>
                 </li>
             <?php endif; ?>
             <li><a href="widget-basic.html" class="has-arrow ai-icon" aria-expanded="false">
                     <i class="flaticon-381-settings-2"></i>
                     <span class="nav-text">Akun</span>
                 </a>
                 <ul aria-expanded="false">
                     <li>
                         <a href="#" data-toggle="modal" data-target="#gantiPasswordModal">
                             <i class="fas fa-cogs"></i>
                             Ganti Password
                         </a>
                     </li>
                     <li>
                         <a href="#" data-toggle="modal" data-target="#logoutModal">
                             <i class="fas fa-sign-out-alt"></i>
                             Keluar
                         </a>
                     </li>
                 </ul>
             </li>
         </ul>

         <div class="copyright d-flex justify-content-center">
             <p><strong>SarPras</strong> © 2022</p>
         </div>
     </div>
 </div>
 <!--**********************************
                Sidebar end
    ***********************************-->