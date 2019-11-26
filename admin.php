<?php
session_start();
if (!isset($_SESSION['loggedinadmin'])) 
{
    header('Location: login.php');
    exit();} 
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

$sql = "SELECT * FROM `user` ORDER BY id ASC LIMIT 0,10";
$result = $conn->query($sql);
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
  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Students
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="admin.php">View Registered Students</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="updatestudent.php">Update</a>
        </div>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Book Status
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="studentsbook.php">Reserve/Borrowed</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="returned.php">Returned</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Book Collection
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="admincollect.php">Collections</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="addbook.php">Add Book</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php" tabindex="-1" aria-disabled="true">Log-Out</a>
      </li>
    </ul>
   
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
     <form class="form-inline my-2 my-lg-0" action="studentsearch.php" method="post">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"name="search_keyword">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
     


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
            <th colspan="8">Status of Books</th></tr>
            <tr>
            <th> ID Number </th>
            <th> Full Name </th>
            <th> Student Number </th>
            <th> Year Section </th>
            <th> username </th>
            <th> Password </th>
            <th> Time Registered </th>
            <th> Remove </th>
            
            </tr>
        <?php
  
    while($row = $result->fetch_assoc()) {
         ?>
         <tr>
       <td><?php echo $row["id"];?></td>
       <td><?php echo $row["fullname"];?></td>
       <td><?php echo $row["studentnumber"];?></td>
       <td><?php echo $row["year"];?></td>
       <td><?php echo $row["username"];?></td>
       <td><?php echo $row["password"];?></td>
       <td><?php echo $row["time_date"];?></td>
     <td><a href="studentdelete.php?id=<?php echo $row['id'];?>">Remove</a>
      
   <?php } ?>
    </tr></table>

  </div>
    <div class="next">
 <a href="admin.php" class="previous">&laquo; Previous</a>
<a href="admin2.php" class="next">Next &raquo;</a>

 </div>

</div>
</div>
</header>
</body>
</html>