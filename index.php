<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit();
}
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
      <input class="form-control mr-sm-2"placeholder="Search" name="search_keyword">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Search</button>
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
        <h5>LIBRARY SYSTEM</h5>
        <h6>The Library Management System is an application for assisting a 
        <h6>librarian in managing a book library in the university. The system would provide basic set of features to add/update members,</h6><h6> add/update books, and manage check in specifications for the systems based on the client’s statement of need.</h6>
        <h5>DISCLAIMERS</h5>
        <h6>User are only allowed to borrow 1 book per account.</h6>
        <h6>All registered information must be valid.</h6>
        <h6>User must be a Cavite State University - Silang Campus Students, Staff or Professor.</h6>
        <h6>Users are not allowed to share email, username and password to anyone.</h6>
        <h6>Users are responsible for the safe keeping of the said information.</h6>
       
      </div>
    </div>
    <div class="carousel-item">
      <div class="caption">
        <h5>MISSION</h5>
        <h6>Cavite State University shall provide excellent, equitable, and relevant educational opportunities in the arts, sciences and technology through quality instruction and responsive research and development activities.
It shall produce professional, skilled and morally upright individuals for global competitiveness.</h6>
  <h5>VISION</h5>
        <h6>The Premier University in historic Cavite recognized for excellence in the development of globally and morally upright individuals.</h6>
        
      </div>
    </div>
    <div class="carousel-item">
       <div class="caption">
      <h5>CAVITE STATE UNIVERSITY</h5>
      <h6>The Cavite State University, (CvSU) (Filipino: Pamantasang Pang-Lalawigan ng Kabite), is a state university in the province of Cavite in the Philippines. Its 70-hectare (170-acre) main campus, known as the Don Severino delas Alas Campus, is located in the Municipality of Indang, Cavite about 60 km (37 mi) southwest of Manila. The educational institution has ten other campuses spread all over the province. 
The school was established initially as an intermediate school by the Thomasites, a group of American teachers brought by the United States during the early part of the American colonial period to revamp the system of education in the country. By 1964, the school has grown into a college known as the Don Severino Agricultural College (DSAC). It became a university on January 22, 1998, and was renamed as the Cavite State University. 
The Accrediting Agency of Chartered Colleges and Universities in the Philippines (AACCUP) recently conferred the award to Cavite State University (CvSU) as top performing state university during the annual national conference held at the Waterfront Cebu City Hotel, Cebu City, 7 – 9 March. In 2016, CvSU was also recognized as one of the top ten performing SUCs in accreditation, capturing the rank 7 spot. 
Since then, the university has grown offering close to 100 curricular programs in the undergraduate and graduate levels. It has more than 25,000 students and 1,200 faculty and staff from all eleven campuses</h6>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#mainslider" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#mainslider" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
</header>
</body>
</html>