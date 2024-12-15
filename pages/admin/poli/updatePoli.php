<?php
include '../../../config/db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $id = $_POST["id"];
    $nama_poli = $_POST["nama_poli"];
    $keterangan = $_POST["keterangan"];

    // Query untuk melakukan update data poli
    $query = "UPDATE poli SET 
        nama_poli = '$nama_poli', 
        keterangan = '$keterangan'
        WHERE id = '$id'";

    // Eksekusi query
    if (mysqli_query($mysqli, $query)) {
        echo '<script>';
        echo 'alert("Data poli berhasil diubah!");';
        echo 'window.location.href = "index.php";';
        echo '</script>';
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }
}

// Tutup koneksi
mysqli_close($mysqli);
