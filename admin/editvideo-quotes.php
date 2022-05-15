<?php

include("../connection.php");
session_start();
if(!isset($_SESSION["loggedin"])){

  header("location: login-admin.php");

}



if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='edit'){

    $id=$_GET["quote_id"];
    
    $query2= "SELECT * FROM `videoquotes` WHERE `id`='$id' ";
                $res2= mysqli_query($con,$query2);
                if(mysqli_num_rows($res2)>0){
    
    $row2=mysqli_fetch_array($res2);
    
                }
    
        
    }


    if(isset($_POST['btn_update'])) 
{
  $id=$_POST['id'];
$author=$_POST['author'];
$cat_id=$_POST['cat_id'];
$cat_name=$_POST['cat_name'];
$video=$_FILES["video"]["name"];
$tmp_video=$_FILES["video"]["tmp_name"];
move_uploaded_file($tmp_video,"images/".$video);

$query= "UPDATE `videoquotes` SET `catId`='$cat_id',`auther`='$author',`videoUrl`='$video',`category`='$cat_name' WHERE `id`='$id'  ";

$res= mysqli_query($con,$query);
    if(!$res){
        echo "Not Updated";
       
    }
    
    else {
     
      echo '<script>window.location.href="video-quotes.php"</script>';
    
    }



}




include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">

        <h1 class="text-center text-white">Update Quote</h1>
          <form action="" method="post" type="form" name="form" enctype="multipart/form-data">
          <div class="row">
          
                
         <div class="col-md-9">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Update Quote</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                  <input type="hidden" name="id" value="<?php echo $row2["id"]; ?>">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Author</label>
                        <input type="text" id="author" required name="author"  value="<?php echo $row2["auther"]; ?>" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="">
                        <label for="">Update Video</label>
                        <input type="file" name="video" value="<?php echo $row2["imgUrl"]; ?>" required class="btn btn-fill btn-success" id="picture" >
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Category ID</label>
                        <!-- <input type="number" id="product_type" name="cat_id" required="[1-6]" class="form-control"> -->
                        <select  name="cat_id" class="form-control">
                        <?php 
                        
                        $query2= " SELECT * FROM `categories` ";
            $res2= mysqli_query($con,$query2);
            if(mysqli_num_rows($res2)>0){
        
               while($row2=mysqli_fetch_array($res2)){
                        
                        ?>

    <option value="<?php echo $row2["id"]; ?>"><?php echo $row2["title"]; ?></option>

    <?php
    
               }
              }

    ?>

</select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Category Name</label>
                        <!-- <input type="number" id="product_type" name="cat_id" required="[1-6]" class="form-control"> -->
                        <select  name="cat_name" class="form-control">
                        <?php 
                        
                        $query2= " SELECT * FROM `categories` ";
            $res2= mysqli_query($con,$query2);
            if(mysqli_num_rows($res2)>0){
        
               while($row2=mysqli_fetch_array($res2)){
                        
                        ?>

    <option value="<?php echo $row2["title"]; ?>"><?php echo $row2["title"]; ?></option>

    <?php
    
               }
              }

    ?>

</select>
                      </div>
                    </div>
                  
                    
                      
                  </div>
                 
                  
                
              </div>
                
                <div class="card-footer">
                  <button type="submit" id="btn_save" name="btn_update" required class="btn btn-fill btn-primary">Update Quote</button>
              </div>
              
            </div>
          </div>
          
        </div>
         </form>
            
         
            
            
          
        </div>
      </div>
      <?php
include "footer.php";
?>