<?php 
require 'core/init.php'; 
if(logged_in() === true){

    header('Location:home.php');
    exit();

} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Asset Management System</title>
    <link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" media="screen" href="css/screen2.css">
    <script src="js/activation.js"></script>
    <script>
        function validateForm() {
           var email = document.forms["registration"]["email"].value;
           if (!validateEmail(email)) {
           alert("Enter a valid email address");
           return false;
            }
            var password = document.forms["registration"]["password"].value;
            if (password.length < 6) {
                alert("Password must have at least 6 characters");
                return false;
            }
        }
        //function validateEmail(email) {
          //  var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
           // return re.test(email);
        //}
    </script>

</head>
<body>
    
    <div id="page">
        <header>
            <a title="asset" href="">
                <div class="logo">
                <a href =""><img src="images/WHITE.png" height="60px" weight="50px" /></a>
                    
                </div>
            </a>

            <nav>
            <span id="title"> Asset Management System</span>
            </nav>
        </header>


        <div class="left"><img src="images/Front.jpg" alt=""></div>
        <div class="right">



            <?php

            if (isset($_GET['register']) && empty($_GET['register'])) {
                echo '<center> registered successfully!!!! </center>'.'<br>'.'<center>Please Log In..</center>';

            }

            if(empty($_POST['register']) === false && isset($_POST['register'])=== true){

                    $register_data = array(

                    'first_name' =>  $_POST['fname'],
                    'last_name'  =>  $_POST['lname'],
                    'email'      =>  $_POST['email'],
                    'password'   =>  $_POST['password']

                );

                register_user($con,$register_data);
                header('Location:index.php?register');
                exit();

            }

            ?>
            <h1>Sign Up</h1>
         <form name="registration" action="" method="post" onsubmit="return validateForm()">
             <input id="text_input" type="text" name="fname" placeholder="First name" required maxlength="14" oninput="activate('registration', this, 'lname')"> <br />

             <input id="text_input" type="text" name="lname" placeholder="Last name" required maxlength="14" disabled oninput="activate('registration', this, 'email')"><br />
             <input id="text_input" type="text" name="email" placeholder="Admin" required maxlength="100" disabled oninput="activate('registration', this, 'password')"><br />

             <input id="text_input" type="password" name="password" placeholder="Password" disabled><br />

             <input type="submit" name="register" value="Create account" style="font-weight:bold;border-radius:3rem;">
             
         </form>
         
         <hr />
         <span id="footer">&#169;<a href ="index.php" title="Website">Login Here</a></span>
         
    </div>

</body>
</html>