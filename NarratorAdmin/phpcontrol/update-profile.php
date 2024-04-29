<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();

        // 確認 userID 是否已在會話中設定
        if (!isset($_SESSION['userID'])) {
            // 如果未設置 userID，則重定向到登入頁面
            header('Location:pages-login.php');
            exit;
        }

        if (isset($_SESSION['email'])) { // 確定使用者已登入
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $userID = $_SESSION['userID'];
        $email = $_SESSION['email'];
        $nickname = $_SESSION['nickname'];
        $visualImp_LV = $_SESSION['visualImp_LV'];
        $education = $_SESSION['education'];
        $gender = $_SESSION['gender'];
        $country = $_SESSION['country'];
        $assistiveDevice = $_SESSION['assistiveDevice'];


        $link=mysqli_connect('localhost','root','','narratordb_test1');

        
        $sql = "UPDATE profile SET nickname=?, visualImp_LV=?, education=?, gender=?, country=?, assistiveDevice=? WHERE userID=?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, 'ssssssi', $nickname, visualImp_LV , $education, $gender, $country, $assistiveDevice, $userID);


        if (mysqli_stmt_execute($stmt)) {

            $_SESSION['nickname'] = $nickname;
            $_SESSION['visualImp_LV'] = $visualImp_LV;
            $_SESSION['education'] = $education;
            $_SESSION['gender'] = $gender;
            $_SESSION['country'] = $country;
            $_SESSION['assistiveDevice'] = $assistiveDevice;

            $message = "修改成功";
            echo "<script type='text/javascript'>alert('$message'); window.location.href = '../pages-profile.php';</script>";
        } else {
            $message = "修改失敗：" . mysqli_error($link);
            echo "<script type='text/javascript'>alert('$message'); window.location.href = '../pages-profile.php';</script>";
        }

    }else {
        // 使用者若未登入，則重定向到登入頁面
        header('Location: ../pages-login.php');
        exit();
    }
}
    ?>
</body>
</html>