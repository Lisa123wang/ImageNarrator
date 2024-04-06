<?php
    session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    $link = mysqli_connect('localhost', 'root', '', 'narratordb_test1');
    $sql = "SELECT distinct * FROM user WHERE email = '$email' and password = '$password'";
    $sql = "SELECT user.email, profile.nickname FROM user INNER JOIN profile ON user.id = profile.user_id WHERE user.email = '$email' AND user.password = '$password' LIMIT 1";
    
    $result = mysqli_query($link, $sql);
    if($row=mysqli_fetch_assoc($result))
    {
        $_SESSION['email'] = $row['email'];
        $_SESSION['nickname'] = $row['nickname'];
        header("Location:../pages-dashboard.php?method=message&message=登入成功");
        exit;

    }else{
        header("location:../index.html?method=message&message=帳號密碼錯誤");
    }
?>