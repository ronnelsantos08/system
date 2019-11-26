<?php
session_start();
$page = 'collect.php';
$host = "localhost";
$dbid = "root";
$dbPassword = "";
$dbname = "login";

$conn = new mysqli($host, $dbid, $dbPassword, $dbname);
if (mysqli_connect_error()){
    die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
}
else{
function items (){
	$query = mysql_query('SELECT title, abstract, datepub, author From library Where id=? && NumberofCopies > 0');
	if (mysql_num_rows ($query) == 0) {
		echo "There are no books to display!";
	}
	$stmt = $conn->prepare($query);
    $stmt->bind_param("i", $_POST['id']);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
	$stmt->bind_result($title, $abstract, $datepub, $author);
    $stmt->fetch();
    	session_regenerate_id();
    	$_SESSION['librarycon'] = TRUE;
    	$_SESSION['name'] = $_POST['id'];
    	$_SESSION['id'] = $id;
		header ('location: index.php');
	}

    }
   
}

    mysqli_close($conn);
?>  
