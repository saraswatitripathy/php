<?php
session_start();
$page=1;
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
      header("location:addstockdetail.php");
    }

  if(isset($_POST['delete'])){

    $chkid=$_POST['chkbx'];
    foreach ($chkid as $key => $value) {

    $sql4="DELETE FROM php.tblasseststock WHERE stockid=".$value;
    $res4=mysql_query($sql4);

   }
 }
?>


<html>
<head>
  <title>stockdetail</title>
  <link href="login.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="bootstrap-3.3.6-dist/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="bootstrap-3.3.6-dist/css/bootstrap.min.css">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
    //alert('addstockdetail.php?a='+getdata);
    window.location='addstockdetail.php?a='+getdata;
   

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
     <div class="contnt" align="right" height="100%" width="80%">
     	<div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Stock search
            <input type=button id='bt1' value="hide" style="float: right"; "font-color:black"; onclick="setVisibility('panel-body');";></h3>
        </div>
        <div class="panel-body" id="panel-body">
          <form name="search" id="search" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" autocomplete="off">
          <fieldset>
            <ol type="none">
              <li><label>stock Id:</label>
                <input type="text" name="stockid" id="stockid">
              </li>
              <span style="padding-left:60px">
              <li>
                <label>Asset Name:</label>
                <input type="text" name="assestnamee" id="assestnamee">
              </li>
            </ol>
                <hr>
              <input id="search" class="searchbttn" type="submit" name="search" value="Search">
              <input id="reset" class="resetbttn" type="reset" name="reset" value="Reset">
          </fieldset>
        </form>
        </div>
      </div>
      <div class="information"><hr>
    
      <form name="dlt" method ="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
          <input id="add" class="addbttn" type="submit" name="add" value="add">
          <input id="delete" class="deletebttn" type="submit" name="delete" value="delete" onClick="return deletedata();">
       <hr>
       <div class="fetchng"style="height: auto;">
       <table border='1' class="tbl">
       <tr height=40 style="background:url(img/bg1.jpeg);">
       <th width=100><input type="checkbox"></th>
       <th width=100><font color="white"><h4 align="center">Stock id</h4></th>
       <th width=290><font color="white"><h4 align="center">Asset Name</h4></th>
       <th width=100><font color="white"><h4 align="center">Quantity</h4></th>
       <th width=160><font color="white"><h4 align="center">Total count</h4></th>
       <th width=180><font color="white"><h4 align="center">Purchase Date</h4></th>
       <th width=220><font color="white"><h4 align="center">Vender Name</h4></th>
       <th width=160><font color="white"><h4 align="center">Website</h4></th>
       <th width=160><font color="white"><h4 align="center">Status</th>
       <th width=90><font color="white"><h4 align="center">Action</h4></th>
       </tr>



     <?php
        if(isset($_POST['search']))
         {
          $stockid=$_POST['stockid'];
          $assestname=$_POST['assestnamee'];

          if($stockid!="" && $assestname =="")
          {
            $search = "stockid='".$stockid."'";

          }
          else if($assestname!=""&& $stockid =="")
          {
              $search = "assestnamee='".$assestname."'";
          }
          else if($assestname!="" && $stockid!="")
          {
              $search = "assestnamee='".$assestname."' and stockid='".$stockid."'";
          }

        $sql1="select stockid,quantity,tblasseststock.assestnamee,mas_vendor.vname,mas_vendor.website,mas_vendor.address,
        asseststatus.assetstatus,tblasseststock.purchasedate,
          if((tblasseststock.quantity-count(mas_assestitem.serialassestid)) = 0,0,
          (tblasseststock.quantity-count(mas_assestitem.serialassestid))) as totalcount from tbltransaction 
          left join mas_assestitem on tbltransaction.serialassest_id2 = mas_assestitem.serialassestid
          right join tblasseststock on tblasseststock.stockid = mas_assestitem.stock_id
          left join mas_vendor on mas_vendor.vid = tblasseststock.vendor_id 
          left join asseststatus on asseststatus.statusid = tblasseststock.statusid1 WHERE $search
        group by tblasseststock.stockid order by stockid ";

         $result=mysql_query($sql1) or die("not connected");
          $count = mysql_num_rows($result);
         if($count>0)
         {
         while($row1=mysql_fetch_array($result))
         { 
          
         $assestname = $row1['assestnamee'];
          $query= "select stockid,tblasseststock.assestnamee,count(serialassestid) as stckcount from tbltransaction
            left join mas_assestitem on tbltransaction.serialassest_id2 = mas_assestitem.serialassestid
            left join mas_employee on tbltransaction.emp_id = mas_employee.empid
            left join tblasseststock on tblasseststock.stockid = mas_assestitem.stock_id
            where leftemp ='yes'and stockid=".$row['stockid']." group by tblasseststock.stockid order by stockid;";
          $result1=mysql_query($query) ;
          $count=mysql_num_rows($result1);
          if($count>0)
          {
              $fetch=mysql_fetch_array($result1);
              $totalcount1=$row1['totalcount']+$fetch['stckcount'];
          }
          else
          {
            $totalcount1=$row1['totalcount'];
          }

          $assestname = $row1['assestnamee'];
          $quantity=$row1['quantity'];
           $vname=$row1['vname'];
          $website=$row1['website'];
          $purchasedate=$row1['purchasedate'];
          $assetstatus=$row1['assetstatus'];
           

        echo "<tr height=40>
        <td><input type='checkbox' value=".$row1['stockid']." name='chkbx[]' class='resultcheckbox'></td>
        <td>".$row1['stockid']."</td>
        <td>".$assestname."</td>
        <td>".$quantity."</td>
        <td>".$totalcount1."</td>
        <td>".$purchasedate."</td>
        <td>".$vname."</td>
        <td>".$website."</td>
         <td>".$assetstatus."</td>
        <td><button type='button' name='edit' onclick='editData(".$row1['stockid'].")'> Edit</button></td>
         </tr>";
         }
         "</table>";  
         }

    else
         {
             echo "<table><tr><td colspan='2'>No data found</td></tr></table>";
         }
     }

   else{

       $sql="select stockid,quantity,tblasseststock.assestnamee,mas_vendor.vname,mas_vendor.website,mas_vendor.address,
       asseststatus.assetstatus,tblasseststock.purchasedate,
          if((tblasseststock.quantity-count(mas_assestitem.serialassestid)) = 0,0,
          (tblasseststock.quantity-count(mas_assestitem.serialassestid))) as totalcount from tbltransaction 
          left join mas_assestitem on tbltransaction.serialassest_id2 = mas_assestitem.serialassestid
          right join tblasseststock on tblasseststock.stockid = mas_assestitem.stock_id
          left join mas_vendor on mas_vendor.vid = tblasseststock.vendor_id
          left join asseststatus on asseststatus.statusid = tblasseststock.statusid1
          group by tblasseststock.stockid ORDER BY stockid  LIMIT $start, $limit";

        $result=mysql_query($sql) or die("not connected");
         while($row=mysql_fetch_array($result))
         { 
            
           $assestname = $row['assestnamee'];
            $query= "select stockid,tblasseststock.assestnamee,count(serialassestid) as stckcount from tbltransaction
            left join mas_assestitem on tbltransaction.serialassest_id2 = mas_assestitem.serialassestid
            left join mas_employee on tbltransaction.emp_id = mas_employee.empid
            left join tblasseststock on tblasseststock.stockid = mas_assestitem.stock_id
            where leftemp ='yes'and stockid=".$row['stockid']." group by tblasseststock.stockid order by stockid LIMIT $start, $limit;";
            $result1=mysql_query($query) ;
            $count=mysql_num_rows($result1);
            if($count>0)
            {
                $fetch=mysql_fetch_array($result1);
                $totalcount1=$row['totalcount']+$fetch['stckcount'];
            }
            else
            {
              $totalcount1=$row['totalcount'];
            }

           $assestname = $row['assestnamee'];
           $quantity=$row['quantity'];
            $vname=$row['vname'];
           $website=$row['website'];
           $purchasedate=$row['purchasedate'];
            $assetstatus=$row['assetstatus'];

          echo "<tr height=40>
          <td><input type='checkbox' value=".$row['stockid']." name='chkbx[]' class='resultcheckbox'></td>
          <td>".$row['stockid']."</td>
          <td>".$assestname."</td>
          <td>".$quantity."</td>
          <td>".$totalcount1."</td>
          <td>".$purchasedate."</td>
          <td>".$vname."</td>
          <td>".$website."</td>
           <td>".$assetstatus."</td>
          <td><button type='button' name='edit' onclick='editData(".$row['stockid'].")'> Edit</button></td>
           </tr>";
        
      
           $rows=mysql_num_rows(mysql_query("select * from tblasseststock"));
           $total=ceil($rows/$limit);
         }
    }   echo"</table>";
     echo "<ul class='pager' id='pag'>";
      for($i=1;$i<=$total;$i++)
      {
        if($page==$i){
      echo "<li ><a href='?page=".$i."'><font color='red'>".$i."</font></a></li>"; 

 
      }
      else{echo "<li ><a href='?page=".$i."'>".$i."</a></li>"; 

     }
    }
      echo "</ul>";
      ?>
            </table>
          </form>
          <hr>

            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" align="right">
  Read about faulty asset
