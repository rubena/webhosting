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
$password = md5($_POST[password]);

$sql = "select password from usuarios where nick='$nick';";
$result = mysql_query($sql);
$rs = mysql_fetch_array($result,MYSQL_NUM);

//echo "Password introducido en md5 = $password <br>";
//echo "Password leido de base de datos = $rs[0] <br>";

if($rs[0] == $password)
{
	echo "Password coincide<br>";
}
else
{
	echo "Password no coincide <br>";
}
	
mysql_close($conexion);
?>