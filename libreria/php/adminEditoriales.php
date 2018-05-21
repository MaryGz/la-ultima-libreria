<?php include './php/adminHeader.php';
?>

<div class="container">
  <!-- Page Heading -->

  <div class="col-lg-12">
    <div class="card mt-4">
    <div class="card-body">
      <h1 class="my-1">Añadir una editorial</h1>
      <form class="form-horizontal" action="" method="post">
        <!-- User -->
        <br>
        <div class="form-group">
          <label class="control-label col-sm-2">Nombre:</label>
          <div class="col-sm-12">
            <input type="text" name="nombre" class="form-control" id="email" placeholder="Inserta nombre de editorial">
          </div>
        </div>
        <!-- Password -->
        <div class="form-group">
          <label class="control-label col-sm-2">País:</label>
          <div class="col-sm-12">
            <input type="text" name="pais" class="form-control" id="pwd" placeholder="Inserta país de la editorial">
          </div>
        </div>

        <!-- email -->
        <br>
        <div class="form-group">
          <label class="control-label col-sm-2">Teléfono:</label>
          <div class="col-sm-12">
            <input type="text" name="phone" class="form-control" id="email" placeholder="Inserta teléfono">
          </div>
        </div>

        <!-- Direccion-->
        <div class="form-group">
          <label class="control-label col-sm-2">Página de internet:</label>
          <div class="col-sm-12">
            <input type="text" name="pagina" class="form-control" id="email" placeholder="Inserta página de la editorial">
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
      if(!empty($_POST['nombre']) && !empty($_POST['pais']) && !empty($_POST['phone']) && !empty($_POST['pagina'])){

      $nombre = $_POST['nombre'];
      $pais = $_POST['pais'];
      $telefono = $_POST['telefono'];
      $pagina = $_POST['pagina'];

      $host="localhost";
      $port=3306;
      $socket="";
      $user="admin";
      $password="admin";
      $dbname="libreria";

      $con = new mysqli($host, $user, $password, $dbname, $port, $socket)
       or die ('Could not connect to the database server' . mysqli_connect_error());

      //Selecting Database
      $query = mysqli_query($con, "SELECT * FROM editoriales WHERE nombre='".$nombre."'");
      $numrows = mysqli_num_rows($query);

        if($numrows == 0){
          //Insert to Mysqli Queryss')";
          //$sql = "INSERT INTO usuario VALUES ('$user', '$pass', $year, '$address', $postal, $cc)";
          $sql = "INSERT INTO editoriales VALUES ('$nombre','$pais','$telefono','$pagina')";
          $result = mysqli_query($con, $sql);
          //Result Message
          if($result){
            echo "La editorial ha sido creada";
          }else{
            echo "Failure!";
          }
        }else{
          echo "¡Esa editorial ya existe! Por favor intenta con otro.";
        }

      }else{
        ?>
        <!--Javascript Alert -->
        <script>alert('Se requieren todos los datos');</script>
        <?php
      }
    }
    ?>
