<?php
session_start();

if (isset($_SESSION['id'])) {
$_SESSION['id'];
	?>
<html>
<head>
	<title>dasheboard</title>
	<link href="login.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.6-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.6-dist/css/bootstrap.min.css">
</head>
<body>
	<div class="wrapper">

		<div class="header"  height="20%" width="100%">
	    </div>
	    
	    <div class="drop">
		 <ul class="drop_menu">
			<li><a href='dashboard.php'>Dashboard</a>
			</li>
			  <li>
				<a href='#'>Employee</a>
				 <ul>
					<li><a href='empdetail.php'>Employee Detail</a></li>
					<li><a href='empadd.php'>Add Employee</a></li>
				</ul>
			  </li>
				<li><a href='#'>Assest</a>
				  <ul>
					<li><a href='assestdetail.php'>Assest Detail</a></li>
					<li><a href='assestadd.php'>Add Assest</a></li>
				  </ul>
				</li>
				<li><a href='#'>Stock Detail</a>
				 <ul>
					<li><a href='stockdetail.php'>Stock Detail</a></li>
					<li><a href='addstockdetail.php'> Add Stock Assest</li>
				</ul>
				<li><a href='#'>Assignment</a>
				 <ul>
					<li><a href='transactiondetail.php'>Assignment detail</a></li>
					<li><a href='addtransactiondetail.php'> Add Assignment</a></li>
				 </ul>
				</ul>
       </div>
<hr>
   <div class="wrapper1" width="90%">
      <div class="link" width="20%">
 	
         <ol>
          <h3 align="left" style="color:grey;"><img src="img/link.png" height="40px" width="40px">
          	<span style="border-bottom: solid 4px;"> <u>Quick links</u></span></img></h3>
          <a href="dashboard.php" disable="true"><li type= "disc" class="active">Dashboard</li></a>
          <a href="empdetail.php"><li type="disc">Employee detail</li></a>
      
          <a href="stockdetail.php" ><li type="disc">Stock detail</li></a>
          <a href="assestdetail.php" ><li type="disc">Assest detail</li></a>
      
          <a href="transactiondetail.php"><li type="disc">Assignment</li></a>
   
          <a href="logout.php"><li type="disc">logout</li></a>
         </ol>
      </div>
       <div class="contnt" align="right" width="80%" >
	         <div class="detail1">
		       	<a href="empdetail.php"><img src="img/ru.jpeg" height="50px" width="50px" align="left"></img><a>
			     <h3 align="right"><a href="empdetail.php"><u>Employee detail</u></a></h3>
			     <h5 align="justify"> Number of employee is not small enough to be counted in number. 
			     A proper employee managed system must be maintained . 
			     Click <a href="empdetail.php"><u>here</u></a> to get the proper employee managing system</h5>

		       </div>
		       <div class="detail2">
		       	<a href="stockdetail.php"><img src="img/search.jpeg" height="50px" width="50px" align="left"></img></a>
			      <h3 align="right"><a href="stockdetail.php"><u>Stock detail</u></a></h3>
			      <h5 align="justify">Stock detail is to know in detailed the assests, present in company.
			       Managing stock is one of the hectic process. Just click <a href="stockdetail.php"><u>here</u></a> to see the best
			       assest management system.
	           </div>
	           <div class="detail3">
	           	<a href="transactiondetail.php"><img src="img/transc.jpeg" height="50px" width="50px" align="left"></img></u></a>
	              <h3 align="right"><a href="transactiondetail.php"><u>Assignment detail</u></a></h3>
	              <h5 align="justify">In order to run the organization in a organised manner. Assest must be 
	              distributed accordingly to get the best of the employee.
	              click <a href="transactiondetail.php"><u>here</u></a>, to see the assignment detail</h5> 
	           </div>
	      	   <div class="detail4">
	      	   	<a href="assestdetail.php"><img src="img/ru.jpeg" height="50px" width="50px" align="left"></img></a>
	      	      <h3 align="right"><a href="assestdetail.php"><u>Assest detail</u></a></h3>
                   <h5 align="justify"> Assests is mainly of two type in an organization.Mainly,Hardware assests and Software assests.
                   Click <a href="assesttype.php"><u>here</u></a>, to get the assests type detail</h5>
	           </div>
       </div>
   </div>
       <div class="footer" width="100%">
      <h3 align="center">Computer assest management project<br>&copy;Relyon softech limited<br>&reg; certified company</h3>
     </div>
   </div>
</body>
</html>
<?php

}
else
	header("location:mainlogin.php");
?>