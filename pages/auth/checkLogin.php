<?php
session_start();
require '../../config/db_connection.php';


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    if ($username == "admin" && $password == md5("admin")) {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['akses'] = "admin";

        header("location:../../pages/admin/index.php");
    } else {
        $query = "SELECT * FROM dokter WHERE nama = '$username' && password = '$password'";
        $result = mysqli_query($mysqli, $query);
        if (mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result);

            $_SESSION['id'] = $data['id'];
            $_SESSION['username'] = $data['nama'];
            $_SESSION['password'] = $data['password'];
            $_SESSION['id_poli'] = $data['id_poli'];
            $_SESSION['akses'] = "dokter";

            header("location:../../pages/dokter/index.php");
        } else {
            echo '<script>alert("Username atau password salah");location.href="login.php";</script>';
        }
    }
}
