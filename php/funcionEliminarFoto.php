<?php
  require_once('funcionConexion.php');
  session_start();

  $conn = new DB();
  $conn = $conn->conectar();
  $queryDatosFoto = "SELECT name FROM image WHERE idUser = {$_SESSION['id']} AND idImage = {$_POST['idImage']};";
  $queryEliminar = "DELETE FROM image WHERE idUser = {$_SESSION['id']} AND idImage = {$_POST['idImage']};";
  $datosFoto = $conn->query($queryDatosFoto);
  if ($conn->query($queryEliminar)) {
    $tables = array("gusta","mark","comment");
    foreach($tables as $table) {
      $query = "DELETE FROM $table WHERE idImage={$_POST['idImage']}";
      $conn->query($query);
    }
    $name = $datosFoto->fetch_assoc();
    unlink("../img/".$name['name']);
    echo "Ok";
  }
  else{
    echo $conn->error;
  }

 ?>
