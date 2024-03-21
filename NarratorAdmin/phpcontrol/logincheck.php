<?php
    session_start();
    $account = $_POST['account'];
    $pw = $_POST['pw'];


    $link = mysqli_connect('localhost', 'root', '', 'imagenarrator');
    $sql = "SELECT distinct * FROM user WHERE account = '$account' and pw = '$pw'";

    $result = mysqli_query($link, $sql);
    if($row=mysqli_fetch_assoc($result))
    {
        $_SESSION['name'] = $row['name'];
        $_SESSION['level'] = $row['level'];
        header("location:welcome.html?method=message&message=登入成功");
    }else{
        header("location:index.php?method=message&message=帳號密碼錯誤");
    }
?>