<?php
session_start();

if (isset($_SESSION['id'])) {
$_SESSION['id'];
include'connection.php';

  
  if(isset($_GET['a']))
    {
    $mysql="SELECT empid,empname,doj,dol,mas_designation.designation,mas_department.department
    FROM  php.mas_employee
    left join mas_designation on mas_employee.designation_id=php.mas_designation.id
    left join mas_department on mas_employee.department_id=php.mas_department.id where empid=".$_GET['a'];
      
      $retval1 = mysql_query( $mysql);
           
           $row1=mysql_fetch_array($retval1);
          
            $empid= $row1['empid'];
            $empname = $row1['empname'];
            $designation_id=$row1['designation_id'];
            $designation=$row1['designation'];
            $department_id=$row1['department_id'];
            $department=$row1['department'];
            $doj=date('d/m/y',strtotime($row1['doj']));
            $dol=date('d/m/y',strtotime($row1['dol']));
            $leftemp=$row1['leftemp'];
      }
            

  if(isset($_POST['submit'])) {
       {
          header("location:empdetail.php");
       }


           $empid1= $_POST['empid'];
           $empname = $_POST['empname'];
           $designation_id=$_POST['designation_id'];
           $designation=$_POST['designation'];
           $department_id=$_POST['department_id'];
           $department=$_POST['department'];
           $doj=date('Y-m-d',strtotime($_POST['doj']));
           $dol=date('Y-m-d',strtotime($_POST['dol']));
           $leftemp=$_POST['leftemp'];

          if($empid1=='')
          {

           $sql = "INSERT INTO mas_employee ". "(empname,doj, dol, designation_id,department_id,leftemp) ". 
          "VALUES('".$empname."','".$doj."', '".$dol."','".$designation."','".$department."','".$leftemp."')";

          $retval = mysql_query( $sql);

          }
          else
          {
            $mysql1="UPDATE mas_employee SET empname='".$empname."',doj='".$doj."', dol='".$dol."',
             designation_id='".$designation."',department_id='".$department."' ,leftemp='".$leftemp."'
            where empid=".$empid1;
          $retval = mysql_query( $mysql1);
          
          }
  }
?>



<html>
<head>
  <title>adddetail</title>
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
    var x = document.forms["adddetail"]["empname"].value;
     if (x == null || x == "") {
          alert("Name must be filled out");
          return false;
       }
     else{
      var del=confirm("Are you sure you want to insert this record?");
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
            <li><a href='dashboard.php'>Dashboard</a>
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
            <ul><li><a href='stockdetail.php'>Stock Detail</a></li>
            <li><a href='addstockdetail.php'> Add Stock Asset</li>
            </ul>
          <li><a href='#'>Assignment</a>
      <ul>
      <li><a href='transactiondetail.php'>Assignment Detail</a></li>
      <li><a href='addtransactiondetail.php'> Add Assignment</a>
      </li>
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
    
      <div class="contnt" align="right"  style="height: auto;" width="80%" >
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Add Employee</h3>
        </div>
        <div class="panel-body" id="cntnt"  style="height: auto;">
          <form  name="adddetail" action="<?php echo $_SERVER['PHP_SELF'];?>"
          method = "post" autocomplete="off" >
          <table border="0" width = "100%" height="60%" cellspacing = "2" 
             cellpadding = "2">
    
             <tr>
                <td><input name = "empid" type = "hidden" id = "empid" value="<?php echo $empid;?>">
                </td>
             </tr>
          
             <tr>
                <td width = "200">Employee Name:</td>
                <td><input name = "empname" type = "text" id = "empname" value= "<?php echo $empname;?>">
                </td>
             </tr>

             <tr>
                <td width = "200">Employee d-o-j:</td>
                <td><input name = "doj" type = "text" id = "doj" class="datepicker" value= "<?php echo $doj;?>">
                </td>
              </tr>

             <tr>
                <td width = "200">Employee d-o-l:</td>
                <td><input name = "dol" type = "text" id = "dol" class="datepicker" value= "<?php echo $dol;?>">
                </td>
             </tr>
          
             <tr>
                <td width = "200">Designation: </td>
                <td>
                  <select name="designation">
                    <option selected="selected">select designation</option>
                    <?php
                        $select="SELECT * FROM php.mas_designation";
                        $res= mysql_query($select);

                        while($row2=mysql_fetch_array($res))
                        {
                            echo '<option value="'. $row2['id'].'"'.($designation==$row2['designation'] ? ' selected=\"selected\"' : '') . '>' . $row2['designation'] . '</option>';
                          
                        }
                        ?>
                    
                        </select><br/>
                      </td>
              </tr>
          
             <tr>
                <td width = "100">Department: </td>
                 <td>
                  <select name="department">
                    <option selected="selected">select department</option>
                    <?php
                        $select1="SELECT * FROM php.mas_department";
                        $res1= mysql_query($select1);

                        while($row3=mysql_fetch_array($res1))
                        {
                           echo '<option value="'. $row3['id'].'"'.($department==$row3['department'] ? ' selected=\"selected\"' : '') . '>' . $row3['department'] . '</option>';
                        }
                        ?>
                    
                        </select><br />

                 </td>
             </tr>
                

             <tr>
                <td width = "200">Employee Status:</td>
                <td>
                  <select name="leftemp">
                    <option selected="selected">No</option>
                    <option >Yes</option>
                  
                    
                        </select><br/>
                      </td>
              </tr>
              <tr><td>&nbsp;</td>
                  <td>
                   <input type="submit" name="submit" value="save" id="save" onclick= "return addconfig();"></input>
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