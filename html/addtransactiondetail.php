<?php
session_start();

if (isset($_SESSION['id'])) {
$_SESSION['id'];
include'connection.php';

  if(isset($_GET['a']))
    {
    $mysql="SELECT transactionid,mas_employee.empid, mas_employee.empname, mas_employee.doj, mas_employee.dol, 
     tblasseststock.assestnamee,mas_assestitem.serialassestid,mas_assestitem.serialno FROM  organization_detail.tbltransaction 
     left join mas_employee on tbltransaction.emp_id=organization_detail.mas_employee.empid
     left join mas_assestitem on tbltransaction.serialassest_id2=organization_detail.mas_assestitem.serialassestid 
     left join  tblasseststock on tbltransaction.stock_id1=organization_detail.tblasseststock.stockid
     where transactionid=".$_GET['a'];
          

      $retval1 = mysql_query( $mysql);
               
        $row1=mysql_fetch_array($retval1);
              
           $transactionid=$row1['transactionid'];
           $empname = $row1['empname'];
           $empid=$row1['empid'];
           $serialassestid2=$row1['serialassestid'];
           $assestnamee=$row1['assestnamee'];
           $assigndate=$row1['doj'];
           $releasedate=$row1['dol'];
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
          $assigndate=$_POST['doj'];
          $releasedate=$_POST['dol']; 
          $serialno=$_POST['serialno'];
          $stock_id1=$_POST['stock_id1'];
          $remarks=$_POST['remarks'];

       if($transactionid1=='')
            {
         $sql = "INSERT INTO tbltransaction"."(emp_id,serialassest_id2,stock_id1) ". 
         "VALUES('".$empname."','".$serialno."','".$assestnamee."')";
               
            
           $retval = mysql_query( $sql);
                
           }

       else
          {
            $mysql1="UPDATE tbltransaction SET emp_id='".$empname."',assigndate='".$doj."', releasedate='".$dol."',
             serialassest_id2='".$serialno."',stock_id1='".$assestnamee."' where transactionid=".$transactionid1;

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
    function addconfig(){
      var del=confirm("Are you sure you want to inseret this record?");
      if (del==true){
      alert ("record inserted")
      }else{
      alert("Record Not inserted")
      }
      return del;
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
    
  <div class="contnt" align="right" width="80%" id="contnt">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Add Transaction Detail</h3>
    </div>
   <div class="panel-body">
   <form name="adddetail" method = "post" action = "<?php echo $_SERVER['PHP_SELF'];?>" autocomplete="off">
   <table width = "100%" height="45%" cellspacing = "2" 
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
              $select="SELECT * FROM organization_detail.mas_employee";
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
            left join  tblasseststock on mas_assestitem.stock_id=organization_detail.tblasseststock.stockid
            where serialassestid NOT IN 
            (select serialassest_id2 from tbltransaction 
            left join mas_employee on tbltransaction.emp_id = organization_detail.mas_employee.empid
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
      <td width = "200">Assest name:</td>
      <td><select name="assestnamee">
          <option selected="selected">Select Assest Name</option>
        <?php
            $select="SELECT serialassestid,tblasseststock.assestnamee,serialno,stockid
            from mas_assestitem
            left join  tblasseststock on mas_assestitem.stock_id=organization_detail.tblasseststock.stockid
            where serialassestid NOT IN 
            (select serialassest_id2 from tbltransaction 
            left join mas_employee on tbltransaction.emp_id = organization_detail.mas_employee.empid
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

  
     <!--<tr>
        <td width = "200">Date Of Assigning: </td>
        <td><select name="doj">
            <option selected="selected">Select assigning date</option>
            <?php
                $select="SELECT * FROM organization_detail.mas_employee";
                $res= mysql_query($select);

                while($row2=mysql_fetch_array($res))
                {
                
                    echo "<option value='".$row2['empid']."'>".$row2['doj']."</option>";
                  
                }
                ?>
            
                </select><br />
         
              </td>
     </tr>
  
     <tr>
        <td width = "100">Date Of Releasing: </td>
         <td><select name="dol">
            <option selected="selected">Select releasing date</option>
            <?php
                $select="SELECT * FROM organization_detail.mas_employee";
                $res= mysql_query($select);

                while($row2=mysql_fetch_array($res))
                {
                
                    echo "<option value='".$row2['empid']."'>".$row2['dol']."</option>";
                  
                }
                ?>
            
                </select><br />

         </td></tr>-->

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
