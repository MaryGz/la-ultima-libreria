<?php
  session_start();

  if(!isset($_SESSION['sess_user'])){
    header("Location:../index.php");
  }else {
    $product = $_POST['product'];
    $cantidad = $_POST['cantidad'];

    $con = mysqli_connect('127.0.0.1','admin','admin','libreria');
    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    //$quantity = mysqli_query($con,"SELECT cantidad FROM usuario_producto WHERE u_mail='{$_SESSION['sess_user']}' AND id_producto=$product");
    $quantity = mysqli_query($con,"SELECT cantidad FROM carrito WHERE username='{$_SESSION['sess_user']}' AND id_libro=(SELECT id_libros FROM libros WHERE titulo=$product)");
    $resul_cant = mysqli_fetch_array($quantity);
    if($resul_cant['cantidad']>0){
      $cantidad = $cantidad + $resul_cant['cantidad'];
      //mysqli_query($con,"UPDATE usuario_producto SET cantidad = $cantidad WHERE u_mail='{$_SESSION['sess_user']}' AND id_producto=$product");
      mysqli_query($con,"UPDATE carrito SET cantidad = $cantidad WHERE username='{$_SESSION['sess_user']}' AND id_libro=(SELECT id_libros FROM libros WHERE titulo=$product)");
    }else{
      $insert = "INSERT INTO usuario_producto VALUES"."("."$product, 0, $cantidad,'{$_SESSION['sess_user']}')";
      //$insert = "INSERT INTO carrito VALUES"."("."$product, $cantidad, 5, 0,'{$_SESSION['sess_user']}')";
      $result = mysqli_query($con,$insert);
    }

    header("Location:./cart.php");
  }
?>
