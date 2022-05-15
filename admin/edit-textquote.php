<?php

include("../connection.php");
session_start();
if(!isset($_SESSION["loggedin"])){

  header("location: login-admin.php");

}



if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='edit'){

$id=$_GET["quote_id"];

$query2= " SELECT * FROM `textquotes` WHERE `id`='$id' ";
            $res2= mysqli_query($con,$query2);
            if(mysqli_num_rows($res2)>0){

$row2=mysqli_fetch_array($res2);

            }

    
}




if(isset($_POST["btn_update"])){

    $id=$_POST["id"];
    $auther=$_POST["author"];
    $category_id=$_POST["cat_Id"];
    $category=$_POST["category"];
    $quote=mysqli_escape_string($con,$_POST["quote"]);
    $quote=htmlentities($quote);
   
  
  
   $query3="UPDATE `textquotes` SET `catId`='$category_id',`auther`='$auther',`quote`='$quote',`category`='$category' WHERE `id`='$id' ";

    
  
    $res3=mysqli_query($con,$query3);
    if($res3){
  
        echo " <script>window.location.href='text-quotes.php'</script> ";
  
    }
    else{
  
        echo "data not updated";
  
    }
  
  }




include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">

        <h1 class="text-center text-white">Update Quote</h1>
          <form action="" method="post" type="form" name="form">
          <div class="row">
          
                
         <div class="col-md-9">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Update Quote</h5>
              </div>
              <input type="hidden" name="id" value="<?php echo $row2["id"]; ?>">
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Author</label>
                        <input type="text" id="author" value="<?php echo $row2["auther"]; ?>" required name="author" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Category ID</label>
                        <!-- <input type="number" id="product_type" name="cat_id" required="[1-6]" class="form-control"> -->
                        <select  name="cat_Id" class="form-control">
                        <?php 
                        
                        $query1= " SELECT * FROM `categories` ";
            $res1= mysqli_query($con,$query1);
            if(mysqli_num_rows($res1)>0){
        
               while($row1=mysqli_fetch_array($res1)){
                        
                        ?>

    <option value="<?php echo $row1["id"]; ?>"><?php echo $row1["title"]; ?></option>

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
                        <select  name="category" class="form-control">
                        <?php 
                        
                        $query3= " SELECT * FROM `categories` ";
            $res3= mysqli_query($con,$query3);
            if(mysqli_num_rows($res3)>0){
        
               while($row3=mysqli_fetch_array($res3)){
                        
                        ?>

    <option value="<?php echo $row3["title"]; ?>"><?php echo $row3["title"]; ?></option>

    <?php
    
               }
              }

    ?>

</select>
                      </div>
                    </div>
                     <div class="col-md-12">
                      <div class="form-group">
                        <label>Quote</label>
                        <input type="text" id="product_type" name="quote" value="<?php echo $row2["quote"]; ?>" required="[1-6]" class="form-control">
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