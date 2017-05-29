<?php
  require_once('funcionConexion.php');
  session_start();

  $conn = new DB();
  $conn = $conn->conectar();

  $_POST['idComment'];

  $queryEliminar = "DELETE FROM comment WHERE idUser = {$_SESSION['id']} AND idComment = {$_POST['idComment']}";

  if ($conn->query($queryEliminar)) {
    echo "Ok";
  }
  else{
    echo $conn->error;
  }

 ?>
