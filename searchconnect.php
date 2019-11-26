<?php

$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "login";


$pdo_conn = new PDO("mysql:host:={$host};dbname={$dbname}",$dbUsername,$dbPassword);
if(isset($_POST['search_keyword'])){
$search_keyword = $_POST['search_keyword'];	
echo $search_keyword;
$stmt = $pdo_conn->prepare("SELECT * FROM library WHERE title LIKE '%$search_keyword%' ORDER BY rand() limit 0,10");
$stmt->bindValue(1 , '%$search_keyword%' , PDO::PARAM_STR);
$stmt->execute();
if(!$stmt->rowCount()== 0){
while($row = $stmt->fetch()){
	echo $row['title'];
}
}}
else {
	echo "Invalid Search";
}
?>