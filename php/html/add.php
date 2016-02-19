<?php
              $username = "root";
              $password = "password";
              $database="organization_detail";
              $servername = "localhost";
             

              $con=mysql_connect('localhost','root','password');
              mysql_select_db('organization_detail',$con);

                if(isset($_POST['save'])) {
               
                $empname = $_POST['empname'];
                $designation=$_POST['designation'];
                $department=$_POST['department'];
               $doj=date('Y-m-d',strtotime($_POST['doj']));
                $dol=date('Y-m-d',strtotime($_POST['dol']));

                 $sql = "INSERT INTO mas_employee ". "(empname,doj, dol, designation_id,department_id) ". 
                "VALUES('".$empname."','".$doj."', '".$dol."','".$designation."','".$department."')";
               
            
           $retval = mysql_query( $sql);
            
            if(! $retval ) {
              echo "unable to enter data";
            }


            else{
            echo "Entered data successfully\n";
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
</script>
</head>
<body>
	<div>
	<div class="header" height="20%" width="100%">
        <img src="img/lapi.jpeg" height="100px" width="100px" padding-left="10px">
        <img src="img/pendrv.jpeg" height="100px" width="100px">
        <img src="img/phn.jpeg" height="100px" width="100px">
        <img src="img/employee.jpeg" height="100px" width="100px">
        <h1 align="right"><font color="orange">Assest Management System</font></h1>
    </div>
    <div class="wrapper" height="60%" width="100%">
			<div class="link" height="100%" width="20%">
			      <ol>
			      <h1 style="color:grey;"><span style="border-bottom: solid 4px;"> Quick links</span></u></h1>
			      <a href="dashboard.php"><li type="disc">Dashboard</li></a>
            <a href="empdetail.php"><li type="disc">Employee detail</li></a>
			      
			      <a href="stockdetail.php" ><li type="disc">Stock details</li></a>
			      
			      <a href="transactiondetail.php"><li type="disc">Assignment</li></a>
			   
			      <a href="logout.php"><li type="disc">logout</li></a>
			      </ol>
		   </div>
    
      <div class="contnt" align="right" height="100%" width="80%" id="contnt">
      <div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Add Employee</h3>
  </div>
  <div class="panel-body">
               <form method = "post" action = "<?php $_PHP_SELF ?>">
                  <table width = "100%" height="100%" cellspacing = "2" 
                     cellpadding = "2">
                  
                     
                  
                     <tr>
                        <td width = "200">Employee Name:</td>
                        <td><input name = "empname" type = "text" 
                           id = "empname"></td>
                     </tr>
                     <tr>
                        <td width = "200">Employee d-o-j:</td>
                        <td><input name = "doj" type = "text" 
                           id = "doj" class="datepicker"></td>



                     </tr>
                     <tr>
                        <td width = "200">Employee d-o-l:</td>
                        <td><input name = "dol" type = "text" 
                           id = "dol" class="datepicker"></td>
                     </tr>
                  
                     <tr>
                        <td width = "200">Designation: </td>
                        <td>
                          <select name="designation">
                            <option selected="selected">select designation</option>
                            <?php
                                $select="SELECT * FROM organization_detail.mas_designation";
                                $res= mysql_query($select);

                                while($row2=mysql_fetch_array($res))
                                {
                                
                                    echo "<option value='".$row2['id']."'>".$row2['designation']."</option>";
                                  
                                }
                                ?>
                            
                                </select><br />
                              </td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Department: </td>
                         <td>
                          <select name="department">
                            <option selected="selected">select department</option>
                            <?php
                                $select1="SELECT * FROM organization_detail.mas_department";
                                $res1= mysql_query($select1);

                                while($row3=mysql_fetch_array($res1))
                                {
                                
                                    echo "<option value='".$row3['id']."'>".$row3['department']."</option>";
                                  
                                }
                                ?>
                            
                                </select><br />

                         </td></tr>
                        <tr><td></td><td>
                           <input name = "save" type = "submit" id = "save" 
                              value = "save">

                              
                           </td>                           
                     </tr>
                  
                  </table>
               </form>
           </div>
         </div>
            </div>
          </div>

  </div>
  
  <div class="footer">
      <h3 align="center">Computer assest management project<br>&copy;Relyon softech limited<br>&reg; certified company</h3>
     </div>ssss
</body>
</html>
