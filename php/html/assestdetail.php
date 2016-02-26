
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
      header("location:assestadd.php");
    }

  if(isset($_POST['delete'])){

    $chkid=$_POST['chkbx'];
   foreach ($chkid as $key => $value) {

    $sql4="DELETE FROM php.mas_assestitem WHERE serialassestid=".$value;
    $res4=mysql_query($sql4);

     }
   }

?>

<html>
<head>
  <title>assetdetail</title>
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
    //alert('assestadd.php?a='+getdata);
    window.location='assestadd.php?a='+getdata;
   

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

  var $table = $('table#scroll'),
      $bodyCells = $table.find('tbody tr:first').children(),
      colWidth;
  $(window).resize(function() {
      colWidth = $bodyCells.map(function() {
          return $(this).width();
      }).get();
      
      $table.find('thead tr').children().each(function(i, v) {
          $(v).width(colWidth[i]);
      });    
  }).resize();



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
              <a href='addstockdetail.php'> Add Stock Assest</li>
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
<!--<input action="action" type="button" value="Back" onclick="history.go(-1);" />
  <script>
    document.write('<a href="' + document.referrer + '">Go Back</a>');</script>-->

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
     <div class="contnt" align="right" style="height: auto;" id="contnt">
      <div class="panel panel-primary">
         <div class="panel-heading">
          <h3 class="panel-title">Asset search
            <input type=button id='bt1' value="hide" style="float: right"; "font-color:black"; onclick="setVisibility('panel-body');";></h3>
         </div>
          <div class="panel-body" id="panel-body">
          <form name="search" id="search" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
          <fieldset>
            <ol type="none">
              <li><label>Serial No:</label>
                <input type="text" name="serialassestid" id="serialassestid">
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
      <div class="information" style="height: auto;">
       <hr>
        <form name="dlt" method ="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
              <input id="add" class="addbttn" type="submit" name="add" value="add">
              <input id="delete" class="delete" type="submit" name="delete" value="delete"
              onclick=" return deletedata()">
          <hr>
             <div class="fetchng" style="height: auto;">
           <table border='1'class="tbl" style="height: auto;"> 
             <thead>
              <tr height=40 style="background:url(img/bg1.jpeg);">
              <th width=21><input type="checkbox"></th>
              <th width=80><font color="white">Assest Id</th>
              <th width=180><font color="white">Asset Name</th>
              <th width=470><font color="white">Asset description</th>
              <th width=135><font color="white">Asset Cost</th>
              <th width=85><font color="white">Action</th>
              </tr>

            </thead>

         <?php
             if(isset($_POST['search']))
             {
              $serialassestid=$_POST['serialassestid'];
              $assestnamee=$_POST['assestnamee'];

              if($serialassestid!="" && $assestnamee =="")
              {
                $search = 'serialassestid='.$serialassestid;

              }
              else if($assestnamee!=""&& $serialassestid =="")
              {
                  $search = "assestnamee='".$assestnamee."'";
              }
              else if($assestnamee!="" && $serialassestid!="")
              {
                  $search = "assestnamee='".$assestnamee."' and serialassestid=".$serialassestid;
              }

                $sql1="SELECT serialassestid,assestname_id,tblasseststock.assestnamee,description,assestcost,mas_assestname.coassestname
                FROM  php.mas_assestitem
                left join mas_assestname on mas_assestitem.assestname_id=php.mas_assestname.assestnameid
                left join tblasseststock on mas_assestitem.stock_id=php.tblasseststock.stockid
                WHERE ". $search ;

               $result1=mysql_query($sql1);
               $count = mysql_num_rows($result1);
               if($count>0)
               {
               while($row1=mysql_fetch_array($result1))
               {

               $assestnamee = $row1['assestnamee'];
               $serialassestid=$row1['serialassestid'];
               $description=$row1['description'];
               $assestcost=$row1['assestcost'];
               $coassestname=$row1['coassestname'];


               echo "<tr height= 50 >
              <td width=20><input type='checkbox' value=".$serialassestid." name='chkbx[]' class='resultcheckbox'></td>
              <td width=82>".$serialassestid."</td>
              <td width=178>".$assestnamee."</td>
              <td width=460>".$description."</td>
              <td width=131>".$assestcost."</td>
              <td width=85><button type='button' name='edit' onclick='editData($serialassestid)'> Edit</button></td>
              </tr>";
              
               }
               "</table>";  
               } 
    
            else 
               {
                   echo "<table><tr><td colspan='6'>No data found</td></tr></table>";
               }
             }
          else{

           $sql="SELECT serialassestid,tblasseststock.assestnamee,description,assestcost,mas_assestname.coassestname
            FROM  php.mas_assestitem
            left join mas_assestname on mas_assestitem.assestname_id=php.mas_assestname.assestnameid
            left join tblasseststock on mas_assestitem.stock_id=php.tblasseststock.stockid
            ORDER BY serialassestid LIMIT $start, $limit";

            $result=mysql_query($sql) or die("not connected");
             while($row=mysql_fetch_array($result))
             { 
             $assestnamee = $row['assestnamee'];
             $serialassestid=$row['serialassestid'];
             $description=$row['description'];
             $assestcost=$row['assestcost'];
             $coassestname=$row['coassestname']; 

              echo "<tr height= 50>
              <td width=20><input type='checkbox' value=".$serialassestid." name='chkbx[]' class='resultcheckbox'></td>
              <td width=80>".$serialassestid."</td>
              <td width=170>".$assestnamee."</td>
              <td width=450>".$description."</td>
              <td width=130>".$assestcost."</td>
              <td width=70><button type='button' name='edit' onclick='editData($serialassestid)'> Edit</button></td>
              </tr>";
          $rows=mysql_num_rows(mysql_query("select * from mas_assestitem"));
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