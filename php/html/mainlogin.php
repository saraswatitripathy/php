
<?php
include'connection.php';

if (isset($_POST['submit'])) {
  
$username=$_POST['username'];
$password=$_POST['password'];
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

$sql="SELECT * FROM member WHERE username='".$username."' and password='".$password."'";
$result=mysql_query($sql);
$fetch=mysql_fetch_array($result);
$count=mysql_num_rows($result);
if($count==1){
  session_start();
  $_SESSION['id']=$fetch['id'];

   header("location:dashboard.php");
  }
 else {
   $message = "Username and/or Password incorrect.\\nTry again.";
   echo "<script type='text/javascript'>alert('$message');</script>";
      }
}
?>
<html>
<head>
  <title>login form</title>
  <link href="login.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="bootstrap-3.3.6-dist/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="bootstrap-3.3.6-dist/css/bootstrap.min.css">
</head>

<body>
	<div class="body" height="100%" width="100%">
	<div class="header" height="20%" width="100%">
  </div>
  <hr>
  <div class="container" height="60%" width="100%">
    <div class="panel panel-primary" height="60%" width="60%">
     <div class="panel-heading">
       <h3 class="panel-title">Authentication form</h3>
     </div>
    <div class="panel-body" id="panel-body">
     <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
       <table align="center"border="0" height="40%" width="50%">
          <tr><td rowspan="4"><img src="img/lg3.jpeg"></img></td>
          <td style="vertical-align:bottom;" align="center"><label>Username:</label></td>
          <td style="vertical-align:bottom;">
          <input type="text" name="username" id="username" placeholder="enter your username"></td></tr>
          <tr><td align="center"><label>Password:</label></td>
          <td><input type="password" name="password" id="password" placeholder="enter your password"></td></tr>
          <tr><td align="center"><input type="submit" name="submit" value="login" class="btn btn-primary btn-lg"></td>
          <td><input type="reset" name="reset" value="reset" class="btn btn-primary btn-lg"></td></tr>
           <tr><td></td><td> <span><a href="forget.php">Forgot password??</a></span></td></tr>
      </table>
     </form>
    </div>
  </div>
</div>
     <div class="footer" height="20%" width="100%">
     	<h3 align="center">Computer assest management project<br>&copy;Relyon softech limited</br>&reg; certified company</h3>
     </div>
</div>
</body>
</html>
