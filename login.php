<?php

require_once "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $query_email = "SELECT * FROM data_user WHERE email = '$email'";
    $result_email = mysqli_query($koneksi, $query_email);

    $cek_email = mysqli_num_rows($result_email);

    if ($cek_email === 1) {

        $baris = mysqli_fetch_assoc($result_email);

        if (password_verify($password, $baris["password"])) {

            $response["kode"] = 1;
            $response["pesan"] = "Login berhasil";
            $response["data"] = array(
                "id_user" => $baris["id_user"],
                "nama_user" => $baris["nama_user"],
                "email" => $baris["email"],
                "no_hp" => $baris["no_hp"],
                "jenis_kelamin" => $baris["jenis_kelamin"],
                "tgl_lahir" => $baris["tgl_lahir"],
                "alamat" => $baris["alamat"],
                // "gambar" => $baris["id_user"]
            );
        } else {

            $response["kode"] = 0;
            $response["pesan"] = "Password anda salah";
        }
    } else {

        $response["kode"] = 0;
        $response["pesan"] = "User tidak ditemukan";
    }
    echo json_encode($response);
    mysqli_close($koneksi);
}
