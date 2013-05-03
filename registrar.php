<?php

#Conectamos con MySQL
$link = mysql_connect("localhost","hamal","hamal")
or die ("Fallo en el establecimiento de la conexión");

#Seleccionamos la base de datos a utilizar
$connect=mysql_select_db("miBD_db",$link)
or die("Error en la selección de la base de datos");

//echo "Conexion con la base de datos correcta<br>";

$sql = "SELECT nick FROM usuarios;";
$result = mysql_query($sql);

/*$rs = mysql_fetch_array($result,MYSQL_NUM);
echo $rs[0];
$rs = mysql_fetch_array($result,MYSQL_NUM);
echo $rs[0];
*/
/*while ($fila = mysql_fetch_array($result))
{
	print_r($fila);
}*/
$nick = $_POST[nick];
$nombre = $_POST[nombre];
$email = $_POST[email];
$password = md5($_POST[password]);

$sql = "SELECT id FROM usuarios WHERE nick='$nick';";
$result = mysql_query($sql);
$rs = mysql_fetch_array($result,MYSQL_NUM);

$sql = "SELECT id FROM usuarios WHERE email='$email';";
$result = mysql_query($sql);
$re = mysql_fetch_array($result,MYSQL_NUM);

if($rs[0] != 0 || $re[0] !=0)
{
echo "E-mail o Nick ya usados anteriormente<br>";
}
else
{
$sql = "INSERT INTO usuarios (nick,password,nombre,email) VALUES ('$nick','$password','$nombre','$email');";
mysql_query($sql);
echo "Registrado correctamente <br>";
}

mysql_close($conexion);

//echo "Desconexión con la base de datos correcta<br>";
/*
function quitar($mensaje)
{
$mensaje = str_replace("<","<",$mensaje);
$mensaje = str_replace(">",">",$mensaje);
$mensaje = str_replace("\'","'",$mensaje);
$mensaje = str_replace('\"',""",$mensaje);
$mensaje = str_replace("\\\\","\",$mensaje);
return $mensaje;
}

if(trim($HTTP_POST_VARS["nick"]) != "" && trim($HTTP_POST_VARS["email"]) != "")
{
$sql = "SELECT id FROM usuarios WHERE nick='".quitar($HTTP_POST_VARS["nick"])."'";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result))
{
echo "Error, nick escogido por otro usuario";
}
else
{
$sql = "INSERT INTO usuarios (nick,password,nombre,email) VALUES ('$nick','$password','$nombre','$email'";
$sql .= "'".quitar($HTTP_POST_VARS["nick"])."'";
$sql .= ",'".quitar($HTTP_POST_VARS["password"])."'";
$sql .= ",'".quitar($HTTP_POST_VARS["nombre"])."'";
$sql .= ",'".quitar($HTTP_POST_VARS["email"])."'";
$sql .= ")";
mysql_query($sql);
echo "Registro exitoso!";
}
mysql_free_result($result);
}
else
{
echo "Debe llenar como minimo los campos de email y password";
}
mysql_close();*/
?>