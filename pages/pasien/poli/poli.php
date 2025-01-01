<!-- ======= Main ======= -->
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Daftar Poli</h1>
    </div>
    <!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Poli</h5>

                        <!-- Vertical Form -->
                        <form action="daftarPoli.php" method="post" class="row g-3">
                            <div class="col-12">
                                <label for="for=" no_rm font-weight-bold"" class="form-label">Nomor Rekam Medis</label>
                                <input type="text" class="form-control" name="no_rm"
                                    value="<?php echo $_SESSION['no_rm'] ?>" readonly required style="background-color: var(--bs-secondary-bg);">
                            </div>
                            <div class="col-12">
                                <label for="poli" class="form-label">Pilih Poli</label>
                                <select class="form-select" id="poli" name="poli" required>
                                    <option value="" disabled selected>Pilih Poli</option>
                                    <?php
                                    require '../../../config/db_connection.php';
                                    $query = "SELECT * FROM poli";
                                    $result = mysqli_query($mysqli, $query);
                                    while ($dataPoli = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <option value="<?php echo $dataPoli['id'] ?>">
                                            <?php echo $dataPoli['nama_poli'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="jadwal" class="form-label">Pilih Jadwal</label>
                                <select class="form-select" id="jadwal" name="jadwal" required>

                                </select>
                            </div>
                            <div class="col-12">
                                <label for="keluhan" class="form-label">Keluhan</label>
                                <div class="col-12">
                                    <textarea class="form-control" style="height: 100px" id="keluhan" name="keluhan" required></textarea>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                                <button type="reset" class="btn btn-secondary">
                                    Reset
                                </button>
                            </div>
                        </form>
                        <!-- Vertical Form -->
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Riwayat Daftar Poli</h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Poli</th>
                                    <th>Dokter</th>
                                    <th>Hari</th>
                                    <th>Mulai</th>
                                    <th>Selesai</th>
                                    <th>Antrian</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require '../../../config/db_connection.php';
                                $no = 1;
                                $query = "SELECT daftar_poli.id as idDaftarPoli, poli.nama_poli, dokter.nama, jadwal_periksa.hari, jadwal_periksa.jam_mulai, jadwal_periksa.jam_selesai, daftar_poli.no_antrian FROM daftar_poli INNER JOIN jadwal_periksa ON daftar_poli.id_jadwal = jadwal_periksa.id INNER JOIN dokter ON jadwal_periksa.id_dokter = dokter.id INNER JOIN poli ON dokter.id_poli = poli.id WHERE daftar_poli.id_pasien = '$idPasien'";
                                $result = mysqli_query($mysqli, $query);

                                while ($data = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $data['nama_poli'] ?></td>
                                        <td><?php echo $data['nama'] ?></td>
                                        <td><?php echo $data['hari'] ?></td>
                                        <td><?php echo $data['jam_mulai'] ?></td>
                                        <td><?php echo $data['jam_selesai'] ?></td>
                                        <td><?php echo $data['no_antrian'] ?></td>
                                        <td>
                                            <a href="detail.php?id=<?php echo $data['idDaftarPoli'] ?>"
                                                class='btn btn-info btn-sm me-2'><i class="bi bi-eye"></i> Detail</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- End #main -->