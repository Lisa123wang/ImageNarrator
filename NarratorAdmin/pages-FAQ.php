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

    // 使用 userID 查詢 profile表獲取使用者的個人資料
    //$sqlProfile = "SELECT * FROM profile WHERE userID = ?";
    //$stmtProfile = mysqli_prepare($link, $sqlProfile);
    //mysqli_stmt_bind_param($stmtProfile, "i", $userID);
    //mysqli_stmt_execute($stmtProfile);
    //$resultProfile = mysqli_stmt_get_result($stmtProfile);
    //$profileInfo = mysqli_fetch_assoc($resultProfile);

    // 现在 $profileInfo 包含了使用者的個人資料，可以在下面的 HTML 中使用

?>
<body>
    <!-- HTML content remains unchanged -->
    <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="pages-dashboard.php" class="logo d-flex align-items-center">
    <img src="assets/img/imageNarrator logo.png" alt="">
    <span class="d-none d-lg-block">IMAGE NARRATOR</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn" tabindex="0" role="button" aria-pressed="false"></i>

</div><!-- End Logo -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const toggleButton = document.querySelector('.toggle-sidebar-btn');

    toggleButton.addEventListener('click', function () {
        const isPressed = toggleButton.getAttribute('aria-pressed') === 'true';
        toggleButton.setAttribute('aria-pressed', !isPressed);
        // Add your sidebar toggle logic here
    });

    toggleButton.addEventListener('keydown', function (event) {
        if (event.key === 'Enter' || event.key === ' ') {
            event.preventDefault();
            toggleButton.click();
        }
    });
});

    </script>
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
            <a class="nav-link collapsed" href="pages-dashboard.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-video.php">
                <i class="bi bi-person"></i>
                <span>Videos</span>
            </a>
            <a class="nav-link  "  href="pages-FAQ.php">
                <i class="bi bi-person"></i>
                <span>Tutorial/FAQ 
                    <br>User terms</span>
            </a>
        </li><!-- End Video Page Nav -->
     
    
</aside><!-- End Sidebar-->
    <main id="main" class="main">
        <!-- Page title and Breadcrumb remain unchanged -->
        <div class="pagetitle">
          <h1>Installation Steps and User Guide</h1>

          <nav>

              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="pages-dashboard.php">Home</a></li>
                  <li class="breadcrumb-item ">Tutorial_FAQ_User terms</li>
                  <li class="breadcrumb-item active">Installation Steps and User Guide</li>
              </ol>

          </nav>
          <!-- End Page Title -->

      </div>
        <section class="section">
            <div class="card">
            <p>1. Open the Google Chrome browser.<br>
