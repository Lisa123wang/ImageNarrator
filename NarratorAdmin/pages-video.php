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
                    <a class="nav-link nav-icon" href="https://chrome.google.com/webstore/detail/summary-for-google-with-c/cmnlolelipjlhfkhpohphpedmkfbobjc" aria-label="add our Google Chrome extension on Chrome Web Store">
                        <i class="bx bxl-google"></i>
                    </a><!-- End chrome Icon -->
                </li>

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown" aria-label="notification">
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

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown" aria-label="total reading hours for today">
                        <i class="bi bi-clock"></i>
                        <span class="badge bg-success badge-number">3.5</span>
                    </a><!-- End Messages Icon -->


                </li><!-- End Messages Nav -->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown" aria-label="account image and name">
                        <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">Image Narrator</span>
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
                                
                                <th>Action1</th>
                                <th>Action2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stmt = $pdo->prepare('SELECT videoTitle, videoSummary, tags, videoURL, duration, userID FROM video WHERE userID = :userId');
                            $stmt->execute(['userId' => 1]);
                            while ($row = $stmt->fetch()) {
                                echo "<tr>
                                    <td><a href='{$row['videoURL']}' target='_blank'>{$row['videoTitle']}</a></td>
                                    <td><div class='summary-cell'>{$row['videoSummary']}</div></td>
                                    <td>{$row['tags']}</td>
                                    
                                    <td>" . ($row['duration'] > 0 ? gmdate("i:s", $row['duration']) : 'N/A') . "</td>
                                    
                                    <td><button class='btn' aria-label='Edit'><i class='ri-pencil-line'></i></button></td>
                                    <td><button class='btn' aria-label='Delete'><i class='ri-delete-bin-6-line'></i></button></td>
                                </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                
            </div>
        </section>
    </main>

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
