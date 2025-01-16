<?php
include '../../../config/db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $no_hp = $_POST["no_hp"];
    $poli = $_POST["poli"];
    $password = md5($nama);

    // Query untuk menambahkan data dokter
    $query = "INSERT INTO dokter (nama, password, alamat, no_hp, id_poli) VALUES ('$nama', '$password', '$alamat', '$no_hp', '$poli')";

    // Eksekusi query
    // if (mysqli_query($mysqli, $query)) {
    //     echo '<script>';
    //     echo 'alert("Data dokter berhasil ditambahkan!");';
    //     echo 'window.location.href = "index.php";';
    //     echo '</script>';
    //     exit();
    // } else {
    //     echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    // }

    // Eksekusi query
    if (mysqli_query($mysqli, $query)) {
        header('Location: index.php?success=true');
        exit();
    } else {
        header('Location: index.php?error=true');
        exit();
    }
}

// Tutup koneksi
mysqli_close($mysqli);
