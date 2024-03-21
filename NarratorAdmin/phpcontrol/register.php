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
    $account=_POST['account'];
    $pw=$_POST['pw'];
    $link=mysqli_connect('localhost','root','','imagenarrator');
    if($dbaction=="insert")
{	$sql = "insert into user (account, pw) values ('$account', '$pw')";
    //echo $sql;
	if(mysqli_query($link,$sql))
	{
		$message = "新增完成";
			echo "<script type='text/javascript'>alert('$message'); location.href = 'index.php'</script>";
	}
	else
	{
		$message = "新增失敗";
			echo "<script type='text/javascript'>alert('$message'); location.href = 'index.php'</script>";
	}
}
?>
</body>
</html>