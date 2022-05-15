<?php
                                                  


include("../connection.php");



?>


<?php 

  
if(isset($_POST["login"])){

    $name= $_POST["name1"];
    $email= $_POST["email"];
    $password= $_POST["pass"];

    
    $query= " SELECT * FROM `admin` WHERE `email`='$email' AND `password`='$password' AND `name`='$name' AND `status`=1 ";

    $res= mysqli_query($con,$query);
    if(mysqli_num_rows($res)>0){

        $row=mysqli_fetch_array($res);
        
        session_start();
    $_SESSION["loggedin"]=true;
    $_SESSION["id"]=$row["id"];
    $_SESSION["name"]=$name;
    $_SESSION["email"]=$email;
    $_SESSION["password"]=$password;
    $_SESSION["type"]=$row["type"];

    if($type=="auther"){
        echo " <script>window.location.href='image-quotes.php'</script> ";
    }
    else {
        echo " <script>window.location.href='index.php'</script> ";
    }


    }


    else{
        echo ' <div class="alert alert-danger text-center" role="alert">
        Please Enter Correct Login Details
      </div> ';
    }
         
     
    }  



      
if(isset($_POST["signup"])){

    $name=mysqli_real_escape_string($con,$_POST["name"]);
    $name=htmlentities($name);
    $email= $_POST["email"];
    $password= $_POST["pass"];
    
    $query= " INSERT INTO `admin`(`name`,`email`,`password`) VALUES('$name','$email','$password') ";

    $res= mysqli_query($con,$query);
    if(!$res){

echo "Record Not Created";

    }


         
     
    } 




  
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Sign Up</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/login.css">

    <style>



    </style>


</head>


<body>


    <div class="row m-0">

        <div class="col-md-6 mx-auto p-0">

            <div class="card border-0">


                <div class="login-box">
                    <div class="login-snip">
                        <a href="home.php">
                            <div class="img-container col-8 m-auto pt-3 pb-3 mb-3">
                                <img src="images/logo-2.png" class="img-fluid" alt="">
                            </div>
                        </a>
                        <h1 class="d-none"></h1>
                        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1"
                            class="tab signin">Login</label> <input id="tab-2" type="radio" name="tab"
                            class="sign-up"><label for="tab-2" class="tab signup">Sign Up</label>
                        <div class="login-space">
                            <div class="login-up-form">
                                <form action="" method="post">
                                    <div class="group">
                                        <label for="name" class="label">Enter User name</label>
                                        <input type="text" class="input" onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Enter name'" name="name1" required>
                                    </div>
                                    <div class="group">
                                        <label for="user" class="label">Enter Email</label>
                                        <input id="user" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                                            onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Enter email address'" type="email" class="input"
                                            placeholder="Enter your email" name="email" required>
                                    </div>
                                    <div class="group">
                                        <label for="pass" class="label">Password</label>
                                        <input id="pass" type="password" class="input" data-type="password"
                                            placeholder="Enter your password" name="pass" required
                                            onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Minimum 8 Only Alphabets and Digits Allowed'">
                                    </div>
                                   

                                    <div class="group">
                                        <input type="submit" class="button" name="login" value="Log In">
                                    </div>
                                </form>
                                <div class="hr"></div>
                                <div class="foot"> <a href="forget-password.php" class="text-white">Forgot Password?</a>
                                    <br>
                                    <label for="tab-2" class="text-white not_account">Not Have An Account?</label>
                                </div>
                            </div>
                            <div class="sign-up-form">
                                <form action="" method="post">
                                    <div class="group">
                                        <label for="user" class="label">Username</label>
                                        <input id="user" type="text" class="input" placeholder="Create your Username"
                                            name="name" required>
                                    </div>
                                    <div class="group">
                                        <label for="email" class="label">Email Address</label> <input id="email"
                                            type="email" class="input" placeholder="Enter your email address"
                                            name="email" required>
                                    </div>
                                    <div class="group">
                                        <label for="pass" class="label">Password</label>
                                        <input id="pass" type="password" class="input" data-type="password"
                                            placeholder="Create your password" name="pass" required
                                            pattern="[A-Za-z0-9]{8,30}$" onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Minimum 8 Only Alphabets and Digits Allowed'">
                                    </div>
                                    <div id="passerror"></div>
                                    <div class="group">
                                        <label for="repass" class="label">Repeat Password</label>
                                        <input id="repass" type="password" class="input" data-type="password"
                                            name="repass" placeholder="Repeat your password " required
                                            pattern="[A-Za-z0-9]{8,30}$" onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Minimum 8 Only Alphabets and Digits Allowed'">
                                    </div>
                                    <div id="passerro2"></div>

                                    <div class="group">
                                        <input type="submit" name="signup"  class="button signup_btn" value="Sign Up">
                                    </div>
                                </form>
                                <div class="foot"> <label for="tab-1" class="text-white already_memb">Already
                                        Member?</label> </div>
                                <div class="hr"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>








    <script src="js/jquery.js"></script>
    <!--                      bootstrap javascript                  -->

    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/highlight.js"></script>
    <script src="js/app.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="https://rawgit.com/notifyjs/notifyjs/master/dist/notify.js"></script>
    <script>
    $(document).ready(function() {

        $(".signup_btn").on("click",function(){

            $.notify("Alert! Record Created... Please Wait for Approvel By Admin",{type: "success",align:"center", verticalAlign:"top"});
            return true;
        });

        $pass = $("#pass").val();
        $repass = $("#repass").val();

        if ($pass != $repass) {
            $("#passerror").html("password do not match");
            $("#passerro2").html("password do not match");
            $("#passerror").css("color", "red");
            $("#passerro2").css("color", "red");
            return false;

        }


        $(".sign-in").hide();
        $(".sign-up").hide();
        $(".sign-up-form").hide();

    });
    $(".alert").fadeTo(2000, 500).slideUp(1000, function() {
        $(".alert").slideUp(1000);
    });

    $(".signup").click(function() {

        $(".signup").css({
            "border-bottom": "2px solid #f7631b",
            "color": "white"
        });
        $(".signin").css({
            "border-bottom": "none",
            "color": "#777"
        });

        $(".login-up-form").hide();
        $(".sign-up-form").show();

    });


    $(".signin").click(function() {

        $(".signin").css({
            "border-bottom": "2px solid #f7631b",
            "color": "white"
        });
        $(".signup").css({
            "border-bottom": "none",
            "color": "#777"
        });
        $(".sign-up-form").hide();
        $(".login-up-form").show();

    });
    $(".not_account").click(function() {

        $(".signup").css({
            "border-bottom": "2px solid #f7631b",
            "color": "white"
        });
        $(".signin").css({
            "border-bottom": "none",
            "color": "#777"
        });

        $(".sign-up-form").show();
        $(".login-up-form").hide();

    });



    $(".already_memb").click(function() {

        $(".signin").css({
            "border-bottom": "2px solid #f7631b",
            "color": "white"
        });
        $(".signup").css({
            "border-bottom": "none",
            "color": "#777"
        });
        $(".sign-up-form").hide();
        $(".login-up-form").show();

    });
    </script>

</body>

</html>