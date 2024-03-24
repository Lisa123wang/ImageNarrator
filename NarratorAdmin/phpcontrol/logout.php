<?php
    session_start();
    $_SESSION['account'] = "";
    $_SESSION['pw'] = "";
    $_SESSION['level'] = "";
    header("location:welcome.html");
?>