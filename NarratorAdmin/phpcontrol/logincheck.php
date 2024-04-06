<?php
    session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    $link = mysqli_connect('localhost', 'root', '', 'narratordb_test1');
    // $sql = "SELECT distinct * FROM user WHERE email = '$email' and password = '$password'";
    $query = "SELECT userID, email, nickname name FROM user WHERE email = ? AND password = ?"; 

    $result = mysqli_query($link, $sql);
    if($row=mysqli_fetch_assoc($result))
    {
        header("Location:../pages-dashboard.php?method=message&message=登入成功");
        exit;

    }else{
        header("location:../index.html?method=message&message=帳號密碼錯誤");
    }
?>