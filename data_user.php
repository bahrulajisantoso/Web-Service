<?php

require_once "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_user = $_POST["id_user"];

    $query = "SELECT * FROM data_user where id_user = $id_user";
    $result = mysqli_query($koneksi, $query);

    $cek = mysqli_num_rows($result);

    $ambil = array();

    if ($cek > 0) {
        while ($baris = mysqli_fetch_assoc($result)) {
            $ambil[] = $baris;
        }
        $response["kode"]   = 1;
        $response["pesan"]  = "User ditemukan";
        $response["data"] = $ambil;
    } else {

        $response["kode"] = 0;
        $response["pesan"] = "User tidak ditemukan";
    }
    echo json_encode($response);
    mysqli_close($koneksi);
}
