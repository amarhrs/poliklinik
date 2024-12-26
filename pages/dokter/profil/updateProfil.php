<?php
include '../../../config/db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $no_hp = $_POST["no_hp"];
    $password = md5($nama); // Update password dengan nama baru yang dienkripsi

    // Query untuk update data dokter
    $query = "UPDATE dokter SET 
        nama = '$nama', 
        alamat = '$alamat', 
        no_hp = '$no_hp', 
        password = '$password'
        WHERE id = '$id'";

    // Eksekusi query
    if (mysqli_query($mysqli, $query)) {
        session_start();
        $_SESSION['username'] = $nama;

        echo '<script>';
        echo 'alert("Profil berhasil diperbarui!");';
        echo 'window.location.href = "index.php";';
        echo '</script>';
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }
}

// Tutup koneksi
mysqli_close($mysqli);
