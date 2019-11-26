<?php
$id = $_POST['id'];
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

$sql = "DELETE FROM library WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    ?><script> alert("Record has been deleted!!"); window.history.back();</script>;<?php
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>