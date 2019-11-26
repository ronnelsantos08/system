<?php
?>
<html>
<head>
<title>log-in page</title> 
    <link rel="stylesheet" type="text/css" href="loginstyle.css">
<body>
    <div class="loginbox">
    <img src="avatar.png" class="avatar">
    <div class="form">
        <form class="login-form" action="loginconnect.php" method="post">
        <h1>Log-in</h1>
        <p>Username</p>
        <input type="text" name="username" placeholder="Username" required>
        <p>Password</p>
        <input type="password" name="password" placeholder="Enter Password" required>
        <input type="submit" name="" value="Login">
         <p class="message1"><a href="#">Create Account</a></p>
        <p class="message2"><a href="forgot.php">Forgot Password?</a>
        </p>
      </form>

        <div class="form">
        <form class="registerform" action="connect.php" method="post">
        <h1>Register</h1>
        <p>Fullname</p>
        <input type="text" name="fullname" onkeyup="this.value = this.value.toUpperCase();" placeholder="Fullname" required>
        <p>Student Number</p>
        <input type="text" pattern="[0-9]{8,10}" name="studentnumber" placeholder="Student Number" required>
        <p>Year/Course/Section</p>
        <input type="text" name="year" onkeyup="this.value = this.value.toUpperCase();" placeholder="Year Course/Section" required>
        <input type="hidden" name="usertype" value="user">   
        <p>Email Address</p>
        <input type="text" name="email" placeholder="Email Address" required> 
        <p>Username</p>
        <input type="text" name="username" placeholder="Username" required>
        <p>Password</p>
        <input type="password" name="password" placeholder="Enter Password" required>
        <input type="submit" name="" value="Register">
        

        <p class="message1"><a href="#">Return to Login</a></p>

            
            </form>
        </div>
    </div>
         </div>
    <script src='https://code.jquery.com/jquery-3.4.1.min.js'>
    </script>
    
    <script>
    $('.message1 a').click(function()
    {
     $('form').animate({height:"toggle",opacity:"toggle"},"slow");}
    );
    </script>
    

   
</body>
</head>
</html>
