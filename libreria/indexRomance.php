<?php include './header.php';
?>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <?php include './php/sidebar.php';
        ?>

        <!-- /.col-lg-3 -->
        <div class="col-lg-10">

          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="./img/carousel/carousel01.png" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="./img/carousel/carousel02.png" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="./img/carousel/carousel03.png" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Siguiente</span>
            </a>
          </div>

          <div class="row">
            <?PHP
            $result = mysqli_query($con,"SELECT id_libros, titulo, precio, idioma, anio, nombre, apellido_p, imagen, id_tema FROM libros, autores WHERE libros.id_autor=autores.id_autor AND id_tema=2 ORDER BY titulo");

            while($row = mysqli_fetch_array($result)) {

              echo "<div class='col-lg-4 col-md-6 mb-4'>";
              echo "<div class='card card text-center h-100 w-280'>";
              echo "<form action='./php/product.php' method='post'>";
              echo "<button type='submit' class='btn btn-link' name='id' value='{$row['id_libros']}'><img class='card-img-top' src='./img/portadas/". $row['imagen'] ."' alt=''></button>";
              echo "<div class='card-body'>";
              echo "<h4 class='card-title'>";
              echo "<input type='hidden' value='{$row['id_libros']}' name='id'></input>";
              echo "<button type ='submit' class='btn btn-outline-primary btn-large'>";
              echo "". $row['titulo'] ."</button></form></h4>";
              echo "<h5>$". $row['precio'] ."</h5>";
              echo "<p class='card-text'>". $row['nombre'] ." ". $row['apellido_p'] ."</p></div>";
              echo "<div class='card-footer'>";
              echo "<small class='text-muted'>".$row['idioma']." - ".$row['anio']."</small>";
              echo "</div></div></div>";
            }
            ?>



          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

<?php include './php/headerAndFooter/footer.php';
?>
