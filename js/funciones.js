function registro(){
  name = document.getElementById('name').value;
  username = document.getElementById('username').value;
  mail = document.getElementById('mail').value;
  pass = document.getElementById('pass').value;
  pass2 = document.getElementById('pass2').value;

  if (name != "" && username != "" && mail != "" && pass !="" && pass2 != "") {
    if (pass == pass2) {
      ajaxRegistro = new XMLHttpRequest();
      ajaxRegistro.open('POST', '../php/funcionRegistro.php');
      ajaxRegistro.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      ajaxRegistro.send('name=' + name + '&username=' + username + '&mail=' + mail + '&pass=' + pass);
      ajaxRegistro.onreadystatechange = function() {
      	 if (this.readyState == 4 && this.status == 200) {
      			if (this.responseText == 'Ok') {
                alert("Registro Exitoso");
                document.getElementById('aviso').classList.remove("avisoregistro");
                document.getElementById('aviso').innerHTML="Registro Exitoso :D"
      					window.location.assign('index.php');
      				} else {
      					document.getElementById('aviso').innerHTML = this.responseText;
      				}
          }
        }
      }
    else{

      document.getElementById('aviso').classList.remove("avisoregistro");
      document.getElementById('aviso').innerHTML ="Las contraseñas no coinciden :(";
    }
  }
  else{
    document.getElementById('name').style="box-shadow: 0px 0px 4px 3px rgba(255,0,0,.8);";
    document.getElementById('username').style="box-shadow: 0px 0px 4px 3px rgba(255,0,0,.8);";
    document.getElementById('mail').style="box-shadow: 0px 0px 4px 3px rgba(255,0,0,.8);";
    document.getElementById('pass').style="box-shadow: 0px 0px 4px 3px rgba(255,0,0,.8);";
    document.getElementById('pass2').style="box-shadow: 0px 0px 4px 3px rgba(255,0,0,.8);";

    document.getElementById('aviso').classList.remove("avisoregistro");
    document.getElementById('aviso').innerHTML = "Los campos deben de estar completos";
  }
}

function recargar(){
  document.getElementById('imagen').value = null;
  document.getElementById('btnFoto').disabled = true;
}

function habilitarBoton(){
  document.getElementById('btnFoto').disabled = false;
  document.getElementById('btnFoto').hidden = false;

  setTimeout(
      function(){
        document.getElementById('btnFoto').hidden = true;
      }, 5000)
}

function comentar(x){
  comment = document.getElementById('comentario'+x).value;
  idImage = x;

  if (comment != "") {
    ajaxComentar = new XMLHttpRequest();
    ajaxComentar.open('POST', '../php/funcionComentar.php');
    ajaxComentar.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajaxComentar.send('comment=' + comment + '&idImage=' + idImage);
    ajaxComentar.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
         if (this.responseText == 'Ok') {
           location.reload();
         }
         else{
           document.getElementById('aviso').innerHTML = this.responseText;
         }
       }
     }
  }
  else{
    alert("No puedes hacer un comentario vacío");
  }
}

function eliminarComentario(x){
  con = confirm("¿Estás seguro que deseas eliminar el comentario?");
  if (con == true) {
    ajaxEliminar = new XMLHttpRequest();
    ajaxEliminar.open('POST', '../php/funcionEliminar.php');
    ajaxEliminar.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajaxEliminar.send('idComment=' + x);
    ajaxEliminar.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
         if (this.responseText == 'Ok') {
           location.reload();
         }
         else{
           document.getElementById('aviso').innerHTML = this.responseText;
         }
       }
     }
  }
}

function darLike(x){
  ajaxLike = new XMLHttpRequest();
  ajaxLike.open('POST', '../php/funcionLikes.php');
  ajaxLike.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajaxLike.send('idImageLike=' + x);

  total = parseInt(document.getElementById('l'+x).innerHTML) + 1;

  ajaxLike.onreadystatechange = function(){
    if (this.responseText == 'Ok') {
      document.getElementById('l' + x).innerHTML = total;
      document.getElementById('b' + x).innerHTML = "<img src='../images/cora2.png'>";
      document.getElementById('b' + x).onclick = function(){
                                                    quitarLike(x);
                                                  }
    }
  }
}

function quitarLike(x){
  ajaxLike = new XMLHttpRequest();
  ajaxLike.open('POST', '../php/funcionLikes.php');
  ajaxLike.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajaxLike.send('idImageDislike=' + x);

  total = parseInt(document.getElementById('l'+x).innerHTML) - 1;

  ajaxLike.onreadystatechange = function(){
    if (this.responseText == 'Ok') {
      document.getElementById('l' + x).innerHTML = total;
      document.getElementById('b' + x).innerHTML = "<img src='../images/cora1.png'>";
      document.getElementById('b' + x).onclick = function(){
                                                    darLike(x);
                                                  }
    }
  }
}

function ponerMarca(x){
  ajaxLike = new XMLHttpRequest();
  ajaxLike.open('POST', '../php/funcionMarca.php');
  ajaxLike.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajaxLike.send('idImageMarca=' + x);

  total = parseInt(document.getElementById('l'+x).innerHTML) + 1;

  ajaxLike.onreadystatechange = function(){
    if (this.responseText == 'Ok') {
      document.getElementById('m' + x).innerHTML = "<img src='../images/desmarcar.png'>";
      document.getElementById('m' + x).onclick = function(){
                                                    quitarMarca(x);
                                                  }
    }
  }
}

function quitarMarca(x){
  ajaxLike = new XMLHttpRequest();
  ajaxLike.open('POST', '../php/funcionMarca.php');
  ajaxLike.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajaxLike.send('idImageDesmarcar=' + x);

  total = parseInt(document.getElementById('l'+x).innerHTML) - 1;

  ajaxLike.onreadystatechange = function(){
    if (this.responseText == 'Ok') {
      document.getElementById('m' + x).innerHTML = "<img src='../images/marcar.png'>";
      document.getElementById('m' + x).onclick = function(){
                                                    ponerMarca(x);
                                                  }
    }
  }
}

function eliminar(x){
  con = confirm("¿Estás seguro que deseas elimnar la foto?");
  if (con == true) {
    ajaxEliminar = new XMLHttpRequest();
    ajaxEliminar.open('POST', '../php/funcionEliminarFoto.php');
    ajaxEliminar.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajaxEliminar.send('idImage=' + x);
    ajaxEliminar.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
         if (this.responseText == 'Ok') {
           location.replace("../php/biografia.php");
         }
         else{
           document.getElementById('aviso').innerHTML = this.responseText;
         }
       }
     }
  }
}


// ============== LOGIN==================
function quitar(){
  document.getElementById('name').style="box-shadow:none;"
  document.getElementById('username').style="box-shadow:none;"
  document.getElementById('mail').style="box-shadow:none;"
  document.getElementById('pass').style="box-shadow:none;"
  document.getElementById('pass2').style="box-shadow:none;"
  setTimeout(
      function(){
        document.getElementById('aviso').style.top = "-40px"
      }, 1000)
}
