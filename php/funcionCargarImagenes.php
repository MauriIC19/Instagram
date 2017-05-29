<?php
  $conn = new DB();
  $conn = $conn->conectar();
  $totalLikes = 0;
  $onclick = "";
  $texto = "";
  $queryFotos = "SELECT i.name, i.uploadDate, i.idImage, i.idUser, u.nickname, u.idUser
                 FROM image i, user u
                 WHERE u.idUser = i.idUser
                 ORDER BY uploadDate DESC;";

  $queryLikes = "SELECT COUNT(idImage) AS total, idImage, idUser AS id
                 FROM gusta
                 GROUP BY idImage, idUser";

  $queryComentarios = "SELECT * FROM comment
                       ORDER BY comDate DESC;";

  $queryMarcas = "SELECT * FROM mark";

  $fotos = $conn->query($queryFotos);
  $likes = $conn->query($queryLikes);
  $comentarios = $conn->query($queryComentarios);
  $marcas = $conn->query($queryMarcas);
 ?>
