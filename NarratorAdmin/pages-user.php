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

    // Revised query to fetch user data with role 'user' only
    $sqlUserData = "SELECT userID, email, password FROM user WHERE role = 'user'";
    $resultUserData = mysqli_query($link, $sqlUserData);
    $userData = [];
    while ($row = mysqli_fetch_assoc($resultUserData)) {
        $userData[] = $row;
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
    $screenshot_cost = 1.3;
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
    $sqlTotalBill = "SELECT COUNT(*) AS totalScreenshotCount FROM imagerecognition";
    $resultTotalBill = mysqli_query($link, $sqlTotalBill);
    $rowTotalBill = mysqli_fetch_assoc($resultTotalBill);
    $totalBill = $rowTotalBill['totalScreenshotCount'] * $screenshot_cost;

    // User count calculation
    $sqlUserCount = "SELECT COUNT(*) AS userCount FROM user WHERE role = 'user'";
    $resultUserCount = mysqli_query($link, $sqlUserCount);
    $rowUserCount = mysqli_fetch_assoc($resultUserCount);
    $userCount = $rowUserCount['userCount'];
    $sqlUserData = "
    SELECT user.userID, user.email, user.password, COALESCE(COUNT(imagerecognition.userID) * 1.3, 0) AS bill
    FROM user
    LEFT JOIN imagerecognition ON user.userID = imagerecognition.userID
    WHERE user.role = 'user'
    GROUP BY user.userID, user.email, user.password";
    $resultUserData = mysqli_query($link, $sqlUserData);
    $userData = [];
    while ($row = mysqli_fetch_assoc($resultUserData)) {
        $userData[] = $row;
    }
    // Determine the user with the highest bill
    $highestBillUser = null;
    foreach ($userData as $user) {
        if ($highestBillUser === null || $user['bill'] > $highestBillUser['bill']) {
            $highestBillUser = $user;
        }
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
            <a class="nav-link collapsed" href="pages-members.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link " href="pages-user.php">
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
        <span style="font-size: 1.2em; display: inline-block; width: 100px; height: 100px; text-align: center; line-height: 100px;">Users:</span> 
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

    <div style="width: 100%; background-color: white; border-radius: 10px; padding: 10px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
    <h3>Number 1 User: <?php echo htmlspecialchars($highestBillUser['email']); ?> with bill $<?php echo number_format($highestBillUser['bill'], 2); ?></h3>
    <table id="userTable" class="display">
        <thead>
            <tr>
                <th>Email</th>
                <th>Password</th>
                <th>Bill</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($userData as $user) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($user['email']) . "</td>";
                    echo "<td>" . htmlspecialchars($user['password']) . "</td>";
                    echo "<td>" . htmlspecialchars(number_format($user['bill'], 2)) . "</td>";
                    echo "<td><button class='btn' aria-label='Delete' onclick='deleteUser(\"{$user['userID']}\")'><i class='ri-delete-bin-6-line'></i></button></td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
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

    <script>
        $(document).ready(function() {
            $('#userTable').DataTable();
        });

        function deleteUser(userID) {
            if (confirm("Are you sure you want to delete this user?")) {
                // Send an AJAX request to delete the user
                $.ajax({
                    url: 'delete_user.php',
                    type: 'POST',
                    data: { id: userID },
                    success: function(response) {
                        // Reload the table after deletion
                        $('#userTable').DataTable().ajax.reload();
                    },
                    error: function(error) {
                        console.error("Error deleting user:", error);
                    }
                });
            }
        }
    </script>
</body>
</html>
