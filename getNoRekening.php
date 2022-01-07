<?php

include 'koneksi.php';

$id_wisata = $_POST['id_wisata'];
$query = "SELECT no_hp FROM wisata where id_wisata = $id_wisata";
$result = mysqli_fetch_assoc(mysqli_query($koneksi, $query));

echo json_encode($result);