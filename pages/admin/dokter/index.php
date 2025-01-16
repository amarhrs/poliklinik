<?php
session_start();
$username = $_SESSION['username'];

if ($username == "") {
    header("location:../../pages/auth/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Poliklinik | Dashboard</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <?php include '../../../partials/style.php' ?>
</head>

<body>
    <?php
    if (isset($_GET['success'])) {
    ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: "success",
                title: "Data Dokter Berhasil Ditambahkan",
                confirmButtonText: "OK"
            });
        </script>
    <?php
    } elseif (isset($_GET['error'])) {
    ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: "error",
                title: "Gagal Menambahkan Dokter",
                confirmButtonText: "Coba Lagi"
            });
        </script>
    <?php
    } elseif (isset($_GET['delete']) && $_GET['delete'] == 'true') {
    ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: "success",
                title: "Data Dokter Berhasil Dihapus",
                confirmButtonText: "OK"
            });
        </script>
    <?php
    } elseif (isset($_GET['delete']) && $_GET['delete'] == 'false') {
    ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: "error",
                title: "Gagal Menghapus Dokter",
                confirmButtonText: "Coba Lagi"
            });
        </script>
    <?php
    } elseif (isset($_GET['update']) && $_GET['update'] == 'true') {
    ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: "success",
                title: "Data Dokter Berhasil Diupdate",
                confirmButtonText: "OK"
            });
        </script>
    <?php
    } elseif (isset($_GET['update']) && $_GET['update'] == 'false') {
    ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: "error",
                title: "Gagal Mengupdate Dokter",
                confirmButtonText: "Coba Lagi"
            });
        </script>
    <?php
    }
    ?>

    <?php include '../../../partials/header.php' ?>
    <?php include '../../../partials/sidebar.php' ?>
    <?php include 'dokter.php' ?>
    <?php include '../../../partials/footer.php' ?>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <?php include '../../../partials/script.php' ?>

</body>

</html>