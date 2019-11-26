<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
  header('Location: login.php');
  exit();
}
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, title, abstract, author, datepub, NumberOfCopies FROM library WHERE NumberOfCopies > 0 ORDER BY id ASC LIMIT 10,5";
$result = $conn->query($sql);
  $query = "SELECT fullname, studentnumber, year From user Where id=?";
  $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $_SESSION['id']);
    $stmt->execute();
    $stmt->bind_result($fullname, $studentnumber, $year);
    $stmt->fetch();
    $stmt->close();
?>
<html>
<head>
<title>Library Website</title>
<link href="style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="design/design.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<header>

<section id="main-navi">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><img src="pic1.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="profile.php">Profile<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">About Us</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Book Collection
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="collect.php">Collections</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="bookstatus.php">Book Status</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php" tabindex="-1" aria-disabled="true">Log-Out</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="searchbar.php" method="post">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"name="search_keyword">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav> 
    </div>

<div id="mainslider" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#mainslider" data-slide-to="0" class="active"></li>
    <li data-target="#mainslider" data-slide-to="1"></li>
    <li data-target="#mainslider" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
     
      <div class="caption">
      <div class="content">

        <div class="borrow">
        <form class="borrow-form" action = "borrow.php" method="post">
          <input type="hidden" name="StudentID" value="<?=$studentnumber?>">
  <input type="text" name="BookID" placeholder= "Enter Book Number" required>
  <input type="hidden" name="Status" value="Reserve">
  <input type="submit" name="" value="Borrow">
</form>
</div>
      <div>
         <style>
#students {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#students td, #students th {
  border: 1px solid #ddd;
  padding: 8px;
}

#students tr:nth-child(even){background-color: #f2f2f2;}

#students tr:hover {background-color: #ddd;}

#students th {
  text-align: center;
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
        <table id="students">
            <tr>
            <th colspan="6" rowspan="13">List of Available Books</th></tr>
            <tr>
            <th> ID Number </th>
            <th> Title </th>
            <th> Abstract </th>
            <th> Author </th>
            <th> Publish Date </th>
            <th> No. Copies </th>
            
            </tr>
        <?php
  
    while($row = $result->fetch_assoc()) {
         ?>
         <tr>
       <td><?php echo $row["id"];?></td>
       <td><?php echo $row["title"];?></td>
       <td><?php echo $row["abstract"];?></td>
       <td><?php echo $row["author"];?></td>
       <td><?php echo $row["datepub"];?></td>
       <td><?php echo $row["NumberOfCopies"];?></td>
      
      
   <?php } ?>
   <div class="next">
 <a href="collect2.php" class="previous">&laquo; Previous</a>
<a href="collect4.php" class="next">Next &raquo;</a>

 </div>
      </div>
    </div>
      </div>
    </div>
  </div>
</div>
</div>
</header>
</body>
</html>