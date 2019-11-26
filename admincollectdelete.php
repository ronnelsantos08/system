<?php
$id = $_POST['id'];
$status = $_POST['status'];
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

$sql = "UPDATE borrow SET status='$status' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    header ('location: studentsbook.php');
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>