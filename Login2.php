<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    include 'koneksi.php';

    $email = $_GET['email'];
    $password = $_GET['password'];

    $query_check = "select * from data_user where email = '$email'";
    $check = mysqli_fetch_array(mysqli_query($koneksi, $query_check));
    $json_array = array();
    $response = "";

    if (isset($check)) {
        $query_check_pass = "select * from data_user where email = '$email' and password = '$password'";
        $query_pass_result = mysqli_query($koneksi, $query_check_pass);
        $check_password = mysqli_fetch_array($query_pass_result);
        if (isset($check_password)) {
            $query_pass_result = mysqli_query($koneksi, $query_check_pass);
            while ($row = mysqli_fetch_assoc($query_pass_result)) {
                $json_array[] = $row;
            }
            $response = array(
                'code' => 200,
                'status' => 'Sukses',
                'user_list' => $json_array
            );
        } else {
            $response = array(
                'code' => 401,
                'status' => 'Password salah, periksa kembali!',
                'user_list' => $json_array
            );
        }
    } else {
        $response = array(
            'code' => 404,
            'status' => 'Data tidak ditemukan, lanjutkan registrasi?',
            'user_list' => $json_array
        );
    }
    print(json_encode($response));
    mysqli_close($koneksi);
}
