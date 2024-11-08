<?php
    //Awal Koneksi Database
    $server = "localhost";
    $user = "root";
    $password = ""; 
    $database = "uts_muhammadalfachrozi_sireg4a";

    //Buat Koneksi
    $koneksi = mysqli_connect($server, $user, $password, $database) or die(mysqli_error($koneksi));
?>