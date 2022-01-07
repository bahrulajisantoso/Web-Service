<?php

include 'koneksi.php';
$id_wisata = $_POST['id_wisata'];
$jumlah_tiket  = $_POST['jumlah_tiket'];

$sql = "UPDATE wisata SET jumlah_kuota = jumlah_kuota - $jumlah_tiket where id_wisata = $id_wisata";

mysqli_query($koneksi, $sql);