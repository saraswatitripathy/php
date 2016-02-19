
<?php
session_start();

if (isset($_SESSION['id'])) {
$_SESSION['id'];
include'connection.php';

  if(isset($_GET['a']))
      {
      $mysql="SELECT stockid,assestnamee,quantity,remarks
      FROM  organization_detail.tblasseststock
       where stockid=".$_GET['a'];

      $retval1 = mysql_query( $mysql);

      $row1=mysql_fetch_array($retval1);

      $stockid=$row1['stockid'];
      $assestnamee= $row1['assestnamee'];
      $quantity=$row1['quantity'];
      $assestcost=$row1['cost'];
      $description=$row1['description'];
      $remarks=$row1['remarks'];
    }

  if(isset($_POST['submit'])) {
    {
      header("location:stockdetail.php");
    }

      $stockid1=$_POST['stockid'];
      $serialassestid1=$_POST['serialassestid'];
      $assestnamee = $_POST['assestnamee'];
      $quantity=$_POST['quantity'];
      $assestcost=$_POST['cost'];
      $description=$_POST['description'];
      $remarks=$_POST['remarks'];

       if($stockid1=='')
       {


       $sql = "INSERT INTO tblasseststock". "(assestnamee,quantity,remarks) ". 
      "VALUES('".$assestnamee."','".$quantity."','".$remarks."')";
     
  
           $retval = mysql_query( $sql);
      }

  else
      {
       $mysql1="UPDATE tblasseststock SET assestnamee='".$assestnamee."',
         quantity='".$quantity."',remarks='".$remarks."' where stockid=".$stockid1;

      $retval1 = mysql_query( $mysql1);
      
      }
    }
 ?>



<html>
<head>
    <title>addstockdetail</title>
    <link href="login.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.6-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.6-dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script>

    function addconfig(){
      var x = document.forms["adddetail"]["assestnamee"].value;
        if (x == null || x == "") {
            alert("Name must be filled out");
            return false;
        }
    else{
        var del=confirm("Are you sure you want to inseret this record?");
        if (del==true){
        alert ("record inserted")
        }else{
        alert("Record Not inserted")
        }
        return del;
        }
        }

    </script>
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
    <div class="wrapper1" width="100%">
			<div class="link" width="20%">
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
    
      <div class="contnt" align="right" width="80%" id="contnt">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Add stock details</h3>
        </div>
      <div class="panel-body">
       <form name="adddetail" method = "post" action = "<?php echo $_SERVER['PHP_SELF'];?>"autocomplete="off">
          <table width = "100%" height="37%" cellspacing = "2" 
             cellpadding = "2">
           <tr>
              <td><input name = "stockid" type = "hidden" id = "stockid" value="<?php echo $stockid;?>">
               </td>
           </tr>
                     
           <tr>
              <td width = "200">Assest Name:</td>
              <td><input name = "assestnamee" type = "text" id = "assestnamee"  value= "<?php echo $assestnamee;?>">
              </td>
            </tr>

           <tr>
              <td width = "200">Quantity:</td>
              <td><input name = "quantity" type = "text" id = "quantity"  value= "<?php echo $quantity;?>">
              </td>
            </tr>

           <tr>
              <td width = "200">Remarks:</td>
              <td><input name = "remarks" type = "text" id = "remarks"  value= "<?php echo $remarks;?>">
              </td>
           </tr>
           

           <tr>
              <td></td><td>
               <input type="submit" name="submit" value="save" id="save" onclick="return addconfig();"></input>
               </td>                           
           </tr>
                  
                </table>
              </form>
           </div>
         </div>
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
