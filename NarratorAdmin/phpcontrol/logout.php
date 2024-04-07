<?php
    session_start();
    $_SESSION['email'] = "";
    $_SESSION['password'] = "";
    $_SESSION['role'] = "";
    header("location:../index.html?method=message&message=登出成功");
?>