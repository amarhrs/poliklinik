<?php
session_start();
$username = $_SESSION['username'];
$idPasien = $_SESSION['id'];

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
    <?php include '../../../partials/header.php' ?>
    <?php include '../../../partials/sidebar.php' ?>
    <?php include 'riwayat.php' ?>
    <?php include '../../../partials/footer.php' ?>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <?php include '../../../partials/script.php' ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#poli').on('change', function() {
                var poliId = $(this).val();

                // Mengambil data jadwal berdasarkan poli yang dipilih
                $.ajax({
                    type: 'POST',
                    url: 'getJadwal.php',
                    data: {
                        poliId: poliId
                    },
                    success: function(data) {
                        $('#jadwal').html(data);
                    }
                });
            });
        });
    </script>
</body>

</html>