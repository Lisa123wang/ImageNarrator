<?php
    session_start();
    $_SESSION['email'] = "";
    $_SESSION['password'] = "";
    $_SESSION['role'] = "";
    
    $message = "登出成功";
    echo "<script type='text/javascript'>alert('$message'); location.href = '../index.php';</script>";
    exit;
?>