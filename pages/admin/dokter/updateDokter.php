<?php
include '../../../config/db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $no_hp = $_POST["no_hp"];
    $poli = $_POST["poli"];
    $password = md5($nama);

    // Query untuk update data dokter
    $query = "UPDATE dokter SET 
        nama = '$nama', 
        alamat = '$alamat',
        no_hp = '$no_hp',
        id_poli = $poli,
        password = '$password'
        WHERE id = '$id'";

    // Eksekusi query
    // if (mysqli_query($mysqli, $query)) {
    //     echo '<script>';
    //     echo 'alert("Data dokter berhasil diubah!");';
    //     echo 'window.location.href = "index.php";';
    //     echo '</script>';
    //     exit();
    // } else {
    //     echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    // }

    // Eksekusi query
    if (mysqli_query($mysqli, $query)) {
        header('Location: index.php?update=true');
        exit();
    } else {
        header('Location: index.php?update=false');
        exit();
    }
}

// Tutup koneksi
mysqli_close($mysqli);
