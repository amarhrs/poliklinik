<?php
include '../../../config/db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $id = $_POST["id"];

    // Query untuk delete data obat
    $query = "DELETE FROM obat WHERE id = $id";

    // Eksekusi query
    if (mysqli_query($mysqli, $query)) {
        echo '<script>';
        echo 'alert("Data obat berhasil dihapus!");';
        echo 'window.location.href = "index.php";';
        echo '</script>';
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }
}

// Tutup koneksi
mysqli_close($mysqli);
