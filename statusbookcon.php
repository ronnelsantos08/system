<?php
$id = $_GET['id'];
$bookid = $_GET['bookid'];
$studentid = $_GET['studentid'];
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
$sql = "DELETE FROM borrow WHERE id='$id'";
$sql2 = "SELECT * from returned where id = ?";
$SELECT4 = "SELECT NumberOfCopies From library where NumberOfCopies = ?";
$INSERT = "INSERT Into returned (BookID, StudentID, time_date) values(?, ?,current_timestamp())";

 $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("ss", $bookid, $studentid);
        $stmt->execute();
        
$UPDATE = "UPDATE library SET NumberOfCopies = NumberOfCopies + 1 WHERE id='$bookid'";
	$conn->query($UPDATE);

if ($conn->query($sql) === TRUE) {
	
	?><script> alert("Record Successful added!!"); window.history.back();</script><?php
    header ('location: studentsbook.php');
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>