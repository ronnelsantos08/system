<?php
$id = $_POST['id'];
$fullname = $_POST['fullname'];
$studentnumber = $_POST['studentnumber'];
$year = $_POST['year'];
$usertype = $_POST['usertype'];
$username = $_POST['username'];
$password = $_POST['password'];
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

$sql = "UPDATE user SET fullname='$fullname', studentnumber='$studentnumber', year='$year', usertype='$usertype', username='$username', password='$password' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    ?><script> alert("Update Successfull!!"); window.history.back();</script>;<?php
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>