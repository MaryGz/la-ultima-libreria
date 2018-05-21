<?php include './headerAndFooter/header.php';?>

    <!-- Page Content -->
    <div class="container">

      <!-- Product -->
      <?PHP
        $id = $_POST['id'];
        $result = mysqli_query($con,"SELECT * FROM libros WHERE id_libro = $id");

        $row = mysqli_fetch_array($result);
          echo "<br><h1 class='my-0'>". $row['id_libro'] ."  ";
          echo "<small> - ". $row['titulo'] ."</small></h1>";
          echo "<div class='row'>";
          echo "<div class='col-md-6'>";
          echo "<a href='#'>";
          echo "<img class='img-fluid rounded mb-0 mb-md-0' src='.". $row['imagen'] ."' alt=''>";
          echo "</a></div>";
          echo "<div class='col-md-5'><br><br><br>";
          echo "<p style='font-size: 30px;'>". $row['autor'] ."</p>";
          echo "<h3> $". $row['precio'] ."</h3><br>";
          echo "<h5 style='color: gray;'> Stock: ". $row['idioma'] ."</h5><br>";
          if(isset($_SESSION['sess_user'])){
            echo "<form class='form-inline' action='./addCart.php' method='post'>";
            echo "<input type='hidden' name='product' value='{$row['id_cliente']}'</input>";
            echo "<button type='submit' class='btn btn-primary'>Añadir a carrito</button>";
            echo "<div class='form-group'><h5> &nbsp&nbsp&nbsp Cantidad: &nbsp</h5><input type='number' name='cantidad' min=1 max=20 value=1 class='form-control'></div></form>";
          }
          echo "</div></div>";

      ?>
    </div>
    <!-- /.container -->

<?php include './headerAndFooter/footer.php';?>
