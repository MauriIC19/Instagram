<?php
  $conn = new DB();
  $conn = $conn->conectar();
  $totalLikes = 0;
  $onclick = "";
  $texto = "";
  $queryFotos = "SELECT i.name, i.uploadDate, i.idImage, i.idUser, u.nickname, u.idUser
                 FROM image i, user u
                 WHERE u.idUser = i.idUser
                 AND u.idUser = {$_GET['id']}
                 ORDER BY uploadDate DESC;";

  $queryLikes = "SELECT COUNT(idImage) AS total, idImage, idUser AS id
                 FROM gusta
                 GROUP BY idImage, idUser";

  $queryComentarios = "SELECT * FROM comment
                       ORDER BY comDate DESC;";

  $queryMarcas = "SELECT * FROM mark";

  if (isset($_GET['misFotos'])) {
    $queryFotos = "SELECT i.name, i.uploadDate, i.idImage, i.idUser, u.nickname, u.idUser
                   FROM image i, user u
                   WHERE u.idUser = i.idUser
                   AND u.idUser = {$_GET['id']}
                   ORDER BY uploadDate DESC;";
  }

  if (isset($_GET['misLikes'])) {
    $queryFotos = "SELECT i.name, i.uploadDate, i.idImage, i.idUser, u.nickname, u.idUser, g.idUser, g.idImage
                   FROM image i, user u, gusta g
                   WHERE u.idUser = i.idUser
                   AND i.idImage = g.idImage
                   AND g.idUser = {$_GET['id']}
                   ORDER BY uploadDate DESC;";
  }

  if (isset($_GET['misMarcadas'])) {
    $queryFotos = "SELECT i.name, i.uploadDate, i.idImage, i.idUser, u.nickname, u.idUser, m.idUser, m.idImage
                   FROM image i, user u, mark m
                   WHERE u.idUser = i.idUser
                   AND i.idImage = m.idImage
                   AND m.idUser = {$_GET['id']}
                   ORDER BY uploadDate DESC;";
  }

  $fotos = $conn->query($queryFotos);
  $likes = $conn->query($queryLikes);
  $comentarios = $conn->query($queryComentarios);
  $marcas = $conn->query($queryMarcas);
 ?>
