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

    <!-- =======================================================
    * Template Name: NiceAdmin
    * Updated: Jan 29 2024 with Bootstrap v5.3.2
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->

</head>

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

    // Revised query to get screenshot counts by date
        $sqlScreenshotCount = "SELECT DATE(dateCreated) AS date, COUNT(*) AS scshotCount FROM imagerecognition WHERE userID = ? GROUP BY DATE(dateCreated) ORDER BY DATE(dateCreated) DESC";
        $stmtScreenshotCount = mysqli_prepare($link, $sqlScreenshotCount);
        mysqli_stmt_bind_param($stmtScreenshotCount, "i", $userID);
        mysqli_stmt_execute($stmtScreenshotCount);
        $resultScreenshotCount = mysqli_stmt_get_result($stmtScreenshotCount);

?>

<body>
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
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                        <i class="bi bi-question-circle"></i>
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
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="#">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-heading"><font color="#333">Pages</li>

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

            <nav>

                <ol class="breadcrumb">       
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
            
            <p>
                Using AI technology combined with image recognition and video content analysis,
                we provide a barrier-free and personalized online learning experience for visually impaired individuals.
                Click on <a href="https://chromewebstore.google.com/detail/glarity-%E4%BD%BF%E7%94%A8chatgpt4%E7%94%9F%E6%88%90%E6%91%98%E8%A6%81%E5%92%8C%E7%BF%BB%E8%AD%AF/cmnlolelipjlhfkhpohphpedmkfbobjc">[add to chrome]</a> to initiate the process.
            </p>
        </div>
        <!-- Add this HTML block where you want the table to appear -->
        <!-- Add this HTML block where you want the table to appear -->
        <div style="width: 100%; background-color: white; border-radius: 10px; padding: 10px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
            <h5><b>Recomendation Videos</b></h5>
            <table id="recVideoTable" class="display" style="width: 100%;">
                
                <tbody>
                    <?php
                        // Modify the PHP code to fetch data from the recvideo table
                        $sqlRecVideo = "SELECT recTitle, recURL, userID FROM recvideo WHERE userID = ?";
                        $stmtRecVideo = mysqli_prepare($link, $sqlRecVideo);
                        mysqli_stmt_bind_param($stmtRecVideo, "i", $userID);
                        mysqli_stmt_execute($stmtRecVideo);
                        $resultRecVideo = mysqli_stmt_get_result($stmtRecVideo);
                        while ($rowRecVideo = mysqli_fetch_assoc($resultRecVideo)) {
                            echo "<tr>";
                            // Combine title and URL and display them as a link
                            echo "<td><a href='" . htmlspecialchars($rowRecVideo['recURL']) . "'>" . htmlspecialchars($rowRecVideo['recTitle']) . "</a></td>";
                            
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>


        <!-- Display the screenshot count table -->
        <div style="display: flex; justify-content: space-between;">
            <div style="width: 100%; background-color: white; border-radius: 10px; padding: 10px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                <h5><b>Total Daily Screenshot Count</b></h5>
                <table id="screenshotTable" class="display" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Count</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($rowScshot = mysqli_fetch_assoc($resultScreenshotCount)) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($rowScshot['date']) . "</td>";
                                echo "<td>" . htmlspecialchars($rowScshot['scshotCount']) . "</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script>
        $(document).ready(function () {
            // Initialize DataTable
            $('#screenshotTable').DataTable();
        });
    </script>

<script>
        $(document).ready(function () {
            // Initialize DataTable for the Right Table
            $('#subjectsTable').DataTable();
        });
        $(document).ready(function () {
            // Initialize DataTable for the Right Table
            $('#subjectsTable2').DataTable();
        });
    </script>
    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>IMAGE NARRATOR</span></strong>. All Rights Reserved
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i>Back to Top</a>

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
