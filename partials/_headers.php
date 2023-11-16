<?php
session_start();

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Menu
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Action</a></li>
          <li><a class="dropdown-item" href="#">Another action</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="contact.php" >Contact</a>
      </li>
    </ul>
    <div class="d-flex mx-2">';

    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
      echo ' <form class="d-flex" role="search">
              <input class="form-control me-2 mt-4" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success mx-2 mt-4" type="submit">Search</button>
              <p class="text-white my-2 mx-2">Welcome '.$_SESSION['user_email']. '</p>
              <a href="partials/_logout.php" class="btn btn-primary ml-2 mt-3">Logout</a>
              </form>';
    }else{
     echo ' <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success mx-2" type="submit">Search</button>
            </form>
            <button class="btn btn-primary ml-2" data-bs-toggle="modal" data-bs-target="#loginModal" >Login</button>
            <button class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#signupModal">Sign Up</button>';
    }
     echo '  </div>
            </div>
            </nav>';

    include 'partials/_loginModal.php';
    include 'partials/_signupModal.php';
    // if(isset($_GET['signupsuccess'])&& ($_GET['signupsuccess']=="true")){
    //     echo "yes";
    // }
    ?>