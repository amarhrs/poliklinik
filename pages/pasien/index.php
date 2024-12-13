<?php
session_start();
$username = $_SESSION['username'];
if ($username == "") {
    header("location:../../pages/auth/login.php");
}

?>

<?php
include '../../config/db_connection.php';
$query_jml_pasien = "SELECT COUNT(*) as jumlah_pasien FROM pasien";
$query_jml_dokter = "SELECT COUNT(*) as jumlah_dokter FROM dokter";
$query_jml_poli = "SELECT COUNT(*) as jumlah_poli FROM poli";
$query_jml_obat = "SELECT COUNT(*) as jumlah_obat FROM obat";

// Eksekusi query dan ambil hasilnya
$result_pasien = mysqli_query($mysqli, $query_jml_pasien);
$result_dokter = mysqli_query($mysqli, $query_jml_dokter);
$result_poli = mysqli_query($mysqli, $query_jml_poli);
$result_obat = mysqli_query($mysqli, $query_jml_obat);

// Cek apakah query berhasil dieksekusi
if ($result_pasien && $result_dokter && $result_poli && $result_obat) {
    // Ambil hasil query
    $row_pasien = mysqli_fetch_assoc($result_pasien);
    $row_dokter = mysqli_fetch_assoc($result_dokter);
    $row_poli = mysqli_fetch_assoc($result_poli);
    $row_obat = mysqli_fetch_assoc($result_obat);

    // Ambil nilai jumlah dari hasil query
    $jumlah_pasien = $row_pasien['jumlah_pasien'];
    $jumlah_dokter = $row_dokter['jumlah_dokter'];
    $jumlah_poli = $row_poli['jumlah_poli'];
    $jumlah_obat = $row_obat['jumlah_obat'];
} else {
    // Handle kesalahan jika query tidak berhasil
    $jumlah_pasien = "Error";
    $jumlah_dokter = "Error";
    $jumlah_poli = "Error";
    $jumlah_obat = "Error";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Poliklinik | Dashboard</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <?php include '../../partials/style.php' ?>
</head>

<body>
    <?php include '../../partials/header.php' ?>
    <?php include '../../partials/sidebar.php' ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg">
                    <div class="row">

                        <!-- Pasien Card -->
                        <div class="col-lg-3 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Pasien</h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6><?php echo $jumlah_pasien; ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Pasien Card -->

                        <!-- Dokter Card -->
                        <div class="col-lg-3 col-md-6">
                            <div class="card info-card revenue-card">
                                <div class="card-body">
                                    <h5 class="card-title">Dokter</h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6><?php echo $jumlah_dokter; ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Dokter Card -->

                        <!-- Poli Card -->
                        <div class="col-lg-3 col-md-6">
                            <div class="card info-card customers-card">
                                <div class="card-body">
                                    <h5 class="card-title">Poli</h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-hospital"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6><?php echo $jumlah_poli; ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Poli Card -->

                        <!-- Obat Card -->
                        <div class="col-lg-3 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Obat</h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-capsule"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6><?php echo $jumlah_obat; ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Obat Card -->
                    </div>
                </div>

            </div>

            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-8">
                    <div class="row">
                        <!-- Reports -->
                        <div class="col-12">
                            <div class="card">
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul
                                        class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Reports <span>/Today</span></h5>

                                    <!-- Line Chart -->
                                    <div id="reportsChart"></div>

                                    <script>
                                        document.addEventListener("DOMContentLoaded", () => {
                                            new ApexCharts(
                                                document.querySelector("#reportsChart"), {
                                                    series: [{
                                                            name: "Sales",
                                                            data: [31, 40, 28, 51, 42, 82, 56],
                                                        },
                                                        {
                                                            name: "Revenue",
                                                            data: [11, 32, 45, 32, 34, 52, 41],
                                                        },
                                                        {
                                                            name: "Customers",
                                                            data: [15, 11, 32, 18, 9, 24, 11],
                                                        },
                                                    ],
                                                    chart: {
                                                        height: 350,
                                                        type: "area",
                                                        toolbar: {
                                                            show: false,
                                                        },
                                                    },
                                                    markers: {
                                                        size: 4,
                                                    },
                                                    colors: ["#4154f1", "#2eca6a", "#ff771d"],
                                                    fill: {
                                                        type: "gradient",
                                                        gradient: {
                                                            shadeIntensity: 1,
                                                            opacityFrom: 0.3,
                                                            opacityTo: 0.4,
                                                            stops: [0, 90, 100],
                                                        },
                                                    },
                                                    dataLabels: {
                                                        enabled: false,
                                                    },
                                                    stroke: {
                                                        curve: "smooth",
                                                        width: 2,
                                                    },
                                                    xaxis: {
                                                        type: "datetime",
                                                        categories: [
                                                            "2018-09-19T00:00:00.000Z",
                                                            "2018-09-19T01:30:00.000Z",
                                                            "2018-09-19T02:30:00.000Z",
                                                            "2018-09-19T03:30:00.000Z",
                                                            "2018-09-19T04:30:00.000Z",
                                                            "2018-09-19T05:30:00.000Z",
                                                            "2018-09-19T06:30:00.000Z",
                                                        ],
                                                    },
                                                    tooltip: {
                                                        x: {
                                                            format: "dd/MM/yy HH:mm",
                                                        },
                                                    },
                                                }
                                            ).render();
                                        });
                                    </script>
                                    <!-- End Line Chart -->
                                </div>
                            </div>
                        </div>
                        <!-- End Reports -->
                    </div>
                </div>
                <!-- End Left side columns -->

                <!-- Right side columns -->
                <div class="col-lg-4">
                    <!-- Budget Report -->
                    <div class="card">
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>

                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>

                        <div class="card-body pb-0">
                            <h5 class="card-title">
                                Budget Report <span>| This Month</span>
                            </h5>

                            <div
                                id="budgetChart"
                                style="min-height: 400px"
                                class="echart"></div>

                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    var budgetChart = echarts
                                        .init(document.querySelector("#budgetChart"))
                                        .setOption({
                                            legend: {
                                                data: ["Allocated Budget", "Actual Spending"],
                                            },
                                            radar: {
                                                // shape: 'circle',
                                                indicator: [{
                                                        name: "Sales",
                                                        max: 6500,
                                                    },
                                                    {
                                                        name: "Administration",
                                                        max: 16000,
                                                    },
                                                    {
                                                        name: "Information Technology",
                                                        max: 30000,
                                                    },
                                                    {
                                                        name: "Customer Support",
                                                        max: 38000,
                                                    },
                                                    {
                                                        name: "Development",
                                                        max: 52000,
                                                    },
                                                    {
                                                        name: "Marketing",
                                                        max: 25000,
                                                    },
                                                ],
                                            },
                                            series: [{
                                                name: "Budget vs spending",
                                                type: "radar",
                                                data: [{
                                                        value: [4200, 3000, 20000, 35000, 50000, 18000],
                                                        name: "Allocated Budget",
                                                    },
                                                    {
                                                        value: [
                                                            5000, 14000, 28000, 26000, 42000, 21000,
                                                        ],
                                                        name: "Actual Spending",
                                                    },
                                                ],
                                            }, ],
                                        });
                                });
                            </script>
                        </div>
                    </div>
                    <!-- End Budget Report -->
                </div>
                <!-- End Right side columns -->

        </section>

    </main><!-- End #main -->

    <?php include '../../partials/footer.php' ?>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <?php include '../../partials/script.php' ?>

</body>

</html>