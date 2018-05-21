
<?php
  session_start();

  if(!isset($_SESSION['sess_user'])){
    header("Location:../index.php");
  }else {
    $product = $_POST['product'];
    $conn = mysqli_connect('127.0.0.1','admin','admin','libreria');
    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    //$result = mysqli_query($conn,"DELETE FROM usuario_producto WHERE id_producto=$product AND u_mail='{$_SESSION['sess_user']}';");
    $result = mysqli_query($conn,"DELETE FROM carrito WHERE id_libro=(SELECT id_libros FROM libros WHERE titulo=$product) AND username='{$_SESSION['sess_user']}';");
    header("Location:./cart.php");
  }
?>
