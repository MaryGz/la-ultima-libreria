<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>La Última Librería</title>
    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/shop-homepage.css" rel="stylesheet">

    <?php
      $host="localhost";
      $port=3306;
      $socket="";
      $user="admin";
      $password="admin";
      $dbname="libreria";

      $con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	     or die ('Could not connect to the database server' . mysqli_connect_error());

//$con->close();

      // Check connection
      //if (mysqli_connect_errno()) {
      //  echo "Failed to connect to MySQL: " . mysqli_connect_error();
      //}
    ?>
  </head>

  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="../index.php">La Última Librería</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="../index.php">Inicio
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Libros</a>
            </li>

            <?php
            session_start();
            if(isset($_SESSION['sess_user'])){
              echo "<li class='nav-item'>";
                echo "<a class='nav-link' href='./cart.php'> |&nbsp &nbsp {$_SESSION['sess_user']}</a>";
              echo "</li>";

              echo "<li class='nav-item'>";
                echo "<a class='nav-link' href='./logout.php'>Cerrar Sesión</a>";
              echo "</li>";
            }else{
              echo "<li class='nav-item'>";
                echo "<a class='nav-link' href='./login.php'>|&nbsp &nbsp Iniciar Sesión</a>";
              echo "</li>";
            }
            ?>
          </ul>
        </div>
      </div>
    </nav>
