<?php include './php/adminHeader.php';
?>

<div class="container">
  <!-- Page Heading -->

  <div class="col-lg-12">
    <div class="card mt-4">
    <div class="card-body">
      <h1 class="my-1">Crea una nueva cuenta</h1>
      <form class="form-horizontal" action="" method="post">
        <!-- User -->
        <br>
        <div class="form-group">
          <label class="control-label col-sm-2">Nombre de usuario:</label>
          <div class="col-sm-12">
            <input type="text" name="user" class="form-control" id="email" placeholder="Inserta nombre de usuario">
          </div>
        </div>
        <!-- Password -->
        <div class="form-group">
          <label class="control-label col-sm-2">Contraseña:</label>
          <div class="col-sm-12">
            <input type="password" name="pass" class="form-control" id="pwd" placeholder="Inserta contraseña">
          </div>
        </div>

        <!-- email -->
        <br>
        <div class="form-group">
          <label class="control-label col-sm-2">Email:</label>
          <div class="col-sm-12">
            <input type="email" name="email" class="form-control" id="email" placeholder="Inserta email">
          </div>
        </div>

        <!-- Direccion-->
        <div class="form-group">
          <label class="control-label col-sm-2">Dirección:</label>
          <div class="col-sm-12">
            <input type="text" name="address" class="form-control" id="email" placeholder="Inserta dirección">
          </div>
        </div>

        <!-- Teléfono-->
        <div class="form-group">
          <label class="control-label col-sm-2">Teléfono:</label>
          <div class="col-sm-12">
            <input type="number" name="phone" class="form-control"  placeholder="Inserta tu teléfono (solo los números)">
          </div>
        </div>

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
          <label class="control-label col-sm-2">Tarjeta de crédito:</label>
          <div class="col-sm-12">
            <input type="number" name="tarjeta" class="form-control"  placeholder="Inserta tu tarjeta de crédito">
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
      if(!empty($_POST['user']) && !empty($_POST['pass']) && !empty($_POST['paterno']) && !empty($_POST['name'])){
          if(empty($_POST['materno'])){
            $materno = "";
          }else{
            $materno = $_POST['materno'];
          }
          if(empty($_POST['email'])){
            $email = "";
          }else{
            $email = $_POST['email'];
          }
          if(empty($_POST['address'])){
            $address = "";
          }else{
            $address = $_POST['address'];
          }
          if(empty($_POST['phone'])){
            $phone = "";
          }else{
            $phone = $_POST['phone'];
          }
          if(empty($_POST['tarjeta'])){
            $tarjeta = "";
          }else{
            $tarjeta = $_POST['tarjeta'];
          }
      $user = $_POST['user'];
      $pass = $_POST['pass'];
      $name = $_POST['name'];
      $paterno = $_POST['paterno'];

      $conn = mysqli_connect('127.0.0.1','admin','admin','libreria');
      // Check connection
      if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

      //Selecting Database
      $query = mysqli_query($conn, "SELECT * FROM clientes WHERE username='".$user."'");
      $numrows = mysqli_num_rows($query);

        if($numrows == 0){
          //Insert to Mysqli Queryss')";
          //$sql = "INSERT INTO usuario VALUES ('$user', '$pass', $year, '$address', $postal, $cc)";
          $sql = "INSERT INTO clientes VALUES ('$name','$paterno','$materno','$phone', '$email', $pass, '$tarjeta', $address, $user)";
          $result = mysqli_query($conn, $sql);
          //Result Message
          if($result){
            echo "Tu cuenta ha sido creada";
          }else{
            echo "Failure!";
          }
        }else{
          echo "¡Ese nombre de usuario ya existe! Por favor intenta con otro.";
        }

      }else{
        ?>
        <!--Javascript Alert -->
        <script>alert('Se requiere el nombre, apellido, nombre de usuario y contraseña');</script>
        <?php
      }
    }
    ?>
