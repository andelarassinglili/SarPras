<?php

    // melakukan koneksi 
    $connect = mysqli_connect('localhost', 'root', '', 'latihan');
    
    //menghitung jumlah pesan dari tabel pesan
    $query= mysqli_query($connect, "Select Count(idpesan) as jumlah From pesan");
    
    //menampilkan data
    $hasil = mysqli_fetch_array($query);
    
    //membuat data json
    echo json_encode(array('jumlah' => $hasil['jumlah']));
?>