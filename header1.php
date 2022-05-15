<?php 

require_once("connection.php");

if(isset($_GET["action"]) && $_GET["action"]=="logout_user"){
    unset($_SESSION["login_user"]);
   // header("location: work.php");
   echo "<script>window.location.href='index.php'</script>";
}

// var_dump($_POST);   
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


    
if(isset($_POST["login_submit"])){
   
    $email=$_POST["email"];
    $password=$_POST["password"];
    
    $sql="SELECT * FROM `user` WHERE `email`='$email' AND `pass`='$password' ";
  
     
  
    $res = mysqli_query($con,$sql);
    
    if($res){

        $_SESSION["login_user"]=true;
         $row=mysqli_fetch_array($res);
            $_SESSION["user_id"]=$row["id"];
         

        
        
        
    //   header("location: index.php");
echo '<script>window.location.href="index.php"</script>';      
}
    else{
      echo "data not submitted";
    }


    }



    if(isset($_POST["favourite_image"])){
        $id=$_POST["id"];
        $user_id=$_SESSION["user_id"];
    
            $query= "INSERT INTO `favourities` (`user_id`,`quote_id`,`type`) VALUES ('$user_id','$id','image') ";
        $res= mysqli_query($con,$query);
        if(!$res){
            echo "not added";
           
        }
    
        }


        if(isset($_POST["fav_text"])){
            $id=$_POST["text_quote_id"];
            $user_id=$_SESSION["user_id"];
        
                $query= "INSERT INTO `favourities` (`user_id`,`quote_id`,`type`) VALUES ('$user_id','$id','text') ";
            $res= mysqli_query($con,$query);
            if(!$res){
                echo "not added";
               
            }
        
            }



        if(isset($_POST["favourite_video"])){
            $id=$_POST["id"];
            $user_id=$_SESSION["user_id"];
        
                $query= "INSERT INTO `favourities` (`user_id`,`quote_id`,`type`) VALUES ('$user_id','$id','video') ";
            $res= mysqli_query($con,$query);
            if(!$res){
                echo "not added";
               
            }
        
            }



        if(isset($_POST["sub_image"])){
            $auther=$_POST["auther_img"];
            $user_id=$_SESSION["user_id"];
            $query= "INSERT INTO `subscribed` (`sub_quote_auther`,`sub_user_id`,`sub_type`) VALUES ('$auther','$user_id','image') ";
           
            $res= mysqli_query($con,$query);
            if(!$res){
                echo "not added";
               
            }
        }


        if(isset($_POST["sub_text"])){
            $id=$_SESSION["user_id"];
            $auther=$_POST["auther_text"];
            $query= "INSERT INTO `subscribed` (`sub_quote_auther`,`sub_user_id`,`sub_type`) VALUES ('$auther','$id','text') ";
          
            $res= mysqli_query($con,$query);
            if(!$res){
                echo "not added";
               
            }
        }


        if(isset($_POST["sub_video"])){
            $id=$_SESSION["user_id"];
            $auther=$_POST["video_auther"];
            $query= "INSERT INTO `subscribed` (`sub_quote_auther`,`sub_user_id`,`sub_type`) VALUES ('$auther','$id','video') ";
           
            $res= mysqli_query($con,$query);
            if(!$res){
                echo "not added";
               
            }
        }



        if(isset($_POST["unsub_image_auther"])){
            $id=$_POST["sub_id"];
            $query="DELETE FROM `subscribed` WHERE `sub_id`='$id' ";
            $res=mysqli_query($con,$query);
            if(!$res){
                echo "data deleted";
            }
        
        }
        
        
        
        if(isset($_POST["unsub_text_auther"])){
            $id=$_POST["sub_id"];
            $query="DELETE FROM `subscribed` WHERE `sub_id`='$id' ";
            $res=mysqli_query($con,$query);
            if(!$res){
                echo "data deleted";
            }
        
        }
        
        
        
        if(isset($_POST["unsub_video_auther"])){
            $id=$_POST["sub_id"];
            $query="DELETE FROM `subscribed` WHERE `sub_id`='$id' ";
            $res=mysqli_query($con,$query);
            if(!$res){
                echo "data deleted";
            }
        
        }
        





