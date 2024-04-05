<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Document</title>
 </head>
 <body>
<?php
    $dbaction=$_POST['dbaction'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $link=mysqli_connect('localhost','root','','narratordb_test1');
    if($dbaction=="insert")
    {	$sql = "insert into user (email, password) values ('$email', '$password')";
        //echo $sql;
        if(mysqli_query($link,$sql))
        {
            $message = "新增完成";
                echo "<script type='text/javascript'>alert('$message'); location.href = '../index.html'</script>";
        }
        else
        {
            $message = "新增失敗";
                echo "<script type='text/javascript'>alert('$message'); location.href = '../pages-register.html'</script>";
        }
    }
?>
</body>
</html>