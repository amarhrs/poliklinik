<?php
// Definisikan base URL
$base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/poliklinik/';
?>
<!-- Favicons -->
<link href="<?= $base_url; ?>assets/niceadmin/img/logo.png" rel="icon">
<link href="<?= $base_url; ?>assets/niceadmin/img/apple-touch-icon.png" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="<?= $base_url; ?>assets/niceadmin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?= $base_url; ?>assets/niceadmin/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="<?= $base_url; ?>assets/niceadmin/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="<?= $base_url; ?>assets/niceadmin/vendor/quill/quill.snow.css" rel="stylesheet">
<link href="<?= $base_url; ?>assets/niceadmin/vendor/quill/quill.bubble.css" rel="stylesheet">
<link href="<?= $base_url; ?>assets/niceadmin/vendor/remixicon/remixicon.css" rel="stylesheet">
<link href="<?= $base_url; ?>assets/niceadmin/vendor/simple-datatables/style.css" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="<?= $base_url; ?>assets/niceadmin/css/style.css" rel="stylesheet">

<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>