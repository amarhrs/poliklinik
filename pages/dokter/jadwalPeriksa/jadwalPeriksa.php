<!-- ======= Main ======= -->
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Jadwal Periksa</h1>
    </div>
    <!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Jadwal Periksa</h5>

                        <!-- Vertical Form -->
                        <form action="createJadwal.php" method="post" class="row g-3">
                            <div class="col-12">
                                <label for="hari" class="form-label">Hari</label>
                                <select class="form-select" id="hari" name="hari">
                                    <?php
                                    $hariArray = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                                    foreach ($hariArray as $hari) {
                                    ?>
                                        <option value="<?php echo $hari ?>">
                                            <?php echo $hari ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="jamMulai" class="form-label">Jam Mulai</label>
                                <input type="time" class="form-control" id="jamMulai" name="jamMulai" required />
                            </div>
                            <div class="col-12">
                                <label for="jamSelesai" class="form-label">Jam Selesai</label>
                                <input type="time" class="form-control" id="jamSelesai" name="jamSelesai" required />
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

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title">Daftar Jadwal Periksa</h5>
                            <!-- Button Lihat Jadwal -->
                            <button type="button" class="btn btn-primary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#cekJadwal">
                                <i class="bi bi-eye"></i> Lihat Jadwal
                            </button>
                        </div>

                        <!-- Cek Jadwal Modal -->
                        <div class="modal fade" id="cekJadwal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <?php
                                        require '../../../config/db_connection.php';
                                        $cekJadwal = mysqli_query($mysqli, "SELECT * FROM dokter INNER JOIN poli ON dokter.id_poli = poli.id WHERE poli.id = '$id_poli'");
                                        $getData = mysqli_fetch_assoc($cekJadwal);
                                        ?>
                                        <h5 class="modal-title" id="cekJadwal">Jadwal Poli <?php echo $getData['nama_poli'] ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Default Table -->
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>No</td>
                                                    <td>Nama Dokter</td>
                                                    <td>Hari</td>
                                                    <td>Jam Mulai</td>
                                                    <td>Jam Selesai</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $nomor = 1;
                                                require '../../../config/db_connection.php';
                                                $ambilDataJadwal = "SELECT jadwal_periksa.id, jadwal_periksa.id_dokter, jadwal_periksa.hari, jadwal_periksa.jam_mulai, jadwal_periksa.jam_selesai, dokter.id AS idDokter, dokter.nama, dokter.alamat, dokter.no_hp, dokter.id_poli, poli.id AS idPoli, poli.nama_poli, poli.keterangan FROM jadwal_periksa INNER JOIN dokter ON jadwal_periksa.id_dokter = dokter.id INNER JOIN poli ON dokter.id_poli = poli.id WHERE id_poli = '$id_poli'";

                                                $resultss = mysqli_query($mysqli, $ambilDataJadwal);
                                                while ($a = mysqli_fetch_assoc($resultss)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $nomor++; ?></td>
                                                        <td><?php echo $a['nama'] ?></td>
                                                        <td><?php echo $a['hari'] ?></td>
                                                        <td><?php echo $a['jam_mulai'] ?></td>
                                                        <td><?php echo $a['jam_selesai'] ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <!-- End Default Table Example -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Cek Jadwal Modal-->

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Dokter</th>
                                    <th>Hari</th>
                                    <th>Jam Mulai</th>
                                    <th>Jam Selesai</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require '../../../config/db_connection.php';
                                $no = 1;
                                $query = "SELECT jadwal_periksa.id, jadwal_periksa.id_dokter, jadwal_periksa.hari, jadwal_periksa.jam_mulai, jadwal_periksa.jam_selesai, jadwal_periksa.status_jadwal, dokter.id AS idDokter, dokter.nama, dokter.alamat, dokter.no_hp, dokter.id_poli, poli.id AS idPoli, poli.nama_poli, poli.keterangan FROM jadwal_periksa INNER JOIN dokter ON jadwal_periksa.id_dokter = dokter.id INNER JOIN poli ON dokter.id_poli = poli.id WHERE id_poli = '$id_poli' AND dokter.id = '$id_dokter'";
                                $result = mysqli_query($mysqli, $query);

                                while ($data = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['nama'] ?></td>
                                        <td><?php echo $data['hari'] ?></td>
                                        <td><?php echo $data['jam_mulai'] ?></td>
                                        <td><?php echo $data['jam_selesai'] ?></td>
                                        <td><?php echo $data['status_jadwal'] ?></td>
                                        <td>
                                            <?php
                                            require '../../../config/db_connection.php';
                                            $cekJadwalPeriksa = "SELECT * FROM daftar_poli INNER JOIN jadwal_periksa ON daftar_poli.id_jadwal = jadwal_periksa.id WHERE jadwal_periksa.id_dokter = '$id_dokter' AND daftar_poli.status_periksa = '0'";
                                            $queryCekJadwal = mysqli_query($mysqli, $cekJadwalPeriksa);
                                            if (mysqli_num_rows($queryCekJadwal) > 0) {

                                            ?>
                                                <button
                                                    type="button"
                                                    class="btn btn-warning btn-sm me-2" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $data['id'] ?>" disabled>
                                                    <i class="bi bi-pencil"></i> Edit
                                                </button>
                                            <?php } else { ?>
                                                <button type='button' class='btn btn-warning btn-sm me-2'
                                                    data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $data['id'] ?>"
                                                    <?php echo $data['id_dokter'] == $id_dokter ? '' : 'disabled' ?>>
                                                    <i class="bi bi-pencil"></i> Edit
                                                </button>

                                            <?php } ?>
                                        </td>

                                        <!-- Update Modal -->
                                        <div class="modal fade" id="updateModal<?php echo $data['id']; ?>" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="updateModalLabel">Update Data Dokter</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="updateJadwal.php" method="post">
                                                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $data['id']; ?>" required>

                                                            <div class="mb-3">
                                                                <label for="hari" class="form-label">Hari</label>
                                                                <select class="form-select" id="hari" name="hari" required>
                                                                    <?php
                                                                    $hariArray = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                                                                    foreach ($hariArray as $hari) {
                                                                        $selected = ($data['hari'] == $hari) ? 'selected' : '';
                                                                        echo "<option value=\"$hari\" $selected>$hari</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="jamMulai" class="form-label">Jam Mulai</label>
                                                                <input type="time" class="form-control" id="jamMulai" name="jamMulai" value="<?php echo $data['jam_mulai']; ?>" required>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="jamSelesai" class="form-label">Jam Mulai</label>
                                                                <input type="time" class="form-control" id="jamSelesai" name="jamSelesai" value="<?php echo $data['jam_selesai']; ?>" required>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="statusJadwal" class="form-label">Status Jadwal</label>
                                                                <select class="form-select" id="statusJadwal" name="statusJadwal" required>
                                                                    <option value="Aktif"
                                                                        <?php echo $data['status_jadwal'] == 'Aktif' ? 'selected' : ''; ?>>
                                                                        Aktif</option>
                                                                    <option value="Tidak Aktif"
                                                                        <?php echo $data['status_jadwal'] == 'Tidak Aktif' ? 'selected' : ''; ?>>
                                                                        Tidak Aktif</option>
                                                                </select>
                                                            </div>

                                                            <div class="d-grid">
                                                                <button type="submit" class="btn btn-success">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Update Modal-->
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