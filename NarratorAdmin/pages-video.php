<!DOCTYPE html>
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

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

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
    
    if (isset($_SESSION['email'])) {
        echo " (" . htmlspecialchars($_SESSION['email']) . ")";
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
?>
<body>
    <!-- Header -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="pages-dashboard.php" class="logo d-flex align-items-center">
                <img src="assets/img/imageNarrator logo.png" alt="">
                <span class="d-none d-lg-block">IMAGE NARRATOR</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>
        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li>
                    <a class="nav-link nav-icon" href="https://chrome.google.com/webstore/detail/summary-for-google-with-c/cmnlolelipjlhfkhpohphpedmkfbobjc">
                        <i class="bx bxl-google"></i>
                    </a>
                </li>
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo htmlspecialchars($_SESSION['email']); ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6><?php echo htmlspecialchars($_SESSION['email']); ?></h6>
                            <span>user</span>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item d-flex align-items-center" href="pages-faq.html"><i class="bi bi-question-circle"></i><span>Need Help?</span></a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item d-flex align-items-center" href="phpcontrol/logout.php"><i class="bi bi-box-arrow-right"></i><span>Sign Out</span></a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
    <!-- Sidebar -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item"><a class="nav-link collapsed" href="pages-dashboard.php"><i class="bi bi-grid"></i><span>Dashboard</span></a></li>
            <li class="nav-heading">Pages</li>
            <li class="nav-item">
                <a class="nav-link" href="pages-video.php"><i class="bi bi-person"></i><span>video</span></a>
            </li>
        </ul>
    </aside>
    <!-- Main Content -->
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Video List</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="pages-dashboard.php">Home</a></li>
                    <li class="breadcrumb-item active">Video</li>
                </ol>
            </nav>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">video list</h5>
                            <!-- Table with video list -->
                            <div class="dt-container">
                                <table id="dataTable" class="display">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Summary</th>
                                            <th>Tags</th>
                                            <th>Duration</th>
                                            <th>Last Viewed Date</th>
                                            <th>Recognition Page</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $stmt = $pdo->prepare('
                                            SELECT v.videoID, v.videoTitle, v.videoSummary, v.tags, v.videoURL, v.duration, v.userID, ir.latestDate
                                            FROM video v
                                            LEFT JOIN (
                                                SELECT videoID, MAX(dateCreated) AS latestDate
                                                FROM imagerecognition
                                                GROUP BY videoID
                                            ) ir ON v.videoID = ir.videoID
                                            WHERE v.userID = :userId
                                            ORDER BY ir.latestDate DESC, v.videoID DESC;
                                        ');
                                        $stmt->execute(['userId' => $userID]);
                                        while ($row = $stmt->fetch()) {
                                            $latestDate = $row['latestDate'] ? date('Y-m-d', strtotime($row['latestDate'])) : 'N/A';
                                            echo "<tr>
                                                <td><a href='{$row['videoURL']}' target='_blank'>{$row['videoTitle']}</a></td>
                                                <td><div class='summary-cell'>{$row['videoSummary']}</div></td>
                                                <td>{$row['tags']}</td>
                                                <td>" . ($row['duration'] > 0 ? gmdate("i:s", $row['duration']) : 'N/A') . "</td>
                                                <td>{$latestDate}</td>
                                                <td><button class='btn' aria-label='Go To Recognition Page' onclick='goToRecognition(\"{$row['videoID']}\")'><i class='bi bi-arrow-right-square'></i></button></td>
                                            </tr>";
                                        }
                                        ?>
                                    </tbody>


                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <!-- Initialize DataTable -->
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "order": [[ 5, "desc" ]] // Order by the 6th column (latestDate)
            });
        });
    </script>
    <!-- Custom Functions -->
    <script>
        function deleteVideo(videoID) {
            if (confirm('Are you sure you want to delete this video?')) {
                // Send AJAX request to delete video
                $.ajax({
                    url: 'delete_video.php',
                    method: 'POST',
                    data: { videoID: videoID },
                    success: function(response) {
                        // Reload the page after successful deletion
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error('Failed to delete video:', error);
                    }
                });
            }
        }

        function goToRecognition(videoID) {
            window.location.href = 'recognition_page.php?videoID=' + videoID;
        }
    </script>
</body>
</html>
