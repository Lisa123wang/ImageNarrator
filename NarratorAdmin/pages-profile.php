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
            <a class="nav-link" href="pages-profile.php">
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
        
</aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
       <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="pages-dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-8">
          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered">
                    <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                    </li>
                </ul>
                <div class="tab-content pt-2">
                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                        <!-- Profile Edit Form -->
                        <form action="phpcontrol/update-profile.php" method="post">

                        <div class="row mb-3">
                                <label for="nickname" class="col-md-4 col-lg-3 col-form-label">Nick Name</label>
                                <div class="col-md-8 col-lg-9">
                                <input name="nickname" type="text" class="form-control" id="nickname" value="<?php echo htmlspecialchars($profileInfo['nickname']); ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                <div class="col-md-8 col-lg-9">
                                <input name="email" type="email" class="form-control" id="Email" value="<?php echo htmlspecialchars($email); ?>" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="gender" class="col-md-4 col-lg-3 col-form-label">Gender</label>
                                <div class="col-md-8 col-lg-9">
                                        <select name="gender" class="form-control" id="gender">
                                            <option value="Male" <?php echo ($profileInfo['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                                            <option value="Female" <?php echo ($profileInfo['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                                            <option value="Other" <?php echo ($profileInfo['gender'] == 'Other') ? 'selected' : ''; ?>>Other</option>
                                        </select>
                                    </div>
                            </div>

                            <div class="row mb-3">
                                <label for="education" class="col-md-4 col-lg-3 col-form-label">Education</label>
                                <div class="col-md-8 col-lg-9">
                                        <select name="education" class="form-control" id="education">
                                            <option value="High School" <?php echo ($profileInfo['education'] == 'High School') ? 'selected' : ''; ?>>High School</option>
                                            <option value="Bachelor" <?php echo ($profileInfo['education'] == 'Bachelor') ? 'selected' : ''; ?>>Bachelor's Degree</option>
                                            <option value="Master" <?php echo ($profileInfo['education'] == 'Master') ? 'selected' : ''; ?>>Master's Degree</option>
                                            <option value="PhD" <?php echo ($profileInfo['education'] == 'PhD') ? 'selected' : ''; ?>>PhD or higher</option>
                                        </select>
                                    </div>
                            </div>

                            <div class="row mb-3">
                                <label for="visualImp_LV" class="col-md-4 col-lg-3 col-form-label">Level Of Visual Impairment</label>
                                <div class="col-md-8 col-lg-9">
                                    <select name="visualImp_LV" class="form-control" id="visualImp_LV">
                                        <option value="Normal Vision" <?php echo ($profileInfo['visualImp_LV'] == 'Normal Vision') ? 'selected' : ''; ?>>Normal Vision</option>
                                        <option value="Moderate Visual Impairment" <?php echo ($profileInfo['visualImp_LV'] == 'Moderate Visual Impairment') ? 'selected' : ''; ?>>Moderate Visual Impairment</option>
                                        <option value="Blindness" <?php echo ($profileInfo['visualImp_LV'] == 'Blindness') ? 'selected' : ''; ?>>Blindness</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                                <div class="col-md-8 col-lg-9">
                                    
                                    <select name="country" class="form-control" id="country">
                                        <option value="Afghanistan"<?php echo ($profileInfo['country'] == 'Afghanistan') ? 'selected' : ''; ?>>Afghanistan</option>
                                        <option value="Argentina" <?php echo ($profileInfo['country'] == 'Argentina') ? 'selected' : ''; ?>>Argentina</option>
                                        <option value="Armenia" <?php echo ($profileInfo['country'] == 'Armenia') ? 'selected' : ''; ?>>Armenia</option>
                                        <option value="Aruba" <?php echo ($profileInfo['country'] == 'Aruba') ? 'selected' : ''; ?>>Aruba</option>
                                        <option value="Australia" <?php echo ($profileInfo['country'] == 'Australia') ? 'selected' : ''; ?>>Australia</option>
                                        <option value="Austria" <?php echo ($profileInfo['country'] == 'Austria') ? 'selected' : ''; ?>>Austria</option>
                                        <option value="Azerbaijan" <?php echo ($profileInfo['country'] == 'Azerbaijan') ? 'selected' : ''; ?>>Azerbaijan</option>
                                        <option value="Bahamas" <?php echo ($profileInfo['country'] == 'Bahamas') ? 'selected' : ''; ?>>Bahamas</option>
                                        <option value="Bahrain" <?php echo ($profileInfo['country'] == 'Bahrain') ? 'selected' : ''; ?>>Bahrain</option>
                                        <option value="Brazil" <?php echo ($profileInfo['country'] == 'Brazil') ? 'selected' : ''; ?>>Brazil</option>
                                        <option value="British Indian Ocean Territory" <?php echo ($profileInfo['country'] == 'British Indian Ocean Territory') ? 'selected' : ''; ?>>British Indian Ocean Territory</option>
                                        <option value="Brunei Darussalam" <?php echo ($profileInfo['country'] == 'Brunei Darussalam') ? 'selected' : ''; ?>>Brunei Darussalam</option>
                                        <option value="Bulgaria" <?php echo ($profileInfo['country'] == 'Bulgaria') ? 'selected' : ''; ?>>Bulgaria</option>
                                        <option value="Burkina Faso" <?php echo ($profileInfo['country'] == 'Burkina Faso') ? 'selected' : ''; ?>>Burkina Faso</option>
                                        <option value="Cameroon" <?php echo ($profileInfo['country'] == 'Cameroon') ? 'selected' : ''; ?>>Cameroon</option>
                                        <option value="Canada" <?php echo ($profileInfo['country'] == 'Canada') ? 'selected' : ''; ?>>Canada</option>
                                        <option value="Cape Verde" <?php echo ($profileInfo['country'] == 'Cape Verde') ? 'selected' : ''; ?>>Cape Verde</option>
                                        <option value="Central African Republic" <?php echo ($profileInfo['country'] == 'Central African Republic') ? 'selected' : ''; ?>>Central African Republic</option>
                                        <option value="Chile" <?php echo ($profileInfo['country'] == 'Chile') ? 'selected' : ''; ?>>Chile</option>
                                        <option value="China" <?php echo ($profileInfo['country'] == 'China') ? 'selected' : ''; ?>>China</option>
                                        <option value="Christmas Island" <?php echo ($profileInfo['country'] == 'Christmas Island') ? 'selected' : ''; ?>>Christmas Island</option>
                                        <option value="Colombia" <?php echo ($profileInfo['country'] == 'Colombia') ? 'selected' : ''; ?>>Colombia</option>
                                        <option value="Comoros" <?php echo ($profileInfo['country'] == 'Comoros') ? 'selected' : ''; ?>>Comoros</option>
                                        <option value="Congo" <?php echo ($profileInfo['country'] == 'Congo') ? 'selected' : ''; ?>>Congo</option>on>
                                        <option value="Cyprus"<?php echo ($profileInfo['country'] == 'Cyprus') ? 'selected' : ''; ?>>Cyprus</option>
                                        <option value="Czech Republic" <?php echo ($profileInfo['country'] == 'Czech Republic') ? 'selected' : ''; ?>>Czech Republic</option>
                                        <option value="Falkland Islands (Malvinas)" <?php echo ($profileInfo['country'] == 'Falkland Islands (Malvinas)') ? 'selected' : ''; ?>>Falkland Islands (Malvinas)</option>
                                        <option value="Faroe Islands" <?php echo ($profileInfo['country'] == 'Faroe Islands') ? 'selected' : ''; ?>>Faroe Islands</option>
                                        <option value="France" <?php echo ($profileInfo['country'] == 'France') ? 'selected' : ''; ?>>France</option>
                                        <option value="French Guiana"<?php echo ($profileInfo['country'] == 'French Guiana') ? 'selected' : ''; ?>>French Guiana</option>
                                        <option value="French Polynesia"<?php echo ($profileInfo['country'] == 'French Polynesia') ? 'selected' : ''; ?>>French Polynesia</option>
                                        <option value="French Southern Territories"<?php echo ($profileInfo['country'] == 'French Southern Territories') ? 'selected' : ''; ?>>French Southern Territories</option>
                                        <option value="Gambia"<?php echo ($profileInfo['country'] == 'Gambia') ? 'selected' : ''; ?>>Gambia</option>
                                        <option value="Georgia"<?php echo ($profileInfo['country'] == 'Georgia') ? 'selected' : ''; ?>>Georgia</option>
                                        <option value="Germany"<?php echo ($profileInfo['country'] == 'Germany') ? 'selected' : ''; ?>>Germany</option>
                                        <option value="Ghana"<?php echo ($profileInfo['country'] == 'Ghana') ? 'selected' : ''; ?>>Ghana</option>
                                        <option value="Guinea-Bissau" <?php echo ($profileInfo['country'] == 'Guinea-Bissau') ? 'selected' : ''; ?>>Guinea-Bissau</option>
                                        <option value="Guyana"<?php echo ($profileInfo['country'] == 'Guyana') ? 'selected' : ''; ?>>Guyana</option>
                                        <option value="Haiti"<?php echo ($profileInfo['country'] == 'Haiti') ? 'selected' : ''; ?>>Haiti</option>
                                        <option value="Heard Island and Mcdonald Islands"<?php echo ($profileInfo['country'] == 'Heard Island and Mcdonald Islands') ? 'selected' : ''; ?>>Heard Island and Mcdonald Islands</option>
                                        <option value="Holy See (Vatican City State)"<?php echo ($profileInfo['country'] == 'Holy See (Vatican City State)') ? 'selected' : ''; ?>>Holy See (Vatican City State)</option>
                                        <option value="Hong Kong"<?php echo ($profileInfo['country'] == 'Hong Kong') ? 'selected' : ''; ?>>Hong Kong</option>
                                        <option value="Iceland"<?php echo ($profileInfo['country'] == 'Iceland') ? 'selected' : ''; ?>>Iceland</option>
                                        <option value="India"<?php echo ($profileInfo['country'] == 'India') ? 'selected' : ''; ?>>India</option>
                                        <option value="Indonesia"<?php echo ($profileInfo['country'] == 'Indonesia') ? 'selected' : ''; ?>>Indonesia</option>
                                        <option value="Iran, Islamic Republic of"<?php echo ($profileInfo['country'] == 'Iran, Islamic Republic of') ? 'selected' : ''; ?>>Iran, Islamic Republic of</option>
                                        <option value="Iraq"<?php echo ($profileInfo['country'] == 'Iraq') ? 'selected' : ''; ?>>Iraq</option>
                                        <option value="Ireland"<?php echo ($profileInfo['country'] == 'Ireland') ? 'selected' : ''; ?>>Ireland</option>
                                        <option value="Isle of Man"<?php echo ($profileInfo['country'] == 'Isle of Man') ? 'selected' : ''; ?>>Isle of Man</option>
                                        <option value="Israel"<?php echo ($profileInfo['country'] == 'Israel') ? 'selected' : ''; ?>>Israel</option>
                                        <option value="Italy"<?php echo ($profileInfo['country'] == 'Italy') ? 'selected' : ''; ?>>Italy</option>
                                        <option value="Jamaica"<?php echo ($profileInfo['country'] == 'Jamaica') ? 'selected' : ''; ?>>Jamaica</option>
                                        <option value="Japan"<?php echo ($profileInfo['country'] == 'Japan') ? 'selected' : ''; ?>>Japan</option>
                                        <option value="Marshall Islands"<?php echo ($profileInfo['country'] == 'Marshall Islands') ? 'selected' : ''; ?>>Marshall Islands</option>
                                        <option value="Martinique"<?php echo ($profileInfo['country'] == 'Martinique') ? 'selected' : ''; ?>>Martinique</option>
                                        <option value="Mauritania"<?php echo ($profileInfo['country'] == 'Mauritania') ? 'selected' : ''; ?>>Mauritania</option>
                                        <option value="Mauritius"<?php echo ($profileInfo['country'] == 'Mauritius') ? 'selected' : ''; ?>>Mauritius</option>
                                        <option value="Mayotte"<?php echo ($profileInfo['country'] == 'Mayotte') ? 'selected' : ''; ?>>Mayotte</option>
                                        <option value="Mexico"<?php echo ($profileInfo['country'] == 'Mexico') ? 'selected' : ''; ?>>Mexico</option>
                                        <option value="Namibia"<?php echo ($profileInfo['country'] == 'Namibia') ? 'selected' : ''; ?>>Namibia</option>
                                        <option value="Nauru"<?php echo ($profileInfo['country'] == 'Nauru') ? 'selected' : ''; ?>>Nauru</option>
                                        <option value="Nepal"<?php echo ($profileInfo['country'] == 'Nepal') ? 'selected' : ''; ?>>Nepal</option>
                                        <option value="Norfolk Island"<?php echo ($profileInfo['country'] == 'Norfolk Island') ? 'selected' : ''; ?>>Norfolk Island</option>
                                        <option value="Northern Mariana Islands"<?php echo ($profileInfo['country'] == 'Northern Mariana Islands') ? 'selected' : ''; ?>>Northern Mariana Islands</option>
                                        <option value="Pakistan"<?php echo ($profileInfo['country'] == 'Pakistan') ? 'selected' : ''; ?>>Pakistan</option>
                                        <option value="Palau"<?php echo ($profileInfo['country'] == 'Palau') ? 'selected' : ''; ?>>Palau</option>
                                        <option value="Saint Pierre and Miquelon"<?php echo ($profileInfo['country'] == 'Saint Pierre and Miquelon') ? 'selected' : ''; ?>>Saint Pierre and Miquelon</option>
                                        <option value="Saint Vincent and the Grenadines"<?php echo ($profileInfo['country'] == 'Saint Vincent and the Grenadines') ? 'selected' : ''; ?>>Saint Vincent and the Grenadines</option>
                                        <option value="Sao Tome and Principe"<?php echo ($profileInfo['country'] == 'Sao Tome and Principe') ? 'selected' : ''; ?>>Sao Tome and Principe</option>
                                        <option value="Saudi Arabia"<?php echo ($profileInfo['country'] == 'Saudi Arabia') ? 'selected' : ''; ?>>Saudi Arabia</option>ia and Montenegro</option>
                                        <option value="Seychelles"<?php echo ($profileInfo['country'] == 'Seychelles') ? 'selected' : ''; ?>>Seychelles</option>
                                        <option value="Sierra Leone"<?php echo ($profileInfo['country'] == 'Sierra Leone') ? 'selected' : ''; ?>>Sierra Leone</option>
                                        <option value="Singapore"<?php echo ($profileInfo['country'] == 'Singapore') ? 'selected' : ''; ?>>Singapore</option>
                                        <option value="South Africa"<?php echo ($profileInfo['country'] == 'South Africa') ? 'selected' : ''; ?>>South Africa</option>
                                        <option value="South Georgia and the South Sandwich Islands"<?php echo ($profileInfo['country'] == 'South Georgia and the South Sandwich Islands') ? 'selected' : ''; ?>>South Georgia and the South Sandwich Islands</option>
                                        <option value="Spain"<?php echo ($profileInfo['country'] == 'Spain') ? 'selected' : ''; ?>>Spain</option>
                                        <option value="Turkey"<?php echo ($profileInfo['country'] == 'Turkey') ? 'selected' : ''; ?>>Turkey</option>
                                        <option value="Ukraine"<?php echo ($profileInfo['country'] == 'Ukraine') ? 'selected' : ''; ?>>Ukraine</option>
                                        <option value="United Arab Emirates"<?php echo ($profileInfo['country'] == 'United Arab Emirates') ? 'selected' : ''; ?>>United Arab Emirates</option>
                                        <option value="United Kingdom"<?php echo ($profileInfo['country'] == 'United Kingdom') ? 'selected' : ''; ?>>United Kingdom</option>
                                        <option value="United States"<?php echo ($profileInfo['country'] == 'United States') ? 'selected' : ''; ?>>United States</option>
                                        <option value="United States Minor Outlying Islands"<?php echo ($profileInfo['country'] == 'United States Minor Outlying Islands') ? 'selected' : ''; ?>>United States Minor Outlying Islands</option>
                                        <option value="Uruguay"<?php echo ($profileInfo['country'] == 'Uruguay') ? 'selected' : ''; ?>>Uruguay</option>
                                        <option value="Uzbekistan"<?php echo ($profileInfo['country'] == 'Uzbekistan') ? 'selected' : ''; ?>>Uzbekistan</option>
                                    
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="assistiveDevice" class="col-md-4 col-lg-3 col-form-label">Assistive Devices</label>
                                <div class="col-md-8 col-lg-9">                                   
                                    <select name="assistiveDevice" class="form-control" id="assistiveDevice">
                                        <option value="NVDA" <?php echo ($profileInfo['assistiveDevice'] == 'NVDA') ? 'selected' : ''; ?>>NVDA</option>
                                        <option value="Screenreader" <?php echo ($profileInfo['assistiveDevice'] == 'Screenreader') ? 'selected' : ''; ?>>Screenreader</option>
                                        <option value="Other" <?php echo ($profileInfo['assistiveDevice'] == 'Other') ? 'selected' : ''; ?>>Other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form><!-- End Profile Edit Form -->

                    </div>

                </div><!-- End Bordered Tabs -->

              </div>
          </div>

        </div>
      </div>
    </section>

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