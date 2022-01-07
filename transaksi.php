<?php

include 'koneksi.php';

$id_wisata = $_POST['id_wisata'];
$id_user = $_POST['id_user'];
$tgl_transaksi = $_POST['tgl_transaksi'];
$jumlah_tiket = $_POST['jumlah_tiket'];
$total_harga = $_POST['total_harga'];
$status = $_POST['status'];

$query = "INSERT INTO `transaksi`(`id_transaksi`, `id_wisata`, `id_user`, `tgl_transaksi`, `jumlah_tiket`, `total_harga`, `status`) VALUES ('','$id_wisata','$id_user','$tgl_transaksi','$jumlah_tiket','$total_harga','$status')";

mysqli_query($koneksi, $query);