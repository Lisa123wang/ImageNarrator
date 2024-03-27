<?php
    session_start();
    $account = $_POST['account'];
    $pw = $_POST['pw'];


    $link = mysqli_connect('localhost', 'root', '', 'imagenarrator');
    $sql = "SELECT distinct * FROM user WHERE account = '$account' and pw = '$pw'";

    $result = mysqli_query($link, $sql);
    if($row=mysqli_fetch_assoc($result))
    {
        header("Location:../index.html?method=message&message=登入成功");
        exit;

    }else{
        header("location:../welcome.html?method=message&message=帳號密碼錯誤");
    }
?>