<?php

require_once "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $query_email = "SELECT * FROM data_user WHERE email = '$email'";
    $result_email = mysqli_query($koneksi, $query_email);

    $cek_email = mysqli_num_rows($result_email);

    $ambil = array();

    if ($cek_email > 0) {

        $query_pass = "SELECT * FROM data_user WHERE email = '$email' && password = '$password'";
        $result_pass = mysqli_query($koneksi, $query_pass);
        $cek_pass = mysqli_num_rows($result_pass);

        if ($cek_pass > 0) {

            while ($baris = mysqli_fetch_assoc($result_pass)) {
                $ambil = $baris;
            }

            $response["kode"] = 200;
            $response["pesan"] = "Login berhasil";
            $response["data"] = $ambil;
        } else {

            $response["kode"] = 401;
            $response["pesan"] = "Password anda salah";
        }
    } else {

        $response["kode"] = 404;
        $response["pesan"] = "User tidak ditemukan";
    }
    echo json_encode($response);
    mysqli_close($koneksi);
}
