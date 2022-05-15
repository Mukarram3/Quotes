  
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

$query="DELETE FROM `user` WHERE `id`='$user_id' ";
$res=mysqli_query($con,$query);
if(!$res){
    echo "no data deleted";
}
else {
  unset($_SESSION["login_user"]);
}

}



if(isset($_POST["signup_button"])){
  // echo ("hello");
      $fname=$_POST["f_name"];
      $lname=$_POST["l_name"];
      $email=$_POST["email"];
      $password=$_POST["password"];
      $mobile=$_POST["mobile"];
      $address=$_POST["address"];
      $city=$_POST["city"];  
      $sql="INSERT INTO `user` (`fname`,`lname`,`email`,`pass`,`mobile`,`address`,`city`) VALUES ('$fname','$lname','$email','$password','$mobile','$address','$city')";
    
       
    
      $res = mysqli_query($con,$sql);
      
      if(!$res){
        echo "data  not submitted";
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

                                <input class="input form-control input-borders" type="text" name="f_name" id="f_name"
                                    placeholder="First Name">
                            </div>
                            <div class="form-group">

                                <input class="input form-control input-borders" type="text" name="l_name" id="l_name"
                                    placeholder="Last Name">
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
                            <div class="form-group">
                                <input class="input form-control input-borders" type="text" name="mobile" id="mobile"
                                    placeholder="mobile">
                            </div>
                            <div class="form-group">
                                <input class="input form-control input-borders" type="text" name="address" id="address1"
                                    placeholder="Address">
                            </div>
                            <div class="form-group">
                                <input class="input form-control input-borders" type="text" name="city" id="address2"
                                    placeholder="City">
                            </div>

                            <div style="form-group">
                                <input type="submit" class="primary-btn btn-block" value="Sign Up" name="signup_button">
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
         <button type="button" class="btn btn-success" data-toggle="modal" data-target="#Modal_register">Add User</button>
            <div class="card ">
            
              <div class="card-header card-header-primary">
                <h4 class="card-title">Manage User</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table tablesorter table-hover" id="">
                    <thead class=" text-primary">
                      <tr><th>User Name</th>
                      <th>Email</th>
                      <th>Password</th>
                      <th>Mobile NO</th>
                      <th>Address</th>
                      <th>City</th>
               
	<th><a href="#" class="btn btn-success">Action</a></th>
                    </tr></thead>
                    <tbody>

                    <?php
            
            
            $query2= " SELECT * FROM `user` ";
            $res2= mysqli_query($con,$query2);
            if(mysqli_num_rows($res2)>0){
        
               while($row2=mysqli_fetch_array($res2)){
        
                    ?>

                      <tr><td><?php echo $row2["fname"]." ".$row2["lname"]; ?></td>
                      <td><?php echo $row2["email"]; ?></td>
                      <td><?php echo $row2["pass"]; ?></td>
                      <td><?php echo $row2["mobile"]; ?></td>
                      <td><?php echo $row2["address"]; ?></td>
                      <td><?php echo $row2["city"]; ?></td>
                      
                        <td>
                        <?php if(isset($_SESSION["login_user"])){

                          if($_SESSION["user_id"]==$row2["id"]){
                            echo "";
                          }
                          else {
                            
                          

?>


<a href='edituser.php?user_id=<?php echo $row2["id"]; ?>&&action=edit' type='button' rel='tooltip' title='' class='btn btn-info btn-link btn-sm' data-original-title='Edit User'>
                                <i class='material-icons'>edit</i>
                              <div class='ripple-container'></div></a>
                        


    <?php
                          }

                         }

else {

?>

<a href='edituser.php?user_id=<?php echo $row2["id"]; ?>&&action=edit' type='button' rel='tooltip' title='' class='btn btn-info btn-link btn-sm' data-original-title='Edit User'>
                                <i class='material-icons'>edit</i>
                              <div class='ripple-container'></div></a>
                        
  
<?php

}

                          
                          ?>


<a href='index.php?user_id=<?php echo $row2["id"]; ?>&action=delete' type='button' rel='tooltip' title='' class='btn btn-danger btn-link btn-sm' data-original-title='Delete User'>
                                <i class='material-icons'>close</i>
                              <div class='ripple-container'></div></a>
                        
                        </td></tr>
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