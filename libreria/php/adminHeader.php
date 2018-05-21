<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="María Gutiérrez">

    <title>La Última Librería</title>
    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/shop-homepage.css" rel="stylesheet">

    <?php
      session_start();
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
            if(isset($_SESSION['sess_user']) && $_SESSION['sess_user']=='admin'){

              echo "<li class='nav-item'>";
                echo "<a class='nav-link' href='./adminLibros.php'>Libros</a>";
              echo "</li>";

              echo "<li class='nav-item'>";
                echo "<a class='nav-link' href='./adminAutores.php'>Autores</a>";
              echo "</li>";

              echo "<li class='nav-item'>";
                echo "<a class='nav-link' href='./adminClientes.php'>Clientes</a>";
              echo "</li>";

              echo "<li class='nav-item'>";
                echo "<a class='nav-link' href='./adminEditoriales.php'>Editoriales</a>";
              echo "</li>";

              echo "<li class='nav-item'>";
                echo "<a class='nav-link' href='./adminTemas.php'>Temas</a>";
              echo "</li>";

              echo "<li class='nav-item'>";
                echo "<a class='nav-link' href='./logout.php'>Cerrar Sesión</a>";
              echo "</li>";
            }else{
              header("Location:../index.php");
            }
            ?>
          </ul>
        </div>
      </div>
    </nav>
