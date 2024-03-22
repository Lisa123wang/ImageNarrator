<?php
    session_start();
    $account = $_POST['account'];
    $pw = $_POST['pw'];


    $link = mysqli_connect('localhost', 'root', 'fallnight5137', 'imagenarrator');
    $sql = "SELECT distinct * FROM user WHERE account = '$account' and pw = '$pw'";

    $result = mysqli_query($link, $sql);
    if($row=mysqli_fetch_assoc($result))
    {
        header("location:index.html");
        echo "<script>alert('登入成功');</script>";
    }else{
        header("location:welcome.html?method=message&message=帳號密碼錯誤");
    }
?>