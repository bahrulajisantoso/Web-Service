<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require "koneksi.php";

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query_cek_email = "SELECT * FROM data_user WHERE email = '$email'";
    $query_email_result = mysqli_query($koneksi, $query_cek_email);
    $cek_email = mysqli_fetch_assoc($query_email_result);

    $ambil = array();

    if (isset($cek_email)) {

        $query_cek_pass = "SELECT * FROM data_user WHERE email = '$email' && password = '$password'";
        $query_pass_result = mysqli_query($koneksi, $query_cek_pass);
        $cek_password = mysqli_fetch_assoc($query_pass_result);

        if (isset($query_cek_pass)) {

            $query_pass_result = mysqli_query($koneksi, $query_cek_pass);
            while ($baris = mysqli_fetch_assoc($query_pass_result)) {
                $ambil = $baris;
            }
            $response["kode"] = 200;
            $response["pesan"] = "Login Sukses";
            $response["data"] = $ambil;
        } else {
            $response["kode"] = 401;
            $response["pesan"] = "Password anda salah silahkan periksa kembali";
            $response["data"] = $ambil;
        }
    } else {
        $response["kode"] = 404;
        $response["pesan"] = "Data tidak ditemukan silahkan registrasi";
        $response["data"] = $ambil;
    }

    echo json_encode($response);
    mysqli_close($koneksi);
}
