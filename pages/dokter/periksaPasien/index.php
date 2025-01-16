<?php
session_start();
$id_dokter = $_SESSION['id'];
$username = $_SESSION['username'];
$id_poli = $_SESSION['id_poli'];

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

    <!-- Styles -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" /> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" /> -->
    <!-- Or for RTL support -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />
    <style>
        .select2-container .select2-selection__choice {
            padding-right: 1.5rem;
        }

        .select2-container .select2-selection__choice__remove {
            margin-right: 0.5rem;
        }
    </style>
</head>

<body>
    <?php include '../../../partials/header.php' ?>
    <?php include '../../../partials/sidebar.php' ?>
    <?php include 'periksaPasien.php' ?>
    <?php include '../../../partials/footer.php' ?>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <?php include '../../../partials/script.php' ?>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('#multiple-select-field').select2({
                theme: "bootstrap-5",
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                placeholder: $(this).data('placeholder'),
                closeOnSelect: false,
            })
        })
    </script>

</body>

</html>