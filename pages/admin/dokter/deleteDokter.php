<?php
include '../../../config/db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $id = $_POST["id"];

    // Query untuk delete data dokter
    $query = "DELETE FROM dokter WHERE id = $id";

    // Eksekusi query
    // if (mysqli_query($mysqli, $query)) {
    //     echo '<script>';
    //     echo 'alert("Data dokter berhasil dihapus!");';
    //     echo 'window.location.href = "index.php";';
    //     echo '</script>';
    //     exit();
    // } else {
    //     echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    // }

    // Eksekusi query
    if (mysqli_query($mysqli, $query)) {
        header('Location: index.php?delete=true');
        exit();
    } else {
        header('Location: index.php?delete=false');
        exit();
    }
}

// Tutup koneksi
mysqli_close($mysqli);
