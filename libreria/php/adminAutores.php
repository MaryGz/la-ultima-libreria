<?php include './php/adminHeader.php';
?>

<div class="container">
  <!-- Page Heading -->

  <div class="col-lg-12">
    <div class="card mt-4">
    <div class="card-body">
      <h1 class="my-1">Crear un nuevo autor</h1>
      <form class="form-horizontal" action="" method="post">
        <!-- User -->
        <br>


        <!-- Nombre-->
        <div class="form-group">
          <label class="control-label col-sm-2">Nombre:</label>
          <div class="col-sm-12">
            <input type="text" name="name" class="form-control" id="email" placeholder="Inserta tu nombre">
          </div>
        </div>

        <!-- Apellido paterno-->
        <div class="form-group">
          <label class="control-label col-sm-2">Apellido Paterno:</label>
          <div class="col-sm-12">
            <input type="text" name="paterno" class="form-control" id="email" placeholder="Inserta tu apellido paterno">
          </div>
        </div>

        <!-- Apellido materno-->
        <div class="form-group">
          <label class="control-label col-sm-2">Apellido Materno:</label>
          <div class="col-sm-12">
            <input type="text" name="materno" class="form-control" id="email" placeholder="Inserta tu apellido materno">
          </div>
        </div>

        <!-- Tarjeta-->
        <div class="form-group">
          <label class="control-label col-sm-2">País:</label>
          <div class="col-sm-12">
            <input type="pais" name="tarjeta" class="form-control"  placeholder="Inserta tu tarjeta de crédito">
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
      if(!empty($_POST['name']) && !empty($_POST['materno']) && !empty($_POST['paterno']) && !empty($_POST['pais'])){

      $materno = $_POST['materno'];
      $paterno = $_POST['paterno'];
      $name = $_POST['name'];
      $pais = $_POST['pais'];

      $host="localhost";
      $port=3306;
      $socket="";
      $user="admin";
      $password="admin";
      $dbname="libreria";

      $conn = new mysqli($host, $user, $password, $dbname, $port, $socket)
       or die ('Could not connect to the database server' . mysqli_connect_error());

      //Selecting Database
      $query = mysqli_query($conn, "SELECT * FROM autores WHERE nombre='".$name."'");
      $numrows = mysqli_num_rows($query);

        if($numrows == 0){
          $sql = "INSERT INTO autores VALUES ('$name','$materno','$paterno','$pais')";
          $result = mysqli_query($conn, $sql);
          //Result Message
          if($result){
            echo "El autor ha sido creado";
          }else{
            echo "Failure!";
          }
        }else{
          echo "¡Ese autor ya está registrado! Por favor intenta con otro.";
        }

      }else{
        ?>
        <!--Javascript Alert -->
        <script>alert('Se requieren todos los campos para registrar al autor');</script>
        <?php
      }
    }
    ?>
