  
    <?php
session_start();
if(!isset($_SESSION["loggedin"])){

  header("location: login-admin.php");

}
if($_SESSION["type"]!="admin"){
  echo " <script>window.location.href='image-quotes.php'</script> ";
}
include("../connection.php");
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$user_id=$_GET['user_id'];

/*this is delet quer*/

$query="DELETE FROM `admin` WHERE `id`='$user_id' ";
$res=mysqli_query($con,$query);
if(!$res){
    echo "no data deleted";
}
else {
  unset($_SESSION["login_user"]);
}


}


if(isset($_POST['btn_save']))
{
$first_name=$_POST['name'];
$email=$_POST['email'];
$user_password=$_POST['password'];

$query= "INSERT INTO `admin` (`name`,`email`,`password`,`type`) VALUES ('$first_name','$email','$user_password','auther') ";
    $res= mysqli_query($con,$query);
    if($res){
      header("location: authers.php");
       
    }
    

}



      if(isset($_POST["auther_id"]) && isset($_POST["status"])){

        $auther_id=$_POST["auther_id"];
        $status=$_POST["status"];
        $sql="UPDATE `admin` SET `status`='$status' WHERE `id`='$auther_id' ";
        $res=mysqli_query($con,$sql);
        if(!$res){
          echo $sql="UPDATE `admin` SET `status`='$status' WHERE `id`='$quote_id' ";
        }
      
      
      }


      if(isset($_POST["auth_id"]) && isset($_POST["type"])){

        $auth_id=$_POST["auth_id"];
        $type=$_POST["type"];
        $sql="UPDATE `admin` SET `type`='$type' WHERE `id`='$auth_id' ";
        $res=mysqli_query($con,$sql);
        if(!$res){
          echo $sql="UPDATE `admin` SET `status`='$status' WHERE `id`='$quote_id' ";
        }
      
      
      }


include "sidenav.php";
include "topheader.php";
?>





<!-- Modal fade -->


<div class="modal fade" id="Modal_register" role="dialog">
    <div class="modal-dialog" style="">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <div class="wait overlay">
                    <div class="loader"></div>
                </div>
                <style>
                .input-borders {
                    border-radius: 30px;
                }
                </style>
                <!-- row -->

                <div class="container-fluid">



                    <!-- /Billing Details -->

                    <form id="" action="" method="post" class="login100-form">
                        <div class="billing-details jumbotron">
                            <div class="section-title">
                                <h2 class="login100-form-title p-b-49">Register Here</h2>
                            </div>
                            <div class="form-group ">

                                <input class="input form-control input-borders" type="text" name="name" id="f_name"
                                    placeholder="Name">
                            </div>
                            
                            <div class="form-group">
                                <input class="input form-control input-borders" type="email" name="email"
                                    placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input class="input form-control input-borders" type="password" name="password"
                                    id="password1" placeholder="password">
                            </div>
                            <div class="form-group">
                                <input class="input form-control input-borders" type="password" name="repassword"
                                    id="repassword" placeholder="confirm password">
                            </div>
                            

                            <div style="form-group">
                                <input type="submit" class="primary-btn btn-block" value="Sign Up" name="btn_save">
                            </div>
                            <div class="text-pad">
                                <a href="" data-toggle="modal" data-target="#Modal_login">Already have an Account ? then
                                    login</a>
                            </div>
                    </form>
                    <div class="login-marg">
                        <!-- Billing Details -->
                        <div class="row">

                            <div class="col-md-8" id="signup_msg">


                            </div>
                            <!--Alert from signup form-->
                        </div>
                        <div class="col-md-2"></div>
                    </div>


                </div>
            </div>



            <!-- /row -->



        </div>

    </div>

</div>
</div>


      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
        <h1 class="text-center text-white">Hello <?php echo $_SESSION["name"]; ?> Welcome!...</h1>
         <div class="col-md-14">
         <button type="button" class="btn btn-success" data-toggle="modal" data-target="#Modal_register">Add Auther</button>
            <div class="card ">
            
              <div class="card-header card-header-primary">
                <h4 class="card-title">Manage Auther</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table tablesorter table-hover" id="">
                    <thead class=" text-primary">
                      <tr>
                      <th>Id</th>
                      <th>User Name</th>
                      <th>Email</th>
                      <th>Password</th>
                      <th>Status</th>
                      <th>Type</th>
                      
               
	<th><a href="#" class="btn btn-success">Action</a></th>
                    </tr></thead>
                    <tbody>

                    <?php
            
            
            $query2= " SELECT * FROM `admin` ";
            $res2= mysqli_query($con,$query2);
            if(mysqli_num_rows($res2)>0){
        
               while($row2=mysqli_fetch_array($res2)){
        
                    ?>

                      <tr>
                      <td><?php echo $row2["id"]; ?></td>
                          <td><?php echo $row2["name"]; ?></td>
                      <td><?php echo $row2["email"]; ?></td>
                      <td><?php echo $row2["password"]; ?></td>
                      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <input type="hidden" value="<?php echo $row2["id"]; ?>" name="auther_id">
                        <td><select style="background: none;width:50px; border:none;color: #8b92a9;" name="status" id="" onchange="this.form.submit();">

                        <option value="<?php if($row2["status"]==1){ echo "1"; }
                        else {
                          echo "0";
                        }
                        ?>"><?php if($row2["status"]==1){ echo "1"; }
                        else {
                          echo "0";
                        }
                        ?></option>
                        <option value="<?php if($row2["status"]==0){ echo "1"; }
                        else {
                          echo "0";
                        }
                        ?>"><?php if($row2["status"]==0){ echo "1"; }
                        else {
                          echo "0";
                        }?></option>
                        </select>
                        </td>
                        </form>

                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <input type="hidden" value="<?php echo $row2["id"]; ?>" name="auth_id">
                        <td><select style="background: none;border:none;color: #8b92a9;width:100px" name="type" id="" onchange="this.form.submit();">

                        <option value="<?php if($row2["type"]=="auther"){ echo $row2["type"]; }
                        else {
                          echo "Admin";
                        }
                        ?>"><?php if($row2["type"]=="auther"){ echo "auther"; }
                        else {
                          echo "admin";
                        }
                        ?></option>
                        <option value="<?php if($row2["type"]=="admin"){ echo "auther"; }
                        else {
                          echo "admin";
                        }
                        ?>"><?php if($row2["type"]=="admin"){ echo "auther"; }
                        else {
                          echo "admin";
                        }?></option>
                        </select>
                        </td>
                        </form>
                        <td>
                     


<a href='editauther.php?auther_id=<?php echo $row2["id"]; ?>&&action=edit' type='button' rel='tooltip' title='' class='btn btn-info btn-link btn-sm' data-original-title='Edit User'>
                                <i class='material-icons'>edit</i>
                              <div class='ripple-container'></div></a>
                                                    
                              
<a href='authers.php?user_id=<?php echo $row2["id"]; ?>&action=delete' type='button' rel='tooltip' title='' class='btn btn-danger btn-link btn-sm' data-original-title='Delete User'>
                                <i class='material-icons'>close</i>
                              <div class='ripple-container'></div></a>
                            
                            

                      <?php
                      
                        
                    }
                }
                

?>
                    </tbody>
                  </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
      <?php
include "footer.php";
?>