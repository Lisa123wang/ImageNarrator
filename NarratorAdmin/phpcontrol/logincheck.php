<?php
    session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];


    $link = mysqli_connect('localhost', 'root', '', 'imagenarrator');
    $sql = "SELECT distinct * FROM account WHERE email = '$email' and password = '$password'";

    $result = mysqli_query($link, $sql);
    if($row=mysqli_fetch_assoc($result))
    {
        header("Location:../index.html?method=message&message=登入成功");
        exit;

    }else{
        header("location:../welcome.html?method=message&message=帳號密碼錯誤");
    }
?>