2. Visit the system website to register for an account.<br>
3. Navigate to the Chrome Web Store / our system’s website.<br>
4. Enter "Image Narrator" in the search box / click the <a href="https://chromewebstore.google.com/detail/glarity-%E4%BD%BF%E7%94%A8chatgpt4%E7%94%9F%E6%88%90%E6%91%98%E8%A6%81%E5%92%8C%E7%BF%BB%E8%AD%AF/cmnlolelipjlhfkhpohphpedmkfbobjc">[add to chrome]</a> link to find our extension.<br>
5. Click on "Add to Chrome" and follow the prompts to complete the installation.<br>
6. After installation, the extension icon will appear in the browser toolbar.<br>
7. Log in to the extension using your registered account.<br>
8. Open YouTube and play any instructional video.<br>
9. Use the shortcut key [ctrl+6] to take a screenshot of the video.<br>
10. The system will automatically recognize the information on the screen and provide feedback to the user.</p>
                    

                
            </div>
        </section>
        <br>
        <div class="pagetitle">
          <h1>FAQ</h1>

          <nav>

              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="pages-dashboard.php">Home</a></li>
                  <li class="breadcrumb-item ">Tutorial_FAQ_User terms</li>
                  <li class="breadcrumb-item active">FAQ</li>
              </ol>

          </nav>
          <!-- End Page Title -->

      </div>
        <section class="section">
            <div class="card">
            <div class="faq">
            <div class="problem">
            <h4>1: How do I add the extension?</h4>
            <p>Click <a href="https://chromewebstore.google.com/detail/glarity-%E4%BD%BF%E7%94%A8chatgpt4%E7%94%9F%E6%88%90%E6%91%98%E8%A6%81%E5%92%8C%E7%BF%BB%E8%AD%AF/cmnlolelipjlhfkhpohphpedmkfbobjc">[add to chrome]</a> here to initiate the process.</p>

            <h4>2: How do I use the extension?</h4>
            <p>After adding the extension, you can press [Ctrl+6] to take a screenshot, and press [Ctrl+Shift+S] to see the image recognition outcome. If you have further questions, press [Ctrl+Shift+Y] to ask about our assistance.</p>

            <h4>3: What features does the extension provide?</h4>
            <p>Our extension provides image recognition and AI assistance. You can refer to FAQ 2 to see the full tutorial.</p>

            <h4>4: Why can't I take a screenshot?</h4>
            <p>If you want to take a screenshot, you should use the account which you registered on our website to log in to the extension, then you can take screenshots and see image recognition results.</p>
        </div>

            <!-- You can add more problem entries here -->
        </div>
                    

                
            </div>
        </section>
        <br>
        <div class="pagetitle">
          <h1>User Terms and Conditions</h1>

          <nav>

              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="pages-dashboard.php">Home</a></li>
                  <li class="breadcrumb-item ">Tutorial_FAQ_User terms</li>
                  <li class="breadcrumb-item active">User Terms and Conditions</li>
              </ol>

          </nav>
          <!-- End Page Title -->

      </div>
        <section class="section">
            <div class="card">
            <div class="modal-body">
               
                <ul>
                    <li><strong>Copyright Statement</strong>
                        <ul>
                            <li>This website ("Website") contains content, including text, images, videos, trademarks, graphics, and software ("Content"). The Content is owned by the Website operator and its content providers, protected by Taiwanese and international copyright laws.</li>
                        </ul>
                    </li>
                    <li><strong>Copyright Protection</strong>
                        <ul>
                            <li>All rights are reserved by the Website operator. Without express written permission, you may not copy, modify, adapt, translate, publish, license, resell, create derivative works from, transmit, download, display, or distribute any part of the Content.</li>
                        </ul>
                    </li>
                    <li><strong>Authorized Use</strong>
                        <ul>
                            <li>You are granted a personal, non-exclusive, non-transferable, limited license to access, display, and use the Website and its Content for personal use. This does not permit any commercial use, derivative use, or data mining of the Website or its Content.</li>
                        </ul>
                    </li>
                    <li><strong>Unauthorized Use</strong>
                        <ul>
                            <li>Unauthorized use of the Website's Content may violate copyright, trademark, and other laws.</li>
                        </ul>
                    </li>
                    <li><strong>Disclaimer of Information</strong>
                        <ul>
                            <li>All information provided by this system, including text, images, audio, video, links, or other materials, is for reference only. We strive to ensure the information is accurate, but make no guarantees regarding its accuracy, timeliness, or completeness. The information may become outdated, and we do not commit to updating it. We advise against making significant decisions based solely on this information without further verification.</li>
                            <li>The system and its content providers will not be liable for any losses or damages arising from direct or indirect use or reliance on the system's information, including loss of profits, data, or other damages.</li>
                            <li>This disclaimer does not exclude or limit liability for death or personal injury resulting from negligence, fraud, or other liabilities that cannot be excluded or limited under applicable law.</li>
                        </ul>
                    </li>
                    <li><strong>Service Interruption and Termination Statement</strong>
                        <ul>
                            <li><strong>Service Interruption</strong>
                                <ul>
                                    <li>The service may be temporarily interrupted for maintenance, upgrades, emergency repairs, or due to force majeure (such as natural disasters, cyber attacks, or system failures). While we strive to maintain the service's stability and availability, we cannot guarantee uninterrupted service. For foreseeable interruptions, we will notify users in advance via website announcements, emails, or other communication channels. However, in emergencies, such notice may not be possible.</li>
                                </ul>
                            </li>
                            <li><strong>Service Termination</strong>
                                <ul>
                                    <li>We reserve the right to terminate a user's service access at any time for any reason, including but not limited to violations of these terms and conditions. Users wishing to terminate their accounts may stop using the service and notify us. Upon termination, the user's access will be revoked, and we may remove or delete the user's account information, data, and files.</li>
                                </ul>
                            </li>
                            <li><strong>Limitation of Liability</strong>
                                <ul>
                                    <li>We are not responsible for any direct or indirect losses resulting from service interruption, suspension, or termination. Users understand and agree that any data downloaded or obtained through this service is at their own discretion and risk, and they are solely responsible for any damage to their computer systems or data loss resulting from such downloads.</li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
                    

                
            </div>
        </section>
    </main>
    
    

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
    <!-- Initialize DataTables -->
   
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
