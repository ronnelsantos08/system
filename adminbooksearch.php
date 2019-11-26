<?php
session_start();
if (!isset($_SESSION['loggedinadmin'])) {
  header('Location: login.php');
  exit();
}
?>
<?php
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "login";


$pdo_conn = new PDO("mysql:host:={$host};dbname={$dbname}",$dbUsername,$dbPassword);
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
     <form class="form-inline my-2 my-lg-0" action="adminbooksearch.php" method="post">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"name="search_keyword">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
              <style>
#students {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#students td, #students th {
  font-size: 12px;
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
  font-size: 12px;
}
</style>
        <table id="students">
            <tr>
            <th colspan="6"><h5>List of Available Books</h5></th></tr>
            <tr>
            <th> ID Number </th>
            <th> Title </th>
            <th> Abstract </th>
            <th> Author </th>
            <th> Publish Date </th>
            <th> No. Copies </th>
            
            </tr>

        <?php

    if(isset($_POST['search_keyword'])){
$search_keyword = $_POST['search_keyword']; 
$pdo_search = $pdo_conn->prepare("SELECT * FROM library WHERE abstract LIKE '%$search_keyword%' OR title LIKE '%$search_keyword%' OR id LIKE '%$search_keyword%' OR author LIKE '%$search_keyword%' OR datepub LIKE '%$search_keyword%' ORDER BY rand() limit 4");
$pdo_search->bindValue(1 , '%$search_keyword%' , PDO::PARAM_STR);
$pdo_search->execute();
if(!$pdo_search->rowCount()== 0){
while($row = $pdo_search->fetch()){?>
           <tr>
       <td><?php echo $row["id"];?></td>
       <td><?php echo $row["title"];?></td>
       <td><?php echo $row["abstract"];?></td>
       <td><?php echo $row["author"];?></td>
       <td><?php echo $row["datepub"];?></td>
       <td><?php echo $row["NumberOfCopies"];?></td><?php
}
}}
?>

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