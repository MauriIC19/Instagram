<?php
  include_once('funcionConexion.php');

  $conn = new DB();
  $conn = $conn->conectar();

  $name = $_POST['name'];
  $username = $_POST['username'];
  $mail = $_POST['mail'];
  $pass = $_POST['pass'];

  $queryInsert = "INSERT INTO user(username, mail, nickname, password, regDate)
             VALUES('{$name}', '{$mail}', '{$username}',md5('{$pass}'), curdate());";

  $querySelect = "SELECT nickname, mail FROM user WHERE nickname = '{$username}' OR mail = '{$mail}';";
  $res = $conn->query($querySelect);

  if ($res->num_rows == 1) {
    echo "El nickname o correo ya está registrado";
  }
  else{
    if ($conn->query($queryInsert)) {
      echo "Ok";
    }
    else{
      echo "Ocurrió un error, por favor inténtelo de nuevo";
    }
  }
 ?>
