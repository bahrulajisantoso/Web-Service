<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once "koneksi.php";

    // $id_user = $_POST["id_user"];
    // $nik = $_POST["nik"];
    $nama_user = $_POST["nama_user"];
    $email = $_POST["email"];
    $no_hp = $_POST["no_hp"];
    $password = $_POST["password"];
    $konfirm_password = $_POST["konfirm_password"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $tgl_lahir = $_POST["tgl_lahir"];
    $alamat = $_POST["alamat"];
    // $gambar = $_POST["gambar"];

    $response = array();

    // cek email
    $query_email = "SELECT email FROM data_user WHERE email = '$email'";
    $result_email = mysqli_query($koneksi, $query_email);
    $cek_email = mysqli_num_rows($result_email);

    // cek no hp
    $query_no_hp = "SELECT no_hp FROM data_user WHERE no_hp = '$no_hp'";
    $result_no_hp = mysqli_query($koneksi, $query_no_hp);
    $cek_no_hp = mysqli_num_rows($result_no_hp);

    if ($cek_email > 0) {

        $response["kode"] = 0;
        $response["pesan"] = "Email sudah digunakan";
    } else if ($cek_no_hp > 0) {

        $response["kode"] = 0;
        $response["pesan"] = "Nomor handphone sudah digunakan";
    } else {

        // enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

        $query_tambah_user = "INSERT INTO data_user VALUES
        ('', '$nama_user', '$email', '$no_hp', '$password', '$jenis_kelamin', '$tgl_lahir', '$alamat', '')";

        $result = mysqli_query($koneksi, $query_tambah_user);
        $cek = mysqli_affected_rows($koneksi);

        if ($cek > 0) {
            $response["kode"] = 1;
            $response["pesan"] = "Registrasi Berhasil";
        } else {
            $response["kode"] = 0;
            $response["pesan"] = "Registrasi Gagal";
        }
    }
    echo json_encode($response);
    mysqli_close($koneksi);
}
