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
        <form class="login-form" action="forgotcon.php" method="post">
        <h1>Forgot Password?</h1>
        <p>Username</p>
        <input type="text" name="username" placeholder="Username" required>
        <p>Email Address</p>
        <input type="text" name="email" placeholder="Enter Email" required>
        <input type="submit" name="" value="Recover">
         <p class="message1"><a href="login.php">Return To Log-in</a></p>
            
        </p>
      </form>
  </div>
</div>
</body>
</head>
</html>