?>











<!-- HEADER -->
<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">

            <ul class="header-links pull-right">
                <li><a href="#"><i class="fa fa-inr"></i> INR</a></li>
                <li>
                    <div class="dropdownn">
                        <a href="#" class="dropdownn" data-toggle="modal" data-target="#myModal"><i
                                class="fa fa-user-o"></i> My Account</a>
                        <div class="dropdownn-content">

                            <?php 
                                  
                                  if(!isset($_SESSION["login_user"])){
                                      echo '<a href="" data-toggle="modal" data-target="#Modal_login"><i class="fa fa-sign-in" aria-hidden="true" ></i>Login</a>';
                                  }

                                    if(!isset($_SESSION["login_user"])){
                                        echo '<a href="" data-toggle="modal" data-target="#Modal_register"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a>';
                                    } 
                                    
                                    if(isset($_SESSION["login_user"])){
                                        echo '<a href="?action=logout_user"><i class="fa fa-user-plus" aria-hidden="true"></i>Logout</a>';
                                    }
                                    
                                    ?>

                        </div>
                    </div>
                </li>
            </ul>

        </div>
    </div>
    <!-- /TOP HEADER -->



    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="index.php" class="logo">
                            <font style="font-style:normal; font-size: 33px;color: aliceblue;font-family: serif">
                                Online Quotes
                            </font>

                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form>
                            <select class="input-select">

                            <?php

$query2=" SELECT * FROM `categories` Limit 4 ";
$res2=mysqli_query($con,$query2);
if(mysqli_num_rows($res2)){

    while($row2=mysqli_fetch_array($res2)){
    
   ?>
                        <a href="<?php echo $row2["page-url"]; ?>">   <option value="0"><?php echo $row2["title"]; ?></option></a>

<?php
}
}
?>                                

                            </select>
                            <input class="input" id="search" type="text" placeholder="Search here">
                            <button type="submit" id="search_btn" class="search-btn">Search</button>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">


                        <!-- Cart -->
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Your Subscribed</span>
                                <div class="badge qty"></div>
                            </a>
                            <div class="cart-dropdown">
                                <div class="cart-list" id="cart_product">

<?php


if(isset($_SESSION["login_user"])){

    $id=$_SESSION["user_id"];
    $query=" SELECT * FROM `subscribed` sub LEFT JOIN `imagesquotes` img ON sub.sub_quote_auther=img.auther WHERE sub.sub_user_id='$id' AND sub.sub_type='image' ";
    $res=mysqli_query($con,$query);
    if(mysqli_num_rows($res)>0){
        while($row=mysqli_fetch_array($res)){

      ?>

                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="images/<?php echo $row["imgUrl"]; ?>" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="subscribed.php"><?php echo $row["auther"]; ?></a></h3>
                                            <h4 class="product-price"><?php echo $row["category"]; ?></h4>
                                        </div>

                                    </div>

<?php


}
}

}


?>


<?php

if(isset($_SESSION["login_user"])){

$id=$_SESSION["user_id"];
$query=" SELECT * FROM `subscribed` sub LEFT JOIN `textquotes` t ON sub.sub_quote_auther=t.auther WHERE sub.sub_user_id='$id' AND sub.sub_type='text' ";
$res=mysqli_query($con,$query);
if(mysqli_num_rows($res)>0){
    while($row=mysqli_fetch_array($res)){

  ?>

                                    <div class="product-widget">
                                        <div class="product-img">
                                           <?php echo $row["quote"]; ?>
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="subscribed.php"><?php echo $row["auther"]; ?></a></h3>
                                            <h4 class="product-price"><?php echo $row["category"]; ?></h4>
                                        </div>

                                    </div>

                                    <?php


}
}

}


?>

<?php

