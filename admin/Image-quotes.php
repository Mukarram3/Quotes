
    <?php
session_start();
include("../connection.php");
if(!isset($_SESSION["loggedin"])){

  header("location: login-admin.php");

}
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$user_id=$_GET['user_id'];

/*this is delet quer*/
$query="DELETE FROM `imagesquotes` Where `id`='$user_id' ";
$res=mysqli_query($con,$query);
if(!$res){
    echo "no data deleted";
}
}

include "sidenav.php";
include "topheader.php";


if(isset($_POST["quote_id"]) && isset($_POST["status"])){

  $quote_id=$_POST["quote_id"];
  $status=$_POST["status"];
  $sql="UPDATE `imagesquotes` SET `status`='$status' WHERE `id`='$quote_id' ";
  $res=mysqli_query($con,$sql);
  if(!$res){
    echo $sql="UPDATE `imagesquotes` SET `status`='$status' WHERE `id`='$quote_id' ";
  }


}





?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
         <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Image Quotes</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table tablesorter table-hover" id="">
                    <thead class=" text-primary">
                      <tr><th>ID</th>
                <th>Category-ID</th>
                <th>User Id</th>
                <th>Category Name</th>
                <th>Author</th>
                <th>Image</th>
                <th>status</th>
	<th><a href="" class="btn btn-success">Action</a></th>
                    </tr></thead>
                    <tbody>
                    <?php


                    $id=$_SESSION["id"];
            
                    if($_SESSION["type"]=='admin'){

                      $query2= " SELECT * FROM `imagesquotes` ";
            $res2= mysqli_query($con,$query2);
            if(mysqli_num_rows($res2)>0){
        
               while($row2=mysqli_fetch_array($res2)){

                      ?>

<tr>

                        <td>
                        <?php echo $row2["id"]; ?></td>
                        <td><?php echo $row2["catId"]; ?></td>
                        <td><?php echo $row2["catId"]; ?></td>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $row2["auther"]; ?></td>
                        <td><img src="../images/<?php echo $row2["imgUrl"]; ?>" alt="" width="50px" height="50px"></td>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <input type="hidden" value="<?php echo $row2["id"]; ?>" name="quote_id">
                        <td><select style="background: none;border:none;color: #8b92a9;" name="status" id="" onchange="this.form.submit();">

                        <option value="<?php if($row2["status"]=="Approved"){ echo $row2["status"]; }
                        else {
                          echo "pending";
                        }
                        ?>"><?php if($row2["status"]=="Approved"){ echo "Approved"; }
                        else {
                          echo "pending";
                        }
                        ?></option>
                        <option value="<?php if($row2["status"]=="pending"){ echo "Approved"; }
                        else {
                          echo "pending";
                        }
                        ?>"><?php if($row2["status"]=="pending"){ echo "Approved"; }
                        else {
                          echo "pending";
                        }?></option>
                        </select>
                        </td>
                        </form>
                        <td>
                        <a href='editimage-quotes.php?user_id=<?php echo $row2["id"]; ?>&action=edit' type='button' rel='tooltip' title='' class='btn btn-info btn-link btn-sm' data-original-title='Edit User'>
                                <i class='material-icons'>edit</i>
                              <div class='ripple-container'></div></a>
                        <a href='Image-Quotes.php?user_id=<?php echo $row2["id"]; ?>&action=delete' type='button' rel='tooltip' title='' class='btn btn-danger btn-link btn-sm' data-original-title='Delete User'>
                                <i class='material-icons'>close</i>
                              <div class='ripple-container'></div></a>
                        </td></tr>

                      <?php

                    }

                  }

                }

                else {

                  $query2= " SELECT * FROM `imagesquotes` WHERE `user_id`='$id' ";
            $res2= mysqli_query($con,$query2);
            if(mysqli_num_rows($res2)>0){
        
               while($row2=mysqli_fetch_array($res2)){            
            
        
                    ?>
                        <tr><td>
                        <?php echo $row2["id"]; ?></td>
                        <td><?php echo $row2["catId"]; ?></td>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $row2["category"]; ?></td>
                        <td><?php echo $row2["auther"]; ?></td>
                        <td><img src="../images/<?php echo $row2["imgUrl"]; ?>" alt="" width="50px" height="50px"></td>
                        <td><?php echo $row2["status"]; ?></td>
                        <td>
                        <a href='editimage-quotes.php?user_id=<?php echo $row2["id"]; ?>&action=edit' type='button' rel='tooltip' title='' class='btn btn-info btn-link btn-sm' data-original-title='Edit User'>
                                <i class='material-icons'>edit</i>
                              <div class='ripple-container'></div></a>
                        <a href='Image-Quotes.php?user_id=<?php echo $row2["id"]; ?>&action=delete' type='button' rel='tooltip' title='' class='btn btn-danger btn-link btn-sm' data-original-title='Delete User'>
                                <i class='material-icons'>close</i>
                              <div class='ripple-container'></div></a>
                        </td></tr>
                        <?php

}
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