<!-- ======= Main ======= -->
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Daftar Periksa Pasien</h1>
    </div>
    <!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Periksa</h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pasien</th>
                                    <th>Keluhan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require '../../../config/db_connection.php';
                                $no = 1;
                                $query = "SELECT pasien.nama, daftar_poli.keluhan, daftar_poli.status_periksa, daftar_poli.id FROM daftar_poli INNER JOIN pasien ON daftar_poli.id_pasien = pasien.id INNER JOIN jadwal_periksa ON daftar_poli.id_jadwal = jadwal_periksa.id INNER JOIN dokter ON jadwal_periksa.id_dokter = dokter.id WHERE dokter.id = '$id_dokter'";
                                $result = mysqli_query($mysqli, $query);

                                while ($data = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $data['nama']; ?></td>
                                        <td><?php echo $data['keluhan']; ?></td>
                                        <td>
                                            <?php if ($data['status_periksa'] == 1) {
                                            ?>
                                                <button
                                                    type="button"
                                                    class="btn btn-warning btn-sm me-2" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $data['id'] ?>">
                                                    <i class="bi bi-pencil"></i> Edit
                                                </button>

                                                <!-- Update Modal -->
                                                <div class="modal fade" id="updateModal<?php echo $data['id']; ?>" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="updateModalLabel">Update Periksa Pasien</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <?php
                                                                $idDaftarPoli = $data['id'];
                                                                require '../../../config/db_connection.php';
                                                                $ambilDataPeriksa = mysqli_query($mysqli, "SELECT * FROM periksa INNER JOIN daftar_poli ON periksa.id_daftar_poli = daftar_poli.id WHERE daftar_poli.id = '$idDaftarPoli'");
                                                                $ambilData = mysqli_fetch_assoc($ambilDataPeriksa);
                                                                ?>
                                                                <form action="updatePeriksa.php" method="post">
                                                                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $data['id']; ?>" required>
                                                                    <div class="mb-3">
                                                                        <label for="nama" class="form-label">Nama Pasien</label>
                                                                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama']; ?>" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="tanggal_periksa" class="form-label">Tanggal Periksa</label>
                                                                        <input type="datetime-local" class="form-control" id="tanggal_periksa" name="tanggal_periksa"
                                                                            required value="<?php echo $ambilData['tgl_periksa'] ?>">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="catatan" class="col-sm-2 col-form-label">Catatan</label>
                                                                        <textarea class="form-control" style="height: 100px" id="catatan"
                                                                            name="catatan" required><?php echo $ambilData['catatan'] ?></textarea>
                                                                    </div>
                                                                    <div class="d-grid">
                                                                        <button type="submit" class="btn btn-success">Simpan</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php  } else { ?>
                                                <!-- End Update Modal-->

                                                <button
                                                    type="button"
                                                    class="btn btn-primary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#periksaModal<?php echo $data['id'] ?>">
                                                    <i class="bi bi-check-circle"></i> Periksa
                                                </button>

                                                <!-- Periksa Modal -->
                                                <div class="modal fade" id="periksaModal<?php echo $data['id']; ?>" tabindex="-1" aria-labelledby="periksaModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="periksaModalLabel">Periksa Pasien</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="periksa.php" method="post">
                                                                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $data['id']; ?>" required>

                                                                    <div class="mb-3">
                                                                        <label for="nama" class="form-label">Nama Pasien</label>
                                                                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama']; ?>" readonly required style="background-color: var(--bs-secondary-bg);">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="tanggal_periksa" class="form-label">Tanggal Periksa</label>
                                                                        <input type="datetime-local" class="form-control" id="tanggal_periksa" name="tanggal_periksa"
                                                                            required>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="catatan" class="col-sm-2 col-form-label">Catatan</label>
                                                                        <textarea class="form-control" style="height: 100px" id="catatan"
                                                                            name="catatan" required></textarea>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label>Obat</label>
                                                                        <select id="multiple-select-field" multiple
                                                                            data-placeholder="Pilih Obat"
                                                                            name="obat[]">
                                                                            <?php
                                                                            require '../../../config/db_connection.php';
                                                                            $getObat = "SELECT * FROM obat";
                                                                            $queryObat = mysqli_query($mysqli, $getObat);
                                                                            while ($datas = mysqli_fetch_assoc($queryObat)) {
                                                                            ?>
                                                                                <option value="<?php echo $datas['id'] ?>">
                                                                                    <?php echo $datas['nama_obat'] ?></option>
                                                                            <?php } ?>
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
                                            <?php } ?>
                                            <!-- End Periksa Modal-->
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
<script>
    function hitungTotal() {
        // Ambil semua elemen select dengan name "obat[]"
        var selectedObat = document.querySelectorAll('select[name="obat[]"] option:checked');

        var totalHarga = 150000; // Harga awal
        // Iterasi melalui obat yang dipilih dan tambahkan harga masing-masing
        selectedObat.forEach(function(option) {
            totalHarga += parseInt(option.getAttribute('data-harga')) || 0;
        });

        // Tampilkan total harga
        document.getElementById('totalHarga').innerText = 'Total Harga: ' + totalHarga;
    }
</script>