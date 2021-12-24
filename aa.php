<?php

require_once "koneksi.php";

$email = "aji@gmail.com";
$pass = "123";

$query = "delete from wisata where id_wisata = 57";

$result = mysqli_query($koneksi, $query);

$cek = mysqli_affected_rows($koneksi);
// $cek2 = mysqli_num_rows($result);
var_dump($cek);
echo "<br>";
echo "<br>";

$email = "aji@gmail.com";
$query_email = "select email from data_user where email = '$email'";
$result_email = mysqli_query($koneksi, $query_email);



$fetch = mysqli_fetch_assoc($result_email);

if ($fetch) {
    var_dump($fetch);
}
