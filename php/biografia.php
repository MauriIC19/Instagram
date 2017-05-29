<!DOCTYPE html>
<html>
<?php
include('funcionSubirImagen.php');
include('funcionCargarImagenes.php');

if ($_GET['salir']==1){
  session_unset();
  header("Location: index.php");
}
if (isset($_SESSION['id'])) {
?>
<?php  ?>
  <head>
    <meta charset="utf-8">
    <title>Instagram</title>
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <script type="text/javascript" src="../js/funciones.js"></script>
    <link rel="stylesheet" href="../css/estilosBiografia.css">
  </head>
  <body onload="recargar()">

  <div class="header">
    <div class="nom">
      <a href="biografia.php"><h1>Diegogram</h1></a>
    </div>
    <div class="menu">
      <ul>
        <li><a href="biografia.php?salir=1"><img src="../images/salir.png"></a></li>
        <li><a href="perfil.php?id=<?=$_SESSION['id'] ?>"><img src="../images/user.png"></a></li>

        <li>
          <form action="#" enctype="multipart/form-data" method="POST">
            <label for="imagen"><img src="../images/upload.png"></label>
            <input hidden onchange="habilitarBoton()" id="imagen" name="imagen" type="file">
            <input hidden type="submit" id="btnFoto" name="btnFoto" value="Subir">
          </form>
        </li>
      </ul>
    </div>
  </div>

    <div class="encabezado">
      <h2>Bienvenido(a) <?=$_SESSION['nickname'] ?></h2>
    </div>


    <?php
    while ($foto = $fotos->fetch_assoc()) {
     ?>
     <div class="contenedorFoto">
       <!--Contenedor de la foto -->
         <!--Contenedor de la fecha -->
         <div class="datos">
         <?php if ($foto['idUser'] == $_SESSION['id']){ ?>
           <button onclick="eliminar(<?=$foto['idImage']?>)">x</button>
         <?php } ?>
          <a href="perfil.php?id=<?=$foto['idUser']?>"><?=$foto['nickname']?></a> <p><?=$foto['uploadDate']?></p>
         </div>
         <div class="foto">
            <img src="../img/<?=$foto['name']?>">
         </div>
       <!--Contenedor de los likes -->
       <div class="likes">
         <?php
         $onclick = "darLike(".$foto['idImage'].")";
         $texto = "cora1";
         while($like = $likes->fetch_assoc()){
           if ($like['idImage'] == $foto['idImage']){
             if($like['id'] == $_SESSION['id']){
                     $onclick = "quitarLike(".$foto['idImage'].")";
                     $texto = "cora2";
              }
              $totalLikes += $like['total'];
            }
            }
            $onclickM = "ponerMarca(".$foto['idImage'].")";
            $textoM = "marcar";
            while($marca = $marcas->fetch_assoc()){
              if ($marca['idImage'] == $foto['idImage']) {
                if ($marca['idUser'] == $_SESSION['id']) {
                  $onclickM = "quitarMarca(".$foto['idImage'].")";
                  $textoM = "desmarcar";
                }
              }
            }
              ?>
           <p id="l<?=$foto['idImage']?>"><?=$totalLikes?></p>
           <?php
              $likes = $conn->query($queryLikes);
              $marcas = $conn->query($queryMarcas);
              $totalLikes = 0;
            ?>
           <button id="b<?=$foto['idImage']?>" onclick="<?=$onclick?>" class="like"><img src="../images/<?=$texto?>.png"></button>
           <button id="m<?=$foto['idImage']?>" onclick="<?=$onclickM?>" class="like"><img src="../images/<?=$textoM?>.png"></button>
       </div>
         <!--Contenedor de los comentarios -->
       <div class="comentarios" id="<?=$foto['idImage']?>">
       <textarea id="comentario<?=$foto['idImage']?>" placeholder="Escribe tu comentario aquí..."></textarea>
            <button  onclick="comentar(<?=$foto['idImage']?>)" class="btnComentar">Comentar</button>
         <?php while($comentario = $comentarios->fetch_assoc()){ ?>
             <?php if($comentario['idImage'] == $foto['idImage']){ ?>

               <!--Contenedor de cada comentario-->
               <div class="comentario">
                <h5><a href="perfil.php?id=<?=$comentario['idUser']?>"><?=$comentario['nickname']?></a></h5>
                <?php if ($comentario['idUser'] == $_SESSION['id']) { ?>
                <button onclick="eliminarComentario(<?=$comentario['idComment']?>)">x</button>
                <?php } ?>

                <p><?=$comentario['comDate']?></p>
                <h6><?=$comentario['comment']?></h6>
               </div>
             <?php }} $comentarios = $conn->query($queryComentarios);?>

       </div>
     </div>
    <?php } }
    else{
      header("Location: index.php");
    }
    ?>
    <h3 id="aviso"></h3>
  </body>
</html>
