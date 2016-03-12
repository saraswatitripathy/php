<?php
session_start();

if (isset($_SESSION['id'])) {
$_SESSION['id'];
include'connection.php';

  if(isset($_GET['a']))
    {
    $mysql="SELECT transactionid,mas_employee.empid, mas_employee.empname, assigndate, releasedate, remarks,
     tblasseststock.assestnamee,mas_assestitem.serialassestid,mas_assestitem.serialno FROM  php.tbltransaction 
     left join mas_employee on tbltransaction.emp_id=php.mas_employee.empid
     left join mas_assestitem on tbltransaction.serialassest_id2=php.mas_assestitem.serialassestid 
     left join  tblasseststock on tbltransaction.stock_id1=php.tblasseststock.stockid
     where transactionid=".$_GET['a'];
          

      $retval1 = mysql_query( $mysql);
               
        $row1=mysql_fetch_array($retval1);
              
           $transactionid=$row1['transactionid'];
           $empname = $row1['empname'];
           $empid=$row1['empid'];
           $serialassestid2=$row1['serialassestid'];
           $assestnamee=$row1['assestnamee'];
          $assigndate=date('d/m/y',strtotime($row1['assigndate']));
           $releasedate=date('d/m/y',strtotime($row1['releasedate']));
           $serialno=$row1['serialno']; 
           $stock_id1=$row1['stock_id1'];
           $remarks=$row1['remarks'];


          }

  if(isset($_POST['submit'])) 
      {
        {
          header("location:transactiondetail.php");
        }
           
          $transactionid1=$_POST['transactionid'];
          $empname = $_POST['empname'];
          $empid=$_POST['empid'];
          $serialassestid2=$_POST['serialassestid'];
          $assestnamee=$_POST['assestnamee'];
          $assigndate=date('Y-m-d',strtotime($_POST['assigndate']));
           $releasedate=date('Y-m-d',strtotime($_POST['releasedate']));
          $serialno=$_POST['serialno'];
          $stock_id1=$_POST['stock_id1'];
          $remarks=$_POST['remarks'];

       if($transactionid1=='')
            {
          $sql = "INSERT INTO tbltransaction"."(emp_id,serialassest_id2,stock_id1,assigndate,releasedate, remarks) ". 
         "VALUES('".$empname."','".$serialno."','".$assestnamee."','".$assigndate."','".$releasedate."','".$remarks."')";
               
            
           $retval = mysql_query( $sql);
                
           }

       else
          {
            $mysql1="UPDATE tbltransaction SET emp_id='".$empname."',assigndate='".$assigndate."', releasedate='".$releasedate."',
             serialassest_id2='".$serialno."',stock_id1='".$assestnamee."',remarks='".$remarks."' where transactionid=".$transactionid1;

          $retval1 = mysql_query( $mysql1);
          
          }
        }
     
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
    <script>

    $(function() {
    $( ".datepicker" ).datepicker();

    });

    function addconfig(){
      var id = document.getElementById("transactionid").value;
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
  <div class="wrapper1" height="60%" width="100%">
		<div class="link" height="100%" width="20%">
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
      <h3 class="panel-title">Add Transaction Detail</h3>
    </div>
   <div class="panel-body">
   <form name="adddetail" method = "post" action = "<?php echo $_SERVER['PHP_SELF'];?>" autocomplete="off">
   <table width = "100%" height="55%" cellspacing = "2" 
     cellpadding = "2">

     <tr>
        <td><input name = "transactionid" type = "hidden" id = "transactionid" value="<?php echo $transactionid;?>">
         </td>
     </tr>
  
     <tr>
      <td width = "200">Employee name:</td>
      <td><select name="empname">
          <option selected="selected">Select Employee name</option>
          <?php
              $select="SELECT * FROM php.mas_employee";
              $res= mysql_query($select);

              while($row2=mysql_fetch_array($res))
              {
            
                  
                echo '<option value="'. $row2['empid'].'"'.($empname==$row2['empname'] ? ' selected=\"selected\"' : '') . '>' . $row2['empname'] . '</option>';
              }
              ?>
          
          </select><br/>
      </td>
      </tr>

      <tr>
      <td width = "200">serial no:</td>
      <td><select name="serialno">
          <option selected="selected">Select serial no</option>
          <?php
              $select="SELECT serialassestid,tblasseststock.assestnamee,serialno,stockid
            from mas_assestitem
            left join  tblasseststock on mas_assestitem.stock_id=php.tblasseststock.stockid
            where serialassestid NOT IN 
            (select serialassest_id2 from tbltransaction 
            left join mas_employee on tbltransaction.emp_id = php.mas_employee.empid
            where leftemp!='yes'and serialassestid= serialassest_id2 )
            order by serialassestid";
              $res= mysql_query($select);

              while($row4=mysql_fetch_array($res))
              {
            
                  
                echo '<option value="'. $row4['serialassestid'].'"'.($serialno==$row4['serialno'] ? ' selected=\"selected\"' : '') . '>' . $row4['serialno'] . '</option>';
              }
              ?>
          
          </select><br/>
      </td>
      </tr>

     <tr>
      <td width = "200">Asset name:</td>
      <td><select name="assestnamee">
          <option selected="selected">Select Asset Name</option>
        <?php
            $select="SELECT serialassestid,tblasseststock.assestnamee,serialno,stockid
            from mas_assestitem
            left join  tblasseststock on mas_assestitem.stock_id=php.tblasseststock.stockid
            where serialassestid NOT IN 
            (select serialassest_id2 from tbltransaction 
            left join mas_employee on tbltransaction.emp_id = php.mas_employee.empid
            where leftemp!='yes'and serialassestid= serialassest_id2 )
            order by serialassestid";

              $res= mysql_query($select);

                while($row3=mysql_fetch_array($res))
                  {
                
                  echo '<option value="'. $row3['stockid'].'"'.($assestnamee==$row3['assestnamee'] ? ' selected=\"selected\"' : '') . '>' . $row3['assestnamee'] .'/ '.$row3['serialno'].'</option>';
                    
                  }
      ?>
          
          </select><br />
        </td>
     </tr>

  
     <tr>
          <td width = "200">Assign Date:</td>
          <td><input name = "assigndate" type = "text" id = "assigndate" class="datepicker" value= "<?php echo $assigndate;?>">
          </td>
          </tr>

          <tr>
          <td width = "200">Release Date:</td>
          <td><input name = "releasedate" type = "text" id = "releasedate" class="datepicker"  value= "<?php echo $releasedate;?>">
          </td>
          </tr>

          <tr>
          <td width = "200">Remarks:</td>
          <td><input name = "remarks" type = "text" 
             id = "remarks"  value= "<?php echo $remarks;?>">
          </td>
          </tr>

           <tr>
            <td></td>
            <td><input type="submit" name="submit" value="save" id="save" onclick="return addconfig();"></input>
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
