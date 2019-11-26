
<?php
$StudentID = $_POST['StudentID'];
$BookID = $_POST['BookID'];
$Status = $_POST['Status'];
$deduct = 1;
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "login";  

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

if (mysqli_connect_error()){
    die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
} 

        else{


  $query = "SELECT fullname, studentnumber, year From user Where id=?";
  $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $_SESSION['id']);
    $stmt->execute();
    $stmt->bind_result($fullname, $studentnumber, $year);
    $stmt->fetch();
    $stmt->close();
    $SELECT = "SELECT StudentID From borrow Where StudentID = ? Limit 1";
    $SELECT2 = "SELECT BookID, Status, FROM borrow where BookID = ?";
    $SELECT3 = "SELECT id FROM library where id = '$BookID'";
    $SELECT4 = "SELECT NumberOfCopies From library where NumberOfCopies = ?";
    $INSERT = "INSERT Into borrow (StudentID, BookID, Status, time_date) values(?,?,?,current_timestamp())";
    $stm = $conn->prepare($SELECT4);
   
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("i", $StudentID);
    $stmt->execute();
    $stmt->bind_result($StudentID);
    $stmt->store_result();
     $rnum = $stmt->num_rows;
    if ($rnum==0){
        
        $stmt->close();
        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("iis", $StudentID, $BookID, $Status);
        $stmt->execute();
        $UPDATE = "UPDATE library set NumberOfCopies = NumberOfCopies - 1 where id = '$BookID'";
        $conn->query($UPDATE);
        ?><script> alert("Reservation Successful!!"); window.history.back();</script><?php
       

    }
        else
        {
        ?><script> alert("You Already Reach The Reservation Limit!!"); window.history.back();</script><?php
    }
    $stmt->close();
    $conn->close();
}
?>
