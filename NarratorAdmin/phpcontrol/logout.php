<?php
    session_start();
    $_SESSION['ID'] = "";
    $_SESSION['pw'] = "";
    $_SESSION['level'] = "";
    header("location:welcome.html");
?>