if(isset($_SESSION["login_user"])){

$id=$_SESSION["user_id"];
$query=" SELECT * FROM `subscribed` sub LEFT JOIN `videoquotes` v ON sub.sub_quote_auther=v.auther WHERE sub.sub_user_id='$id' AND sub.sub_type='video' ";
$res=mysqli_query($con,$query);
if(mysqli_num_rows($res)>0){
    while($row=mysqli_fetch_array($res)){

  ?>


                                    <div class="product-widget">
                                        <div class="product-img">
                                        <video src="<?php echo $row["videoUrl"]; ?>" controls></video>
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="subscribed.php"><?php echo $row["auther"]; ?></a></h3>
                                            <h4 class="product-price"><?php echo $row["category"]; ?></h4>
                                        </div>

                                    </div>

                                    
                                <?php


}
}

}


?>

                                </div>


                                

                                <div class="cart-btns">
                                    <a href="subscribed.php" style="width:100%;"><i class="fa fa-edit"></i> edit cart</a>

                                </div>
                            </div>

                        </div>
                        <!-- /Cart -->

                        <!-- Cart -->
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Your Favourites</span>
                                <div class="badge qty"></div>
                            </a>
                            <div class="cart-dropdown">
                                <div class="cart-list" id="cart_product">

                                    <?php 
                    
                    if(isset($_SESSION["login_user"])){
                    
                                    // if(isset($_POST["favourite_image"])){
                                        $id=$_SESSION["user_id"];
                                    
                                      $query1= " SELECT * FROM favourities f LEFT JOIN  imagesquotes img ON img.id=f.quote_id WHERE f.user_id='$id' AND f.type='image' ";
                                                $res1= mysqli_query($con,$query1);

                                                if(mysqli_num_rows($res1)>0){
                                                


                                                   while($row1=mysqli_fetch_array($res1)){
                                    
                                    ?>


                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="images/<?php echo $row1["imgUrl"]; ?>" alt="">
                                        </div>
                                        <div class="product-body">
                                            <form action="" method="post">

                                                <input type="hidden" value="<?php echo $row1["id"] ?>" name="id">

                                                <h3 class="product-name"><a
                                                        href='favourites.php'><?php echo $row1["auther"]; ?></a>
                                                </h3>

                                            </form>
                                            <h4 class="product-price"><?php echo $row1["category"]; ?></h4>
                                        </div>


                                    </div>


                                    <?php 
            
        }
                                    
                                    
    }

    
}
else {
    echo "login first";
}

    // }
            
            ?>



