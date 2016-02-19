else if(isset($_POST['delete'])) {
                   
              $servername = "localhost";
              $username = "root";
              $password = "password";
              $database="organization_detail";

              $con=mysql_connect('localhost','root','password');
              mysql_select_db('organization_detail',$con);

        if(! $con ) {
               die('Could not connect: ' . mysql_error());
            }
        
            $empid = $_POST['empid'];
            
            $sql = "DELETE employee ". "WHERE empid = $empid" ;
            $retval = mysql_query( $sql, $con );
            
            if(! $retval ) {
               die('Could not delete data: ' . mysql_error());
            }
            
            echo "Deleted data successfully\n";
            
            mysql_close($con);
         }else {
            ?>
        <form method = "post" action = "<?php echo $_SERVER['PHP_SELF']; ?>">
                  <table width = "400" border = "0" cellspacing = "1" 
                     cellpadding = "2">
                     
                     <tr>
                        <td width = "100">Employee ID</td>
                        <td><input name = "emp_id" type = "text" 
                           id = "emp_id"></td>
                     </tr>
                     
                     <tr><td>
                           <input name = "delete" type = "submit" 
                              id = "delete" value = "Delete">
                        </td>
                     </tr>
                     
                  </table>
               </form>
               
            <?php
         }
      ?>