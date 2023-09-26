<?php 


if(!isset($_SESSION['admin'])){
  header("location:".BURLA ."login.php") ;}

  if($_SESSION['admin']['type']=='admin'){
    echo '<style type="text/css">#admin { display: none; }</style>';
  }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <link rel='stylesheet' type='text/css' href="<?php echo ASSTES;?>style/bootstrap.min.css">

   
   <style>body{background:#e3f2fd}  </style>

</head>
<body>

 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <img src="https://cdn.pixabay.com/photo/2012/04/15/18/54/snake-34904_640.png" width="50px" height="60px">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
     

        <li class="nav-item">
          <a class="nav-link" href="<?php echo BURLA ?>">Home</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Cities
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?php echo BURLA.'cities/city.php' ?>">Add</a></li>
            <li><a class="dropdown-item" href="<?php echo BURLA.'cities/index.php' ?>"> View All</a></li>
           
          </ul>
        </li>
<!-- services  -->

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Services
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?php echo BURLA.'services/add.php' ?>">Add</a></li>
            <li><a class="dropdown-item" href="<?php echo BURLA.'services/index.php' ?>"> View All</a></li>
           
          </ul>
        </li>

        <li class="nav-item dropdown" id='admin'>
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Admin
          </a>
          <ul class="dropdown-menu" >
            <li><a class="dropdown-item" href="<?php echo BURLA.'admins/add.php' ?>">Add</a></li>
            <li><a class="dropdown-item" href="<?php echo BURLA.'admins/all.php' ?>">View All</a></li>
           
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BURLA.'orders/index.php' ?>">Orders</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo BURL ?>">View Site</a>
        </li>

     
      </ul>
     <a class='text-light nav-link ' href="<?php echo BURLA.'logout.php' ?>"> LogOut </a>
     <img src="https://cdn.pixabay.com/photo/2012/04/15/18/54/snake-34904_640.png" width="50px" height="60px">
    </div>
  </div>
</nav>

