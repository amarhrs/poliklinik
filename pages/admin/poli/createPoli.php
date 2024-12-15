<?php
include '../../../config/db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $nama_poli = $_POST["nama_poli"];
    $keterangan = $_POST["keterangan"];

    // Query untuk menambahkan data polu ke dalam tabel
    $check = "SELECT * FROM poli WHERE nama_poli = '$nama_poli'";
    $data = mysqli_query($mysqli, $check);

    if (mysqli_num_rows($data) > 0) {
        echo '<script>alert("Poli sudah ada");window.location.href = "index.php";</script>';
    } else {
        // Query untuk menambahkan data poli ke dalam tabel
        $query = "INSERT INTO poli (nama_poli, keterangan) VALUES ('$nama_poli', '$keterangan')";

        // Eksekusi query
        if (mysqli_query($mysqli, $query)) {
            echo '<script>';
            echo 'alert("Data poli berhasil ditambahkan!");';
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
