<?php 
  session_start();
$con=mysqli_connect('localhost','root','');
    $select=mysqli_select_db($con,'belem');
  ?>
  <?php
    @$email=$_SESSION['email']; 
    $query="SELECT * FROM login WHERE email='$email'";
    $ex=mysqli_query($con,$query);
    while($data=mysqli_fetch_array($ex)){
    @$email=$data["email"];
    @$username=$data["username"];
    } ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/bootstrap.min.css">
    <link href="footer.css" rel="stylesheet" type="text/css" href="">
    <script src="../js/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
              <div id="app">
                  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                      <a class="navbar-brand" href="#">Belem Design</a>
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                      </button>
                      <div id="navbarNavDropdown" class="navbar-collapse collapse">
                          <ul class="navbar-nav mr-auto">
                              <li class="nav-item">
                                  <a class="nav-link" href="accueil.php">Accueil <span class="sr-only">(current)</span></a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="nos_prestations.php">Nos prestations</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="apropos_de_nous.php ">A propos de nous</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="contactez_nous.php">Contactez nous</a>
                              </li>
              
                          </ul>
                          <ul class="navbar-nav">
                              <li class="nav-item">
                                  <a class="nav-link" href="test.php"><span class="glyphicon glyphicon-user"></span>
                                         Admin
                                </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="logout.php"><span class="glyphicon glyphicon-log-in"></span>Logout
                                  </a>
                              </li>
                          </ul>
                      </div>
                  </nav>
              </div>
              <br/>