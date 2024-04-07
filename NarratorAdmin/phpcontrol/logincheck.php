<?php
    session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    $link = mysqli_connect('localhost', 'root', '', 'narratordb_test1');
    $sqlUser = "SELECT * FROM user WHERE email = ? AND password = ? LIMIT 1";
    $stmtUser = mysqli_prepare($link, $sqlUser);
    mysqli_stmt_bind_param($stmtUser, "ss", $email, $password);
    mysqli_stmt_execute($stmtUser);
    $resultUser = mysqli_stmt_get_result($stmtUser);
    
    if($rowUser=mysqli_fetch_assoc($result))
    {
        $_SESSION['email'] = $row['email'];

        $sqlProfile = "SELECT nickname FROM profile WHERE userID = userID";
        $stmtProfile = mysqli_prepare($link, $sqlProfile);
        mysqli_stmt_bind_param($stmtProfile, "i", $rowUser['userID']);
        mysqli_stmt_execute($stmtProfile);
        $resultProfile = mysqli_stmt_get_result($stmtProfile);

        if ($rowProfile = mysqli_fetch_assoc($resultProfile)) {
            $_SESSION['nickname'] = $rowProfile['nickname'];
        } else {
            $_SESSION['nickname'] = '未知'; 
        }

        header("Location:../pages-dashboard.php?method=message&message=登入成功");
        exit;

    }else{
        header("location:../index.html?method=message&message=帳號密碼錯誤");
    }
?>