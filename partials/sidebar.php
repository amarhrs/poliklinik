<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <?php if ($_SESSION['akses'] == "admin") { ?>
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link collapsed " href="<?= $base_url; ?>pages/admin/index.php">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= $base_url; ?>pages/admin/dokter/index.php">
                    <i class="bi bi-people"></i>
                    <span>Dokter</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= $base_url; ?>pages/admin/pasien/index.php">
                    <i class="bi bi-people"></i>
                    <span>Pasien</span>
                </a>
            </li>
            <!-- End Pasien Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= $base_url; ?>pages/admin/poli/index.php">
                    <i class="bi bi-hospital"></i>
                    <span>Poli</span>
                </a>
            </li>
            <!-- End Poli Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= $base_url; ?>pages/admin/obat/index.php">
                    <i class="bi bi-capsule"></i>
                    <span>Obat</span>
                </a>
            </li>
            <!-- End Obat Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= $base_url; ?>pages/auth/destroy.php">
                    <i class="bi bi-box-arrow-left"></i>
                    <span>Log Out</span>
                </a>
            </li>
            <!-- End Log Out Nav -->
        </ul>
    <?php } else if ($_SESSION['akses'] == "dokter") { ?>
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= $base_url; ?>pages/dokter/index.php">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= $base_url; ?>pages/dokter/jadwalPeriksa/index.php"">
                    <i class=" bi bi-calendar"></i>
                    <span>Jadwal Periksa</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= $base_url; ?>pages/dokter/periksaPasien/index.php">
                    <i class="bi bi-heart-pulse"></i>
                    <span>Periksa Pasien</span>
                </a>
            </li>
            <!-- End Periksa Pasien Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= $base_url; ?>pages/dokter/riwayatPasien/index.php">
                    <i class="bi bi-journal-medical"></i>
                    <span>Riwayat Pasien</span>
                </a>
            </li>
            <!-- End Riwayat Pasien Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= $base_url; ?>pages/dokter/profil/index.php">
                    <i class="bi bi-person"></i>
                    <span>Profil</span>
                </a>
            </li>
            <!-- End Profil Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= $base_url; ?>pages/auth/destroy.php">
                    <i class="bi bi-box-arrow-left"></i>
                    <span>Log Out</span>
                </a>
            </li>
            <!-- End Log Out Nav -->
        </ul>
    <?php } else if ($_SESSION['akses'] == "pasien") { ?>
        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed " href="<?= $base_url; ?>pages/pasien/index.php">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= $base_url; ?>pages/pasien/poli/index.php">
                    <i class="bi bi-people"></i>
                    <span>Poli</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= $base_url; ?>pages/auth/destroy.php">
                    <i class="bi bi-box-arrow-left"></i>
                    <span>Log Out</span>
                </a>
            </li>
            <!-- End Log Out Nav -->
        </ul>
    <?php } ?>

</aside><!-- End Sidebar-->