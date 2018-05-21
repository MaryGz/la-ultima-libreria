<?php include './php/adminHeader.php';
?>

<div class="container">
  <!-- Page Heading -->

  <div class="col-lg-12">
    <div class="card mt-4">
    <div class="card-body">
      <h1 class="my-1">Crear un nuevo tema</h1>
      <form class="form-horizontal" action="" method="post">
        <!-- User -->
        <br>
        <div class="form-group">
          <label class="control-label col-sm-2">Nombre:</label>
          <div class="col-sm-12">
            <input type="text" name="nombre" class="form-control" id="email" placeholder="Inserta nombre del tema">
          </div>
        </div>


        <!-- Submit -->
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-12">
            <button type="submit" name="submit" class="btn btn-default">Enviar</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <?php
    if(isset($_POST["submit"])){
      if(!empty($_POST['nombre'])){

      $nombre = $_POST['nombre'];

      $host="localhost";
      $port=3306;
      $socket="";
      $user="admin";
      $password="admin";
      $dbname="libreria";

      $conn = new mysqli($host, $user, $password, $dbname, $port, $socket)
       or die ('Could not connect to the database server' . mysqli_connect_error());

      //Selecting Database
      $query = mysqli_query($conn, "SELECT * FROM temas WHERE nombre='".$nombre."'");
      $numrows = mysqli_num_rows($query);

        if($numrows == 0){
          $sql = "INSERT INTO temas VALUES ('$nombre')";
          $result = mysqli_query($conn, $sql);
          //Result Message
          if($result){
            echo "El tema ha sido creado";
          }else{
            echo "Failure!";
          }
        }else{
          echo "¡Ese tema ya existe! Por favor intenta con otro.";
        }

      }else{
        ?>
        <!--Javascript Alert -->
        <script>alert('Se requiere el nombre del dato');</script>
        <?php
      }
    }
    ?>
