<?php
// Recogemos con POST los datos de index.html y los guardamos en variables.
$usuario = $_POST['user'];
$contrasena = $_POST['pass'];

// Conectamos con la base de datos, indicando donde está, el usuario y la contraseña principal
$conexion = mysql_connect("localhost","root","raspberry");

// Conectamos con la Base de datos usuario, que es la que creamos y donde se ha introducido los datos.
mysql_select_db("usuario",$conexion);

// Hacemos una consulta a la base de datos, comprobando que coincide el usuario y la contraseña escrita.
$sql = "SELECT id_usuario FROM usuarios WHERE nombre_usuario = '$usuario' AND contrasena = '$contrasena' ";
$comprobar = mysql_query($sql);

// En caso de que exista, el id_usuario se guardará en una coockie, y se redireccionará al archivo principal
if (mysql_num_rows($comprobar) > 0) {
  $id_usuario = mysql_result($comprobar,0);
  setcookie("misitio_userid","$id_usuario",time() + 3600);
  header("Location:inicio.php");
}
// En caso contrario, mostrar que el Usuario o Contraseña son incorrectos
else {
  echo "<meta charset='UTF-8'>";
  echo "<h1 style='color:red'>Usuario o Contraseña Incorrectos</h1>";
}
?>