</button>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Deafult Asset details</h4> </div>
      <div class="modal-body">
       <table border='1' class="tbl">
       <tr height=35 style="background:url(img/bg1.jpeg);">
       <th width=100><font color="white">Stock id</th>
       <th width=210><font color="white">Assest Name</th>
       <th width=170><font color="white">Serial No</th>
       <th width=170><font color="white">Purchase Date</th>
       <th width=200><font color="white">Vender Name</th>
       <th width=160><font color="white">Website</th>
       <th width=120><font color="white">Status</th>
        <th width=180><font color="white">Remarks</th>
       </tr>
       </tr>
       <?php

       $sql1="select  stockid,tblasseststock.assestnamee,mas_vendor.vname,mas_vendor.website,mas_vendor.address,
       mas_assestitem.serialno,remarks1,
       asseststatus.assetstatus,tblasseststock.purchasedate from php.tblasseststock
      left join mas_vendor on mas_vendor.vid=php.tblasseststock.vendor_id
      left join asseststatus on asseststatus.statusid=php.tblasseststock.statusid1
      left join mas_assestitem on mas_assestitem.stock_id=php.tblasseststock.stockid
      where statusid1=2";

        $result=mysql_query($sql1) or die("not connected");
         while($row=mysql_fetch_array($result))
         { 
            
          
           $serialno = $row['serialno'];
           $assestname = $row['assestnamee'];
           $vname=$row['vname'];
           $website=$row['website'];
           $purchasedate=$row['purchasedate'];
           $assetstatus=$row['assetstatus'];
           $remarks1=$row['remarks1'];
           

          echo "<tr height=40>
          <td>".$row['stockid']."</td>
          <td>".$assestname."</td>
          <td>".$serialno."</td>
          <td>".$purchasedate."</td>
          <td>".$vname."</td>
          <td>".$website."</td>
          <td>".$assetstatus."</td>
          <td>".$remarks1."</td>
           </tr>";
        
      
         }
       echo"</table>";

      ?>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>


