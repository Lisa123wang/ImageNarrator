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
    
    if($rowUser=mysqli_fetch_assoc($resultUser))
    {
        $_SESSION['email'] = $rowUser['email'];

        $sqlProfile = "SELECT nickname FROM profile WHERE userID = ? ";
        $stmtProfile = mysqli_prepare($link, $sqlProfile);
        mysqli_stmt_bind_param($stmtProfile, "i", $rowUser['userID']);
        mysqli_stmt_execute($stmtProfile);
        $resultProfile = mysqli_stmt_get_result($stmtProfile);

        if ($rowProfile = mysqli_fetch_assoc($resultProfile)) {
            $_SESSION['nickname'] = $rowProfile['nickname'];
        } else {
            $_SESSION['nickname'] = '未知'; 
        }
        
        $message = "Log in success";
            echo "<script type='text/javascript'>alert('$message'); location.href = '../pages-dashboard.php';</script>";
        exit;

    }else{
        $message = "The account password is incorrect. Please log in again.";
            echo "<script type='text/javascript'>alert('$message'); location.href = '../index.php';</script>";
    }
?>