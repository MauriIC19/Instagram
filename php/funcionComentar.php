<?php
  require_once('funcionConexion.php');
  session_start();
  $conn = new DB();
  $conn = $conn->conectar();

  $comment = $_POST['comment'];
  $idImage = $_POST['idImage'];

  $queryComment = "INSERT INTO comment (comment, idUser, idImage, comDate, nickname)
                   VALUES('{$comment}', {$_SESSION['id']}, {$idImage}, CURRENT_TIMESTAMP, '{$_SESSION['nickname']}');";
  if ($conn->query($queryComment)) {
    echo "Ok";
  }
  else{
    echo $conn->error;
  }

 ?>
