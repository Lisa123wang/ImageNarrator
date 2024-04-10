<?php
    session_start();

    $dbaction=$_POST['dbaction'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $link=mysqli_connect('localhost','root','','narratordb_test1');
    
    if ($dbaction == "insert") {

        mysqli_begin_transaction($link);
    
        try {
            // 透過使用者輸入的 email,password 在user表中新增一筆新的資料
            $sqlUser = "INSERT INTO user (email, password) VALUES (?, ?)";
            $stmtUser = mysqli_prepare($link, $sqlUser);
            mysqli_stmt_bind_param($stmtUser, "ss", $email, $password);
            mysqli_stmt_execute($stmtUser);
            $userId = mysqli_insert_id($link); // 獲得剛建立的userID
    
            // 在profile表中為此為使用者新增空值
            $sqlProfile = "INSERT INTO profile (userID) VALUES (?)";
            $stmtProfile = mysqli_prepare($link, $sqlProfile);
            mysqli_stmt_bind_param($stmtProfile, "i", $userId);
            mysqli_stmt_execute($stmtProfile);
    
            mysqli_commit($link);

            // 使用者註冊成功後，可以根據以下兩個資料唯一識別註冊或登入的是哪一位使用者
            $_SESSION['userID'] = $userId;
            $_SESSION['email'] = $email;
    
            $message = "新增完成";
            echo "<script type='text/javascript'>alert('$message'); location.href = '../pages-profile.php';</script>";
            exit;
        } catch (Exception $e) {
            // 新增失敗
            mysqli_rollback($link);
            $message = "新增失敗：" . $e->getMessage();
            echo "<script type='text/javascript'>alert('$message'); location.href = '../pages-register.php';</script>";
        }
    }
    mysqli_close($link);

?>
