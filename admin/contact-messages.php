 <?php
session_start();
require_once("..//connection.php");


///pagination

 
include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
        
        
         <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Contact Messages </h4>
                
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table tablesorter " id="page1">
                    <thead class=" text-primary">
                      <tr><th>ID</th><th>Name</th><th>Email</th>
                      <th>Subject</th><th>Message</th><th>Action</th>

                      </tr></thead>
                    <tbody>
                    <?php

$sql="SELECT * FROM `contactform_db`";
$res= mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0){

while($row=mysqli_fetch_array($res)){


?>

<tr>
<td><?php echo $row["id"]; ?></td>
<td><?php echo $row["name_db"]; ?></td>
<td><?php echo $row["email_db"]; ?></td>
<td><?php echo $row["subject_db"]; ?></td>
<td><?php echo $row["message_db"]; ?></td>
<td>
<form action="" method="post">

<input type="hidden" value="<?php echo $row["id"]; ?>" name="id">
<button class="btn btn-danger" name="btn_delete" onclick="return confirm('are you sure to delete...')">delete</button>

</form>
</td>
</tr>

<?php

   }

}

else{

    echo "no data available";

   }

?>


                    </tbody>
                  </table>
                </div>
              </div>
            </div>        
           

          </div>
          
          
        </div>
      </div>
      <?php
include "footer.php";
?>