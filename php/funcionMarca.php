<?php
  session_start();
  require_once('funcionConexion.php');

  $conn = new DB();
  $conn = $conn->conectar();

  if (isset($_POST['idImageMarca'])) {
    $queryDarLike = "INSERT INTO mark (idUser, idImage) VALUES({$_SESSION['id']}, {$_POST['idImageMarca']});";
    if ($conn->query($queryDarLike)) {
      echo "Ok";
    }
  }
  if (isset($_POST['idImageDesmarcar'])) {
    $queryQuitarLike = "DELETE FROM mark WHERE idImage = {$_POST['idImageDesmarcar']} AND idUser = {$_SESSION['id']}";
    if ($conn->query($queryQuitarLike)) {
      echo "Ok";
    }
  }
