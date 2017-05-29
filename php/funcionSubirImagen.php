<?php
  session_start();
  require_once('funcionConexion.php');
    if (isset($_POST['btnFoto'])) {
      $temp = explode(".", $_FILES["imagen"]["name"]);
      $newfilename = round(microtime(true)) . '.' . end($temp);
      if (move_uploaded_file($_FILES["imagen"]["tmp_name"], "../img/" . $newfilename)) {
        $conn = new DB();
        $conn = $conn->conectar();

        $queryInsert = "INSERT INTO image (name, idUser,uploadDate) VALUES('{$newfilename}', {$_SESSION['id']}, CURRENT_TIMESTAMP);";
        if ($conn->query($queryInsert)) {
          header("Refresh:0");
        }
      }else{
        echo "<h3 id='aviso'>Ocurrió un error</h3>";
      }
    }
 ?>
