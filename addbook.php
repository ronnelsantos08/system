<?php
session_start();
if (!isset($_SESSION['loggedinadmin'])) 
{
    header('Location: login.php');
    exit();} 
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
   
<div class="addbook">
        <form class="addbook" action="addbookcon.php" method="post">
        <h5>ADD BOOKS</h5>
        <p>Title</p>
        <input type="text" name="title" placeholder="Title" required>
        <p>Abstract</p>
        <textarea rows="4" cols="80" name="abstract" required></textarea>
        <p>Date Publish</p>
        <input type="date" name="datepub" placeholder="Date Publish" required>  
        <p>Author</p>
        <input type="text" name="author" placeholder="Authors" required>
        <p>Number of Copies</p>
        <input type="text" name="NumberOfCopies" placeholder="Number of Copies" required>
        <input type="submit" name="" value="Register">
    

</div>
</div>
</header>
</body>
</html>