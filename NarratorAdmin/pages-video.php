﻿<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.css">
    <!-- Custom CSS for DataTables container -->
    <style>
        div.dt-container {
            width: 100%;
            margin: 0 auto;
        }
        .summary-cell {
            max-width: 150px; /* Maximum width for the summary column */
            overflow-x: auto; /* Enable horizontal scrolling */
            white-space: nowrap; /* Keep content on a single line */
            display: block; /* Block display to allow width and overflow styling */
        }
    </style>
    <title>IMAGE NARRATOR</title>
    <!-- Additional meta tags and links remain unchanged -->

    <!-- Initialize Database Connection -->
    <?php
    $host = 'localhost'; // or other host
    $db = 'narratordb_test1';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
    ?>
</head>
<?php
    session_start();

    $link = mysqli_connect('localhost', 'root', '', 'narratordb_test1');

    if(!isset($_SESSION['email'])) {
        // 如果未設置 email，重定向到登入頁面
        header("Location: pages-login.php");
        exit;
    }

    // 從這裡開始，用戶已經登入
    // 你可以從 $_SESSION 變量中取得用戶名等信息來顯示
    echo "welcome, " . htmlspecialchars($_SESSION['email']);
    
    if (isset($_SESSION['nickname'])) {
        echo " (" . htmlspecialchars($_SESSION['nickname']) . ")";
    }

    // 根據 email 獲取 userID
    $email = $_SESSION['email'];
    $sqlUser = "SELECT userID FROM user WHERE email = ?";
    $stmtUser = mysqli_prepare($link, $sqlUser);
    mysqli_stmt_bind_param($stmtUser, "s", $email);
    mysqli_stmt_execute($stmtUser);
    $resultUser = mysqli_stmt_get_result($stmtUser);
    $user = mysqli_fetch_assoc($resultUser);
    $userID = $user['userID'];

    // 使用 userID 查詢 profile表獲取使用者的個人資料
    $sqlProfile = "SELECT * FROM profile WHERE userID = ?";
    $stmtProfile = mysqli_prepare($link, $sqlProfile);
    mysqli_stmt_bind_param($stmtProfile, "i", $userID);
    mysqli_stmt_execute($stmtProfile);
    $resultProfile = mysqli_stmt_get_result($stmtProfile);
    $profileInfo = mysqli_fetch_assoc($resultProfile);

    // 现在 $profileInfo 包含了使用者的個人資料，可以在下面的 HTML 中使用

?>
<body>
    <!-- HTML content remains unchanged -->
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
                <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo htmlspecialchars($profileInfo['nickname']);?></span>
            </a><!-- End Profile Iamge Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                <li class="dropdown-header">
                    <h6><?php echo htmlspecialchars($profileInfo['nickname']);?></h6>
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
            <a class="nav-link collapsed" href="pages-dashboard.html">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-profile.html">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link" href="pages-video.html">
                <i class="bi bi-person"></i>
                <span>Videos</span>
            </a>
        </li><!-- End Video Page Nav -->
     
    
</aside><!-- End Sidebar-->
    <main id="main" class="main">
        <!-- Page title and Breadcrumb remain unchanged -->
        <div class="pagetitle">
          <h1>Videos</h1>

          <nav>

              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="pages-dashboard.html">Home</a></li>
                  <li class="breadcrumb-item active">Videos</li>
              </ol>

          </nav>
          <!-- End Page Title -->

      </div>
        <section class="section">
            <div class="card">
                
                    <!-- DataTable HTML -->
<table id="example" class="display nowrap" style="width:100%">
    <thead>
        <tr>
            <th>Title</th>
            <th>Summary</th>
            <th>Tags</th>
            <th>Duration</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>Recognition</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stmt = $pdo->prepare('SELECT videoID, videoTitle, videoSummary, tags, videoURL, duration, userID FROM video WHERE userID = :userId');
        $stmt->execute(['userId' => $userID]);
        while ($row = $stmt->fetch()) {
            echo "<tr>
                <td><a href='{$row['videoURL']}' target='_blank'>{$row['videoTitle']}</a></td>
                <td><div class='summary-cell'>{$row['videoSummary']}</div></td>
                <td>{$row['tags']}</td>
                <td>" . ($row['duration'] > 0 ? gmdate("i:s", $row['duration']) : 'N/A') . "</td>
                <td><button class='btn' aria-label='Edit'><i class='ri-pencil-line'></i></button></td>
                <td><button class='btn' aria-label='Delete' onclick='deleteVideo(\"{$row['videoID']}\")'><i class='ri-delete-bin-6-line'></i></button></td>
                <td><button class='btn' aria-label='Go To Recognition Page' onclick='window.location.href=\"recognition_test.html\";'><i class='bi bi-arrow-right-square'></i></button></td>
            </tr>";
        }
        ?>
    </tbody>
</table>

                
            </div>
        </section>
    </main>
    <script>
        function deleteVideo(videoID) {
        console.log("Attempting to delete video with ID:", videoID); // Useful for debugging
        if(confirm('Are you sure you want to delete this video?')) {
            fetch('phpcontrol/delete_video.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'videoID=' + encodeURIComponent(videoID)
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);  // Alert the user about the result
                
            })
            
        }
        window.location.reload();
    }

        </script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
    <!-- Initialize DataTables -->
    <script>
        $(document).ready(function () {
            $('#example').DataTable({ // Use '#' for ID selectors with jQuery
                scrollX: true
            });
        });

    </script>
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
