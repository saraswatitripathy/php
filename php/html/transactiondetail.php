
<?php
session_start();

if (isset($_SESSION['id'])) {
$_SESSION['id'];
include'connection.php';
      $start=0;
      $limit=10;

      if(isset($_GET['page']))
      {
      $page=$_GET['page'];
      $start=($page-1)*$limit;
      }

        
  if(isset($_POST['add']))
    {
      header("location:addtransactiondetail.php");
    }

 if(isset($_POST['delete'])){


   $chkid=$_POST['chkbx'];
   foreach ($chkid as $key => $value) {

    $sql4 = "DELETE FROM php.tbltransaction WHERE transactionid=".$value;
    $res4 = mysql_query($sql4);

     }
   }

?>
<html>
<head>
    <title>transactiondetail</title>
    <link href="login.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.6-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.6-dist/css/bootstrap.min.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script>
    function deletedata()
    {
      if(!$('.resultcheckbox').is(':checked'))
      {
        alert("Please check at least one checkbox.");
          return false;
      }
      else{
        var del=confirm("Are you sure you want to delete this record?");
        if (del==true){
        alert ("record deleted")
        }else{
        alert("Record Not Deleted");
        return false;

        }
        return del;
          }
    }

    function editData(getdata){
      //alert('addtransactiondetail.php?a='+getdata);
      window.location='addtransactiondetail.php?a='+getdata;
     

    }
    function myFunction1() {
        document.getElementById("search").reset();
    }
    function setVisibility(id) {
    if(document.getElementById('bt1').value=='hide'){
    document.getElementById('bt1').value = 'show';
    document.getElementById(id).style.display = 'none';
    }else{
    document.getElementById('bt1').value = 'hide';
    document.getElementById(id).style.display = 'inline';
    }
    }

    </script>
</head>
<body>
	<div class="wrapper" height="100%" width="100%">
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
     <div class="contnt" align="right" height="100%" width="80%" id="contnt">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Asset assignment search
            <input type=button id='bt1' value="hide" style="float: right"; "font-color:black"; onclick="setVisibility('panel-body');";></h3>
        </div>
        <div class="panel-body" id="panel-body">
         <form name="search" id="search" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
          <fieldset>
            <!--<table>
              <tr><td>Employee id:</td>
                <td><input type="text" name="empid" id="empid"></td>
              </tr>
              <tr><td>Serial No:</td>
                <td><input type="text" name="serialassestid" id="serialassestid"></td>
              </tr>
              <tr><td>Assest Name:</td>
                <td><input type="text" name="assestname" id="assestname"></td>
              </tr>
              <tr><td>Employee Name:</td>
                <td><input type="text" name="empname" id="empname"></td>
              </tr>
            </table>-->

           <ol type="none">
              <li><label>Employee id:</label>
                <input type="text" name="empid" id="empid">
              </li><span style="padding-left:105px">
              <li>
                <label>Employee name:</label>
                <input type="text" name="empname" id="empname">
              </li>
              <li>
                <label>Asset name:</label>
                <input type="text" name="assestnamee" id="assestnamee">
              </li><span style="padding-left:150px">
              <li>
                 <label>Serial No:</label>
                <input type="text" name="serialno" id="serialno"><span style="padding-right:5px">
              </li>
            </ol>
                <hr>
              <input id="search" class="searchbttn" type="submit" name="search" value="Search">
              <input id="reset" class="resetbttn" type="reset" name="reset" value="Reset">
          </fieldset>
        </form>
        </div>
      </div>
      <div class="information">
      <hr>
        <form name="dlt" method ="post" action="<?php echo $_SERVER['PHP_SELF'];?>" autocomplete="off">
          <input id="add" class="addbttn" type="submit" name="add" value="add">
          <input id="delete" class="deletebttn" type="submit" name="delete" value="delete" onClick="return deletedata();">
          <hr>
          <div class="fetchng"style="height: auto;">
           <table border='1' class="tbl">
          <tr height=40 style="background:url(img/bg1.jpeg);">
          <th width=80><input type="checkbox"></th>
          <th width=190><font color="white">Id</th>
          <th width=150><font color="white">Employee Id</th>
          <th width=300><font color="white">Employee Name</th>
          <th width=250><font color="white">Asset name</th>
          <th width=200><font color="white">Serial No</th>
          <th width=300><font color="white">Date of assigning</th>
          <th width=250><font color="white">Date of releasing</th>
          <th width=150><font color="white">Action</th>
        </tr>


<?php
           if(isset($_POST['search']))
           {
            $empid=$_POST['empid'];
            $empname=$_POST['empname'];
            $slno=$_POST['serialno'];
            $assestname=$_POST['assestnamee'];

            if($empid!="" && $empname =="" && $assestname =="" && $slno=="")
            {
              $search = 'empid='.$empid;

            }
            if($slno!="" && $empname =="" && $assestname =="" && $empid=="")
            {
              $search = "serialno='".$slno."'";

            }
           else if($empname!="" && $empid =="" && $assestname =="" && $slno=="")
            {
                $search = "empname='".$empname."'";
            }
           
            else if($assestname !="" && $empname=="" && $empid =="" && $slno=="")
            {
                $search = "assestnamee='".$assestname."'";
            }
            
            else if($empname!="" && $empid!="" && $assestname !="" && $slno==!"")
            {
                $search = "empname='".$empname."' and empid='".$empid."' and 
                assestnamee ='".$assestname."' and serialno='".$slno."'" ;
            }

          $sql1="SELECT transactionid,mas_employee.empid, mas_employee.empname, assigndate, releasedate, tblasseststock.stockid,
          tblasseststock.assestnamee,mas_assestitem.serialassestid, mas_assestitem.serialno FROM  php.tbltransaction 
          left join mas_employee on tbltransaction.emp_id=php.mas_employee.empid
          left join mas_assestitem on tbltransaction.serialassest_id2=php.mas_assestitem.serialassestid
          left join  tblasseststock on tbltransaction.stock_id1=php.tblasseststock.stockid
          WHERE ". $search ;

           $result1=mysql_query($sql1);
           $count = mysql_num_rows($result1);
           if($count>0)
           {
           while($row1=mysql_fetch_array($result1))
           {
           $transactionid=$row1['transactionid'];
           $empname = $row1['empname'];
           $empid=$row1['empid'];
           $assestname=$row1['assestnamee'];
           $assigndate=$row1['assigndate'];
           $releasedate=$row1['releasedate']; 
           $slno=$row1['serialno'];
           
         echo  "<tr height=40>
         <td><input type='checkbox' value=".$transactionid." name='chkbx[]' class='resultcheckbox'></td>
         <td>".$transactionid."</td>
         <td>".$empid."</td>
         <td>".$empname."</td>
         <td>".$assestname."</td>
         <td>".$slno."</td>
         <td>".$assigndate."</td>
         <td>".$releasedate."</td>
         <td><button type='button' name='edit' onclick='editData($transactionid)'> Edit</button></td>
         </tr>";
        
         }
         "</table>";  
         } 
    
       else
         {
             echo "<table><tr><td colspan='3'>No data found</td></tr></table>";
         }

           
         }

   else{

       $sql="SELECT transactionid,mas_employee.empid, mas_employee.empname, assigndate, releasedate, tblasseststock.stockid,
       tblasseststock.assestnamee,mas_assestitem.serialassestid, mas_assestitem.serialno FROM  php.tbltransaction 
       left join mas_employee on tbltransaction.emp_id=php.mas_employee.empid
       left join mas_assestitem on tbltransaction.serialassest_id2=php.mas_assestitem.serialassestid
       left join  tblasseststock on tbltransaction.stock_id1=php.tblasseststock.stockid
       order by transactionid LIMIT $start, $limit";
              


        $result=mysql_query($sql) or die("not connected");
         while($row=mysql_fetch_array($result))
         { 
           $transactionid=$row['transactionid'];
           $empid=$row['empid'];
           $empname = $row['empname'];
           $serialassestid=$row['serialassestid'];
           $assestname=$row['assestnamee'];
           $assigndate=$row['assigndate'];
           $releasedate=$row['releasedate']; 
           $slno=$row['serialno'];

        echo "<tr height=40>
         <td><input type='checkbox' value=".$transactionid." name='chkbx[]' class='resultcheckbox'></td>
         <td>".$transactionid."</td>
         <td>".$empid."</td>
         <td>".$empname."</td>
         <td>".$assestname."</td>
         <td>".$slno."</td>
         <td>".$assigndate."</td>
         <td>".$releasedate."</td>
         <td><button type='button' name='edit' onclick='editData($transactionid)'> Edit</button></td>
         </tr>";
         $rows=mysql_num_rows(mysql_query("select * from tbltransaction"));
           $total=ceil($rows/$limit);
         }
    }   echo"</table>";
     echo "<ul class='pager' id='pag'>";
      for($i=1;$i<=$total;$i++)
      {
      if($i==$page) { echo "<li ><a href='?page=".$i."'>".$i."</a></li>"; }

      else { echo "<li><a href='?page=".$i."'>".$i."</a></li>"; }
      }
      echo "</ul>";
      ?>
          
        </table>
        </div>
        </div>
      </div>
      </form>
    </div>
  </div>

	<div class="footer" height="20%" width="100%">
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