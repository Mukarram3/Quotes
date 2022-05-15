  <?php

include("../connection.php");
session_start();
if(!isset($_SESSION["loggedin"])){

  header("location: login-admin.php");

}

if(isset($_POST['btn_image']))
{
$author=$_POST['author'];
$cat_id=$_POST['cat_id'];
$cat_name=$_POST['cat_name'];
//picture coding
$image=$_FILES['image']['name'];
$tmp_image=$_FILES['image']['tmp_name'];
$picture_size=$_FILES['image']['size'];
$id=$_SESSION["id"];

	if($picture_size<=50000000)
{	
		move_uploaded_file($tmp_image,"../images/".$image);
		
    $query= "INSERT INTO `imagesquotes` (`catId`,`auther`,`imgUrl`,`category`,`user_id`) VALUES ('$cat_id','$author','$image','$cat_name','$id') ";
    $res= mysqli_query($con,$query);
    if(!$res){
        echo "not added";
       
    }
    header("location: Image-quotes.php");
 

}

}



if(isset($_POST['btn_addvideo']))
{
$video_auth=$_POST['video_auth'];
$video_catid=$_POST['video_catid'];
$video_catname=$_POST['video_catname'];
//picture coding
$video=$_FILES['video']['name'];
$tmp_video=$_FILES['video']['tmp_name'];
$video_size=$_FILES['video']['size'];
$id=$_SESSION["id"];

if($video_size<=50000000)
{	
		move_uploaded_file($tmp_video,"../videos/".$video);
		
    $query= "INSERT INTO `videoquotes` (`catId`,`auther`,`videoUrl`,`category`,`user_id`) VALUES ('$video_catid','$video_auth','$video','$video_catname','$id') ";
    $res= mysqli_query($con,$query);
    if($res){
      header("location: video-Quotes.php");
       
    }
    
 

}

}

if(isset($_POST['btn_addtext']))
{
$text_auth=$_POST['text_auth'];
$quote=mysqli_real_escape_string($con,$_POST["quote"]);
$quote=htmlentities($quote);
$text_catid=$_POST['text_catid'];
$text_catname=$_POST['text_catname'];
$id=$_SESSION["id"];
		
   $query= "INSERT INTO `textquotes` (`catId`,`auther`,`quote`,`category`,`user_id`) VALUES ('$text_catid','$text_auth','$quote','$text_catname','$id') ";
    $res= mysqli_query($con,$query);
    if($res){
      header("location: text-quotes.php");
       
    }
    
 

}


include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">

        
          <form action="" method="post" type="form" name="form" enctype="multipart/form-data">
          <div class="row">
          
                
         <div class="col-md-9">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Add Image Quote</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Author</label>
                        <input type="text" id="author" required name="author" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="">
                        <label for="">Add Image</label>
                        <input type="file" name="image" required class="btn btn-fill btn-success" id="picture" >
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
                  <button type="submit" id="btn_save" name="btn_image" required class="btn btn-fill btn-primary">Add Quote</button>
              </div>
              
            </div>
          </div>
          
        </div>
         </form>
            
            <form action="" method="post" type="form" name="form" enctype="multipart/form-data">
          <div class="row">
          
                
         <div class="col-md-9">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Add Text Quote</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Author</label>
                        <input type="text" id="text_auth" required name="text_auth" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="">
                        <label for="">Write Quote</label>
                        <input type="text"  id="quote" name="quote" required class="form-control">
                          
                      </div>
                    </div>
                     <div class="col-md-12">
                      <div class="form-group">
                        <label>Category ID</label>
                        <!-- <input type="number" id="text_catid" name="text_catid" required="[1-6]" class="form-control"> -->
                      
                        <select  name="text_catid" class="form-control">
                        <?php 
                        
                        $query2= " SELECT * FROM `categories` ";
            $res2= mysqli_query($con,$query2);
            if(mysqli_num_rows($res2)>0){
        
               while($row2=mysqli_fetch_array($res2)){
                        
                        ?>

    <option value="<?php echo $row2["id"] ?>"><?php echo $row2["title"]; ?></option>

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
                        <!-- <input type="number" id="text_catid" name="text_catid" required="[1-6]" class="form-control"> -->
                      
                        <select  name="text_catname" class="form-control">
                        <?php 
                        
                        $query2= " SELECT * FROM `categories` ";
            $res2= mysqli_query($con,$query2);
            if(mysqli_num_rows($res2)>0){
        
               while($row2=mysqli_fetch_array($res2)){
                        
                        ?>

    <option value="<?php echo $row2["title"] ?>"><?php echo $row2["title"]; ?></option>

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
                  <button type="submit" id="btn_addtext" name="btn_addtext" required class="btn btn-fill btn-primary">Add Quote</button>
              </div>
              
            </div>
          </div>
          
        </div>
         </form>
            
            <form action="" method="post" type="form" name="form" enctype="multipart/form-data">
          <div class="row">
          
                
         <div class="col-md-9">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Add Video Quote</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Author</label>
                        <input type="text" id="video_auth" required name="video_auth" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="">
                        <label for="">Add video</label>
                        <input type="file" name="video" required class="btn btn-fill btn-success" id="video" >
                      </div>
                    </div>
                     <div class="col-md-12">
                      <div class="form-group">
                        <label>Category ID</label>
                        <!-- <input type="number" id="video_catid" name="video_catid" required="[1-6]" class="form-control"> -->
                      
                        <select  name="video_catid" class="form-control">
                        <?php 
                        
                        $query2= " SELECT * FROM `categories` ";
            $res2= mysqli_query($con,$query2);
            if(mysqli_num_rows($res2)>0){
        
               while($row2=mysqli_fetch_array($res2)){
                        
                        ?>

    <option value="<?php echo $row2["id"] ?>"><?php echo $row2["title"]; ?></option>

    <?php
    
               }
              }

    ?>

</select>

                      </div>

                    </div>
                  
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Category ID</label>
                        <!-- <input type="number" id="video_catid" name="video_catid" required="[1-6]" class="form-control"> -->
                      
                        <select  name="video_catname" class="form-control">
                        <?php 
                        
                        $query2= " SELECT * FROM `categories` ";
            $res2= mysqli_query($con,$query2);
            if(mysqli_num_rows($res2)>0){
        
               while($row2=mysqli_fetch_array($res2)){
                        
                        ?>

    <option value="<?php echo $row2["title"] ?>"><?php echo $row2["title"]; ?></option>

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
                  <button type="submit" id="btn_addvideo" name="btn_addvideo" required class="btn btn-fill btn-primary">Add Quote</button>
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