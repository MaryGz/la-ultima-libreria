<!DOCTYPE html>
<?
  session_start();
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="María Gutiérrez">

    <title>La Última Librería</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">

    <?php
    $host="localhost";

    $user="admin";
    $password="";
    $dbname="libreria";

      //$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
      // or die ('Could not connect to the database server' . mysqli_connect_error());

      $con = mysqli_connect($host, 'admin', 'admin', $dbname);

      if (mysqli_connect_errno()){
        echo mysqli_connect_error();
      }

//$con->close();


    ?>

  </head>

  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <img src="./img/logoLibreria.png" href="index.php" height="40px">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Inicio
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php"> Libros</a>
            </li>

            <?php
            session_start();
            if(isset($_SESSION['sess_user'])){
              echo "<li class='nav-item'>";
                echo "<a class='nav-link' href='./php/cart.php'> |&nbsp &nbsp {$_SESSION['sess_user']}</a>";
              echo "</li>";

              echo "<li class='nav-item'>";
                echo "<a class='nav-link' href='./php/logout.php'>Cerrar sesión</a>";
              echo "</li>";
            }else{
              echo "<li class='nav-item'>";
                echo "<a class='nav-link' href='./php/login.php'>|&nbsp &nbsp Iniciar sesión</a>";
              echo "</li>";
            }
            ?>
          </ul>
        </div>
      </div>
    </nav>
