<?php
session_start();
require_once("connection.php");
if(!isset($_SESSION["login_user"])){
    echo '<script>window.location.href="index.php"</script>'; 
}



if(isset($_POST["block_image"])){
    $user_id=$_POST["fav_user_id"];
    $query="DELETE FROM `favourities` WHERE `id`='$user_id' ";
    $res=mysqli_query($con,$query);
    if(!$res){
        echo "data deleted";
    }

}



if(isset($_POST["block_text"])){
    $user_id=$_POST["fav_user_id"];
    $query="DELETE FROM `favourities` WHERE `id`='$user_id' ";
    $res=mysqli_query($con,$query);
    if(!$res){
        echo "data deleted";
    }

}



if(isset($_POST["block_video"])){
    $user_id=$_POST["block_fav_id"];
    $query="DELETE FROM `favourities` WHERE `id`='$user_id' ";
    $res=mysqli_query($con,$query);
    if(!$res){
        echo "data deleted";
    }

}






?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Work</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css" />
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css" />
    <link type="text/css" rel="stylesheet" href="css/accountbtn.css" />





    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
    <style>
    #navigation {
        background: #FF4E50;
        /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #F9D423, #FF4E50);
        /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #F9D423, #FF4E50);
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


    }

    #header {

        background: #780206;
        /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #061161, #780206);
        /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #061161, #780206);
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


    }

    #top-header {


        background: #870000;
        /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #190A05, #870000);
        /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #190A05, #870000);
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


    }

    #footer {
        background: #7474BF;
        /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #348AC7, #7474BF);
        /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #348AC7, #7474BF);
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


        color: #1E1F29;
    }

    #bottom-footer {
        background: #7474BF;
        /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #348AC7, #7474BF);
        /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #348AC7, #7474BF);
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


    }

    .footer-links li a {
        color: #1E1F29;
    }

    .mainn-raised {

        margin: -7px 0px 0px;
        border-radius: 6px;
        box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);

    }

    .glyphicon {
        display: inline-block;
        font: normal normal normal 14px/1 FontAwesome;
        font-size: inherit;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    .glyphicon-chevron-left:before {
        content: "\f053"
    }

    .glyphicon-chevron-right:before {
        content: "\f054"
    }
    </style>

</head>

<body>
    <!-- HEADER -->
    <?php require_once("header1.php"); ?>


    <!-- SECTION -->



    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <h1 class="text-center text-white"> Favourite Quotes</h1>

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Favourite Image Quotes</h3>

                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12 mainn mainn-raised">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">


                                    <?php 
                    
                    if(isset($_SESSION["login_user"])){
                    
                                    // if(isset($_POST["favourite_image"])){
                                        $id=$_SESSION["user_id"];
                                    
                                      $query1= "SELECT f.id as fav_id , f.quote_id, f.user_id, img.id as img_id ,img.catId , img.auther, img.imgUrl, img.category FROM favourities f LEFT JOIN imagesquotes img ON img.id=f.quote_id WHERE f.user_id='$id' AND f.type='image' ";
                                                $res1= mysqli_query($con,$query1);
                                                if(mysqli_num_rows($res1)>0){ 
                                                


                                                   while($row1=mysqli_fetch_array($res1)){
                                    
                                    ?>


                                    <div class='product'>
                                        <a href='images/<?php echo $row1["imgUrl"]; ?>'>
                                            <div class='product-img'>
                                                <img src='images/<?php echo $row1["imgUrl"]; ?>' style='' alt=''>
                                                <div class='product-label'>
                                                    <span class='sale'>-30%</span>
                                                    <span class='new'>NEW</span>
                                                </div>
                                            </div>
                                        </a>
                                        <div class='product-body'>

                                            <form action="" method="post">

                                                <input type="hidden" value="<?php echo $row1["fav_id"] ?>" name="fav_user_id">
                                                <input type="hidden" value="<?php echo $row1["quote_id"] ?>" name="fav_quote_id">

                                                <p class='product-category'><?php echo $row1["category"]; ?></p>
                                                <h3 class='product-name header-cart-item-name'><a
                                                        href='#'><?php echo $row1["auther"]; ?></a></h3>
                                                        
                                                <h4 class='product-price header-cart-item-info'>399<del
                                                        class='product-old-price'>$990.00</del></h4>
                                                <div class='product-rating'>
                                                    <i class='fa fa-star'></i>
                                                    <i class='fa fa-star'></i>
                                                    <i class='fa fa-star'></i>
                                                    <i class='fa fa-star'></i>
                                                    <i class='fa fa-star'></i>
                                                </div>
                                                <div class='product-btns'>
                                                    <!-- <form action="" method="post"> -->
                                                        <input type="hidden" value="<?php echo $row1["id"]; ?>"
                                                            name="id">
                                                            <input type="hidden" value="<?php echo $row1["auther"]; ?>"
                                                        name="auther_img">
                                                        <button type="submit" class='add-to-wishlist btn-danger' name="block_image"><i
                                             class='fa fa-ban' style="color:red;"></i><span class='tooltipp'>add to
                                                                blocklist</span></button>
                                                    
                                                    <button class='add-to-compare'><i class='fa fa-exchange'></i><span
                                                            class='tooltipp'>add to compare</span></button>
                                                    <button class='quick-view'><i class='fa fa-eye'></i><span
                                                            class='tooltipp'>quick view</span></button>
                                                </div>
                                        </div>
                                        <div class='add-to-cart'>
                                        <button type="" name="sub_image" pid='70' id='product1'
                                                    class='add-to-cart-btn block2-btn-towishlist' href='#'><i
                                                        class='fa fa-shopping-cart'></i>Subscribe</button>
                                        </div>
                                        </form>
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
                                    <!-- product -->


                                    <!-- /product -->


                                    <!-- /product -->
                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->



    
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

              
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Favourite Text Quotes</h3>

                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12 mainn mainn-raised">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">


                                    <?php 
                    
                    if(isset($_SESSION["login_user"])){
                    
                                    // if(isset($_POST["favourite_image"])){
                                        $id=$_SESSION["user_id"];
                                    
                                      $query1= "SELECT f.id as fav_id , f.quote_id, f.user_id, t.id as text_id ,t.catId , t.auther, t.quote, t.category FROM favourities f LEFT JOIN textquotes t ON t.id=f.quote_id WHERE f.user_id='$id' AND f.type='text' ";
                                                $res1= mysqli_query($con,$query1);
                                                if(mysqli_num_rows($res1)>0){ 
                                                


                                                   while($row1=mysqli_fetch_array($res1)){
                                    
                                    ?>


                                    <div class='product'>
                                        
                                            <div class='product-img'>
                                                 <p><?php echo $row1["quote"]; ?></p>
                                                <div class='product-label'>
                                                    <span class='sale'>-30%</span>
                                                    <span class='new'>NEW</span>
                                                </div>
                                            </div>
                                        </a>
                                        <div class='product-body'>

                                            <form action="" method="post">

                                                <input type="hidden" value="<?php echo $row1["fav_id"] ?>" name="fav_user_id">
                                                <input type="hidden" value="<?php echo $row1["text_id"] ?>" name="fav_textquote_id">

                                                <p class='product-category'><?php echo $row1["category"]; ?></p>
                                                <h3 class='product-name header-cart-item-name'><a
                                                        href='#'><?php echo $row1["auther"]; ?></a></h3>
                                                        
                                                <h4 class='product-price header-cart-item-info'>399<del
                                                        class='product-old-price'>$990.00</del></h4>
                                                <div class='product-rating'>
                                                    <i class='fa fa-star'></i>
                                                    <i class='fa fa-star'></i>
                                                    <i class='fa fa-star'></i>
                                                    <i class='fa fa-star'></i>
                                                    <i class='fa fa-star'></i>
                                                </div>
                                                <div class='product-btns'>
                                                    <!-- <form action="" method="post"> -->
                                                        <input type="hidden" value="<?php echo $row1["id"]; ?>"
                                                            name="id">
                                                            <input type="hidden" value="<?php echo $row1["auther"]; ?>"
                                                    name="auther_text">
                                                        <button type="submit" class='add-to-wishlist btn-danger' name="block_text"><i
                                             class='fa fa-ban' style="color:red;"></i><span class='tooltipp'>add to
                                                                blocklist</span></button>
                                                    
                                                    <button class='add-to-compare'><i class='fa fa-exchange'></i><span
                                                            class='tooltipp'>add to compare</span></button>
                                                    <button class='quick-view'><i class='fa fa-eye'></i><span
                                                            class='tooltipp'>quick view</span></button>
                                                </div>
                                        </div>
                                        <div class='add-to-cart'>
                                        <button type="submit" name="sub_text" pid='70' id='' class='add-to-cart-btn block2-btn-towishlist'
                                                href='#'><i class='fa fa-shopping-cart'></i>Subscribe</button>
                                        </div>
                                        </form>
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
                                    <!-- product -->


                                    <!-- /product -->


                                    <!-- /product -->
                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->




    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Favourite Video Quotes</h3>

                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12 mainn mainn-raised">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">


                                    <?php 
                    
                    if(isset($_SESSION["login_user"])){
                    
                                    // if(isset($_POST["favourite_image"])){
                                        $id=$_SESSION["user_id"];
                                    
                                      $query1= " SELECT f.id as fav_id , f.quote_id, f.user_id, v.id as video_id ,v.catId,v.auther,v.videoUrl,v.category FROM favourities f LEFT JOIN videoquotes v ON v.id=f.quote_id WHERE f.user_id='$id' AND f.type='video' ";
                                                $res1= mysqli_query($con,$query1);

                                                if(mysqli_num_rows($res1)>0){
                                                


                                                   while($row1=mysqli_fetch_array($res1)){
                                    
                                    ?>


                                    <div class='product'>
                                        <a href=''>
                                            <div class='product-img'>
                                                <video src="<?php echo $row1["videoUrl"]; ?>" controls></video>
                                                <div class='product-label'>
                                                    <span class='sale'>-30%</span>
                                                    <span class='new'>NEW</span>
                                                </div>
                                            </div>
                                        </a>
                                        <div class='product-body'>
                                        <form action="" method="post">
                                            <p class='product-category'><?php echo $row1["category"]; ?></p>
                                            <h3 class='product-name header-cart-item-name'><a
                                                    href='product.php?p=70'><?php echo $row1["auther"]; ?></a></h3>
                                            <h4 class='product-price header-cart-item-info'>399<del
                                                    class='product-old-price'>$990.00</del></h4>
                                            <div class='product-rating'>
                                                <i class='fa fa-star'></i>
                                                <i class='fa fa-star'></i>
                                                <i class='fa fa-star'></i>
                                                <i class='fa fa-star'></i>
                                                <i class='fa fa-star'></i>
                                            </div>
                                            <div class='product-btns'>
                                                

                                                    <input type="hidden" value="<?php echo $row1["fav_id"]; ?>" name="block_fav_id">
                                                    <input type="hidden" value="<?php echo $row1["auther"]; ?>" name="video_auther">

                                                    <button class='add-to-wishlist' name="block_video"><i
                                                            class='fa fa-ban' style="color:red"></i><span class='tooltipp'>add to
                                                            blocklist</span></button>

                                                

                                                <button class='add-to-compare'><i class='fa fa-exchange'></i><span
                                                        class='tooltipp'>add to compare</span></button>
                                                <button class='quick-view'><i class='fa fa-eye'></i><span
                                                        class='tooltipp'>quick view</span></button>
                                            </div>
                                        </div>
                                        <div class='add-to-cart'>
                                        <button type="submit" name="sub_video" pid='70' id='' class='add-to-cart-btn block2-btn-towishlist'
                                        href='#'><i class='fa fa-shopping-cart'></i>Subscribe</button>
                                        </div>
                                        </form>
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
                                    <!-- product -->


                                    <!-- /product -->


                                    <!-- /product -->
                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->


    <!-- product -->


    <!-- /product -->


    <!-- /product -->
    </div>
    <div id="slick-nav-1" class="products-slick-nav"></div>
    </div>
    <!-- /tab -->
    </div>
    </div>
    </div>
    <!-- Products tab & slick -->
    </div>
    <!-- /row -->
    </div>
    <!-- /container -->
    </div>
    <!-- /SECTION -->


    </div>




    <div id="newsletter" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">

                    <div class="newsletter">
                        <p>Sign Up for the <strong>OFFERUPDATES</strong></p>
                        <form id="offer_form" onsubmit="return false">
                            <input class="input" type="email" id="email" name="email" placeholder="Enter Your Email">
                            <button class="newsletter-btn" value="Sign Up" name="signup_button" type="submit"><i
                                    class="fa fa-envelope"></i> Subscribe</button>
                        </form>
                        <div class="" id="offer_msg">
                            <!--Alert from signup form-->
                        </div>
                        <ul class="newsletter-follow">
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <?php
		
		require_once("footer.php");

		?>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/actions.js"></script>
    <script src="js/sweetalert.min"></script>
    <script src="js/jquery.payform.min.js" charset="utf-8"></script>
    <script src="js/script.js"></script>
    <script>


    </script>
    <script type="text/javascript">

    </script>