<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal1" align="left">
  Read about maintenance
</button>
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Asset Maintenance details</h4> </div>
      <div class="modal-body">
       <table border='1' class="tbl">
       <tr height=40 style="background:url(img/bg1.jpeg);">
       <th width=100><font color="white">Stock id</th>
       <th width=210><font color="white">Assest Name</th>
       <th width=170><font color="white">Serial No</th>
       <th width=170><font color="white">Purchase Date</th>
       <th width=200><font color="white">Vender Name</th>
       <th width=160><font color="white">Website</th>
        <th width=180><font color="white">Remarks</th>
       </tr>
       </tr>

       <?php

       $sql2="select tblasseststock.stockid, tblasseststock.assestnamee, mas_assestitem.serialno,tblasseststock.purchasedate,
        mas_vendor.vname,mas_vendor.website ,remarks from tbltransaction 
        left join tblasseststock on tblasseststock.stockid= php.tbltransaction.stock_id1 
        left join mas_assestitem on mas_assestitem.serialassestid= php.tbltransaction.serialassest_id2
        left join mas_vendor on mas_vendor.vid= php.tbltransaction.v_id
        where remarks='not working properly'";

        $result1=mysql_query($sql2) or die("not connected");
         while($row1=mysql_fetch_array($result1))
         { 
            
          
           $serialno = $row1['serialno'];
           $assestname = $row1['assestnamee'];
           $vname=$row1['vname'];
           $website=$row1['website'];
           $purchasedate=$row1['purchasedate'];
           $assetstatus=$row1['assetstatus'];
           $remarks=$row1['remarks'];
           

          echo "<tr height=40>
          <td>".$row1['stockid']."</td>
          <td>".$assestname."</td>
          <td>".$serialno."</td>
          <td>".$purchasedate."</td>
          <td>".$vname."</td>
          <td>".$website."</td>
          <td>".$remarks."</td>
           </tr>";
        
      
         }
       echo"</table>";

      ?>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>
    </div>
</div>
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