<?php
include 'koneksi.php';
$email = $_POST['email'];

 $query = "SELECT * FROM data_user WHERE email = '$email'";
 $result = mysqli_query($koneksi, $query);
 $data = mysqli_fetch_assoc($result);

 $response = [];
 if(mysqli_num_rows($result) > 0) {
    $response['id_user'] = $data['id_user'];
    $response['email'] = $data['email'];
    $response['nama_user'] = $data['nama_user'];
    $response['no_hp'] = $data['no_hp'];
 }

 echo json_encode($response);