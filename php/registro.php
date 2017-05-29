<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>instagram</title>
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <script type="text/javascript" src="../js/funciones.js"></script>
  </head>
  <body>
    <div id="formularioLogin">
      <div class="imagenlogin">
        <h2>Registro</h2>
        <p>Únete a Diegogram</p>
      </div>
        <!-- <div id="registro"> -->
          <input type="text" id="name" name="name" value="" placeholder="Nombre" onfocus="quitar()">
          <input type="text" id="username" name="username" value="" placeholder="Nickname" onfocus="quitar()">
          <input type="email" id="mail" name="mail" value="" placeholder="Correo" onfocus="quitar()">
          <input type="password" id="pass" name="pass" value="" placeholder="contraseña" onfocus="quitar()">
          <input type="password" id="pass2" name="pass2" value="" placeholder="Confirmar contraseña" onfocus="quitar()"><br>
          <button onclick="registro()">Registrar</button>
      <!-- </div> -->
    </div>
    <h3 id="aviso" class="avisoregistro"></h3>
    <div class="footer-login">
      <p>O si ta tienes cuenta, <a href="index.php">inicia sesión</a>.</p>
    </div>
  </body>
</html>
