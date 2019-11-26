<?php
$id = $_GET['id'];
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

$sql = "DELETE FROM user WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    header ('location: admin.php');
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>