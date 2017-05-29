<?php
class DB{
  public function conectar(){
    $database = "instagram";
    $user = "root";
    $host = "localhost";
    $pass = "";

    $conn = new mysqli($host, $user, $pass, $database);
    if ($conn->connect_errno > 0) {
      echo $conn->error."</br>";
    }
    return $conn;
  }
}
 ?>
