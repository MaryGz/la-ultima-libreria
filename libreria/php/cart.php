<?php include './headerAndFooter/header.php';?>

    <!-- Page Content -->
    <div class="container">
      <h2 class="my-3">Tu carrito</h2>

      <div class="datagrid">
        <table>
          <thead>
            <tr>
              <th>Libro</th>
              <th>Título</th>
              <th>Autor</th>
              <th>Precio</th>
              <th>Cantidad</th>
              <th></th>
            </tr>
          </thead>
          <tbody>



        <!-- Product -->
        <?PHP
          // Check connection
          if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
          }

          if(!isset($_SESSION['sess_user'])){
            header("Location:../index.php");
          }else {
            $result = mysqli_query($con,"SELECT DISTINCT u.username,l.imagen, l.titulo, l.precio, c.cantidad, c.id_libro, a.nombre, a.apellido_p FROM carrito c, libros l, clientes u, autores a WHERE l.id_autor=a.id_autor AND c.id_libro=l.id_libros AND u.username=c.username AND c.username='{$_SESSION['sess_user']}' AND flag=0;");


            while($row = mysqli_fetch_array($result)) {
              echo "<tr>";
                echo "<td class='align-middle'> <img src='../img/portadas/".$row['imagen']."' style='height:130px;'> </td>";
                echo "<td class='align-middle'> <h4>{$row['titulo']} </h4></td>";
                echo "<td class='align-middle'> <h4>{$row['apellido_p']} </h4></td>";
                echo "<td class='align-middle'> <h4>{$row['precio']} </h4></td>";
                echo "<td class='align-middle'> <h4>{$row['cantidad']} </h4></td>";
                echo "<td class='align-middle'><form action='./deleteCart.php' method='post'>";
                echo "<input type='hidden' name='product' value='{$row['id_libro']}'</input>";
                echo "<button type='submit' class='btn btn-primary align-middle'>Quitar</button></form></td>";
              echo "</tr>";

            }

          }

        ?>



        </tbody>
      </table>


    </div>
    <!-- /.container -->
<?php include './headerAndFooter/footer.php';?>
