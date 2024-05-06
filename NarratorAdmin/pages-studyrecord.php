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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
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
    $counts = [];
    $current_year = date("Y");
    for ($month = 1; $month <= 12; $month++) {
        $labels[] = $all_months[$month - 1] . " " . $current_year;
        $counts[] = 0;
    }

    // Update counts based on the result
    while ($row = mysqli_fetch_assoc($resultScreenshotCount)) {
        $month_year = explode("-", $row['month']);
        $month = intval($month_year[1]);
        $month_name = $all_months[$month - 1] . " " . $month_year[0];
        $index = array_search($month_name, $labels);
        if ($index !== false) {
            $counts[$index] = intval($row['scshotCount']);
        }
    }
?>
<?php
$link = mysqli_connect('localhost', 'root', '', 'narratordb_test1'); // Adjust database connection details

$sql = "SELECT tags FROM video"; // Adjust the table and column names accordingly
$result = mysqli_query($link, $sql);

$tagsCount = [
    'html/css' => 0,
    'python' => 0,
    'c' => 0,
    'c++' => 0,
    'c#' => 0,
    'javascript' => 0,
    'java' => 0
];

while ($row = mysqli_fetch_assoc($result)) {
    foreach ($tagsCount as $key => &$count) {
        if (strpos(strtolower($row['tags']), $key) !== false) {
            $count++;
        }
    }
}
?>

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
            <li class="nav-item dropdown">
                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-bell"></i>
                    <span class="badge bg-primary badge-number">1</span>
                </a><!-- End Notification Icon -->
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                    <li class="dropdown-header">
                        You have 1 new notifications
                        <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li><hr class="dropdown-divider"></li>
                    <li class="notification-item">
                        <i class="bi bi-info-circle text-primary"></i>
                        <div>
                            <h4>Dicta reprehenderit</h4>
                            <p>Quae dolorem earum veritatis oditseno</p>
                            <p>4 hrs. ago</p>
                        </div>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                </ul><!-- End Notification Dropdown Items -->
            </li><!-- End Notification Nav -->
            <li class="nav-item dropdown">
                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-clock"></i>
                    <span class="badge bg-success badge-number">3.5</span>
                </a><!-- End Messages Icon -->
            </li><!-- End Messages Nav -->
            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo htmlspecialchars($_SESSION['nickname']); ?></span>
                </a><!-- End Profile Iamge Icon -->
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6><?php echo htmlspecialchars($_SESSION['nickname']); ?></h6>
                        <span>user</span>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="pages-profile.php">
                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                            <i class="bi bi-question-circle"></i>
                            <span>Need Help?</span>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
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
        <li class="nav-heading"><font color="#333">Pages</font></li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-profile.php">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-video.php">
                <i class="bi bi-person"></i>
                <span>Videos</span>
            </a>
        </li><!-- End Video Page Nav -->
    </ul>
</aside><!-- End Sidebar-->

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
    </div>

    <!-- Number of Screenshots by Month Table -->
    <div style="width: 100%; background-color: white; border-radius: 10px; padding: 10px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        
    <div id="barChart"></div>

<script>
    $(document).ready(function () {
        $('#monthScreenshotTable').DataTable();

        var options = {
            series: [{
                name: 'Screenshots',
                data: <?php echo json_encode($counts); ?>
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

    </div>
    <div style="width: 100%; background-color: white; border-radius: 10px; padding: 10px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
    <canvas id="languageChart" width="400" height="400"></canvas>
<script>
var ctx = document.getElementById('languageChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['HTML/CSS', 'Python', 'C', 'C++', 'C#', 'JavaScript', 'Java'],
        datasets: [{
            label: 'Video Tags Distribution',
            data: [
                <?php echo $tagsCount['html/css']; ?>, 
                <?php echo $tagsCount['python']; ?>, 
                <?php echo $tagsCount['c']; ?>, 
                <?php echo $tagsCount['c++']; ?>, 
                <?php echo $tagsCount['c#']; ?>, 
                <?php echo $tagsCount['javascript']; ?>, 
                <?php echo $tagsCount['java']; ?>
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(201, 203, 207, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            }
        }
    }
});
</script>

    </div>
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
</body>
</html>
