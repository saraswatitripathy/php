<?php
session_start();
if(!session_is_registered(username)){
header("location:mainlogin.php");
}
?>
<html>
<head></head>
<body>
	Login successful
</body>
</html>