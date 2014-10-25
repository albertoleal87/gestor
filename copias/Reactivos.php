<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="formato.css" type="text/css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gestor</title>
<body>

<div id="encabezado">
<h1> Gestor de examenes chido </h1>
</div> <!--Cierra encabezado -->


<div id="menu">
<ul>
<li><a href="Reactivos.php" name="Reactivos" >Formularios</a></li>
<li><a href="Reactivos.php" name="Reactivos" >Formularios</a></li>
<li><a href="Reactivos.php" name="Reactivos" >Formularios</a></li>
<li><a href="Reactivos.php" name="Reactivos" >Formularios</a></li>
</ul>
</div> <!--Cierra menu -->

<div id="cuerpo"> 

<?php

if (isset($_POST['reactivos']) && !empty($_POST['reactivos']) && ($_POST['reactivos']) <= 100)
{}
else

echo <<<FORMULARIO
<form action="$_SERVER[PHP_SELF]" method="post">
Ingrese numero de Reactivos:<input type="text" name="reactivos" />
<input type="submit" name="creaseccion" value="Agrega seccion" />
FORMULARIO;


if (isset($_POST['reactivos']) && empty($_POST['reactivos']))
{
echo "<script type='text/javascript'> 'javascript:history.back()' </script> <font color='#FF0000'><br>Debe ingresar numero de reactivos.</font>";
;}

if (isset($_POST['reactivos']) && (($_POST['reactivos']) > 100)){
	
echo "<script type='text/javascript'> 'javascript:history.back()' </script> <font color='#FF0000'><br>Este apartado solo acepta maximo 100 reactivos.</font>"
;}

if (isset($_POST['reactivos']) && !empty($_POST['reactivos']) && ($_POST['reactivos']) <= 100)
{
$reactivos = ($_POST['reactivos']);
$reactivo = 1;
$respuesta = 1;

echo <<<FORMULARIO
<form action="$_SERVER[PHP_SELF]" method="post">
<font color='#FF0000'>
Ingrese un nombre de Tema y Materia con el cual se relacionaran los reactivos:
<BR>
</font>
<div id="relacionar">
<br>
Tema:<input type="text" name="tema"/>
<br>
<br>
Materia:<input type="text" name="materia" />
<br><br>
<font color='#FF0000'>Favor de ingresar reactivos con su respectiva respuesta:
</font>
<br><br>
<table>	
FORMULARIO;

while ($reactivo <= $reactivos) 
{
echo <<<FORMULARIO
<tr><td></td><td><input type="text" name="reactivo$reactivo" value="Reactivoprueba$reactivo" ></td><td><input type="text" name="respuesta$respuesta" value="Respuestaprueba$respuesta"></td></tr>
FORMULARIO;

$reactivo++;
$respuesta++;
} //cierra while

$fp = fopen("numero.txt", "r+");
rewind($fp );
fputs($fp, "   ");
rewind($fp );
fputs($fp, $reactivos);
fclose($fp);

echo <<<FORMULARIO
</table>
</div>
<br>
<input type="submit" name="guardar" value="Guarda Reactivos" />
FORMULARIO;

} //cierra if

if (isset($_POST['tema']) && !empty ($_POST['tema']) && isset($_POST['materia']) && !empty ($_POST['materia'])) 
{
$counter = 1;
$tema = $_POST['tema'];
$dp = mysql_connect("localhost", "root", "") or die ("No se logro conectar al servidor");
mysql_select_db("gestor", $dp) or die ("No se logro conectar a la base de datos");

$fp = fopen("numero.txt", "r+");
$numero = fgets($fp, 7);
fclose($fp);

while ($counter <= $numero) 
{ //inicia while 2
$value1 = $_POST["reactivo".$counter];
$value2 = $_POST["respuesta".$counter];

echo "Reactivo $counter: $value1<br>";
echo "Respuesta $counter: $value2<br>";

$insert = "INSERT INTO `gestor`.`relacionar` (
`reactivo` , `respuesta` , `tema` , `materia`)
VALUES ('$value1', '$value2', '$_POST[tema]', '$_POST[materia]' ) " ;

if (mysql_query($insert)){echo "<font color='#0000FF'><b>Ingresado con exito</b></font><br><br>";}
else {echo "Problema con query";}

$counter++;

} // se cierra while 2



;} // se cierra if

?>


</div> <!--- Cierra cuerpo--->


</body>

</html>
