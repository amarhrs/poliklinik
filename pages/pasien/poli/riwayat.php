<?php
require '../../../config/db_connection.php';
$id = $_GET['id'];
$ambilDetail = mysqli_query($mysqli, "SELECT 
        dp.id as idDetailPeriksa,
        daftar_poli.id as idDaftarPoli,
        poli.nama_poli,
        dokter.nama,
        jadwal_periksa.hari,
        DATE_FORMAT(jadwal_periksa.jam_mulai, '%H:%i') as jamMulai,
        DATE_FORMAT(jadwal_periksa.jam_selesai, '%H:%i') as jamSelesai,
        daftar_poli.no_antrian,
        p.id as idPeriksa,
        p.tgl_periksa,
        p.catatan,
        p.biaya_periksa,
        GROUP_CONCAT(o.id) as idObat,
        GROUP_CONCAT(o.nama_obat) as namaObat
        FROM daftar_poli
        INNER JOIN jadwal_periksa ON daftar_poli.id_jadwal = jadwal_periksa.id
        INNER JOIN dokter ON jadwal_periksa.id_dokter = dokter.id
        INNER JOIN poli ON dokter.id_poli = poli.id
        LEFT JOIN periksa p ON daftar_poli.id = p.id_daftar_poli
        LEFT JOIN detail_periksa dp ON p.id = dp.id_periksa
        LEFT JOIN obat o ON dp.id_obat = o.id
        WHERE daftar_poli.id = '$id'
        GROUP BY p.id");

$data = mysqli_fetch_assoc($ambilDetail);
?>
<!-- ======= Main ======= -->
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Riwayat Periksa</h1>
    </div>
    <!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body pt-1">
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Riwayat Periksa</h5>
                                <p class="small fst-italic">Terima kasih telah mempercayakan kesehatan Anda kepada kami di Poliklinik. Kami berharap Anda merasa lebih baik setelah menerima pelayanan dari tim kami. Jangan ragu untuk menghubungi kami jika ada pertanyaan atau memerlukan bantuan lebih lanjut. Semoga Anda lekas sembuh dan tetap sehat selalu. Salam hangat dari kami semua di Poliklinik.</p>

                                <h5 class="card-title">Detail</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Nama Dokter</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $data['nama'] ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Poli</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $data['nama_poli'] ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Hari</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $data['hari'] ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">jam</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $data['jamMulai'] ?> - <?php echo $data['jamSelesai'] ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">No. Antrian</div>
                                    <div class="col-lg-9 col-md-8">
                                        <span class="badge bg-primary"><?php echo $data['no_antrian'] ?></span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Obat</div>
                                    <div class="col-lg-9 col-md-8"><?php
                                                                    $namaObatArray = explode(',', $data['namaObat']);
                                                                    foreach ($namaObatArray as $index => $namaObat) {
                                                                        echo ($index + 1) . ". " . $namaObat . "<br>";
                                                                    }
                                                                    ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Biaya Periksa</div>
                                    <div class="col-lg-9 col-md-8"><strong><?php echo $data['biaya_periksa'] ?></strong></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>
<!-- End #main -->