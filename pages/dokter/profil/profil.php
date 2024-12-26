<?php
include '../../../config/db_connection.php';

$id_dokter = $_SESSION['id']; // Ambil ID dokter dari session

// Ambil data dokter dari database
$query = "SELECT * FROM dokter WHERE id = '$id_dokter'";
$result = mysqli_query($mysqli, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
} else {
    echo '<script>alert("Data dokter tidak ditemukan."); window.location.href = "index.php";</script>';
    exit();
}
?>

<!-- ======= Main ======= -->
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Profil Dokter</h1>
    </div>
    <!-- End Page Title -->

    <section class="section">
        <div class="row">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Profil Dokter</h5>

                    <!-- Vertical Form -->
                    <form action="updateProfil.php" method="post" class="row g-3">
                        <input type="hidden" name="id" value="<?= $data['id']; ?>" />
                        <div class="col-12">
                            <label for="nama" class="form-label">Nama Dokter</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama']; ?>" required />
                        </div>
                        <div class="col-12">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $data['alamat']; ?>" required />
                        </div>
                        <div class="col-12">
                            <label for="no_hp" class="form-label">Nomor HP</label>
                            <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?= $data['no_hp']; ?>" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>

                    <!-- Vertical Form -->
                </div>
            </div>
        </div>
    </section>
</main>
<!-- End #main -->