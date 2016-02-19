<?php
include'connection.php';
$username=$_POST['username'];
$password=$_POST['password'];
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

$sql="SELECT * FROM member WHERE username='$username' and password='$password'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
if($count==1){
session_register("username");
session_register("password");
header("location:dashboard.php");
}
else {
	header("location:mainlogin.php");
//echo "Wrong Username or Password";
}
?>