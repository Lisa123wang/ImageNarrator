<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <!-- jQuery Library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
    
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- ApexCharts -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <!-- =======================================================
    * Template Name: NiceAdmin
    * Updated: Jan 29 2024 with Bootstrap v5.3.2
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>
<body>
<?php
    session_start();
    $link = mysqli_connect('localhost', 'root', '', 'narratordb_test1');

    if(!isset($_SESSION['email'])) {
        header("Location: pages-login.php");
        exit;
    }

    echo "welcome, " . htmlspecialchars($_SESSION['email']);
    
    if (isset($_SESSION['nickname'])) {
        echo " (" . htmlspecialchars($_SESSION['nickname']) . ")";
    }

    $email = $_SESSION['email'];
    $sqlUser = "SELECT userID FROM user WHERE email = ?";
    $stmtUser = mysqli_prepare($link, $sqlUser);
    mysqli_stmt_bind_param($stmtUser, "s", $email);
    mysqli_stmt_execute($stmtUser);
    $resultUser = mysqli_stmt_get_result($stmtUser);
    $user = mysqli_fetch_assoc($resultUser);
    $userID = $user['userID'];

    // Revised query to get screenshot counts by month for all users
    $sqlScreenshotCount = "SELECT DATE_FORMAT(dateCreated, '%Y-%m') AS month, COUNT(*) AS scshotCount
                           FROM imagerecognition
                           GROUP BY month
                           ORDER BY month";
    $stmtScreenshotCount = mysqli_prepare($link, $sqlScreenshotCount);
    mysqli_stmt_execute($stmtScreenshotCount);
    $resultScreenshotCount = mysqli_stmt_get_result($stmtScreenshotCount);

    // Set up an array for all months
    $all_months = [
        "January", "February", "March", "April", "May", "June", 
        "July", "August", "September", "October", "November", "December"
    ];

    $labels = [];
    $bills = [];
    $current_year = date("Y");
    for ($month = 1; $month <= 12; $month++) {
        $labels[] = $all_months[$month - 1] . " " . $current_year;
        $bills[] = 0;
    }

    // Update bills based on the result
    $screenshot_cost = 0.33;
    while ($row = mysqli_fetch_assoc($resultScreenshotCount)) {
        $month_year = explode("-", $row['month']);
        $month = intval($month_year[1]);
        $month_name = $all_months[$month - 1] . " " . $month_year[0];
        $index = array_search($month_name, $labels);
        if ($index !== false) {
            $bills[$index] = intval($row['scshotCount']) * $screenshot_cost;
        }
    }

    // Revised query to get video tag counts
    $sqlVideoTagCount = "SELECT tags, COUNT(*) AS tagCount
                         FROM video
                         GROUP BY tags";
    $stmtVideoTagCount = mysqli_prepare($link, $sqlVideoTagCount);
    mysqli_stmt_execute($stmtVideoTagCount);
    $resultVideoTagCount = mysqli_stmt_get_result($stmtVideoTagCount);

    $tags = [];
    $tagCounts = [];
    while ($row = mysqli_fetch_assoc($resultVideoTagCount)) {
        $tags[] = $row['tags'];
        $tagCounts[] = intval($row['tagCount']);
    }
?>

   <!-- ======= Header ======= -->
   <header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="index.html" class="logo d-flex align-items-center">
    <img src="assets/img/imageNarrator logo.png" alt="">
    <span class="d-none d-lg-block">IMAGE NARRATOR</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

<nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

        <li>
            <a class="nav-link nav-icon" href="https://chrome.google.com/webstore/detail/summary-for-google-with-c/cmnlolelipjlhfkhpohphpedmkfbobjc">
                <i class="bx bxl-google"></i>

            </a><!-- End chrome Icon -->
        </li>

        
        

        <li class="nav-item dropdown pe-3">

            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo htmlspecialchars($_SESSION['email']); ?></span>
            </a><!-- End Profile Iamge Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                <li class="dropdown-header">
                    <h6><?php echo htmlspecialchars($_SESSION['email']); ?></h6>
                    <span>user</span>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <a class="dropdown-item d-flex align-items-center" href="pages-profile.php">
                        <i class="bi bi-person"></i>
                        <span>My Profile</span>
                    </a>
                </li>
                
                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                        <i class "bi bi-question-circle"></i>
                        <span>Need Help?</span>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <a class="dropdown-item d-flex align-items-center" href="phpcontrol/logout.php">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Sign Out</span>
                    </a>
                </li>

            </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

    </ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link " href="#">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        
    </ul>
</aside><!-- End Sidebar-->

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Monthly Screenshot Bills</h5>
                        <div id="barChart"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card h-100">
                    <div class="card-body d-flex align-items-center justify-content-center">
                        <div>
                            <h5 class="card-title text-center">Video Tag Counts</h5>
                            <canvas id="pieChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <script>
        $(document).ready(function () {
            $('#monthScreenshotTable').DataTable();

            var bills = <?php echo json_encode($bills); ?>;
            
            var options = {
                series: [{
                    name: 'Bill ($)',
                    data: bills
                }],
                chart: {
                    type: 'bar',
                    height: 400
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '50%'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                xaxis: {
                    categories: <?php echo json_encode($labels); ?>
                }
            };

            var chart = new ApexCharts(document.querySelector("#barChart"), options);
            chart.render();
        });
    </script>


    <script>
        $(document).ready(function () {
            // Pie chart
            var ctx = document.getElementById("pieChart").getContext("2d");
            var pieChart = new Chart(ctx, {
                type: "pie",
                data: {
                    labels: <?php echo json_encode($tags); ?>,
                    datasets: [{
                        data: <?php echo json_encode($tagCounts); ?>,
                        backgroundColor: [
                            "#FF6384",
                            "#36A2EB",
                            "#FFCE56",
                            "#4BC0C0",
                            "#9966FF",
                            "#FF9F40",
                            "#FF6384"
                        ],
                    }],
                },
                options: {
                    responsive: false,
                    maintainAspectRatio: false,
                },
            });
        });
    </script>

    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>IMAGE NARRATOR</span></strong>. All Rights Reserved
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>Back to Top
    </a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>

</main>
</body>
</html>
