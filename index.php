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


        <div class="left"><img src="images/Front.jpg" alt="">
        <br />
                

    </div>
       
    <div class="button1"><a href="chart.php" title="charts">Charts</a></div>
        <div class="right">

                 

        <?php


if(empty($_POST['login']) === false){

    $email    = $_POST['email'];
    $password = $_POST['password'];
    $login = login($con,$email,$password);
    if($login === false){?>
<script>
    alert('Your email and password combination is wrong');

</script>
       <?php
    }else{

        $_SESSION['id']= $login;
        header('Location:home.php');
        exit();
    }
}

?>

        
            <h1>Login</h1>
            <form action="" method="post" name="login">

<label for="email"><b>Admin</b></label><br>
<input id="text_input" type="text" name="email">
<br />
<label for="password"><b>Password</b></label><br>
<input id="text_input" type="password" name="password"> 
<br/>
<input id="btn_block" type="submit" value="Login" name="login" style="margin-left:10px;font-weight:bold;border-radius:3rem;"/>
</form>

         
         <hr />
         <span id="footer">&#169;<a href ="register.php" title="project">Register Here</a><br><br><br>
         <a href ="Website/Website.html" title="project">Back to home page</a><br><br><br>
         
         </span>
    </div>

    

</body>
</html>