<?php
include 'koneksi.php';
$result = mysqli_query($koneksi, "SELECT COUNT(*) as 'jumlah_wisata' FROM wisata");
$data = mysqli_fetch_assoc($result);
echo json_encode($data['jumlah_wisata']);
