
<?php
$fullname = $_POST['fullname'];
$studentnumber = $_POST['studentnumber'];
$year = $_POST['year'];
$usertype = $_POST['usertype'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "login";  


$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

if (mysqli_connect_error()){
    die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
} 

    else{

    $SELECT2 = "SELECT username From user Where username = ?";
    $SELECT = "SELECT studentnumber From user Where studentnumber = ?";
    $SELECT3 = "SELECT email From user Where email = ?";
    $INSERT = "INSERT Into user (fullname, studentnumber, year, email, username, password, usertype, time_date) values(?, ?, ?, ?, ?, ?, ?,current_timestamp())";
   
   
   
    $stmt = $conn->prepare($SELECT2);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($username);
    $stmt->store_result();
    $stm = $conn->prepare($SELECT);
    $stm->bind_param("s", $studentnumber);
    $stm->execute();
    $stm->bind_result($studentnumber);
    $stm->store_result();
    $st = $conn->prepare($SELECT3);
    $st->bind_param("s", $email);
    $st->execute();
    $st->bind_result($email);
    $st->store_result();
    $enum = $st->num_rows;
    $snum = $stm->num_rows;
    $rnum = $stmt->num_rows;
    
    if ($snum==0){
    	if ($rnum==0){
    		if($enum==0){
        $stmt->close();
        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("sssssss", $fullname, $studentnumber, $year, $email, $username, $password, $usertype);
        $stmt->execute();
        ?><script> alert("Registration Successful!!"); window.history.back();</script><?php
        }
        else{
        	?><script> alert("Someone is already using this Email Address!!"); window.history.back();</script><?php
        }}
        else
        {
        ?><script> alert("Someone is already using this Username!!"); window.history.back();</script><?php
    }}
    else{
    	?><script> alert("Someone is already using this student Number!!"); window.history.back();</script><?php
    }
    $stmt->close();
    $conn->close();
}
?>
