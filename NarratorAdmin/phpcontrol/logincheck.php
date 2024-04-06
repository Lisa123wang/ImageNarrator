<?php
    session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];
    $nickname = $_POST['nickname'];


    $link = mysqli_connect('localhost', 'root', '', 'narratordb_test1');
    $sql = "SELECT distinct * FROM user WHERE email = '$email' and password = '$password'";

    $result = mysqli_query($link, $sql);
    if($row=mysqli_fetch_assoc($result))
    {
        header("Location:../pages-dashboard.php?method=message&message=登入成功");
        exit;

    }else{
        header("location:../index.html?method=message&message=帳號密碼錯誤");
    }
?>