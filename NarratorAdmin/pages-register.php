<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Register - NiceAdmin Bootstrap Template</title>
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
</head>

<body>
  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/imageNarrator logo.png" alt="">
                  <span class="d-none d-lg-block">IMAGE NARRATOR</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">
                <div class="card-body">
                  <form method="post" action="phpcontrol/register.php">
                    <input type="hidden" name="dbaction" value="insert">
                    <div class="pt-4 pb-2">
                      <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                      <p class="text-center small">Enter your personal details to create account</p>
                    </div>

                    <div class="col-12">
                      <label for="email" class="form-label">Your account</label>
                      <input type="text" name="email" class="form-control" id="email" required>
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="password" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <br />
                      <button class="btn btn-primary w-100" type="button" id="openTerms">Create Account</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="pages-login.php">Log in</a></p>
                      <br />
                    </div>
                  </form>
                  <a class="btn btn-primary w-100" href="index.php">Cancel</a>
                </div>
              </div>

              <div class="credits">
                Designed by IMAGE NARRATOR</a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main><!-- End #main -->

  <!-- Modal for Terms and Conditions -->
  
          <!-- Modal for Terms and Conditions -->
<div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="termsModalLabel">User Terms and Conditions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="disagreeTerms">Not Agree</button>
                <button type="button" class="btn btn-primary" id="acceptTerms">Agree</button>
            </div>
        </div>
    </div>
</div>


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
  <!-- Include jQuery and Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- Script for handling modal and form submission -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Show modal
        document.getElementById('openTerms').addEventListener('click', function() {
            $('#termsModal').modal('show');
        });

        // Handle agreement
        document.getElementById('acceptTerms').addEventListener('click', function() {
            $('#termsModal').modal('hide');
            document.querySelector('form').submit();
        });

        // Handle disagreement
        document.getElementById('disagreeTerms').addEventListener('click', function() {
            $('#termsModal').modal('hide');
            alert('You must agree to the terms and conditions to register an account.');
        });
    });
    </script>


</body>

</html>
