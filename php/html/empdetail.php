
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
      header("location:empadd.php");
    }

  if(isset($_POST['delete'])){

    $chkid=$_POST['chkbx'];
    foreach ($chkid as $key => $value) {

    $sql4="DELETE FROM php.mas_employee WHERE empid=".$value;
    $res4=mysql_query($sql4);

    }
}

?>

<html>
<head>
  <title>Employeedetail</title>
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
      alert ("Record Deleted")
      }else{
      alert("Record Not Deleted");
      return false;

      }
      return del;
        }
  }
  function myFunction1() {
      document.getElementById("search").reset();
  }
  function editData(getdata){
    //alert('empadd.php?a='+getdata);
    window.location='empadd.php?a='+getdata;
   

  }
  function trackData(getdata){
    //alert('data.php?b='+getdata);
    window.location='data.php?b='+getdata;
   

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
        <li><a href='empdetail.php'>Employee Detail</a></li>
        <li><a href='empadd.php'>Add Employee</a></li>
        </ul>
    </li>
    <li>
      <a href='#'>Asset</a>
      <ul>
      <li><a href='assestdetail.php'>Asset Detail</a></li>
      <li><a href='assestadd.php'>Add Asset</a></li>
      </ul>
    </li>
    <li>
      <a href='#'>Stock Detail</a>
      <ul>
      <li>
      <a href='stockdetail.php'>Stock Detail</a></li>
      <li><a href='addstockdetail.php'> Add Stock Asset</li>
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
     <div class="contnt" align="right"  style="height: auto;" width="80%" id="contnt">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title"style="align: center;">Employee search
            <input type=button id='bt1' value="hide" style="float: right"; "font-color:black"; onclick="setVisibility('panel-body');";>

          </h3>
        </div>
        <div class="panel-body" id="panel-body">
        <form name="search" id="search" method="post" action="">
          <fieldset>
            <ol type="none">
              <li><label>Employee id:</label>
                <input type="text" name="empid" id="empid">
              </li>
              <span style="padding-left:60px">
              <li>
                <label>Employee Name:</label>
                <input type="text" name="empname" id="empname">
              </li>
            </ol>
                <hr>
              <input id="search" class="searchbttn" type="submit" name="search" value="Search">
              <input id="reset" class="resetbttn" type="reset" name="reset" value="Reset">
          </fieldset>
        </form>
        </div>
      </div>
      <div class="information" style="height: auto;"><hr>
      
        <form name="dlt" method ="post" id="dlt" action="<?php echo $_SERVER['PHP_SELF'];?>" >
              <input id="add" class="addbttn" type="submit" name="add" value="Add">
              <input id="delete" class="deletebttn" type="submit" name="delete" value="delete" onClick="return deletedata();">
          <hr>
          <div class="fetchng"  style="height: auto;">
           <table border='1'class="tbl">
         <tr height=40 style="background:url(img/bg1.jpeg);">
         <th width=100><input type="checkbox"></th>
         <th width=150><font color="white"><h4 align="center">Employee id</h4></font></th>
         <th width=300><font color="white"><h4 align="center">Employee Name</h4></font></th>
         <th width=250><font color="white"><h4 align="center">Designation</h4></font></th>
         <th width=250><font color="white"><h4 align="center">Department</h4></font></th>
         <th width=250><font color="white"><h4 align="center">Date of joining</h4></font></th>
         <th width=200><font color="white"><h4 align="center">Action</h4></font></th>
       </tr>

     <?php
           if(isset($_POST['search']))
           {
            $empid=$_POST['empid'];
            $empname=$_POST['empname'];

            if($empid!="" && $empname =="")
            {
              $search = 'empid='.$empid;

            }
            else if($empname!=""&& $empid =="")
            {
                $search = "empname='".$empname."'";
            }
            else if($empname!="" && $empid!="")
            {
                $search = "empname='".$empname."' and empid=".$empid;
            }

           $sql1="SELECT empid,empname,doj,dol,mas_designation.designation,mas_department.department
              FROM  php.mas_employee
              left join mas_designation on mas_employee.designation_id=php.mas_designation.id
              left join mas_department on mas_employee.department_id=php.mas_department.id
              WHERE ".$search ;

           $result1=mysql_query($sql1);
           $count = mysql_num_rows($result1);
           if($count>0)
           {
           while($row1=mysql_fetch_array($result1))
           {
           $empname = $row1['empname'];
           $empid=$row1['empid'];
           $designation=$row1['designation'];
           $department=$row1['department'];
           $doj=$row1['doj'];
           $dol=$row1['dol']; 


           echo "<tr height=40>
           <td><input type='checkbox' value=".$empid." name='chkbx[]' class='resultcheckbox'></td>
           <td>".$empid."</td>
           <td>".$empname."</td>
           <td>".$designation."</td>
           <td>".$department."</td>
           <td>".$doj."</td>
           <td><button type='button' name='edit' onclick='editData($empid)'> Edit</button>
            <button type='button' name='data' onclick='trackData($empid)'> Data</button></td>

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

       $sql="SELECT empid,empname,doj,dol,mas_designation.designation,mas_department.department
        FROM  php.mas_employee
        left join mas_designation on mas_employee.designation_id=php.mas_designation.id
        left join mas_department on mas_employee.department_id=php.mas_department.id 
        ORDER BY empid LIMIT $start, $limit";

        $result=mysql_query($sql) or die("not connected");
         while($row=mysql_fetch_array($result))
         { 
           $empname = $row['empname'];
           $empid=$row['empid'];
           $doj=$row['doj'];
           $dol=$row['dol'];
           $designation=$row['designation'];
           $department=$row['department'];

          echo "<tr height=40>
          <td><input type='checkbox' value=".$empid." name='chkbx[]' class='resultcheckbox'></td>
          <td>".$empid."</td>
          <td>".$empname."</td>
          <td>".$designation."</td>
          <td>".$department."</td>
          <td>".$doj."</td>
          <td><button type='button' name='edit' onclick='editData($empid)'> Edit</button>
          <button type='button' name='data' onclick='trackData($empid)'> Data</button></td>

          </tr>";
        $rows=mysql_num_rows(mysql_query("select * from mas_employee"));
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
          
        </div>
      </div>
      </form>
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