<html>
<head>
  <title>forget password</title>
<style type="text/css">
 input{
 border:1px solid olive;
 border-radius:5px;
 }
 h1{
  color:blue;
  font-size:22px;
  text-align:center;
 }

</style>
</head>
<body>
<h1>Forgot Password<h1>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method='post'>
<table cellspacing='5' align='center'>
<tr><td>Email id:</td><td><input type='text' name='mail'/></td></tr>
<tr><td></td><td><input type='submit' name='submit' value='Submit'/></td></tr>
</table>
</form>
<?php
if(isset($_POST['submit']))
{ 
 mysql_connect('localhost','root','password') or die(mysql_error());
 mysql_select_db('organization_detail') or die(mysql_error());
 $mail=$_POST['mail'];
 $sql=mysql_query("select * from member where mail='".$mail."' ") or die(mysql_error());
 $res=mysql_affected_rows();
 if($res!=0) 
 {
  $res=mysql_fetch_array($sql);
  $to=$res['mail'];
  $subject='Remind password';
  $message='Your password : '.$res['password']; 
  $headers='From:saraswati.tripathy11@gmail.com';
  $m=mail($to,$subject,$message,$headers);
  if($m)
  {
    echo'Check your inbox for mail';
  }
  else
  {
   echo'Unable to send mail';
  }
 }
 else
 {
  echo'Your entered mail id is not present';
 }
}
?>
</body>
</html>