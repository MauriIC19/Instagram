<?php
  session_start();
  require_once('funcionConexion.php');

  $conn = new DB();
  $conn = $conn->conectar();

  if (isset($_POST['idImageLike'])) {
    $queryDarLike = "INSERT INTO gusta (idUser, idImage) VALUES({$_SESSION['id']}, {$_POST['idImageLike']});";
    if ($conn->query($queryDarLike)) {
      echo "Ok";
    }
  }
  if (isset($_POST['idImageDislike'])) {
    $queryQuitarLike = "DELETE FROM gusta WHERE idImage = {$_POST['idImageDislike']} AND idUser = {$_SESSION['id']}";
    if ($conn->query($queryQuitarLike)) {
      echo "Ok";
    }
  }
 ?>
