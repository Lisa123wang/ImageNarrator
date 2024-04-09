<?php

    session_start();

    if (isset($_GET['email'])) {
        $email = $_GET['email'];

        // 透過資料庫獲得使用者個人圖片
        $link = mysqli_connect('localhost', 'root', '', 'narratordb_test1');
        $sql = "SELECT profileImg FROM profile WHERE email = ?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $image);
        mysqli_stmt_fetch($stmt);

        if ($image) {
            header("Content-Type: image/jpeg"); // 假設圖片是JPEG格式
            echo $image;
        } else {
            readfile('default/path/to/image.jpg');
        }
        exit;
    }

?>