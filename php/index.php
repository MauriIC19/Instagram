<?php
  session_start();
  if (isset($_SESSION['id'])) {
    header("Location: biografia.php");
  }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Instagram</title>
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <script type="text/javascript" src="../js/funciones.js"></script>
  </head>
  <body>
    <div id="formularioLogin">
      <div class="imagenlogin">
        <h2>Inicio de sesión</h2>
        <p>Bienvenido a Diegogram</p>
      </div>
      <form action="#" method="POST">
        <!-- <label for="user">Usuario</label> -->
        <input type="text" name="user" value="" placeholder="Usuario" onfocus="quitar()">
        <!-- <label for="pass">Contraseña</label> -->
        <input type="password" name="pass" value="" placeholder="Contraseña" onfocus="quitar()"><br>
        <input type="submit" name="btnSubmit" value="Iniciar Sesión">
      </form>
    </div>
    <?php
      require_once('funcionConexion.php');
      if (isset($_POST['btnSubmit'])) {
        $conn = new DB();
        $conn = $conn->conectar();

        $mailNick = $_POST['user'];
        $pass = $_POST['pass'];

        $querySesion = "SELECT * FROM user
                        WHERE (mail = '{$mailNick}' OR nickname = '{$mailNick}')
                        AND password = md5('{$pass}');";
        $res = $conn->query($querySesion);
        if ($res->num_rows != 0) {
            if (!is_bool($res)){
            session_start();
            $res = $res->fetch_assoc();
            $_SESSION['id'] = $res['idUser'];
            $_SESSION['name'] = $res['username'];
            $_SESSION['nickname'] = $res['nickname'];
            header('Location: biografia.php');
          }
        }
        else{
          echo "<h3 id='aviso'>Usuario y/o contrasea incorrectos :(</h3>";
        }
      }
     ?>
     <div class="footer-login">
        <p>O si no tienes cuenta, <a href="registro.php">regístrate aquí</a></p>
     </div>
  </body>

 <!--  <script>
    function quitar(){
      document.getElementById('aviso').style="top:-40px;"
    }
  </script> -->
</html>
