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
    
    if (isset($_SESSION['email'])) {
        echo " (" . htmlspecialchars($_SESSION['email']) . ")";
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
    //bill
    $bills = [];
    $current_year = date("Y");
    for ($month = 1; $month <= 12; $month++) {
        $labels[] = $all_months[$month - 1] . " " . $current_year;
        $bills[] = 0;
    }

    // Update bills based on the result
    $screenshot_cost = 1.3;
    while ($row = mysqli_fetch_assoc($resultScreenshotCount)) {
        $month_year = explode("-", $row['month']);
        $month = intval($month_year[1]);
        $month_name = $all_months[$month - 1] . " " . $month_year[0];
        $index = array_search($month_name, $labels);
        if ($index !== false) {
            $bills[$index] = round(intval($row['scshotCount']) * $screenshot_cost, 2);
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
    $sqlTotalBill = "SELECT COUNT(*) AS totalScreenshotCount FROM imagerecognition";
    $resultTotalBill = mysqli_query($link, $sqlTotalBill);
    $rowTotalBill = mysqli_fetch_assoc($resultTotalBill);
    $totalBill = $rowTotalBill['totalScreenshotCount'] * $screenshot_cost;

    // User count calculation
    $sqlUserCount = "SELECT COUNT(*) AS userCount FROM user WHERE role = 'user'";
    $resultUserCount = mysqli_query($link, $sqlUserCount);
    $rowUserCount = mysqli_fetch_assoc($resultUserCount);
    $userCount = $rowUserCount['userCount'];

    // Today's date
    $today = date("Y-m-d");

    // Query to get the count of users created today
    $sqlUserCountToday = "SELECT COUNT(*) AS userCountToday FROM user WHERE DATE(dateCreated) = ?";
    $stmtUserCountToday = mysqli_prepare($link, $sqlUserCountToday);
    mysqli_stmt_bind_param($stmtUserCountToday, "s", $today);
    mysqli_stmt_execute($stmtUserCountToday);
    $resultUserCountToday = mysqli_stmt_get_result($stmtUserCountToday);
    $rowUserCountToday = mysqli_fetch_assoc($resultUserCountToday);
    $userCountToday = $rowUserCountToday['userCountToday'];

    // Current date in the format required by the SQL query
    $today = date("Y-m-d");

    // SQL query to fetch the number of screenshots per hour for today
    $sqlTodayBill = "
        SELECT HOUR(dateCreated) as hour, COUNT(*) as scshotCount
        FROM imagerecognition
        WHERE date(dateCreated) = ?
        GROUP BY HOUR(dateCreated)
        ORDER BY HOUR(dateCreated)";

    $stmtTodayBill = mysqli_prepare($link, $sqlTodayBill);
    mysqli_stmt_bind_param($stmtTodayBill, "s", $today);
    mysqli_stmt_execute($stmtTodayBill);
    $resultTodayBill = mysqli_stmt_get_result($stmtTodayBill);

    $hourlyBills = array_fill(0, 24, 0); // Initialize array to hold bills for 24 hours

    while ($row = mysqli_fetch_assoc($resultTodayBill)) {
        $hour = intval($row['hour']);
        $count = intval($row['scshotCount']);
        $hourlyBills[$hour] = round($count * $screenshot_cost, 2); // Assuming $screenshot_cost is defined
    }

    $hourLabels = [];
    for ($i = 0; $i < 24; $i++) {
        $hourLabels[] = str_pad($i, 2, '0', STR_PAD_LEFT) . ":00"; // Format labels as 00:00, 01:00, etc.
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

       

        
        

        <li class="nav-item dropdown pe-3">

            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo htmlspecialchars($_SESSION['email']); ?></span>
            </a><!-- End Profile Iamge Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                <li class="dropdown-header">
                    <h6><?php echo htmlspecialchars($_SESSION['email']); ?></h6>
                    <span>admin</span>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
      
                <li>
                    <hr class="dropdown-divider">
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
            <a class="nav-link " href="pages-members.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-user.php">
                <i class="bi bi-person"></i>
                <span>User</span>
            </a>
        </li><!-- End User Nav -->
        <li class="nav-item">
    <a class="nav-link collapsed" href="#">
        <i class="bi bi-currency-dollar"></i>
        <span style="font-size: 1.2em; display: inline-block; width: 100px; height: 100px; text-align: center; line-height: 100px;">Total Bill:</span> 
        <br>
        <span style="font-size: 2em; display: inline-block; width: 100px; height: 100px; text-align: center; line-height: 100px;"><?php echo "$" . number_format($totalBill, 2); ?></span>
    </a>
</li><!-- End Total Bill Nav -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#">
        <i class="bi bi-people-fill"></i>
        <span style="font-size: 1.2em; display: inline-block; width: 100px; height: 100px; text-align: center; line-height: 100px;">Total User:</span> 
        <br>
        <span style="font-size: 2em; display: inline-block; width: 100px; height: 100px; text-align: center; line-height: 100px;"><?php echo $userCount; ?></span>
    </a>
</li>




    </ul>
</aside><!-- End Sidebar-->

<main id="main" class="main">
    <!--
    <div class="pagetitle">
        <h1>Dashboard</h1>
    </div>
    -->
    <!-- Inside the <section> element, above the row containing the bar chart and pie chart -->
    <section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3>Today Increase <span style="color:red;"><?php echo $userCountToday; ?></span> users</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Line chart row for today's bill -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Bill for Today</h5>
                    <div style="width: 100%; overflow-x: auto;">
                        <canvas id="lineChart" style="min-width: 800px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
  <script>
    $(document).ready(function() {
        var hourlyBills = <?php echo json_encode($hourlyBills); ?>;
        var hourLabels = <?php echo json_encode($hourLabels); ?>;

        var ctxLine = document.getElementById("lineChart").getContext("2d");
        var lineChart = new Chart(ctxLine, {
            type: "line",
            data: {
                labels: hourLabels,
                datasets: [{
                    label: "Today's Bill ($)",
                    data: hourlyBills,
                    borderColor: "rgba(54, 162, 235, 1)",
                    backgroundColor: "rgba(54, 162, 235, 0.5)"
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                responsive: true,
                maintainAspectRatio: false
            }
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
 
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>


</main>
</body>
</html>
