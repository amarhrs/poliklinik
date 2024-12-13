<!-- ======= Main ======= -->
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Pasien</h1>
    </div>
    <!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Pasien</h5>

                        <!-- Vertical Form -->
                        <form action="createPasien.php" method="post" class="row g-3">
                            <div class="col-12">
                                <label for="nama" class="form-label">Nama Pasien</label>
                                <input type="text" class="form-control" id="nama" name="nama" required />
                            </div>
                            <div class="col-12">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" required />
                            </div>
                            <div class="col-12">
                                <label for="no_ktp" class="form-label">Nomor KTP</label>
                                <input type="number" class="form-control" id="no_ktp" name="no_ktp" required>
                            </div>
                            <div class="col-12">
                                <label for="no_hp" class="form-label">Nomor HP</label>
                                <input type="number" class="form-control" id="no_hp" name="no_hp" required>
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
                        <h5 class="card-title">Data Pasien</h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>No.KTP</th>
                                    <th>No.Hp</th>
                                    <th>No.RM</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require '../../../config/db_connection.php';
                                $no = 1;
                                $query = "SELECT * FROM pasien";
                                $result = mysqli_query($mysqli, $query);

                                while ($data = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $data['nama'] ?></td>
                                        <td><?php echo $data['alamat'] ?></td>
                                        <td><?php echo $data['no_ktp'] ?></td>
                                        <td><?php echo $data['no_hp'] ?></td>
                                        <td><?php echo $data['no_rm'] ?></td>
                                        <td>
                                            <button
                                                type="button"
                                                class="btn btn-warning btn-sm me-2" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $data['id'] ?>">
                                                <i class="bi bi-pencil"></i> Edit
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $data['id'] ?>">
                                                <i class="bi bi-trash"></i> Hapus
                                            </button>
                                        </td>

                                        <!-- Update Modal -->
                                        <div class="modal fade" id="updateModal<?php echo $data['id']; ?>" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="updateModalLabel">Update Data Pasien</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="updatePasien.php" method="post">
                                                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $data['id']; ?>" required>

                                                            <div class="mb-3">
                                                                <label for="nama" class="form-label">Nama Pasien</label>
                                                                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama']; ?>" required>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="alamat" class="form-label">Alamat</label>
                                                                <input class="form-control" id="alamat" name="alamat" value="<?php echo $data['alamat']; ?>" required>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="no_ktp" class="form-label">No KTP</label>
                                                                <input type="number" class="form-control" id="no_ktp" name="no_ktp" value="<?php echo $data['no_ktp']; ?>" required>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="no_hp" class="form-label">No HP</label>
                                                                <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?php echo $data['no_hp']; ?>" required>
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

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteModal<?php echo $data['id'] ?>" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Delete Data Pasien</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="deletePasien.php" method="post">
                                                            <input type="hidden" class="form-control" id="id" name="id"
                                                                value="<?php echo $data['id'] ?>" required>
                                                            <p>Apakah anda yakin untuk menghapus data pasien?<span><b><?php echo $data['nama'] ?></b></span></p>
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Delete Modal -->
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