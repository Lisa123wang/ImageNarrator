<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>IMAGE NARRATOR</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

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
  <style>
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            min-width: 400px;
            border-radius: 5px 5px 0 0;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0,0,0,0.15);
        }
        .data-table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
            font-weight: bold;
        }
        .data-table th,
        .data-table td {
            padding: 12px 15px;
        }
        .data-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .data-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .data-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }
    </style>

</head>
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

    // Revised query to get screenshot counts by date
    $sqlScreenshotCount = "SELECT dateCreated AS date, COUNT(*) AS scshotCount FROM imagerecognition WHERE userID = ? GROUP BY dateCreated ORDER BY dateCreated DESC";
    $stmtScreenshotCount = mysqli_prepare($link, $sqlScreenshotCount);
    mysqli_stmt_bind_param($stmtScreenshotCount, "i", $userID);
    mysqli_stmt_execute($stmtScreenshotCount);
    $resultScreenshotCount = mysqli_stmt_get_result($stmtScreenshotCount);
?>
<?php
// Database connection
$host = 'localhost';
$dbname = 'narratordb_test1';
$username = 'root';
$password = '';
$connection = mysqli_connect($host, $username, $password, $dbname);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$videoID = $_GET['videoID'] ?? 1; // Default videoID to 1 if not specified

// Query to fetch video title and URL based on videoID
$queryVideoInfo = "SELECT videoTitle, videoURL FROM video WHERE videoID = ?";
$stmtVideoInfo = mysqli_prepare($connection, $queryVideoInfo);

if ($stmtVideoInfo) {
    mysqli_stmt_bind_param($stmtVideoInfo, "i", $videoID);
    mysqli_stmt_execute($stmtVideoInfo);
    $resultVideoInfo = mysqli_stmt_get_result($stmtVideoInfo);
    $videoInfo = mysqli_fetch_assoc($resultVideoInfo);
    $videoTitle = $videoInfo['videoTitle'];
    $videoURL = $videoInfo['videoURL'];
    mysqli_stmt_close($stmtVideoInfo);
} else {
    $videoTitle = "Video";
    $videoURL = "#"; // Default to "#" if video info is not found
}

mysqli_close($connection);
?>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="#" class="logo d-flex align-items-center">
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
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="notification-item">
                        <i class="bi bi-info-circle text-primary"></i>
                        <div>
                            <h4>Dicta reprehenderit</h4>
                            <p>Quae dolorem earum veritatis oditseno</p>
                            <p>4 hrs. ago</p>
                        </div>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <!--
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>
            -->
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
                    <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo htmlspecialchars($_SESSION['nickname']);?></span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6><?php echo htmlspecialchars($_SESSION['nickname']);?></h6>
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
            <a class="nav-link  collapsed" href="pages-dashboard.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-profile.php">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link" href="pages-video.php">
                <i class="bi bi-person"></i>
                <span>Videos</span>
            </a>
        </li><!-- End Video Page Nav -->
        
</aside><!-- End Sidebar-->

<main id="main" class="main">

<div class="pagetitle">
    <nav>

    <ol class="breadcrumb">       
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item active">Videos</li>
        <li class="breadcrumb-item active"><?php echo htmlspecialchars($videoTitle); ?></li>
    </ol>
    </nav>
    <h1><a href="<?php echo htmlspecialchars($videoURL); ?>" target="_blank"><?php echo htmlspecialchars($videoTitle); ?></a></h1>
  <!-- Breadcrumb navigation -->
</div><!-- End Page Title -->

<!-- Image Recognition Section -->
<section class="image-recognition">
  <?php
  // Database connection
  $host = 'localhost';
  $dbname = 'narratordb_test1';
  $username = 'root';
  $password = '';
  $connection = mysqli_connect($host, $username, $password, $dbname);

  if (!$connection) {
      die("Connection failed: " . mysqli_connect_error());
  }

  $videoID = $_GET['videoID'] ?? 1; // Default videoID to 1 if not specified

  $query = "SELECT userID, videoID, videoTimestamp, OCRText, imagedescription, aiquestion, dateCreated FROM imagerecognition WHERE videoID = ?";
  $stmt = mysqli_prepare($connection, $query);

  if ($stmt) {
      mysqli_stmt_bind_param($stmt, "i", $videoID);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      if (mysqli_num_rows($result) > 0) {
          echo "<table class='data-table'>";
          echo "<thead><tr><th>Video Timestamp</th><th>OCR Text</th><th>Image Description</th><th>AI Question</th></tr></thead>";
          echo "<tbody>";
          while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              
              echo "<td>" . htmlspecialchars($row['videoTimestamp']) . "</td>";
              echo "<td>" . htmlspecialchars($row['OCRText']) . "</td>";
              echo "<td>" . htmlspecialchars($row['imagedescription']) . "</td>";
              echo "<td>" . htmlspecialchars($row['aiquestion']) . "</td>";
              
              echo "</tr>";
          }
          echo "</tbody></table>";
      } else {
          echo "<p>No data available for the specified video ID.</p>";
      }
      mysqli_stmt_close($stmt);
  } else {
      echo "Error preparing the statement: " . mysqli_error($connection);
  }

  mysqli_close($connection);
  ?>
</section><!-- End Image Recognition Section -->

</main><!-- End #main -->


  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>IMAGE NARRATOR</span></strong>. All Rights Reserved
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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