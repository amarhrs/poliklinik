<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <?php include '../../partials/style.php' ?>
</head>

<body>

    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <div class="logo d-flex align-items-center w-auto">
                                    <img src="<?= $base_url; ?>assets/niceadmin/img/logo.png" alt="">
                                    <span class="d-none d-lg-block">Poliklinik</span>
                                </div>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                        <p class="text-center small">Enter your personal details to create account</p>
                                    </div>

                                    <form action="checkRegister.php" method="post" class="row g-3 needs-validation" novalidate>
                                        <div class="col-12">
                                            <label for="nama" class="form-label">Nama</label>
                                            <input type="text" name="nama" class="form-control" id="nama" required>
                                            <div class="invalid-feedback">Harap masukkan nama Anda!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="alamat" class="form-label">Alamat</label>
                                            <input type="text" name="alamat" class="form-control" id="alamat" required>
                                            <div class="invalid-feedback">Harap masukkan alamat Anda!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="no_ktp" class="form-label">Nomor KTP</label>
                                            <input type="number" name="no_ktp" class="form-control" id="no_ktp" required>
                                            <div class="invalid-feedback">Harap masukkan no.KTP Anda!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="no_hp" class="form-label">Nomor HP</label>
                                            <input type="number" name="no_hp" class="form-control" id="no_hp" required>
                                            <div class="invalid-feedback">Harap masukkan no.HP Anda!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="password" required>
                                            <div class="invalid-feedback">Harap masukkan password Anda!</div>
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Create Account</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Already have an account? <a href="login-pasien.php">Log in</a></p>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <?php include '../../partials/script.php' ?>

</body>

</html>