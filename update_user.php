<?php

use function PHPSTORM_META\elementType;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once "koneksi.php";

    $id_user = $_POST["id_user"];
    // $nik = $_POST["nik"];
    $nama_user = $_POST["nama_user"];
    $email = $_POST["email"];
    $no_hp = $_POST["no_hp"];
    // $password = $_POST["password"];
    // $konfirm_password = $_POST["konfirm_password"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $tgl_lahir = $_POST["tgl_lahir"];
    $alamat = $_POST["alamat"];
    // $gambar = $_POST["gambar"];

    $response = array();

    $query = "UPDATE data_user SET 
        nama_user = '$nama_user',
        email = '$email',
        no_hp = '$no_hp',
        jenis_kelamin = '$jenis_kelamin',
        tgl_lahir = '$tgl_lahir',
        alamat = '$alamat' 
            WHERE
        id_user = '$id_user'";

    $result = mysqli_query($koneksi, $query);
    $cek = mysqli_affected_rows($koneksi);

    if ($cek > 0) {

        $response["kode"] = 1;
        $response["pesan"] = "Edit data berhasil silahkan login kembali";
    } else if ($cek == 0) {

        $response["kode"] = 0;
        $response["pesan"] = "Anda tidak melakukan perubahan";
    } else {

        $response["kode"] = 0;
        $response["pesan"] = "Edit data gagal";
    }
    echo json_encode($response);
    mysqli_close($koneksi);
}
