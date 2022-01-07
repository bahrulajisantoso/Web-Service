<?php

include 'koneksi.php';

$email = $_POST['email'];
$query = "SELECT `id_transaksi`,wisata.no_hp, wisata.no_rekening, transaksi.`id_wisata`, transaksi.`id_user`, transaksi.`tgl_transaksi`,transaksi.`jumlah_tiket`, `total_harga`, `status`, wisata.nama_wisata FROM transaksi, wisata, data_user WHERE transaksi.id_wisata = wisata.id_wisata AND transaksi.id_user = data_user.id_user AND data_user.email = '$email'";
$result = mysqli_query($koneksi, $query);
$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}

echo json_encode($rows);