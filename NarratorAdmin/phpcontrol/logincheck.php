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
        $_SESSION['role'] = $rowUser['role'];

        
        if ($_SESSION['role'] === 'admin') {
            // Redirect to admin dashboard if user is an admin
            echo "<script type='text/javascript'>alert('Login successful as Admin'); location.href = '../pages-members.php';</script>";
            exit;
        } else {
            // Redirect to regular user dashboard otherwise
            $message = "Log in success";
            echo "<script type='text/javascript'>alert('$message'); location.href = '../pages-dashboard.php';</script>";
            exit;
        }
    }else{
        $message = "The account password is incorrect. Please log in again.";
        echo "<script type='text/javascript'>alert('$message'); location.href = '../index.php';</script>";
    }
?>