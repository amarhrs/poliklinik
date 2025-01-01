<!-- ======= Main ======= -->
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Riwayat Pasien</h1>
    </div>
    <!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Riwayat Pasien</h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pasien</th>
                                    <th>Alamat</th>
                                    <th>No.KTP</th>
                                    <th>No.Telepon</th>
                                    <th>No.RM</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require '../../../config/db_connection.php';
                                $no = 1;
                                $query = "SELECT daftar_poli.status_periksa, periksa.id, pasien.alamat, pasien.id as idPasien, pasien.no_ktp, pasien.no_hp, pasien.no_rm, periksa.tgl_periksa, pasien.nama as namaPasien, dokter.nama, daftar_poli.keluhan, periksa.catatan, GROUP_CONCAT(obat.nama_obat) as namaObat, SUM(obat.harga) AS hargaObat FROM detail_periksa INNER JOIN periksa ON detail_periksa.id_periksa = periksa.id INNER JOIN daftar_poli ON periksa.id_daftar_poli = daftar_poli.id INNER JOIN pasien ON daftar_poli.id_pasien = pasien.id INNER JOIN obat ON detail_periksa.id_obat = obat.id INNER JOIN jadwal_periksa ON daftar_poli.id_jadwal = jadwal_periksa.id INNER JOIN dokter ON jadwal_periksa.id_dokter = dokter.id WHERE dokter.id = '$id_dokter' AND status_periksa = '1' GROUP BY pasien.id";
                                $result = mysqli_query($mysqli, $query);
                                $result = mysqli_query($mysqli, $query);

                                while ($data = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $data['namaPasien']; ?></td>
                                        <td><?php echo $data['alamat']; ?></td>
                                        <td><?php echo $data['no_ktp']; ?></td>
                                        <td><?php echo $data['no_hp']; ?></td>
                                        <td><?php echo $data['no_rm']; ?></td>
                                        <td>

                                            <button
                                                type="button"
                                                class="btn btn-primary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#detailModal<?php echo $data['id'] ?>">
                                                <i class="bi bi-eye"></i> Detail Riwayat Periksa
                                            </button>

                                            <!-- Detail Modal -->
                                            <div class="modal fade" id="detailModal<?php echo $data['id']; ?>" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="detailModalLabel">Riwayat <?php echo $data['namaPasien'] ?></h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Tambahkan table-responsive di sini -->
                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    <thead>
                                                                        <tr>
                                                                            <td>No</td>
                                                                            <td>Tanggal Periksa</td>
                                                                            <td>Nama Pasien</td>
                                                                            <td>Nama Dokter</td>
                                                                            <td>Keluhan</td>
                                                                            <td>Obat</td>
                                                                            <td>Biaya</td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                        $idPasien = $data['idPasien'];
                                                                        $nomor = 1;
                                                                        require '../../../config/db_connection.php';
                                                                        $ambilData = "SELECT detail_periksa.id as idDetailPeriksa, periksa.tgl_periksa, pasien.nama as namaPasien, dokter.nama, daftar_poli.keluhan, periksa.catatan,
                                            GROUP_CONCAT(obat.nama_obat) as namaObat,
                                            periksa.biaya_periksa AS hargaObat 
                                            FROM detail_periksa 
                                            INNER JOIN periksa ON detail_periksa.id_periksa = periksa.id 
                                            INNER JOIN daftar_poli ON periksa.id_daftar_poli = daftar_poli.id 
                                            INNER JOIN pasien ON daftar_poli.id_pasien = pasien.id 
                                            INNER JOIN obat ON detail_periksa.id_obat = obat.id 
                                            INNER JOIN jadwal_periksa ON daftar_poli.id_jadwal = jadwal_periksa.id 
                                            INNER JOIN dokter ON jadwal_periksa.id_dokter = dokter.id 
                                            WHERE dokter.id = '$id_dokter' AND pasien.id = '$idPasien' 
                                            GROUP BY pasien.id, periksa.tgl_periksa";
                                                                        $results = mysqli_query($mysqli, $ambilData);
                                                                        while ($datas = mysqli_fetch_assoc($results)) {
                                                                            # code...
                                                                        ?>
                                                                            <tr>
                                                                                <td><?php echo $nomor++; ?></td>
                                                                                <td><?php echo $datas['tgl_periksa'] ?></td>
                                                                                <td><?php echo $datas['namaPasien'] ?></td>
                                                                                <td><?php echo $datas['nama'] ?></td>
                                                                                <td style="white-space: pre-line;"><?php echo $datas['keluhan'] ?></td>
                                                                                <td style="white-space: pre-line;"><?php echo $datas['namaObat'] ?></td>
                                                                                <td><?php echo $datas['hargaObat'] ?></td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <!-- End table-responsive -->
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Detail Modal-->

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