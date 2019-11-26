
<?php
$title = $_POST['title'];
$abstract = $_POST['abstract'];
$author = $_POST['author'];
$datepub = $_POST['datepub'];
$NumberOfCopies = $_POST['NumberOfCopies'];

if (!empty($title) || !empty($abstract) || !empty($author) || !empty($NumberOfCopies) || !empty($datepub)){
$host = "localhost";
$dbNumberOfCopies = "root";
$dbPassword = "";
$dbname = "login";  


$conn = new mysqli($host, $dbNumberOfCopies, $dbPassword, $dbname);

if (mysqli_connect_error()){
    die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
} 

    else{
    $SELECT = "SELECT id From library Where id = ? Limit 1";
    $INSERT = "INSERT Into library (title, abstract, author, NumberOfCopies, datepub) values(?, ?, ?, ?, ?)";
   
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($id);
    $stmt->store_result();
    $rnum = $stmt->num_rows;
    
    if ($rnum==0){
        $stmt->close();
        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("sssss", $title, $abstract, $author, $NumberOfCopies, $datepub);
        $stmt->execute();
        ?><script> alert("Registration Successful!!"); window.history.back();</script><?php
        }
        else
        {
        ?><script> alert("Someone is already using this student number or NumberOfCopies!!"); window.history.back();</script><?php
    }
    $stmt->close();
    $conn->close();
}
}
    else 
    {
        echo "All field are required";
        die();
    }
?>
