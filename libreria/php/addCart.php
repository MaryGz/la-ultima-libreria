<?php
  session_start();

  if(!isset($_SESSION['sess_user'])){
    header("Location:../index.php");
  }else {
    $product = $_POST['product'];
    $cantidad = $_POST['cantidad'];
    $price = $_POST['price'];
    $disponibles = $_POST['disponibles'];


    $host="localhost";

    $user="admin";
    $password="";
    $dbname="libreria";

      //$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
      // or die ('Could not connect to the database server' . mysqli_connect_error());

      $con = mysqli_connect($host, 'admin', 'admin', $dbname);

      if (mysqli_connect_errno()){
        echo mysqli_connect_error();
      }


    //$quantity = mysqli_query($con,"SELECT cantidad FROM usuario_producto WHERE u_mail='{$_SESSION['sess_user']}' AND id_producto=$product");
    $quantity = mysqli_query($con,"SELECT cantidad FROM carrito WHERE username='{$_SESSION['sess_id_cliente']}' AND id_libro = $product");
    $resul_cant = mysqli_fetch_array($quantity);
    if($resul_cant['cantidad']>0){
      $cantidad = $cantidad + $resul_cant['cantidad'];
      //mysqli_query($con,"UPDATE usuario_producto SET cantidad = $cantidad WHERE u_mail='{$_SESSION['sess_user']}' AND id_producto=$product");
      mysqli_query($con,"UPDATE carrito SET cantidad = $cantidad WHERE username='{$_SESSION['sess_id_cliente']}' AND id_libro=$product");

    }else{
      $insert = "INSERT INTO carrito (id_libro,cantidad,total,flag,username) VALUES"."("."$product, $cantidad,$price,0,'{$_SESSION['sess_id_cliente']}')";
      //$insert = "INSERT INTO carrito VALUES"."("."$product, $cantidad, 5, 0,'{$_SESSION['sess_user']}')";
      $result = mysqli_query($con,$insert);
    }
    $restantes = $disponibles - $cantidad;
    mysqli_query($con, "UPDATE libros SET disponibles = $restantes WHERE id_libro=$product");

    header("Location:./cart.php");
  }
?>
