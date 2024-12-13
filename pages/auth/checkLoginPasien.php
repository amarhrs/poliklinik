<?php
session_start();
require '../../config/db_connection.php';

include '../../partials/script.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM pasien WHERE nama = '$username' && password = '$password'";
    $result = mysqli_query($mysqli, $query);
    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);

        $_SESSION['id'] = $data['id'];
        $_SESSION['username'] = $data['nama'];
        $_SESSION['password'] = $data['password'];
        $_SESSION['no_rm'] = $data['no_rm'];
        $_SESSION['akses'] = "pasien";


        header("location:../../pages/pasien/index.php");
    } else {
        echo '
        <script>alert("Username atau password salah");location.href="login-pasien.php";</script>';
    }
}
