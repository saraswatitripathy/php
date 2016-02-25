<?php
session_start();

if (isset($_SESSION['id'])) {
$_SESSION['id'];
include'connection.php';

  ?>

<html>
<head>
    <title>addtransactiondetail</title>
    <link href="login.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.6-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.6-dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">
</head>
<body>
	<div class="wrapper">
	  <div class="header" height="20%" width="100%">
    </div>
    <div class="drop">
      <ul class="drop_menu">
      <li>
        <a href='dashboard.php'>Dashboard</a>
      </li>
      <li>
        <a href='#'>Employee</a>
      <ul>
      <li>
        <a href='empdetail.php'>Employee Detail</a></li>
      <li>
        <a href='empadd.php'>Add Employee</a></li>
      </ul>
      </li>
      <li>
        <a href='#'>Assest</a>
      <ul>
      <li>
        <a href='assestdetail.php'>Assest Detail</a></li>
      <li>
        <a href='assestadd.php'>Add Assest</a></li>
      </ul>
      </li>
      <li>
        <a href='#'>Stock Detail</a>
      <ul>
      <li>
        <a href='stockdetail.php'>Stock Detail</a></li>
      <li>
        <a href='addstockdetail.php'> Add Stock Assest</li>
      </ul>
      <li><a href='#'>Assignment</a>
      <ul>
      <li><a href='transactiondetail.php'>Assignment detail</a></li>
      <li><a href='addtransactiondetail.php'> Add Assignment</a>
      </li>
      </ul>
   </ul>
  </div>
  <hr>
  <div class="wrapper1" height="60%" width="100%">
		<div class="link" height="100%" width="20%">
      <ol>
        <h3 style="color:grey;"><img src="img/link.png" height="40px" width="40px">
          <span style="border-bottom: solid 4px;"> <u>Quick links</u></span></img></h3>
        <a href="dashboard.php" disable="true"><li type= "disc" class="active">Dashboard</li></a>
        <a href="empdetail.php"><li type="disc">Employee detail</li></a>
    
        <a href="stockdetail.php" ><li type="disc">Stock detail</li></a>
        <a href="assestdetail.php" ><li type="disc">Assest detail</li></a>
    
        <a href="transactiondetail.php"><li type="disc">Assignment</li></a>
 
        <a href="logout.php"><li type="disc">logout</li></a>
       </ol>
    </div>
     <div class="contnt" align="right"  style="height: auto;" width="80%" id="contnt">
          <table border='1' class="tbl" width="100%" align="right">
          <tr height=40 style="background:url(img/bg1.jpeg);">
         
          <th width=190><font color="white">Id</th>
          <th width=300><font color="white">Employee Name</th>
          <th width=250><font color="white">Assest name</th>
          <th width=200><font color="white">Serial No</th>
          <th width=300><font color="white">Date of assigning</th>
          <th width=250><font color="white">Date of releasing</th>
          <th width=150><font color="white">Action</th>
        </tr>
        <?php

          $sql1="SELECT transactionid,mas_employee.empname, mas_employee.doj, mas_employee.dol, tblasseststock.stockid,
          tblasseststock.assestnamee,mas_assestitem.serialassestid, mas_assestitem.serialno FROM  organization_detail.tbltransaction 
          left join mas_employee on tbltransaction.emp_id=organization_detail.mas_employee.empid
          left join mas_assestitem on tbltransaction.serialassest_id2=organization_detail.mas_assestitem.serialassestid
          left join  tblasseststock on tbltransaction.stock_id1=organization_detail.tblasseststock.stockid
          WHERE empid=".$_GET['b'];

           $result1=mysql_query($sql1);
           $count = mysql_num_rows($result1);
           if($count>0)
           {
           while($row1=mysql_fetch_array($result1))
           {
           $transactionid=$row1['transactionid'];
           $empname = $row1['empname'];
           $assestname=$row1['assestnamee'];
           $assigndate=$row1['doj'];
           $releasedate=$row1['dol']; 
           $slno=$row1['serialno'];
           
         echo  "<tr height=40>
        
         <td>".$transactionid."</td>
         <td>".$empname."</td>
         <td>".$assestname."</td>
         <td>".$slno."</td>
         <td>".$assigndate."</td>
         <td>".$releasedate."</td>
         <td><button type='button' name='edit' onclick='editData($transactionid)'> Edit</button></td>
         </tr>";
        
         }
         echo"</table>";
         } 
    
       else
         {
             echo "<table><tr><td colspan='3'>No data found</td></tr></table>";
         }

  ?>
</div>
</div>

  
  <div class="footer">
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
