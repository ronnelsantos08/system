<?php
$username = $_POST['username'];
$email = $_POST['email'];
$host = "localhost";
$dbUsername = "root";
$dbemail = "";
$dbname = "login";

$conn = new mysqli($host, $dbUsername, $dbemail, $dbname);
if (mysqli_connect_error()){
    die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
}
else{

	$query = "SELECT email From user Where username=?";
	$stmt = $conn->prepare($query);
    $stmt->bind_param("s", $_POST['username']);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
    $stmt->bind_result($email);
    $stmt->fetch();    
    if ($_POST['email'] === $email){
    	
    ?><script> alert("Password has been sent to your email!!"); window.history.back();</script><?php
    ;

  }
else {
	?><script> alert("INCORRECT EMAIL!!"); window.history.back();</script><?php
}}
else
{
   ?><script> alert("INCORRECT USERNAME!!"); window.history.back();</script><?php 
}

    mysqli_close($conn);
}


?>  