<?php 
                    
                    if(isset($_SESSION["login_user"])){
                    
                                    // if(isset($_POST["favourite_image"])){
                                        $id=$_SESSION["user_id"];
                                    
                                      $query1= " SELECT * FROM favourities f LEFT JOIN  textquotes t ON t.id=f.quote_id WHERE f.user_id='$id' AND f.type='text' ";
                                                $res1= mysqli_query($con,$query1);

                                                if(mysqli_num_rows($res1)>0){
                                                


                                                   while($row1=mysqli_fetch_array($res1)){
                                    
                                    ?>


                                    <div class="product-widget">
                                        <div class="product-img">
                                            <?php echo $row1["quote"]; ?>
                                        </div>
                                        <div class="product-body">
                                            <form action="" method="post">

                                                <input type="hidden" value="<?php echo $row1["id"] ?>" name="id">

                                                <h3 class="product-name"><a
                                                        href='favourites.php'><?php echo $row1["auther"]; ?></a>
                                                </h3>

                                            </form>
                                            <h4 class="product-price"><?php echo $row1["category"]; ?></h4>
                                        </div>


                                    </div>


                                    <?php 
            
        }
                                    
                                    
    }

    
}
else {
    echo "login first";
}

    // }
            
            ?>







                                    <?php 
                    
                    if(isset($_SESSION["login_user"])){
                    
                                    // if(isset($_POST["favourite_image"])){
                                        $id=$_SESSION["user_id"];
                                    
                                      $query1= " SELECT * FROM favourities f LEFT JOIN  videoquotes v ON v.id=f.quote_id WHERE f.user_id='$id' AND f.type='video' ";
                                                $res1= mysqli_query($con,$query1);

                                                if(mysqli_num_rows($res1)>0){
                                                


                                                   while($row1=mysqli_fetch_array($res1)){
                                    
                                    ?>



                                    <div class="product-widget">
                                        <div class="product-img">

                                            <video src="<?php echo $row1["videoUrl"]; ?>" controls></video>
                                        </div>
                                        <div class="product-body">
                                            <form action="" method="post">

                                                <input type="hidden" value="<?php echo $row1["id"] ?>" name="id">

                                                <h3 class="product-name"><a
                                                        href='favourites.php'><?php echo $row1["auther"]; ?></a>
                                                </h3>

                                            </form>
                                            <h4 class="product-price"><?php echo $row1["category"]; ?></h4>
                                        </div>

                                        </div>


                                    <?php 
            
        }
                                    
                                    
    }

    
}
else {
    echo "login first";
}

    // }
            
            ?>



                                    <div class="cart-btns">
                                        <a href="favourites.php" style="width:100%;"><i class="fa fa-edit"></i> edit
                                            cart</a>

                                    </div>
                                </div>

                            </div>
                            <!-- /Cart -->

                            <!-- Menu Toogle -->
                            <div class="menu-toggle">
                                <a href="#">
                                    <i class="fa fa-bars"></i>
                                    <span>Menu</span>
                                </a>
                            </div>
                            <!-- /Menu Toogle -->
                        </div>
                    </div>
                    <!-- /ACCOUNT -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->
<nav id='navigation'>
    <!-- container -->
    <div class="container" id="get_category_home">

        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">

<?php

$query2=" SELECT * FROM `categories` ";
$res2=mysqli_query($con,$query2);
if(mysqli_num_rows($res2)){

    while($row2=mysqli_fetch_array($res2)){
    
   ?>

                <li class=""><a href="<?php echo $row2["page-url"]; ?>"><?php echo $row2["title"]; ?></a></li>
                
<?php

}

}

?>

<li><a href="favourites.php">Favourites</a></li>
<li><a href="subscribed.php">Subscribed</a></li>

            </ul>
            <!-- /NAV -->
        </div>

    </div>
    <!-- responsive-nav -->

    <!-- /container -->
</nav>


<!-- NAVIGATION -->

<div class="modal fade" id="Modal_login" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">

                <div class="wait overlay">
                    <div class="loader"></div>
                </div>
                <div class="container-fluid">
                    <!-- row -->


                    <div class="login-marg">
                        <!-- Billing Details -->


                        <!-- /Billing Details -->


                        <form class="login100-form " method="post">
                            <div class="billing-details jumbotron">
                                <div class="section-title">
                                    <h2 class="login100-form-title p-b-49">Login Here</h2>
                                </div>


                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input class="input input-borders" type="email" name="email" placeholder="Email"
                                        id="email3" required>
                                </div>

                                <div class="form-group">
                                    <label for="email">Password</label>
                                    <input class="input input-borders" type="password" name="password"
                                        placeholder="password" id="password" required>
                                </div>

                                <div class="text-pad">
                                    <a href="#">
                                        forget password ?
                                    </a>

                                </div>

                                <input class="primary-btn btn-block" name="login_submit" type="submit" Value="Login">

                                <div class="panel-footer">
                                    <div class="alert alert-danger">
                                        <h4 id="e_msg"></h4>
                                    </div>
                                </div>





                            </div>

                        </form>

                        <!-- Shiping Details -->

                        <!-- /Shiping Details -->

                        <!-- Order notes -->

                        <!-- /Order notes -->
                    </div>

                    <!-- Order Details -->

                    <!-- /Order Details -->

                    <!-- /row -->
                </div>
            </div>

        </div>

    </div>
</div>
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