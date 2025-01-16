<?php
include '../../../config/db_connection.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idPoli = $_SESSION['id_poli'];
    $idDokter = $_SESSION['id'];
    $hari = $_POST["hari"];
    $jamMulai = $_POST["jamMulai"];
    $jamSelesai = $_POST["jamSelesai"];

    $queryOverlap = "SELECT * FROM jadwal_periksa INNER JOIN dokter ON jadwal_periksa.id_dokter = dokter.id INNER JOIN poli ON dokter.id_poli = poli.id WHERE id_poli = '$idPoli' AND hari = '$hari' AND ((jam_mulai < '$jamSelesai' AND jam_selesai > '$jamMulai') OR (jam_mulai < '$jamMulai' AND jam_selesai > '$jamMulai'))";

    $querySameDay = "SELECT * FROM jadwal_periksa WHERE id_dokter = '$idDokter' AND jadwal_periksa.hari = '$hari'";

    $resultOverlap = mysqli_query($mysqli, $queryOverlap);
    $resultSameDay = mysqli_query($mysqli, $querySameDay);


    if (mysqli_num_rows($resultOverlap) > 0) {
        echo '<script>alert("Dokter lain telah mengambil jadwal ini");window.location.href="index.php";</script>';
    } elseif (mysqli_num_rows($resultSameDay) > 0) {
        echo '<script>alert("Anda sudah memiliki jadwal praktek yang sama. Silahkan pilih hari lain");window.location.href="index.php";</script>';
    } else {
        // Query untuk menambahkan data obat ke dalam tabel
        $query = "INSERT INTO jadwal_periksa (id_dokter, hari, jam_mulai, jam_selesai) VALUES ('$idDokter', '$hari', '$jamMulai', '$jamSelesai')";

        if (mysqli_query($mysqli, $query)) {
            echo '<script>';
            echo 'alert("Jadwal berhasil ditambahkan!");';
            echo 'window.location.href = "index.php";';
            echo '</script>';
            exit();
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
        }
    }
}

// Tutup koneksi
mysqli_close($mysqli);
