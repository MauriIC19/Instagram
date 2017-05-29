<?php
  require_once('funcionConexion.php');
  session_start();
  $conn = new DB();
  $conn = $conn->conectar();

  $idUser = $_SESSION['id'];
  $idImage = $_POST['idImage'];

  $queryComprobar = "SELECT * FROM gusta WHERE idUser = {$idUser} AND idImage = {$idImage};";
  $res = $conn->query($queryComprobar);
  
  if ($res->num_rows == 1) {
    echo "Ok";
  }
  else{
    echo $conn->error;
  }

 ?>
