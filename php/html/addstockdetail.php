
<?php
session_start();

if (isset($_SESSION['id'])) {
$_SESSION['id'];
include'connection.php';

  if(isset($_GET['a']))
      {
      $mysql="SELECT stockid,assestnamee,quantity,remarks1,mas_vendor.vname,purchasedate
      FROM  php.tblasseststock
      left join mas_vendor on tblasseststock.vendor_id=php.mas_vendor.vid
       where stockid=".$_GET['a'];

      $retval1 = mysql_query( $mysql);

      $row1=mysql_fetch_array($retval1);

      $stockid=$row1['stockid'];
      $assestnamee= $row1['assestnamee'];
      $quantity=$row1['quantity'];
      $assestcost=$row1['cost'];
      $description=$row1['description'];
      $remarks1=$row1['remarks1'];
      $vid=$row1['vendor_id'];
      $vname=$row1['vname'];
      $purchasedate=date('d/m/y',strtotime($row1['purchasedate']));
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
      $remarks1=$_POST['remarks1'];
      $vid=$_POST['vendor_id'];
      $vname=$_POST['vname'];
      $purchasedate=date('Y-m-d',strtotime($_POST['purchasedate']));



       if($stockid1=='')
       {


       $sql = "INSERT INTO tblasseststock". "(assestnamee,quantity,remarks1,vendor_id,purchasedate) ". 
      "VALUES('".$assestnamee."','".$quantity."','".$remarks."','".$vname."','".$purchasedate."')";
     
  
           $retval = mysql_query( $sql);
      }

  else
      {
       $mysql1="UPDATE tblasseststock SET assestnamee='".$assestnamee."',
         quantity='".$quantity."',remarks1='".$remarks1."',vendor_id='".$vname."' ,purchasedate='".$purchasedate."'
         where stockid=".$stockid1;

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
     $(function() {
    $( ".datepicker" ).datepicker();

    });

     function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }    


    function addconfig(){
      var x = document.forms["adddetail"]["assestnamee"].value;
        if (x == null || x == "") {
            alert("Name must be filled out");
            return false;
        }
    else{
      var id = document.getElementById("stockid").value;
        if(id=="" )
        {

          var del=confirm("Are you sure you want to insert this record?");
          if (del==true){
           alert ("Record inserted")
           }else{
           alert("Unable to insert record")
           }
           return del;
          }
        
          else
        {
          var del=confirm("Are you sure you want to update this record?");
          if (del==true){
          alert ("Record updated")
          }else{
          alert("Unable to update record")
           }
           return del;
        
        }
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
        <a href='#'>Asset</a>
      <ul>
      <li>
        <a href='assestdetail.php'>Asset Detail</a></li>
      <li>
        <a href='assestadd.php'>Add Asset</a></li>
      </ul>
      </li>
      <li>
        <a href='#'>Stock Detail</a>
      <ul>
      <li>
        <a href='stockdetail.php'>Stock Detail</a></li>
      <li>
        <a href='addstockdetail.php'> Add Stock Asset</li>
      </ul>
      <li><a href='#'>Assignment</a>
      <ul>
      <li><a href='transactiondetail.php'>Assignment Detail</a></li>
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
          <a href="assestdetail.php" ><li type="disc">Asset detail</li></a>
      
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
              <td width = "200">Asset Name:</td>
              <td><input name = "assestnamee" type = "text" id = "assestnamee"  value= "<?php echo $assestnamee;?>">
              </td>
            </tr>

           <tr>
              <td width = "200">Quantity:</td>
              <td><input name = "quantity" type = "text" id = "quantity" maxlength="10" onkeypress="javascript:return isNumber(event)" value= "<?php echo $quantity;?>">
              </td>
            </tr>

          <tr>
                <td width = "200">vendor: </td>
                <td>
                  <select name="vname">
                    <option selected="selected">select vendor</option>
                    <?php
                        $select="SELECT * FROM php.mas_vendor";
                        $res= mysql_query($select);

                        while($row2=mysql_fetch_array($res))
                        {
                            echo '<option value="'. $row2['vid'].'"'.($vname==$row2['vname'] ? ' selected=\"selected\"' : '') . '>' . $row2['vname'] . '</option>';
                          
                        }
                        ?>
                    
                        </select><br/>
                  </td>
           </tr>
           <tr>
                <td width = "200">Purchase Date:</td>
                <td><input name = "purchasedate" type = "text" id = "purchasedate" class="datepicker" value= "<?php echo $purchasedate;?>">
                </td>
             </tr>

           <tr>
              <td width = "200">Remarks:</td>
              <td><input name = "remarks1" type = "text" id = "remarks1"  value= "<?php echo $remarks1;?>">
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
