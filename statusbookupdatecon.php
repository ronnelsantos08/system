<?php
$id = $_GET['id'];
$status = $_GET['status'];
$servername = "localhost";
$user = "root";
$pass = "";
$dbname = "login";

// Create connection
$conn = new mysqli($servername, $user, $pass, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$SELECT4 = "SELECT status From borrow where id = $id";
        
$UPDATE = "UPDATE borrow SET status = '$status' WHERE id='$id'";
if ($conn->query($UPDATE) === TRUE) {
	
	?><script> alert("Status Changed!!"); window.history.back();</script><?php
    header ('location: studentsbook.php');
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>