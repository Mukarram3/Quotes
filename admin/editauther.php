
    <?php
session_start();
include("../connection.php");
if($_SESSION["type"]!="admin"){
    echo " <script>window.location.href='image-quotes.php'</script> ";
  }
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='edit'){
    $id=$_GET['auther_id'];
    $query2= " SELECT * FROM `admin` WHERE `id`='$id' ";
            $res2= mysqli_query($con,$query2);
            if(mysqli_num_rows($res2)>0){
        
               $row2=mysqli_fetch_array($res2);
}

}



if(isset($_POST['btn_save'])) 
{
  $id=$_POST['user_id'];
$first_name=$_POST['first_name'];
$email=$_POST['email'];
$user_password=$_POST['password'];

$query= "UPDATE `admin` SET `name`='$first_name',`email`='$email',`password`='$user_password' WHERE `id`='$id'  ";

$res= mysqli_query($con,$query);
    if(!$res){
        echo "Not Updated";
       
    }
    
    else {
     
      echo '<script>window.location.href="authers.php"</script>';
    
    }



}
include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
        <div class="col-md-5 mx-auto">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Edit Auther</h5>
              </div>
              <form action="" name="form" method="post">
              <div class="card-body">
                
                  <input type="hidden" name="user_id" id="user_id" value="<?php echo $row2["id"]; ?>" />
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Auther Name</label>
                        <input type="text" id="first_name" name="first_name"  class="form-control" value="<?php echo $row2["name"]; ?>" >
                      </div>
                    </div>
                    
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email"  id="email" name="email" class="form-control" value="<?php echo $row2["email"]; ?>">
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label >Password</label>
                        <input type="text" name="password" id="password" class="form-control" value="<?php echo $row2["password"]; ?>">
                      </div>
                    </div>
                    
                    
                  
                  
                
              </div>
              <div class="card-footer">
                <button type="submit" id="btn_save" name="btn_save" class="btn btn-fill btn-primary">Update</button>
              </div>
              </form>    
            </div>
          </div>
         
          
        </div>
      </div>
      <?php
include "footer.php";
?>