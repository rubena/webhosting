<?php

#Conectamos con MySQL
$link = mysql_connect("localhost","hamal","hamal")
or die ("Fallo en el establecimiento de la conexión");

#Seleccionamos la base de datos a utilizar
$connect=mysql_select_db("miBD_db",$link)
or die("Error en la selección de la base de datos");

/*while ($fila = mysql_fetch_array($result))
{
	print_r($fila);
}*/
$nick = $_POST[nick];
$nombre = $_POST[nombre];
$email = $_POST[email];
$password = md5($_POST[password]);

$sql = "INSERT INTO usuarios (nick,password,nombre,email) VALUES ('$nick','$password','$nombre','$email');";
mysql_query($sql);

mysql_close($conexion);

echo "Gracias por registrarte. Recibirás información con las actualizaciones proximamente.";
?>