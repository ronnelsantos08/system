<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
if  (!empty($username) || !empty($password)){
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "login";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
if (mysqli_connect_error()){
    die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
}
else{

	$query = "SELECT id, password, usertype From user Where username=?";
	$stmt = $conn->prepare($query);
    $stmt->bind_param("s", $_POST['username']);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
	$stmt->bind_result($id, $password, $usertype);
    $stmt->fetch();
    if ($_POST['password'] === $password and $usertype === 'user'){
    	session_regenerate_id();
    	$_SESSION['loggedin'] = TRUE;
    	$_SESSION['name'] = $_POST['username'];
    	$_SESSION['id'] = $id;
        $_SESSION['usertype'] = $usertype;
        header ('location: index.php');}
    if($_POST['password'] === $password and $usertype === 'admin'){
        session_regenerate_id();
        $_SESSION['loggedinadmin'] = TRUE;
        $_SESSION['name'] = $_POST['username'];
        $_SESSION['id'] = $id;
        $_SESSION['usertype'] = $usertype;
        header ('location: admin.php');
        }

	
    else{
    	?><script> alert("INCORRECT PASSWORD!!"); window.history.back();</script><?php
    }
}else {
	?><script> alert("INCORRECT USERNAME!!"); window.history.back();</script><?php
}

    mysqli_close($conn);
}
}
    else 
    {
        echo "All field are required";
        die();
    }

?>  
